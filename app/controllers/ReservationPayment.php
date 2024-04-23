<?php
class ReservationPayment extends Controller
{
    private $userModel;
    private $reservationModel;

    public function __construct()
    {
        // Initialize models
        $this->userModel = $this->model('User');
        $this->reservationModel = $this->model('ReservationModel');

        // Check authentication
        if (!isLoggedIn()) {
            redirect('login');
        }
    }

    public function displayPayments()
    {
        // Check authentication
        if (!isLoggedIn()) {
            redirect('login');
        }
        
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
        }

        $user_id = $_SESSION['user_id']; // Assuming you have a function to get the logged-in user's ID
        
        // Get reservations and payments for the logged-in user
        $payments = $this->reservationModel->getReservationsAndPaymentsFromLast30Days($user_id);
    
        // Load view with payments data
        $data = ['payments' => $payments];
        $this->view('reservation/payment_display', $data);
    }
    
}
