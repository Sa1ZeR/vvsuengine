<?php


class module
{
    private $core, $db, $pageResult;

    public function __construct($core) {
        $this->core = $core;
        $this->db = $core->db;
        $this->pageResult = 5;
    }

    private function dateConvert($month) {
        $monthsList = array(
            "01" => "янd",
            "02" => "фев",
            "03" => "мар",
            "04" => "апр",
            "05" => "мая",
            "06" => "июня",
            "07" => "июля",
            "08" => "авг",
            "09" => "сент",
            "10" => "окт",
            "11" => "нояб",
            "12" => "дек"
        );
        return $monthsList[$month];
    }

    public function content() {
        $curPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

        $count = $this->db->query("SELECT count(*) FROM vvsu_posts");

        if(!$count || $this->db->num_rows($count) <= 0) {
            return $this->core->dataConnect(VVSU_STYLE_PATH."modules/posts/no-post.html");
        }

        $lastPage = ceil($count / $this->pageResult);

        $curPost = $curPage * $this->pageResult - $this->pageResult; //запись с которой выводим

        echo $curPost;

        $query = $this->db->query("SELECT * FROM vvsu_posts ORDER BY id DESC LIMIT $curPost, $this->pageResult");
        if(!$query || $this->db->num_rows($query) <=0) {
            return $this->core->dataConnect(VVSU_STYLE_PATH."modules/posts/no-post.html");
        }

        $data = [];

        while($arr = $this->db->fetch_assoc($query)) {
            $date  =  DateTime::createFromFormat('Y-m-d', $this->db->HSC($arr['date']));
            $data[] = [
                'id' => intval($arr['id']),
                'title' => $this->db->HSC($arr['title']),
                'text' => $this->db->HSC($arr['text']),
                'year' => $this->db->HSC($date->format("Y")),
                'month' => $this->db->HSC($this->dateConvert($date->format("m"))),
                'day' => $this->db->HSC($date->format("d"))
            ];
        }

        return $this->core->dataConnect(VVSU_STYLE_PATH."modules/posts/post.html", $data);
    }
}