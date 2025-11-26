<?php
class User {
    //private variables
    private $id;
    private $passwordHash;
    private $createdAt;
    
    //public variables
    public $fullname;
    public $username;
    public $email;
    public $register_date;
    public $bio;

    //? Registiration

    // constructor function
    public function __construct($fullname, $username, $email, $password, $bio = null) {
        $this->fullname = $fullname;
        $this->username = $username;
        $this->setPassword($password);
        $this->email = $email;
        $this->bio = $bio;
    }

    private function setPassword($password) {
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    public function save() {
        require_once '../blogapp/includes/db.php';

        // verileri veritabanına kaydet
        $stmt = $conn->prepare("INSERT INTO db_blogapp (fullname, username, password_hash, email, bio,) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $this->fullname,
            $this->username,
            $this->passwordHash,
            $this->email,
            $this->bio
        ]);

        //id ve oluşturulma zamanını veritabanından çek
        $this->id = $conn->lastInsertId();
    }

    //? Log in
    //in the future
    
    //? Log out
    //in the future

}