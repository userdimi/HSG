<?php

class Hsg_IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        
        $page = $this->getRequest()->getParam('page');

        $articleService = Hsg_Service_Article::getInstance();
        $articleList    = $articleService->fetchListAll($page);
        $pageHandling   = $articleService->pageListAll($page);

        if(empty($articleList) && $page > 0)
        {
            return $this->_redirect($this->getHelper('url')->url(
                    array(
                        'module' => 'hsg',
                        'controller' => 'index',
                        'action' => 'index',
                    ),
                    'default', true)
                );
        }

        $this->view->articleList   = $articleList;
        $this->view->pageHandling  = $pageHandling;
    }

    public function showAction()
    {
        // action body
        $id = $this->getRequest()->getParam('id');
        $articleService = Hsg_Service_Article::getInstance();
        $article = $articleService->fetchSingleById($id);

        if(!$article)
        {
            return $this->_redirect($this->getHelper('url')->url(array(
                    'module'=>'hsg', 'controller'=>'index', 'action'=>'index'
                ), 'default', true));
        }

        $this->view->article = $article;
    }

    public function categoryAction()
    {
        // action body
        $page = $this->getRequest()->getParam('page');
        $id   = $this->getRequest()->getParam('id');

        $categoryService = Hsg_Service_Category::getInstance();
        $category        = $categoryService->fetchSingleById($id);

        $articleService = Hsg_Service_Article::getInstance();
        $articleList    = $articleService->fetchListByCategory($id, $page);
        $pageHandling   = $articleService->pageListByCategory($id, $page);

        if(empty($articleList) && $page > 0)
        {
            $redirectArray = array('module'=>'hsg',
                                   'controller'=>'index',
                                   'action'=>'category',
                                   'id'=>$id
                                );
            return $this->_redirect($this->getHelper('url')->url($redirectArray,'default', true));
        }

        $this->view->category      = $category;
        $this->view->articleList   = $articleList;
        $this->view->pageHandling  = $pageHandling;
    }

    public function userAction()
    {
        // action body
        $page = $this->getRequest()->getParam('page');
        $id   = $this->getRequest()->getParam('id');;
        
        $userService = User_Service_User::getInstance();
        $user = $userService->fetchSingleById($id);
        
        $articleService = Hsg_Service_Article::getInstance();
        $articleList    = $articleService->fetchListByUser($id, $page);
        $pageHandling   = $articleService->pageListByUser($id, $page);
        
        if (empty($articleList) && $page > 0)
        {
            $redirectArray = array('module'=>'hsg',
                                   'controller'=>'index',
                                   'action'=>'user',
                                   'id'=>$id
                                );
            return $this->_redirect($this->getHelper('url')->url($redirectArray, 'default', true));
        }
        
        $this->view->user          = $user;
        $this->view->articleList   = $articleList;
        $this->view->pageHandling  = $pageHandling;
    }


}







