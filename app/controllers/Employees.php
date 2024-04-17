<?php
class Employees extends Controller
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
        'title' => 'Employees Home Page',
        'description' => 'This is a simple MVC framework'
      ];
      $this->view('pages/employee/home_emp', $data);
    }
  }
  public function reservations(){
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $data = [
        'title' => 'Employees Home Page',
        'description' => 'This is a simple MVC framework'
      ];
      $this->view('pages/employee/view_reservation', $data);
    }
  }
  public function worktrip(){
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $data = [
        'title' => 'Employees Home Page',
        'description' => 'This is a simple MVC framework'
      ];
      $this->view('pages/employee/view_worktrip_reservation', $data);
    }
  }
  public function makeReservation(){
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $data = [
        'title' => 'Employees Home Page',
        'description' => 'This is a simple MVC framework'
      ];
      $this->view('pages/employee/make_reservation', $data);
    }
  }
  public function makeWorktrip(){
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $data = [
        'title' => 'Employees Home Page',
        'description' => 'This is a simple MVC framework'
      ];
      $this->view('pages/employee/make_worktrip', $data);
    }
  }
}