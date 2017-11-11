<?php
$this->set('channelData', array(
    'title' => __("Most Recent Posts"),
    'link' => $this->Html->url('/', true),
    'description' => __("Most recent posts."),
    'language' => 'en-us'
));


foreach ($posts as $post) {
    $postTime = strtotime($post['Article']['date_added']);

    $postLink = array(
        'controller' => 'posts',
        'action' => 'view',
        'year' => date('Y', $postTime),
        'month' => date('m', $postTime),
        'day' => date('d', $postTime),
        $post['Article']['slug']
    );

    $postLink = $this->Html->url( '/' . Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($post['Article']['title'], '-') . '/a/' . $post['Article']['id'], true );
    // Remove & escape any HTML to make sure the feed content will validate.
    $bodyText = h(strip_tags($post['Article']['content']));
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => $post['Article']['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $post['Article']['date_added']
    ));
}
?>
