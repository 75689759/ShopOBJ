<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加品牌</title>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>       
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link href="Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	    <script src="js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/typeahead-bs2.min.js"></script>
         <script src="assets/layer/layer.js" type="text/javascript"></script>
        <script type="text/javascript" src="Widget/swfupload/swfupload.js"></script>
        <script type="text/javascript" src="Widget/swfupload/swfupload.queue.js"></script>
        <script type="text/javascript" src="Widget/swfupload/swfupload.speed.js"></script>
        <script type="text/javascript" src="Widget/swfupload/handlers.js"></script>
</head>

<body>

<div class=" clearfix">
	<form action="{{route('Products_Add')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field() }}
 	<div id="add_brand" class="clearfix">
	 	<div class="left_add" style="width: 100%">
		   <div class="title_name"  style="width: 100%">添加品牌</div>
		   
		   <ul class="add_conent" style="margin-left: 500px">
		    <li class=" clearfix">
		    	<label class="label_name"><i>*</i>品牌名称：</label> 
		    	<input name="bname" type="text" class="add_text"/>
		    </li>
		    <li class=" clearfix">
		    	<label class="label_name"><i>*</i>品牌序号：</label> 
		    	<input name="number" type="text" class="add_text" style="width:80px"/>
		    </li>
		    <li class=" clearfix"><label class="label_name">品牌图片：</label>
		        <input type="file" name="manage">
		    </li>
		     <li class=" clearfix">
		     	<label class="label_name"><i>*</i>所属地区：</label> 
		     	<input name="Country" type="text" class="add_text" style="width:120px"/>
		     </li>
		     <li class=" clearfix">
		     	<label class="label_name">品牌描述：</label> 
		     	<textarea name="describe" cols="" rows="" class="textarea" onkeyup="checkLength(this);"></textarea>
		     	<span class="wordage">剩余字数：<span id="sy" style="color:Red;">500</span>字</span>
		     </li>
		   </ul>
		   
		 </div>
 	</div>
	  <div class="button_brand">
	  	<input name="" type="submit"  class="btn btn-warning" value="保存"/>
	  	<input name="" type="reset" value="取消" class="btn btn-warning"/>
	  </div>
  
  </form>

</div>



</body>
</html>

