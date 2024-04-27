<?php
class Drivers extends Controller
{
  private $leaveModel;
  private $timetable;
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
  }

  public function add_bank_details()
  {
    // Display home page for drivers
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $driver_id = $_SESSION['designationDetails']->driver_id;
      $accountNo = $_POST['accountNo'];
      $bankName = $_POST['bankName'];
      $branchName = $_POST['branchName'];
      $holdersName = $_POST['holdersName'];

      $result= $this->bankDetailsModel->addBankDetails($driver_id, $accountNo, $bankName, $branchName, $holdersName);

      

      echo "Success";
      
    }else{

      $data = [
        
      ];

    $this->view('pages/driver/add_bank_details', $data);
    }
    
  }

  public function edit_bank_details(){
    if ($_SERVER[''] == 'POST') {
      $driver_id = $_POST[''];
      $accountNo = $_POST[''];
      $bankName = $_POST[''];
      $branchName = $_POST[''];
      $holderName = $_POST[''];

      $result= $this->bankDetailModel->editBankDetails($driver_id, $accountNo, $bankName, $branchName, $holderName);
    }else{
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

  public function applyLeave()
  {
    $user_id = $_SESSION['user_id'];
    $data = [
      'leaveTypeCount'=> $this->leaveModel->getLeaveCount($user_id),
    ];
    // Display the Apply Leave view page
    $this->view('pages/driver/apply_leave', $data);
  }

  public function submitLeaveApplication()
  {
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get form data
      $driver_id = $_SESSION['designationDetails']->driver_id; // Assuming driver_id is stored in session after login
      $type = $_POST['type'];
      $std_date = $_POST['std_date'];
      $end_date = $_POST['end_date'];
      $no_of_days = $_POST['no_of_days'];
      $reason = $_POST['reason'];

      // Check if leave type is "Sick Leave"
      if ($type === "Sick Leave") {
        // Handle file upload for medical report
        if ($_FILES['medical_report']['error'] === 0) {
          $targetDir = "uploads/";
          $targetFile = $targetDir . basename($_FILES["medical_report"]["name"]);
          move_uploaded_file($_FILES["medical_report"]["tmp_name"], $targetFile);
          $medical_report = $targetFile;
        } else {
          // Handle file upload error
          redirect('drivers/home', ['error' => 'Failed to upload medical report. Please try again.']);
        }
      } else {
        $medical_report = ''; // No medical report for other leave types
      }

      // Process leave application
      $result = $this->leaveModel->submitLeaveApplication($driver_id, $type, $medical_report, $std_date, $end_date, $no_of_days, $reason,);

      // Check if leave application was successful
      if ($result) {
        // Leave application successful, redirect to home page with success message
        redirect('drivers/home', ['success' => 'Leave application submitted successfully.']);
      } else {
        // Leave application failed, redirect to home page with error message
        redirect('drivers/home', ['error' => 'Failed to submit leave application. Please try again.']);
      }
    } else {
      // If form is not submitted, redirect to home page
      redirect('drivers/home');
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


  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      //sanitize
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_err' => '',
        'body_err' => ''
      ];

      //validate title
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter title';
      }

      //validate body
      if (empty($data['body'])) {
        $data['body_err'] = 'Please enter body text';
      }

      if (empty($data['title_err']) && empty($data['body_err'])) {
        //validated
        if ($this->postModel->updatePost($data)) {
          flash('post_message', 'Post Updated');
          redirect('posts/terms');
        } else {
          die('Something went wrong');
        }
      } else {
        //load view with errors
        $this->view('pages/hrmanager/t&c/edit_t&c', $data);
      }
    } else {
      //get existing post from model
      $post = $this->postModel->getPostById($id);

      //check for owner
      if ($post->user_id != $_SESSION['user_id']) {
        redirect('posts/terms');
      }

      $data = [
        'id' => $id,
        'title' => $post->title,
        'body' => $post->body,
        'title_err' => '',
        'body_err' => ''
      ];

      $this->view('pages/hrmanager/t&c/edit_t&c', $data);
    }
  }

  public function getLeaveType(){
    $user_id = $_SESSION['user_id']; // Corrected session variable name

    $leaveTypeCount = $this->leaveModel->getLeaveCount($user_id);

    var_dump($leaveTypeCount);

    $data = [
        'leaveTypeCount'=> $leaveTypeCount
    ];

    $this->view('pages/driver/apply_leave', $data);
}

public function view_time_table($driverId) {
  // Retrieve timetable data from the model
  $timetable = $this->timetable->getDriverTimetable($driverId);

  $data = [
    'timetable'=> $timetable
  ];


  // Include the view to display the timetable

  $this->view('pages/driver/driver_timetable_view', $data);}


  public function viewSalaryReport() {

    // Retrieve salary report data from the model
    $salaryReport = $this->leaveModel->getDriverSalaryReport();
    // var_dump($salaryReport);

    // Include the view to display the salary report
    $data = [
      'salaryReport'=> $salaryReport
  
      ];

      $this->view('pages/driver/driver_salary_report_view', $data);
    
}



}
