<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::parseExtensions('rss', 'xml');

	$language = substr(Router::url(''), 1, 3); // check that it works properly (sometimes You must trip part of url, for e.g. folder names)
	$languages = array_keys(Configure::read('Config.languages'));

	if(!in_array($language, array_diff($languages, array(DEFAULT_LANGUAGE)))) {
		$language = DEFAULT_LANGUAGE;
		$schema = '';
	} else {
		$schema = '/:language';
	}

	Configure::write('Config.language', $language);

	Router::connect('/sitemap', array('controller' => 'sitemaps', 'action' => 'index')); 

	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/', array('controller' => 'home', 'action' => 'index'));
	Router::connect('/:language/', array('controller' => 'home', 'action' => 'index'), array('language' => implode('|', $languages)));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	

	Router::connect($schema . '/' . __('psychotherapy') . '/:slug/:categoryId', array('controller' => 'articles', 'action' => 'index'), array('slug' => '[a-zA-Z0-9_-А-Яа-я-]+', 'categoryId' => '[0-9]+', 'language' => implode('|', $languages)));
	
	Router::connect($schema . '/' . __('psychotherapy') . '/:slug/a/:id', array('controller' => 'articles', 'action' => 'view'), array('slug' => '[a-zA-Z0-9_-А-Яа-я-]+', 'id' => '[0-9]+', 'pass' => array('id'), 'language' => implode('|', $languages)));
	
	Router::connect($schema . '/' . __('psychotherapy') . '/:slug/a/:id/:page', array('controller' => 'articles', 'action' => 'view'), array('slug' => '[a-zA-Z0-9_-А-Яа-я-]+', 'page' => '[a-zA-Z0-9_]+', 'id' => '[0-9]+', 'pass' => array('id', 'page'), 'language' => implode('|', $languages)));

    Router::connect($schema . '/' . __('psychotherapy') . '/:slug/amp/:id', array('controller' => 'articles', 'action' => 'viewAmp'), array('slug' => '[a-zA-Z0-9_-А-Яа-я-]+', 'page' => '[a-zA-Z0-9_]+', 'id' => '[0-9]+', 'pass' => array('id', 'page'), 'language' => implode('|', $languages)));
	

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
