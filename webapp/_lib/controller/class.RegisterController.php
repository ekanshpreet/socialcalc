<?php
/**
 *
 * SocialCalc/webapp/_lib/controller/class.RegisterController.php
 * 
 * Register Controller
 * Registers new SocialCalc users.
 * 
 */
class RegisterController extends SocialCalcController {
    /**
     * Required form submission values
     * @var array
     */
    var $REQUIRED_PARAMS = array('username', 'email', 'pass1', 'pass2', 'full_name','recaptcha_response_field');
    /**
     *
     * @var boolean
     */
    var $is_missing_param = false;

    public function __construct($session_started=false) {
        parent::__construct($session_started);
        $config = Config::getInstance();
		$site_root_path=$config->getValue('source_root_path');
		require_once('/../extlib/recaptcha-php-1.11/recaptchalib.php');
		$recaptchaPublicKey="6LfDKsASAAAAAJJUp9Sg4uBzGG9h4RbOohsjfFir";
		$recaptcha=recaptcha_get_html($recaptchaPublicKey);
		$key='captcha';
        $this->addToView($key, $recaptcha);
		$this->setViewTemplate('session.register.tpl');
        $this->addPageTitle('Register');
    }

    public function go(){
        if (!self::isLoggedIn()) {
            $this->disableCaching();
            $config = Config::getInstance();
            $user_dao = new UserMySQLDAO();
            $this->addToView('closed', false);
            $this->addToView('successmsg', false);
            if (isset($_POST['Submit']) && $_POST['Submit'] == 'Register') {
                foreach ($this->REQUIRED_PARAMS as $param) {
                    if (!isset($_POST[$param]) || $_POST[$param] == '' ) {
                        $this->addErrorMessage('Please fill out all required fields.');
                        $this->is_missing_param = true;
                    }
                }
                if (!$this->is_missing_param) {
					
					$recaptchaPrivateKey = "6LfDKsASAAAAAAIFM4rrJjJOwQt4B5zarcHhX3lW";
					$resp = recaptcha_check_answer ($recaptchaPrivateKey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
								
                    if (!Utils::validateEmail($_POST['email'])) {
                        $this->addErrorMessage("Incorrect email. Please enter valid email address.");
                    } elseif (strcmp($_POST['pass1'], $_POST['pass2']) || empty($_POST['pass1'])) {
                        $this->addErrorMessage("Passwords do not match.");
                    } elseif (!$resp->is_valid ) {
						$this->addErrorMessage("The characters entered do not match with the characters hown in the Image.");
					}else {
                        if ($user_dao->doesUserExist($_POST['username'])) {
                            $this->addErrorMessage("User account already exists.");
                        } else {
                            $es = new SmartySocialCalc();
                            $es->caching=false;
                            $session = new Session();
                            $cryptpass = $session->md5pwd($_POST['pass2']);
                            $server = $_SERVER['HTTP_HOST'];
                            $user_dao->createUser($_POST['username'], $_POST['email'], $cryptpass, $_POST['full_name'], 1);

                            $this->addSuccessMessage("Success! You can login now from the main page.");
                        }
                    }
                }
                if (isset($_POST["full_name"])) {
                    $this->addToView('name', $_POST["full_name"]);
                }
                if (isset($_POST["email"])) {
                    $this->addToView('mail', $_POST["email"]);
                }
            }
            return $this->generateView();
        }
    }
}