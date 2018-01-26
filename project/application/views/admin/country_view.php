<div class="inner-block">

<form method="POST" action="country/save_country">	
<div id="div_form" style="visibility:hidden">
	Name:-<input type="text" name="txt_name">
	Code :-<input type="text" name="txt_code">
<input type="submit" disabled="disable">
</div>
<input type="button" name="btn_open" id="btn_open" value="insert">
</form>

<div class="table-responsive">
    <table class="table table-hover">
<thead>
    <tr>
      <th>Country Id</th>
      <th>Country Name</th>
      <th>Country Code</th>                                   
                                        
      <th>Edit</th>
      <th>DELETE</th>
	</tr>
</thead>

<?php 

foreach($resultset->result() as $row)
{
	echo "<tr>";
	echo "<td>".$row->country_id."</td>";
	echo "<td>".$row->country_name."</td>";
	echo "<td><span class='label label-success'>".$row->country_code."</span></td>";
	echo "<td><a href='country/edit_country/".$row->country_id."'><span class='label label-info'>Edit</span></a></td>";
	echo "<td><a href='country/delete_country/".$row->country_id."'><span class='label label-danger'>Delete</span></a></td>";
	echo "</tr>";
}
echo "</table>";

?>
</div>
</div>