<?php function main() { 
    $mainObj = new MainClass;
    ?>
<div class="row">
<style>
 .treeview .list-group-item{cursor:pointer}.treeview span.indent{margin-left:10px;margin-right:10px}.treeview span.icon{width:12px;margin-right:5px}.treeview .node-disabled{color:silver;cursor:not-allowed}.node-treeview2{}.node-treeview2:not(.node-disabled):hover{background-color:#F5F5F5;} 
</style>
<div id="treeview2" class="treeview">
   <ul class="list-group">
      <li class="list-group-item node-treeview2" data-nodeid="0" style="color:undefined;background-color:undefined;"><span class="icon expand-icon glyphicon glyphicon-plus"></span><span class="icon node-icon"></span>Parent 1</li>
      <li class="list-group-item node-treeview2" data-nodeid="5" style="color:undefined;background-color:undefined;"><span class="icon glyphicon"></span><span class="icon node-icon"></span>Parent 2</li>
      <li class="list-group-item node-treeview2" data-nodeid="6" style="color:undefined;background-color:undefined;"><span class="icon glyphicon"></span><span class="icon node-icon"></span>Parent 3</li>
      <li class="list-group-item node-treeview2" data-nodeid="7" style="color:undefined;background-color:undefined;"><span class="icon glyphicon"></span><span class="icon node-icon"></span>Parent 4</li>
      <li class="list-group-item node-treeview2" data-nodeid="8" style="color:undefined;background-color:undefined;"><span class="icon glyphicon"></span><span class="icon node-icon"></span>Parent 5</li>
   </ul>
</div>
</div>
<?php } include 'admin_template.php';?>