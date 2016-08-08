<style>
.table th, .table td { 
   text-align: center; 
}
</style>
<table class="table">
   <caption>上下文表格布局</caption>
   <thead>
      <tr>
         <th>产品</th>
         <th>付款日期</th>
         <th>状态</th>
      </tr>
   </thead>
   <tbody>
      <tr class="active">
         <td>产品1</td>
         <td>23/11/2013</td>
         <td>待发货</td>
      </tr>
      <tr class="success">
         <td>产品2</td>
         <td>10/11/2013</td>
         <td>发货中</td>
      </tr>
      <tr  class="warning">
         <td>产品3</td>
         <td>20/10/2013</td>
         <td>待确认</td>
      </tr>
      <tr  class="danger">
         <td>产品4</td>
         <td>20/10/2013</td>
         <td>已退货</td>
      </tr>
   </tbody>
</table>
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
                                    <th>产品</th>
                                    <th>付款日期</th>
                                    <th>状态</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>产品1</td>
                                    <td>23/11/2013</td>
                                    <td>待发货</td>
                                 </tr>
                                 <tr>
                                    <td>产品2</td>
                                    <td>10/11/2013</td>
                                    <td>发货中</td>
                                 </tr>
                                 <tr>
                                    <td>产品3</td>
                                    <td>20/10/2013</td>
                                    <td>待确认</td>
                                 </tr>
                                 <?php for($i=0;$i<20;$i++): ?> 
                                 <tr style="background:rgb(<?php echo rand(200,250).','.rand(220,250).','.rand(220,250); ?>)">
                                    <td>产品4</td>
                                    <td>20/10/2013</td>
                                    <td>已退货</td>
                                 </tr>
                               <?php  endfor;?>
                              </tbody>
                           </table>
                        </div>  
                     </div>
                  </div> 
