<?php

class Admins extends Controller
{

  private $userModel;
  private $VehicleModel;
  private $workTripModel;
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
    $this->VehicleModel = $this->model('Vehicle');
    $this->workTripModel = $this->model('WorkTrip');


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
        session_start(); // Start the session

        // Check if user is logged in (You may adjust this part based on your authentication system)
        if (!isset($_SESSION['user_id'])) {
          redirect('login');
        }

        // Get user ID from session
        $user_id = $_SESSION['user_id'];

        // Prepare form data
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
            'passenger_capacity' => trim($_POST['capacity']),
            // Add other form fields
        ];

        // Call the addVehicle method from the model to insert the data into the database
        if ($this->VehicleModel->addVehicle($data)) {
            // Handle file uploads separately
            $front_photo = $this->uploadFile('image');
            $side_photo_1 = $this->uploadFile('images1');
            $side_photo_2 = $this->uploadFile('images2');

            // Update the database with file paths
            $this->VehicleModel->updatePhotos($front_photo, $side_photo_1, $side_photo_2);

            redirect('admins/addVehicles');
        } else {
            die('Something went wrong.'); // Handle error if insertion fails
        }
    } else {
        // If request method is not POST, redirect to the form page
        redirect('admins/addVehicles');
        exit;
    }
}

private function uploadFile($fileInputName)
{
    $uploadDirectory = 'uploads/';

    $fileName = basename($_FILES[$fileInputName]['name']);
    $targetFile = $uploadDirectory . $fileName;
    $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);

    // Check if file already exists
    if (file_exists($targetFile)) {
        return null; // Return null if file already exists
    }

    // Check file size
    if ($_FILES[$fileInputName]['size'] > 500000) {
        return null; // Return null if file size exceeds limit
    }

    // Allow certain file formats
    if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
        return null; // Return null if file format is not allowed
    }

    // Upload file
    if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetFile)) {
        return $fileName; // Return the uploaded file name
    } else {
        return null; // Return null if file upload fails
    }
}

public function viewPendingWorkTrips()
{
    $pendingWorkTrips = $this->workTripModel->getPendingWorkTripReservations(); // Fetch pending work trips from the model
    $data = [
        'pendingWorkTrips' => $pendingWorkTrips
    ];
    $this->view('pages/admin/viewPendingWorkTrips', $data); // Pass the data to the view
}



public function approveWorkTrip($tripID)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the action (approve or reject)
        $action = $_POST['action'];

        // Update the status of the work trip based on the action
        if ($action === 'approve') {
            $status = 'approved';
        } elseif ($action === 'reject') {
            $status = 'rejected';
        } else {
            // Handle invalid action
            die('Invalid action');
        }

        // Update the status in the database
        if ($this->workTripModel->updateStatus($tripID, $status)) {
            // Redirect to the view pending work trips page
            redirect('admins/viewPendingWorkTrips');
        } else {
            die('Something went wrong');
        }
    } else {
        // Handle if the request method is not POST
        redirect('admins/viewPendingWorkTrips');
    }
}
}


