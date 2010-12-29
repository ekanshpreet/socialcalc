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
            $this->addToView('is_logged_in', true);
            $this->addToView('logged_in_user', $this->getLoggedInUser());
        } else {
            ChatListController::go(false);
        }
        // Generate Calendar
        CalendarController::go(false);
            
        $this->generateView();
    }
}
    

