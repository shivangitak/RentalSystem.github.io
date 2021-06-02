<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `property`, `property_status`, `property_type` WHERE property_status = status_id And property_type = type_id";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_property(property_id)
{
	if(confirm("Do you want to delete the property?"))
	{
		this.document.frm_property.property_id.value=property_id;
		this.document.frm_property.act.value="delete_property";
		this.document.frm_property.submit();
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
			<form name="frm_property" action="lib/property.php" method="post">
				<div class="static">
				<table class="table table-striped table-advance table-hover"  id="mydatatable" style="color:#000000">
					<thead>
						<tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Image</td>
						<td scope="col">Property Name</td>
						<td scope="col">Property Type</td>
						<td scope="col">Property Status</td>
						<td scope="col">Property Cost</td>
						<td scope="col">Property Size</td>
						<td scope="col">Property Rooms</td>
						<td scope="col">Property Contact</td>
						<td scope="col">Email</td>								
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
						<td><?=$data[property_id]?></td>
						<td>
						<a href="property-details.php?property_id=<?php echo $data[property_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[property_image]?>" style="heigh:50px; width:50px"></a></td>
						<td><?=$data[property_name]?></td>
						<td><?=$data[type_title]?></td>
						<td><?=$data[status_title]?></td>
						<td><?=$data[property_cost]?></td>
						<td><?=$data[property_size]?></td>
						<td><?=$data[property_rooms]?></td>
						<td><?=$data[property_contact]?></td>
						<td><?=$data[property_email]?></td>
						<td style="text-align:center">
							<a href="property.php?property_id=<?php echo $data[property_id] ?>">Edit</a> | <a href="Javascript:delete_property(<?=$data[property_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="property_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
