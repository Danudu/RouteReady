<?php

class Admins extends Controller
{

  private $userModel;
  private $postModel;
  private $VehicleModel;
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
}