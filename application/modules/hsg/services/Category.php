<?php

class Hsg_Service_Category
{
	protected static $_instance = null;

	public static function getInstance()
	{
		if(isset(self::$_instance) || null === self::$_instance)
		{
			self::$_instance = new Hsg_Service_Category;
		}

		return self::$_instance;
	}


	protected $_mapper = null;
	protected $_items  = 10;

	public function getCategoryMapper()
	{
		if(!isset($this->_mapper))
		{
			$this->_mapper = new Hsg_Model_Mappers_Category();
		}

		return $this->_mapper;
	}

	public function fetchSingleById($id)
	{
		return $this->getCategoryMapper()->fetchSingle($id);
	}

	public function fetchSingleByUrl($url)
	{
		return $this->getCategoryMapper()->fetchSingleByUrl($url);
	}

	public function fetchSingleByName($name)
	{
		return $this->getCategoryMapper()->fetchSingleByUrl($name);
	}

	public function fecthListAll()
	{
		return $this->getCategoryMapper()->fetchList();
	}

	public function fecthOptions()
	{
		$options = array();

		foreach ($this->getCategoryMapper()->fetchList() as $category) 
		{
			$options[$category->getId()] = $category->getName();
		}

		return $options;
	}


}

