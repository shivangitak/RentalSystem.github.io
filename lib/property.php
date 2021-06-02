<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_property")
	{
		save_property();
		exit;
	}
	if($_REQUEST[act]=="delete_property")
	{
		delete_property();
		exit;
	}
	
	###Code for save property#####
	function save_property()
	{
		global $con;
		$R=$_REQUEST;		
		/////////////////////////////////////
		$image_name = $_FILES[property_image][name];
		$location = $_FILES[property_image][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}				
		if($R[property_id])
		{
			$statement = "UPDATE `property` SET";
			$cond = "WHERE `property_id` = '$R[property_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `property` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`property_name` = '$R[property_name]',
				`property_type` = '$R[property_type]',
				`property_status` = '$R[property_status]', 
				`property_cost` = '$R[property_cost]', 
				`property_size` = '$R[property_size]', 
				`property_contact` = '$R[property_contact]',  
				`property_email` = '$R[property_email]',
				`property_amenities` = '$R[property_amenities]',
				`property_specifications` = '$R[property_specifications]', 
				`property_image` = '$image_name',
				`property_rooms` = '$R[property_rooms]', 
				`property_address` = '$R[property_address]',
				`property_no_balcony` = '$R[property_no_balcony]', 
				`property_no_bathrooms` = '$R[property_no_bathrooms]', 
				`property_description` = '$R[property_description]'".
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../property-report.php?msg=$msg");
	}
#########Function for delete property##########3
function delete_property()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM property WHERE property_id = $_REQUEST[property_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../property-report.php?msg=Deleted Successfully.");
}
?>
