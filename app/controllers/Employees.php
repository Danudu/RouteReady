<?php
class Employees extends Controller
{

  private $userModel;
  private $employeeReservationModel;
  private $workTripModel;
  private $reservationModel;
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
    $this->employeeReservationModel = $this->model('EmployeeReservation');
    $this->workTripModel = $this->model('WorkTrip');
    $this->reservationModel = $this->model('ReservationModel');


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
      $this->view('pages/employee/employeeHome', $data);
    }
  }
  public function makeReservation()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Check if user is logged in
      if (!isset($_SESSION['user_id'])) {
        redirect('login');
      }

      // Retrieve user ID from session
      $user_id = $_SESSION['user_id'];

      // Prepare data array
      $data = [
        'schedule' => trim($_POST['schedule']),
        'route' => trim($_POST['route']),
        'Date' => trim($_POST['Date']),
        'pickup' => trim($_POST['pickup']),
        'dropoff' => isset($_POST['dropoff']) ? trim($_POST['dropoff']) : '',
        'id' => $user_id
      ];

      // Get the total count of both monthly and daily reservations for the route on the date
      $totalMonthlyCount = $this->employeeReservationModel->getMonthlyReservationCountByRouteAndDate($data['route'], $data['Date']);
      $totalDailyCount = $this->employeeReservationModel->getDailyReservationCountByRouteAndDate($data['route'], $data['Date']);

      // Define the reservation limit
      $reservationLimit = 3;

      // Check if the total reservation count exceeds the limit
      if (($totalMonthlyCount + $totalDailyCount) >= $reservationLimit) {
        // Display error message if the limit is exceeded
        flash('error', 'Reservation limit exceeded for this route on the selected date.');
        // Load the view with the error message
        $this->view('pages/employee/makeReservation', $data);
        // Stop further execution
        return;
      }

      // If the limit is not exceeded, proceed with making the reservation
      if ($this->employeeReservationModel->makeReservation($data)) {
        // Reservation successful
        // Redirect or show success message
        redirect('employees/viewReservation');
      } else {
        // Reservation failed
        // Redirect or show error message
        die('Something went wrong');
      }
    } else {
      // If not a POST request, load the view with default data
      $data = [
        'schedule' => '',
        'route' => '',
        'Date' => '',
        'pickup' => '',
        'dropoff' => ''
      ];

      $this->view('pages/employee/makeReservation', $data);
    }
  }




  public function monthlyMakeReservation()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if (!isset($_SESSION['user_id'])) {
        redirect('login');
      }

      // Retrieve user ID from session
      $user_id = $_SESSION['user_id'];

      // Sanitize POST
      $data = [
        'schedule' => trim($_POST['schedule']),
        'route' => trim($_POST['route']),
        'StartDate' => trim($_POST['StartDate']),
        'EndDate' => trim($_POST['EndDate']),
        'pickup' => trim($_POST['pickup']),
        'dropoff' => isset($_POST['dropoff']) ? trim($_POST['dropoff']) : '',
        'id' => $user_id
      ];

      // Validation and further checks go here


      // Make sure there are no errors
      if (empty($data['route_err']) && empty($data['schedule_err'])) {
        // Validation passed
        // Execute
        if ($this->employeeReservationModel->monthlyMakeReservation($data)) { // Correct method call
          // Redirect to the desired location
          redirect('employees/viewReservation');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('pages/employee/makeReservations', $data);
      }
    } else {
      // Default data for initial load
      $data = [
        'schedule' => '',
        'route' => '',
        'StartDate' => '',
        'EndDate' => '',
        'pickup' => '',
        'dropoff' => ''
      ];

      $this->view('pages/employee/makeReservation', $data);
    }

  }

  public function viewReservation($id = '')
  {
    if (!isset($_SESSION['user_id'])) {
      // Redirect to the login page if the user is not logged in
      redirect('login');
    }

    // Retrieve the user's ID from the session
    $user_id = $_SESSION['user_id'];

    // Get daily reservations
    $dailyReservations = $this->employeeReservationModel->getDailyReservations($user_id);

    // Get monthly reservations
    $monthlyReservations = $this->employeeReservationModel->getMonthlyReservations($user_id);

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
    $this->view('pages/employee/viewReservations', $data);
  }


  public function deleteReservation($ReservationID)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->employeeReservationModel->deleteReservation($ReservationID)) {
        redirect('employees/viewReservation');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('employees/viewReservation');
    }
  }
  public function deleteMonthlyReservation($MReservationID)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->employeeReservationModel->deleteMonthlyReservation($MReservationID)) {
        redirect('employees/viewReservation');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('employees/viewReservation');
    }
  }

  public function editDailyReservation($ReservationID)
  {
    if (!isset($_SESSION['user_id'])) {
      redirect('login');
    }

    // Retrieve the user's ID from the session
    $user_id = $_SESSION['user_id'];

    // Get the daily reservation details to populate the form
    $reservation = $this->employeeReservationModel->getDailyReservationById($ReservationID, $user_id);


    // Check if the reservation exists and belongs to the current user
    if (!$reservation) {
      // Redirect or show an error message
      redirect('employees/viewReservation');
    }

    // Load the edit daily reservation view with reservation data
    $data = [
      'reservation' => $reservation
    ];

    $this->view('pages/employee/editDailyReservation', $data);
  }

  public function updateDailyReservation()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (!isset($_SESSION['user_id'])) {
        redirect('login');
      }

      // Retrieve user ID from session
      $user_id = $_SESSION['user_id'];

      // Sanitize POST
      $data = [
        'ReservationID' => trim($_POST['ReservationID']),
        'schedule' => trim($_POST['schedule']),
        'route' => trim($_POST['route']),
        'Date' => trim($_POST['Date']),
        'pickup' => trim($_POST['pickup']),
        'dropoff' => isset($_POST['dropoff']) ? trim($_POST['dropoff']) : '',
        'id' => $user_id
      ];

      // Update the daily reservation
      if ($this->employeeReservationModel->updateDailyReservation($data)) {
        redirect('employees/viewReservation');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('employees/viewReservation');
    }
  }

  public function editMonthlyReservation($MReservationID)
  {
    if (!isset($_SESSION['user_id'])) {
      redirect('login');
    }

    // Retrieve the user's ID from the session
    $user_id = $_SESSION['user_id'];

    // Get the monthly reservation details to populate the form
    $reservation = $this->employeeReservationModel->getMonthlyReservationById($MReservationID, $user_id);

    // Check if the reservation exists and belongs to the current user
    if (!$reservation) {
      // Redirect or show an error message
      redirect('employees/viewReservation');
    }

    // Load the edit monthly reservation view with reservation data
    $data = [
      'reservation' => $reservation
    ];

    $this->view('pages/employee/editMonthlyReservation', $data);
  }

  public function updateMonthlyReservation()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (!isset($_SESSION['user_id'])) {
        redirect('login');
      }

      // Retrieve user ID from session
      $user_id = $_SESSION['user_id'];

      // Sanitize POST
      $data = [
        'MReservationID' => trim($_POST['MReservationID']),
        'schedule' => trim($_POST['schedule']),
        'route' => trim($_POST['route']),
        'StartDate' => trim($_POST['StartDate']),
        'EndDate' => trim($_POST['EndDate']),
        'pickup' => trim($_POST['pickup']),
        'dropoff' => isset($_POST['dropoff']) ? trim($_POST['dropoff']) : '',
        'id' => $user_id
      ];

      // Update the monthly reservation
      if ($this->employeeReservationModel->updateMonthlyReservation($data)) {
        redirect('employees/viewReservation');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('employees/viewReservation');
    }
  }


  //  WORKTRIP 
  public function makeWorkTrip()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      if (!isset($_SESSION['user_id'])) {
        redirect('login');
      }


      $user_id = $_SESSION['user_id'];



      $data = [
        'employee_name' => trim($_POST['e_name']),
        'email' => trim($_POST['email']),
        'reason' => trim($_POST['reason']),
        'numofPassengers' => trim($_POST['p_no']),
        'destination' => trim($_POST['des']),
        'comments' => trim($_POST['comments']),
        'tripDate' => trim($_POST['tripdate']),
        'tripTime' => trim($_POST['triptime']),
        'id' => $user_id
      ];



      if ($this->workTripModel->addWorkTrip($data)) {

        redirect('employees/viewWorkTrips');
      } else {
        die('Something went wrong.');
      }
    } else {

      $data = [
        'employee_name' => '',
        'email' => '',
        'reason' => '',
        'numofPassengers' => '',
        'destination' => '',
        'comments' => '',
        'tripDate' => '',
        'tripTime' => ''
      ];
      $this->view('pages/employee/makeWorkTrip', $data);
    }
  }




  public function viewWorkTrips($id = '')
  {
    if (!isset($_SESSION['user_id'])) {
      redirect('login');
    }

    $user_id = $_SESSION['user_id'];
    $workTripReservations = $this->workTripModel->getWorkTripReservations($user_id);

    $data = [
      'workTripReservations' => $workTripReservations
    ];
    $this->view('pages/employee/viewWorkTrips', $data);
  }

  public function deleteWorkTripReservation($tripID)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Check if the work trip reservation was successfully deleted
      if ($this->workTripModel->deleteWorkTripReservation($tripID)) {
        // Redirect to the view page after successful deletion
        redirect('employees/viewWorkTrips');
      } else {
        die('Error deleting work trip reservation');
      }
    } else {
      redirect('employees/viewWorkTrips');
    }
  }

  public function editWorkTrips($tripID)
  {
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
      redirect('login');
    }

    // Retrieve the user's ID from the session
    $user_id = $_SESSION['user_id'];

    // Get the work trip reservation details to populate the form
    $workTrip = $this->workTripModel->getWorkTripReservationById($tripID, $user_id);

    // Check if the reservation exists and belongs to the current user
    if (!$workTrip) {
      // Work trip not found or doesn't belong to the user
      flash('error', 'Work trip not found or you do not have permission to edit it.');
      redirect('employees/viewWorkTrips');
    }

    // Load the edit work trip reservation view with reservation data
    $data = [
      'workTrip' => $workTrip
    ];

    $this->view('pages/employee/editWorkTrips', $data);
  }

  public function updateWorkTripReservation()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (!isset($_SESSION['user_id'])) {
        redirect('login');
      }

      // Retrieve user ID from session
      $user_id = $_SESSION['user_id'];

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Prepare data array
      $data = [
        'tripID' => trim($_POST['tripID']),
        'employee_name' => trim($_POST['employee_name']),
        'email' => trim($_POST['email']),
        'reason' => trim($_POST['reason']),
        'numofPassengers' => trim($_POST['numofPassengers']),
        'destination' => trim($_POST['destination']),
        'comments' => trim($_POST['comments']),
        'tripDate' => trim($_POST['tripDate']),
        'tripTime' => trim($_POST['tripTime']),
        'id' => $user_id
      ];

      // Update the work trip reservation
      if ($this->workTripModel->updateWorkTripReservation($data)) {
        // Success message
        flash('success', 'Work trip reservation updated successfully.');
        redirect('employees/viewWorkTrips');
      } else {
        // Error message
        flash('error', 'Something went wrong. Please try again.');
        redirect('employees/viewWorkTrips');
      }
    } else {
      // If not a POST request, redirect to view work trips page
      redirect('employees/viewWorkTrips');
    }
  }






//   RESERVATION PAYMENT




  public function viewMonthlyPayments() {
    // Check if the user is logged in
    if (!isLoggedIn()) {
        redirect('login');
    }
    
    // Retrieve the user's ID from the session
    $user_id = $_SESSION['user_id'];
    
    // Check if a month and year are selected
    $selectedMonth = isset($_POST['month']) ? $_POST['month'] : date('m'); // Default to current month if not selected
    $selectedYear = isset($_POST['year']) ? $_POST['year'] : date('Y'); // Default to current year if not selected
    
    // Load the EmployeeReservation model
    $this->employeeReservationModel = $this->model('EmployeeReservation');
    
    // Get total payment for the selected month and year
    $totalPayment = $this->employeeReservationModel->getTotalPaymentForMonthYear($user_id, $selectedMonth, $selectedYear);
    
    // Prepare data to pass to the view
    $data = [
        'selectedMonth' => $selectedMonth,
        'selectedYear' => $selectedYear,
        'totalPayment' => $totalPayment
    ];
    
    // Load the view with the monthly payment data
    $this->view('pages/employee/viewMonthlyPayments', $data);
}


}


