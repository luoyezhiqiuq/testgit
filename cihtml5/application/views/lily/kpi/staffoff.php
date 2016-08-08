<\(^o^)/~>

<span><a href="http://www.cihtml.com/public/xiazai/kpi_blank.xls">下载模板导入功能</a></span>
	<div class="container">
         <div class="row">
         <div class="col-md-10">
		<form   method="post" action="/kpi/staffdooff"  enctype="multipart/form-data" style="width: 100%;height: auto;" >
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
			<input type="file" name="excel" size="20" />
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
               document.form1.action="/kpi/staffdooff/"+obj;
               document.form1.submit();
            }
            else{
               alert("请注意：你还没有选择任何要导入的excel文件！");  
            }
       }   
  }
</script>