<form method="POST" action="employee/manage_emp/add">
	<table>
		<tr>
			<td>Enter Employee Name :- </td>
			<td><input type="text" name="txt_ename"></td>
		</tr>
		<tr>
			<td>Enter Employee Salary :- </td>
			<td><input type="text" name="txt_sal"></td>
		</tr>
		<tr>
			<td>Enter Employee Designation :- </td>
			<td><input type="text" name="txt_desg"></td>
		</tr>
		<tr>
			<td>
				<input type="submit">
			</td>
		</tr>
	</table>
</form>
<?php 
echo "<table>";
foreach($resultset->result() as $row)
{
	echo "<tr>";
	echo "<td>".$row->emp_id."</td>";
	echo "<td>".$row->emp_name."</td>";
	echo "<td>".$row->emp_salary."</td>";
	echo "<td>".$row->emp_dsgn."</td>";
	echo "<td><a href='employee/manage_emp/edit/".$row->emp_id."'>Edit</a></td>";
	echo "<td><a href='employee/manage_emp/del/".$row->emp_id."'>Delete</a></td>";
	echo "</tr>";
}
echo "</table>";

?>