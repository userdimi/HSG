<?php

class Hsg_Model_Mappers_Category
{
	protected $_dbTable = null; //Instanz der Datenquelle

	public function getTable()
	{
		if(!isset($this->_dbTable))
		{
			$this->_dbTable = new Hsg_Model_DbTable_Categories();
		}
		return $this->_dbTable;
	}

	public function getModel(Zend_Db_Table_Row $row)
	{
		$model = new Hsg_Model_Category();
		$model->setId($row->category_id);
		$model->setName($row->category_name);
		$model->setUrl($row->category_url);

		return $model;
	}

	public function fetchSingle($identifier)
	{ 
		$row = $this->getTable()->fecthRow('category_id = "' . (int) $identifier .'"');

		if(is_null($row))
		{
			return false;
		}

		$model = $this->getModel($row);
		return $model;
	}

	public function fetchSingleByUrl($url)
	{
		$row = $this->getTabel()->fetchRow("category_url = '".$url."'");

		if(!is_null($row))
		{
			return false;
		}
		
		$model = $this->getModel($row);
		return $model;
	}

	public function fetchList()		
	{
		$select = $this->getTable()->select();
		$select->order("category_name ASC");

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

