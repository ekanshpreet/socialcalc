<?php
/**
 *
 * SocialCalc/webapp/_lib/controller/class.LastSeenController.php
 *
 * Last Seen Controller
 * This Controller is used to update the last_seen field of users table. This field is used to
 * determine whether a user is still logged in or not
 *
 */
class LastSeenController extends SocialCalcController {
    
    public function go() {
        if($this->isLoggedIn()) {
            $dao = new UserMySQLDAO();
            $success = $dao->updateLastSeen($this->getLoggedInUser());
        }
    }
}