<?php


class module
{
    private $core, $db, $user;

    public function __construct($core)
    {
        $this->core = $core;
        $this->user = $core->user;
        $this->db = $core->db;
    }

    public function content()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $this->db->safesql(@$_POST['title']);
            $shortText = $this->db->safesql(@$_POST['short-text']);
            $fullText = $this->db->safesql(@$_POST['full-text']);
            $time = date("Y-m-d");
            if (empty($shortText) || empty($fullText) || empty($title)) {
                return $this->core->notify('Ошибка', 'Заполните все поля', 1, '/?page=create_post');
            }

            $query = $this->db->query("INSERT INTO vvsu_posts (title, short_text, text, uid, `date`) VALUES ('$title', '$shortText', '$fullText', '{$this->user->id}', '$time')");
            $query1 = $this->db->query("UPDATE vvsu_users SET posts = posts + 1 WHERE id = '{$this->user->id}'");
            if (!$query || !$query1) {
                return $this->core->notify('Ошибка', 'Ошибка. Обратитесь к администрации', 1, '/?page=create_post');
            }

            return $this->core->notify('Успешно', 'Пост опубликован', 2);
        }
        return $this->core->dataConnect(VVSU_STYLE_PATH . "modules/create_post.html");
    }
}