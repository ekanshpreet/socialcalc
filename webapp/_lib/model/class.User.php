<?php
/**
 *
 * SocialCalc/webapp/_lib/model/class.User.php
 * User Object
 * 
 */

class User {
    var $id;
    /**
     * @var str username
     */
    var $username;
    /**
     * @var str full name
     */
    var $full_name;
    /**
     * @var str email
     */
    var $email;
    /**
     * @var str password
     */
    var $password;
    /**
     * @var str avatar
     */
    var $avatar;
    /**
     * @var date
     */
    var $joined;
    /**
     * @var int type
     * 0 for teacher, 1 for student
     */
    var $type;
    
    /**
     * @var date
     */
    var $last_seen;
    /**
     * @var int is_admin
     * 1 for admin rights, 0 otherwise
     */
    var $is_admin;
    /**
     * @var int is_available_to_chat
     * 1 for available, 0 for logged out of chat
     */
    var $is_available_to_chat;
    /**
     * Constructor
     * @param array $val Array of key/value pairs
     */
    public function __construct($val) {
        if (isset($val["id"])) {
            $this->id = $val["id"];
        }
        $this->username = $val["user_name"];
        $this->full_name = $val["full_name"];
        $this->email = $val["email"];
        $this->password = $val["password"];
        if (isset($val["avatar"])) {
            $this->avatar = $val["avatar"];
        }
        if (isset($val["joined"])) {
            $this->joined = $val["joined"];
        }
        if (isset($val["last_seen"])) {
            $this->last_seen = $val["last_seen"];
        }
        if (isset($val["type"])) {
            $this->type = $val["type"];
        }
        if (isset($val["is_admin"])) {
            $this->is_admin = $val["is_admin"];
        }
        if (isset($val["is_available_to_chat"])) {
            $this->is_available_to_chat = $val["is_available_to_chat"];
        }
    }
}