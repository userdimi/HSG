<?php

class User_Model_User
{
	protected $_id     	 = null;
	protected $_date   	 = null;
	protected $_group  	 = null;
	protected $_status   = null;
	protected $_name     = null;
	protected $_password = null;
	protected $_email    = null;
	protected $_website  = null;
	protected $_text     = null;
	protected $_url    	 = null;

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

	public function setDate($date)
	{
		$this->_date = $date;
	}

	public function getDate()
	{
		return $this->_date;
	}

	public function setGroup($group)
	{
		if(!in_array($group, array("guest","reader","editor","admin")))
		{
			return false;
		}
			$this->_group = $group;
	}

	public function getGroup()
	{
		return $this->_group;
	}

	public function setStatus($status)
	{
		if(!in_array($status,array("approved","blocked")))
		{
			return false;
		}

		$this->_status = $status;
	}

	public function getStatus()
	{
		return $this->_status;
	}

	public function setName($name)
	{
		$this->_name = $name;	
	}

	public function getName()
	{
		return $this->_name;
	}

	public function setPassword($password)
	{
		$this->_password = $password;
	}

	public function getPassword()
	{
		return $this->_password;
	}

	public function setEmail($email)	
	{
		$this->_email = $email;
	}

	public function getEmail()
	{
		return $this->_email;
	}

	public function setWebsite($website)
	{
		$this->_website = $website;
	}

	public function getWebsite()
	{
		return $this->_website;
	}

	public function setText($text)
	{
		$this->_text = $text;
	}

	public function getText()
	{
		return $this->_text;
	}

	public function setUrl($url)
	{
		$this->_url = $url;
	}

	public function getUrl()
	{
		return $this->_url;
	}

	public function toArray()
	{
		$data = array(
				"user_id"       => $this->getId(),
				"user_date"     => $this->getDate(),
				"user_group"    => $this->getGroup(),
				"user_status"   => $this->getStatus(),
				"user_name"     => $this->getName(),
				"user_password" => $this->getPassword(),
				"user_email"    => $this->getEmail(),
				"user_website"  => $this->getWebsite(),
				"user_url"		=> $this->getUrl()
			);

		return $data;
	}		

}