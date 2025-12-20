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
    public function __construct($fullname, $username, $email, $password, $bio = null) {
        $this->fullname = $fullname;
        $this->username = $username;
        $this->setPassword($password);
        $this->email = $email;
        $this->bio = $bio;
    }

    //modelin db kullanması için gerekli
    //model dosyasından önce  db dahil edilir
    //modelde dahil edildikten sonra ilk olarak bu fonksiyon çağırılır
    public static function setConnection(PDO $conn): void {
        self::$conn = $conn;
    }

    private function setPassword($password) {
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    public function save() {

        // verileri veritabanına kaydet
        $stmt = $conn->prepare("INSERT INTO users (fullname, username, password_hash, email, bio) VALUES (?, ?, ?, ?, ?)");
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

    public static function findByEmail(string $email): ?User {
        // require_once '../blogapp/includes/db.php';

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
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
            null,
            $data['bio']
        );

        $user->id = $data['id'];
        $user->passwordHash = $data['password_hash'];

        //yeni user objesini döndür
        return $user;
    }
}
