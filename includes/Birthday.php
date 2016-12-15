<?php

class Birthday
{
	public $date;
	public $separator;
	protected $birthday;

    /**
     * Birthday constructor.
     * @param $date string
     */
    public function __construct($date)
    {
        $this->birthday = new DateTime($this->normalize_date($date));
    }

    /**
     * Get month of user birthday.
     * @return string
     */
	public function get_month()
	{
		return $this->birthday->format('m');
	}

    /**
     * Get date of user birthday.
     * @return DateTime
     */
	public function get_date()
    {
        return $this->birthday;
    }

    /**
     * Set the default datetime regex to use in DateTime class.
     * @param $month
     * @return mixed
     */
	public function normalize_date($month)
	{
		return preg_replace('/[^0-9]/', '-', $month);
	}
}