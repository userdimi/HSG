<?php

class Image_Model_Image
{
	protected $_id = null;
	protected $_user = null;
	protected $_path = null;
	protected $_hash = null;

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

	public function setUser(/*User_Model_User*/ $user)
	{
		$this->_user = $user;
	}

	public function getUser()
	{
		return $this->_user;
	}

	public function setPath($path)
	{
		if(is_string($path))
		{
			$this->_path = $path;
		}
	}

	public function getPath()
	{
		return $this->_path;
	}

	public function setHash($hash)
	{
		if(is_string($hash))
		{
			$this->_hash = $hash;
		}
	}

	public function getHash()
	{
		return $this->_hash;
	}

	public function toArray()
	{
		$data = array(
				"images_id"    => $this->getId(),
				"images_user"  => $this->getUser(),
				"images_path"  => $this->getPath(),
				"images_hash"  => $this->getHash()
			);

		return $data;
	}
}

