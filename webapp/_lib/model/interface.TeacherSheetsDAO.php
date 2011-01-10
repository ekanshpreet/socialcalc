<?php
/**
 *
 * SocialCalc/webapp/_lib/model/interface.TeacherSheetDAO.php
 *
 * Teacher Sheet Data Access Object Interface
 */

interface TeacherSheetDAO {
    /**
     * Returns details of particular spreadsheet
     * @param int $id
     * @return array Deatils of Spreadsheet
     */
    public function getTeacherSheet($id);
    
    /**
     * Creates a new entry for the spreadsheet in the database
     * @param array $vals
     * @return update count
     */
    public function createTeacherSheet($vals);
    
    /**
     * Updates spreadsheet details
     * @param int $id
     * @param array $vals
     * @return update count
     */
    public function updateTeacherSheetDetails($id, $vals);
    
    /**
     * Saves spreadsheet
     * @param int $id
     * @param array $vals
     * @return update count
     */
    public function saveTeacherSheet($id, $vals);
    
    /**
     * Updates published field for sheet to 1
     * @param int $id
     * @return update count
     */
    public function publishTeacherSheet($id);
    
    /**
     * Updates published field for sheet to 0
     * @param int $id
     * @return update count
     */
    public function unpublishTeacherSheet($id);
}