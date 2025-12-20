<?php
//veri tabanı kullanacak modeller dahil eder
//db.php dosyasındaki pdo nesnesin referans gösteren yeni bir nesne oluşturmak için çağırılır
class BaseModel {
    protected static PDO $conn;

    public static function setConnection(PDO $conn): void {
        self::$conn = $conn;
    }
}