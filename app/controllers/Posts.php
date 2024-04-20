<?php

    class Posts extends Controller{

        public function __construct(){
            // if not logged in, redirect to landing page
            if(!isLoggedIn()){
                redirect('pages/index');
            }

            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }

        public function terms(){
            // Get posts
            $posts = $this->postModel->getPosts();


            $data = [
                'posts' => $posts
            ];

            $this->view('pages/hrmanager/t&c/t&c', $data);
        }
        public function terms_conditions(){
            // Get posts
            $posts = $this->postModel->getPosts();


            $data = [
                'posts' => $posts
            ];

            $this->view('pages/terms_conditions', $data);
        }

        public function drivers(){
            $data = [];

            $this->view('posts/drivers', $data);
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                //sanitize
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                //validate title
                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter title';
                }

                //validate body
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body text';
                }
                
                if(empty($data['title_err']) && empty($data['body_err'])){
                    //validated
                    if($this->postModel->addPost($data)){
                        flash('post_message', 'Post Added');
                        redirect('posts/terms');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view with errors
                    $this->view('pages/hrmanager/t&c/add_t&c', $data);
                }
                
            }
            else{
                $data = [
                    'title' => '',
                    'body' => '',
                    'title_err' => '',
                    'body_err' => ''
                ];
                
                $this->view('pages/hrmanager/t&c/add_t&c', $data);   
            }   
        }


        public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                //sanitize
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                //validate title
                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter title';
                }

                //validate body
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body text';
                }
                
                if(empty($data['title_err']) && empty($data['body_err'])){
                    //validated
                    if($this->postModel->updatePost($data)){
                        flash('post_message', 'Post Updated');
                        redirect('posts/terms');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view with errors
                    $this->view('pages/hrmanager/t&c/edit_t&c', $data);
                }

            }
            else{
                //get existing post from model
                $post = $this->postModel->getPostById($id);

                //check for owner
                if($post->user_id != $_SESSION['user_id']){
                    redirect('posts/terms');
                }

                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body,
                    'title_err' => '',
                    'body_err' => ''
                ];
    
                $this->view('pages/hrmanager/t&c/edit_t&c', $data);

            }
        }
        

        public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //get existing post from model
                $post = $this->postModel->getPostById($id);

                //check for owner
                if($post->user_id != $_SESSION['user_id']){
                    redirect('posts/terms');
                }

                if($this->postModel->deletePost($id)){
                    flash('post_message', 'Post Removed');
                    redirect('posts/terms');
                }
                else{
                    die('Something went wrong');
                }
            }
            else{
                redirect('posts/terms');
            }
        }


        public function show($id){
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);
            
            $data = [
                'post' => $post,
                'user' => $user
            ];

            $this->view('pages/hrmanager/t&c/show_t&c', $data);

        }

        

    }