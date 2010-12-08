<?php
/**
 *
 * SocialCalc/webapp/_lib/model/class.EventMySQLDAO.php
 *
 * Event Data Access Object
 * The data access object for retrieving and saving events in the SocialCalc database
 */

class EventMySQLDAO extends PDODAO implements EventDAO  {

    public function getEventsOfDay($date) {
        $q = "SELECT * FROM #prefix#events WHERE date='$date' ORDER BY time";
        $ps = $this->execute($q);
        return $this->getDataRowsAsArrays($ps);
    }
    
    public function getEventsOfMonth($month) {
        $q = "SELECT date FROM #prefix#events WHERE date LIKE '%-$month-%' ORDER BY date";
        $ps = $this->execute($q);
        return $this->getDataRowsAsArrays($ps);
    }
        
    public function addEvent($vals){
        $q = "INSERT INTO #prefix#events SET title = :title, target_class = :target_class, ";
        $q .= " target_section = :target_section, date = :date, time = :time, description = :desc, ";
        $q .= " duration = :duration, created_by = :created_by ";
        $vars = array(
            ':title'=>$vals['title'],
            ':target_class'=>$vals['target_class'],
            ':target_section'=>$vals['target_section'],
            ':date'=>$vals['date'],
            ':time'=>$vals['time'],
            ':desc'=>$vals['description'],
            ':duration'=>$vals['duration'],
            ':created_by'=>$vals['created_by']
        );
        $ps = $this->execute($q, $vars);
        return $this->getUpdateCount($ps);
    }
    
    // TODO create function and view to use it
    // TODO add it to interface EventDAO
    public function modifyEvent($vals) {
        
    }
    
    // TODO create function to use in modifyEvent()
    // TODO create PHPdoc block for function
    protected function getEvent($event_id) {
        
    }
}