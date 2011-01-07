<?php
/**
 *
 * SocialCalc/webapp/_lib/controller/class.LogoutController.php
 *
 * Logout Controller
 * Log out of SocialCalc.
 *
 */
class LogoutController extends SocialCalcAuthController {
    public function authControl() {
        $this->app_session->logout();
        $controller = new HomePageController(true);
        $controller->addSuccessMessage("You have successfully logged out.");
        return $controller->go();
    }
}