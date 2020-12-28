<?php


class module
{
    private $core, $db, $user;

    public function __construct($core) {
        $this->core = $core;
        $this->db = $core->db;
        $this->user= $core->user;
    }

    public function content()
    {
        if($this->user->isAuth()) {
            header("Location: /");
        }
        $login = $this->db->safesql($_POST['login']);
        $pass = $_POST['password'];
        $pass = md5($pass);
        $query = $this->db->query("SELECT * FROM vvsu_users WHERE login = '$login' and password = '$pass'");
        if(!$query || $this->db->num_rows($query) <= 0) {
            return $this->core->notify('Ошибка', 'Пользователь не найден', 1);
        }
        $this->user->auth($this->db->fetch_assoc($query));
        return $this->core->notify('Успешно', 'Вы авторизовались', 2);
    }

}