<?php 
$row=$resultset->result();
?>
<form method="POST" action="<?php echo base_url(); ?>employee/manage_emp/edit/do_edit/<?php echo $row[0]->emp_id; ?>">
	<table>
		<tr>
			<td>Enter Employee Name :- </td>
			<td><input type="text" name="txt_ename" value="<?php echo $row[0]->emp_name; ?>"></td>
		</tr>
		<tr>
			<td>Enter Employee Salary :- </td>
			<td><input type="text" name="txt_sal" value="<?php echo $row[0]->emp_salary; ?>"></td>
		</tr>
		<tr>
			<td>Enter Employee Designation :- </td>
			<td><input type="text" name="txt_desg" value="<?php echo $row[0]->emp_dsgn; ?>"></td>
		</tr>
		<tr>
			<td>
				<input type="submit">
			</td>
		</tr>
	</table>
</form>