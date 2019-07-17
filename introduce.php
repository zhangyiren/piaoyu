

    <?php include_once 'meta.php'; ?>

    <div class="maxContainer">

        <?php include_once 'header.php'; ?>

        <!-- 占位1 -->
        <div class="occupiedOne"></div>

        <?php include_once 'search.php'; ?>

        <!-- 占位2 -->
        <div class="occupiedTwo"></div>


        <?php

            $filmDetailObj = new DB();
            $filmId = $_GET["filmId"];
            // 影片详情
            $detail = $filmDetailObj->getFilmDetail($filmId);
            // 影片评论
            $comment = $filmDetailObj->getComment($filmId);
            foreach($detail as $row) {
                $block = '<div class="search-result-list">'.
                                '<a name="#top"></a>'.
                                '<div class="blanker"></div>'.
                                '<div class="movie-pic">'.
                                    '<img src="static/images/'.$row["image"].'" width="80">'.
                                '</div>'.
                                '<div class="movie-name">'.
                                        '<div class="gap"><b>'.$row["name"].'</b></div>'.
                                        '<div class="gap">'.$row["classify"].'/'.$row["area"].'/'.$row["duration"].'分钟</div>'.
                                        '<div class="gap">'.$row["releaseDate"].'中国大陆上映</div>'.
                                        '<div class="gap">'.$row["peopleWTS"].'万人想看/大v推荐度'.$row["recommend"].'%</div>'.
                                '</div>'.
                            '</div>';
                echo $block;
            }
            $filmDetailObj = null;

        ?>


        <!-- 灰度分割条 -->
        <div id="separator-two"></div>

        <div class="movie-detail">
            <div class="detail-menu">简介</div>
            <div class="detail-menu"><a href="#yz">演职人员</a></div>
            <div class="detail-menu"><a href="#pl">评论</a></div>
            <div class="detail-menu"><a href="#yp">影片资料</a></div>
        </div>


        <div class="div-text">

            <div id="t-box" class="text-box">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $detail[0]["introduction"];?>
            </div>
            <div id="open-text" class="open-text">
                <span class="zk"><a onclick="document.getElementById('t-box').className='tt-box';document.getElementById('open-text').className='open-text-v';">展开</a></span>
            </div>

        </div>



        <!-- 热映影片 -->
        <div class="film-div">
            <a name="yz"></a>
            <span class="hot-film">演职人员</span>
            <span class="film-total"></span>
        </div> <!-- 热映影片 end -->


        <!-- 影片海报栏 -->
        <?php if($detail[0]["filmId"]==1){ ?>
        <div class="poster-column-wrap">

            <div class="poster-column">

                <div class="poster">
                    <div class="img-center"><img src="static/images/anna.png" width="100" height="147"></div>
                    <div class="film-name">安娜·波顿</div>
                </div>

                <div class="poster">
                    <div class="img-center"><img src="static/images/ruian.png" width="100" height="147"></div>
                    <div class="film-name">瑞安弗·雷克</div>
                </div>

                <div class="poster">
                    <div class="img-center"><img src="static/images/buli.png" width="100" height="147"></div>
                    <div class="film-name">布丽·拉尔森</div>
                </div>

                <div class="poster">
                    <div class="img-center"><img src="static/images/sailiaoer.png" width="100" height="147"></div>
                    <div class="film-name">塞缪尔·杰克逊</div>
                </div>

                <div class="poster">
                    <div class="img-center"><img src="static/images/ben.png" width="100" height="147"></div>
                    <div class="film-name">本·门德尔森</div>
                </div>

                <div class="poster">
                    <div class="img-center"><img src="static/images/qiude.png" width="100" height="147"></div>
                    <div class="film-name">裘德·洛</div>
                </div>

            </div>

        </div> <!-- 影片海报栏 end -->
        <?php } ?>


        <?php

            if($detail[0]["filmId"]!=1){
                $actorsName = '<div style="padding-left:1.4em;">'.
                                '<div style="width:97%;">'.$detail[0]["actors"].'</div>'.
                        '</div>';
                echo $actorsName;
            }

         ?>

        <!-- 占位 -->
        <div class="occupied-blank"></div>


        <!-- 评论 -->
        <div class="film-div">
            <a name="pl"></a>
            <span class="hot-film">评论</span>
            <span class="film-total"></span>
        </div> <!-- 评论 end -->


        <!-- 评论区列表开始 -->
        <div>
            <!-- 每条评论开始 -->
            <?php

                foreach($comment as $row) {
                    $commentBlock = '<div class="each-cut-off-line">'.
                                        '<div class="user-profile">'.
                                            '<div class="portrait"><img src="static/images/xiduntie.png" width="45"></div>'.
                                            '<div class="user-info">'.
                                                ' <div class="user-name"><b>'.$row["nickName"].'</b></div>'.
                                                '<div class="ticket"><span class="gp">购票</span><span class="grade">评分: '.$row["giveScore"].'</span></div>'.
                                            '</div>'.
                                        '</div>'.
                                        '<div>'.
                                            '<div class="comment-content">'.
                                                $row["commentContent"].
                                            '</div>'.
                                         '</div>'.
                                        '<div class="comment-day">'.
                                            '<div class="day-time">'.$row["commentDate"].'</div>'.
                                            '<div class="comment-praise">'.
                                                '<span><i class="glyphicon glyphicon-thumbs-up"></i>'.$row["zan"].'</span>'.
                                            '</div>'.
                                        '</div>'.
                                    '</div>';
                    echo $commentBlock;
                }

            ?>
            <!-- 每条评论结束 -->
        </div>
        <!-- 评论区列表结束 -->


        <!-- 占位 -->
        <div class="occupied-blank"></div>


        <!-- 影片资料 -->
        <div class="film-div">
            <a name="yp"></a>
            <span class="hot-film">影片资料</span>
            <span class="film-total"></span>
        </div> <!-- 影片资料 end -->


        <!-- 影片评论列表 -->
        <div>

            <!-- 每行 -->
            <div class="each-cut-off-line">
                <div class="datum">
                    <div class="hx">幕后花絮</div>
                    <div class="mr"><i class="glyphicon glyphicon-menu-right"></i></div>
                </div>
            </div> <!-- 每行 end-->


            <!-- 每行 -->
            <div class="each-cut-off-line">
                <div class="datum">
                    <div class="hx">台词精选</div>
                    <div class="mr"><i class="glyphicon glyphicon-menu-right"></i></div>
                </div>
            </div> <!-- 每行 end-->


            <!-- 每行 -->
            <div class="each-cut-off-line">
                <div class="datum">
                    <div class="hx">家长指引</div>
                    <div class="mr"><i class="glyphicon glyphicon-menu-right"></i></div>
                </div>
            </div> <!-- 每行 end-->


            <!-- 每行 -->
            <div class="each-cut-off-line">
                <div class="datum">
                    <div class="hx">出品发行</div>
                    <div class="mr"><i class="glyphicon glyphicon-menu-right"></i></div>
                </div>
            </div> <!-- 每行 end-->

        </div>  <!-- 影片评论列表 end -->



        <div id="to-top">
            <a href="#top"><i class="glyphicon glyphicon-arrow-up"></i></a>
        </div>


        <!-- 底部box -->
        <div class="bottom-box"></div>


        <?php include_once 'navibar.php'; ?>


    </div><!-- maxContainer end -->

    <?php include_once 'last.php'; ?>


