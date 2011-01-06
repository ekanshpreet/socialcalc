<?php
/**
 *
 * SocialCalc/webapp/_lib/model/interface.NotificationsDAO.php
 *
 * Notifications Data Access Object Interface
 */

interface NotificationDAO {
    /**
     * Inserts Notifications in table 
	 * @param array Details of notification
     * @return int Update Count
     */
    public function insertNotification($val);
    
    /**
     * Returns 10 latest notifications from the table
     * @return array Notifications
     */
     public function retrieveNotifications();

}