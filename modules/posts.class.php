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

    private function getPosts($query) {
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
        return $data;
    }

    private function getPagination($maxPage, $curPage) {
        $pageArray = [];

        if($maxPage <= 1) {
            return $this->core->dataConnect(VVSU_STYLE_PATH."modules/pagination.html", $pageArray);
        }

        if($curPage >= 3) {
            $pageArray[0] = $curPage - 2;
            $pageArray[1] = $curPage - 1;
            $pageArray[2] = $curPage;
            $pageArray[3] = $curPage + 1;
            $pageArray[4] = $curPage + 2;
        } else {
            if($maxPage > 5) {
                for ($i = 0; $i < 5; $i++) {
                    $pageArray[$i] = intval($i + 1);
                }
            } else {
                for ($i = 0; $i < $maxPage; $i++) {
                    $pageArray[$i] = intval($i + 1);
                }
            }
        }
        return $this->core->dataConnect(VVSU_STYLE_PATH."modules/pagination.html", $pageArray);
    }

    public function content() {
        $curPage = isset($_GET['pid']) ? intval($_GET['pid']) : 1;

        $count = $this->db->query("SELECT count(*) FROM vvsu_posts");

        if(!$count || $this->db->num_rows($count) <= 0) {
            return $this->core->dataConnect(VVSU_STYLE_PATH."modules/posts/no-post.html");
        }

        $lastPage = ceil( mysqli_fetch_row($count)[0] / $this->pageResult);


        $curPost = $curPage * $this->pageResult - $this->pageResult; //запись с которой выводим


        $query = $this->db->query("SELECT * FROM vvsu_posts ORDER BY id DESC LIMIT $curPost, $this->pageResult");
        if(!$query || $this->db->num_rows($query) <=0) {
            return $this->core->dataConnect(VVSU_STYLE_PATH."modules/posts/no-post.html");
        }

        $data = [
            'posts' => $this->getPosts($query),
            'pagination' => $this->getPagination($lastPage, $curPage),
        ];


        return $this->core->dataConnect(VVSU_STYLE_PATH."modules/posts/post.html", $data);
    }
}