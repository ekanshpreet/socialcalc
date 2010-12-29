<?php
/**
 * Calendar Controller
 *
 * Controller to generate the calendar
 *
 */
class CalendarController extends SocialCalcController {
    
    public function go($generate_view=true) {
        $data = self::initializeCalendar();
        
        // Since AJAX is being used, disable Caching
        $this->disableCaching();        
        
        // TODO Convert to function in SocialCalcController depending upon future usage
        foreach ($data as $key=>$value) {
            $this->addToView($key, $value);
        }
        
        EventController::go(false);
        
        if ($generate_view) {
            $this->setViewTemplate('_calendar.tpl');
            $this->generateView();
        }
    }
    
    protected function initializeCalendar() {
        // Initialize Variables
        $day = isset($_GET['day'])?$_GET['day']:date('j');
        $month = isset($_GET['month'])?$_GET['month']:date('m');
        $year = isset($_GET['year'])?$_GET['year']:date('Y');
        $sel = isset($_GET['sel'])?$_GET['sel']:NULL;
        $what = isset($_GET['what'])?$_GET['what']:NULL;
        
        // Calculate month, number_of_days in the month and first_day of the month
        $current_time_stamp = strtotime("$year-$month-$day");
        $month_name = date('F', $current_time_stamp);
        $num_days = date('t', $current_time_stamp);
        $time_stamp = strtotime("$year-$month-1");
        $first_day = date("w", $time_stamp);
        
        $numEventsThisMonth = 0; 
        $hasEvent = false; 
        $todaysEvents = "";
        
        // Return Data to View
        $data = array();
        $data['date']=$day;
        $data['month']=$month;
        $data['month_name']=$month_name;
        $data['number_of_days']=$num_days;
        $data['year']=$year;
        $data['first_day']=$first_day;
        return $data;
    }
}