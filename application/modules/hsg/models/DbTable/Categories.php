<?php

class Hsg_Model_DbTable_Categories extends Zend_Db_Table_Abstract
{

    protected $_name = 'hsg_categories';
    protected $_primary = 'category_id';

    protected $_dependentTables = array("Hsg_Model_DbTable_Articles");
}

