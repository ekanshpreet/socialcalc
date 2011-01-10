<?php
/**
 *
 * SocialCalc/webapp/_lib/model/interface.StudentSheetDAO.php
 *
 * Student Sheet Data Access Object Interface
 */

interface StudentSheetDAO {
    /**
     * Returns details of particular spreadsheet
     * @param int $id
     * @return array Deatils of Spreadsheet
     */
    public function getStudentSheet($id);
    
    /**
     * Creates a new entry for the spreadsheet in the database
     * @param array $vals
     * @return update count
     */
    public function createStudentSheet($vals);
    
    /**
     * Updates spreadsheet details
     * @param int $id
     * @param array $vals
     * @return update count
     */
    public function updateStudentSheetDetails($id, $vals);
    
    /**
     * Saves spreadsheet
     * @param int $id
     * @param array $vals
     * @return update count
     */
    public function saveStudentSheet($id, $vals);
    
    /**
     * Updates published field for sheet to 1
     * @param int $id
     * @return update count
     */
    public function publishStudentSheet($id);
    
    /**
     * Updates published field for sheet to 0
     * @param int $id
     * @return update count
     */
    public function unpublishStudentSheet($id);
}