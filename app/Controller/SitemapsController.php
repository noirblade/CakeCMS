<?php
class SitemapsController extends AppController{

	var $name = 'Sitemaps';
	var $uses = array('Article', 'Category');
	var $helpers = array('Time');
	var $components = array('RequestHandler');

	function index (){    
		$this->set('categories', $this->Category->find('all', array( 'fields' => array('date_added','id', 'title', 'slug'), 
						)));
		$this->set('posts', $this->Article->find('all', array( 'fields' => array('date_added','id', 'title'), 
							'conditions' => array('Article.single_category' => 0)
						)));
		Configure::write ('debug', 0);
	}
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
		$this->layout = false;
	}
}
