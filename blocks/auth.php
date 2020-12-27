<?php


class block_auth
{
    private $core,$db, $user;

    public function __construct($core)
    {
        $this->core = $core;
        $this->user = $core->user;
        $this->db = $core->db;
    }

    public function content() {
        if(!$this->user->isAuth()) {
            return $this->core->dataConnect(VVSU_STYLE_PATH . "blocks/auth.html");
        }
        if($this->user->update()) {
            $data = [
                'login' => $this->user->login,
                'group' => $this->user->groupPrefix,
                'posts_count' => $this->user->postCount,
                'posts_on_page' => $this->user->pageResult
            ];
            return $this->core->dataConnect(VVSU_STYLE_PATH . "blocks/profile.html", $data);
        } else {
            return $this->core->dataConnect(VVSU_STYLE_PATH . "blocks/auth.html");
        }
    }
}