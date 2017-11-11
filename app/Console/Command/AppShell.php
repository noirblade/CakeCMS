<?php
/**
 * AppShell file
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
 * @since         CakePHP(tm) v 2.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Shell', 'Console');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * Application Shell
 *
 * Add your application-wide methods in the class below, your shells
 * will inherit them.
 *
 * @package       app.Console.Command
 */
class AppShell extends Shell {

    public function getFeed() {

        ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
        $dir = new Folder('');
        $feed = file_get_contents('http://terziev.name/feed/');
        $file = new File($dir->pwd() . DS . 'terziev_feed.xml');
        $file->write($feed);
    }
}
