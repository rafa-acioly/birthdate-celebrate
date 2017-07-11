<?php


class Birthdate_Customer
{
    private static function convertToWcCustomerClass($list)
    {
    	$customersList = array_map(function($customer) {
	      return new WC_Customer($customer->ID);
	    }, $list);

	    return $customersList;
    }

    private static function getCustomersWithValidBirthDate($list)
    {
    	$customersWithBirthDate = array_filter($list, function($customer) {
	      return $customer->get_meta('billing_birthdate') != null;
	    });

	    return $customersWithBirthDate;
    }

    public static function all()
    {
        return self::getCustomersWithValidBirthDate(
        		self::convertToWcCustomerClass(
        				get_users('role=customer')
        			)
        	);
    }
}