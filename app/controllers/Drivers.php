<?php
class Drivers extends Controller
{
  private $userModel;
  private $postModel;
  private $driverModel;
  private $leaveModel;

  private $db;
  public function __construct()
  {
    // if not logged in, redirect to landing page
    if (!isLoggedIn()) {
      $this->view('pages/index');
    }

    $this->userModel = $this->model('User');
    $this->postModel = $this->model('Post');
    $this->driverModel = $this->model('Driver');
    $this->leaveModel = $this->model('Leave');


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
      $osdriver = $this->driverModel->getOSDriverById($id);
      $data = [
        'driver' => $driver,
        'osdriver' => $osdriver,
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
        'designation' => $user->designation,
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
          'designation' => $user->designation,
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
  public function edit_osprofile($id)
  {
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $user = $this->userModel->getUserById($id);
      $osdriver = $this->driverModel->getOSDriverById($id);

      $data = [
        'id' => $id,
        'designation' => $user->designation,
        'odriver_id' => $user->id,
        'name' => $user->name,
        'emp_id' => $user->emp_id,
        'age' => $osdriver->age,
        'email' => $user->email,
        'contact_num' => $user->contact_num,
        'address' => $user->address,
        'nic_number' => $osdriver->nic_number,
        'driver_license' => $osdriver->driver_license,
        'vehicle_type' => $osdriver->vehicle_type,
        'years_of_experience' => $osdriver->years_of_experience,
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
          'designation' => $user->designation,
          'odriver_id' => $user->id,
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
          if ($this->userModel->updateUser($data) && $this->driverModel->updateOSDriver($data)) {


            flash('update_success', 'Profile updated successfully');
            redirect('drivers/profile/' . $id);
          } else {
            die('Something went wrong');
          }
        } else {
          $this->view('pages/driver/driver_edit_osprofile', $data);
        }
      } else {
        $this->view('pages/driver/driver_edit_osprofile', $data);
      }
    }

  }

  public function viewSalaryDetails($id)
  {
    // Check if user is logged in
    if (!isLoggedIn()) {
      // Redirect to login page if not logged in
      redirect('users/login');
    }


    // Fetch salary details for the logged-in user
    $salary_details = $this->driverModel->getSalaryDetails($id);

    // Check if salary details exist
    if ($salary_details) {
      // Salary details found, pass them to the view
      $data = [
        'salary_details' => $salary_details
      ];

      // Load the view for displaying salary details
      $this->view('pages/driver/view_salary_details', $data);
    } else {
      // No salary details found
      redirect('drivers/home');
    }
  }

  public function getSalaryDetails($driver_id) {
    // Prepare SQL query to fetch salary details for a specific driver
    $this->db->query('SELECT * FROM out_salary WHERE driver_id = :driver_id');
    $this->db->bind(':driver_id', $driver_id);
    $salary_details = $this->db->resultSet();

    return $salary_details;
}




  public function submitLeaveApplication()
  {
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get form data
      $user_id = $_SESSION['user_id'];
      $type = $_POST['type'];
      $medical_report = $_POST['medical_report'];
      $std_date = $_POST['std_date'];
      $end_date = $_POST['end_date'];
      $no_of_days = $_POST['no_of_days'];
      $reason = $_POST['reason'];

      // Check if leave type is "Sick Leave"
      if ($type === "Medical Leave") {
        // Handle file upload for medical report
        if ($_FILES['medical_report']['error'] === 0) {
          $targetDir = "../public/uploads/";
          $targetFile = $targetDir . basename($_FILES["medical_report"]["name"]);
          move_uploaded_file($_FILES["medical_report"]["tmp_name"], $targetFile);
          $medical_report = $targetFile;
        } else {
          // Handle file upload error
          redirect('drivers/leaves', ['error' => 'Failed to upload medical report. Please try again.']);
        }
      } else {
        $medical_report = ''; // No medical report for other leave types
      }

      // Process leave application
      $result = $this->leaveModel->submitLeaveApplication($user_id, $type, $medical_report, $std_date, $end_date, $no_of_days, $reason, );

      // Check if leave application was successful
      if ($result) {
        // Leave application successful, redirect to home page with success message
        redirect('drivers/submitLeaveApplication', ['success' => 'Leave application submitted successfully.']);
      } else {
        // Leave application failed, redirect to leaves page with error message
        redirect('drivers/leaves', ['error' => 'Failed to submit leave application. Please try again.']);
      }
    } else {
      $user_id = $_SESSION['user_id'];
      // If form is not submitted, redirect to home page
      $medicalCount = $this->leaveModel->getLeaveCountByLeaveType($user_id, 'Medical Leave');
      $sickCount = $this->leaveModel->getLeaveCountByLeaveType($user_id, 'Sick Leave');
      $personalCount = $this->leaveModel->getLeaveCountByLeaveType($user_id, 'Personal');
      $otherCount = $this->leaveModel->getLeaveCountByLeaveType($user_id, 'Other');


      $data = [
        'medicalCount' => $medicalCount,
        'sickCount' => $sickCount,
        'personalCount' => $personalCount,
        'otherCount' => $otherCount,
      ];
      print_r($data);
      $this->view('pages/driver/apply_leaves', $data);
    }
  }


  public function appliedLeaves()
  {
    // Assuming $userId is available or can be retrieved
    $userId = $_SESSION['user_id']; // Assuming user_id is stored in session after login

    // Fetch applied leaves for the user
    $appliedLeaves = $this->leaveModel->getAppliedLeaves($userId);

    // Load the view with the leave data
    $this->view('pages/driver/applied_leaves', ['appliedLeaves' => $appliedLeaves]);
  }

  public function updateLeaveApplication($leave_id)
  {
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get form data
      $leave_id = $_POST['leave_id'];
      $type = $_POST['type'];
      $std_date = $_POST['std_date'];
      $end_date = $_POST['end_date'];
      $no_of_days = $_POST['no_of_days'];
      $reason = $_POST['reason'];
      $status = $_POST['status'];

      // Process leave update
      $result = $this->leaveModel->updateLeaveApplication($leave_id, $type, $std_date, $end_date, $no_of_days, $reason, $status);

      // Check if leave update was successful
      if ($result) {
        // Leave update successful, redirect to home page with success message
        redirect('drivers/appliedLeaves', ['success' => 'Leave application updated successfully.']);
      } else {
        // Leave update failed, redirect to leaves page with error message
        redirect('drivers/appliedLeaves', ['error' => 'Failed to update leave application. Please try again.']);
      }
    } else {
      $leave = $this->leaveModel->getLeaveById($leave_id);
      $data =
        ['leave' => $leave];
      $this->view('pages/driver/edit_applied_leaves', $data);
    }
  }

  public function deleteLeaveApplication($leave_id)
  {
    // Process leave deletion
    $result = $this->leaveModel->deleteLeaveApplication($leave_id);

    // Check if leave deletion was successful
    if ($result) {
      // Leave deletion successful, redirect to home page with success message
      redirect('drivers/home', ['success' => 'Leave application deleted successfully.']);
    } else {
      // Leave deletion failed, redirect to leaves page with error message
      redirect('drivers/leaves', ['error' => 'Failed to delete leave application. Please try again.']);
    }
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
          $this->view('pages/driver/add_bank_details');
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