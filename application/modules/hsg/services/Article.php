<?php
class Hsg_Service_Article
{

	protected static $_instance = null;

	public static function getInstance()
	{
		//Prüft das aktuelle Objekt
		if(!isset(self::$_instance) || null === self::$_instance)
		{
			//Erstellt eine Singleton instanz
			self::$_instance = new Hsg_Service_Article;
		}

		return self::$_instance;
	}

	protected $_mapper = null;
	protected $_items   = 10;

	public function getArticleMapper()
	{
		if(!isset($this->_mapper))
		{
			$this->_mapper = new Hsg_Model_Mappers_Article();
		}

		return $this->_mapper;
	} 

	public function fetchSingleById($id)
	{
		return $this->getArticleMapper()->fetchSingle($id);
	}

	public function fetchSingleByUrl($url)
	{
		return $this->getArticleMapper()->fetchSingleByUrl($url);
	}

	public function fetchListByUser($user, $page = 1, $items = null)
	{
		$articleList = $this->getArticleMapper()->fetchListByUser($user);

		if(is_null($page))
		{
			$page = 1;
		}

		if(is_null($items))
		{
			$items = $this->_items;
		}

		return array_slice($articleList, ($page * 1) * $items, $items);
	}


	public function pageListByUser($user, $page = 1, $items = null)
	{
		$articleList = $this->getArticleMapper()->fetchListByUser($user);

		if(is_null($page))
		{
			$page = 1;
		}

		if(is_null($items))
		{
			$items  = $this->_items;
		}

		return array("max" => cout($articleList), "current" => $page, "step"=>$this->_items);
	}

	public function fetchListByStatus($status,$page = 1, $items = null)
	{
		$articleList = $this->getArticleMapper()->fetchListByStatus($status);

		if(is_null($page))
		{
			$page = 1;
		}

		if(is_null($items))
		{
			$items = $this->_items;
		}

		return array_slice($articleList,($page * 1) * $items, $items);
	}

	public function pageListByStatus($status,$page = 1, $items = null)
	{
		$articleList = $this->getArticleMapper()->fetchListByStatus($status);

		if(is_null($page))
		{
			$page = 1;
		}

		if(is_null($items))
		{
			$items = $this->_items;
		}

		return array("max"=>count($articleList), "current" => $page, "step"=>$this->_items);
	}

	

	public function fetchListAll($page = 1, $items = null)
	{
		$articleList = $this->getArticleMapper()->fetchList();

		if(is_null($page))
		{
			$page = 1;
		}

		if(is_null($items))
		{
			$items = $this->_items;
		}

		//echO "<pre>";
 		//print_r(array_slice($articleList, ($page - 1) * $items, $items));
 		//echo "</pre>";

		return array_slice($articleList, ($page - 1) * $items, $items);
	}

	public function pageListAll($page = 1, $items = null)
	{
		$articleList = $this->getArticleMapper()->fetchList();



		if(is_null($page))
		{
			$page = 1;
		}

		if(is_null($items))
		{
			$items = $this->_items;
		}

		return array("max"=>count($articleList), "current"=>$page, "step"=>$items);

	}
	
}
