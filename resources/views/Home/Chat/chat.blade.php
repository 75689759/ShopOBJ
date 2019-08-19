<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="js/jquery.js"></script>
    <title>客服中心</title>
    <style>
        *, *:before, *:after {
            box-sizing: border-box;
        }
        body, html {
            height: 100%;
            overflow: hidden;
        }
        body, ul {
            margin: 0;
            padding: 0;
        }
        body {
            color: #4d4d4d;
            font: 14px/1.4em 'Helvetica Neue', Helvetica, 'Microsoft Yahei', Arial, sans-serif;
            background: #f5f5f5 url('images/bg.jpg') no-repeat center;
            background-size: cover;
            font-smoothing: antialiased;
        }
        ul {
            list-style: none;
        }
        #chat {
            margin: 20px auto;
            width: 800px;
        	height: 600px;
        }
    </style>
<style type="text/css">#chat{overflow:hidden;border-radius:3px}#chat .main,#chat .sidebar{height:100%}#chat .sidebar{float:left;width:200px;color:#f4f4f4;background-color:#2e3238}#chat .main{position:relative;overflow:hidden;background-color:#eee}#chat .m-text{position:absolute;width:100%;bottom:0;left:0}#chat .m-message{height:calc(100% - 10pc)}</style><style type="text/css">.m-card{padding:9pt;border-bottom:1px solid #24272c}.m-card footer{margin-top:10px}.m-card .avatar,.m-card .name{vertical-align:middle}.m-card .avatar{border-radius:2px}.m-card .name{display:inline-block;margin:0 0 0 15px;font-size:1pc}.m-card .search{padding:0 10px;width:100%;font-size:9pt;color:#fff;height:30px;line-height:30px;border:1px solid #3a3a3a;border-radius:4px;outline:0;background-color:#26292e}</style><style type="text/css">.m-list li{padding:9pt 15px;border-bottom:1px solid #292c33;cursor:pointer;-webkit-transition:background-color .1s;transition:background-color .1s}.m-list li:hover{background-color:hsla(0,0%,100%,.03)}.m-list li.active{background-color:hsla(0,0%,100%,.1)}.m-list .avatar,.m-list .name{vertical-align:middle}.m-list .avatar{border-radius:2px}.m-list .name{display:inline-block;margin:0 0 0 15px}</style><style type="text/css">.m-text{height:10pc;border-top:1px solid #ddd}.m-text textarea{padding:10px;height:100%;width:100%;border:none;outline:0;font-family:Micrsofot Yahei;resize:none}</style><style type="text/css">.m-message{padding:10px 15px;overflow-y:scroll}.m-message li{margin-bottom:15px}.m-message .time{margin:7px 0;text-align:center}.m-message .time>span{display:inline-block;padding:0 18px;font-size:9pt;color:#fff;border-radius:2px;background-color:#dcdcdc}.m-message .avatar{float:left;margin:0 10px 0 0;border-radius:3px}.m-message .text{display:inline-block;position:relative;padding:0 10px;max-width:calc(100% - 40px);min-height:30px;line-height:2.5;font-size:9pt;text-align:left;word-break:break-all;background-color:#fafafa;border-radius:4px}.m-message .text:before{content:" ";position:absolute;top:9px;right:100%;border:6px solid transparent;border-right-color:#fafafa}.m-message .self{text-align:right}.m-message .self .avatar{float:right;margin:0 0 0 10px}.m-message .self .text{background-color:#b2e281}.m-message .self .text:before{right:inherit;left:100%;border-right-color:transparent;border-left-color:#b2e281}

 		 #one{
            width:585px;
            margin:20px auto;
            height:30px;
            /*border:1px solid red;*/
            position:relative;
            top:-210px;
            left:92px;
        }
        .chat_face{
            width: 30px;
            height: 30px;
            background: url('images/1.png') no-repeat;
            background-position: -404px -398px;
            background-size: 487px 462px;
            display: inline-block;
            vertical-align: middle;
        }

        #bqb{
        	width:400px;
        	height:300px;
        	/*border:1px solid red;*/
        	position:relative;
        	left:600px;
        	top:-560px;
        	background:#FFFFFF;
        	display:none;
        }

        #top{
        	width:100%;
        	height:40px;
        	/*border:1px solid red;*/
        	background-color:#F2F2F2;
        }

        #qq{
        	width:100px;
        	height:30px;
        	/*border:1px solid red;*/
        	line-height:30px;
        	text-align:center;
        	position:relative;
        	top:10px;
        	left:15px;
        	background-color:#FFFFFF;
        }

        #center{
        	width:390px;
        	height:235px;
        	/*border:1px solid red;*/
        	position:relative;
        	left:10px;
        	overflow-y: scroll;
        }

        .png{
        	width:30px;
        	height:30px;
        	border:1px solid #F0F0F0;
        	float:left;
        	list-style-type:none;
        }

        .png>img{
        	width:24px;
        	height:24px;
            margin-left:2px;
            margin-top:2px;
        }

        #gif{
        	width:47px;
        	height:51px;
        	/*border:1px solid red;*/
        	position:relative;
        	left:402px;
        	top:-235px;
        	display:none;
        }

        #add{
        	width:100%;
        	height:25px;
        	/*border:1px solid red;*/
        	background-color:#FFFFFF;
        	position:absolute;
        	/*left:10px;*/
        	top:276px;
        	/*left:;*/
        }
        #btn{
        	height:25px;
        	margin-left:15px;
        	background-color:#F2F2F2;
        	position:relative;
        	/*left:5px;*/
        	/*top:10px;*/
        }
       /* #btn2{
        	height:25px;
        	margin-left:220px;
        	background-color:#F2F2F2;
        }*/
        #bodys{
        	width:100%;
        	height:100%;
        	/*border:1px solid red;*/
        	background-color:black;
        	position:relative;
        	top:-990px;
        	/*left:300px;*/
        	opacity:0.5;
        	display:none;
        }
        #addbq{
        	width:300px;
        	height:200px;
        	/*border:1px solid red;*/
        	position:relative;
        	top:200px;
        	left:650px;
        	display:none;
        	z-index:99;
        	background-color:#FFFFFF;
        	
        }
        #file{
        	width:100%;
        	height:30px;
        	background-color:#2E3238;
        }
        #close{
        	width:30px;
        	height:30px;
        	float:right;
        	background-color:#2E3238;
        	line-height:30px;
        	text-align:center;
        }
</style>

</head>
<body>

<div id="chat">
    <div class="sidebar">
        <div class="m-card">
            <header>
                <img class="avatar" alt="Coffce" src="images/default.jpg" width="40" height="40">
                <p class="name">name</p>
            </header>
            <footer>
                <input class="search" placeholder="search user...">
            </footer>
        </div>
        <!--v-component-->
        <div class="m-list">
            <ul>
            {{-- <!--v-for-start-->
                <foreach name="list" item="list">
                    <?php
                        // $id = $list['id'];
                    ?>
                    <if condition="$list['auth'] eq 2">
                        <a href='{:U("Home/service/service/id/$id")}'>
                            <li class="active" style="color:white;">
                                <img class="avatar" src="__PUBLIC__/{$list['photo']}" width="30" height="30">
                                <p class="name" >{$list[nickname]}(客服)</p>
                            </li>
                        </a>
                    </if>
                    <if condition="$list['auth'] eq 1">
                        <a href='{:U("Home/service/service/id/$id")}'>
                            <li class="active" style="color:white;">
                                <img class="avatar" src="__PUBLIC__/{$list['photo']}" width="30" height="30">
                                <p class="name">{$list[nickname]}</p>
                            </li>
                        </a>
                    </if>
                </foreach>
            <!--v-for-end--> --}}
            </ul>
        </div>
        <!--v-component-->
    </div>
    <div class="main">
        <div class="m-message">
        <ul class="chat">
        <!--v-for-start-->
           

            {{-- <foreach name="chats" item="chat">
            	<if condition="$_SESSION['home']['uid'] eq $chat['uid']">
		            <li class="we">
		            	<p class="time"><span>{$chat['ctime']}</span></p>
		                <div class="main self">
		                    <img class="avatar" src="__PUBLIC__/{$user['photo']}" width="30" height="30">
		                    <if condition="$chat['type'] eq 1">
		                    	<div class="text">{$chat['content']}</div>
		                	</if>

		                	<if condition="$chat['type'] eq 2">
		                		<div class="text"><img class="zzz" style="width:35px;height:35px;" src="{$chat['content']}"/></div>
		                	</if>
		                </div>
		            </li>
	        	</if>
	        	<if condition="$_SESSION['home']['uid'] neq $chat['uid']">
	        		<li class="he">
		                <p class="time">
		                    <span>{$chat['ctime']}</span>
		                </p>
			            <div class="main">
			                <img class="avatar" src="__PUBLIC__/{$result['photo']}" width="30" height="30">
			                <if condition="$chat['type'] eq 1">
		                    	<div class="text">{$chat['content']}</div>
		                	</if>

		                	<if condition="$chat['type'] eq 2">
		                		<div class="text"><img class="zzz" style="width:35px;height:35px;" src="{$chat['content']}"/></div>
		                	</if>
			            </div>
		            </li>
	        	</if>
        	</foreach> --}}
        <!--v-for-end-->
        </ul>
        </div>
        <!--v-component-->
        <div class="m-text">
        	<textarea id="content" placeholder="按 Enter 发送"></textarea>
        </div><!--v-component-->
    </div>
</div>
<div id="one">
    <a id="bq" class="chat_face"></a>
</div>

<div id="bqb">
	<div id="top">
		<div id="qq">QQ表情</div>
	</div>
	<div id="center">

	</div>
	<div id="gif">
		<img id="gifImg" src="images/2.png">
	</div>
	<div id="add">
		<button id="btn">添加表情</button>
<!-- 		<button id="btn2">添加分组</button> -->
	</div>
</div>

<div id="bodys">
	<div id="addbq">
		<div id="file">
            <div id="close">X</div>
        </div>
		<input type="file" name="pic"/><br/>
		<input id="submit" type="submit" value="上传">
	</div>
</div>

<?php

    // if(isset($_GET['id'])){
    //     $cid = $_GET['id'];
    // }

    // if(isset($result)){
    //     $a = $result['id'];
    // }else{
    //     $a = 0;
    // }

    // $photo = $result['photo'];

    // $id = $_SESSION['home']['uid'];
	
?>

<script type="text/javascript">
	// chatHeight();
	$('#bq').click(function(){
		$('#bqb').fadeIn(1000);
		$('#bqb').css('display','block');
	});

	$('#chat').click(function(){
		$('#bqb').fadeOut(1000);
		$('#bqb').css('display','none');
	});

	$('#btn').click(function(){
		$('#bodys').css('display','block');
		$('#addbq').css('display','block');
	});

	$('.png').mouseover(function(){
		$('#gif').css('display','block');
	});

	$('.png').mouseout(function(){
		$('#gif').css('display','none');
	});

	$('#close').mouseover(function(){
		$('#close').css('backgroundColor','#EEEEEE');
	});

	$('#close').mouseout(function(){
		$('#close').css('backgroundColor','#2E3238')
	});

	$('#close').click(function(){
		$('#bodys').css('display','none');
		$('#addbq').css('display','block');
	});
	
    /*XML表情*/
    function createXMLDom(){
        if (window.ActiveXObject){ 
            var xmldoc=new ActiveXObject("Microsoft.XMLDOM");
        }else if (document.implementation&&document.implementation.createDocument){
            var xmldoc=document.implementation.createDocument("","doc",null);
            xmldoc.async = false;
            //为了和FireFox一至，这里不能改为False;
            xmldoc.preserveWhiteSpace=true;
        }
            return xmldoc;
        
    }
    //加载XML文件。
    var xmlDom=createXMLDom();
    console.log(xmlDom);
    xmlDom.load({{ asset('Home/images/Emotion/Emotion.xml') }});
    var Emotion = xmlDom.activeElement.childNodes[0].nextElementSibling.children;
    //遍历xml文件的图片名
    for (var i =  0; i <= Emotion.length-1; i++) {
        var b=Emotion[i];
        var a = $('<li class="png"><img class="zzz" a="'+i+'" onClick="img(this);" src="images/Emotion/'+b.getAttribute('Thumb')+'"/></li>');
        $('#center').append(a);
    };
    //循环绑定事件
     // console.log(Emotion);
    for (var j =0 ; j <= $('.zzz').length - 1; j++) {
        (function(j){
            $('.zzz')[j].onmouseover=function(){
                a = $(this).attr('a');
                $('#gifImg').attr('src','images/Emotion/'+Emotion[a].getAttribute('Image'));
                $('#gif').css('display','block');
            }
            $('.zzz')[j].onmouseout=function(){
                $('#gif').css('display','none');
            }
        })(j);
    };

    // $('#content').keydown(function(event){
    // 	if (event.keyCode == 13) {
    //         var time = new Date();
    //         var times = time.getFullYear()+'-'+time.getMonth()+'-'+time.getDate()+''+time.getHours()+':'+time.getMinutes()+':'+time.getSeconds();
    // 		$('.chat').append($('<li><p class="time"><span>'+times+'</span></p><div class="main self"> <img class="avatar" src="__PUBLIC__/{$user["photo"]}" width="30" height="30"><div class="text">'+$('#content').val()+'</div></div></li>'));
    //         var str = $('#content').val();
    //         $('#content').val('');
    //         chatHeight();

    // 		$.ajax("{:U('Home/Service/news')}",{
    // 			data:{content:str,uid:{$user['uid']},cid:{$cid},type:1},
    // 			type:'POST',
    // 			dataType:'json',
    // 			success:function(data){

    // 			},
    // 			timeout:0,
    // 			async:true
    // 		});

    // 		return false;
    // 	}
    // });

    // function img(img){
    // 	var imgs = $(img).attr('src');
    //     var images = imgs.split('.');
    //     var photo = images[0]+'.gif';
    //     var time = new Date();
    //     var times = time.getFullYear()+'-'+time.getMonth()+'-'+time.getDate()+''+time.getHours()+':'+time.getMinutes()+':'+time.getSeconds();
    // 	$('.chat').append('<li><p class="time"><span>'+times+'</span></p><div class="main self"> <img class="avatar" src="__PUBLIC__/{$user["photo"]}" width="30" height="30"><div class="text"><img class="zzz" style="width:35px;height:35px;" src='+photo+' /></div></div></li>');
    // 		// $.ajax("{:U('Home/Service/news')}",{
    // 		// 	data:{content:photo,uid:{$user['uid']},cid:{$cid},type:2},
    // 		// 	type:'POST',
    // 		// 	dataType:'json',
    // 		// 	success:function(data){

    // 		// 	},
    // 		// 	timeout:0,
    // 		// 	async:true
    // 		// });

    // 	chatHeight();
    // }
    // var len = 0;
    //接收消息
    // setInterval(function fun(){
    //     $.ajax("{:U('Home/Service/fun')}",{
    //         data:{cid:{$user['uid']}},
    //         type:'POST',
    //         dataType:'json',
    //         success:function(data){
    //             var time = new Date();
    //             var times = time.getFullYear()+'-'+time.getMonth()+'-'+time.getDate()+''+time.getHours()+':'+time.getMinutes()+':'+time.getSeconds();
    //             if(data.length != 0){
    //                 len = $('.he').length-1;
    //                 if(data[0].type == 1){
    //                     var str = '<div class="text">'+data[0].content+'</div>';
    //                     if(data[0].content != $($('.he')[len].children[1].children[1]).html()){
    //                         if(data[0].uid == {$cid}){
    //                             var chat = $('<li class="he"><p class="time"><span>'+times+'</span></p><div class="main"><img class="avatar" style="width:30px;height:30px" src="__PUBLIC__/{$photo}" />'+str+'</div></li>');
    //                             $('.chat').append(chat);
    //                             chatHeight();
    //                         }
    //                     }
    //                 }
    //                 if(data[0].type == 2){
    //                     var strs = '<div class="text"><img class="zzz" style="width:35px;height:35px;" src= "'+data[0].content+'"/></div>';
    //                     if(data[0].content != $($($($('.he')[len].children[1].children[1])[0].children[0])[0]).attr('src')){
    //                         if(data[0].uid == {$cid}){
    //                             var chat = $('<li class="he"><p class="time"><span>'+times+'</span></p><div class="main"><img class="avatar" style="width:30px;height:30px" src="__PUBLIC__/{$photo}" />'+strs+'</div></li>');
    //                             $('.chat').append(chat);
    //                             chatHeight();
    //                         }
    //                     }
    //                 }
    //             }
    //         },
    //         timeout:0,
    //         async:true
    //     });
    // },1000);

    // $('.m-message').scrollTop($('.m-message').height()); 滚动一屏幕
    // function chatHeight(){
    // 	$('.m-message').scrollTop($($('.chat')[0])[0].clientHeight);
    // }
    
</script>


</body></html>