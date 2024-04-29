<?php
class Pages extends Controller
{
  private $userModel;
  public function __construct()
  {
    // if not logged in, redirect to landing page
    if (!isLoggedIn()) {
      $this->view('pages/index');
    }

    $this->userModel = $this->model('User');


  }
  public function index()
  {

    if (isLoggedIn()) {
      redirect('pages/home');
    }

    $data = [
      'title' => 'Welcome',
      'description' => 'This is a simple MVC framework'
    ];

    $this->view('pages/index', $data);
  }

  public function home()
  {
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      
       // Redirect based on user role
       switch($_SESSION['user_designation']) {
        case 'admin':
            redirect('admins/home');
            break;
        case 'hrmanager':
            redirect('hrmanagers/home');
            break;
        case 'employee':
            redirect('employees/home');
            break;
        case 'driver':
            redirect('drivers/home');
            break;
        default:
            echo 'Invalid role';
        break;
    }
      $this->view('pages/home');
    }

  }

  public function driverhome()
  {
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $data = [
        'title' => 'About us',
        'description' => 'This is a simple MVC framework'
      ];
      $this->view('pages/driver/home_driver', $data);
    }

  }

  public function about()
  {
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $data = [
        'title' => 'About us',
        'description' => 'This is a simple MVC framework'
      ];
      $this->view('pages/about', $data);
    }

  }


  public function profile($id = '')
  {
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $user = $this->userModel->getUserById($id);
      $data = [
        'user' => $user
      ];
      $this->view('pages/profile', $data);
    }
  }

  public function edit_profile($id)
  {
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $user = $this->userModel->getUserById($id);
      $data = [
        'id' => $id,
        'name' => $user->name,
        'emp_id' => $user->emp_id,
        'email' => $user->email,
        'contact_num' => $user->contact_num,
        'address' => $user->address,
        'department' => $user->department,
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
          'name' => trim($_POST['name']),
          'emp_id' => trim($_POST['emp_id']),
          'email' => trim($_POST['email']),
          'contact_num' => trim($_POST['contact_num']),
          'address' => trim($_POST['address']),
          'department' => trim($_POST['department']),
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
          if ($this->userModel->updateUser($data)) {
            flash('update_success', 'Profile updated successfully');
            redirect('pages/profile/' . $id);
          } else {
            die('Something went wrong');
          }
        } else {
          $this->view('pages/edit_profile', $data);
        }
      } else {
        $this->view('pages/edit_profile', $data);
      }
    }

  }
}