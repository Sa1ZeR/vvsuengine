<?php


class module
{
    private $core, $db, $pageResult, $user;

    public function __construct($core) {
        $this->core = $core;
        $this->user = $core->user;
        $this->db = $core->db;
        $this->pageResult = $this->user->pageResult;
    }

    private function getTags($id) {
        $id = intval($id);
        $query = $this->db->query("SELECT * from vvsu_tags WHERE id IN (SELECT tid from vvsu_post_to_tag WHERE pid = '$id')");

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
                'month' => $this->db->HSC($this->core->dateConvert($date->format("m"))),
                'day' => $this->db->HSC($date->format("d")),
                'tid' => intval($arr['tid']),
                'tags' => [],
                'author' => $this->db->HSC($arr['login']),
                'may_remove' => $this->user->isAdmin ? 1 : $this->db->HSC($arr['login'] == $this->user->login) ? 1 : 0,
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
        $this->user->update();
        $curPage = isset($_GET['pid']) ? intval($_GET['pid']) : 1;

        $count = $this->db->query("SELECT * FROM vvsu_posts");

        if(!$count || $this->db->num_rows($count) <= 0) {
            return $this->core->dataConnect(VVSU_STYLE_PATH."modules/posts/no-post.html");
        }

        $lastPage = ceil( $this->db->num_rows($count) / $this->pageResult);

        $curPost = $curPage * $this->pageResult - $this->pageResult; //запись с которой выводим

        $query = $this->db->query("SELECT vvsu_posts.*, vvsu_users.login FROM vvsu_posts INNER JOIN vvsu_users ON vvsu_posts.uid = vvsu_users.id 
                ORDER BY id DESC LIMIT $curPost, $this->pageResult");

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