<?php

/**
 * This class separates all customers who have a registered date of birth.
 * 
 */
class Birthdate_Customer
{
    /**
     * Check if the user birth date is this month
     * @param  String $billing_birthdate
     * @return Boolean
     */
    private static function monthOfBirthdate($billing_birthdate)
    {
        $currentMonth = new DateTime('now');
        $birthdate = new DateTime(preg_replace('/[^0-9]/', '-', $billing_birthdate));

        if ($currentMonth->format('m') == $birthdate->format('m')) {
            return true;
        }

        return false;
    }

    /**
     * @return Array
     */
    public static function all()
    {
        $customers =  array_map(function($customer) {
            $instance = new WC_Customer($customer->ID);
            $birthdate = $instance->get_meta('billing_birthdate');

            if ($birthdate != null && self::monthOfBirthdate($birthdate)) {
                return $instance;
            }
        }, get_users('role=customer'));

        return $customers;
    }
}