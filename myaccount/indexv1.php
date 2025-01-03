<?php 
session_start();
if(isset($_SESSION["login"]) && isset($_SESSION["login_code"])){
if(isset($_GET["goto"]))
header('Location: '.$_GET["goto"]);
else
header('Location: transactions');

exit;
}
//$txn=$_SESSION["tran"];
//$inid=$_SESSION["invoiceid"];

//echo $_SESSION["session_id"];
$title="Sign Up/Login - ExTravelMoney"; 
$description="Contact us for any foreign currency exchange related queries or for all your international money transfer needs. We are here to help you."; 
$sub=2; $page=700; $citypage=0; $curpage=0; $fold="../"; 


$ogurl="https://www.extravelmoney.com/myaccount";
$ogtype="article";

if(isset($_GET["goto"]))
$_SESSION["rdurl"]=$_GET["goto"];

?>
<?php include $fold.'header.php'; ?>

<style>
.selected-dial-code{
	text-align: left;
	
}
.inputerror1{
	
	font-size: 12px;
	color: red;
}


		  @media only screen and (max-width: 768px) {
		     	
		
		.mobonlymt{
		    margin-top: 7px;
		}
		
		  }


</style>

			<section class="content textcenter" style="padding-top: 60px; min-height: 400px; overflow: hidden;" id="foroverlay">
			<h1 class="textcenter" style="margin-top: 0px; margin-bottom: 30px;">Sign Up/Login</h1>
			
			
			
			<div class="clear gap"></div>
			<!-- <p id="pagehead_txt">Login to track the order status/upload KYC documents</p>-->
	<div style="text-align: center; display: none; margin-top: 45px;" id="storeloader"><img src="../images/red_loader.gif" style="width: 43px; "><br>Please wait...</div>
	<div id="mobdiv2" ><label for="mob">Enter your Mobile Number</label><input type="tel" name="mob" id="mob" value="" placeholder="Mobile number" onkeypress="return checkforenter_mob(event);"><button class="button button-rounded button-flat-caution" id="mobnumenter2" style="margin-top: 0px; border-radius: 0px; ">Go</button><div style="clear:both"></div><p id="moberrordiv2" style="display: none;" class="inputerror1">Please enter a valid phone number</p></div>	
	
  <div id="otpdiv"><label for="otp" id="otp_label">Enter the OTP from SMS / Cal</label><input type="text" name="otp" id="otp" placeholder="Enter OTP here" style="width: 25%;" onkeypress="return checkforenter_otp(event);" autocomplete="off"><a href="javascript:otpenter(1);" class="remodal-confirm" id="fbutton" style="color: #fff; height: 16px;line-height: 16px;" />Proceed</a><p id="otperrordiv" style="display: none;" class="inputerror1"></p>
  </div>
  <div id="misscalltext" style="margin-top: 15px; display: none; font-weight: 600;">
 <span id="misscalltext_header">Didn't receive the OTP?</span><span style="display: block; margin-top: 10px;"><button onclick="waotp();" class="button button-rounded button-flat-highlight button-adjust" style="" id="wa_otp_btn">Get OTP in WhatsApp</button><button onclick="mcall();" class="button button-rounded button-flat-highlight button-adjust mobonlymt" style="margin-left: 10px;">Missed Call Verification</button><br><br><br><button onclick="changeotpmob();" class="button button-rounded button-flat-caution button-adjust1" style="margin-left: 10px;">Cancel & Try again</button></span></div>	
  
  
			
<div id="mcalldiv" style="display: none;">
<p id="mcalldiv_or" style="margin-top: 15px;">OR</p>
<p style="margin-top: 0px;">Give a missed call to</p>
<p id="misscallno" style="font-size: 24px; color: #e42128; font-weight: 600;"></p>
<p style="margin-top: 0px;">from <span id="yourno"></span> in <span id="timersec" style="color: #e42128;">100 seconds</span></p>
<p id="intwarn" style="display: none; font-size: 11px;">This is a USA based number and you should have ISD calling facility on your mobile to dial this.</p>	
<p style="font-size: 11px;">Waiting for your missed call...</p>
<br><br><button onclick="changeotpmob();" class="button button-rounded button-flat-caution button-adjust1" style="margin-left: 10px;">Cancel & Try again</button>
</div>




<p id="trackretry" style="display: none;">Oops! Verification failed.<br><br><button class="button button-rounded button-flat-caution" id="retryveri">Retry</button></p>
	
			
			
			
			
		
	<div class="clear gap"></div>
	</section>
	


<?php include $fold.'footer.php'; ?>

<script>
$("#mob").intlTelInput();

</script>
<script src="<?php echo $fold; ?>js/login-signup.js?ver=1.0.3"></script> 