<?php
/**
 *
 * SocialCalc Controller
 *
 * The parent class of all SocialCalc webapp controllers.
 *
 */

abstract class SocialCalcController {
    
    /**
     * @var Smarty Object
     */
    protected $smarty;
    
    /**
     * @var template path
     */
    protected $tmpl_path;
    
    /**
     * @var view template
     */
    protected $view_template;
    
    /**
     *
     * @var array
     */
    protected $header_scripts = array ();
    
    /**
     * Constructor to initialize the Main Controller
     */
    public function __construct() {
        $this->smarty = new SmartySocialCalc();
    }
    
    /**
     * Define global variables for Smarty Templates
     * TODO add to list of Global Variables
     */
    protected function defineSmartyGlobalVariables() {
        $config = Config::getInstance();
        self::addToView('site_root_path', $config->getValue('source_root_path').'webapp/');
        self::addToView('app_title', $config->getValue('app_title'));
    }
    
    /**
     * Add javascript to header
     *
     * @param str javascript path
     */
    public function addHeaderJavaScript($script) {
        array_push($this->header_scripts, $script);
    }
    
    /**
     * Function to set view template
     * @param $tmpl str Template name
     */
    public function setViewTemplate($tmpl) {
        $this->view_template = SOCIALCALC_WEBAPP_PATH.'_lib/view/'.$tmpl;
        self::defineSmartyGlobalVariables();
    }
    
    /**
     * Set Page Title
     * @param $title str Page Title
     */
    public function addPageTitle($title) {
        self::addToView('controller_title', $title);
    }
    
    /**
     * Function to add data to Smarty Template
     * @param $key str Variable name in Smarty
     * @param $value str Variable value in Smarty
     */
    public function addToView($key,$value) {
        $this->smarty->assign($key, $value);
    }
    
    /**
     * Generate View In Smarty
     */
    public function generateView() {
        // add header javascript if defined
        $this->addToView('header_scripts', $this->header_scripts);
        $view_path = $this->view_template;
        return $this->smarty->display($view_path);
    }
    
    /**
     * Disable Caching
     */
    protected function disableCaching() {
        $this->smarty->disableCaching();
    }
}