<?php

/**
 * This class separates all customers who have a registered date of birth.
 * 
 */
class Birthdate_Customer
{
    /**
     * Convert all users of type "customer" to use WC_Customer class
     * 
     * @param  Array $list
     * @return Array
     */
    private static function convertToWcCustomerClass($list)
    {
    	$customersList = array_map(function($customer) {
	      return new WC_Customer($customer->ID);
	    }, $list);

	    return $customersList;
    }

    /**
     *  Get all customers with a valid birthdate
     * 
     * @param  Array $list
     * @return Array
     */
    private static function getCustomersWithValidBirthDate($list)
    {
    	$customersWithBirthDate = array_filter($list, function($customer) {
	      return $customer->get_meta('billing_birthdate') != null;
	    });

	    return $customersWithBirthDate;
    }

    /**
     * @return Array
     */
    public static function all()
    {
        return self::getCustomersWithValidBirthDate( // Retrieve only the ones with valid birth date

        	   self::convertToWcCustomerClass( // Convert to an array of WC_Customer()

        		  get_users('role=customer') // Retrieve all customers
                  
        		)
        	);
    }
}