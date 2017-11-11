<?php
/**
 *
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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Психотерапия');
$cakeKeywords = __d('cake_dev', 'психотерапия, психотерапевт, терапия, карл юнг, юнг, депресия, тревожни разстройства, панически атаки');
?><!doctype html>
<html lang="bg">
<head>
    <?php echo $this->Html->charset(); ?>
    
    <title><?php echo $cakeDescription ?>: <?php echo $title_for_layout; ?></title>
    <meta name=viewport content="width=device-width, initial-scale=1">
	<?php

		echo $this->Html->meta('icon') . "\n";

        echo $this->Minify->css(array('bootstrap', 'font-awesome', 'responsive', 'touchTouch', 'style', 'jquery.cookiebar'));

		echo $this->Html->meta(
			'keywords',
			(isset($metaKeywords) && $metaKeywords != '' ? $metaKeywords : $cakeKeywords)
		) . "\n";

		if (isset($metaDescription) && $metaDescription != '') {
			echo $this->Html->meta(
				'description',
				$metaDescription
			) . "\n";
		}
		
		echo $this->Html->meta(
				__('Articles'),
				'/'. Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug(__('About psychotherapy'), '-') . '/1.rss',
				array('type' => 'rss')
				) . "\n";
		//echo $this->Html->script(array('bootstrap', 'jquery.carouFredSel-6.2.1', 'jquery.easing.1.3', 'jquery.mobilemenu', 'jquery.ui.totop', 'touchTouch.jquery', 'jquery.cookie', 'jquery.equalheights', 'jquery-migrate-1.1.1', 'jquery.touchSwipe.min', 'superfish', 'jquery-1.10.2.min'));
		//echo $this->Html->script(array( 'jquery-1.10.2.min', 'jquery-ui.min', 'jquery.carouFredSel-6.2.1', 'jquery.easing.1.3', 'jquery.mobilemenu', 'jquery.ui.totop', 'touchTouch.jquery', 'jquery.cookie', 'jquery.equalheights', 'jquery-migrate-1.1.1', 'jquery.touchSwipe.min', 'superfish', 'tinymce/tinymce.min.js')) . "\n";

	?>
	<!--[if lt IE 8]>
        <div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
    <![endif]-->
  <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/docs.css">
    <link rel="stylesheet" href="css/ie.css">
    <script src="assets/js/html5shiv.js"></script>
  <![endif]-->
<link rel="author" href="https://plus.google.com/105908252411777095757" />
<meta name="robots" content="index,follow,noarchive" />
<meta name="google-site-verification" content="S5lXUvUYQV7qielacgq_yH_KUGXTWWCuzfhR16uF_eA" />

    <?php if (isset($article)){ ?>
    <meta property="og:title" content="<?php echo $article['Article']['title']; ?>" />
    <meta property="og:url" content="<?php echo Router::fullBaseUrl() . '/' . $this->here; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="<?php echo strip_tags($article['Article']['short_text']) ?>" />
    <meta property="fb:app_id" content="1303699666328646" />
        <?php
        if ($article['Article']['main_image']) {
            echo '<meta property="og:image" content="' . Router::fullBaseUrl() . '/img/articles/' . $article['Article']['main_image'] . '" />';
        } else {
            echo '<meta property="og:image" content="' . Router::fullBaseUrl() . '/img/psychotherapy-no-image.gif" />';                                                                                                                                                                                                                                                                                                                                                               echo '<meta property="og:image" content="' . Router::fullBaseUrl() . '/img/psychotherapy-no-image.gif" />';
        } ?>
    <?php } ?>
</head>
<body>
<!-- header -->
<header>
    <div class="container">
        <div class="row">
            <div class="span12">                
                <h2 class="brand"><?php echo $this->Html->link($this->Html->image("/files/img/logo_psihoterapia.png",
											array("alt" =>  __('Начало - Психотерапевт'), 'title' =>  __('Начало - Психотерапевт'))),
									array('controller' => 'home', 
										'action' => 'index'),
									array('escape' => FALSE, 'title' => __('Начало - Психотерапевт'))
									); ?>

				</h2>
<!--menu-->
                <div class="navbar">
                     <div class="navbar-inner">
						 <div class="container">
							<div class="nav-collapse nav-collapse_ collapse">
								<ul class="sf-menu menu">

					<?php
						end($menuCategories);
						$lastCat = key($menuCategories);
						foreach ($menuCategories as $key => $cat) {
					?>
									<li class="<?php if ($cat['children']) { ?> sub-menu <?php } ?> <?php if ($lastCat == $key) { ?> last <?php } ?> ">
							<?php echo $this->Html->link('<span>'.$cat['Category']['title'] . '</span>', '/'. Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($cat['Category']['slug'] ? $cat['Category']['slug'] :  $cat['Category']['title'], '-') . '/' . $cat['Category']['id'], array('escape' => FALSE, 'title' => $cat['Category']['title']));  ?>
						<?php if ($cat['children']) { ?>
							<ul class="nav sub-menu">
								<?php
									end($cat['children']);
									$lastSubCat = key($cat['children']);
									foreach ($cat['children'] as $key => $subCat) {
								?>
														<li class="<?php if ($subCat['children']) { ?> sub-menu <?php } ?> <?php if ($lastSubCat == $key) { ?> last <?php } ?>">
										<?php echo $this->Html->link('<span>'.$subCat['Category']['title'] . '</span>', '/'. Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($subCat['Category']['slug'] ? $subCat['Category']['slug'] : $subCat['Category']['title'], '-') . '/' . $subCat['Category']['id'], array('escape' => FALSE, 'title' => $subCat['Category']['title']));  ?>
								<?php if ($subCat['children']) { ?>
									<ul class="nav sub-menu">
										<?php
											end($subCat['children']);
											$lastSubSubCat = key($subCat['children']);
											foreach ($subCat['children'] as $key => $subSubCat) {
										?>
										<li class="<?php if ($lastSubSubCat == $key) { ?> last <?php } ?>">
											<?php echo $this->Html->link('<span>'.$subSubCat['Category']['title'] . '</span>', '/'. Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($subSubCat['Category']['slug'] ? $subSubCat['Category']['slug'] : $subSubCat['Category']['title'], '-') . '/'. $subSubCat['Category']['id'], array('escape' => FALSE, 'title' => $subSubCat['Category']['title']));  ?>
										</li>
										<?php } ?>
									</ul>
								<?php } ?>

								</li>
								<?php } ?>
							</ul>
						<?php } ?>
									</li>
					<?php } ?>
					</ul>
							</div>
						 </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line"></div>
</header>
<!-- content -->

<?php
/*
foreach(Configure::read('Config.languages') as $code => $language) { // show links for translated version
	echo $this->Html->link($language, array(
		'controller' => 'pages',
		'action' => 'display',
		'home',
		'language' => $code)) .' ';
}

echo $this->Html->link(__('register', true), array( // show link to registartion page
	'controller' => 'users',
	'action' => 'register'));
*/
?>

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>


<!-- footer -->
<footer>
    <div>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <p>Психотерапия &copy; <?php echo date('Y'); ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--<script src="/js/bootstrap.js"></script>-->
<script>
/*
    $(function (){
        // Responsive layout, resizing the items        
        $('#carousel1').carouFredSel({
            auto: false,
            responsive: true,
            width: '100%',      
            scroll: 1,
            prev: '#prev',
            next: '#next',
            pagination: false,
            mousewheel: false,
            swipe: {
                onMouse: true,
                onTouch: true
            },
            items: {
                width: 200,
                height: 250,   //  optionally resize item-height
                visible: {
                    min: 1,
                    max: 6
                }
            }
        });
        $('.list_carousel ul > li > a').touchTouch();
    })
*/
</script>
<?php echo $this->Js->writeBuffer();?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48400263-1', 'psyhoterapia.com');
  ga('send', 'pageview');

</script>

<?php
//echo $this->Html->script(array( 'jquery-1.10.2.min', 'jquery-ui.min', 'jquery.carouFredSel-6.2.1', 'jquery.easing.1.3', 'jquery.mobilemenu', 'jquery.ui.totop', 'touchTouch.jquery', 'jquery.cookie', 'jquery.equalheights', 'jquery-migrate-1.1.1', 'jquery.touchSwipe.min', 'superfish', 'tinymce/tinymce.min.js')) . "\n";

echo $this->Minify->script(array('jquery-1.10.2.min', 'jquery-ui.min', 'jquery.carouFredSel-6.2.1', 'jquery.easing.1.3', 'jquery.mobilemenu', 'jquery.ui.totop', 'touchTouch.jquery', 'jquery.cookie', 'jquery.equalheights', 'jquery-migrate-1.1.1', 'jquery.touchSwipe.min', 'superfish', 'jquery.cookiebar'));
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.menu').mobileMenu({defaultText: 'Начална страница',});
		$.cookieBar({
			message: 'Сайтът използва бисквитки за да може да предостави възможно най - доброто представяне за Вас. Ако продължите да използвате този сайт - считам, че сте съгласни с това',
			acceptText: 'Приемам',
			fixed: true,
			zindex: 9999,
			bottom: true
		});
	});
</script>
</body>
</html>
