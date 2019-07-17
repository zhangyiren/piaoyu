<?php

// 1-热映电影 2-即将上映
function getFilmList($filmType=1){
    $movieListObj = new DB();
    $filmList = $movieListObj->getFilmList();
    foreach($filmList as $row) {
        if($row['filmType']==$filmType){
            $block = '<div class="poster">'.
                '<div class="img-center"><a href="introduce.php?filmId='.$row["filmId"].'"><img src="static/images/'.$row["image"].'" width="100" height="147"></a></div>'.
                '<div class="film-name"><a style="color:#333333;" href="introduce.php?filmId='.$row["filmId"].'">'.$row["name"].'</a></div>'.
                '</div>';
            echo $block;
        }
    }
    $movieListObj = null;
}

?>

    <!-- 热映影片 -->
    <div class="film-div">
        <span class="hot-film">热映影片</span>
        <span class="film-total"><a href="process.php?filmType=1">全部 ></a></span>
    </div> <!-- 热映影片 end -->


    <!-- 影片海报栏 -->
    <div class="poster-column-wrap">

        <div class="poster-column">

            <?php getFilmList(1);?>

        </div>

    </div> <!-- 影片海报栏 end -->