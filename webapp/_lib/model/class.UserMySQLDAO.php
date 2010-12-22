<?php
/**
 *
 * SocialCalc/webapp/_lib/model/class.UserMySQLDAO.php
 *
 * User Data Access Object MySQL Implementation
 *
 */
class UserMySQLDAO extends PDODAO implements UserDAO {

    public function isUserInDB($username) {
        $q = "SELECT id FROM #prefix#users WHERE user_name = :username";
        $vars = array(
            ':username'=>$username
        );
        $ps = $this->execute($q, $vars);
        return $this->getDataIsReturned($ps);
    }

    public function updateUsers($users_to_update) {
        $count = 0;
        $status_message = "";
        if (sizeof($users_to_update) > 0) {
            $status_message .= count($users_to_update)." users queued for insert or update; ";
            foreach ($users_to_update as $user) {
                $count += $this->updateUser($user);
            }
            $status_message .= "$count users affected.";
        }
        $status_message = "";
        return $count;
    }

    public function updateUser($user) {
        $vars = array(
            ':username'=>$user->username,
            ':full_name'=>$user->full_name,
            ':email'=>$user->email,
            ':avatar'=>$user->avatar,
            ':joined'=>$user->joined,
            ':type'=>$user->type,            
        );

        $q = "UPDATE #prefix#users SET full_name = :full_name, email = :email, avatar = :avatar, ";
        $q .= "joined = :joined, type = :type WHERE user_name = :username";
        $ps = $this->execute($q, $vars);
        $results = $this->getUpdateCount($ps);
        return $results;
    }

    public function createUser($username, $email, $pass, $full_name, $is_admin = 0) {
        if (!$this->doesUserExist($username)) {
            $q = "INSERT INTO #prefix#users SET user_name=:username, email=:email, password=:pass, joined=NOW(),";
            $q .= "full_name=:full_name";
            if ($is_admin) {
                $q .= ", is_admin=1";
            }
            $vars = array(
                ':email'=>$email,
                ':pass'=>$pass,
                ':username'=>$username,
                ':full_name'=>$full_name
            );
            $ps = $this->execute($q, $vars);
            return $this->getUpdateCount($ps);
        } else {
            return 0;
        }
    }
        
    public function getDetails($username) {
        $q = "SELECT * FROM #prefix#users u WHERE u.user_name = :username ";
        $vars = array(
            ':username'=>$username
        );
        $ps = $this->execute($q, $vars);
        return $this->getDataRowAsArray($ps);
    }
    
    public function getEmail($username) {
        $q = "SELECT email FROM #prefix#users u WHERE u.user_name = :username ";
        $vars = array(
            ':username'=>$username
        );
        $ps = $this->execute($q, $vars);
        return $this->getDataRowAsArray($ps);
    }
    
    public function doesUserExist($username) {
        $exists = self::isUserInDB($username);
        return $exists;
    }
    
    public function updateLastLogin($username) {
        $q = " UPDATE #prefix#users SET last_login=now() WHERE user_name=:username";
        $vars = array(
            ':username'=>$username
        );
        $ps = $this->execute($q, $vars);
        return $this->getUpdateCount($ps);
    }

    public function updatePasswordToken($username, $token) {
        $q = "UPDATE #prefix#users SET password_token=:token WHERE user_name=:username";
        $vars = array(
            ":token" => $token, 
            ":username" => $username
        );
        $ps = $this->execute($q, $vars);
        return $this->getUpdateCount($ps);
    }

    public function getByPasswordToken($token) {
        $q = "SELECT * FROM #prefix#users WHERE password_token LIKE :token";
        $vars = array(':token' => $token);
        $ps = $this->execute($q, $vars);
        return $this->getDataRowAsArray($ps);
    }
    
    public function updatePassword($username, $pwd) {
        $q = " UPDATE #prefix#users SET password=:pwd WHERE user_name=:username";
        $vars = array(
            ':username'=>$username,
            ':pwd'=>$pwd
        );
        $ps = $this->execute($q, $vars);
        return $this->getUpdateCount($ps);
    }
}
