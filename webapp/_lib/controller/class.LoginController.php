<?php
/**
 *
 * SocialCalc/webapp/_lib/controller/class.LoginController.php
 *
 * Login Controller
 *
 */
class LoginController extends SocialCalcController {

    public function go($generate_view=true) {
        if($generate_view) {
            $this->addToView('generate_view',$generate_view);
            $this->addPageTitle('Log in');
            $this->setViewTemplate('session.login.tpl');
        }
        $this->disableCaching();
        //don't show login form if already logged in
        if ($this->isLoggedIn()) {
            $controller = new HomePageController();
            return $controller->go();
        } else  {
            if (isset($_POST['Submit']) && $_POST['Submit']=='Log In'
            && isset($_POST['username']) && isset($_POST['pwd']) ) {
                if ( $_POST['username']=='' || $_POST['pwd']=='') {
                    if ( $_POST['username']=='') {
                        $this->addErrorMessage("Username must not be empty");
                        return $this->generateView();
                    } else {
                        $this->addErrorMessage("Password must not be empty");
                        return $this->generateView();
                    }
                } else {
                    $session = new Session();
                    $user_dao = new UserMySQLDAO();
                    $user_name = $_POST['username'];
                    $this->addToView('username', $user_name);
                    $user = $user_dao->getDetails($user_name);
                    if (!$user) {
                        $this->addErrorMessage("Incorrect username");
                        return $this->generateView();
                    } elseif (!$session->pwdCheck($_POST['pwd'], $user['password'])) {
                        $this->addErrorMessage("Incorrect password");
                        return $this->generateView();
                    } else {
                        // this sets variables in the session
                        $session->completeLogin($user);
                        $controller = new HomePageController(true);
                        return $controller->go();
                    }
                }
            } else  {
                if($generate_view) {
                    $this->addToView('generate_view',$generate_view);
                    $this->setViewTemplate('session.login.tpl');
                    return $this->generateView();
                    $this->addPageTitle('Log in');
                }
            }
        }
    }
}