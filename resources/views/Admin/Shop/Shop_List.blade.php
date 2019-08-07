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
        <script src="js/lrtk.js" type="text/javascript" ></script>	         	
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="js/H-ui.js" type="text/javascript"></script>
        <script src="js/displayPart.js" type="text/javascript"></script>
<title>文章管理</title>
</head>

<body>
<div class="clearfix">
 <div class="article_style" id="article_style">
          <div id="scrollsidebar" class="left_Treeview">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="widget-box side_content" >
    <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
     <div class="side_list">
      <div class="widget-header header-color-green2">
          <h4 class="lighter smaller">店铺分类</h4>
      </div>
      <div class="widget-body">
         <ul class="b_P_Sort_list">
             <li><i class="orange  fa fa-list "></i><a href="#">全部(235)</a></li>
             <li><i class="fa fa-shopping-bag pink "></i> <a href="#">食品类(5)</a></li>
             <li> <i class="fa fa-shopping-bag pink "></i> <a href="#">保健品类(3)</a> </li>
             <li> <i class="fa fa-shopping-bag pink "></i> <a href="#">数码产品(3)</a></li>
             <li> <i class="fa fa-shopping-bag pink "></i> <a href="#">生活百货(3)</a></li>
             <li> <i class="fa fa-shopping-bag pink "></i> <a href="#">床上用户(33)</a></li>
         </ul>
  </div>
  </div>
  </div>  
  </div>
 <!--文章列表-->
 <div class="Ads_list">
 <div class="search_style">
     
      <ul class="search_content clearfix">
 <li><label class="l_f">报表类型</label><select name="" style=" width:150px"><option>--选择报表类型--</option></select></li>
       <li><label class="l_f">信息来源</label><input name="" type="text" class="text_add" placeholder="信息来源" style=" width:150px"></li>
       <li><label class="l_f">咨询方式</label><input name="" type="text" class="text_add" placeholder="咨询方式" style=" width:150px"></li>
       <li><label class="l_f">校区</label><input name="" type="text" class="text_add" placeholder="校区" style=" width:200px"></li>
       <li><label class="l_f">添加时间</label><input class="inline laydate-icon" id="start" style=" margin-left:10px;"></li>
       <li style="width:90px;"><button type="button" class="btn_search"><i class="fa fa-search"></i>查询</button></li>
      </ul>
    </div>
     <div class="article_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
       <thead>
		 <tr>
                <th width="80px">排序</th>
				<th width="180">店铺名称</th>
				<th width="">简介</th>
				<th width="150px">添加时间</th>
                <th width="100px">审核状态</th>                
				<th width="150px">操作</th>
			</tr>
		</thead>
        <tbody>
          @foreach($data as $k=>$v)
         <tr>
          <td>{{$v->id}}</td>
          <td>{{$v->sname}}</td>
          <td class="displayPart" displayLength="60">{{$v->intro}}</td>
          <td>2019-08-06 07:40:00</td>
          <td>{{$v->audit==1?'通过':'未通过'}}</td>
          <td class="td-manage">        
           <a title="删除" href="javascript:;" onclick='member_del(this,"{{$v->id}}")'  class="btn btn-xs btn-danger" ><i class="fa fa-trash  bigger-120"></i></a>
          </td>
         @endforeach
        </tbody>
       </table>    
     </div>
 </div>
 </div>
</div>
</body>
</html>
<script>
$(function () {  
        $(".displayPart").displayPart();  
   });
   laydate({
    elem: '#start',
    event: 'focus' 
});
 //面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('#add_page').on('click', function(){
	var cname = $(this).attr("title");
	var chref = $(this).attr("href");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe').html(cname);
    parent.$('#iframe').attr("src",chref).ready();;
	parent.$('#parentIframe').css("display","inline-block");
	parent.$('.Current_page').attr({"name":herf,"href":"javascript:void(0)"}).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+" class='iframeurl'>" + cnames + "</a>");
    parent.layer.close(index);
	
}); 
$(function() {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,7,8]}// 制定列不参与排序
		] } );
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
})

 $(function() { 
	$("#article_style").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		stylewidth:'220',
		spacingw:30,//设置隐藏时的距离
	    spacingh:250,//设置显示时间距
		set_scrollsidebar:'.Ads_style',
		table_menu:'.Ads_list'
	});
});
//初始化宽度、高度  
 $(".widget-box").height($(window).height()); 
 $(".Ads_list").width($(window).width()-220);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".widget-box").height($(window).height());
	 $(".Ads_list").width($(window).width()-220);
});

/*文章-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',{icon:0,},function(index){

    
    $.ajax({
           url:"Shop_List/del/"+id, //你的路由地址
           type:"get",
           success:function(data){
            if(data == "1"){
             $(obj).parents("tr").remove();
             layer.msg('已删除!',{icon:1,time:1000});
            }else{
             layer.msg('删除失败!',{icon:2,time:1000});
           }
            }
        });
		
    // location.href="Shop_List/del/sid";
	});
}

</script>
