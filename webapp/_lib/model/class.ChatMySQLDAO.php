<?php
/**
 *
 * SocialCalc/webapp/_lib/model/class.ChatMySQLDAO.php
 *
 * Chat Data Access Object
 * The data access object for sending and receiving instant messages across the network
 */

class ChatMySQLDAO extends PDODAO implements ChatDAO  {

    public function sendChat($to, $from, $message) {
        $q = "INSERT INTO #prefix#chat (from_user,to_user,message,sent) VALUES (:from, :to, :message, NOW())";
        $vars = array (
            ':from'=>$from,
            ':to'=>$to,
            ':message'=>$message
        );
        $ps = $this->execute($q, $vars);
        return $this->getUpdateCount($ps);
    }
    
    public function updateStatus($to) {
        $q = "UPDATE #prefix#chat SET recd = 1 WHERE to_user=:to and recd = 0";
        $vars = array (
            ':to'=>$to
        );
        $ps = $this->execute($q, $vars);
        return $this->getUpdateCount($ps);
    }
    
    public function retrieveChat($to) {
      	$q = "SELECT * FROM #prefix#chat WHERE (to_user = :to AND recd = 0) ORDER BY id ASC";
        $vars = array (
            ':to'=>$to
        );
        $ps = $this->execute($q, $vars);
        return $this->getDataRowsAsArrays($ps);
    }
    
    public function getUserList($username) {
        return UserMySQLDAO::getListOfLoggedInUsers($username);
    }
    
    public function getChatAvailability($username) {
        return UserMySQLDAO::getChatAvailability($username);
    }
    
    public function updateChatAvailability($username, $status) {
        return UserMySQLDAO::updateChatAvailability($username, $status);
    }
}