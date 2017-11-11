<div id="content">
    <div id="camera_1">

        <div class="container">

            <div class="row">

                <div class="span12">

                    <div class="camera_caption">
                        <p>
				Принципната цел на психотерапията не е да доведе някого до невъзможно състояние на щастие, а да помогне за придобиването на твърдост и търпение в лицето на страданието
			</p>

			<p>
			К. Г. Юнг
			</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="container">

        <div class="row">

            <div class="span12">

                <div class="padding1">

                    <h2 class="textAlignCenter"><?php echo __('Get professional psychological help')?></h2>

                    <ul class="list1 row">
			<?php foreach ($lastArticles as $article) { ?>
                        <li class="span4">
				
                            <figure class="img-polaroid margin1"><?php
								if ($article['Article']['main_image']) { 
									echo $this->Image->resize('articles/' . $article['Article']['main_image'], 362, 228, array('alt' => $article['Article']['title'], 'title' => $article['Article']['title'])); 
								} else {
									echo $this->Image->resize('psychotherapy-no-image.gif', 362, 228, array('alt' => $article['Article']['title'], 'title' => $article['Article']['title']));
								}
								?></figure>

                            <time datetime="<?php echo $this->Time->i18nFormat($article['Article']['date_added'], '%Y-%m-%d'); ?>"><?php
						echo $this->Time->i18nFormat($article['Article']['date_added'], '%B, %d, %Y');
						?>
				</time>

                            <h3><?php echo $article['Article']['title']?></h3>

                            <p class="padding2"><?php echo strip_tags($article['Article']['short_text']);?></p>

                            <p><?php echo $this->Html->link(__('Read More'), '/' . Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($article['Article']['title'], '-') . '/a/' . $article['Article']['id'], array('class' => 'btn')); ?></p>

                        </li>
			<?php } ?>
			<!--
                        <li class="span4">

                            <figure class="img-polaroid margin1"><img src="/files/img/page1_pic1.jpg" alt=""></figure>

                            <time datetime="2013-08-14">August 14, 2013</time>

                            <h3>Mood disorders</h3>

                            <p class="padding2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque...</p>

                            <p><a href="#" class="btn">Read More</a></p>

                        </li>

                        <li class="span4">

                            <figure class="img-polaroid margin1"><img src="/files/img/page1_pic2.jpg" alt=""></figure>

                            <time datetime="2013-08-14">August 14, 2013</time>

                            <h3>Family health</h3>

                            <p class="padding2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque...</p>

                            <p><a href="#" class="btn">Read More</a></p>

                        </li>

                        <li class="span4">

                            <figure class="img-polaroid margin1"><img src="/files/img/page1_pic3.jpg" alt=""></figure>

                            <time datetime="2013-08-14">August 14, 2013</time>

                            <h3>Emotional difficulties</h3>

                            <p class="padding2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque...</p>

                            <p><a href="#" class="btn">Read More</a></p>

                        </li>
			-->
                    </ul>

                </div>

            </div>

        </div>

    </div>

    <div class="bg1">

        <div class="container">

            <div class="row">

                <div class="span5">

                    <h2 class="special">Карл Густав Юнг за сянката, която всички носим в себе си</h2>

                    <p>За съжаление не може да има никакво съмнение, че човек е, като цяло, по-малко добро, отколкото той си представя себе си или иска да бъде. Всеки носи сянка, и колкото по-малко тя е интегрирана в съзнателния живот на индивида, толкова по - черна и по-плътна е тя.</p>

                    <p class="padding3">К.Г.Юнг</p>

                    <p>

			<?php echo $this->Html->link(__('More about psychotherapy'), '/'. Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug(__('About psychotherapy'), '-') . '/1', array('escape' => FALSE, 'class' => 'btn btn-info', 'title' => __('More about psychotherapy')));  ?>
			<!--<a href="index-3.html" class="btn btn-info"><?php echo __('More articles'); ?></a></p>-->

                </div>

                <div class="span6 offset1">
                    <div class="fw_video"><iframe width="420" height="315" src="//www.youtube.com/embed/zMHqqXYaB8g" allowfullscreen></iframe></div>

                </div>

            </div>

        </div>

    </div>

<!--
    <div class="container">

        <div class="row">

            <div class="span12">

                <div class="padding4 textAlignCenter">

                    <h2>Heal your mind and soul</h2>

                    <ul class="list2 row">

                        <li class="span2">

                            <span class="badge"><img src="/files/img/page1_icon1.png" alt=""></span>

                            <h4><a href="#">Quisque nulla</a></h4>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque... laudantium, totam rem </p>

                            <p><a href="#" class="btn">Learn More</a></p>

                        </li>

                        <li class="span2">

                            <span class="badge"><img src="/files/img/page1_icon2.png" alt=""></span>

                            <h4><a href="#">Vestibulum libero</a></h4>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque... laudantium, totam rem </p>

                            <p><a href="#" class="btn">Learn More</a></p>

                        </li>

                        <li class="span2">

                            <span class="badge"><img src="/files/img/page1_icon3.png" alt=""></span>

                            <h4><a href="#">Porta vel sceleris</a></h4>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque... laudantium, totam rem </p>

                            <p><a href="#" class="btn">Learn More</a></p>

                        </li>

                        <li class="span2">

                            <span class="badge"><img src="/files/img/page1_icon4.png" alt=""></span>

                            <h4><a href="#">Scelerisque eget</a></h4>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque... laudantium, totam rem </p>

                            <p><a href="#" class="btn">Learn More</a></p>

                        </li>

                        <li class="span2">

                            <span class="badge"><img src="/files/img/page1_icon5.png" alt=""></span>

                            <h4><a href="#">Vivamus cursus</a></h4>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque... laudantium, totam rem </p>

                            <p><a href="#" class="btn">Learn More</a></p>

                        </li>

                        <li class="span2">

                            <span class="badge"><img src="/files/img/page1_icon6.png" alt=""></span>

                            <h4><a href="#">Suspendisse</a></h4>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque... laudantium, totam rem </p>

                            <p><a href="#" class="btn">Learn More</a></p>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>
-->

<!--
    <div class="bg2">

        <div class="container">

            <div class="row">

                <div class="span12">

                    <h2 class="color1 textAlignCenter margin3">Build a stronger you!</h2>

                    <div id="carousel" class="list_carousel responsive">

                        <div class="btnsHolder">

                            <a id="prev"  href="javascript:;"><i class="icon-angle-left"></i></a>

                            <a id="next"  href="javascript:;"><i class="icon-angle-right"></i></a>

                        </div>

                        <ul id="carousel1">

                            <li>

                                <a href="/files/img/page1_pic4_big.jpg"><figure class="img-polaroid"><img src="/files/img/page1_pic4.jpg" alt></figure></a>

                                <h5>Vestibulum iaculis lacinia est</h5>

                                <p><a href="#" class="btn btn-link">Click Here</a></p>

                            </li>

                            <li><a href="img/page1_pic5_big.jpg"><figure class="img-polaroid"><img src="/files/img/page1_pic5.jpg" alt></figure></a><h5>Vestibulum iaculis lacinia est</h5>

                                <p><a href="#" class="btn btn-link">Click Here</a></p></li>

                            <li><a href="img/page1_pic6_big.jpg"><figure class="img-polaroid"><img src="/files/img/page1_pic6.jpg" alt></figure></a><h5>Vestibulum iaculis lacinia est</h5>

                                <p><a href="#" class="btn btn-link">Click Here</a></p></li>

                            <li><a href="img/page1_pic7_big.jpg"><figure class="img-polaroid"><img src="/files/img/page1_pic7.jpg" alt></figure></a><h5>Vestibulum iaculis lacinia est</h5>

                                <p><a href="#" class="btn btn-link">Click Here</a></p></li>

                            <li><a href="img/page1_pic8_big.jpg"><figure class="img-polaroid"><img src="/files/img/page1_pic8.jpg" alt></figure></a><h5>Vestibulum iaculis lacinia est</h5>

                                <p><a href="#" class="btn btn-link">Click Here</a></p></li>

                            <li><a href="img/page1_pic9_big.jpg"><figure class="img-polaroid"><img src="/files/img/page1_pic9.jpg" alt></figure></a><h5>Vestibulum iaculis lacinia est</h5>

                                <p><a href="#" class="btn btn-link">Click Here</a></p></li>



                            <li><a href="img/page1_pic6_big.jpg"><figure class="img-polaroid"><img src="/files/img/page1_pic6.jpg" alt></figure></a><h5>Vestibulum iaculis lacinia est</h5>

                                <p><a href="#" class="btn btn-link">Click Here</a></p></li>

                        </ul>  

                    </div>

                </div>

            </div>

        </div>

    </div>
-->


    <div class="container">

        <div class="padding5">

            <ul class="list4 row">

                <?php foreach ($moreArticles as $article) { ?>
                <li class="span4">

                    <h2 class="style2"><?php echo $article['Article']['title']?><span><time datetime="<?php echo $this->Time->i18nFormat($article['Article']['date_added'], '%Y-%m-%d'); ?>"><?php
                                echo $this->Time->i18nFormat($article['Article']['date_added'], '%B, %d, %Y');
                                ?>
                            </time></span></h2>

                    <p class="padding6"><?php echo strip_tags($article['Article']['short_text']);?></p>

                    <p><?php echo $this->Html->link(__('Read More'), '/' . Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($article['Article']['title'], '-') . '/a/' . $article['Article']['id'], array('class' => 'btn')); ?></p>

                </li>
                <?php } ?>

                <!--
                <li class="span4">

                    <h2 class="style2">elementum velit Fusce<span>consequat ante Lorem</span></h2>

                    <p class="padding6">Vestibulum iaculis lacinia est. Pictum elementum velit. Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellensque sed dolor. Aliquam congue fermentum nisl. Mauris acsan nulla vel diam. Sed in lacus ut euet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor.</p>

                    <p><a href="#" class="btn">Read More</a></p>

                </li>

                <li class="span4">

                    <h2 class="style2">Pellentesque sed dol<span>consectetuer adipiscing </span></h2>

                    <p class="padding6">Vestibulum iaculis lacinia est. Pictum elementum velit. Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellensque sed dolor. Aliquam congue fermentum nisl. Mauris acsan nulla vel diam. Sed in lacus ut euet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor.</p>

                    <p><a href="#" class="btn">Read More</a></p>

                </li>
                -->
            </ul>

        </div>

    </div>

    <div class="bg3">

        <div class="container">

            <div class="row">

                <div class="span9 column2">

                    <div>

                        <p class="fontStyle1"><?php echo __('We are interested in hearing from you.') ?></p>

                        <p class="fontStyle2"><?php echo __('Write about your primary interest right now') ?></p>

                    </div>

                </div>

                <div class="span3 column2">

                    <!--<p class="pull-right margin2 buttonStyle1"><a class="btn btn-large" href="index-4.html">Submit the form</a></p>-->
		<p class="pull-right margin2 buttonStyle1"><?php echo $this->Html->link('<span>'. __('Submit the form') . '</span>', '/'. Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug(__('Contacts'), '-') . '/4', array('escape' => FALSE, 'class' => 'btn btn-large', 'title' => __('Submit the form')));  ?></p>

                </div>

            </div>

        </div>

    </div>
    <div class="bg4">

        <div class="container">

            <div class="row">

                <div class="span12 textAlignCenter">

                    <h2 class="color2"><?php echo __('From my blog') ?></h2>

                    <ul class="list3 row">

			<? foreach ($blogPosts as $post) { ?>
                        <li class="span4">

                            <div>

                                <h3><a href="<?php echo $post['link'] ?>"><?php echo $post['title'] ?></a></h3>

                                <div>

                                    <p class="fontStyle3">

                                        <time datetime="<?php echo $this->Time->format($post['pubDate'], '%Y-%m-%d'); ?>"><?php echo $this->Time->format($post['pubDate'], '%B %e, %Y %H:%M %p'); ?></time> // 

                                        <a href="<?php echo (isset($post['comments'][0]) && is_array($post['comments']) ? $post['comments'][0] : $post['comments']) ?>"><?php echo __('Comments') ?> <?php if(isset($post['slash:comments'])){ echo $post['slash:comments']; } else { echo 0; } ?></a> // <?php echo __('Author') ?> <?php echo (isset($post['creator']) ? $post['creator'] : $post['dc:creator']) ?>

                                    </p>

                                </div>

                                <p><?php echo preg_replace("/<img[^>]+\>/i", "", $post['description']); ?></p>

                            </div>

                        </li>
			<?php } ?>
                    </ul>
                    
			<div class="clearfix"></div>

                    <hr>

                    <h1 class="style3"><?php echo __('Get in touch') ?></h1>

                    <p class="fontStyle4"><?php echo __('Stay connected with me') ?></p>

                    <div class="clearfix"></div>
                    <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=160899437275294";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>


                    <div class="fb-page" data-href="https://www.facebook.com/TeodorTerzievPsychotherapy" data-tabs="timeline" data-width="500" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TeodorTerzievPsychotherapy" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TeodorTerzievPsychotherapy">Теодор Терзиев - Психотерапевт</a></blockquote></div>
                    <div class="clearfix"></div>

                    <div style="margin-top: 20px;">
                        <a data-pin-do="embedUser" data-pin-board-width="475" data-pin-scale-height="120" data-pin-scale-width="115" href="https://www.pinterest.com/teodorterziev/"></a>
                    </div>
                    <script async defer src="//assets.pinterest.com/js/pinit.js"></script>
                    <div class="clearfix"></div>

                    <div style="margin-top: 20px;">
                        <a class="twitter-timeline" data-width="500" data-height="250" href="https://twitter.com/TeoTerziev">Tweets by TeoTerziev</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                    <div class="clearfix"></div>

                    <div style="margin-top: 20px;">
                        <div class="fb-page" data-href="https://www.facebook.com/Psihoterapia" data-width="1500" data-height="200" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Psihoterapia"><a href="https://www.facebook.com/Psihoterapia">Психотерапия</a></blockquote></div></div>
                    </div>
                    <div class="clearfix"></div>

                    <ul class="soc_icons">
                        <li><a href="https://plus.google.com/+Psyhoterapiata"><i class="icon-google-plus"></i></a></li>
                        <li><a href="http://twitter.com/#!/TeoTerziev"><i class="icon-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/Psihoterapia"><i class="icon-facebook"></i></a></li>
                        <li><a href="https://www.pinterest.com/teodorterziev/"><i class="icon-pinterest"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/teodorterziev"><i class="icon-linkedin"></i></a></li>
			            <li><?php echo $this->Html->link('<i class="icon-rss"></i>', '/'. Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug(__('About psychotherapy'), '-') . '/1.rss', array('escape' => FALSE, 'title' => __('More about psychotherapy')));  ?></li>
                    </ul>

                </div>

            </div>

        </div>

    </div>
</div>