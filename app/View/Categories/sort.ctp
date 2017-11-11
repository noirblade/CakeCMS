<div class="bgPic"><img src="/files/img/head.jpg" alt="Психотерапия"></div>

<div id="content" class="margin4">
<ul id="my-list">
	<?php foreach ($categories as $category): ?>
	<li id='Category_<?php echo $category['Category']['id']?>'><?php echo $category['Category']['title']; ?></li>
	<?php endforeach; ?>
</ul>
<?php
$this->Js->get('#my-list');
$this->Js->sortable(array(
	'complete' => '$.post("/categories/reorder", $("#my-list").sortable("serialize"))',
	));
?>
</div>
</div>