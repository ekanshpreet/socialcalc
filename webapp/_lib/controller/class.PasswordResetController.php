<?php
/**
 *
 * SocialCalc/webapp/_lib/controller/class.PasswordResetController.php
 *
 * A controller for allowing a user to change their password if they have
 * the correct hash.
 * 
 */
class PasswordResetController extends SocialCalcController {

    public function go() {
        $session = new Session();
        $dao = new UserMySQLDAO();

        $this->addPageTitle('Reset Password');
        $this->setViewTemplate('session.resetpassword.tpl');
        $this->disableCaching();
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $user = $dao->getByPasswordToken($token);
        }

        if (!isset($_GET['token']) || (!$user)) {
            // token is nonexistant or bad
            $this->addErrorMessage('You have reached this page in error.');
            return $this->generateView();
        }

        if (!self::validateRecoveryToken($token)) {
            $this->addErrorMessage('Your token is expired.');
            return $this->generateView();
        }

        if (isset($_POST['password'])) {
            if ($_POST['password'] == $_POST['password_confirm']) {
                if ($dao->updatePassword($user['user_name'], $session->md5pwd($_POST['password'])) < 1 ) {
                    echo "not updated";
                }
                $login_controller = new LoginController(true);
                $login_controller->addSuccessMessage('You have changed your password.');
                return $login_controller->go();
            } else {
                $this->addErrorMessage("Passwords didn't match.");
            }
        } else if (isset($_POST['Submit'])) {
            $this->addErrorMessage('Please enter a new password.');
        }
        return $this->generateView();
    }
    
    /**
     * Returns whether a given password recovery token is valid or not.
     *
     * This requires that the token not be stale (older than a day), and that
     * token itself matches what's in the database.
     *
     * @param string $token The token to validate against the database.
     * @return bool Whether the token is valid or not.
     */
    protected function validateRecoveryToken($token) {
        $data = explode('_', $token);
        return (time() - $data[1] <= 86400);
    }
}
