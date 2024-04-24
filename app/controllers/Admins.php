<?php
 
class Admins extends Controller
{

  private $userModel;
  private $VehicleModel;
  private $bankModel;
  private $salaryModel;

  
  public function __construct()
  {

    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    if (!isLoggedIn()) {
      $this->view('pages/index');
    }
    $this->userModel = $this->model('User');
    $this->postModel = $this->model('Post');
    $this->VehicleModel = $this->model('Vehicle');
    $this->bankModel = $this->model('BankModel');
    $this->salaryModel = $this->model('Salary');
  
    


    // if (!isLoggedIn()) {
    //     $this->view('pages/index');
    //   }

    //   $this->userModel = $this->model('User');
   

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
      $this->view('pages/admin/home_admin', $data);
    }
  }
  public function addVehicles()
  {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          // Check if user is logged in (You may adjust this part based on your authentication system)
          if (!isset($_SESSION['user_id'])) {
              redirect('login');
          }
  
          // Get user ID from session
          $user_id = $_SESSION['user_id'];
  
          // Prepare data from the form
          $data = [
              'registration_number' => trim($_POST['reg_no']),
              'vehicle_number' => trim($_POST['v_no']),
              'vehicle_type' => trim($_POST['name']),
              'vehicle_model' => trim($_POST['model']),
              'registration_year' => trim($_POST['r_year']),
              'vin_number' => trim($_POST['vin']),
              'manufacture_year' => trim($_POST['year']),
              'insurance_company' => trim($_POST['insu_pro']),
              'insurance_number' => trim($_POST['insu_pn']),
              'passenger_capacity' => trim($_POST['passenger_capacity']),
              'front_photo' => $_FILES['front_photo'], // Handle file uploads separately
              'side_photo_1' => $_FILES['side_photo_1'],
              'side_photo_2' => $_FILES['side_photo_2'],
              // Additional fields
             
          ];
  
          // Call the addVehicle method from the model to insert the data into the database
          if ($this->VehicleModel->addVehicle($data)) {
              redirect('pages/admin/viewVehicles'); // Redirect after successful insertion
          } else {
              die('Something went wrong.'); // Handle error if insertion fails
          }
      } else {
          // If request method is not POST, load the view with empty form fields
          $data = [
              'registration_number' => '',
              'vehicle_number' => '',
              'vehicle_type' => '',
              'vehicle_model' => '',
              'registration_year' => '',
              'vin_number' => '',
              'manufacture_year' => '',
              'insurance_company' => '',
              'insurance_number' => '',
              'passenger_capacity' => ''
          ];
          $this->view('pages/admin/addVehicles', $data); // Load the view with form fields
      }
  }

  public function addHr()
  {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // Handle form submission
          
          // Sanitize form data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
          // Check if user is logged in (You may adjust this part based on your authentication system)
          if (!isset($_SESSION['user_id'])) {
              redirect('login');
          }
          
          // Prepare data from the form
          $data = [
              'e_name' => trim($_POST['e_name']),
              'e_no' => trim($_POST['e_no']),
              'nic' => trim($_POST['nic']),
              'position' => trim($_POST['position']),
              'date' => trim($_POST['date']),
              'email' => trim($_POST['email'])
          ];
          
          // Instantiate the HR reservation model
          $hrModel = $this->model('Hrreservation');
          
          // Call the addHrManager method from the model to insert the data into the database
          if ($hrModel->addHr($data)) {
              redirect('pages/admin/viewHr'); // Redirect after successful insertion
          } else {
              die('Something went wrong.'); // Handle error if insertion fails
          }
      } else {
          // If request method is not POST, load the view with empty form fields
          $data = [
              'e_name' => '',
              'e_no' => '',
              'nic' => '',
              'position' => '',
              'date' => '',
              'email' => ''
          ];
          $this->view('pages/admin/addHr', $data); // Load the view with form fields
      }
  }

   

    

    // Add bank details
    public function addBankDetails() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Data array
            $data = [
                'driver_id' => trim($_POST['driver_id']),
                'accountNo' => trim($_POST['accountNo']),
                'bankName' => trim($_POST['bankName']),
                'branchName' => trim($_POST['branchName']),
                'holdersName' => trim($_POST['holdersName'])
            ];

            // Call model method to add bank details
            if ($this->bankModel->addBankDetails($data)) {
                // Bank details added successfully
                // Redirect or do something else as needed
            } else {
                die('Something went wrong.');
            }
        } else {
            // If not a POST request, load the view for adding bank details
            $this->view('add_bank_details');
        }
    }


    

    public function calculate() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve form data
            $driver_id = $_POST['driver_id'];
            $number_of_days = $_POST['number_of_days'];
            $additional_deduction_days = $_POST['additional_deduction_days']; // Additional days for deduction
            $basic_salary_per_day = $_POST['basic_salary_per_day'];
            $additional_deduction_payment = $_POST['additional_deduction_payment'];
            $service_commission_percentage = $_POST['service_commission_percentage'];

            // Perform any necessary validation

            // Calculate basic salary based on number of days
            $basic_salary = $basic_salary_per_day * $number_of_days;

            // Calculate additional deduction
            $additional_deduction_amount = $additional_deduction_days * $additional_deduction_payment;

            // Calculate service commission
            $service_commission = ($basic_salary / 100) * $service_commission_percentage;

            // Calculate total salary
            $total_salary = $basic_salary - $additional_deduction_amount + $service_commission;

            // Create data array for database insertion
            $salaryData = [
                'paymentID' => $this->generatePaymentID($driver_id),
                'driver_id' => $driver_id,
                'month' => date('F'), // Get the current month (Full name)
                'year' => date('Y'), // Get the current year (4-digit)
                'basic_salary' => $basic_salary,
                'number_of_days' => $number_of_days,
                'additional_deduction_days' => $additional_deduction_days,
                'additional_deduction_amount' => $additional_deduction_amount,
                'service_commission' => $service_commission,
                'total_salary' => $total_salary,
                'status' => '0' // Set default status to 'Pending'
            ];

            // Insert salary data into the database
            $this->salaryModel->insertSalary($salaryData);

            
            $this->view('pages/admin/addSalary', $salaryData);
        } else {
            // If request method is not POST, load the salary calculation view
            $this->view('pages/admin/addSalary');
        }
    }

    // Method to generate a unique paymentID based on driver_id, month, and year
    private function generatePaymentID($driver_id) {
        $month_year = date("my"); // Get the current month and year (formatted as 'mmyy')
        $payment_id = $driver_id . $month_year; // Concatenate the driver_id with the month and year
        
        return $payment_id;
    }
   
    
    
    
}

    

    

    



  



  

  


