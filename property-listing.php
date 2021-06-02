<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `property`, `property_type`, `property_status` WHERE property_status = status_id AND property_type = type_id";
	if($_REQUEST['area']) {
		$SQL="SELECT * FROM `property`, `property_type`, `property_status` WHERE property_status = status_id AND property_type = type_id AND property_address LIKE '%".$_REQUEST['area']."%'";
	}
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<style>
.static table {
	width:280px !important; 
	float:left;
}
</style>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<form name="frm_property" action="#" method="post">
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">All Registered Property</h4>
			<div class="contact" style="border:1px solid #000000; margin-bottom:20px;">
				<table width="50%">
					<tr height="40px;">
						<th>Search Property :</th>
						<th>
							<input type="text" placeholder="Enter Area Name" class="search_text" name="area"> 
							<input type="Submit" value="Search Property"  class="simplebtn">
						</th>
					</tr>
				</table>
			</div>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
				<div class="static">
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					<table>
					<tr>
						<td><a href="property-details.php?property_id=<?php echo $data[property_id] ?>"></a></td>
						<td style="vertical-align:top">
							<table border="0">
								<tr>
									<td class="tdheading">Name</th>
									<td><?=$data[property_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">Property Type</th>
									<td><?=$data[type_title]?></td>
								</tr>
								<tr>
									<td class="tdheading">Property Status</th>
									<td><?=$data[status_title]?></td>
								</tr>
								<tr>
									<td class="tdheading">Rent</th>
									<td><?=$data[property_cost]?></td>
								</tr>
								<tr>
									<td class="tdheading">Address</th>
									<td><?=$data[property_address]?></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:center; padding:12px;">
										<a href="property-details.php?property_id=<?php echo $data[property_id] ?>" class="button-link">View Details</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					</table>
					<?php } ?>					
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="property_id" />
			
		</div>
		</div>
	</div>
	</form>
<?php include_once("includes/footer.php"); ?> 
