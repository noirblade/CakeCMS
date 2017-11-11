<?php
App::import('Vendor/minify/min/lib/Minify/', 'HTML');
App::import('Vendor/minify/min/lib/Minify/', 'CommentPreserver');
App::import('Vendor/minify/min/lib/Minify/CSS/', 'Compressor');
App::import('Vendor/minify/min/lib/Minify/', 'CSS');
App::import('Vendor/minify/min/lib/', 'JSMin');

class MinifyCodeHelper extends AppHelper {
    public function afterRenderFile($file, $data) {
        if( Configure::read('debug') < 1 ) //works only e production mode
            $data = Minify_HTML::minify($data, array(
                'cssMinifier' => array('Minify_CSS', 'minify'),
                'jsMinifier' => array('JSMin', 'minify')
            ));
        return $data;
    }
}