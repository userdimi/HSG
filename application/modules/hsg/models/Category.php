<?php

class Hsg_Model_Category
{
	protected $_id   = null;
	protected $_name = null;
	protected $_url  = null;

	public function setId($id)
	{
		$id = (int) $id;

		if($id != 0)
		{
			$this->_id = $id;
		}
	}

	public function getId()
	{
		return $this->_id;
	}

	public function setName($name)
	{
		if(is_string($name))
		{
			$this->_name = $name;
		}
	}

	public function getName()
	{
		return $this->_name;
	}

	public function setUrl($url)
	{
		if(is_string($url))
		{
			$this->_url = $url;
		}
	}

	public function getUrl()
	{
		return $this->_url;
	}

	public function toArray()
	{
		$data = array(
					"category_id"   => $this->getId(),
					"category_name" => $this->getName(),
					"category_url"  => $this->getUrl()
			);

		return $data;
	}
}

