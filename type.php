<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[type_id])
	{
		$SQL="SELECT * FROM type WHERE type_id = $_REQUEST[type_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
<script>
jQuery(function() {
	jQuery( "#type_dob" ).datepicker({
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
				<h4 class="heading colr"><?=$heading?>Add Property Type</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/type.php" enctype="multipart/form-data" method="post" name="frm_type">
					<ul class="forms">
						<li class="txt">Type Name</li>
						<li class="inputfield"><input name="type_title" id="type_title" type="text" class="bar" required value="<?=$data[type_title]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Type Description</li>
						<li class="inputfield"><input name="type_description" id="type_description" type="text" class="bar" required value="<?=$data[type_description]?>"/></li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_type">
					<input type="hidden" name="avail_image" value="<?=$data[type_image]?>">
					<input type="hidden" name="type_id" value="<?=$data[type_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
