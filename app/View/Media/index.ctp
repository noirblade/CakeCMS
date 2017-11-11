<div class="bgPic"><img src="/files/img/head.jpg" alt="Психотерапия"></div>

<div id="content" class="margin4">

	<div class="adminContainer">

<div class="media index">
	<h2><?php echo __('Media'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('filename'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($media as $media): ?>
	<tr>
		<td><?php echo h($media['Media']['id']); ?>&nbsp;</td>
		<td><?php echo h($media['Media']['title']); ?>&nbsp;</td>
		<td><a href="<?php echo Router::url('/', true) ?>files/media/<?php echo h($media['Media']['filename']); ?>"><?php echo Router::url('/', true) ?>files/media/<?php echo h($media['Media']['filename']); ?></a>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $media['Media']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $media['Media']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $media['Media']['id']), null, __('Are you sure you want to delete # %s?', $media['Media']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Media'), array('action' => 'add')); ?></li>
	</ul>
</div>

	</div>

</div>
</div>
