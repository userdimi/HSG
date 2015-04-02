<?php
class Company_View_Helper_Time extends Zend_View_Helper_Abstract
{
		public function time($input = '')
	{
		if(is_null($input) || '0000-00-00 00:00:00' == $input)
		{
			return "-";
		}

		try
		{
			$time = new Zend_Date($input, null, 'de');
		}
		catch(Zend_Date_Excaption $e)
		{
			return "-";
		}

		$output = $time->get(Zend_Date::TIME_SHORT);

		return $output;
	}
}