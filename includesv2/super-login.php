<?php
session_start();
if(isset($_POST['code']) && isset($_POST['mob']) && isset($_POST['pass']) && isset($_POST['uid_enc'])){
include 'dbconnect.php';



$code= (int)$_POST['code'];
$mob= $_POST['mob'];
$pass= $_POST['pass'];
$uid=$_POST['uid_enc'];
// $pass='DggfZHK*+6OR0hr';
// $mob=9746627111;
// $code=91;
// $uid='SHUyV0J5VGNDM3dPWFZQekJWMjRoQT09';

//$redirecturl='http://www.extravelmoney.com/';
/*
if(isset($_POST['redirecturl']))
$redirecturl=$_POST['redirecturl'];
else
$redirecturl='';
*/

if($pass=='DggfZHK*+6OR0hr'){
    
	setcookie("etmref", "", time() - 3600, "/");	  // Deleting Cookie
	
?>

<!--  HTML JS code here -->
	<div id="container" uid=<?php echo $uid; ?> mob=<?php echo $mob; ?> code=<?php echo $code; ?> pass=<?php echo $pass; ?>></div>
	
	
	
	<script>
	    let container = document.querySelector("#container");
        const userInfo = {
        userId: container.getAttribute('uid'),
        countryCode: container.getAttribute('code'),
        mobNum: container.getAttribute('mob')
        };
        console.log(userInfo);
        // Store the object as a JSON string
        localStorage.setItem('userInfo', JSON.stringify(userInfo));
        window.location.href = '/';
	</script>
		
<?php	
	
}
else{
	echo 'error';
	exit;
}


}

?>