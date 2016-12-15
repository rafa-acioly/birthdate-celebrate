<?php


class Customer
{
    public static function all()
    {
        return get_users('role=customer');
    }
}