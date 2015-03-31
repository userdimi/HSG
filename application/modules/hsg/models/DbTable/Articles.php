<?php
class Hsg_Model_DbTable_Articles extends Zend_Db_Table_Abstract
{
    protected $_name = 'hsg_articles'; // Der Tabellennamen
    protected $_primary = "article_id"; // Das Feldnamen des Primärschlüssels

    //Difinition einer Referenz zur Categorie und User Klasse
    protected $_referenceMap = array(

    		"Hsg_Model_DbTable_Categories" => array(
	    			"columns" => array("article_category"),
	    			"refTableClass" => "Hsg_Model_DbTable_Categories",
	    			"refColumns" => array("category_id")
    			),
    		"User_Model_DbTable_Users" => array(
    				"columns"=>array("article_user"),
    				"refTableClass" => "User_Model_DbTable_Users",
    				"refColumns" => array("user_id")
    			),
    		"Image_Model_DbTable_Images" => array(
    				"columns" => array("images_user"),
    				"refTableClass" => "Image_Model_DbTable_Images",
    				"refColumns" => "images_id"
    			)

    	);

}

