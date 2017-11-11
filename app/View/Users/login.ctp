<div class="bgPic"><img src="/files/img/head.jpg" alt="Психотерапия"></div>

<div id="content" class="margin4">

    <div class="adminContainer">
<?php
echo $this->Form->create('User', array('action' => 'login'));
echo $this->Form->inputs(array(
    'legend' => __('Login'),
    'username',
    'password'
));
echo $this->Form->end('Login');
?>

    </div>

</div>
</div>