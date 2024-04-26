<?php
class Drivers extends Controller
{
  private $userModel;
  private $postModel;
  private $driverModel;
  public function __construct()
  {
    // if not logged in, redirect to landing page
    if (!isLoggedIn()) {
      $this->view('pages/index');
    }

    $this->userModel = $this->model('User');
    $this->postModel = $this->model('Post');
    $this->driverModel = $this->model('Driver');


  }
  public function home()
  {
    $posts = $this->postModel->getPosts();
    $date = $this->postModel->getLastUpdatedDate();

    error_log("Last Updated Date: " . $date);

    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $data = [
        'posts' => $posts,
        'lastdate' => $date
    ];
      $this->view('pages/driver/home_driver', $data);
    }
  }

  public function profile($id)
  {
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $user = $this->userModel->getUserById($id);
      $driver = $this->driverModel->getDriverById($id);
      $data = [
        'driver' => $driver,
        'user' => $user
      ];
      $this->view('pages/driver/driver_profile', $data);
    }
  }

  public function edit_profile($id)
  {
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $user = $this->userModel->getUserById($id);
      $driver = $this->driverModel->getDriverById($id);
      $data = [
        'id' => $id,
        'user_id' => $user->id,
        'name' => $user->name,
        'emp_id' => $user->emp_id,
        'age' => $driver->age,
        'email' => $user->email,
        'contact_num' => $user->contact_num,
        'address' => $user->address,
        'nic_number' => $driver->nic_number,
        'driver_license' => $driver->driver_license,
        'vehicle_type' => $driver->vehicle_type,
        'years_of_experience' => $driver->years_of_experience,
        'password' => $user->password,
        'confirm_password' => $user->password,
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'emp_id_err' => ''
      ];
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'id' => $id,
          'user_id' => $user->id,
          'name' => trim($_POST['name']),
          'emp_id' => trim($_POST['emp_id']),
          'age' => trim($_POST['age']),
          'email' => trim($_POST['email']),
          'contact_num' => trim($_POST['contact_num']),
          'address' => trim($_POST['address']),
          'nic_number' => trim($_POST['nic_number']),
          'driver_license' => trim($_POST['driver_license']),
          'vehicle_type' => trim($_POST['vehicle_type']),
          'years_of_experience' => trim($_POST['years_of_experience']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'emp_id_err' => ''
        ];
        if (empty($data['name'])) {
          $data['name_err'] = 'Please enter name';
        }
        if (empty($data['emp_id'])) {
          $data['emp_id_err'] = 'Please enter employee id';
        }
        if (empty($data['email'])) {
          $data['email_err'] = 'Please enter email';
        }
        if (empty($data['password'])) {
          $data['password_err'] = 'Please enter password';
        } elseif (strlen($data['password']) < 6) {
          $data['password_err'] = 'Password must be at least 6 characters';
        }
        if (empty($data['confirm_password'])) {
          $data['confirm_password_err'] = 'Please confirm password';
        } else {
          if ($data['password'] != $data['confirm_password']) {
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }
        if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
          if ($this->userModel->updateUser($data) && $this->driverModel->updateDriver($data)) {

            
            flash('update_success', 'Profile updated successfully');
            redirect('drivers/profile/' . $id);
          } else {
            die('Something went wrong');
          }
        } else {
          $this->view('pages/driver/driver_edit_profile', $data);
        }
      } else {
        $this->view('pages/driver/driver_edit_profile', $data);
      }
    }

  }

}