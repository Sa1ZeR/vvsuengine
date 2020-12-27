<?php


class module {

    private $core, $db, $user;

    public function __construct($core) {
        $this->core = $core;
        $this->db = $core->db;
        $this->user = $core->user;
    }

    private function existLogin() {
        $login = $this->db->safesql($_POST['login']);
        $query = $this->db->query("SELECT login FROM vvsu_users WHERE login = '$login'");
        if(!$query || $this->db->num_rows() <=0) {
            echo "<span style=\"color: green; \">Логин свободен</span>";
        } else {
            echo "<span style=\"color: red; \">Логин занят</span>";
        }
        exit();
    }

    private function verify() {
        if($this->user->isAuth()) {
            return $this->core->js_alert("Ошибка!", "Вы уже авторизованы!", 1);;
        }
        $login = $this->db->safesql(@$_POST['login']);
        $email = $this->db->safesql(@$_POST['email']);
        $pass = @$_POST['password'];
        if(strlen($pass) < 6) {
            return $this->core->js_alert("Ошибка!", "Пароль слишком короткий!", 1);;
        }
        $gender = intval(@$_POST['gender']) == 1 ? 1 : 0;

        if(!preg_match("/^[A-Za-z0-9-_]{3,}$/", $login)) {
            return $this->core->js_alert("Ошибка!", "Логин указан неверно!", 1);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->core->js_alert("Ошибка!", "Поле email адреса введено неверно!", 1);;
        }

        if($pass !== @$_POST['passwordrepit']) {
            return $this->core->js_alert("Ошибка!", "Пароли не совпадают!", 1);
        }

        $pass = password_hash($pass, PASSWORD_BCRYPT);

        $ip = $_SERVER['REMOTE_ADDR'];

        $pass = $this->db->safesql($pass);

        $query = $this->db->query("SELECT * FROM vvsu_users WHERE login = '$login' or email = '$email'");

        if($this->db->num_rows($query) > 0) {
            return $this->core->js_alert("Ошибка!", "Логин или email уже существуют!", 1);
        }

        $time = time();
        $query = $this->db->query("INSERT INTO vvsu_users (login, email, password, ip_create, time_create, gender) VALUES ('$login', '$email', '$pass', '$ip', '$time', '$gender')");

        if(!$query) {
            return $this->core->js_alert("Ошибка!", "Произошла ошибка. Обратитесь к администрации!", 1);
        }
        return $this->core->js_alert("Успех!", "Успешная регистрация!", 2);
    }

    private function main() {
        return $this->core->dataConnect(VVSU_STYLE_PATH."modules/register.html");
    }

    public function content() {
        if($this->user->isAuth()) {
            header('Location: /');
        }
        $content = $this->main();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['existLogin'])) $this->existLogin();
            else if(isset($_POST['do_register'])) $this->verify();
        }

        return $content;
    }
}