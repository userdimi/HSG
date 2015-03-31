<?php

class User_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';
    protected $_primary = 'user_id';

    protected $_referenceMap = array(
  
    		"Image_Model_DbTable_Images" => array(
    				"columns" => array("images_user"),
    				"refTableClass" => "Image_Model_DbTable_Images",
    				"refColumns" => "images_id"
    			)
        );

    protected $_dependentTables = array("Hsg_Model_DbTable_Articles");

}

