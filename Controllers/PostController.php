<?php

namespace Controllers;

use Core\Templater;
use Models\DB;
use Models\PostModel;
use Core\Validator;
use Core\Exceptions\ValidateException;

class PostController extends BaseController
{
    

    public function index()
    {
        $this->title .= '::список постов';

        $db = DB::getConnect();
        $mPost = new PostModel($db, new Validator());

        $posts = $mPost->getAll();

		$this->content = $this->build('posts.php', ['posts' => $posts]);	
    }

    public function one()
    {
        $db = DB::getConnect();
        $mPost = new PostModel($db, new Validator());

        $id = $this->request->param('id');
       
        $post = $mPost->getById($id);
        
        $this->content = $this->build('post.php', ['post' => $post]);

    }

    public function add(){
        if($this->request->isPost()){
            $db = DB::getConnect();
            $mPost = new PostModel($db, new Validator());            
                try{
                    $lastId = $mPost->insert([
                        'title'=>$this->request->param('title'),
                        'text'=> $this->request->param('text'),
                        'slug'=>$this->request->param('slug')
                    ]);
                    header("location: ".ROOT."/post/$lastId");
                }catch(ValidateException $e){

                    $this->content = $this->build('add.php',['errors'=> $e->errors]);
                }
            
        }else{
            $this->content = $this->build('add.php',['errors'=> null]);
        }
        
    }
}