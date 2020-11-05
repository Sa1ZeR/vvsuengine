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

    private function getTags($id) {
        $id = intval($id);
        $query = $this->db->query("SELECT * from vvsu_tags WHERE id IN (SELECT tid from vvsu_post_to_tag WHERE pid = $id)");

        $tags = [];

        if(!$query || $this->db->num_rows($query) <= 0) {
            return $tags;
        }

        while ($arr = $this->db->fetch_assoc($query)) {
            $tags[] = $this->db->HSC($arr['title']);
        }

        return $tags;
    }

    private function getPosts($query) {
        $data = [];
        while($arr = $this->db->fetch_assoc($query)) {
            $date  =  DateTime::createFromFormat('Y-m-d', $this->db->HSC($arr['date']));
            $data[intval($arr['id'])] = [
                'id' => intval($arr['id']),
                'title' => $this->db->HSC($arr['title']),
                'text' => $this->db->HSC($arr['short_text']),
                'year' => $this->db->HSC($date->format("Y")),
                'month' => $this->db->HSC($this->dateConvert($date->format("m"))),
                'day' => $this->db->HSC($date->format("d")),
                'tid' => intval($arr['tid']),
                'tags' => [],
                'author' => $this->db->HSC($arr['login']),
            ];
        }

        //Так делать нельзя, никогда
        //ЛЮТЫЙ КОСТЫЛЬ ОСТОРОЖНО!!! DANGER!!!!
        foreach ($data as $key => $value) {
            $data[$key]['tags'] = $this->getTags($key);
        }



        return $data;
    }

    private function getPagination($maxPage, $curPage) {
        $pageArray = [];

        if($maxPage <= 1) {
            return $this->core->dataConnect(VVSU_STYLE_PATH."modules/pagination.html", $pageArray);
        }

        if($curPage >= 3) {
            $index =0;
            if($curPage + 2 >= $maxPage) {
                for($i = $curPage - 2; $i <= $maxPage;$i++) {
                    $pageArray[$index] = $i;
                    $index++;
                }
            } else {
                for($i = $curPage - 2; $i <= $curPage + 2; $i++) {
                    $pageArray[$index] = $i;
                    $index++;
                }
            }
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


        $query = $this->db->query("SELECT vvsu_posts.*, vvsu_users.login as `login` FROM vvsu_posts INNER JOIN vvsu_users ON vvsu_posts.uid = vvsu_users.id 
                ORDER BY id DESC LIMIT $curPost, $this->pageResult");
        if(!$query || $this->db->num_rows($query) <=0) {
            return $this->core->dataConnect(VVSU_STYLE_PATH."modules/posts/no-post.html");
        }

        $data = [
            'posts' => $this->getPosts($query),
            'pagination' => $this->getPagination($lastPage, $curPage),
        ];

        foreach ($data['posts'] as $post) {
            foreach ($post['tags'] as $val) {
                echo $val;
            }
        }


        return $this->core->dataConnect(VVSU_STYLE_PATH."modules/posts/post.html", $data);
    }
}