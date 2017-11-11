<div class="bgPic"><img src="/files/img/head.jpg" alt=""></div>

<div id="content" class="margin4">

    <div class="container">

        <div class="row padding7">

            <div class="span12">

                <h2 class="textAlignCenter margin8"><?php echo $article['Article']['title']; ?></h2>

                <div class="row">

                    <div class="span4">

                        <figure class="img-polaroid margin7 imStyle2">
                            <?php
                            if ($article['Article']['main_image']) {
                                echo $this->Image->resize('articles/' . $article['Article']['main_image'], 362, 228);
                            } else {
                                echo $this->Image->resize('psychotherapy-no-image.gif', 362, 228, array('alt' => $article['Article']['title'], 'title' => $article['Article']['title']));
                            }
                            ?>
                        </figure>

                    </div>

                    <div class="span8">

                        <h3><?php echo $article['Article']['short_text'] ?></h3>

                        <p class="noPadding"><?php echo $article['Article']['content']; ?></p>

                        <h3><?php echo __('Related articles'); ?></h3>

                        <ul class="list8">

                            <?php foreach ($related as $relArticle) { ?>
                                <li><?php echo $this->Html->link($relArticle['Article']['title'], '/' . Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($relArticle['Article']['title'], '-') . '/a/' . $relArticle['Article']['id'] ); ?></li>
                            <?php } ?>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
