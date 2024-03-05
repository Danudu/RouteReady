<?php
class Admins extends Controller
{
  public function __construct()
  {
    // if not logged in, redirect to landing page
    if (!isLoggedIn()) {
      $this->view('pages/index');
    }

    $this->userModel = $this->model('User');


  }
  public function home(){
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $data = [
        'title' => 'HR Manager',
        'description' => 'This is a simple MVC framework'
      ];
      $this->view('pages/hrmanager/home_hr', $data);
    }
  }
}