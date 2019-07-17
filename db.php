<?php


class DB {

    private $connection = null;

    public function __construct(){

        $this->connect();

    }

    protected function connect(){

        try {
            //$this->connection = new PDO('mysql:host=sql303.byethost33.com;dbname=b33_20321189_piaoyu;charset=utf8', 'b33_20321189', 'itnews_20170702');
            $this->connection = new PDO('mysql:host=localhost;dbname=piaoyu;charset=utf8', 'root', 'root');

        } catch (PDOException $e) {
            //print "Error!: " . $e->getMessage() . "<br/>";
            echo "something wrong";
            die();
        }

    }


    //首页的全部列表
    public function getFilmList(){

        $sql = 'SELECT id,filmId,name,image,filmType FROM filmprofile';
        return $this->getData($sql);

    }


    // 热映电影和即将上映简介
    public function getHotComingList($filmType,$searchContent){

        $baseSql = 'select a.id,a.filmId,a.name,a.image,a.filmType,b.score,b.director,b.actors from filmprofile a left join filmbrief b on a.filmId=b.filmId';
        if($searchContent==''){
            if($filmType==!1 && $filmType!=2){
                $sql = $baseSql;
            }else{
                $sql = $baseSql . " where a.filmType=" . $filmType;
            }
        }else{
            $sql = $baseSql . " where a.name like '%" . $searchContent . "%'";
        }
        return $this->getData($sql);
    }


    // 电影详情
    public function getFilmDetail($filmId){

        $sql = "select b.image,b.name,a.filmId,a.classify,a.area,a.duration,a.releaseDate,a.peopleWTS,a.recommend,a.introduction,c.actors from `filmdetail` a left join `filmprofile` b on a.filmId=b.filmId left join `filmbrief` c on a.filmId=c.filmId where a.filmId=" . $filmId;
        return $this->getData($sql);

    }


    // 电影评论
    public function getComment($filmId){

        $sql = "select nickName,photo,giveScore,commentContent,commentDate,zan from `filmcomment` where filmId=" . $filmId . " order by commentDate desc";
        return $this->getData($sql);

    }


    //获取数据
    public function getData($sql){

        $stmt = $this->connection->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $stmt = null;
        return $result;

    }


    public function __destruct()
    {
        $this->connection = null;
    }

}