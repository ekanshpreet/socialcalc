<?php
/**
 *
 * SocialCalc/webapp/_lib/controller/class.ForgotPasswordController.php
 * A controller for sending requests for forgotten passwords.
 * 
 */

class ForgotPasswordController extends SocialCalcController {
    
    public function go() {
        
        if (isset($_POST['Submit']) && $_POST['Submit'] == 'Send') {
            $this->disableCaching();
            $dao = new UserMySQLDAO();
            $user = $dao->doesUserExist($_POST['username']);
            if ($user) {
                $token = md5(uniqid(rand()));
                $timestamp = $token . '_' . time();
                $token = $dao->updatePasswordToken($_POST['username'],$timestamp);
                
                $email = $dao->getEmail($_POST['username']);
                $email = $email['email'];
                
                $es = new SmartySocialCalc();
                $es->caching=false;

                $config = Config::getInstance();
                $es->assign('apptitle', $config->getValue('app_title') );
                $es->assign('recovery_url', "session/reset.php?token=$timestamp");
                $es->assign('server', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost');
                $es->assign('site_root_path', $config->getValue('site_root_path') );
                $message = $es->fetch('_email.forgotpassword.tpl');

                Mailer::mail($email, $config->getValue('app_title') . " Password Recovery", $message);

                $this->addSuccessMessage('Password recovery information has been sent to your email address.');
            } else {
                $this->addErrorMessage('Error: account does not exist.');
            }
        }
        $this->addPageTitle('Forgot Password');
        $this->setViewTemplate('session.forgot.tpl');

        return $this->generateView();
    }

}
