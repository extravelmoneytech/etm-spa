<?php
//upload.php
session_start();
$allowed = array('jpg','jpeg','png','pdf');

$check_id = (int)$_SESSION["uuid"];
if(!$check_id)
$check_id = (int)$_SESSION["userid"];

include '../../includes/kyc-func.php';

function genPdfThumbnail($source, $target)
	{
		
		//$source = realpath($source);
		$target = dirname($source).DIRECTORY_SEPARATOR.$target;
		$im     = new Imagick($source."[0]"); // 0-first page, 1-second page
		$im->setImageColorspace(255); // prevent image colors from inverting
		$im->setimageformat("jpeg");
		$picsize = $im->getImageGeometry();
		$im->thumbnailimage($picsize['width'], $picsize['height']); // width and height
		$im->writeimage($target);
		$im->clear();
		$im->destroy();
	}

if($_FILES["file"]["name"] != '')
{
	$file_type = $_POST['file_type'];
	$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	
	if(!in_array(strtolower($extension), $allowed)){
	//	echo '{"status":"error"}';
		exit;
	}
	else
	{
		
		 $thumb_random_name = bin2hex(random_bytes(12));
		 $file_random_name=bin2hex(random_bytes(12));
		 $test = explode('.', $_FILES["file"]["name"]);
		 $ext = end($test);
		 $ext=strtolower($ext);
		 $name = $file_random_name.'.'.$ext;
		 $location = $pre_loc.'uploads/' . $check_id.'/'.$file_type.'/'.$name;
		 
		 
		 
		 $thumb_loc = $pre_loc.'uploads/' . $check_id.'/'.$file_type.'/'.$name; //File to convert into thumbnail image
		 $thumb_loc_act = $pre_loc.'uploads/thumb/' . $check_id.'/'.$file_type.'/'.$thumb_random_name.'.jpg'; //thumbnail location
		 
			if (!file_exists($pre_loc.'uploads/'.$check_id.'/'.$file_type)) {
				mkdir($pre_loc.'uploads/'.$check_id.'/'.$file_type, 0777, true);
			}
			
			if (!file_exists($pre_loc.'uploads/thumb/'.$check_id.'/'.$file_type)) {
				mkdir($pre_loc.'uploads/thumb/'.$check_id.'/'.$file_type, 0777, true);
			}
			
			//Delete all the existing files inside directory
			$files = glob($pre_loc.'uploads/'.$check_id.'/'.$file_type.'/*'); // get all file names
			foreach($files as $file){ // iterate files
			  if(is_file($file))
				unlink($file); // delete file
			}
			
			//Delete all the existing files inside thuumb directory
			$files = glob($pre_loc.'uploads/thumb/'.$check_id.'/'.$file_type.'/*'); // get all file names
			foreach($files as $file){ // iterate files
			  if(is_file($file))
				unlink($file); // delete file
			}
			
					
			
		 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
		 
		
		 
		 genPdfThumbnail($thumb_loc, $thumb_random_name.'.jpg'); // generates thumbnails
		
		 rename($pre_loc.'uploads/' . $check_id.'/'.$file_type.'/'.$thumb_random_name.'.jpg', $thumb_loc_act); //move the files from upload folder
		
		 $t=time();
		 
		 $enc_file = encrypt_decrypt( $check_id.'*'.$file_type.'*'.$thumb_random_name.'.jpg', 'e' );
		 
		 echo '<a href="kycview?file='.$enc_file.'" target="_blank">Click to View</a>';
	}
}
?>