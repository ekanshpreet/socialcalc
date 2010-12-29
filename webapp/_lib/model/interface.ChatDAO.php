<?php
/**
 *
 * SocialCalc/webapp/_lib/model/interface.ChatDAO.php
 *
 * Chat Data Access Object Interface
 */

interface ChatDAO {
    /**
     * Function to store chat message in database
     * @param str $to
     * @param str $from
     * @param str $message
     * @return int update count
     */
    public function sendChat($to, $from, $message);
    
    /**
     * Function to update status of chat message in database
     * @param str $to
     * @return int update count
     */
    public function updateStatus($to);
    
    /**
     * Function to retrieve chat message from database
     * @param str $to
     * @return array all unreceived chat messages
     */
    public function retrieveChat($to);
}