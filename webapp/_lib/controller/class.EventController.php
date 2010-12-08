<?php
/**
 * Event Controller
 *
 * Controller to retrieve and display events
 *
 */
class EventController extends SocialCalcController {
    
    public function go($generate_view = true) {
        $date = self::getDate();
        $this->disableCaching();
        $controller = new EventMySQLDAO;
        
        if (!$generate_view) {
            $events_of_month = self::getEventsOfMonth($date);
            $this->addToView('event_dates',$events_of_month);
        }
        
        $events_of_day = $controller->getEventsOfDay($date);
        $this->addToView('event_list',$events_of_day);
        if ($generate_view) {
            $this->setViewTemplate('_event.tpl');
            $date = explode('-',$date);
            $this->addToView('year',$date[0]);
            $this->addToView('month',$date[1]);
            $this->addToView('date',$date[2]);
            $this->generateView();
        }
    }
    
    /**
     * Function to Add Event to Database
     */
    public function addEvent() {
        $vals['title'] = $_POST['title'];
        $vals['target_class'] = $_POST['class'];
        $vals['target_section'] = $_POST['section'];
        $vals['date'] = $_POST['date'];
        $vals['time'] = $_POST['time'].":00";
        $vals['duration'] = $_POST['duration'];
        $vals['description'] = isset($_POST['description'])?$_POST['description']:NULL;
        // TODO Change the below field
        $vals['created_by'] = 1;
        $controller = new EventMySQLDAO;
        $controller->addEvent($vals);
    }
    
    /**
     * Get Date Function
     */
    protected function getDate() {
        // Initialize Variables
        $day = isset($_GET['day'])?$_GET['day']:date('j');
        $month = isset($_GET['month'])?$_GET['month']:date('m');
        $year = isset($_GET['year'])?$_GET['year']:date('Y');
        return "$year-$month-$day";
    }
    
    /**
     * Function to obtain list of dates of month that have an event
     */
    public function getEventsOfMonth($date) {
        $date = explode('-',$date);
        $month = $date[1];
        $controller = new EventMySQLDAO;
        $list = $controller->getEventsOfMonth($month);
        $event_dates_array = array();
        $j = 0;
        for ($i=1; $i<=31; $i++) {
            if (isset($list[$j]['date'])) {
                $day = explode('-', $list[$j]['date']);
            } else {
                $day[2] = NULL;
            }
            if ($i == $day[2]) {
                $event_dates_array["$i"] = "has-event";
                $j++;
            } else {
                $event_dates_array["$i"] = NULL;
            }
        }
        return $event_dates_array;
    }
}