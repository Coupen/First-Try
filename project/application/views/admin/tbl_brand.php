<table>
<?php
	?>
	<tr>
	<?php
	foreach ($resultset->result() as $row) {
		echo "<td>".$row->brand_id."</td>";
		echo "<td>".$row->brand_contact_person."</td>";
	}
	?>
	<tr>
	<?php
?>
</table>