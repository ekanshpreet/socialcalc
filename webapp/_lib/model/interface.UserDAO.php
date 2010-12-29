<?php
/**
 *
 * SocialCalc/webapp/_lib/model/interface.UserDAO.php
 *
 * Event Data Access Object Interface
 */

interface UserDAO {
    /**
     * Check if a user is in the database given a username
     * @param int $username
     * @return bool True if yes, false if not
     */
    public function isUserInDB($username);

    /**
     * Update existing user
     * @param User $user
     * @return int Total number of affected rows
     */
    public function updateUser($user);

    /**
     * Create new user
     * @param str $username
     * @param str $email
     * @param str $pass
     * @param str $full_name
     * @param str $is_admin
     * @return int Total number of affected rows
     */
    public function CreateUser($username, $email, $pass, $full_name, $is_admin = 0);
    
    /**
     * Get user given an username
     * @param str $username
     * @return Array user
     */
    public function getDetails($username);
    
    /**
     * Get user given an username
     * @param str $username
     * @return str username
     */
    public function getEmail($username);

    /**
     * Update an array of users
     * @param array $users_to_update Array of User objects
     * @return int Total users affected
     */
    public function updateUsers($users_to_update);

    /**
     * Check if a user is in the database given a username
     * @param int $username
     * @return bool True if yes, false if not
     */
    public function doesUserExist($username);
    
    /**
     * Updates Last login
     * @param str $username
     * @return int Total Number of rows affected
     */
    public function updateLastLogin($username);
    
    /**
     * Updates Password Token for given user
     * @param str $username
     * @param int $token
     * @return int Total Number of rows affected
     */
    public function updatePasswordToken($username, $token);
    
    /**
     * Gets user given a token
     * @param str $token
     * @return array User Details
     */
    public function getByPasswordToken($token);
    
    /**
     * Updates password for a given username
     * @param str $username
     * @param str $pwd
     * @return No. of affected rows
     */
    public function updatePassword($username, $pwd);
    
    /**
     * Updates last seen time of the user
     * @param str $username
     * @return int No. of rows affected
     */
    public function updateLastSeen($username);
    
    /**
     * Returns a list of logged in users except the user himself
     * @param str $username
     * @return array Usernames
     */
    public function getListOfLoggedInUsers($username);
}