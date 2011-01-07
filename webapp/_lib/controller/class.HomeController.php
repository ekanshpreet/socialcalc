<?php
/**
 * Home Controller
 *
 * Controller to generate the view for the home page
 *
 */
class HomeController extends SocialCalcController {
        
    public function go() {
        $this->disableCaching();
        $this->setViewTemplate('home.tpl');
        $this->addHeaderJavaScript('main.js');
        $this->addHeaderJavaScript('chat.js');
        $this->addPageTitle('Learning Through Collaboration');
            
        if(!$this->isLoggedIn()) {
            // Login Box
            LoginController::go(false);
        } else {
            ChatListController::go(false);
        }
        // Generate Calendar
        CalendarController::go(false);
	// Generate Notifications
	NotificationController::go(false);
            
        $this->generateView();
    }
}
    

