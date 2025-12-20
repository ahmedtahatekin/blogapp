<?php
require_once __DIR__ . "/BaseModel.php";
class User extends BaseModel {
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
    public function __construct(string $fullname, string $username, string $email) {
        $this->fullname = $fullname;
        $this->username = $username;
        $this->email = $email;
    }

    public function setPassword(string $password): void {
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    public function save() {

        // verileri veritabanına kaydet
        $stmt = self::$conn->prepare("INSERT INTO users (fullname, username, password_hash, email) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $this->fullname,
            $this->username,
            $this->passwordHash,
            $this->email,
        ]);

        //id ve oluşturulma zamanını veritabanından çek
        $this->id = self::$conn->lastInsertId();
        
        $stmt = self::$conn->prepare("SELECT created_at FROM users WHERE id = ?");
        $stmt->execute([$this->id]);

        $this->createdAt = $stmt->fetchColumn();
    }

    public function getHashedPassword(): string {
        return $this->passwordHash;
    }

    public function getId(): int {
        return $this->id;
    }

    public static function findByEmail(string $email): ?User {
        // require_once '../blogapp/includes/db.php';

        $stmt = self::$conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute([
            'email' => $email
        ]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        //kullanıcı yoksa null döndür
        if (!$data) {
            return null;
        }

        //kullanıcı varsa yeni user objesi oluştur
        $user = new User(
            $data['fullname'],
            $data['username'],
            $data['email'],
        );

        $user->id = $data['id'];
        $user->passwordHash = $data['password_hash'];

        //yeni user objesini döndür
        return $user;
    }
}
