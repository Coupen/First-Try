<head>
	 <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 --></head>
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
  a:active {
  	color:green;
  }
</style>

<?php
if(isset($_POST['btn_open']))
{
	//echo "insert";

	//echo "<pre>";
	//print_r($_FILES['file_logo']);
	//echo "</pre>";
	//$src=$_FILES['file_logo']['tmp_name'];
	//$filename=rand(10000,99999)."_".$_FILES['file_logo']['name'];
	//$des="./images/brand/".$filename;
	//echo "Destionation= ".$des."<br>";
	//echo "Source= ".$src."<br>";
	//move_uploaded_file($src, $des);
	//redirect('country_controller/country_crud/do_insert/'.$filename);
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
		window.location.href = "<?php echo base_url(); ?>country_controller/country_crud/do_delete/"+ abc;
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
  		<div class="modal-header">
  			<h5><span class="glyphicon glyphicon-trash"></span> Delete</h5>
  			<button type="button" class="close" action="<?php echo base_url(); ?>country_controller"><a href="<?php echo base_url(); ?>country_controller" class="del">&times;</a></button>
  		</div>
  		<div class="modal-body" id="del_body">
  			<h6>Are you sure, you want to delete?</h6><br>
  		</div>
  		<div class="modal-footer">
  			<button class="btn btn-success btn-sm" style="margin-right: 10px;" onclick="do_delete()"><i class="fa fa-check"></i> Yes</button>
  			<a href="<?php echo base_url(); ?>country_controller"><button class="btn btn-default btn-sm" style="margin-left: 10px;" ><i class="fa fa-times"></i> No</button></a>
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
		Country Update
		<?php 
	}
	else
	{
		?>
		Country Insert
		<?php
	}
		?></h4>
  		<button type="button" class="close" action="<?php echo base_url(); ?>country_controller"><a href="<?php echo base_url(); ?>country_controller" class="del">&times;</a></button>
    	</div>	
    <div class="modal-body" style="padding:40px 50px;">
        
	<form role="form" method="POST" enctype="multipart/form-data"  
	<?php
	if(isset($resultset1))
	{
		?>
		action="<?php echo base_url(); ?>country_controller\country_crud\do_update\<?php echo $row[0]->country_id; ?>" 	
	 	<?php
	}
	else
	{
		?>
		action="<?php echo base_url(); ?>country_controller/country_crud/do_insert"
		<?php
	}
	 ?>>
	<div id="div_form" class="form-group">
	<label for="txt_name"><b>Country Name</b></label>
	<input type="text" class="form-control" name="txt_name" id="txt_name" <?php

	if(isset($resultset1))
	{
		?>
		value="<?php echo $row[0]->country_name; ?>" 
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
	<!--<div id="div_form" class="form-group">
	<label for="file_logo"><b>Brand Logo</b></label>
	<input type="file" class="form-control" name="file_logo" id="file_logo" <?php

	//if(isset($resultset1))
	{
		?>
		value="<?php //echo $row[0]->brand_logo; ?>" 
		<?php 
	}
	//else
	{
		?>
		value = "" 
		<?php
	}
		?>>
	</div>-->
	<div id="div_form" class="form-group">
	<label for="txt_web"><b>Country Code</b></label>
	<input type="text" class="form-control" name="txt_web" id="txt_web" <?php

	if(isset($resultset1))
	{
		?>
		value="<?php echo $row[0]->country_code; ?>" 
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
 		<a href="<?php echo base_url(); ?>country_controller" class="del"><button type="submit" class="btn btn-danger btn-default pull-left" ><span class="glyphicon glyphicon-remove"></span>Cancel</button></a>
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
      <th>Country Id</th>
      <th>Country Name</th>                                  
      <th>Edit</th>
      <th>Delete</th>
	</tr>
</thead>

<?php 

foreach($resultset as $row)
{
	echo "<tr>";
	echo "<td>".$row->country_id."</td>";
	echo "<td>";
	?>
	<a href="<?php echo base_url();?>state_controller/view/<?php echo $row->country_id; ?>">
	<?php
	echo $row->country_name."</a></td>";
	echo "<td>";
	?>
	<a href="<?php echo base_url(); ?>country_controller/country_crud/do_edit/<?php echo $row->country_id; ?>"><button type="button" class="btn btn-default" id="myBtn"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
	<?php
	echo "</td>";
	?>
	<td><button type="button" class="btn btn-danger" id="btn_del" onclick="del_model(<?php echo $row->country_id; ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
	<?php
	echo "</tr>";
}
echo "</table>";

 echo "<center><p style='color:#7FFF00'>".$links."</p></center>";

/*if($current_page!=1)
{
	echo "<a href='country_controller?page_no=".$pre."' style='margin-right:10px;'>"."Previous"."</a>";	
}
//$page_starting_no=1;
//$page_ending_no=10;
for($i=$page_starting_no;$i<=$page_ending_no;$i++)
{
	
		echo "<a href='country_controller?page_no=".$i."' style='margin-right:10px;'>".$i."</a>";
	//if($current_page==10)
//	{
//		$page_starting_no=11;
//		$page_ending_no=20;
		//$page_starting_no=$page_ending_no;
		//$page_ending_no=$page_ending_no+10;
//	}
}
if($current_page!=$no_of_page)
{
	echo "<a href='country_controller?page_no=".$next."' style='margin-right:10px;'>"."Next"."</a>";	
}*/
?>
</div>
</div>
</body>