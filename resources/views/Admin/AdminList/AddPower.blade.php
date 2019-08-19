<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
        <link href={{ asset("admin/assets/css/bootstrap.min.css") }} rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css") }}/>       
        <link href={{ asset("admin/assets/css/codemirror.css") }} rel="stylesheet">
        <link rel="stylesheet" href={{ asset("admin/assets/css/ace.min.css") }} />
        <link rel="stylesheet" href="font/css/font-awesome.min.css") }} />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href={{ asset("admin/assets/css/ace-ie.min.css") }} />
		<![endif]-->
		<script src={{ asset("admin/js/jquery-1.9.1.min.js") }}></script>
        <script src={{ asset("admin/assets/js/bootstrap.min.js") }}></script>
		<script src={{ asset("admin/assets/js/typeahead-bs2.min.js") }}></script>           	
		<script src={{ asset("admin/assets/js/jquery.dataTables.min.js") }}></script>
		<script src={{ asset("admin/assets/js/jquery.dataTables.bootstrap.js") }}></script>
        <script src={{ asset("admin/assets/layer/layer.js") }} type="text/javascript" ></script>          
        <script src={{ asset("admin/assets/laydate/laydate.js") }} type="text/javascript"></script>
        <script src={{ asset("admin/js/dragDivResize.js") }} type="text/javascript"></script>
<title>添加权限</title>
</head>

<body>
<div class="Competence_add_style clearfix">
  <div class="left_Competence_add">
   <div class="title_name">添加权限</div>
    <div class="Competence_add">
     <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限名称 </label>
       <div class="col-sm-9"><input type="text" id="form-field-1" placeholder=""  name="权限名称" class="col-xs-10 col-sm-5"></div>
	</div>
	<div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限描述 </label>
		<div class="col-sm-9"><textarea name="权限描述" class="form-control" id="form_textarea" placeholder="" onkeyup="checkLength(this);"></textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">200</span>字</span></div>
	</div>
    
   <!--按钮操作-->
   <div class="Button_operation">
		<button class="btn btn-primary radius" id="submit" type="button"><i class="fa fa-save "></i> 保存并提交</button>
		<button onclick="article_save();" class="btn btn-secondary  btn-warning" type="button"><i class="fa fa-reply"></i> 返回上一步</button>
		<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
	</div>
   </div>
   </div>
   <!--权限分配-->
   <div class="Assign_style">
		<div class="title_name">权限分配</div>
		<div class="Select_Competence">
		  @foreach ($res as $k => $v )
   
			  <dl class="permission-list">
				  <dt><label class="middle"><input name="user-Character-0" class="ace" type="checkbox" id="id-disable-check"><span class="lbl">{{ $v['nodetype'] }}</span></label></dt>
				  <dd>
  
				  @foreach ($v['tag'] as $ke => $va )
				  
					  <dl class="cl permission-list2">
						  <dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check"><span class="lbl">{{ $va['nodefu_name'] }}</span></label></dt>
						  <dd>
							  @foreach ($a[$ke]['node'] as $key => $val )
								  <label class="middle"><input type="checkbox" value="{{ $val['id'] }}" class="ace node" name="user-Character-0-0-0" id="user-Character-0-0-0"><span class="lbl">{{ $val['node_name'] }}</span></label>
							  @endforeach
						  </dd>
					  </dl>
  
				  @endforeach
				  
				  </dd>
			  </dl> 
  
		  @endforeach 
		</div> 
	</div>
</div>
</body>
</html>
<script type="text/javascript">
//初始化宽度、高度  
 $(".left_Competence_add,.Competence_add_style").height($(window).height()).val();; 
 $(".Assign_style").width($(window).width()-500).height($(window).height()).val();
 $(".Select_Competence").width($(window).width()-500).height($(window).height()-40).val();
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	
	$(".Assign_style").width($(window).width()-500).height($(window).height()).val();
	$(".Select_Competence").width($(window).width()-500).height($(window).height()-40).val();
	$(".left_Competence_add,.Competence_add_style").height($(window).height()).val();;
	});
/*字数限制*/
function checkLength(which) {
	var maxChars = 200; //
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您出入的字数超多限制!',	
    });
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; //250 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
};
/*按钮选择*/
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
		
	});
});
//添加职务
$('#submit').click(function(){
	var id = [];
	var roles = $('#form-field-1')[0].value;
	var deriction = $('#form_textarea')[0].value;
	//获取权限的id
	for(var i = 0;i<$('.node').length;i++){
		if($($('.node')[i])[0].checked){
			id.push($($('.node')[i])[0].value);
		};
	}
		
	$.ajax({
		//请求方式
		type : "POST",
		//请求地址
		url : "{{ route('AddPowers') }}",
		//数据，json字符串
		data : {'_token':'{{csrf_token()}}','id':id,'roles':roles,'deriction':deriction},
		//请求成功
		success : function(result) {
			console.log(result);
		}
	});
});
</script>
