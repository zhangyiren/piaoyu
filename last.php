
    <script type="text/javascript">


        window.onload = function(){

            var url = document.URL;
            //alert(url);

            //首页
            if(url.indexOf("index") != -1){
                var ns='hpg';
            }

            //电影
            else if(url.indexOf("process") != -1){
                var ns='mv';
            }

            //演出
            else if(url.indexOf("liveshow") != -1){
                var ns='sw';
            }

            //我的
            else if(url.indexOf("mine") != -1){
                var ns='me';
            }

            else{
                var ns='hpg';
            }

            //alert(ns);
            lightUp(ns);
        }


        function lightUp(ns){

            //新默认
            var ns_i="ltu-"+ns+"-i";
            var ns_t="ltu-"+ns+"-t";

            //取消之前的默认
            document.getElementById('ltu-hpg-i').className='bText';
            document.getElementById('ltu-hpg-t').className='bText';

            //设置新的默认
            var run_ns_i="document.getElementById('"+ns_i+"').className="+"'bText b-spc';";
            var run_ns_t="document.getElementById('"+ns_t+"').className="+"'bText b-spc';";

            eval(run_ns_i);
            eval(run_ns_t);

        }

        //点击
        var bm = new Vue({
            el: '#forClick',
            data: {
                counter: 0
            },
            delimiters:['{%','%}']
        })


        var vm = new Vue({
            el: '#vue_det',
            data: {
                site: "菜鸟教程1",
                url: "www.runoob22.com",
                alexa: "100001"
            },
            delimiters:['{%','%}'],
            methods: {
                details: function() {
                    return  this.site + " - 学的不仅是技术，更是梦想！";
                }
            }
        })

        //ajax请求
        // window.onload = function(){
        //     var vm = new Vue({
        //         el:'#box',
        //         data:{
        //             msg:'Hello World!',
        //         },
        //         delimiters:['{%','%}'],
        //         methods:{
        //             post:function(){
        //                 this.$http.post('/dealAjaxRequest',{
        //                     name:"菜鸟教程",
        //                     url:"http://www.runoob.com"
        //                 },{
        //                     emulateJSON:true
        //                 }).then(function(res){
        //                     //document.write(res.body);
        //                     alert(res.body.Names);
        //                     alert(res.body.Contents);
        //                     alert(res.body.Times);
        //                 },function(res){
        //                     //console.log(res.status);
        //                     alert(res.status);
        //                 });
        //             }
        //         }
        //     });
        // }


        var mySwiper = new Swiper('.swiper-container', {
            autoplay: true,//可选选项，自动滑动
            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },
        })

    </script>


    </body>

    </html>
