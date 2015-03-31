<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
         return $this->_redirect($this->getHelper('url')->url(array(
        		'module' => 'hsg', 'controller' => 'index', 'action' => 'index'
    			), 'default', true));

    }


}

