<?php
class TimetableController {
    public function timetable_view($day, $slot) {
        $adminModel = new AdminModel();
        $data['timetable'] = $adminModel->get_timetable($day, $slot);
        
        require_once 'views/schedule_view.php';
    }
}
