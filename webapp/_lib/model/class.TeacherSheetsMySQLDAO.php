<?php
/**
 *
 * SocialCalc/webapp/_lib/model/class.TeacherSheetsMySQLDAO.php
 *
 * Teacher SocialCalc Spreadsheets Data Access Object
 * The data access object for retrieving and saving socialcalc spreadsheets by teachers
 */
class TeacherSheetMySQLDAO extends PDODAO implements TeacherSheetDAO {
    
    public function getTeacherSheet($id) {
        $q = "SELECT * FROM #prefix#teacher_sheets WHERE sheet_id=:id";
        $vars = array (
            ':id'=>$id
        );
        $ps = $this->execute($q, $vars);
        return $this->getDataRowAsArray($ps);
    }
    
    public function createTeacherSheet($vals) {
        $q = "INSERT INTO #prefix#teacher_sheets SET teacher_id = :teacher_id, type = :type, ";
        $q .= " created = NOW() ;";
        $vars = array(
            ':teacher_id'=>$vals['teacher_id'],
            ':type'=>$vals['type']
        );
        $ps = $this->execute($q, $vars);
        return $this->getUpdateCount($ps);
    }
    
    public function updateTeacherSheetDetails($id, $vals) {
        $q = "UPDATE #prefix#teacher_sheets SET title = :title, class = :class, section = :section, ";
        $q .= "subject = :subject, date_of_submission = :date WHERE sheet_id = :id ;";
        $vars = array (
            ':id' => $id,
            ':title' => isset($vals['title'])?$vals['title']:NULL,
            ':class' => isset($vals['class'])?$vals['class']:NULL,
            ':section' => isset($vals['section'])?$vals['section']:NULL,
            ':subject' => isset($vals['subject'])?$vals['subject']:NULL,
            ':date' => isset($vals['date_of_submission'])?$vals['date_of_submission']:NULL,
        );
        $ps = $this->execute($q, $vars);
        $results = $this->getUpdateCount($ps);
        return $results;
    }
    
    public function saveTeacherSheet($id, $vals) {
        $q = "UPDATE #prefix#teacher_sheets SET link = :link, last_modified = NOW() WHERE sheet_id = :id;";
        $vars = array (
            ':link' => $vals['link'],
            ':id' => $id
        );
        $ps = $this->execute($q, $vars);
        $results = $this->getUpdateCount($ps);
        return $results;
    }
    
    public function publishTeacherSheet($id) {
        $q = "UPDATE #prefix#teacher_sheets SET published = :publish WHERE sheet_id = :id;";
        $vars = array (
            ':publish' => 1,
            ':id' => $id
        );
        $ps = $this->execute($q, $vars);
        $results = $this->getUpdateCount($ps);
        return $results;
    }
    
    public function unpublishTeacherSheet($id) {
        $q = "UPDATE #prefix#teacher_sheets SET published = :publish WHERE sheet_id = :id;";
        $vars = array (
            ':publish' => 0,
            ':id' => $id
        );
        $ps = $this->execute($q, $vars);
        $results = $this->getUpdateCount($ps);
        return $results;
    }
}