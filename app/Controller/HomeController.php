<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Articles Controller
 *
 * @property Article $Article
 * @property PaginatorComponent $Paginator
 */
class HomeController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array();

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->loadModel('Article');
		$lastArticles = $this->Article->find('all', array(
								'limit' => 3,
								'order' => 'Article.date_added DESC',
								'joins' => array(
									array(
										'table' => 'articles_categories',
										'alias' => 'Articles_Categories',
										'type' => 'INNER',
										'conditions' => array(
											'Articles_Categories.article_id = Article.id AND Articles_Categories.category_id = 1 '
											)
									)
								)
								));
		$lastArticleIds = array();
		foreach ($lastArticles as $article){
			$lastArticleIds[] = $article['Article']['id'];
		}

		$moreArticles = $this->Article->find('all', array(
			'limit' => 3,
			'order' => 'Article.date_added DESC',
			'joins' => array(
				array(
					'table' => 'articles_categories',
					'alias' => 'Articles_Categories',
					'type' => 'INNER',
					'conditions' => array(
						'Articles_Categories.article_id = Article.id AND Articles_Categories.category_id = 1 '
					)
				)
			),
			'conditions' => array(
				"NOT" => array( "Article.id" => $lastArticleIds )
			)
		));

		$dir = new Folder('');
        $errorFeed = false;
        if (!file_exists($dir->pwd() . DS . 'terziev_feed.xml') || filesize( $dir->pwd() . DS . 'terziev_feed.xml' ) == 0){
            ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
            $feed = file_get_contents('http://terziev.name/feed/');
            if ($feed === false){
                $errorFeed = true;
            } else {
                $file = new File($dir->pwd() . DS . 'terziev_feed.xml');
                $file->write($feed);
            }
        }

        if ($errorFeed === false){
            $xml = Xml::build($dir->pwd() . DS . 'terziev_feed.xml');
            $xmlArr = Xml::toArray($xml);
            $this->set('blogPosts', array_slice($xmlArr['rss']['channel']['item'], 0, 3));
        }

		$this->set('title_for_layout', __('Type of therapy used to treat mental health conditions'));
		$this->set('metaDescription', __('Depth psychotherapy'));
		$this->set('lastArticles', $lastArticles);
		$this->set('moreArticles', $moreArticles);
	}

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

}
