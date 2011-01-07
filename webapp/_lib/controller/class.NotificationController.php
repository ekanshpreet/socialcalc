<?php
/**
 * Notifications Controller
 *
 * Controller to generate the Notifications
 *
 */
class NotificationController extends SocialCalcController {
    
    public function go($generate_view=true) {
        $data = self::getNotifications();
	$this->disableCaching();        
        $this->addToView('notifications', $data);
        if ($generate_view) {
            $this->setViewTemplate('_notification.tpl');
            $this->generateView();
        }
    }
    
    protected function getNotifications() {
        // Initialise Notification Data Access Object
	$controller = new NotificationMySQLDAO;
        //Retrieve Notifications
	$latest_notifications= $controller->retrieveNotifications(); 
        // Return Data to View
        $data = array();
	for($i=0;$i<count($latest_notifications);$i++) {
	    $data[$i]=$latest_notifications[$i]['message'];
	}
        return $data;
    }
}