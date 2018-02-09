<!--<?php
	//if(isset($_GET['$act']))
	{
		?>-->
<form method="post" action="<?php echo base_url(); ?>Category/category_crud">
	<h3><label>Category Form</label></h3>
	<div>
	<label>Category  Name: </label>
	<input  type="text" name="txt_catname" id="txt_catname"><br><br>
	</div>
	<div>
	<label>Category Description: </label>
	<textarea name="text_desc">
		
	</textarea>
	</div>
	<br>
	<div>
		Upload Image :
		<input type="file" name="img_file" id="img_file">
	</div>
	<br>
	<div>
		<label>Status:	</label>	
		<select>
			<option value="active">Active</option>
			<option value="inactive">In-Active</option>/
		</select>
	</div>
	<br>
	<input type="submit" name="btn_submit">
</form>
	<!--<?php
	}?>-->
<a href="Category/index/insert">Add new</a>
<table border=1>
<?php
if(isset($resultset1))
{
foreach($resultset1->result() as $row)
{
	echo "<tr>";
	echo "<td>".$row->category_id."</td>";
	echo "<td>".$row->category_name."</td>";?>
	<td><a href="<?php echo base_url(); ?>Category/crud/do_update/<?php echo $row->category_id; ?>">Delete</a></td>
	<td><a href="<?php echo base_url(); ?>index.php/Category/category_crud">Edit</a></td>
	<?php
	echo "</tr>";
}
} 
?>
</table>