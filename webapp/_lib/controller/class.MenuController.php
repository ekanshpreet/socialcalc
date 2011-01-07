<?php
/**
 *
 * Menu Controller
 *
 * Create SocialCalc Main Menu
 *
 */
class MenuController extends SocialCalcController {
    
    public function go() {
        $menu = self::createMainMenu();
        self::generateMenu($menu);
    }
    
    /**
     * Create Main Menu
     */
    protected function createMainMenu() {

        $link_syllabus = array (
            'title'=>'Syllabus',
            'url'=>'common/syllabus.php'
        );
        $link_learning_mandate = array (
            'title'=>'Learning Mandate',
            'url'=>'common/learningmandate.php'
        );
        $link_attendance = array (
            'title'=>'Attendance',
            'url'=>'common/attendance.php'
        );
        $link_datesheet = array (
            'title'=>'Datesheet',
            'url'=>'common/datesheet.php'
        );
        $link_marks = array (
            'title'=>'Marks',
            'url'=>'common/marks.php'
        );
        $link_login = array (
            'title'=>'Login',
            'url'=>'session/login.php'
        );

        $menu = array(
            $link_syllabus,
            $link_learning_mandate,
            $link_attendance,
            $link_datesheet,
            $link_marks,
            $link_login
        );
        return $menu;
    }
    
    /**
     * Generate Menu
     */
    protected function generateMenu($menu) {
        $this->addToView('main_menu',$menu);        
    }
}