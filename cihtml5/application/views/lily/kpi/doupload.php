<style>
.table th, .table td { 
   text-align: center; 
}
</style>
<div class="container">
         <div class="row">
                <div class="col-md-10">
                    <h1>
                        表格（内容居中）
                    </h1>
                        <div class="table-responsive">
                           <table class="table">
                              <caption>响应式表格布局</caption>
                              <thead>
                                 <tr>
                                    <th>姓名</th>
                                    <th>kpi</th>
                                    <th>状态</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach($repeat as $key =>$val): ?> 
                                 <tr style="background:rgb(<?php echo rand(200,250).','.rand(220,250).','.rand(220,250); ?>)">
                                    <td><?php echo $val['name'];?></td>
                                    <td><?php echo $val['kpi'];?></td>
                                    <td>姓名重复请重新录入</td>
                                 </tr>
                               <?php  endforeach;?>
                                 <?php foreach($fail as $key =>$val): ?> 
                                 <tr style="background:rgb(<?php echo rand(200,250).','.rand(220,250).','.rand(220,250); ?>)">
                                    <td><?php echo $val->username;?></td>
                                    <td><?php echo $val->kpi;?></td>
                                    <td>导入失败</td>
                                 </tr>
                               <?php  endforeach;?>
                                <?php foreach($exits as $key =>$val): ?> 
                                 <tr style="background:rgb(<?php echo rand(200,250).','.rand(220,250).','.rand(220,250); ?>)">
                                    <td><?php echo $val->cnname;?></td>
                                    <td><?php echo $val->kpi;?></td>
                                    <td>已导入</td>
                                 </tr>
                               <?php  endforeach;?>
                              </tbody>
                           </table>
                        </div>  
                     </div>
                  </div> 
