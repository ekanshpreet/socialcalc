<?php
/**
 *
 * Configuration singleton
 *
 * Singleton acess object for SocialCalc configuration values set in config.inc.php.
 * Never reference $SOCIALCALC_CFG directly; always do it through this object.
 *
 * Example of use:
 *
 * <code>
 * // get the Config singleton
 * $config = Config::getInstance();
 * // get a value from it
 * $config->getValue('log_location');
 * </code>
 *
 */
class Config {
    /**
     *
     * @var Config
     */
    private static $instance;
    
    /**
     *
     * @var array
     */
    var $config = array();
    
    /**
     * Constructor
     * @param array $vals Optional values to override file config
     * @return Config
     */
    public function __construct($vals = null) {
        if ($vals != null ) {
            $this->config = $vals;
        } else {
            Utils::defineConstants();
            if (file_exists(SOCIALCALC_WEBAPP_PATH . 'config.inc.php')) {
                require SOCIALCALC_WEBAPP_PATH . 'config.inc.php';
                $this->config = $SOCIALCALC_CFG;
            } else {
                throw new Exception('SocialCalc\'s configuration file does not exist!');
            }
        }
    }

    /**
     * Get the singleton instance of Config
     * @param array $vals Optional values to override file config
     * @return Config
     */
    public static function getInstance($vals = null) {
        if (!isset(self::$instance)) {
            self::$instance = new Config($vals);
        }
        return self::$instance;
    }

    /**
     * Get the configuration value
     * @param    string   $key   key of the configuration key/value pair
     * @return   mixed    value of the configuration key/value pair
     */
    public function getValue($key) {
        $value = isset($this->config[$key]) ? $this->config[$key] : null;
        return $value;
    }

    /**
     * Provided for functions which expect an array
    */
    public function getValuesArray() {
        return $this->config;
    }
    
    /**
     * Provided only for use when overriding config.inc.php values in tests
     * @param string $key
     * @param string $value
     * @return string $value
     */
    public function setValue($key, $value) {
        $value = $this->config[$key] = $value;
        return $value;
    }

    /**
     * Provided only for tests that want to kill Config object in tearDown()
     */
    public static function destroyInstance() {
        if (isset(self::$instance)) {
            self::$instance = null;
        }
    }
}
