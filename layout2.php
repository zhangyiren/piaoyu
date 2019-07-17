

    <?php include_once 'meta.php'; ?>

    <div class="maxContainer search-result-container">

        <?php include_once 'header.php'; ?>

        <!-- 占位1 -->
        <div class="occupiedOne"></div>

        <?php include_once 'search.php'; ?>

        <!-- 占位2 -->
        <div class="occupiedTwo"></div>


        <div class="search-result-nav">
            <?php if(isset($_GET["filmType"]) && $_GET["filmType"]==1){ ?>
            <span style="padding-left:0.5em;">热门电影</span>
            <?php }elseif(isset($_GET["filmType"]) && $_GET["filmType"]==2){ ?>
            <span style="padding-left:0.5em;">即将上映</span>
            <?php }else{ ?>
            <span style="padding-left:0.5em;">全部</span>
            <?php } ?>
        </div>

        <?php

            $filmListObj = new DB();
            $filmType = isset($_GET["filmType"])?$_GET["filmType"]:'';
            $searchContent = isset($_POST["searchContent"])?$_POST["searchContent"]:'';
            $film = $filmListObj->getHotComingList($filmType,$searchContent);
            foreach($film as $row) {
                $block = '<div class="search-result-list">'.
                            '<div class="blanker"></div>'.
                            '<div class="movie-pic">'.
                                '<a href="introduce.php?filmId='.$row["filmId"].'"><img src="static/images/'.$row["image"].'" width="80"></a>'.
                            '</div>'.
                            '<div class="movie-name">'.
                                '<div class="mv-txt">'.
                                    '<div class="gap"><a href="introduce.php?filmId='.$row["filmId"].'"><b>'.$row["name"].'</b></a></div>'.
                                    '<div class="gap">评分<span class="scc"> '.$row["score"].'</span></div>'.
                                    '<div class="gap">'.$row["director"].'</div>'.
                                    '<div class="gap">'.$row["actors"].'</div>'.
                                '</div>'.
                            '</div>'.
                            '<div class="buy-ticket-button">'.
                                '<div class="btb">购票</div>'.
                            '</div>'.
                        '</div>';
                echo $block;
            }
            $filmListObj = null;

        ?>


        <!-- 底部box -->
        <div class="bottom-box"></div>


        <?php include_once 'navibar.php'; ?>


    </div><!-- maxContainer end -->

    <?php include_once 'last.php'; ?>


