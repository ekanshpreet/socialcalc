<?php
/**
 * Test Controller
 *
 * Controller to generate the view for the home page
 *
 */
class TestController extends SocialCalcController {
    
    public function go() {
        $this->setViewTemplate('test.tpl');
        $this->addHeaderJavaScript('main.js');
        $this->addPageTitle('Learning Through Collaboration');
           
        $this->generateView();
    }
}