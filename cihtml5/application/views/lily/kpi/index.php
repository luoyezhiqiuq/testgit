<!-- <form method="post" action="/kpi/upload" enctype="multipart/form-data">
         <h3>导入Excel表：</h3><input  type="file" name="file" />

           <input type="submit"  value="导入" />
</form>

<span style="background:#ccc;" ><a style="font-weight:bold;"  href="http://img.lilyenglish.com/help/teacher_bank.xls">下载模板文件</a></span>


   <form id="" name="form1"  method="post"  enctype="multipart/form-data" style="width: 100%;height: auto;" >
   <input id="excel" name="excel" type="file" />
   <input type="button" value="导入excel"  style="font-weight: 600;" onclick="submitform('addexcel')"/>  
   </form> 
   
<div class="clear"></div>
</div>
</div> -->
	<div class="container">
         <div class="row">
         <div class="col-md-10">
		<form   method="post" action="/kpi/uploadmulu"  enctype="multipart/form-data" style="width: 100%;height: auto;" >
			<div class="form-group">
			    <label for="name">操作者姓名</label>
			    <input type="text" class="form-control" id="name" 
			      name="author" placeholder="请输入操作者姓名">
			</div>
			<div class="form-group">
			    <label for="name">请输入操作者id</label>
			    <input type="text" class="form-control" id="name" 
			       placeholder="请输入操作者id" name="authorid">
			</div>
			<div class="form-group">
			    <label for="name">请输入月份</label>
			    <input type="text" class="form-control" id="name" 
			       placeholder="示例:2016年06月" name="month">
			</div>
			 <div class="form-group">
			 <label for="name">请选择类型</label>
		      <select class="form-control input-lg" name="type">
		         <option value="2">教师</option>
		         <option value="1">员工</option>
		      </select>
		   </div>
			<input type="file" name="userfile" size="20" />
			<input type="submit" value="upload" />
		</form>
		</div>
		</div>
		</div>
<script>
  function submitform(obj){
       if(obj=="addexcel"){
           file=document.getElementById('excel').value;
           if(file!=""){
               document.form1.action="/kpi/doupload/"+obj;
               document.form1.submit();
            }
            else{
               alert("请注意：你还没有选择任何要导入的excel文件！");  
            }
       }   
  }
</script>