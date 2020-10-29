<?php


class module {

    private $core, $db;

    public function __construct($core) {
        $this->core = $core;
        $this->db = $core->db;
    }

    private function verify() {
        //todo check user auth
        $login = $this->db->safesql(@$_POST['login']);
        $email = $this->db->safesql(@$_POST['email']);
        $pass = @$_POST['password'];
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $gender = intval(@$_POST['gender']) == 1 ? 1 : 0;
        //todo user notify
        if(!preg_match("/^[A-Za-z0-9-_]{3,}$/", $login)) {
            return;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return;
        }

        if($pass !== @$_POST['passwordrepit']) {
            return;
        }

        $pass = password_hash($pass, PASSWORD_BCRYPT);

        $pass = $this->db->safesql($pass);

        $query = $this->db->query("SELECT * FROM vvsu_users WHERE login = '$login' or email = '$email'");
        if($this->db->num_rows($query) > 0) {
            return;
        }

        //todo
    }

    private function main() {
        return $this->core->dataConnect(VVSU_STYLE_PATH."modules/register.html");
    }

    public function content() {
        $type = isset($_GET['op']) ? $_GET['op'] : "false";

        $content = $this->main();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $content = $this->verify();
        }

        return $content;
    }
}