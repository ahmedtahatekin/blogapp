<?php
require_once __DIR__ . "/BaseModel.php";
require_once __DIR__ . "/../includes/bootstrap.php";
class Blog extends BaseModel {
    //private variables
    private int $id;
    private $created_at;
    private int $user_id;

    public $title;
    public $content;

    function __construct(int $user_id, string $title, string $content) {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->content = $content;
    }

    public static function createNewBlog(int $user_id, string $title, string $content): void {
        //veritabanına parametrelerle blogu kaydet
        $stmt = self::$conn->prepare("INSERT INTO blogs (user_id, title, content) VALUES (?, ?, ?)");
        $stmt->execute([
            $user_id,
            $title,
            $content
        ]);

        $stmt = self::$conn->prepare("SELECT title FROM blogs WHERE title = ?");
        $stmt->execute([$title]);
    }

    public static function findBlogById(int $id): ?Blog {
        //veritabanından blogu çek
        $stmt = self::$conn->prepare("SELECT * FROM blogs WHERE id = :id");
        $stmt->execute([
            "id" => $id
        ]);

        //blog datasını al
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        //data boşsa null döndür
        if (!$data) {
            return null;
        }

        //yeni blog nesnesi oluştur
        $blog = new Blog(
            $data['user_id'],
            $data['title'],
            $data['content']
        );

        $blog->created_at = $data['created_at'];

        //oluşturulan blog nesnesini döndür
        return $blog;
    }

    public function editSelectedBlog(int $id, string $title = "", string $content = ""): void {
        //başlık veya içerik girilmediyse bunları güncelleme
        if ($title === "") {
            //veri tabanındaki blog ögesini bul
            $stmt = self::$conn->prepare("UPDATE blogs SET content = $content WHERE id = $id");
        } elseif ($content === "") {
            //veri tabanındaki blog ögesini bul
            $stmt = self::$conn->prepare("UPDATE blogs SET title = $title WHERE id = $id");
        } elseif (!$title === "" && !$content === "") {
            //veri tabanındaki blog ögesini bul
            $stmt = self::$conn->prepare("UPDATE blogs SET title = $title, content = $content WHERE id = $id");
        }
        $stmt->execute();
    }

    public static function deleteSelectedBlog(int $id): void {
        //veri tabanından seçilen blog ögesini sil
        $stmt = self::$conn->prepare("DELETE FROM blogs WHERE id = $id");
        // to be contiuned...
    }

    public static function getAllBlogs(int $limit = 0, string $user_id = ""): array {

        $sql = "SELECT * FROM blogs";
        $params = [];

        if ($user_id !== "") {
            $sql .= " WHERE user_id = ?";
            $params[] = $user_id;
        }

        $sql .= " ORDER BY created_at DESC";

        if ($limit > 0) {
            $sql .= " LIMIT ?";
            $params[] = $limit;
        }

        $stmt = self::$conn->prepare($sql);

        foreach ($params as $index => $value) {
            $paramIndex = $index + 1;

            $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue($paramIndex, $value, $type);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserId(): int {
        return $this->user_id;
    }

    public function getCreatedAt(): ?string {
        return $this->created_at;
    }
}
