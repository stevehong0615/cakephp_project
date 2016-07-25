<div style="border: 1px ; padding: 30px">
    <h1><?php echo h($post['Post']['title']); ?></h1>

    <p><small>建立時間: <?php echo $post['Post']['created']; ?></small></p>

    <HR>

    <p><?php echo h($post['Post']['body']); ?></p>
</div>
<HR>

<div name="d"; style="border: 1px ; padding: 30px">
    <?php
    echo $this->Form->create('Post');
    echo $this->Form->input('name', array('label'=>'暱稱'));
    echo $this->Form->input('text', array('label'=>'內容'));
    echo $this->Form->submit('確認留言');
    ?>
</div>

<HR>
<div style="border: 1px ; padding: 30px">
    <?php foreach ($data as $post): ?>
    暱稱： <?php echo $post['B']['name']; ?></br>
    留言時間：<?php echo $post['B']['created']; ?></br>
    <?php echo $post['B']['text']; ?></br>------------------------------------------</br>
    <?php endforeach; ?>
</div>
    
