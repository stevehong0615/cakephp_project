<?php //pr($result);?>

<div style="border: 1px ; padding: 30px">

<table>
    <tr>
        <th><?php echo $this->Html->link('新增文章', array('controller' => 'posts', 'action' => 'add')); ?></th>
    </tr>    
    <tr>
        <th>編號</th>
        <th>標題</th>
        <th>建立時間</th>
        <th>修改時間</th>
        <th></th>
    </tr>


    <?php foreach ($result as $post): ?>
    <tr>
        <td><?php echo $post['posts']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['posts']['title'],
array('controller' => 'posts', 'action' => 'view', $post['posts']['id'])); ?>
        </td>
        <td><?php echo $post['posts']['created']; ?></td>
        <td><?php echo $post['posts']['modified']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    '編輯文章',
                    array('action' => 'edit', $post['posts']['id'])
                );
            ?>
            |
            <?php
                echo $this->Form->postLink(
                    '刪除文章',
                    array('action' => 'delete', $post['posts']['id']),
                    array('confirm' => '確定要刪除?')
                );
            ?>
        </td>

    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
   
    <?php 
        echo $this->Form->create('Search', array('target'=>'_blank')); 
        echo $this->Form->Input('title', array('type'=>'text', 'label'=>''));
        echo $this->Form->submit('搜尋'); 
    ?>
</table>
</div>