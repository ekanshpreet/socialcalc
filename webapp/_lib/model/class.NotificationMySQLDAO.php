<?php
/**
 *
 * SocialCalc/webapp/_lib/model/class.NotificationMySQLDAO.php
 *
 * Notification Data Access Object
 * The data access object for adding and notifications 
 */

class NotificationMySQLDAO extends PDODAO implements NotificationDAO  {

    public function insertNotification($vals) {
        $q = "INSERT INTO #prefix#notifications (title,message,author) VALUES (:title, :message, :author,)";
        $vars = array (
            ':title'=>$vals['title'],
            ':message'=>$vals['message'],
			':author'=>$vals['author']
        );
        $ps = $this->execute($q, $vars);
        return $this->getUpdateCount($ps);
    }
    
    public function retrieveNotifications() {
      	$q = "SELECT message FROM #prefix#notifications ORDER BY issue_time DESC LIMIT 10";
        $ps = $this->execute($q);
        return $this->getDataRowsAsArrays($ps);
    }
}