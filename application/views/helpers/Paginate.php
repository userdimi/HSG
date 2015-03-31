<?php
class Application_View_Helper_Paginate extends Zend_View_Helper_Abstract
{

	function paginate($url, $pageHandling)
	{
		
		$max = ceil($pageHandling['max'] / $pageHandling['step']);
		$current = $pageHandling['current'];

		$output = 'Seiten |';

		$output.= ($current > 10) ? ' [<a href="' . $this->view->url(array_merge($url, array('page' => $current - 10))) . '">-10</a>] | ' : '';
        $output.= ($current >  3) ? ' <a href="' . $this->view->url(array_merge($url, array('page' => 1))) . '">1</a> | ... | ' : '';
        $output.= (($current - 2) > 0) ? ' <a href="' . $this->view->url(array_merge($url, array('page' => $current - 2))) . '">' . ($current - 2) . '</a> | ' : '';
        $output.= (($current - 1) > 0) ? ' <a href="' . $this->view->url(array_merge($url, array('page' => $current - 1))) . '">' . ($current - 1) . '</a> | ' : '';
        $output.= ' <a href="' . $this->view->url(array_merge($url, array('page' => $current))) . '"><strong>' . ($current) . '</strong></a> | ';
        $output.= (($current + 1) <= $max) ? ' <a href="' . $this->view->url(array_merge($url, array('page' => $current + 1))) . '">' . ($current + 1) . '</a> | ' : '';
        $output.= (($current + 2) <= $max) ? ' <a href="' . $this->view->url(array_merge($url, array('page' => $current + 2))) . '">' . ($current + 2) . '</a> | ' : '';
        $output.= (($current + 3) <= $max) ? ' ... | <a href="' . $this->view->url(array_merge($url, array('page' => $max))) . '">' . ($max) . '</a> | ' : '';
        $output.= (($current + 10) <= $max) ? ' [<a href="' . $this->view->url(array_merge($url, array('page' => $current + 10))) . '">+10</a>] | ' : '';
        
        return $output;

		Zend_Debug::dump($url);
		Zend_Debug::dump($pageHandling);
	}
}
?>