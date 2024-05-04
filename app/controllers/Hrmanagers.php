<?php
class Hrmanagers extends Controller
{
  private $userModel;
  private $employeeReservationModel;
  private $workTripModel;
  private $postModel;
  private $emplyeeReservationoModel;
  public function __construct()
  {
    // if not logged in, redirect to landing page
    if (!isLoggedIn()) {
      $this->view('pages/index');
    }

    $this->userModel = $this->model('User');
    $this->employeeReservationModel = $this->model('EmployeeReservation');


  }
  public function home()
  {
    if (!isLoggedIn()) {
      $this->view('pages/index');
    } else {
      $data = [
        'title' => 'HR Manager',
        'description' => 'Welcome to the HR Manager page'
      ];
      $this->view('pages/hrmanager/home_hr', $data);
    }
  }

  public function dashboard()
  {
    $data = [
      'title' => 'HR Manager',
      'description' => 'Welcome to the HR Manager page'
    ];
    $this->view('pages/hrmanager/dashboard_hr', $data);
  }

  public function viewEmployees()
  {
    $employees = $this->userModel->getEmployees();
    $data = [
      'employees' => $employees
    ];
    $this->view('pages/hrmanager/view_employees', $data);
  }

  public function updateEmployeeStatus($id)
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
        $user = $this->userModel->getUserById($id);
        $mail = new Mail();
        if ($status == 'approved') {
          $htmlBody = "
                                                <p>Dear '$user->name',</p>
                                                <p>Exciting News!</p>
                                                <p>We are writing to inform you about the status of your RouteReady account.</p>
                                                <p>Your account is: <strong>Approved</strong></p>
                                                <p>Now you can log-in to your RouteReady account, <br>
                                                please click <br>
                                                <a href=\"http://localhost/RouteReady/users/login\"style=\"display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;\">Here</a></p>
                                                <p>If you have any questions or need further assistance, please don't hesitate to contact us.</p>
                                                <p>Thank you for choosing RouteReady.</p>";
          $mail->send($user->email, 'Account Approved', $htmlBody);
        } elseif ($status == 'rejected') {
          $htmlBody = "
                                                <p>Dear '$user->name',</p>
                                                <p>We are writing to inform you about the status of your RouteReady account.</p>
                                                <p>Your account status: <strong>Rejected</strong></p>
                                                <p>You can register again, <br>
                                                please click <br>
                                                <a href=\"http://localhost/RouteReady/\"style=\"display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;\">Here</a></p>
                                                <p>If you have any questions or need further assistance, please don't hesitate to contact us.</p>
                                                <p>Thank you for choosing RouteReady.</p>";
                        $mail->send($user->email, 'Account Rejected', $htmlBody);
        }
        flash('post_message', 'Employee status updated');
        redirect('hrmanagers/viewEmployees');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/viewEmployees');
    }
  }

  public function deleteEmployee($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Handle the delete using $id
      // For example:
      if ($this->userModel->deleteEmployee($id)) {
        flash('post_message', 'Employee deleted');
        redirect('hrmanagers/viewEmployees');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/viewEmployees');
    }
  }

  public function viewDrivers()
  {
    $drivers = $this->userModel->getDrivers();
    $data = [
      'drivers' => $drivers

    ];
    $this->view('pages/hrmanager/view_drivers', $data);
  }
  public function viewOSDrivers()
  {
    $drivers = $this->userModel->getOSDrivers();
    $data = [
      'drivers' => $drivers

    ];
    $this->view('pages/hrmanager/view_osdrivers', $data);
  }

  public function updatedriverStatus($id)
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
      if ($this->userModel->updatedriverStatus($id, $status)) {
        $user = $this->userModel->getUserById($id);
        $mail = new Mail();
        if ($status == 'approved') {
          $htmlBody = "
                                                <p>Dear '$user->name',</p>
                                                <p>Exciting News!</p>
                                                <p>We are writing to inform you about the status of your RouteReady account.</p>
                                                <p>Your account is: <strong>Approved</strong></p>
                                                <p>Now you can log-in to your RouteReady account, <br>
                                                please click <br>
                                                <a href=\"http://localhost/RouteReady/users/login\"style=\"display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;\">Here</a></p>
                                                <p>If you have any questions or need further assistance, please don't hesitate to contact us.</p>
                                                <p>Thank you for choosing RouteReady.</p>";
          $mail->send($user->email, 'Account Approved', $htmlBody);
        } elseif ($status == 'rejected') {
          $htmlBody = "
                                                <p>Dear '$user->name',</p>
                                                <p>We are writing to inform you about the status of your RouteReady account.</p>
                                                <p>Your account status: <strong>Rejected</strong></p>
                                                <p>You can register again, <br>
                                                please click <br>
                                                <a href=\"http://localhost/RouteReady/\"style=\"display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;\">Here</a></p>
                                                <p>If you have any questions or need further assistance, please don't hesitate to contact us.</p>
                                                <p>Thank you for choosing RouteReady.</p>";
                        $mail->send($user->email, 'Account Rejected', $htmlBody);
        }
        flash('post_message', 'Driver status updated');
        redirect('hrmanagers/moreDriver/' . $id . '');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/moreDriver/' . $id . '');
    }
  }
  public function updateosdriverStatus($id)
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
      if ($this->userModel->updatedriverStatus($id, $status)) {
        $user = $this->userModel->getUserById($id);
        $mail = new Mail();
        if ($status == 'approved') {
          $htmlBody = "
                                                <p>Dear '$user->name',</p>
                                                <p>Exciting News!</p>
                                                <p>We are writing to inform you about the status of your RouteReady account.</p>
                                                <p>Your account is: <strong>Approved</strong></p>
                                                <p>Now you can log-in to your RouteReady account, <br>
                                                please click <br>
                                                <a href=\"http://localhost/RouteReady/users/login\"style=\"display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;\">Here</a></p>
                                                <p>If you have any questions or need further assistance, please don't hesitate to contact us.</p>
                                                <p>Thank you for choosing RouteReady.</p>";
          $mail->send($user->email, 'Account Approved', $htmlBody);
        } elseif ($status == 'rejected') {
          $htmlBody = "
                                                <p>Dear '$user->name',</p>
                                                <p>We are writing to inform you about the status of your RouteReady account.</p>
                                                <p>Your account status: <strong>Rejected</strong></p>
                                                <p>You can register again, <br>
                                                please click <br>
                                                <a href=\"http://localhost/RouteReady/\"style=\"display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;\">Here</a></p>
                                                <p>If you have any questions or need further assistance, please don't hesitate to contact us.</p>
                                                <p>Thank you for choosing RouteReady.</p>";
                        $mail->send($user->email, 'Account Rejected', $htmlBody);
        }
        flash('post_message', 'Driver status updated');
        redirect('hrmanagers/moreOSDriver/' . $id . '');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/moreOSDriver/' . $id . '');
    }
  }

  public function deletedriver($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Handle the delete using $id
      // For example:
      if ($this->userModel->deletedriver($id)) {
        flash('post_message', 'Driver deleted');
        redirect('hrmanagers/moreDriver/' . $id . '');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/moreDriver/' . $id . '');
    }
  }
  public function deleteosdriver($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Handle the delete using $id
      // For example:
      if ($this->userModel->deletedriver($id) && $this->userModel->deleteOSDriver($id)) {
        flash('post_message', 'Driver deleted');
        redirect('hrmanagers/moreOSDriver/' . $id . '');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/moreOSDriver/' . $id . '');
    }
  }



  public function moreDriver($id)
  {
    $driver = $this->userModel->getDriverById($id);
    $data = [
      'driver' => $driver,

    ];
    $this->view('pages/hrmanager/view_drivers_more', $data);
  }
  public function moreOSDriver($id)
  {
    $driver = $this->userModel->getDriverById($id);
    $osdriver = $this->userModel->getOSDriverById($id);
    $data = [
      'driver' => $driver,
      'osdriver' => $osdriver

    ];
    $this->view('pages/hrmanager/view_osdrivers_more', $data);
  }




  public function asEmployee()
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      }

      // Make sure errors are empty
      if (empty($data['password_err'])) {
        // Validated

        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);
        if ($loggedInUser) {

          redirect('employees/home');
        } else {
          $data['password_err'] = 'Password incorrect';
          $this->view('pages/hrmanager/as_employee', $data);
        }

      } else {
        // Load view with errors
        $this->view('pages/hrmanager/as_employee', $data);
      }

    } else {
      // Init data
      $data = [
        'email' => $_SESSION['user_email'], // Use the logged-in user's email
        'password' => '',
        'password_err' => ''
      ];
      // Load view
      $this->view('pages/hrmanager/as_employee', $data);
    }
  }

  // Controller: calculatePayments method
  public function calculatePayments()
  {
    // Check if the user is logged in
    if (!isLoggedIn()) {
      redirect('login');
    }

    // Get approved users only
    $approvedUsers = $this->userModel->getApprovedUsers();

    // Check if a month and year are selected
    $selectedMonth = isset($_POST['month']) ? $_POST['month'] : date('m'); // Default to current month if not selected
    $selectedYear = isset($_POST['year']) ? $_POST['year'] : date('Y'); // Default to current year if not selected

    // Initialize an array to store payments for each user
    $payments = [];

    // Iterate through each approved user to calculate payments
    foreach ($approvedUsers as $user) {
      // Calculate payments for the user for the selected month and year
      $paymentInfo = $this->employeeReservationModel->calculateMonthlyPayments($user->id, $selectedMonth, $selectedMonth, $selectedYear);

      // Store user's information along with payments
      $payments[] = [
        'emp_id' => $user->emp_id,
        'name' => $user->name, // Assuming 'name' property exists in your user object, adjust accordingly
        'totalPayment' => $paymentInfo['totalPayment']
      ];
    }

    // Prepare data to pass to the view
    $data = [
      'selectedMonth' => $selectedMonth,
      'selectedYear' => $selectedYear,
      'payments' => $payments
    ];

    // Load the view to display the payments for each user
    $this->view('pages/hrmanager/payments', $data);
  }

}