<?php
/**
 *
 * SocialCalc/webapp/_lib/model/class.Chat.php
 * Chat Object
 * 
 */

class Chat {
    var $id;
    /**
     * @var str from_user
     */
    var $from_user;
    /**
     * @var str to_user
     */
    var $to_user;
    /**
     * @var str message
     */
    var $message;
    /**
     * @var datetime sent
     */
    var $sent;
    /**
     * @var int received
     */
    var $received;
    
    /**
     * Constructor
     * @param array $val Array of key/value pairs
     */
    public function __construct($val) {
        $this->id = $val["event_id"];
        $this->from_user = $val["from_user"];
        $this->to_user = $val["to_user"];
        $this->message = $val["message"];
        $this->sent = $val["sent"];
        $this->received = $val["received"];
    }
}