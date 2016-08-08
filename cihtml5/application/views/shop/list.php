

<div class="container">
        
         <div class="row" >
                <div class="col-md-10">
                    <h1>
                        商品分类管理列表
                    </h1>
                        <div class="table-responsive">
                           <table class="table">
                              <caption>商品信息<p class="text-right"><a href="/shop/index">添加分类</a>&nbsp;&nbsp;<a href="/shop/addshop">添加商品</a></p></caption>
                              <thead>
                                 <tr>
                                    <th>选择</th>
                                    <th>分类名称</th>
                                    <th>分类标准</th>
                                    <th>分类路径</th>
                                    <th>操作</th>
                                 </tr>
                              </thead>
                              <tbody id="equi-list">
                                
                                 <?php foreach($data as $key=>$val): ?> 
                                 <tr style="background:rgb(<?php echo rand(200,250).','.rand(220,250).','.rand(220,250); ?>)" >
                                 <td><input type="checkbox" value="<?php echo $val->id;?>"></td>
                                    <td><?php echo $val->name;?></td>
                                    <td><?php echo $val->did;?></td>
                                    <td><?php echo $val->path;?></td>
                                    <td><a href="/shop/index?id=<?php echo $val->id;?>">修改</a>|<span class="label label-warning"  onclick="if(confirm('删除不能恢复，确定删除？')){del(<?php echo $val->id;?>);}else {return false;}"">删除</span></td>
                                 </tr>
                               <?php  endforeach;?>
                              </tbody>
                           </table>
                        </div>  
                     </div>
                  </div> 
                  <input id="all" type="checkbox">点击全选
<div class="pagination">
  <ul>
    <li><a href="#">Prev</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">Next</a></li>
  </ul>
</div>
<script>
   //点击全选
      $("#all").click(function(){
          if(this.checked){
              $("#equi-list :checkbox").each(function(){
                  $(this).prop("checked", true);
              })
          }else{
              $("#equi-list :checkbox").each(function(){
                  $(this).prop("checked", false);
              })
          }
      });
      function del($id)
      {
        $.post("/shop/ajaxdel",{'id':$id},function(data)
        {
          if(data==200)
          {
            alert('恭喜您删除成功');
             window.location.reload();
          }else
          {
            alert('删除失败');
          }
        })
      }

</script>

