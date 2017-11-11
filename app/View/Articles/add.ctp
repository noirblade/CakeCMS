<div class="bgPic"><img src="/files/img/head.jpg" alt="Психотерапия"></div>

<div id="content" class="margin4">
<div class="articles form">
	<?php
	echo $this->Minify->script(array('tinymce/tinymce.min.js'));
	?>
<script type="text/javascript">

tinymce.init({
    selector: "textarea",
    relative_urls: false,
    convert_urls: false,
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor "
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    width : 1000,
    image_advtab: true
});

</script>

<div style="padding-left: 400px;">
<?php echo $this->Form->create('Article', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Article'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('Category', array('multiple' => 'checkbox'));
		echo $this->Form->input('short_text');
		echo $this->Form->input('content');
		echo $this->Form->input('image', array( 'type' => 'file'));
		//echo $this->Form->input('date_added');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
</div>