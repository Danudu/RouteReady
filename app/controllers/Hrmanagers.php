<?php
class Hrmanagers extends Controller
{
  public function __construct()
  {
    // if not logged in, redirect to landing page
    if (!isLoggedIn()) {
      $this->view('pages/index');
    }

    $this->userModel = $this->model('User');


  }
  public function home()
  {
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $data = [
        'title' => 'HR Manager',
        'description' => 'Welcome to the HR Manager page'
      ];
      $this->view('pages/hrmanager/home_hr', $data);
    }
  }

  public function viewEmployees()
  {
    $employees = $this->userModel->getEmployees();
    $data = [
      'employees' => $employees
    ];
    $this->view('pages/hrmanager/view_employees', $data);
  }

  public function updateEmployeeStatus($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Handle the update using $id and $action
      // For example:
      $action = $_POST['action'];
      $status = $action === 'approve' ? 'approved' : 'pending';
      if ($this->userModel->updatestatus($id, $status)) {
        flash('post_message', 'Employee status updated');
        redirect('hrmanagers/viewEmployees');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/viewEmployees');
    }
  }

  public function deleteEmployee($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Handle the delete using $id
      // For example:
      if ($this->userModel->deleteEmployee($id)) {
        flash('post_message', 'Employee deleted');
        redirect('hrmanagers/viewEmployees');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/viewEmployees');
    }
  }

  public function viewDrivers()
  {
    $drivers = $this->userModel->getDrivers();
    $data = [
      'drivers' => $drivers
    ];
    $this->view('pages/hrmanager/view_drivers', $data);
  }

  public function updatedriverStatus($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Handle the update using $id and $action
      // For example:
      $action = $_POST['action'];
      $status = $action === 'approve' ? 'approved' : 'pending';
      if ($this->userModel->updatedriverStatus($id, $status)) {
        flash('post_message', 'Driver status updated');
        redirect('hrmanagers/moreDriver');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/moreDriver');
    }
  }

  public function deletedriver($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Handle the delete using $id
      // For example:
      if ($this->userModel->deletedriver($id)) {
        flash('post_message', 'Driver deleted');
        redirect('hrmanagers/moreDriver');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/moreDriver');
    }
  }

  // public function moreDriver()
  // {
  //   $drivers = $this->userModel->getDrivers();
  //   $data = [
  //     'drivers' => $drivers
  //   ];
  //   $this->view('pages/hrmanager/view_drivers_more', $data);
  // }

  public function moreDriver($id = '')
  {
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $user = $this->userModel->getUserById($id);
      $data = [
        'user' => $user
      ];
      $this->view('pages/hrmanager/view_drivers_more', $data);
    }
  }
}