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
    }

    public function userAction()
    {
        // action body
    }


}







