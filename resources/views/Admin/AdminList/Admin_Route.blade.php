<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>       
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>           	
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="js/dragDivResize.js" type="text/javascript"></script>
<title>权限管理</title>
</head>

<body>
<div class="Competence_add_style clearfix">
  <div class="left_Competence_add">
   <div class="title_name">权限管理</div>
    <div class="Competence_add">
	<div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 分类类型 </label>
		<div class="col-sm-9">
			{{-- <input type="text" id="form-field-1" placeholder=""  name="权限名称" class="col-xs-10 col-sm-5"> --}}
			<select  name="" id="node_type">
				<option value="0" selected>大分类</option>
				<option value="1">小分类</option>
			</select>
		</div>
	</div>
	<form id="big_type" action="{{ route('AddNodeType') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限名称 </label>
			<div class="col-sm-9"><input type="text" id="form-field-1" placeholder=""  name="nodetype" class="col-xs-10 col-sm-5"></div>
		</div>
		<!--按钮操作-->
		<div class="Button_operation">
			<button onclick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i> 保存并提交</button>
			<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
		</div>
	</form>
	<form style="display:none" id="small_type" action="{{ route('Node') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 所属分类 </label>
			<div class="col-sm-9">
				{{-- <input type="text" id="form-field-1" placeholder=""  name="权限名称" class="col-xs-10 col-sm-5"> --}}
				<select  name="node_type_id" id="node_type">
					@foreach($res as $k => $v)
					<option value="{{ $v['id'] }}" selected>{{ $v['nodetype'] }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限名称 </label>
			<div class="col-sm-9"><input type="text" id="form-field-1" placeholder=""  name="node_name" class="col-xs-10 col-sm-5"></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 功能 </label>
		<div class="col-sm-9">
		<label class="middle"><input class="ace" name="function[]" value="查看" type="checkbox" id="id-disable-check cha"><span class="lbl">查看</span></label>
		<label class="middle">
			<input class="ace" name="c_controller" type="text" id="form-field-1" class="col-xs-10 col-sm-5" placeholder="请输入控制器名" >
			<input class="ace" name="c_method" type="text" id="form-field-1" class="col-xs-10 col-sm-5" placeholder="请输入方法名" >
			</label>
			<label class="middle"><input class="ace" name="function[]" value="添加" type="checkbox" id="id-disable-check tian"><span class="lbl">添加</span></label>
			<label class="middle">
				<input class="ace" name="t_controller" type="text" id="form-field-1" class="col-xs-10 col-sm-5" placeholder="请输入控制器名" >
				<input class="ace" name="t_method" type="text" id="form-field-1" class="col-xs-10 col-sm-5" placeholder="请输入方法名" >
			</label>
			<label class="middle"><input class="ace" name="function[]" value="修改" type="checkbox" id="id-disable-check xiu"><span class="lbl">修改</span></label>
		<label class="middle">
			<input class="ace" name="x_controller" type="text" id="form-field-1" class="col-xs-10 col-sm-5" placeholder="请输入控制器名" >
			<input class="ace" name="x_method" type="text" id="form-field-1" class="col-xs-10 col-sm-5" placeholder="请输入方法名" >
			</label>
			<label class="middle"><input class="ace" name="function[]" value="删除" type="checkbox" id="id-disable-check shan"><span class="lbl">删除</span></label>
		<label class="middle">
			<input class="ace" name="s_controller" type="text" id="form-field-1" class="col-xs-10 col-sm-5" placeholder="请输入控制器名" >
			<input class="ace" name="s_method" type="text" id="form-field-1" class="col-xs-10 col-sm-5" placeholder="请输入方法名" >
			</label>
		</div>   
	</div>
	<div class="Button_operation">
			<button onclick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i> 保存并提交</button>
			<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
		</div>
	</form>
   
   

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
								<label class="middle"><input type="checkbox" value="" class="ace" name="user-Character-0-0-0" id="user-Character-0-0-0"><span class="lbl">{{ $val['node_name'] }}</span></label>
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

//分类类型
$('#node_type').change(function(){
	var type_val = $('#node_type').val();

	if(type_val == 0){
		//添加大分类
		$('#big_type').css('display','block');
		$('#small_type').css('display','none');

	}else if(type_val == 1){
		//添加小分类
		$('#big_type').css('display','none');
		$('#small_type').css('display','block');
	}
});


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

</script>
