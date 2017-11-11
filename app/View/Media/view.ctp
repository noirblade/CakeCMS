<div class="bgPic"><img src="/files/img/head.jpg" alt="Психотерапия"></div>

<div id="content" class="margin4">

	<div class="adminContainer">

<div class="media view">
<h2><?php echo __('Media'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($media['Media']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($media['Media']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo h($media['Media']['filename']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Media'), array('action' => 'edit', $media['Media']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Media'), array('action' => 'delete', $media['Media']['id']), null, __('Are you sure you want to delete # %s?', $media['Media']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Media'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media'), array('action' => 'add')); ?> </li>
	</ul>
</div>

	</div>

</div>
</div>
