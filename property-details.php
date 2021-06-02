<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[property_id])
	{
		$SQL="SELECT * FROM property, property_type, property_status WHERE property_type = type_id AND property_status = status_id AND property_id = $_REQUEST[property_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 

	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr"><?=$data[property_name]?> Property Details</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<div id="myrow">
					
				<table>
		
						<tr>
							<th>Property Name</th>
							<td><?=$data[property_name]?></td>
						</tr>
						<tr>
							<th>Property Type</th>
							<td><?=$data[type_title]?></td>
						</tr>
						<tr>
							<th>Property Staus</th>
							<td><?=$data[status_title]?></td>
						</tr>
						<tr>
							<th>Size</th>
							<td><?=$data[property_size]?></td>
						</tr>
						<tr>
							<th>Rent</th>
							<td><?=$data[property_cost]?></td>
						</tr>
						<tr>
						<tr>
							<th>Email</th>
							<td><?=$data[property_email]?></td>
						</tr>
						<tr>	
							<th>Phone</th>
							<td><?=$data[property_contact]?></td>
						</tr>
						<tr>
							<th>Amenities</th>
							<td><?=$data[property_amenities]?></td>
						</tr>
						<tr>
							<th>Specifications</th>
							<td><?=$data[property_specifications]?></td>
						</tr>
						<tr>
							<th>Balcony</th>
							<td><?=$data[property_no_balcony]?></td>
						</tr>
						<tr>
							<th>Bathrooms</th>
							<td><?=$data[property_no_bathrooms]?></td>
						</tr>
						<tr>
							<th>Rooms</th>
							<td><?=$data[property_rooms]?></td>
						</tr>
						<tr>
							<th>Address</th>
							<td><?=$data[property_address]?></td>
						</tr>
						<tr>
							<th>Description</th>
							<td><?=$data[property_description]?></td>
						</tr>
					
					</table>
			</div>
			</div>
		</div>
		<div class="col2">
			<h4 class="heading colr">Property <?=$data['property_name']?></h4>
			<div><img src="<?=$SERVER_PATH.'uploads/'.$data[property_image]?>" style="width: 250px"></div><br>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
