<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Index</title>
        <style>
            body{background:lightblue}
            #water li{
                list-style:none;
                float:left;
            }
            #water li div{
                background:white;
                padding:4px;
                margin:2px;
            }
            img{border:2px solid black}
        </style>
    </head>
    <body>
        
    </body>
    <script>
        var pWidth = 220;   //定义图片宽度
        var mark;           //用于记录当前列数，用于判断优化；
        var data;           //用户缓存ajax获取到的数据，在窗口宽度调整的时候重排数据；
        var timer;          //用于scroll事件的兼容性解决；

        window.onload = function(){
            mark = cols();
            addul(mark);
            loadpic();
        }

        //当窗口宽度进行调整的时候，重新计算ul的列数
        window.onresize = function(){
            var num = cols();
            //如果计算得出的列数与现有列数不一致，重新生成页面，避免拖动宽度过程中多次触发
            if(mark != num){
                var ul = document.getElementById("water");
                document.body.removeChild(ul);
                addul(num);
                process(data);
                mark = num;
            }
        }
        
       //当滚动条滚动的时候动态加载
        window.onscroll = function(){
            if(timer){
                clearTimeout(timer);
                timer = undefined;
            }

            //避免重复触发事件，用超时保证一次滚动只执行一次计算长度并加载新数据
            timer = setTimeout(function(){
                //三高
                var wheight = document.documentElement.clientHeight;  //窗口高度
                var sheight = document.documentElement.scrollTop || document.body.scrollTop;     //滚动高度(后面是兼容chrom)
                var dheight = document.documentElement.scrollHeight;  //文档高度
                
                //判断长度，执行加载新数据
                if(dheight - wheight - sheight < 200) loadpic();
                //在title实时观察数据
                document.title = "窗口:"+wheight+"滚动:"+sheight+"文档:"+dheight;
            },100);
            
        }
        
        function cols(){
            //初始化,计算生成的列数
            var b_width = document.body.offsetWidth-25;                //去除滚动条的宽度
            var num = Math.floor(b_width/(pWidth+20));                 //图片的宽度加上边框间距等宽度
            return num;
        }

        function addul(num){
            //创建ul元素
            var oul = document.createElement("ul");
            oul.setAttribute('id','water');
            //循环产生li
            for(var i=0;i<num;i++){
                var oli = document.createElement('li');
                oul.appendChild(oli);
            }
            document.body.appendChild(oul);
        }

        //获取图片
        function loadpic(){
            var ajax = getAjax();
            ajax.open('get','/picture/ajaxdata',true);
            ajax.send();
            ajax.onreadystatechange = function(){
                if(ajax.readyState == 4 && ajax.status == 200){
                    data = ajax.responseText;
                    //alert(data);
                    //调用方法process()处理返回数据
                    process(data);
                }
            }
        }

        //处理数据，将图片插入到DOM中
        function process(jsonstr){
            var obj = eval("("+jsonstr+")");
            var oul = document.getElementById("water");
            var oli = oul.childNodes;
            for(var j=0;j<obj.length;j++){
                var img = obj[j];
                //创建一个div包裹图片
                var div = document.createElement("div");
                div.innerHTML = '<img src="/public/upload/'+img+'" width="220"/>';
                //使用冒泡法找出最短的li
                var mark = -1;
                for(var i=0;i<oli.length;i++){
                    tHeight = oli[i].offsetHeight;
                    if(mark == -1 || mark>tHeight){
                        mark = tHeight;
                        var sli = oli[i]; 
                        sli.appendChild(div);
                    }
                }
            }
        }


        //测试参数
        //body体宽度
       

        //获得ajax对象，解决兼容性
        function getAjax(){
            var ajax;
            if(window.XMLHttpRequest){
                ajax = new XMLHttpRequest(); 
            }else{
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            }
            return ajax;
        }
    </script>
</html>

