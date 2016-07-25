<?php
class Post extends AppModel {
    
    var $useTable = 'posts';
    
    public $validate = array(
        'title' => array('rule' => 'notBlank'),
        'body' => array('rule' => 'notBlank'),
        'name' => array('rule' => 'notBlank'),
        'text' => array('rule' => 'notBlank')
    );
    
}

?>