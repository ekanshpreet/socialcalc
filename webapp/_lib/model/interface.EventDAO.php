<?php
/**
 *
 * SocialCalc/webapp/_lib/model/interface.EventDAO.php
 *
 * Event Data Access Object Interface
 */

interface EventDAO {
    /**
     * Returns all events in table of a particular date
     * @return array Details of Events
     */
    public function getEventsOfDay($date);
    
    /**
     * Returns dates of all events in table for a particular month
     * @return array Dates of Events of month
     */
    public function getEventsOfMonth($month);
    
    /**
     * Add Event to Table
     * @param Details of Event
     * @return int update count
     */
    public function addEvent($vals);
}