<?php
 
class Admins extends Controller
{

  private $userModel;
  private $vehicleModel;
  private $bankModel;
  private $salaryModel;
  private $outsalaryModel;
  private $adminModel;
  private $postModel;
  
 
  
  
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
    $this->vehicleModel = $this->model('Vehicle');
    $this->bankModel = $this->model('BankModel');
    $this->salaryModel = $this->model('Salary');
    $this->outsalaryModel = $this->model('OutSalaryModel'); 
    $this->adminModel = $this->model('Admin');
   
  


   
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
          if ($this->vehicleModel->addVehicle($data)) {
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


    
    // Function to handle form submission and insert salary details
    function handleFormSubmission() {
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $driver_id = $_POST['driver_id'];
            $number_of_trips = $_POST['number_of_trips'];
            $basic_payment = isset($_POST['edit_basic_payment']) ? $_POST['basic_payment'] : 2000;
            $total_amount = $basic_payment * $number_of_trips;
            $current_month = date("F"); // Month (Full name)
            $current_year = date("Y"); // Year (4-digit)
        
            $outSalaryModel = new OutSalaryModel();
            $data = [
                'driver_id' => $driver_id,
                'number_of_trips' => $number_of_trips,
                'basic_payment' => $basic_payment,
                'total_amount' => $total_amount,
                'month' => $current_month,
                'year' => $current_year
            ];
            if ($outSalaryModel->insertSalary($data)) {
                echo "Data inserted successfully!";
            } else {
                echo "Error inserting salary details.";
            }
        
            $this->view('pages/admin/out_salary', $data);
            } else {
            // If request method is not POST, load the salary calculation view
            $this->view('pages/admin/out_salary');
             }
        }
    function redirectToTimetable() {
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['driver_id'])) {
                $driver_id = $_GET['driver_id'];
                header("Location: view_schedule.php?driver_id=$driver_id");
                exit();
            }
            $this->view('pages/admin/view_schedule', );
        } 

    
    public function viewvehicle() {
            // Retrieve all vehicle details
            $data['vehicles'] = $this->vehicleModel->getVehicleDetails();
    
            // Pass the data to the view
            $this->view('pages/admin/viewVehicles', $data);
        }
        
            // Your existing code here
        
            
            
                // Method to handle displaying available vehicles
                public function availableVehicles() {
                    
                    $bookedDays = $this->vehicleModel->getBookedDays();
                    
                    include('pages/admin/available_vehicles.php');
                }
                public function viewSchedule($day, $timeSlot) {
                    include 'Model.php'; // Include the Model
                    
                    $timetable = $model->getTimetable($day, $timeSlot);
                    
                    if ($timetable !== null) {
                        $this->view('pages/admin/schedule_view', );// Include the View
                    } else {
                        echo "No timetable data available.";
                    }
                }
               
                
                    public function showVehicleDetails($reg_no) {
                        // Fetch vehicle details based on registration number
                        $vehicle_details = $this->vehicleModel->get_vehicle_details($reg_no);
                
                        // Pass the vehicle details to the view
                        if ($vehicle_details) {
                            return $this-> view('pages/admin/view_more', ['vehicle_details' => $vehicle_details, 'reg_no' => $reg_no]);
                        } else {
                            return $this->view('pages/admin/view_more', ['reg_no' => $reg_no]); // Display a 'not found' message
                        }
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
                                $this->view('pages/admin/as_employee', $data);
                            }
                
                        } else {
                            // Load view with errors
                            $this->view('pages/admin/as_employee', $data);
                        }
                
                    } else {
                        // Init data
                        $data = [
                            'email' => $_SESSION['user_email'], // Use the logged-in user's email
                            'password' => '',
                            'password_err' => ''
                        ];
                        // Load view
                        $this->view('pages/admin/as_employee', $data);
                    }   
}
public function viewhr()
{
  $hrmanagers = $this->userModel->getHrmanager();
  $data = [
    'hrmanagers' => $hrmanagers
  ];
  $this->view('pages/admin/view_hr', $data);
}          
public function deleteHR($id)
{
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the delete using $id
    // For example:
    if ($this->userModel->deleteEmployee($id)) {
      flash('post_message', 'HrManager deleted');
      redirect('admins/viewhr');
    } else {
      die('Something went wrong');
    }
  } else {
    // Handle if the POST request is not properly set
    redirect('admins/viewhr');
  }
}
public function updateHRStatus($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Handle the update using $id and $action
      // For example:
      $action = $_POST['action'];
      if ($action === 'approve') {
        $status = 'approved';
    } elseif ($action === 'reject') {
        $status = 'rejected';
    } elseif ($action === 'approve') {
        $status = 'approved';
    } else {
        // Handle invalid action
        die('Invalid action');
    }
    
    if ($this->userModel->updatestatus($id, $status)) {
        flash('post_message', 'HR Manager status updated');
        redirect('admins/viewhr');
    } else {
        die('Something went wrong');
    }
    } else {
      // Handle if the POST request is not properly set
      redirect('admins/viewhr');
    }
  }  
  public function viewFullDayBooking(){


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        
        //sanitize
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = array(
                'b_date' => trim($_POST['b_date']),
                'location' =>  trim($_POST['location']),
                'no_pas' =>  trim($_POST['no_pas']),
                'driver_id' =>  trim($_POST['driver_id']) ,
                'vehicle_id' => trim($_POST['vehicle_id']) ,
                'b_date_err' => '',
                'location_err' => '',
                'no_pas_err' => '',
                'driver_id_err' => '',
                'vehicle_id_err' => '')
        ;
            
        
        // $this->adminModel->addbooking($data);
     
       
            if($this->adminModel->addbooking($data)){
            echo ('booking Added Succesfully');
            
            redirect('admins/viewFullDayBooking');
            }
            else{
                die('Something went wrong');
            }
   
        
    }
    else{
        $data = [
            'title' => '',
            'body' => '',
            'title_err' => '',
            'body_err' => ''
        ];
        
        $this->view('pages/admin/full_day_booking', $data);   
    }   
}



  public function showTimetable()
  {
      // Fetch all data from the fullday_timetable table sorted by date
      $timetableData = $this->adminModel->getbooking() ;

      // Pass the data to the view
      return $this->view('pages/admin/full_booking', ['timetableData' => $timetableData]);
  }
  public function timetable_view($day, $timeSlot) {
    // Load model
    $this->model('Admin');

    // Fetch data from model based on day and time slot
    $data['timetable'] = $this->adminModel->get_timetable($day, $timeSlot);

    // Pass data to the view
    $data['day'] = $day;
    $data['timeSlot'] = $timeSlot;
    $this->view('pages/admin/schedule_view', $data);
}

   
}   
        
        
    
        

        
       
      
    

    
    

    
    


    

    

    



  



  

  

