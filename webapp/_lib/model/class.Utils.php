<?php
/**
 * Utils
 *
 * Generic, reusable, common utility methods
 *
 */
class Utils {

    /**
     * Get percentage
     * @param int $numerator
     * @param int $denominator
     * @return int Percentage
     */
    public static function getPercentage($numerator, $denominator) {
        if ((isset($numerator)) && (isset($denominator))) {
            if ($numerator > 0 && $denominator > 0) {
                return ($numerator * 100) / ($denominator);
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /**
     * Get URL with params
     * Build URL with params given an array
     * @param str $url
     * @param array $params
     * @return str URL
     */
    public static function getURLWithParams($url, $params){
        $param_str = '';
        foreach ($params as $key=>$value) {
            $param_str .= $key .'=' . $value.'&';
        }
        if ($param_str != '') {
            $url .= '?'.substr($param_str, 0, (strlen($param_str)-1));
        }
        return $url;
    }

    /**
     * Validate email
     *
     * @param string $email Email address to validate
     * @return bool Whether or not it's a valid address
     */
    public function validateEmail($email = '') {
        $hostname = '(?:[a-z0-9][-a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,4}|museum|travel)';
        $pattern = '/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@' . $hostname . '$/i';
        return preg_match($pattern, $email);
    }

    /**
     * Validate URL
     * @param str $url
     * @return bool Whether or not it's a "valid" URL
     */
    public function validateURL($url) {
        //@TODO update regex to detect http:/// triple slashes, which trigger parse_url errors
        if (strpos($url, ":///") > 0) {
            return false;
        }
        if ( preg_match("#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#i", $url) == 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Define Constants function. These constants are used to locate files on the server
     */
    public static function defineConstants() {
        if ( !defined('SOCIALCALC_ROOT_PATH') ) {
            define('SOCIALCALC_ROOT_PATH', str_replace("\\",'/', dirname(dirname(__FILE__))) .'/');
        }

        if ( !defined('SOCIALCALC_WEBAPP_PATH') ) {
            define('SOCIALCALC_WEBAPP_PATH', SOCIALCALC_ROOT_PATH . 'webapp/');
        }
    }
}