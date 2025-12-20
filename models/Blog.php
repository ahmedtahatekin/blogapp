<?php
class Blog {
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
        $stmt = $conn->prepare("INSERT INTO blogs (user_id, title, content) VALUES (?, ?, ?)");
        $stmt->execute([
            $user_id,
            $title,
            $content
        ]);

        $stmt = $conn->prepare("SELECT title FROM blogs WHERE title = $title");
        $stmt->execute();

        echo "Yeni Blog Başarıyla oluşturuldu!: $stmt";
    }

    public static function findBlogById(int $id): ?Blog {
        //veritabanından blogu çek
        $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = :id");
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

        //oluşturulan blog nesnesini döndür
        return $blog;
    }

    public function editSelectedBlog(int $id, string $title = "", string $content = ""): void {
        //başlık veya içerik girilmediyse bunları güncelleme
        if ($title === "") {
            //veri tabanındaki blog ögesini bul
            $stmt = $conn->prepare("UPDATE blogs SET content = $content WHERE id = $id");
        } elseif ($content === "") {
            //veri tabanındaki blog ögesini bul
            $stmt = $conn->prepare("UPDATE blogs SET title = $title WHERE id = $id");
        } elseif (!$title === "" && !$content === "") {
            //veri tabanındaki blog ögesini bul
            $stmt = $conn->prepare("UPDATE blogs SET title = $title, content = $content WHERE id = $id");
        }
        $stmt->execute();
    }

    function deleteSelectedBlog(int $id): void {
    }
}
