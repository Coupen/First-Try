<?php 
$row=$resultset->result();
?>
<form method="post" action="<?php echo base_url(); ?>country/edit_country/do_update/<?php echo $row[0]->country_id; ?>">
name:<input type="text" name="txt_name" value="<?php echo $row[0]->country_name; ?>">
Code:<input type="text" name="txt_code" value="<?php echo $row[0]->country_code; ?>">
<input type="submit">
</form>