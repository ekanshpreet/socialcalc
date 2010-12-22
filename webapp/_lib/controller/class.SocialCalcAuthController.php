<?php
/**
 *
 * SocialCalc/webapp/_lib/controller/class.SocialCalcAuthController.php
 *
 * SocialCalc Authorized Controller
 *
 * Parent controller for all logged-in user-only actions
 *
 */
abstract class SocialCalcAuthController extends SocialCalcController {
    public function __construct($session_started=false) {
        parent::__construct($session_started);
    }

    public function control() {
        if ($this->isLoggedIn()) {
            return $this->authControl();
        } else {
            return $this->bounce();
        }
    }

    /**
     * Bounce user to public page or to error page.
     * @TODO bounce back to original action once signed in
     */
    protected function bounce() {
        if (get_class($this)=='HomeController') {
            $controller = new HomeController(true);
            return $controller->go();
        } else {
            $config = Config::getInstance();
            throw new Exception('You must <a href="'.$config->getValue('site_root_path').
            'session/login.php">log in</a> to do this.');
        }
    }
}