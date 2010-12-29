<?php
/**
 *
 * SocialCalc/webapp/_lib/model/class.Session.php
 *
 * Session
 *
 * The object that manages logged-in SocialCalc users' sessions via the web.
 *
 */
class Session {
    /**
     * @return bool Is user logged into SocialCalc
     */
    public static function isLoggedIn() {
        $config = Config::getInstance();
        if (!isset($_SESSION[$config->getValue('source_root_path')]['user'])) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @return bool Is user logged into SocialCalc an admin
     */
    public static function isAdmin() {
        $config = Config::getInstance();
        if (isset($_SESSION[$config->getValue('source_root_path')]['user_is_admin'])) {
            return $_SESSION[$config->getValue('source_root_path')]['user_is_admin'];
        } else {
            return false;
        }
    }

    /**
     * @return str Currently logged-in SocialCalc username (email address)
     */
    public static function getLoggedInUser() {
        $config = Config::getInstance();
        if (self::isLoggedIn()) {
            return $_SESSION[$config->getValue('source_root_path')]['user'];
        } else {
            return null;
        }
    }

    /**
     *
     * @param str $pwd Password
     * @return str MD5-hashed password
     */
    public function md5pwd($pwd) {
        return md5($pwd);
    }

    /**
     *
     * @param str $pwd Password
     * @return str SHA1-hashed password
     */
    private function sha1pwd($pwd) {
        return sha1($pwd);
    }

    /**
     * Check password
     * @param str $pwd Password
     * @param str $result Result
     * @return bool Whether or submitted password matches check
     */
    public function pwdCheck($pwd, $result) {
        if ($this->sha1pwd($pwd) == $result || $this->md5pwd($pwd) == $result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Complete login action
     * @param Owner $owner
     */
    public static function completeLogin($owner) {
        $config = Config::getInstance();
        $_SESSION['username'] = $owner['user_name'];
        $_SESSION[$config->getValue('source_root_path')]['user'] = $owner['user_name'];
        $_SESSION[$config->getValue('source_root_path')]['user_is_admin'] = $owner['is_admin'];
    }

    /**
     * Log out
     */
    public static function logout() {
        $config = Config::getInstance();
        unset($_SESSION[$config->getValue('source_root_path')]['user']);
        unset($_SESSION[$config->getValue('source_root_path')]['user_is_admin']);
        unset($_SESSION[$config->getValue('source_root_path')]);
        session_destroy();
    }
}
