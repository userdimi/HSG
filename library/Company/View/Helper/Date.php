<?php
class Company_View_Helper_Date extends Zend_View_Helper_Abstract
{

	public function date($input = '')
	{
		if(is_null($input) || '0000-00-00 00:00:00' == $input)
		{
			return "-";
		}
		
		try
		{
			$date = new Zend_Date($input, null, 'de');
		}
		catch(Zend_Date_Excaption $e)
		{
			return "-";
		}

		$output = $date->get(Zend_Date::DATE_MEDIUM);

		return $output;
	}

}
