<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
?>
<script>
function delete_type(type_id)
{
	if(confirm("Do you want to delete the type?"))
	{
		this.document.frm_type.type_id.value=type_id;
		this.document.frm_type.act.value="delete_type";
		this.document.frm_type.submit();
	}
}
jQuery(document).ready(function() {
	jQuery('#mydatatable').DataTable();
});
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Property Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_type" action="lib/type.php" method="post">
				<div class="static">
				<table class="table table-striped table-advance table-hover"  id="mydatatable" style="color:#000000">
					<thead>
						<tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Type Name</td>
						<td scope="col">Type Description</td>								
						<td scope="col">Action</td>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[type_id]?></td>
						<td><?=$data[type_title]?></td>
						<td><?=$data[type_description]?></td>
						<td style="text-align:center">
							<a href="type.php?type_id=<?php echo $data[type_id] ?>">Edit</a> | <a href="Javascript:delete_type(<?=$data[type_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="type_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
