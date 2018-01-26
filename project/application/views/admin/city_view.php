<div class="inner-block">

<form method="POST" action="country/save_city">	
<div id="div_form" style="visibility:hidden">
	City Name:-<input type="text" name="txt_name">
	Country Name :-<select name="lst_country">
		<?php
			foreach ($countryset->result() as $row )
			{
				echo "<option value=".$row->country_id.">".$row->country_name."</option>";
			}
		?>
	</select>
	State Name :-<select name="lst_state">
		<?php
			foreach ($stateset->result() as $row )
			{
				echo "<option value=".$row->state_id.">".$row->state_name."</option>";
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
      <th>City Id</th>
      <th>City Name</th>
      <th>State Id</th>                                   
                                        
      <th>Edit</th>
      <th>DELETE</th>
	</tr>
</thead>

<?php 

foreach($resultset->result() as $row)
{
	echo "<tr>";
	echo "<td>".$row->city_id."</td>";
	echo "<td>".$row->city_name."</td>";
	echo "<td><span class='label label-success'>".$row->state_id."</span></td>";
	echo "<td><a href='country/edit_country/".$row->city_id."'><span class='label label-info'>Edit</span></a></td>";
	echo "<td><a href='country/delete_country/".$row->city_id."'><span class='label label-danger'>Delete</span></a></td>";
	echo "</tr>";
}
echo "</table>";

?>
</div>
</div>