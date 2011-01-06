<?php
/**
 *
 * SocialCalc/webapp/_lib/model/class.Notification.php
 * Notification Object
 * 
 */

class Notification {
    var $id;
    /**
     * @var str title
     */
    var $title;
    /**
     * @var str notification
     */
    var $message;
    /**
     * @var str author
     */
    var $author;
    /**
     * @var date issue time
     */
    var $issue_time;
    /**
     * Constructor
     * @param array $val Array of key/value pairs
     */
    public function __construct($val) {
        if (isset($val["id"])) {
            $this->id = $val["id"];
        }
        $this->title = $val["title"];
        $this->message = $val["message"];
        $this->author = $val["email"];
        $this->issue_time = $val["issue_time"];
    }
}