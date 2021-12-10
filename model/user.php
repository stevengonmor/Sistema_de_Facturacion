<?php

include_once "model/Connection.php";

/**
 * Manage the user information
 */
class User {

    private $id;
    public $name;
    public $about_me;
    public $email;
    private $password;
    public $profile_picture;
    public $rol;
    public $date;

    /**
     * Initial Values
     * @param int $id
     * @param String $name
     * @param String $about_me
     * @param String $email
     * @param String $password
     * @param String $profile_picture
     * @param int $rol
     * @param int $date
     */
    public function __construct($id = 0, $name = "", $about_me = "", $email = "", $password = "", $profile_picture = "", $rol = 0, $date = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->about_me = $about_me;
        $this->email = $email;
        $this->password = $password;
        $this->profile_picture = $profile_picture;
        $this->rol = $rol;
        $this->date = $date;
    }

    /**
     * Return the user's id
     * @return int
     */
    function get_id() {
        return $this->id;
    }

    /**
     * Return the user's password
     * @return String
     */
    function get_password() {
        return $this->password;
    }

    /**
     * Return the user's rol
     * @return String
     */
    function get_rol() {
        return $this->rol;
    }

    /**
     * Insert into the database information for the "user" table
     * @return bololean
     */
    function insert() {
        $query = "INSERT INTO user (name, about_me, email, password, profile_picture, rol, date)"
                . " VALUES ('$this->name','Sin Descripción...', '$this->email', '$this->password', '{$this->profile_picture}', 0, NOW())";
        $pdo = new Connection();
        $result = $pdo->open()->prepare($query);
        return $result->execute();
    }

    /**
     * Get a single user from the database's table "user" based on the id
     * @param int $id
     * @return user (object)
     */
    function select($by_id = 0) {
        $query = "SELECT * FROM user";
        if ($by_id) {
            $query .= " WHERE id = '$by_id'";
        } else {
            $query .= " WHERE email = '$this->email'";
        }
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        $row = $results->fetch();
        $user = new User($row['id'], $row['name'], $row['about_me'], $row['email'],
                $row['password'], $row['profile_picture'], $row['rol'], $row['date']);
        return $user;
    }

    function selectAll() {
        $query = "SELECT * FROM user";
        $pdo = new Connection();
        $results = $pdo->open()->query($query); 
            $rows = [];
            foreach ($results->fetchAll() as $row) {
                $rows[] = new User($row['id'], $row['name'], $row['about_me'], $row['email'],
                $row['password'], $row['profile_picture'], $row['rol'], $row['date']);
            }
            return $rows;
    }

    /**
     * Delete a user from the database in the "user" table, based on the user's id
     * @param int $id
     * @return boolean
     */
    function delete($id = 0) {
        $query = "DELETE FROM user WHERE id='{$id}'";
        $pdo = new Connection();
        $result = $pdo->open()->prepare($query);
        return $result->execute();
    }

    /**
     * Updates the information from an user in the "user" table based on the user's id
     * @param String $name
     * @param String $about_me
     * @param String $email
     * @param String $password
     * @param String $profile_picture
     * @return boolean
     */
    function update($name = "", $about_me = "", $email = "", $password = "", $profile_picture = "") {
        $query = "UPDATE user SET name='$name', about_me='$about_me', email='$email'";
        if ($profile_picture != "old") {
            $query .= ", profile_picture='$profile_picture'";
        }
        if ($password != "old") {
            $encrypted_password = md5($password);
            $query .= ", password='$encrypted_password'";
        }
        $query .= " WHERE id='$this->id'";
        $pdo = new Connection();
        $results = $pdo->open()->prepare($query);
        return $results->execute();
    }

    /**
     * Confirms if an e-mail exists in the "user" table from the database 
     * @param  String $email
     * @return boolean
     */
    function email_exists($email = "") {
        $query = "SELECT email FROM user WHERE email = '$email'";
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        return ($row = $results->fetch());
    }

    /**
     * Confirms if an id exists in the "user" table from the database 
     * @param  int $id
     * @return boolean
     */
    function id_exists($id = 0) {
        $query = "SELECT id FROM user WHERE id = '$id'";
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        return ($row = $results->fetch());
    }

    function count_cashiers($rol = 0) {
        $query = "SELECT COUNT(IF(rol = 0, 1, NULL)) as contador FROM user";
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        return ($row = $results->fetchColumn());
    }

    /**
     * Confirms if the password that the user inserted in the login page matches the password stored in the database based on the e-mail  
     * @param String $email
     * @param String $password
     * @return boolean
     */
    function correct_password($email = "", $password = "") {
        $query = "SELECT * FROM user WHERE email = '$email'";
        $pdo = new Connection();
        $results = $pdo->open()->query($query);
        if ($row = $results->fetch()) {
            if ($row['password'] == $password) {
                return true;
            }
        } else {
            return false;
        }
    }

}
