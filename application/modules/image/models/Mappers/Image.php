<?php

class Image_Model_Mappers_Image
{
	protected  $_dbTable = null;

	public function getTable()
	{
		if(!isset($this->_dbTable))
		{
			$this->_dbTable = new Image_Model_DbTable_Images();
		}

		return $this->_dbTable;
	}

	public function getModel(Zend_Db_Table_Row $row)
	{
		$model = new Image_Model_Image();

		$model->setId($row->images_id);
		$model->setUser($row->images_user);
		$model->setPath($row->images_path);
		$model->setHash($row->images_hash);

		return $model;
	}

	public function fetchSingle($id)
	{
		$row = $this->getTable()->fetchRow("images_id = " . (int) $id);

		if(is_null($row))
		{
			return false;
		}

		$model = $this->getModel($row);
		return $model;
	}

	public function fetchSingleByUser($user)
	{
		$select = $this->getModel()->select();
		$select->where("images_id = " . int($user) );
		$rows = $this->getTable()->fetchAll($select);

		$list = array();

		foreach ($rows as $row)
		{
			$model = $this->getModel($row);
			$list[] = $model;
		}

		return $list;
	}

	public function fetchSingleByPath($path)
	{
		$row = $this->getTable()->fetchRow("images_path = '".$path."'");

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
		$select->order("images_id ASC");

		$rows = $this->getTable()->fetchAll($select);
		$list = array();

		foreach ($rows as $row)
		{
			$model = $this->getModel($row);
			$list[] = $model;
		}

		return $list;
	}
}

