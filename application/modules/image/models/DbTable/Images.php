<?php

class Image_Model_DbTable_Images extends Zend_Db_Table_Abstract
{

    protected $_name = 'hsg_images';
    protected $_primary = 'images_id';

    protected $_referenceMap = array(
    		"User_Model_DbTable_Users" => array(
	    			"columns" => array("images_user"),
	    			"refTableClass" => "User_Model_DbTable_Users",
	    			"refColumns" => array("user_id")
    			)
    	);
    protected $_dependentTables = array("User_Model_DbTable_Users","Hsg_Model_DbTable_Articles");


}

