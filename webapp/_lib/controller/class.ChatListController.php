<?php
/**
 *
 * SocialCalc/webapp/_lib/controller/class.LoginController.php
 *
 * Login Controller
 *
 */
class ChatListController extends SocialCalcController {

    public function go($generate_view = true) {
	if (isset($_GET['chat_status'])) {
	    self::changeStatus($_GET['chat_status']);
	}
	$this->disableCaching();
	$users = self::getUserList();
	$available = self::isAvailableToChat();
	$this->addToView('online_users',$users);
	$this->addToView('is_available_to_chat', $available);
	if ($generate_view) {
	    $this->setViewTemplate("_onlineusers.tpl");
	    $this->generateView();
	}
    }
    
    /**
     * Function to retrieve list of logged in users
     */
    protected function getUserList() {
	$controller = new ChatMySQLDAO();
	if(!isset($_SESSION['username'])) {
	    return;
	}
	$users = $controller->getUserList($_SESSION['username']);
	$data = array();
	$i = 0;
	foreach ($users as $user) {
	    $data[$i++] = $user['user_name'];
	}
	return $data;
    }
    
    protected function isAvailableToChat() {
	$controller = new ChatMySQLDAO();
	if (isset($_SESSION['username'])) {
	    $available = $controller->getChatAvailability($_SESSION['username']);
	    return $available['is_available_to_chat'];
	}
	return NULL;
    }
    
    protected function changeStatus($status) {
	$controller = new ChatMySQLDAO();
	$controller->updateChatAvailability($_SESSION['username'],$status);
    }
}