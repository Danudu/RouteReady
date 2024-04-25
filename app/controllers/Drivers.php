<?php
class Drivers extends Controller
{
    private $leaveModel;

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
        // Display the Apply Leave view page
        $this->view('pages/driver/apply_leave');
    }

    public function submitLeaveApplication()
    {
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data
            $driver_id = $_SESSION['user_id']; // Assuming driver_id is stored in session after login
            $type = $_POST['type'];
            $std_date = $_POST['std_date'];
            $end_date = $_POST['end_date'];
            $no_of_days = $_POST['no_of_days'];
            $reason = $_POST['reason'];

            // Process leave application
            $result = $this->leaveModel->submitLeaveApplication($driver_id, $type, $std_date, $end_date, $no_of_days, $reason);

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


}

  

