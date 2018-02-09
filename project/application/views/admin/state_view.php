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
if(isset($resultset3))
{
	$row2=$resultset3->result();
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
		window.location.href = "<?php echo base_url(); ?>state_controller/state_crud/do_delete/"+ abc+"/<?php echo $con_id ?>";
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
  			<button type="button" class="close" action="<?php echo base_url(); ?>state_controller"><a href="<?php echo base_url(); ?>state_controller/view/<?php echo $con_id; ?>" class="del">&times;</a></button>
  		</div>
  		<div class="modal-body" id="del_body" style="padding:40px 50px;">
  			<h6>Are you sure, you want to delete?</h6><br>
  		</div>
  		<div class="modal-footer">
  			<button class="btn btn-success btn-sm" style="margin-right: 10px;" onclick="do_delete()"><i class="fa fa-check"></i> Yes</button>
  			<a href="<?php echo base_url(); ?>state_controller/view/<?php echo $con_id; ?>"><button class="btn btn-default btn-sm" style="margin-left: 10px;" ><i class="fa fa-times"></i> No</button></a>
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
		state Update
		<?php 
	}
	else
	{
		?>
		state Insert
		<?php
	}
		?></h4>
  		<button type="button" class="close" action="<?php echo base_url(); ?>state_controller"><a href="<?php echo base_url(); ?>state_controller/view/<?php echo $con_id; ?>" class="del">&times;</a></button>
    	</div>
    <div class="modal-body" style="padding:40px 50px;">
        
	<form role="form" method="POST" enctype="multipart/form-data"  
	<?php
	if(isset($resultset1))
	{
		?>
		action="<?php echo base_url(); ?>state_controller\state_crud\do_update\<?php echo $row[0]->state_id; ?>/<?php echo $con_id; ?>" 	
	 	<?php
	}
	else
	{
		?>
		action="<?php echo base_url(); ?>state_controller/state_crud/do_insert/<?php echo $con_id; ?>"
		<?php
	}
	 ?>>
	<div id="div_form" class="form-group">
	<label for="txt_name"><b>State Name</b></label>
	<input type="text" class="form-control" name="txt_name" id="txt_name" <?php

	if(isset($resultset1))
	{
		?>
		value="<?php echo $row[0]->state_name; ?>" 
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
	<label for="cmb_country"><b>Country Name</b></label>
	<select class="form-control" name="cmb_country" id="cmb_country" onchange="show_state(this.value)" <?php
	if(!isset($resultset1))
	{
		?>
		disabled="disabled"
		<?php
	}
	 ?>>
		<option>------Select Country-------</option>
		<?php
			if(isset($resultset2))
			{
				foreach ($resultset2->result() as $row3) 
				{
					if($row2[0]->country_id==$row3->country_id)
					{?>
						<option value="<?php echo $row3->country_id; ?>" selected><?php echo $row3->country_name; ?></option>
						
						<?php
					}
					else
					{
						?>
					<option value="<?php echo $row3->country_id; ?>"><?php echo $row3->country_name; ?></option>
					<?php
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
 		<a href="<?php echo base_url(); ?>state_controller/view/<?php echo $con_id; ?>" class="del"><button type="submit" class="btn btn-danger btn-default pull-left" ><span class="glyphicon glyphicon-remove"></span>Cancel</button></a>
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
      <th>State Id</th>
      <th>State Name</th>                                        
      <th>Edit</th>
      <th>Delete</th>
	</tr>
</thead>

<?php 

foreach($resultset->result() as $row1)
{
	echo "<tr>";
	echo "<td>".$row1->state_id."</td>";
	echo "<td>";
	?>
	<a href="<?php echo base_url(); ?>city_controller/view/<?php echo $row1->state_id; ?>/<?php echo $con_id; ?>">
	<?php
	echo $row1->state_name."</a></td>";
	echo "<td>";
	?>
	<a href="<?php echo base_url(); ?>state_controller/state_crud/<?php echo $row1->state_id; ?>/<?php echo $con_id ?>"><button type="button" class="btn btn-default" id="myBtn"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
	<?php
	echo "</td>";
	?>
	<td><button type="button" class="btn btn-danger" id="btn_del" onclick="del_model(<?php echo $row1->state_id; ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
	<?php
	echo "</tr>";
}
echo "</table>";

?>
</div>
</div>
</body>