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
        $this->addPageTitle('Learning Through Collaboration');
        
        // Generate Calendar
        CalendarController::go(false);
        
        $this->generateView();
    }
}
    

