
<style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .del:hover{
  	color:white;
  }
  .del:link{
  	color:white;
  }
  .del:visited{
  	color:white;
  }
  .del:active{
  	color:white;
  }
</style>

<?php
if(isset($_POST['btn_open']))
{
	//echo "insert";

	echo "<pre>";
	print_r($_FILES['file_img']);
	echo "</pre>";
	$src=$_FILES['file_img']['tmp_name'];
	$filename=rand(10000,99999)."_".$_FILES['file_img']['name'];
	$des="./images/subcat/".$filename;
	echo "Destionation= ".$des."<br>";
	echo "Source= ".$src."<br>";
	move_uploaded_file($src, $des);
	redirect('subcat_controller/subcat_crud/do_insert/'.$filename);
}
if(isset($resultset1))
{
	$row=$resultset1->result();
?>
<script>
$(document).ready(function(){
	$("#edit").modal();
    $("#myBtn").click(function(){
        $("#edit").modal();
    });
});
</script>
<?php
}
?>
<script type="text/javascript">
	var abc;
	function do_delete()
	{	
		window.location.href = "<?php echo base_url(); ?>subcat_controller/subcat_crud/do_delete/"+ abc;
	}
	function del_model($del)
	{
	 abc=$del;
        $("#delete").modal();
	}
</script>
<body>
<div class="container">
	<div class="modal fade" role="dialog" id="delete">
  <div class="modal-dialog model-sm">
  <div class="modal-content">
  		<div class="modal-header" style="padding:35px 50px;">
  			<h5><span class="glyphicon glyphicon-trash"></span> Delete</h5>
  			<button type="button" class="close" action="<?php echo base_url(); ?>subcat_controller"><a href="<?php echo base_url(); ?>subcat_controller" class="del">&times;</a></button>
  		</div>
  		<div class="modal-body" id="del_body" style="padding:40px 50px;">
  			<h6>Are you sure, you want to delete?</h6><br>
  		</div>
  		<div class="modal-footer">
  			<button class="btn btn-success btn-sm" style="margin-right: 10px;" onclick="do_delete()"><i class="fa fa-check"></i> Yes</button>
  			<a href="<?php echo base_url(); ?>subcat_controller"><button class="btn btn-default btn-sm" style="margin-left: 10px;" ><i class="fa fa-times"></i> No</button></a>
  		</div>
  		</div>
  	</div>
  </div>
<div class="modal fade" role="dialog" id="edit">
  <div class="modal-dialog">
  <div class="modal-content">
  		<div class="modal-header" style="padding:35px 50px;">
  			<h4><span class="glyphicon glyphicon-lock"></span>
  			<?php

	if(isset($resultset1))
	{
		?>
		subcat Update
		<?php 
	}
	else
	{
		?>
		subcat Insert
		<?php
	}
		?></h4>
  		<button type="button" class="close" action="<?php echo base_url(); ?>subcat_controller"><a href="<?php echo base_url(); ?>subcat_controller" class="del">&times;</a></button>
    	</div>
    <div class="modal-body" style="padding:40px 50px;">
        
	<form role="form" method="POST" enctype="multipart/form-data"  
	<?php
	if(isset($resultset1))
	{
		?>
		action="<?php echo base_url(); ?>subcat_controller\subcat_crud\do_update\<?php echo $row[0]->subcat_id; ?>" 	
	 	<?php
	}
	else
	{
		?>
		action="<?php echo base_url(); ?>subcat_controller/subcat_crud/do_insert"
		<!--action = #-->
		<?php
	}
	 ?>	
	<div id="div_form" class="form-group">
	<label for="txt_name"><b>SubCatehory Name</b></label>
	<input type="text" class="form-control" name="txt_name" id="txt_name" <?php

	if(isset($resultset1))
	{
		?>
		value="<?php echo $row[0]->subcat_name; ?>" 
		<?php 
	}
	else
	{
		?>
		value = "" 
		<?php
	}
		?>>
	</div>
	<div id="div_form" class="form-group">
	<label for="file_logo"><b>SubCategory Image</b></label>
	<input type="file" class="form-control" name="file_img" id="file_img" <?php

	if(isset($resultset1))
	{
		?>
		value="<?php echo $row[0]->subcat_img; ?>" 
		<?php 
	}
	else
	{
		?>
		value = "" 
		<?php
	}
		?>>
	</div>
	<div id="div_form" class="form-group">
	<label for="txt_web"><b>SubCategory Description</b></label>
	<input type="text" class="form-control" name="txt_desc" id="txt_desc" <?php

	if(isset($resultset1))
	{
		?>
		value="<?php echo $row[0]->subcat_desc; ?>" 
		<?php 
	}
	else
	{
		?>
		value = "" 
		<?php
	}
		?>>
</div>
	<div id="div_form" class="form-group">
	<label for="txt_cont_per"><b>SubCategory Status</b></label>
		<input type="radio" class="form-control" name="rdo_status" id="rdo_status" value="active"
		<?php

	if(isset($resultset1))
	{
		if(row[0]->subcat_status =="active" )
		{
			echo "checked";
		}
	}
		?>>Active 
	<label for="txt_cont_per"><b>subCat Status</b></label>
		<input type="radio" class="form-control" name="rdo_status" id="rdo_status" value="inactive"
		<?php

	if(isset($resultset1))
	{
		if(row[0]->subcat_status =="inactive" )
		{
			echo "checked";
		}
	}
		?>>InActive
	
	</div>
	<div id="div_form" class="form-group">
	<label for="txt_name"><b>Category Name</b></label>
	<select class="form-control" name="cmb_category" id="cmb_category" >
	
	<option>-------Select Category---------</option>
	<?php
		if(isset($resultset2))
		{
			foreach ($resultset2->result() as $row) 
			{
				if(isset($resultset1))
				{
					if($row->category->id == $category_id)
					{
						?>
						<option value="<?php echo $row->category_id; ?>" selected><?php echo $row->category_name; ?></option>
						<?php
					}
					else
					{	?>
						<option value="<?php echo $row->category_id; ?>" selected><?php echo $row->category_name; ?></option>
						<?php
					}

				}
			}
		}
	?>
	</select>
	</div>
	<input type="submit" name="btn_open" id="btn_open" class="btn btn-success btn-block" 
<?php

	if(isset($resultset1))
	{
		?>
		value="Update" 
		<?php 
	}
	else
	{
		?>
		value = "Insert" 
		<?php
	}
		?>>
</form>
	</div>
 <div class="modal-footer">
 		<button type="submit" class="btn btn-danger btn-default pull-left" ><span class="glyphicon glyphicon-remove"></span><a href="<?php echo base_url(); ?>subcat_controller" class="del">Cancel</a></button>
 </div>
      
</div>
</div>
</div>
</div>
<div class="inner-block">
<div class="table-responsive">
	<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#edit"><i class="fa fa-plus"></i>  Record</button><br><br>
    <table class="table table-hover">
<thead>
    <tr>
      <th>SubCategory Id</th>
      <th>SubCategory Name</th>
      <th>SubCategory Image</th>                                   
      <th>SubCategor Description</th>                                   
      <th>SubCategory Status</th>
      <th>Category Name</th>                                   
                                        
      <th>Edit</th>
      <th>Delete</th>
	</tr>
</thead>

<?php 

foreach($resultset->result() as $row)
{
	echo "<tr>";
	echo "<td>".$row->subcat_id."</td>";
	echo "<td>".$row->subcat_name."</td>";
	?>
	<td>
	<img src="../images/subcat/<?php echo $row->subcat_img; ?>" hight="100" width='100'/>
	</td>
	<?php
	echo "<td>".$row->subcat_desc."</td>";
	echo "<td>".$row->subcat_status."</td>";
	echo "<td>".$row->category_name."</td>";
	
	echo "<td>";
	?>
	<a href="<?php echo base_url(); ?>subcat_controller/subcat_crud/<?php echo $row->subcat_id; ?>"><button type="button" class="btn btn-default" id="myBtn"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
	<?php
	echo "</td>";
	?>
	<td><button type="button" class="btn btn-danger" id="btn_del" onclick="del_model(<?php echo $row->subcat_id; ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
	<?php
	echo "</tr>";
}
echo "</table>";

?>
</div>
</div>
<button onclick="do_delete()"></button>
</body>