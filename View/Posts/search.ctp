<div style="border: 1px ; padding: 30px">
<table>
    <tr>
        <th>編號</th>
        <th>標題</th>
        <th>建立時間</th>
        <th>修改時間</th>
        <th></th>
    </tr>


    <?php foreach ($data as $post): ?>
    <tr>
        <td><?php echo $post['posts']['id']; ?></td>
        <td><?php echo $this->Html->link($post['posts']['title'],
                array('controller' => 'posts', 'action' => 'view', $post['posts']['id'])); ?></td>
        <td><?php echo $post['posts']['created']; ?></td>
        <td><?php echo $post['posts']['modified']; ?></td>
    <?php endforeach; ?>
</table>
</div>