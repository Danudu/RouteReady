<?php

class Users extends Controller
{
    private $userModel;
  private $employeeReservationModel;
  private $workTripModel;
  private $postModel;
  private $driverModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->driverModel = $this->model('Driver');
    }

    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Process form


            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);



            //init data
            $data = [
                'name' => trim($_POST['name']),
                'emp_id' => trim($_POST['emp_id']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'contact_num' => trim($_POST['contact_num']),
                'address' => trim($_POST['address']),
                'department' => trim($_POST['department']),
                'designation' => trim($_POST['designation']),
                'driver_license' => trim($_POST['driver_license']),
                'vehicle_type' => trim($_POST['vehicle_type']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'emp_id_err' => ''
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check Email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            if (empty($data['emp_id'])) {
                $data['emp_id_err'] = 'Please enter employee id';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    $user_id = $this->userModel->getLastInsertedUserId();


                    if ($data['designation'] == 'driver') {
                        $driverData = [
                            'user_id' => $user_id,
                            'driver_license' => $data['driver_license'],
                            'vehicle_type' => $data['vehicle_type']
                        ];
                        $this->driverModel->insertDriverData($driverData);
                    }
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }

        } else {
            // Init data
            $data = [
                'name' => '',
                'emp_id' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'contact_num' => '',
                'address' => '',
                'department' => '',
                'designation' => '',
                'driver_license' => '',
                'vehicle_type' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'emp_id_err' => ''
            ];
            // Load view
            $this->view('users/register', $data);


        }
    }

    


    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);



            //init data
            $data = [

                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',

            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated

                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser !== false) { // Check if $loggedInUser is not false
                    if ($loggedInUser->status == 'pending') {
                        $data['email_err'] = 'Your account is pending for approval';
                        $this->view('users/login', $data);
                    } elseif ($loggedInUser->status == 'rejected') {
                        $data['email_err'] = 'Your account is rejected';
                        $this->view('users/login', $data);
                        
                    } else {
                        // Create Session
                        $this->createUserSession($loggedInUser);
                        // redirect('pages/home');
                    }
                } else {
                    $data['password_err'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }

            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }


        } else {
            // Init data
            $data = [

                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''

            ];
            // Load view
            $this->view('users/login', $data);


        }
    }





    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_designation'] = $user->designation;
        redirect('pages/home');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

}