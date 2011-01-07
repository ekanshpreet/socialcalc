<?php
/**
 *
 * Spreadsheet Controller
 *
 * The class for generating SocialCalc spreadsheets.
 * TODO Add more functionality
 */

class SpreadsheetController extends SocialCalcController {
    
    public function go() {
        $this->disableCaching();
        $this->addPageTitle('Spreadsheets');
        $this->setViewTemplate('_spreadsheet.tpl');
        $this->generateView();
    }
}