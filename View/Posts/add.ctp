<div style="border: 1px ; padding: 30px">
<h1>新增文章</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label'=>'標題'));
echo $this->Form->input('body', array('label'=>'內容'));
echo $this->Form->submit('確認新增');
?>
</div>