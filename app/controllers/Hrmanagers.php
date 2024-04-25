<?php
class Hrmanagers extends Controller
{
  public function __construct()
  {
    // if not logged in, redirect to landing page
    if (!isLoggedIn()) {
      $this->view('pages/index');
    }

    $this->userModel = $this->model('User');


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
      $status = $action === 'approve' ? 'approved' : 'pending';
      if ($this->userModel->updatestatus($id, $status)) {
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

  public function updatedriverStatus($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Handle the update using $id and $action
      // For example:
      $action = $_POST['action'];
      $status = $action === 'approve' ? 'approved' : 'pending';
      if ($this->userModel->updatedriverStatus($id, $status)) {
        flash('post_message', 'Driver status updated');
        redirect('hrmanagers/moreDriver/'.$id.'');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/moreDriver/'.$id.'');
    }
  }

  public function deletedriver($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Handle the delete using $id
      // For example:
      if ($this->userModel->deletedriver($id)) {
        flash('post_message', 'Driver deleted');
        redirect('hrmanagers/moreDriver/'.$id.'');
      } else {
        die('Something went wrong');
      }
    } else {
      // Handle if the POST request is not properly set
      redirect('hrmanagers/moreDriver/'.$id.'');
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

  public function viewEmployeePayments()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $employee_id = $_POST['employee_id'];
        $start_month = $_POST['start_month'];
        $end_month = $_POST['end_month'];

        // Retrieve reservations for each month and calculate payment
        $payments = [];
        for ($month = $start_month; $month <= $end_month; $month++) {
            $reservations = $this->employeeReservationModel->getReservationsForMonthYear($employee_id, $month, date('Y'));
            $payment = count($reservations) * 400; // Assuming $400 per reservation
            $payments[date('F', mktime(0, 0, 0, $month, 1))] = $payment;
        }

        // Pass data to the view
        $data = [
            'employee_id' => $employee_id,
            'start_month' => $start_month,
            'end_month' => $end_month,
            'payments' => $payments,
            'display_payments' => true // Flag to indicate payment display
        ];

        // Load the view to display payments
        $this->view('pages/hrmanager/view_employee_payments', $data);
    } else {
        // Pass data to the view
        $data = [
            'display_payments' => false // Flag to indicate form display
        ];

        // Load the view to display the form
        $this->view('pages/hrmanager/view_employee_payments', $data);
    }
}

  
}