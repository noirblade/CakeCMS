<div class="bgPic"><img src="/files/img/head.jpg" alt="Психотерапия"></div>

<div id="content" class="margin4">

	<div class="adminContainer">
<div class="media form">
<?php echo $this->Form->create('Media', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Media'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('upload', array('type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Media'), array('action' => 'index')); ?></li>
	</ul>
</div>

	</div>

</div>
</div>
