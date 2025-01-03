<?php 



if(isset($_GET['file'])) {
   
include '../../../includes/kyc-func.php';	
	
$decrypted = encrypt_decrypt( $_GET['file'], 'd' );	
	
	$term1=explode("*", $decrypted);
	$userid=$term1[0];
	$doc=$term1[1];
	$filename=$term1[2];
	
	if(isset($term1[3]))
	$inid=$term1[3];
    else
	$inid='';
	
	$typef=explode(".", $filename);
	$type=$typef[1];
	
if($type=='pdf' || $type=='PDF')
header("Content-type:application/".$type);
else
header("Content-type:image/".$type);

/*

if($type=='jpg' || $type=='jpeg')
header('Content-type: image/jpeg');

if($type=='pdf')
header("Content-type:application/pdf");

if($type=='png')
header('Content-type: image/png');

*/


if($inid!='')
readfile($pre_loc.'uploads/thumb/'.$userid.'/'.$inid.'/'.$doc.'/'.$filename);
else
readfile($pre_loc.'uploads/thumb/'.$userid.'/'.$doc.'/'.$filename);

//echo '../thumb/'.$userid.'/'.$doc.'/'.$filename;

}





 ?>



