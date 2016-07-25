<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController {
    
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    

    public function index(){
        
        $this->layout='project';
        
        $allsql = "SELECT * FROM posts";
        $result = $this->Post->query($allsql);
        //pr($result);
        $this->set('result', $result);
        
        //關鍵字搜尋
        if($this->request->is('post')){
         
        $title = $this->request->data['Search']['title'];
        $sql = "SELECT id, title, body, created, modified 
                FROM posts 
                WHERE title like '%$title%'";
        $data = $this->Post->query($sql);
        //pr($data);
        $this->set('data', $data);
        $this->render('search');
        
        }
    }
    
    public function search(){
        
        $this->layout='project';
    
    }
    

    public function view($id){
        
        $this->layout='project';

        $post = $this->Post->findById($id);
        $this->set('post', $post);
        $id = $post['Post']['id'];
        //留言板
        $sql = "SELECT B.id, B.name, B.created, B.modified, B.text 
                    FROM posts A , guestbook B
                    WHERE A.id = B.posts_id and A.id = '$id'
                    ORDER BY id DESC";
        $data = $this->Post->query($sql);
        //pr($data);
        $this->set('data', $data);
        //新增留言
        if($this->request->is('post')){
            
            $date=getdate();
            date("Y-m-d");
            $year = $date["year"];
            $month = $date["mon"];
            $day = $date["mday"];
            $today_date = $year . "-" . $month . "-" . $day;
            $title = $post['Post']['title'];
            $id = $post['Post']['id'];
            $name = $this->request->data['Post']['name'];
            $text = $this->request->data['Post']['text'];
            
            $sqlguest = "INSERT INTO guestbook (posts_id, title, name, created, modified, text) 
                    VALUES ('$id', '$title', '$name', '$today_date', '', '$text')";
            $result = $this->Post->query($sqlguest);
            
            
        }
    }

    public function add(){
        
        $this->layout='project';
        
        if($this->request->is('post')){
            
            $date=getdate();
            date("Y-m-d");
            $year = $date["year"];
            $month = $date["mon"];
            $day = $date["mday"];
            $today_date = $year . "-" . $month . "-" . $day;
            $title =$this->request->data['Post']['title'];
            $body = $this->request->data['Post']['body'];
            
            $sql = "INSERT INTO posts (title, body, created, modified) 
                    VALUES ('$title', '$body', '$today_date', '')";
            $result = $this->Post->query($sql);
            $this->Flash->success(__('文章已新增'));
            return $this->redirect(array('action'=>'index'));
            
        }
    }
    
    public function edit($id = null){
        
        $this->layout='project';
        
        if (!$id) {
            
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                
                $this->Flash->success(__('文章已編輯'));
                return $this->redirect(array('action' => 'index'));
            }
                $this->Flash->error(__('無法編輯文章'));
            }

        if (!$this->request->data) {
            
            $this->request->data = $post;
        }
        
    }
    
    public function delete($id){
        
        if ($this->request->is('get')){
            
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)){
            
            $this->Flash->success(__('已刪除文章', h($id)));
        }else{
            
            $this->Flash->error(__('無法刪除文章', h($id)));
        }

        return $this->redirect(array('action' => 'index'));
    }
    
}
?>