<div class="bgPic"><img src="/files/img/head.jpg" alt="Психотерапия"></div>

<div id="content" class="margin4">

    <div class="container">

        <div class="row padding7" itemscope itemtype="http://schema.org/Article">

            <meta itemscope itemprop="mainEntityOfPage" content="" itemType="https://schema.org/WebPage" itemid="<?php echo $this->here; ?>"/>

            <div class="span12">

                <h1 class="textAlignCenter margin8 articleHead" itemprop="name"><?php echo $article['Article']['title']; ?></h1>

                <div class="row">

                    <div class="span4">

                        <figure class="img-polaroid margin7 imStyle2" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<?php 
					if ($article['Article']['main_image']) { 
						echo $this->Image->resize('articles/' . $article['Article']['main_image'], 362, 228, array('alt' => $article['Article']['title'], "itemprop" => "url", 'title' => $article['Article']['title']));
                        //echo '<meta itemprop="url" content="' . Router::fullBaseUrl() . '/img/articles/' . $article['Article']['main_image'] . '">';
					} else {
						echo $this->Image->resize('psychotherapy-no-image.gif', 362, 228, array('alt' => $article['Article']['title'], "itemprop" => "url", 'title' => $article['Article']['title']));
                        //echo '<meta itemprop="url" content="' . Router::fullBaseUrl() . '/img/psychotherapy-no-image.gif">';
					}
				?>
                            <meta itemprop="width" content="362">
                            <meta itemprop="height" content="228">
			</figure>
                    </div>

                    <div class="span8">
                        <time itemprop="datePublished" content="<?php echo $this->Time->i18nFormat($article['Article']['date_added'], '%Y-%m-%d'); ?>" datetime="<?php echo $this->Time->i18nFormat($article['Article']['date_added'], '%Y-%m-%d'); ?>"><?php
                            echo $this->Time->i18nFormat($article['Article']['date_added'], '%B, %d, %Y');
                            ?>
                        </time>
                        <meta itemprop="dateModified" content="<?php echo $this->Time->i18nFormat($article['Article']['date_added'], '%Y-%m-%d'); ?>">
                        <h3 itemprop="headline"><?php echo strip_tags($article['Article']['short_text']) ?></h3>

                        <div itemprop="articleBody"><?php echo $article['Article']['content']; ?></div>

                        <div class="span8"><h4 class="articleAuthor"><?php echo __('Author'); ?>: <?php echo __('Teodor Terziev'); ?></h4></div>

                        <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                            <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                                <meta itemprop="url" content="<?php echo Router::fullBaseUrl() . '/files/img/logo_psihoterapia.png'; ?>">
                                <meta itemprop="width" content="400">
                                <meta itemprop="height" content="60">
                            </div>
                            <meta itemprop="name" content="<?php echo __('psychotherapy'); ?>">
                        </div>

                        <meta itemprop="author" content="<?php echo __('Teodor Terziev'); ?>">

                        <h3><?php echo __('Articles in'); ?> <?php echo $relatedCategory['Category']['title'];?></h3>
                        <meta itemprop="about" content="<?php echo $relatedCategory['Category']['title'];?>">
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
<!--
    <div class="bg1 padding8">

        <div class="container">

            <div class="row">

                <div class="span12">

                    <h2 class="textAlignCenter margin8">Other benefits of therapy</h2>

                    <div class="row">

                        <div class="span4">

                            <h3>Donec in velit vel ipsum auctor pulvinar</h3>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>

                            <ul class="list8 margin9"><li><a href="#">Suspendisse sollicitudin velit sed leo</a></li>

                            <li><a href="#">Ut pharetra augue nec augue</a></li>

                            <li><a href="#">Nam elit agna,endrerit sit amet</a></li>

                            <li><a href="#">Tincidunt ac, viverra sed, nulla</a></li>

                            <li><a href="#">Donec porta diam eu massa</a></li>

                            <li><a href="#">Quisque diam lorem</a></li></ul>

                        </div>

                        <div class="span4">

                            <h3>In faucibus orci luctus et</h3>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>

                            <ul class="list8 margin9"><li><a href="#">Suspendisse sollicitudin velit sed leo</a></li>

                            <li><a href="#">Ut pharetra augue nec augue</a></li>

                            <li><a href="#">Nam elit agna,endrerit sit amet</a></li>

                            <li><a href="#">Tincidunt ac, viverra sed, nulla</a></li>

                            <li><a href="#">Donec porta diam eu massa</a></li>

                            <li><a href="#">Quisque diam lorem</a></li></ul>

                        </div>

                        <div class="span4">

                            <h3>Vestibulum ante ipsum primis</h3>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>

                            <ul class="list8 margin9"><li><a href="#">Suspendisse sollicitudin velit sed leo</a></li>

                            <li><a href="#">Ut pharetra augue nec augue</a></li>

                            <li><a href="#">Nam elit agna,endrerit sit amet</a></li>

                            <li><a href="#">Tincidunt ac, viverra sed, nulla</a></li>

                            <li><a href="#">Donec porta diam eu massa</a></li>

                            <li><a href="#">Quisque diam lorem</a></li></ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>    

</div>
-->
<!--
<div class="articles view">
<h2><?php echo __('Article'); ?></h2>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($article['Article']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($article['Article']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($article['Article']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Added'); ?></dt>
		<dd>
			<?php echo h($article['Article']['date_added']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Article'), array('action' => 'edit', $article['Article']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Article'), array('action' => 'delete', $article['Article']['id']), null, __('Are you sure you want to delete # %s?', $article['Article']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('action' => 'add')); ?> </li>
	</ul>
</div>
-->
