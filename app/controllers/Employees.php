<?php
class Employees extends Controller
{

  private $userModel;
  private $employeeReservationModel;
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
    $this->employeeReservationModel = $this->model('EmployeeReservation');
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
  
         
   
          if (empty($data['schedule']) || empty($data['route']) || empty($data['Date'])) {
            flash('error', 'Please fill out all required fields.');
            $this->view('pages/employee/makeReservation', $data);
            return;
        }

        // If the schedule is "ToWork", ensure the pickup city is provided
        if ($data['schedule'] === "ToWork" && empty($data['pickup'])) {
            flash('error', 'Please enter the pickup city.');
            $this->view('pages/employee/makeReservation', $data);
            return;
        }

        // If the schedule is "FromWork", ensure the drop-off city is provided
        if ($data['schedule'] === "FromWork" && empty($data['dropoff'])) {
            flash('error', 'Please enter the drop-off city.');
            $this->view('pages/employee/makeReservation', $data);
            return;
        }

          // Get the total count of both monthly and daily reservations for the route on the date
          $totalMonthlyCount = $this->employeeReservationModel->getMonthlyReservationCountByRouteAndDate($data['route'], $data['Date']);
          $totalDailyCount = $this->employeeReservationModel->getDailyReservationCountByRouteAndDate($data['route'], $data['Date']);
  
          // Define the reservation limit
          $reservationLimit = 2;
  
          // Check if the total reservation count exceeds the limit
          if (($totalMonthlyCount + $totalDailyCount) >= $reservationLimit) {
              // Display error message if the limit is exceeded
              flash('error', 'Reservation limit exceeded for this route on the selected date.');
              // Load the view with the error message
              $this->view('pages/employee/makeReservation', $data);
              // Stop further execution
              return;
          }
  
          // If the limit is not exceeded and there is no existing reservation, proceed with making the reservation
          if ($this->employeeReservationModel->makeReservation($data)) {
              // Reservation successful
              // Redirect or show success message
              redirect('employees/viewReservation');
          } else {
              // Reservation failed
              // Redirect or show error message
              flash('error', 'Failed to make reservation. Please try again.');
              redirect('employees/viewReservation');
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
            'dropoff' => trim($_POST['dropoff']), // Always retrieve dropoff field
            'id' => $user_id
        ];

        // Check if all required fields are filled
        if (empty($data['schedule']) || empty($data['route']) || empty($data['StartDate']) || empty($data['EndDate'])) {
            flash('error', 'Please fill out all required fields.');
            $this->view('pages/employee/makeReservation', $data);
            return;
        }

        // If the schedule is "ToWork", ensure the pickup city is provided
        if ($data['schedule'] === "ToWork" && empty($data['pickup'])) {
            flash('error', 'Please enter the pickup city.');
            $this->view('pages/employee/makeReservation', $data);
            return;
        }

        // If the schedule is "FromWork", ensure the drop-off city is provided
        if ($data['schedule'] === "FromWork" && empty($data['dropoff'])) {
            flash('error', 'Please enter the drop-off city.');
            $this->view('pages/employee/makeReservation', $data);
            return;
        }

        // Make reservation if all checks pass
        if ($this->employeeReservationModel->monthlyMakeReservation($data)) {
            redirect('employees/viewReservation');
        } else {
            die('Something went wrong');
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
  
      
  
      // Load the edit daily reservation view with reservation data and initial state
      $data = [
          'reservation' => $reservation,
     
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

        // Validate the form fields
        if (empty($data['schedule']) || empty($data['route']) || empty($data['Date'])) {
            flash('error', 'Please fill out all required fields.');
            redirect('employees/editDailyReservation/' . $data['ReservationID']);
            return;
        }

        // If the schedule is "ToWork", ensure the pickup city is provided
        if ($data['schedule'] === "ToWork" && empty($data['pickup'])) {
            flash('error', 'Please enter the pickup city.');
            redirect('employees/editDailyReservation/' . $data['ReservationID']);
            return;
        }

        // If the schedule is "FromWork", ensure the drop-off city is provided
        if ($data['schedule'] === "FromWork" && empty($data['dropoff'])) {
            flash('error', 'Please enter the drop-off city.');
            redirect('employees/editDailyReservation/' . $data['ReservationID']);
            return;
        }

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

        // Validate the form fields
        if (empty($data['schedule']) || empty($data['route']) || empty($data['StartDate']) || empty($data['EndDate'])) {
            flash('error', 'Please fill out all required fields.');
            redirect('employees/editMonthlyReservation/' . $data['MReservationID']);
            return;
        }

        // If the schedule is "ToWork", ensure the pickup city is provided
        if ($data['schedule'] === "ToWork" && empty($data['pickup'])) {
            flash('error', 'Please enter the pickup city.');
            redirect('employees/editMonthlyReservation/' . $data['MReservationID']);
            return;
        }

        // If the schedule is "FromWork", ensure the drop-off city is provided
        if ($data['schedule'] === "FromWork" && empty($data['dropoff'])) {
            flash('error', 'Please enter the drop-off city.');
            redirect('employees/editMonthlyReservation/' . $data['MReservationID']);
            return;
        }

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


     if (empty($data['reason']) || empty($data['numofPassengers']) || empty($data['destination']) || empty($data['tripDate']) || empty($data['tripTime'])) {
      flash('error', 'Please fill out all required fields.');
      $this->view('pages/employee/makeWorkTrip', $data);
      return;
  }
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

    
      if (empty($data['reason']) || empty($data['numofPassengers']) || empty($data['destination']) || empty($data['tripDate']) || empty($data['tripTime'])) {
        flash('error', 'Please fill out all required fields.');
        redirect('employees/editWorkTrips/' . $data['tripID']);
        return;
    }
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

public function viewMonthlyReservations() {
    // Check if the user is logged in
    if (!isLoggedIn()) {
        redirect('login');
    }
    
    // Retrieve the user's ID from the session
    $user_id = $_SESSION['user_id'];
    
    // Retrieve selected month and year from the query parameters
    $selectedMonth = isset($_GET['month']) ? $_GET['month'] : date('m'); // Default to current month if not selected
    $selectedYear = isset($_GET['year']) ? $_GET['year'] : date('Y'); // Default to current year if not selected
    
    // Load the TransportReservation model
    $this->employeeReservationModel = $this->model('EmployeeReservation');

    $reservations = $this->employeeReservationModel->getReservationsForMonthYear($user_id, $selectedMonth, $selectedYear);
    
    // Get reservation count for the selected month and year
    $reservationCount = count($reservations);
    
    // Get reservations for the selected month and year
    $reservations = $this->employeeReservationModel->getReservationsForMonthYear($user_id, $selectedMonth, $selectedYear);
    
    // Prepare data to pass to the view
    $data = [
        'selectedMonth' => $selectedMonth,
        'selectedYear' => $selectedYear,
        'reservations' => $reservations
    ];
    
    // Load the view with the monthly reservation data
    $this->view('pages/employee/viewMonthlyReservations', $data);
}


public function checkReservationExistence()
{
    // Check if the user is logged in
    if (!isLoggedIn()) {
        // If not logged in, return unauthorized response
        http_response_code(401);
        echo json_encode(['error' => 'Unauthorized access']);
        return;
    }

    // Get the logged-in user's ID
    $userId = $_SESSION['user_id'];

    // Check if any reservation exists for the next day for the logged-in user
    $reservationExists = $this->employeeReservationModel->checkReservationExistsByDate($userId);

    // Prepare response array
    $response = [];

    if ($reservationExists) {
        // If reservation exists, set error message
        $response['error'] = 'You have already made a reservation for the next day.';
    }

    // Send response as JSON
    echo json_encode($response);
}



}
