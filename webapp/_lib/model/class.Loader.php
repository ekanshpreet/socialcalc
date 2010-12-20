<?php
/**
 *
 * Project-wide Loader
 *
 * Implements lazy loading of SocialCalc classes by registering _autoload method in this class.
 *
 */
class Loader {

    /**
     * Lookup path for classes and interfaces.
     *
     * @var array
     */
    private static $lookup_path;

    /**
     * Some classes have a special filename that doesn't follow the convention.
     * The value will be assigned inside setLookupPath method.
     */
    private static $special_classes;

    /**
     * Register current script to use lazy loading.
     * @param array $additional_paths Array of strings; additional lookup path for classes
     * @return bool true
     */
    public static function register($paths = null) {
        self::setLookupPath($paths);
        return spl_autoload_register(array(__CLASS__, 'load' ));
    }

    /**
     * Unregister the loader script.
     */
    public static function unregister() {
        self::$lookup_path = null;
        self::$special_classes = null;
        return spl_autoload_unregister( array(__CLASS__, 'load') );
    }

    /**
     * Set lookup paths
     * @param array $additional_paths Array of strings, additional lookup path for classes
     */
    private static function setLookupPath($additional_paths = null ) {
        // check two required named constants
        if ( !defined('SOCIALCALC_ROOT_PATH') ) {
            define('SOCIALCALC_ROOT_PATH', str_replace("\\",'/', dirname(dirname(dirname(dirname(__FILE__))))) .'/');
        }

        if ( !defined('SOCIALCALC_WEBAPP_PATH') ) {
            define('SOCIALCALC_WEBAPP_PATH', str_replace("\\",'/', dirname(dirname(dirname(__FILE__)))) .'/');
        }

        // set default lookup path for classes
        self::$lookup_path = array(
        SOCIALCALC_WEBAPP_PATH . '_lib/model/',
        SOCIALCALC_WEBAPP_PATH . '_lib/controller/',
        SOCIALCALC_WEBAPP_PATH . '_lib/model/exceptions/'
        );

        // set default lookup path for special classes
        self::$special_classes = array(
        'Smarty' => SOCIALCALC_WEBAPP_PATH . '_lib/extlib/Smarty-3.0.5/libs/Smarty.class.php'
        );

        if ( isset($additional_paths) && is_array($additional_paths)  ) {
            foreach ($additional_paths as $path) {
                self::$lookup_path[] = $path;
            }
        }
    }

    /**
     * Add another lookup path
     * @param str $path
     */
    public static function addPath($path) {
        if (!isset(self::$lookup_path)) {
            self::register();
        }
        self::$lookup_path[] = $path;
    }

    /**
     * Get lookup path
     * @return array of lookup paths
     */
    public function getLookupPath() {
        return self::$lookup_path;
    }

    /**
     * Get special classes files
     * @return array of special classes path files
     * @access public
     */
    public function getSpecialClasses() {
        return self::$special_classes;
    }

    /**
     * The method registered to run on _autoload. When a class gets instantiated this method will be called to look up
     * the class file if the class is not present. The second instantiation of the same class wouldn't call this method.
     *
     * @param str $class Class name
     * @return bool true
     */
    public static function load($class) {
        // if class already in scope
        if ( class_exists($class, false) ) {
            return;
        }

        // if $class is a standard SocialCalc object or interface
        foreach ( self::$lookup_path as $path ) {
            $file_name = $path . 'class.' . $class . '.php';
            if ( file_exists( $file_name )) {
                require_once $file_name;
                return;
            }
            $file_name = $path . 'interface.' . $class . '.php';
            if ( file_exists( $file_name )) {
                require_once $file_name;
                return;
            }
            $file_name = $path . $class . '.php';
            if ( file_exists( $file_name )) {
                require_once $file_name;
                return;
            }
        }

        // if $class is special class filename
        if ( array_key_exists($class, self::$special_classes) ) {
            require_once self::$special_classes[$class];
            return;
        }
    }
}
