<div class="inner-block">

<form method="POST" action="country/save_state">	
<div id="div_form" style="visibility:hidden">
	Name:-<input type="text" name="txt_name">
	Country Name :-<select name="lst_country">
		<?php
			foreach ($countryset->result() as $row )
			{
				echo "<option value=".$row->country_id.">".$row->country_name."</option>";
			}
		?>
	</select>
<input type="submit" disabled="disable">
</div>
<input type="button" name="btn_open" id="btn_open" value="insert">
</form>

<div class="table-responsive">
    <table class="table table-hover">
<thead>
    <tr>
      <th>State Id</th>
      <th>State Name</th>
      <th>Country Id</th>                                   
                                        
      <th>Edit</th>
      <th>DELETE</th>
	</tr>
</thead>

<?php 

foreach($resultset->result() as $row)
{
	echo "<tr>";
	echo "<td>".$row->state_id."</td>";
	echo "<td>".$row->state_name."</td>";
	echo "<td><span class='label label-success'>".$row->country_id."</span></td>";
	echo "<td><a href='country/edit_country/".$row->state_id."'><span class='label label-info'>Edit</span></a></td>";
	echo "<td><a href='country/delete_country/".$row->state_id."'><span class='label label-danger'>Delete</span></a></td>";
	echo "</tr>";
}
echo "</table>";

?>
</div>
</div>