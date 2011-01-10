<?php
/**
 *
 * SocialCalc/webapp/_lib/model/class.StudentSheetsMySQLDAO.php
 *
 * Student SocialCalc Spreadsheets Data Access Object
 * The data access object for retrieving and saving socialcalc spreadsheets by students
 */
class StudentSheetMySQLDAO extends PDODAO implements StudentSheetDAO {
    
    public function getStudentSheet($id) {
        $q = "SELECT * FROM #prefix#student_sheets WHERE sheet_id=:id";
        $vars = array (
            ':id'=>$id
        );
        $ps = $this->execute($q, $vars);
        return $this->getDataRowAsArray($ps);
    }
    
    public function createStudentSheet($vals) {
        $q = "INSERT INTO #prefix#student_sheets SET student_id = :student_id, in_response_to = :response_to,";
        $q .= " subject = :subject, type = :type, created = NOW() ;";
        $vars = array(
            ':student_id'=>$vals['student_id'],
            ':response_to'=>isset($vals['in_response_to'])?$vals['in_response_to']:NULL,
            ':subject'=>isset($vals['subject'])?$vals['subject']:NULL,
            ':type'=>$vals['type']
        );
        $ps = $this->execute($q, $vars);
        return $this->getUpdateCount($ps);
    }
    
    public function updateStudentSheetDetails($id, $vals) {
        $q = "UPDATE #prefix#student_sheets SET title = :title WHERE sheet_id = :id ;";
        $vars = array (
            ':id' => $id,
            ':title' => isset($vals['title'])?$vals['title']:NULL
        );
        $ps = $this->execute($q, $vars);
        $results = $this->getUpdateCount($ps);
        return $results;
    }
    
    public function saveStudentSheet($id, $vals) {
        $q = "UPDATE #prefix#student_sheets SET link = :link, last_modified = NOW() WHERE sheet_id = :id;";
        $vars = array (
            ':link' => $vals['link'],
            ':id' => $id
        );
        $ps = $this->execute($q, $vars);
        $results = $this->getUpdateCount($ps);
        return $results;
    }
    
    public function publishStudentSheet($id) {
        $q = "UPDATE #prefix#student_sheets SET published = :publish WHERE sheet_id = :id;";
        $vars = array (
            ':publish' => 1,
            ':id' => $id
        );
        $ps = $this->execute($q, $vars);
        $results = $this->getUpdateCount($ps);
        return $results;
    }
    
    public function unpublishStudentSheet($id) {
        $q = "UPDATE #prefix#student_sheets SET published = :publish WHERE sheet_id = :id;";
        $vars = array (
            ':publish' => 0,
            ':id' => $id
        );
        $ps = $this->execute($q, $vars);
        $results = $this->getUpdateCount($ps);
        return $results;
    }
}