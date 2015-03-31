<?php
/**
 * myblog1
 * 
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Copyright (c) 2012 Travello GmbH
 */

/**
 * User user service
 * 
 * Handles the user user service
 * 
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Copyright (c) 2012 Travello GmbH
 */
class User_Service_User
{
    /**
     * Singleton instance for service objects
     *
     * @var User_Service_User
     */
    protected static $_instance = null;
    
    /**
     * Get singleton instance of User_Service_User
     *
     * @return User_Service_User
     */
    public static function getInstance()
    {
        // check for current object for requested class object
        if (!isset(self::$_instance) || null === self::$_instance)
        {
            // set singleton instance
            self::$_instance = new User_Service_User;
        }
    
        // return service instance
        return self::$_instance;
    }
    
    /**
     * Protected list of mappers
     */
    protected $_mapper = null;
    
    /**
     * Items per page
     * 
     * @var integer
     */
    protected $_items = 10;
    
    /**
     * Get user mapper
     * 
     * @return User_Model_Mappers_User
     */
    public function getUserMapper()
    {
        if (is_null($this->_mapper)) {
            $this->_mapper = new User_Model_Mappers_User();
        }
        
        return $this->_mapper;
    }
    
    /**
     * Fetch single user by id
     * 
     * @param integer $id user id
     * @return User_Model_User
     */
    public function fetchSingleById($id)
    {
        return $this->getUserMapper()->fetchSingle($id);
    }
    
    /**
     * Fetch single user by url
     * 
     * @param integer $url user url
     * @return User_Model_User
     */
    public function fetchSingleByUrl($url)
    {
        return $this->getUserMapper()->fetchSingleByUrl($url);
    }
    
    /**
     * Fetch users by group
     * 
     * @param integer $group group id
     * @return array list of User_Model_User
     */
    public function fetchListByGroup($group)
    {
        return $this->getUserMapper()->fetchListByGroup($group);
    }
    
    /**
     * Fetch all users
     * 
     * @param integer $page current page 
     * @param integer $items item number 
     * @return array list of User_Model_User
     */
    public function fetchListAll($page = 1, $items = null)
    {
        $userList = $this->getUserMapper()->fetchList();
        
        if (is_null($page))
        {
            $page = 1;
        }
        
        if (is_null($items))
        {
            $items = $this->_items;
        }
        
        return array_slice($userList, ($page - 1) * $items, $items);
    }
    
    /**
     * Page handling all users
     * 
     * @param integer $page current page 
     * @param integer $items item number 
     * @return array list of User_Model_User
     */
    public function pageListAll($page = 1, $items = null)
    {
        $userList = $this->getUserMapper()->fetchList();
        
        if (is_null($page))
        {
            $page = 1;
        }
        
        if (is_null($items))
        {
            $items = $this->_items;
        }
        
        return array('max' => count($userList), 'current' => $page, 'step' => $this->_items);
    }
    
    /**
     * Fetch author options
     * 
     * @return array option list 
     */
    public function fetchAuthorOptions()
    {
        $options = array();
        
        foreach ($this->getUserMapper()->fetchListByGroup('admin') as $user)
        {
            $options[$user->getId()] = $user->getName() . ' <' . $user->getEmail() . '>';
        }
        
        foreach ($this->getUserMapper()->fetchListByGroup('editor') as $user)
        {
            $options[$user->getId()] = $user->getName() . ' <' . $user->getEmail() . '>';
        }
        
        return $options;
    }
}
