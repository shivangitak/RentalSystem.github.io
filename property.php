<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[property_id])
	{
		$SQL="SELECT * FROM property WHERE property_id = $_REQUEST[property_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
<script>
jQuery(function() {
	jQuery( "#property_dob" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-25:-10",
	   dateFormat: 'd MM,yy'
	});
});
</script>

	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr"><?=$heading?>Add Property</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/property.php" enctype="multipart/form-data" method="post" name="frm_property">
					<ul class="forms">
						<li class="txt">Property Name</li>
						<li class="inputfield"><input name="property_name" id="property_name" type="text" class="bar" required value="<?=$data[property_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Type</li>
						<li class="inputfield">
							<select name="property_type" class="bar" required/>
								<?php echo get_new_optionlist("property_type","type_id","type_title",$data[property_type]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Status</li>
						<li class="inputfield">
							<select name="property_status" class="bar" required/>
								<?php echo get_new_optionlist("property_status","status_id","status_title",$data[property_status]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Rent</li>
						<li class="inputfield"><input name="property_cost" id="property_cost" type="text" class="bar" required value="<?=$data[property_cost]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Property Size</li>
						<li class="inputfield"><input name="property_size" id="property_size" type="text" class="bar" required value="<?=$data[property_size]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Email</li>
						<li class="inputfield"><input name="property_email" id="property_email" type="text" class="bar" required value="<?=$data[property_email]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Property Contact</li>
						<li class="inputfield"><input name="property_contact" id="property_contact" type="text" class="bar" required value="<?=$data[property_contact]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Property Amenities</li>
						<li class="inputfield"><input name="property_amenities" id="property_amenities" type="text" class="bar" required value="<?=$data[property_amenities]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Property Specifications</li>
						<li class="inputfield"><input name="property_specifications" id="property_specifications" type="text" class="bar" required value="<?=$data[property_specifications]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Property Rooms</li>
						<li class="inputfield"><input name="property_rooms" id="property_rooms" type="text" class="bar" required value="<?=$data[property_rooms]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Property Blacony</li>
						<li class="inputfield"><input name="property_no_balcony" id="property_no_balcony" type="text" class="bar" required value="<?=$data[property_no_balcony]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Property Bathrooms</li>
						<li class="inputfield"><input name="property_no_bathrooms" id="property_no_bathrooms" type="text" class="bar" required value="<?=$data[property_no_bathrooms]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Property Address</li>
						<li class="inputfield"><input name="property_address" id="property_address" type="text" class="bar" required value="<?=$data[property_address]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Property Description</li>
						<li class="inputfield"><input name="property_description" id="property_description" type="text" class="bar" required value="<?=$data[property_description]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Image</li>
						<li class="inputfield"><input name="property_image" type="file" class="bar"/></li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_property">
					<input type="hidden" name="avail_image" value="<?=$data[property_image]?>">
					<input type="hidden" name="property_id" value="<?=$data[property_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
