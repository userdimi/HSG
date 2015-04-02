<?php

class User_Model_Mappers_User
{
	protected $_dbTable = null;

	public function getTable()
	{
		if(!isset($this->dbTable))
		{
			$this->_dbTable = new User_Model_DbTable_Users();
		}
		return $this->_dbTable;
	}

	public function getModel(Zend_Db_Table_Row $row)
	{
		$model = new User_Model_User();
		$model->setId($row->user_id); 
		$model->setDate($row->user_date);
		$model->setGroup($row->user_group);
		$model->setStatus($row->user_status);
		$model->setName($row->user_name);
		$model->setPassword($row->user_password);
		$model->setEmail($row->user_email);
		$model->setWebsite($row->user_website);
		$model->setUrl($row->user_url);

		return $model;
	}

	public function fetchSingle($id)
	{
		$row = $this->getTable()->fetchRow("user_id = '" . (int) $id ."'");


		if(is_null($row))
		{
			return false;
		}

		$model = $this->getModel($row);

		return $model;
	}

	public function fetchListByDate($date)
	{
		$select = $this->getTable()->select();
		$select->where("user_date = '".$date."'");
		$rows = $this->getTable()->fecthAll($select);

		$list = array();

		foreach ($rows as $row)
		{
			$model = $this->getModel($row);
			$list[] = $model;	
		}

		return $list;
	}

	public function fetchListByGroup($group)
	{
		$select = $this->getTable()->select();
		$select->where("user_group = '".$group."'");
		$rows = $this->getTable()->fetchAll($select);

		$list = array();
		foreach ($rows as $row)
		{
			$model = $this->getModel($row);
			$list[] = $model;
		}
		return $list;
	}

	public function fecthListByStatus($status)
	{
		$select = $this->getTable()->select();
		$select->where("user_status = '".$status."'");

		$rows = $this->getTable()->fetchAll($select);
		$list = array();
		foreach ($rows as $row)
		{
			$model = $this->getModel($row);
			$list[] = $model;
		}
		return $list;
	}

	public function fetchSingleByName($name)
	{
		$row = $this->getTable()->fetchRow("user_name = '".$name."'" );

		if(is_null($row))
		{
			return false;
		}

		$model = $this->getModel($row);
		return $model;
	}

	public function fetchSingleByPassword($password, $name)
	{
		$select = $this->getTable()->select();
		$select->where("user_name = '" . $name . "'");
		$select->where("user_password = '" . $password . "'");
		
		$row = $this->getTable()->fetchRow($select);

		if(is_null($row))
		{
			return false;
		}

		$model = $this->getModel($row);
		return $model;
	}

	public function fetchSingelByEmail($email)
	{
		$row = $this->getTable()->fetchRow("user_email = '".$email."'");

		if(is_null($row))
		{
			return false;
		}

		$model = $this->getModel($row);

		return $model;
	}

	public function fetchSingelByWebsite($website)
	{
		$row = $this->getTable()->fetchRow("user_website = '".$website."'");

		if(is_null($row))
		{
			return false;
		}

		$model = $this->getModel($row);

		return $model;
	}

	public function fetchSingelByUrl($url)
	{
		$row = $this->getTable()->fetchRow("user_url = '".$url."'");

		if(is_null($row))
		{
			return false;
		}

		$model = $this->getModel($row);

		return $model;
	}

	public function fetchList()
	{
		$select = $this->getTable()->select();
		$select->order("user_name ASC");
		$rows = $this->getTable()->fetchAll($select);

		$list = array();

		foreach ($rows as $row)
		{
			

			$model  = $this->getModel($row);	
			$list[] = $model;
		}
		return $list;
	}
}

