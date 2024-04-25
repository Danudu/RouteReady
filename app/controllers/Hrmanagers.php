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

    public function viewEmployeePayment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get form data
            $employee_id = $_POST['employee_id'];
            $start_month = $_POST['start_month'];
            $end_month = $_POST['end_month'];
            $year = date('Y'); // You can customize the year as needed

            // Get reservations count for the range of months and year
            $reservationsCount = $this->reservationModel->getReservationsCountForRange($employee_id, $start_month, $end_month, $year);

            // Calculate payment based on reservations count
            $paymentData = [];
            foreach ($reservationsCount as $month => $count) {
                // Calculate payment here based on count
                // For example, assuming $rate per reservation:
                $rate = 400; // Example rate per reservation
                $payment = $count * $rate;
                $paymentData[$month] = $payment;
            }

            // Prepare data to pass to view
            $data = [
                'employee_id' => $employee_id,
                'start_month' => $start_month,
                'end_month' => $end_month,
                'year' => $year,
                'reservationsCount' => $reservationsCount,
                'paymentData' => $paymentData
            ];

            // Load view with data
            $this->view('pages/hrmanager/view_employee_payment', $data);
        } else {
            // Handle if the POST request is not properly set
            redirect('hrmanagers/home');
        }
    }
}

  
