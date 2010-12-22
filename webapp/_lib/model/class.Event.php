<?php
/**
 *
 * SocialCalc/webapp/_lib/model/class.Event.php
 * Event Object
 * 
 */

class Event {
    var $id;
    /**
     * @var str title
     */
    var $title;
    /**
     * @var str target_class
     */
    var $target_class;
    /**
     * @var str target_section
     */
    var $target_section;
    /**
     * @var date date
     */
    var $date;
    /**
     * @var time time
     */
    var $time;
    /**
     * @var int duration (in hours)
     */
    var $duration;
    /**
     * @var str description (less than 160 characters)
     */
    var $description;
    /**
     * @var str created_by
     */
    var $created_by;

    /**
     * Constructor
     * @param array $val Array of key/value pairs
     */
    public function __construct($val) {
        $this->id = $val["event_id"];
        $this->title = $val["title"];
        $this->target_class = $val["target_class"];
        $this->target_section = $val["target_section"];
        $this->date = $val["date"];
        $this->time = $val["time"];
        $this->duration = $val["duration"];
        $this->description = $val["description"];
        $this->created_by = $val["created_by"];
    }
}