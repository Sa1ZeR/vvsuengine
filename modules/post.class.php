<?php


class module {

    private $core, $db;

    public function __construct($core) {
        $this->core = $core;
        $this->db = $core->db;
    }

    public function content() {
        $postId = intval($_GET['id']);

        if(!$postId) {
            return $this->core->dataConnect(VVSU_STYLE_PATH.'modules/post/no-post.html');
        }

        $query = $this->db->query("SELECT vvsu_posts.*, vvsu_users.login FROM vvsu_posts INNER JOIN vvsu_users ON vvsu_posts.uid = vvsu_users.id WHERE vvsu_posts.id = $postId");

        if(!$query || $this->db->num_rows($query) <= 0) {
            return $this->core->dataConnect(VVSU_STYLE_PATH.'modules/post/no-post.html');
        }


        $arr = $this->db->fetch_assoc($query);

        $date  =  DateTime::createFromFormat('Y-m-d', $this->db->HSC($arr['date']));
        $data = [
            'id' => intval($arr['id']),
            'title' => $this->db->HSC($arr['title']),
            'text' => $this->db->HSC($arr['text']),
            'year' => $this->db->HSC($date->format("Y")),
            'month' => $this->db->HSC($this->core->dateConvert($date->format("m"))),
            'day' => $this->db->HSC($date->format("d")),
            'author' => $this->db->HSC($arr['login']),
        ];


        return $this->core->dataConnect(VVSU_STYLE_PATH.'modules/post/post.html', $data);
    }
}