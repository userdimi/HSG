<?php

class Hsg_Model_Mappers_Article
{
	protected $_dbTable = null;

	public function getTable()
	{
		if(!isset($this->_dbTable))
		{
			$this->_dbTable = new Hsg_Model_DbTable_Articles();
		}

		return $this->_dbTable;
	}

	public function getModel(Zend_Db_Table_Row $row)
	{

		$categoryMapper = new Hsg_Model_Mappers_Category();
		$categoryModel  = $categoryMapper->getModel($row->findParentRow('Hsg_Model_DbTable_Categories'));

		$userMapper = new User_Model_Mappers_User();
		$userModel  = $userMapper->getModel($row->findParentRow('User_Model_DbTable_Users'));
		
		$model = new Hsg_Model_Article();

		$model->setId($row->article_id);//
		$model->setDate($row->article_date);//
		$model->setStatus($row->article_status);//
		$model->setUser($userModel);//
		$model->setCategory($categoryModel);//
		$model->setTitle($row->article_title); //
		$model->setTeaser($row->article_teaser); //Nicht Notwendig
		$model->setText($row->article_text); // Nach text zu Suchen ist blödsinn
		$model->setUrl($row->article_url); //
		$model->setCount($row->article_count);//

		return $model;
	}

	public function fetchSingle($id)
	{
		$row = $this->getTable()->fetchRow("article_id = '". (int)$id ."'");

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
		$select->where("article_date = ?", $date);
		$select->where("article_status = ?", "approved");
		$select->order("article_date DESC");

		$rows = $this->getTable()->fetchAll($select);

		$list = array();

		foreach ($rows as $row)
		{
			$model = $this->getModel($row);
			$list[] = $model;
		}
		return $list;
	}

	public function fetchListByStatus($status)
	{
		$select = $this->getTable()->select();
		$select->where("article_status = ?", $status);
		$select->order("article_date DESC");

		$rows = $this->getTable()->fetchAll($select);

		$list = array();

		foreach ($rows as $row)
		{
			$model = $this->getModel($row);
			$list[] = $model;
		}
		return $list;
	}

	public function fetchListByUser($user)
	{
		$select = $this->getTable()->select();
		$select->where("article_user = ?", (int) $user);
		$select->where("article_status = ?", "apporved");
		$select->order("article_date DESC");

		$rows = $this->getTable()->fetchAll($select);

		$list = array();

		foreach ($rows as $row)
		{
			$model = $this->getModel($row);
			$list[] = $model;
		}
		return $list;
	}

	public function fetchSingleByCategory($category)
	{
		$select = $this->getTable()->select();
		$select->where("article_category = ?", (int) $category);
		$select->where("article_status = ?", "apporved");
		$select->order("article_date DESC");

		$rows = $this->getTable()->fetchAll($select);
		$list = array();

		foreach ($rows as $row) 
		{
			$model = $this->getModel($row);
			$list[] = $model;
		}

		return $list;
	}

	public function fecthListByTitle($title)
	{
		$select = $this->getTable()->select();
		$select->where("article_title LIKE ?", $title);
		$select->where("article_status = ?", "apporved");
		$select->order("article_date DESC");

		$rows = $this->getTable()->fecthAll($select);

		$list = array();

		foreach ($rows as $row)
		{
			$model = $this->getModel($row);
			$list[] = $model;	
		}

		return $list;
	}

	public function fetchSingleByUrl($url)
	{
		$row = $this->getTbale()->fetchRow(" article_url = '".$url."'");

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
		$select->order("article_date ASC");

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
