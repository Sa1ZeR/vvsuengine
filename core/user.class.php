<?php


class user
{

    private $core;
    private $db;

    public $id;
    public $login;
    public $pageResult; //result on page
    public $postCount;
    public $isAdmin;
    public $groupPrefix;

    public function __construct($core)
    {
        $this->core = $core;
        $this->db = $core->db;

        if(isset($_SESSION['user'])) {
            $this->login = $_SESSION['user']['login'];
            $this->update();
        } else if(isset($_COOKIE['login']) && isset($_COOKIE['user-session'])) {
            $clogin = $this->db->safesql($_COOKIE['login']);
            $session = $this->db->safesql($_COOKIE['user-session']);
            $query = $this->db->query("SELECT * FROM vvsu_users WHERE login = '{$clogin}' and `session` = '$session'");
            if($query || $this->db->num_rows($query) == 1) {
                $this->auth($this->db->fetch_assoc($query));
            }
        }
    }

    public function isAuth() {
        return isset($_SESSION['user']);
    }

    public function logout() {
        unset($_SESSION['user']);
        setcookie('login','',time()-3600);
        setcookie('user-session','',time()-3600);
    }

    public function update() {
        $query = $this->db->query("SELECT * FROM vvsu_users WHERE login = '{$this->login}'");
        if(!$query || $this->db->num_rows($query) <= 0) {
            return false;
        }
        $arr = $this->db->fetch_assoc($query);
        $this->id= $arr['id'];
        $this->login = $arr['login'];
        $this->postCount = $arr['posts'];
        $this->pageResult = $arr['posts_on_page'];
        $this->isAdmin = $arr['is_admin'];
        $this->groupPrefix = $this->isAdmin ? 'Администратор' : 'Пользователь';
        return true;
    }

    public function auth($arr) {
        $this->login = $arr['login'];
        $this->id = $arr['id'];
        $_SESSION['user'] = [
            'id' => $arr['id'],
            'login' => $arr['login'],
            'email' => $arr['email'],
            'posts' => $arr['posts']
        ];
        setcookie('login', $this->login, time() + 2590000);
        $uSession = md5(intval(rand(0,1000 * rand(0,10000))));
        setcookie('user-session', $uSession, time() + 2590000);
        $query = $this->db->query("UPDATE vvsu_users SET `session` = '$uSession'  WHERE login = '{$this->login}'");
    }


}