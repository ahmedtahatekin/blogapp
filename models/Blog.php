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

    function save() {}

    function getBlog(int $id) {}

    function edit(int $id) {}

    function delete(int $id) {}

}