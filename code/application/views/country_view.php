<form method="POST" action="country/save_country">
	Name:-<input type="text" name="txt_name">
	Code :-<input type="text" name="txt_code">
<input type="submit" >
</form>
<?php 
echo "<table>";
foreach($resultset->result() as $row)
{
	echo "<tr>";
	echo "<td>".$row->country_id."</td>";
	echo "<td>".$row->country_name."</td>";
	echo "<td>".$row->country_code."</td>";
	echo "<td><a href='country/edit_country/".$row->country_id."'>Edit</a></td>";
	echo "<td><a href='country/delete_country/".$row->country_id."'>Delete</a></td>";
	echo "</tr>";
}
echo "</table>";

?>