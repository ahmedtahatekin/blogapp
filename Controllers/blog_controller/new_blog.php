<?php
require_once __DIR__ . '/../../includes/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $conn;

    $new_blog_title = $_POST['title'];
    $new_blog_content = $_POST['content'];

    Session::start();
    $user_id = Session::get('user_id');

    Blog::setConnection($conn);
    Blog::createNewBlog($user_id, $new_blog_title, $new_blog_content);
    echo alert("success", "Yeni Blog Başarıyla Oluşturuldu!");
}
