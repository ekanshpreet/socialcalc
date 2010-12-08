<?php
/**
 *
 * socialcalc/webapp/_lib/model/class.SmartySocialCalc.php
 *
 * Socialcalc's Smarty object
 *
 * Configures and initalizes Smarty per Socialcalc's configuration.
 *
 */
class SmartySocialCalc extends Smarty {

    /**
     * @var boolean
     */
    private $debug = false;

    /**
     * @var array
     */
    private $template_data = array();
    /**
     * Constructor
     *
     * Sets default values all view templates have access to:
     *
     *  <code>
     *  //path of the Socialcalc installation site root as defined in config.inc.php
     *  {$site_root_path}
     *  //file the Socialcalc logo links to, 'index.php' by default
     *  {$logo_link}
     *  //application name
     *  {$app_title}
     *  </code>
     *  @param array $config_array Defaults to null; Override source_root_path, site_root_path, app_title, cache_pages,
     *  debug
     *
     */
    public function __construct($config_array=null) {
        if ($config_array==null) {
            $config = Config::getInstance();
            $config_array = $config->getValuesArray();
        }

        $src_root_path = $config_array['source_root_path'];
        $site_root_path = $config_array['site_root_path'];
        $app_title = $config_array['app_title'];
        $cache_pages = $config_array['cache_pages'];
        $debug =  $config_array['debug'];
        Utils::defineConstants();

        Smarty::__construct();
        $this->template_dir = array( SOCIALCALC_WEBAPP_PATH.'_lib/view', $src_root_path.'tests/view');
        $this->compile_dir = SOCIALCALC_WEBAPP_PATH.'_lib/view/compiled_view/';
        $this->cache_dir = SOCIALCALC_WEBAPP_PATH.'_lib/view/compiled_view/cache';
        $this->caching = ($cache_pages)?1:0;
        $this->cache_lifetime = 300;
        $this->debug = $debug;

        $this->assign('app_title', $app_title);
        $this->assign('site_root_path', $site_root_path);
        $this->assign('logo_link', 'index.php');
    }

    /**
     * Assigns data to a template variable.
     * If debug is true, stores it for access by tests or developer.
     * @param string $key
     * @param mixed $value
     */
    public function assign($key, $value = null) {
        parent::assign($key, $value);
        if ($this->debug) {
            $this->template_data[$key] = $value;
        }
    }

    /**
     * For use only by tests: return a template data value by key.
     * @param string $key
     */
    public function getTemplateDataItem($key) {
        return isset($this->template_data[$key]) ? $this->template_data[$key]:null;
    }

    /**
     * Check if caching is enabled
     * @return bool
     */
    public function isViewCached() {
        return ($this->caching==1)?true:false;
    }

    /**
     * Turn off caching
     */
    public function disableCaching() {
        $this->caching=0;
    }

    /**
     * Override the parent's clear_all_cache method to check if caching is on to begin with. We do this to prevent the
     * cache/MAKETHISDIRWRITABLE.txt from being deleted during test runs; this file needs to exist in order for the
     * cache directory to remain in the git repository.
     * @param int $expire_time
     */
    public function clear_all_cache($exp_time = null) {
        if ($this->caching == 1) {
            parent::clear_all_cache($exp_time);
        }
    }
}
