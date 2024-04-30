<?php
class Drivers extends Controller
{
  private $leaveModel;
  private $timetable;
  private $userModel;
  
  private $driverModel ;
private $scheduleModel;
  
  private BankDetailsModel $bankDetailsModel;

  public function __construct()
  {
    // Check login status
    if (!isLoggedIn()) {
      // Redirect to landing page if not logged in
      redirect('pages/index');
    }

    // Load necessary models
    $this->userModel = $this->model('User');
    $this->leaveModel = $this->model('Leave');
    $this->timetable = $this->model('DriverTimeTableModel');
    $this->driverModel = $this->model('Driver');
    $this->bankDetailsModel = $this->model('BankDetailsModel');
    $this->scheduleModel = $this->model('Schedule');
  }

  public function add_bank_details()
  {
    // Display home page for drivers
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // $driver_id = $_SESSION['designationDetails']->driver_id;
      $driver_id = $_POST['driver_id'];
      $accountNo = $_POST['accountNo'];
      $bankName = $_POST['bankName'];
      $branchName = $_POST['branchName'];
      $holdersName = $_POST['holdersName'];

      $result = $this->bankDetailsModel->addBankDetails($driver_id, $accountNo, $bankName, $branchName, $holdersName);
print_r ($result);
exit;


      $this->view('pages/driver/edit_bank_details');

    } else {

      $data = [];

      $this->view('pages/driver/add_bank_details', $data);
    }
  }

  public function edit_bank_details()
  {
    if ($_SERVER[''] == 'POST') {
      $driver_id = $_POST[''];
      $accountNo = $_POST[''];
      $bankName = $_POST[''];
      $branchName = $_POST[''];
      $holderName = $_POST[''];

      $result = $this->bankDetailModel->editBankDetails($driver_id, $accountNo, $bankName, $branchName, $holderName);
    } else {

    }
  }




  public function home()
  {
    // Display home page for drivers
    $data = [
      'title' => 'HR Manager',
      'description' => 'This is a simple MVC framework'
    ];
    $this->view('pages/driver/home_driver', $data);
  }

  public function leaves()
  {
    $user_id = $_SESSION['user_id'];
    $this->view('pages/driver/apply_leaves');








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
      $result = $this->leaveModel->submitLeaveApplication($user_id, $type, $medical_report, $std_date, $end_date, $no_of_days, $reason,);

      // Check if leave application was successful
      if ($result) {
        // Leave application successful, redirect to home page with success message
        redirect('drivers/home', ['success' => 'Leave application submitted successfully.']);
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


  public function profile($id)
  {
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $driver = $this->driverModel->getdriverById($id);
      $user = $this->userModel->getUserById($driver->user_id);
      $data = [
        'driver' => $driver,
        'user' => $user
      ];
      $this->view('pages/driver/driver_profile', $data);
    }
  }



  public function view_time_table($driverId)
  {
    // Retrieve timetable data from the model
    $timetable = $this->timetable->getDriverTimetable($driverId);

    $data = [
      'timetable' => $timetable
    ];


    // Include the view to display the timetable

    $this->view('pages/driver/driver_timetable_view', $data);
  }


  public function viewSalaryReport()
  {

    // Retrieve salary report data from the model
    $salaryReport = $this->leaveModel->getDriverSalaryReport();
    // var_dump($salaryReport);

    // Include the view to display the salary report
    $data = [
      'salaryReport' => $salaryReport

    ];

    $this->view('pages/driver/driver_salary_report_view', $data);
  }

  public function salary()
  {
    $this->view('pages/driver/salary');







  }

  // public function editBankDetails()
  // {
  //   $this->view('pages/driver/edit_bank_details');








  // }

  // public function viewBankDetails()
  // {
  //   $this->view('pages/driver/view_bank_details');








  // }



  public function leaves_admin() {
    // Assuming you have a method in the LeaveModel to fetch all leave applications
    $leaveApplications = $this->leaveModel->getAllLeaveApplications();
    // var_dump($leaveApplications);

    $data = [
      'leaveApplications' => $leaveApplications,
    ];

    // Pass leave applications data to the view
    $this->view('pages/driver/leaves_admin',$data);
}

public function processLeaveAction() {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $leaveId = $_POST['leave_id'];
      $action = $_POST['action']; 

      
      $result = $this->leaveModel->updateLeaveStatus($leaveId, $action);

      if ($result) {
          
          redirect('pages/driver/leaves_admin', ['success' => 'Leave application action processed successfully.']);
      } else {
         
          redirect('pages/driver/leaves_admin', ['error' => 'Failed to process leave application action. Please try again.']);
      }
  } else {
      
      redirect('pages/driver/leaves_admin');
  }
}


public function getLeaveCounts() {
  $userId = $_SESSION['user_id'];
  // Define the maximum limits
  $maxLeaves = array(
      'Medical Leave' => 24,
      'Sick Leave' => 12,
      'Personal' => 6,
      'Other' => 6
  );

  // Initialize an array to store the results
  $leaveCounts = array();

  // Query to calculate the sum of leaves taken for each leave type
  $this->db->query('SELECT type, COUNT(*) as count FROM leaves WHERE user_id = :userId GROUP BY type');
  $this->db->bind(':userId', $userId);
  $results = $this->db->resultSet();

  // Calculate remaining leaves for each type
  foreach ($results as $row) {
      $leaveType = $row['type'];
      $leaveTaken = $row['count'];
      $remainingLeaves = $maxLeaves[$leaveType] - $leaveTaken;
      $leaveCounts[$leaveType] = array(
          'taken' => $leaveTaken,
          'remaining' => $remainingLeaves
      );
  }

  // Fill in the remaining leave types with 0 taken
  foreach ($maxLeaves as $type => $max) {
      if (!isset($leaveCounts[$type])) {
          $leaveCounts[$type] = array(
              'taken' => 0,
              'remaining' => $max
          );
      }
  }

  return $leaveCounts;

  
}
public function apply_leaves() {
  // Assuming $userId is available or can be retrieved
  $userId = $_SESSION['user_id']; // Assuming user_id is stored in session after login
  
  // Call the method to get leave counts for the user
  $leaveCounts = $this->leaveModel->getLeaveCounts($userId);

  // Load the view with the leave counts data
  $this->view('apply_leaves', ['leaveCounts' => $leaveCounts]);
}


public function appliedLeaves() {
  // Assuming $userId is available or can be retrieved
  $userId = $_SESSION['user_id']; // Assuming user_id is stored in session after login

  // Fetch applied leaves for the user
  $appliedLeaves = $this->leaveModel->getAppliedLeaves($userId);

  // Load the view with the leave data
  $this->view('pages/driver/applied_leaves', ['appliedLeaves' => $appliedLeaves]);
}


public function editLeaveApplication($leave_id)
{
    $leave = $this->leaveModel->getLeaveById($leave_id);
    $data = ['leave' => $leave];
    $this->view('pages/driver/edit_leave', $data);
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
    }else{
      $leave = $this->leaveModel->getLeaveById($leave_id);
      $data = 
      ['leave'=> $leave];
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

public function viewSalaryDetails($id)
    {
        // Check if user is logged in
        if (!isLoggedIn()) {
            // Redirect to login page if not logged in
            redirect('users/login');
        }

        // Retrieve user ID from session
        

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


    public function viewSchedule()
    {
        // Get full day bookings and timetable details for the current date
        $currentDate = date('Y-m-d');

        // Get full day bookings and timetable details for the current date
        $fullDayBookings = $this->scheduleModel->getFullDayBookings($currentDate);
        $timetableDetails = $this->scheduleModel->getTimetableDetails($currentDate);
    
        // Pass data to the view
        $data = [
            'fullDayBookings' => $fullDayBookings,
            'timetableDetails' => $timetableDetails
        ];
        $this->view('pages/driver/view_schedule',$data);
    }
    

    public function viewSalary($id){
      if (!isLoggedIn()) {
        $this->view('pages/index');
      } else {
        $salary = $this->driverModel->getSalaryById($id);
        $data = [
          
          'salary' => $salary
        ];
        $this->view('pages/driver/view_salary_details', $data);
      }
    }
}