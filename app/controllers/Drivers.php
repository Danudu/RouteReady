<?php
class Drivers extends Controller
{
  private $userModel;
  private $postModel;
  private $driverModel;
  private $employeeReservationModel;
  public function __construct()
  {
    // if not logged in, redirect to landing page
    if (!isLoggedIn()) {
      $this->view('pages/index');
    }

    $this->userModel = $this->model('User');
    $this->postModel = $this->model('Post');
    $this->driverModel = $this->model('Driver');
    $this->employeeReservationModel = $this->model('EmployeeReservation');


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
  public function add()
  {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          // Prepare data for insertion
          $data = [
              'name' => trim($_POST['name']),
              'age' => trim($_POST['age']),
              'email' => trim($_POST['email']),
              'nic_number' => trim($_POST['nic_number']),
              'contact_num' => trim($_POST['contact_num']),
              'address' => trim($_POST['address']),
              'vehicle_type' => trim($_POST['vehicle_type']),
              'driver_license' => trim($_POST['driver_license']),
              'years_of_experience' => trim($_POST['years_of_experience']),
              'password' => trim($_POST['password']),
              'Vehicle_Number' => trim($_POST['v_no']),
              'Vehicle_Name' => trim($_POST['name']),
              'Vehicle_Year' => trim($_POST['year']),
              'model' => trim($_POST['model']),
              'r_year' => trim($_POST['r_year']),
              'vin' => trim($_POST['vin']),
              'insu_pro' => trim($_POST['insu_pro']),
              'insu_pn' => trim($_POST['insu_pn']),
              // Add more fields as needed
          ];
  
          // Call method in Driver model to insert data
          if ($this->driverModel->insertOutsourceDriverData($data)) {
              // Create user session
              $user = $this->userModel->getUserByEmail($data['email']);
              $this->createUserSession($user);
  
              // Redirect to the login page
              redirect('users/login');
          } else {
              // Show error message
              die('Something went wrong');
          }
      } else {
          // Load the view for adding a driver
          $this->view('pages/users/register');
      }
  }
  

  public function createUserSession($user)
  {
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      redirect('pages/driverhome');
  }

  public function logout()
  {
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
  }



  public function viewTransportReservation()
  {
      // Check if user is logged in
      if (!isset($_SESSION['user_id'])) {
          // Redirect to the login page if the user is not logged in
          redirect('users/login');
      }
  
      // Retrieve the user's ID from the session
      $user_id = $_SESSION['user_id'];
  
      // Get daily reservations
      $dailyReservations = $this->driverModel->getDailyReservations();
  
      // Get monthly reservations
      $monthlyReservations = $this->driverModel->getMonthlyReservations();
  
      // Sort by ScheduleType for daily reservations
      usort($dailyReservations, function ($a, $b) {
          return strcmp($a->ScheduleType, $b->ScheduleType);
      });
  
      // Sort by ScheduleType for monthly reservations
      usort($monthlyReservations, function ($a, $b) {
          return strcmp($a->ScheduleType, $b->ScheduleType);
      });
  
      // Load view with reservations data
      $data = [
          'dailyReservations' => $dailyReservations,
          'monthlyReservations' => $monthlyReservations
      ];
      $this->view('pages/driver/driver_reservations', $data);
  }


  public function viewEmployeeWorkTrips()
  {
      // Check if the user is logged in
      if (!isset($_SESSION['user_id'])) {
          redirect('login');
      }
  
      // Get the user ID from the session
      $user_id = $_SESSION['user_id'];
  
      // Get work trip reservations for the current date with status 'approved'
      $workTripReservations = $this->driverModel->getWorkTripReservations('approved');
  
      // Pass the data to the view
      $data = [
          'workTripReservations' => $workTripReservations
      ];
      
      // Load the view with the data
      $this->view('pages/driver/driver_workTrip', $data);
  }
  
  public function addBankDetails()
{
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
        }

        // Retrieve user ID from session
        $user_id = $_SESSION['user_id'];

        // Data to be passed to the model
        $data = [
            'accountNo' => trim($_POST['accountNo']),
            'bankName' => trim($_POST['bankName']),
            'branchName' => trim($_POST['branchName']),
            'holdersName' => trim($_POST['holdersName']),
            'user_id' => $user_id
        ];

        // Call the model method to insert bank details
        if ($this->driverModel->insertBankDetails($data)) {
            // Bank details added successfully, redirect to view bank details
            redirect('drivers/viewBankDetails');
        } else {
            // Something went wrong
            die('Unable to add bank details');
        }
    } else {
        // Load the view for adding bank details
        $this->view('pages/driver/add_bank_detail');
    }
}

  public function viewBankDetails()
  {
      // Check if user is logged in
      if (!isset($_SESSION['user_id'])) {
          redirect('login');
      }
  
      // Retrieve user ID from session
      $user_id = $_SESSION['user_id'];
  
      // Fetch bank details for the user
      $bankDetails = $this->driverModel->getBankDetailsByUserId($user_id);
  
      // Check if bank details exist
      if ($bankDetails) {
          // Bank details found, pass them to the view
          $data = [
              'bankDetails' => $bankDetails
          ];
  
          // Load the view for displaying bank details
          $this->view('pages/driver/view_bank_details', $data);
      } else {
          // No bank details found, redirect to add bank details page
          redirect('drivers/addBankDetails');
      }
  }
  public function editBankDetails()
{
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
        }

        // Retrieve user ID from session
        $user_id = $_SESSION['user_id'];

        // Data to be passed to the model
        $data = [
            'accountNo' => trim($_POST['accountNo']),
            'bankName' => trim($_POST['bankName']),
            'branchName' => trim($_POST['branchName']),
            'holdersName' => trim($_POST['holdersName']),
            'user_id' => $user_id
        ];

        // Call the model method to update bank details
        if ($this->driverModel->updateBankDetails($data)) {
            // Bank details updated successfully
            flash('bank_details_updated', 'Bank details updated successfully');
            redirect('drivers/viewBankDetails');
        } else {
            // Something went wrong
            die('Unable to update bank details');
        }
    } else {
        // Retrieve user ID from session
        $user_id = $_SESSION['user_id'];

        // Fetch bank details for the user
        $bankDetails = $this->driverModel->getBankDetailsByUserId($user_id);

        // Check if bank details exist
        if ($bankDetails) {
            // Bank details found, pass them to the view
            $data = [
                'bankDetails' => $bankDetails
            ];

            // Load the view for editing bank details
            $this->view('pages/driver/edit_bank_details', $data);
        } else {
            // No bank details found
            redirect('drivers/viewBankDetails');
        }
    }
}

   
}