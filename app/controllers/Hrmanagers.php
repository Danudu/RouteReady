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

  public function dashboard()
  {
    $data = [
      'title' => 'HR Manager',
      'description' => 'Welcome to the HR Manager page'
    ];
    $this->view('pages/hrmanager/dashboard_hr', $data);
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
        redirect('hrmanagers/moreDriver/' . $id . '');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/moreDriver/' . $id . '');
    }
  }

  public function deletedriver($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Handle the delete using $id
      // For example:
      if ($this->userModel->deletedriver($id)) {
        flash('post_message', 'Driver deleted');
        redirect('hrmanagers/moreDriver/' . $id . '');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/moreDriver/' . $id . '');
    }
  }



  public function moreDriver($id)
  {
    $driver = $this->userModel->getDriverById($id);
    $data = [
      'driver' => $driver,

    ];
    $this->view('pages/hrmanager/view_drivers_more', $data);
  }


  

  public function asEmployee(){
 
    // Check for POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //init data
        $data = [
            'email' => $_SESSION['user_email'], // Use the logged-in user's email
            'password' => trim($_POST['password']),
            'password_err' => '',
        ];

        // Validate Password
        if(empty($data['password'])){
            $data['password_err'] = 'Please enter password';
        }

        // Make sure errors are empty
        if(empty($data['password_err'])){
            // Validated

            // Check and set logged in user
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
            if($loggedInUser){
                
                redirect('employees/home');
            } else {
                $data['password_err'] = 'Password incorrect';
                $this->view('pages/hrmanager/as_employee', $data);
            }

        } else {
            // Load view with errors
            $this->view('pages/hrmanager/as_employee', $data);
        }

    } else {
        // Init data
        $data = [
            'email' => $_SESSION['user_email'], // Use the logged-in user's email
            'password' => '',
            'password_err' => ''
        ];
        // Load view
        $this->view('pages/hrmanager/as_employee', $data);
    }   
}

}