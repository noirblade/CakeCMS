<?php
App::uses('AppController', 'Controller', 'String', 'Utility');
/**
 * Articles Controller
 *
 * @property Article $Article
 * @property PaginatorComponent $Paginator
 */
class ArticlesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

	public $helpers = array('Text');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->RequestHandler->isRss() ) {
		        $posts = $this->Article->find(
		            'all',
		            array('limit' => 20, 'order' => 'Article.date_added DESC',
			    	'conditions' => array('Article.single_category' => 0),
				)
        		);
		        $this->set(compact('posts'));
                return;
    		}

		$this->Article->recursive = 0;
		$this->Paginator->settings = array(
                        'limit' => 20,
                        'contain' => array('Article'),
			'order' => 'Article.date_added DESC',
                        'joins' => array(
                                array(
					'table' => 'articles_categories',
                                        'alias' => 'Articles_Categories',
                                        'type' => 'LEFT',
                                        'conditions' => array(
                                                'Articles_Categories.article_id = Article.id'
                                                )
                                )
                        )
                );
		$options = "";
		if (isset($this->request->params['categoryId'])) {
			$options = 'Articles_Categories.category_id = ' . $this->request->params['categoryId'];
		}
		$this->loadModel('Category');
		
		if (isset($this->request->params['categoryId'])) {
			$category = $this->Category->find('first', array('conditions' => array('Category.' . $this->Category->primaryKey => $this->request->params['categoryId'])));
			
			$correctUrl = '/'. Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($category['Category']['slug'] ? $category['Category']['slug'] :  $category['Category']['title'], '-') . '/' . $category['Category']['id'];
			if ($correctUrl != urldecode($this->request->here)){
				$this->redirect($correctUrl);
			}

			$this->set('category', $category);
			$this->set('title_for_layout', $category['Category']['title']);

            $this->set('metaDescription', String::truncate(
                preg_replace( "/\r|\n|'|\"/", " ",strip_tags($category['Category']['title'] . ' ' . __('Articles'))),
                160,
                array(
                    'ellipsis' => '...',
                    'exact' => false,
                    'html' => false,
                )
            )
            );
		}
		$articles = $this->Paginator->paginate('Article', $options);
		if (count($articles) == 1 && isset($this->request->params['categoryId'])){
			#$this->redirect(array('controller' => 'articles', 'action' => 'view', $articles[0]['Article']['id'], 'page'));
			//$this->redirect('/' . Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($articles[0]['Article']['title']) . '/a/' . $articles[0]['Article']['id'] . '/page/');
			$this->view($articles[0]['Article']['id'], 'page');
		}
		$this->set('articles', $articles);
	}

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view', 'viewAmp');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $template = null) {


		if (!$this->Article->exists($id)) {
			throw new NotFoundException(__('Invalid article'));
		}
		$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
		$article = $this->Article->find('first', $options);
		

		if ($article['Article']['single_category'] > 0 && $template != 'page'){
			$this->loadModel('Category');
			$category = $this->Category->find('first', array('conditions' => array('Category.id' => $article['Article']['single_category'])));

			$this->redirect('/' . Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($category['Category']['slug'] ? $category['Category']['slug'] :  $category['Category']['title'], '-') . '/' . $category['Category']['id']);
		}
	

		if ($template != 'page') {
			$correctUrl = '/' . Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($article['Article']['title'], '-') . '/a/' . $article['Article']['id'];
			if ($correctUrl != urldecode($this->request->here)){
				$this->redirect($correctUrl, 301);
			}
		}

		$this->set('title_for_layout', String::truncate($article['Article']['title'],
            41,
            array(
            'ellipsis' => '',
            'exact' => false,
            'html' => false,
            )
        ));


		$this->set('metaDescription', String::truncate(
							preg_replace( "/\r|\n|'|\"/", " ",strip_tags($article['Article']['content'])),
							160,
							array(
								'ellipsis' => '...',
								'exact' => false,
								'html' => false,
							)
							)
						);
		$this->set('article', $article);

		if (isset($article['Article']['template']) && $article['Article']['template'] != '') {
			$template = $article['Article']['template'];
		}
		

		if (isset($article['Category']) && $article['Category'][0]['id'] > 0) {
            $relatedCategory = $this->Category->find('first', array('conditions' => array('Category.id' => $article['Category'][0]['id'])));
			$related = $this->Article->find('all', array(
								'joins' => array(
									array(
										'table' => 'articles_categories',
										'alias' => 'Articles_Categories',
										'type' => 'LEFT',
										'conditions' => array(
											'Articles_Categories.article_id = Article.id',
											'Article.id != ' . $id
											)
									)
								    ),
								'conditions' => array('Articles_Categories.category_id' => $article['Category'][0]['id'])
								) 
							);
            $this->set('relatedCategory', $relatedCategory);
			$this->set('related', $related);
		}
		if ($template){
			$this->autoRender = false;
			$this->render($template);
		}
	}


    public function viewAmp($id = null) {


        if (!$this->Article->exists($id)) {
            throw new NotFoundException(__('Invalid article'));
        }
        $options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
        $article = $this->Article->find('first', $options);

        $this->set('title_for_layout', $article['Article']['title']);


        $this->set('metaDescription', String::truncate(
            preg_replace( "/\r|\n|'|\"/", " ",strip_tags($article['Article']['content'])),
            160,
            array(
                'ellipsis' => '...',
                'exact' => false,
                'html' => false,
            )
        )
        );
        $this->set('article', $article);

        $this->autoRender = false;
        $this->render('amp');
    }

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
				$data = $this->request->data;
				if ($this->data['Article']['image'] && isset($this->data['Article']['image']['tmp_name']) && file_exists($this->data['Article']['image']['tmp_name'])){
					$articleId = $this->Article->getInsertID();
					$filename = sprintf('art_%d.jpg', $articleId);
					$filepath = WWW_ROOT . 'img/articles/';
					move_uploaded_file($this->data['Article']['image']['tmp_name'], $filepath . $filename);
					$data['Article']['main_image'] = $filename;
					$data['Article']['date_added'] = DboSource::expression('NOW()');
					$this->Article->save($data);
				}

				$this->Session->setFlash(__('The article has been saved.'));
				$this->redirect(array('action' => 'index'));
                return;
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Article->Category->find('list');
		$this->set(compact('parentArticles', 'categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Article->exists($id)) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$data = $this->request->data;
			if ($this->data['Article']['image'] && isset($this->data['Article']['image']['tmp_name']) && file_exists($this->data['Article']['image']['tmp_name'])){
				//$articleId = $this->Article->getInsertID();
				$filename = sprintf('art_%d.jpg', $id);
				$filepath = WWW_ROOT . 'img/articles/';
				move_uploaded_file($this->data['Article']['image']['tmp_name'], $filepath . $filename);
				$data['Article']['main_image'] = $filename;
			}
			if ($this->Article->save($data)) {
				$this->Session->setFlash(__('The article has been saved.'));
				$this->redirect(array('action' => 'index'));
                return;
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
			$this->request->data = $this->Article->find('first', $options);
		}
		$categories = $this->Article->Category->find('list');
		$this->set(compact('parentArticles', 'categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Article->delete()) {
			$this->Session->setFlash(__('The article has been deleted.'));
		} else {
			$this->Session->setFlash(__('The article could not be deleted. Please, try again.'));
		}
		$this->redirect(array('action' => 'index'));
        return;
	}}
