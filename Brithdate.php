<?php

/**
* 
*/
class Brithdate
{
	public $date;
	public $separator;

	/**
	* Get month of client brithdate
	*
	* @param $date DateTime
	* @return String
	*/
	public function get_moth($date)
	{
		$month = new DateTime($date);

		return $month->format('m');
	}

	/**
	* Get current month of the year
	*
	* @return String
	*/
	public function get_current_month()
	{
		$month = new DateTime('now');

		return $month->format('m');
	}

	/**
	* Remove all characters from string except "-" 
	*
	* @param $month String
	* @return String
	*/
	public function normalize_date($month)
	{
		return preg_replace('/[^0-9]/', '-', $month);
	}

	/**
	* Apply separator on string
	*
	* @param $separator String
	* @param $month String
	*/
	public function change_separator($separator, $month)
	{
		return preg_replace('/[^0-9]/', $separator, $month);
	}
}