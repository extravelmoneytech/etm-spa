<?php 
session_start();
if(!isset($_SESSION["login_code"]) || !isset($_SESSION["login"])){


$_SESSION["rdurl"]='referrals';
header('Location: ../');
exit;
}


$code=$_SESSION["login_code"];
$mob=$_SESSION["login"];





include '../../includes/dbconnect.php';






//echo $_SESSION["login"];
$title="Referrals - ExTravelMoney"; 
$description="Contact us for any foreign currency exchange related queries or for all your international money transfer needs. We are here to help you."; 
$sub=2; $page=702; $citypage=0; $curpage=0; $fold="../../"; 


$ogurl="https://www.extravelmoney.com/myaccount/referral";
$ogtype="article";

$uidquery = mysqli_query($con, "select * from register WHERE phone = '$mob' AND country_code='$code'");
 $uidquery_row = mysqli_fetch_object($uidquery);
 
 if(!$uidquery_row->u_id){
     $sql = "INSERT INTO register (phone, country_code,fname,lname,email,class,password,mcallid,device,os_version,google_id,device_type,altphone,altname,email_valid,aff_token,aff_coupon,address,district,state,pan,bank_name,bank_acno,old_txn_mt,howfindetm,referredby,wa_notify) VALUES ('$mob', '$code','','','','Resident Indian','','','','','','','','','','','','','','','','','','','','',0)"; 
    mysqli_query($con, $sql); 
    
 $uidquery = mysqli_query($con, "select * from register WHERE phone = '$mob' AND country_code='$code'");
 $uidquery_row = mysqli_fetch_object($uidquery);   
 
 $_SESSION['uuid']=$uidquery_row->u_id;  
 
   // feeds
    $fsql = "INSERT INTO activity (type, descr,data,user,extra_data) VALUES (2, 'New User Registered',$uidquery_row->u_id,'','')"; 
    mysqli_query($con, $fsql);
    
 }
 
$aff_token_clicks=$uidquery_row->aff_token_clicks;
$aff_token=$uidquery_row->aff_token;
$uid=$uidquery_row->u_id;
$aff_coupon=$uidquery_row->aff_coupon;
$name=$uidquery_row->fname;
$email=$uidquery_row->email;
$bank_acno=$uidquery_row->bank_acno;
$bank_ifsc=$uidquery_row->bank_ifsc;
$bank_name=$uidquery_row->bank_name;
$pan=$uidquery_row->pan;
$class=$uidquery_row->class;
if($name!=''){
$namearray = explode(' ', $name, 2);
$fname=$namearray[0];
$lname=$namearray[1];
}
else
$fname=$lname='';

$wa_notify=$uidquery_row->wa_notify; 

// generate link & code

if($aff_token=='' && $fname!='' && $lname!='' && $email!=''){
    
    do{
$aff_token = bin2hex(random_bytes(3));

$linkquery = mysqli_query($con, "select aff_token from register WHERE aff_token = '$aff_token'");
 $linkquery_row = mysqli_fetch_object($linkquery);
 
$user_id=$linkquery_row->u_id;


}while(isset($user_id));

mysqli_query($con, "UPDATE register SET aff_token='$aff_token' WHERE phone = '$mob' AND country_code='$code'");


    
}


if($aff_coupon=='' && $fname!='' && $lname!='' && $email!=''){
    
    do{
$aff_coupon = bin2hex(random_bytes(3));

$aff_coupon=strtoupper($aff_coupon);

$linkquery = mysqli_query($con, "select aff_token from register WHERE aff_coupon = '$aff_coupon'");
 $linkquery_row = mysqli_fetch_object($linkquery);
 
$user_id=$linkquery_row->u_id;


}while(isset($user_id));

mysqli_query($con, "UPDATE register SET aff_coupon='$aff_coupon' WHERE phone = '$mob' AND country_code='$code'");


// send welcome email

$body='<table
 style=" width: 100%; font-family: arial,sans-serif; color: rgb(34, 34, 34); font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; "
 align="center" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td style="">
      <table style="padding-left: 5px; padding-right: 5px;" border="0"
 cellpadding="0" cellspacing="0" width="100%">
        <tbody>
          <tr
 style=" text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; background-color: rgb(255, 255, 255);">
            <td style=""
 valign="bottom">
            <table
 style="border-bottom: 2px solid rgb(34, 34, 34); padding-bottom: 7px;"
 align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td
 style="margin: 0px; " valign="top"><a
 href="http://www.extravelmoney.com"
 target="_blank" style="color: rgb(17, 85, 204);"><img
 src="https://care.extravelmoney.com/ext_files/etm_mail.png"
 class="CToWUd"></a></td>
                 
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
          <tr
 style="   letter-spacing: normal; line-height: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; background-color: rgb(255, 255, 255);">
            <td
 style="margin: 0px;  color: rgb(246, 125, 0); font-size: 14px; font-weight: bold; height: 15px; padding-top: 6px;"
 align="right">REFERRAL ACTIVATION EMAIL</td>
          </tr>

          <tr
 style="color: rgb(34, 34, 34);  font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; background-color: rgb(255, 255, 255);">
            <td style="margin: 0px; ">
            <p>Dear '.$fname.'<br></p>
           <p>Share the love. Refer ExTravelMoney.com to your friend.<br> 
You earn <b>Rs 500</b>, your friends gets up to <b>Rs 1000 OFF</b> on their 1st money transfer transaction.
 
<br><br>
Here is your unique Referral Link & Coupon Code;</p>

</td>
		   </tr>
		   
		    <tr>
            <td>
            
            <table
 style="border: 1px solid rgb(152, 152, 152); font-size: 13px; padding: 4px;border-collapse:collapse;"
 cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td
 style="margin: 0px; padding: 8px; font-weight: bold;border: 1px solid rgb(152, 152, 152);" align="center" width="55%">Referral Link</td>
                  <td
 style="margin: 0px; padding: 8px; font-weight: bold;border: 1px solid rgb(152, 152, 152);" align="center">Coupon Code</td>
                </tr>
                
                 <tr>
                  <td
 style="margin: 0px; padding: 8px;border: 1px solid rgb(152, 152, 152);" align="center" width="55%">https://www.extravelmoney.com/?aff='.$aff_token.'</td>
                  <td
 style="margin: 0px; padding: 8px;border: 1px solid rgb(152, 152, 152);" align="center">'.$aff_coupon.'</td>
                </tr>
              </tbody>
            </table>
</td>
		   </tr>
		   
		    <tr>
            <td>

<p style="  color: rgb(34, 34, 34);  font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; "><br>Checkout your Referral Earnings in ExTravelMoney Account dashboard;</p>
 
  <p style="border: 1px dotted #000; padding: 15px; color: rgb(34, 34, 34);  font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; " >URL: <b>https://www.extravelmoney.com/myaccount/referrals</b><br>
</p>

          </td>
		   </tr>
		   
      
        
       
		   <tr
 style="color: rgb(34, 34, 34);  font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; background-color: rgb(255, 255, 255);">
            <td
 style="margin: 0px;  padding-top: 0px; padding-bottom: 10px;">
 
 
 </td>
 
 
 
          </tr>
          
          <tr>
        
          <td align="left" style="font-size:13px;line-height:22px;padding-top: 10px;" valign="top">
          You can get in touch with our customer care team through the channels below:<br>
          <span align="left" style="padding-top: 8px;display:inline-block;width:21px;vertical-align:middle;padding-right:2px;"><img alt="" src="https://care.extravelmoney.com/ext_files/call_gs.png"  width="auto" style="outline:none;text-decoration:none;display:block;max-width:100%"></span>
          
          <span style="display:inline-block; vertical-align: middle;padding-top: 8px;"><b>04842886900</b></span>
 
</td>
         </tr>
         
          <tr>
 <td align="left" style="font-size:13px;line-height:22px;" valign="top">
  <span align="left" style="display:inline-block;width:20px;vertical-align:middle;padding-right:2px;"><img alt="" src="https://care.extravelmoney.com/ext_files/whatsapp2_gs.png"  width="auto" style="outline:none;text-decoration:none;display:block;max-width:100%"></span>
          
          <span style="display:inline-block; vertical-align: middle;"><b>04842886900</b> (Whatsapp calls not supported)</span>
      
      </td>
         </tr>
         
          <tr>
          <td align="left" style="font-size:13px;line-height:22px;" valign="top">
          
          <span align="left" style="display:inline-block;width:20px;vertical-align:middle;padding-right:2px;"><img alt="" src="https://care.extravelmoney.com/ext_files/mail_gs.png"  width="auto" style="outline:none;text-decoration:none;display:block;max-width:100%"></span>
          
          <span style="display:inline-block; vertical-align: middle;"><b>care@extravelmoney.com</b></span>
 
 
            
            </td>
         </tr>
          
          <tr
 style="color: rgb(34, 34, 34);  font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; background-color: rgb(255, 255, 255);">
            <td
 style="border-bottom: 1px solid rgb(34, 34, 34); margin: 0px;  padding-top: 10px; padding-bottom: 15px;">Thank you and have a great day!
 <span style="display: block; font-weight: bold;">Team<span
 class="Apple-converted-space">&nbsp;</span><span class="il">ExTravelMoney</span></span></td>
          </tr>
          <tr
 style="color: rgb(34, 34, 34);  font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; background-color: rgb(255, 255, 255);">
            <td style="margin: 0px; ">
            <p
 style="margin: 0px; color: rgb(153, 153, 153); padding-top: 15px;">&copy; 2021 Extravelmoney Technosol Pvt Ltd, All Rights Reserved</p>
            <p
 style="margin: 0px; color: rgb(153, 153, 153); padding-top: 4px; font-size: 9px;">
The information contained in this electronic message and any attachments to this message are intended for the exclusive use of the addressee(s) and may contain proprietary, confidential or privileged information. If you are not the intended recipient, you should not disseminate, distribute or copy this e-mail. Please notify the sender immediately and destroy all copies of this message and any attachments contained in it.
 
 </p>
            </td>
          </tr>
          <tr
 style="color: rgb(34, 34, 34);  font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; background-color: rgb(255, 255, 255);">
            <br class="Apple-interchange-newline">
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
  </tbody>
</table>';






require_once '../../includes/phpmailer/PHPMailerAutoload.php';
include '../../includes/phpmailer/parameters.php';

$phpemail = new PHPMailer();
$phpemail->isSMTP();  

$phpemail->SMTPAuth = true;                               // Enable SMTP authentication
$phpemail->Username = $smtpuser;                 // SMTP username
$phpemail->Password = $smtppass;                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$phpemail->Port = $smtpport; 

$phpemail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);



$phpemail->setFrom('no-reply@extravelmoney.com', 'ExTravelMoney.com');



$phpemail->addAddress($email);
           
$phpemail->addReplyTo('care@extravelmoney.com', 'ExTravelMoney.com');

/*foreach($cc as $cc_mail){
   $phpemail->addCC($cc_mail);
}

foreach($bcc as $bcc_mail){
   $phpemail->addBCC($bcc_mail);
}*/

//$phpemail->addBCC('ashwin@extravelmoney.com');


$phpemail->IsHTML(true);


$phpemail->Subject   = 'Welcome to ExTravelMoney.com Referral Program';


$phpemail->Body      = $body;



$phpemail->Send();


    
}



$aff_signups=0;

if($aff_token!=''){

$query = "SELECT * FROM register WHERE referredby='$aff_token'";
$results = mysqli_query($con, $query);

foreach($results as $result)
{
  $aff_signups++;  
}
}


$aff_orders=$aff_orders_comp=0;
/*
$query = "SELECT * FROM money_exchange WHERE aff_token='$aff_token'";
$results = mysqli_query($con, $query);

foreach($results as $result)
{
    if($result[inc_gen]==3)
    $aff_orders_comp++;
    
  $aff_orders++;  
}

$query = "SELECT * FROM money_transfer WHERE aff_token='$aff_token'";
$results = mysqli_query($con, $query);

foreach($results as $result)
{
    
    if($result[inc_gen]==3)
    $aff_orders_comp++;
    
  $aff_orders++;  
}*/

$earnings=0;


$query = "SELECT amount FROM aff_log WHERE uid=$uid AND type='deposit' AND status='processed'";
$results = mysqli_query($con, $query);

if($results){
foreach($results as $result)
{
  $earnings=$earnings+$result['amount'];  
  $aff_orders++;
}
}

$pwithdraw=$total_withdraw=$pending_amt=0;

$query = "SELECT amount,status FROM aff_log WHERE uid=$uid AND type='withdrawal'";
$results = mysqli_query($con, $query);

if($results){
foreach($results as $result)
{
    if($result['status']=='pending'){
  $pwithdraw=1;
  $pending_amt=$result['amount'];
    }
  
   if($result['status']=='processed')
  $total_withdraw=$total_withdraw+$result['amount'];
}
}

$pending_to_withdraw=$earnings-$total_withdraw;


?>
<?php include $fold.'header.php'; ?>
<style>
.orderviewbutton{
	height: 23px;
    line-height: 23px;
    font-size: 12px;
	
}

.dataTables_wrapper .dataTables_filter input
{
	width: 70%;
	
}
select{
padding: 4px 2%;	
	width: 34%;
}


.dashboard-stat {
  position: relative;
  display: block;
  margin: 0 0 25px;
  overflow: hidden;
  border-radius: 4px;
}
.dashboard-stat .visual {
  width: 80px;
  height: 80px;
  display: block;
  float: left;
  padding-top: 10px;
  padding-left: 15px;
  margin-bottom: 15px;
  font-size: 35px;
  line-height: 35px;
}
.dashboard-stat .visual > i {
  margin-left: -15px;
  font-size: 110px;
  line-height: 110px;
  color: #fff;
  opacity: 0.1;
}
.dashboard-stat .details {
  position: absolute;
  right: 15px;
  padding-right: 15px;
  color: #fff;
}
.dashboard-stat .details .number {
  padding-top: 25px;
  text-align: right;
  font-size: 34px;
  line-height: 36px;
  letter-spacing: -1px;
  margin-bottom: 0;
  font-weight: 300;
}
.dashboard-stat .details .number .desc {
  text-transform: capitalize;
  text-align: right;
  font-size: 16px;
  letter-spacing: 0;
  font-weight: 300;
}
.dashboard-stat.blue {
  background-color: #337ab7;
}
.dashboard-stat.red {
  background-color: #4AB586;
}
.dashboard-stat.purple {
  background-color:#4282D2 ;
}
.dashboard-stat.hoki {
  background-color:#78899F;
}

@media (max-width: 767px) {
.dashboard-stat .details {
  right: 50px;

}

.col23, .col13{
    width: 100%;
}
	
}

.button-copy{
    float: left;
    height: 46px !important;
    width: 70px;
        padding: 0 23.96px;
    
}

.text-cust{
   float: left;
    width: 72%;
}

.text-cust1{
   float: left;
    width: 67%;
}

.msg{
        background-position: 13px 15px;
}

label{
        font-size: 12px;
    margin-bottom: 3px;
}


ul.tabs{
    text-align:center;
}

ul.tabs li{
    display: inline-block;
    float: none;
}

ul.tabs li a{
        margin-bottom: -6px;
        border-bottom: 0px !important;
}

@media only screen and (max-width:767px) {
ul.tabs li a{
        margin-bottom: 0px;
}
}

.mobHeader{
    display:none !important;
}
@media(max-width:800px){
    .tabbed{
        margin-top:1rem;
    }
}
h3,a{
    font-family: 'Open Sans';
}
.dashboard-stat .visual {
    height:fit-content;
}
.dashboard-stat .visual > i{
    margin-left:0;
}
.fa-lg{
    line-height:normal !important;
    font-size:3.2em !important;
}
.etmred{
    color:#223347!important;
}
@media (min-width:800px){
    .referalMainItem{
        width:30% !important;
    }
}
.service-tittle4{
    margin-top:20px;
    margin-bottom:20px;
}
</style>

			<section class="content fullwidth" style="padding-top: 60px; min-height: 400px; overflow: hidden;" id="foroverlay">
			    
			    	    <div class="tabbed">
					<ul class="tabs">
						<li><a href="../transactions">Transactions</a></li>
						<li><a href="../referrals" class="selected">Referrals</a></li>
					    <li><a href="../profile">Profile</a></li>
					</ul>
		
	
				</div>
			    
			<!-- <h1 class="textcenter" style="margin-top: 25px; ">Affiliate Dashboard</h1> -->
			
		
			
		<div class="row referalMainCont" style="margin-top: 35px;">
		      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 referalMainItem">
      <a class="dashboard-stat hoki" href="#">
        <div class="visual">
          <i class="fa fa-mouse-pointer"></i>
        </div>
        <div class="details">
          <div class="number">
            <span><?php echo($aff_token_clicks); ?> / <?php echo($aff_signups); ?></span>
          </div>
          <div class="desc">Total Clicks / Signups</div>
        </div>
      </a>
    </div>

  
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 referalMainItem">
      <a class="dashboard-stat purple" href="#">
        <div class="visual">
          <i class="fa fa-share"></i>
        </div>
        <div class="details">
          <div class="number">
            <span><?php echo($aff_orders); ?></span>
          </div>
          <div class="desc">Referred Transactions</div>
        </div>
      </a>
    </div>
     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 referalMainItem">
      <a class="dashboard-stat red" href="#">
        <div class="visual">
          <i class="fa-solid fa-indian-rupee-sign"></i>
        </div>
        <div class="details">
          <div class="number">
            <span>&#8377; <?php echo($earnings); ?></span>
          </div>
          <div class="desc">Total Earnings</div>
        </div>
      </a>
     
    </div>
  </div>
  
 	<section class="columns">
 	     <?php if($pending_to_withdraw>=2000 && $pwithdraw==0){ ?>
 	  <!-- <p class="msg info"> &#8377; <?php echo($pending_to_withdraw); ?> available for withdrawal <a href="javascript:void(0);" class="button button-rounded button-flat-action" id="aff_withdraw" title="" style="color: #fff;margin-left: 7px; ">Withdraw</a></p> -->
 	      <?php } ?>
 	      
 	       <?php if($pwithdraw==1){ ?>
 	   <p class="msg info"> Withdrawal of &#8377;<?php echo($pending_amt); ?> is pending and will be processed in 3 working days.</p> 
 	      <?php } ?>
 	    
      <div class="col23">
 	<h3 class="" style="margin-top: 10px; margin-bottom: 7px; font-size: 20px;">Your Referral Link</h3>
                    
                     
                        <input class="form-control text-primary text-cust" type="text" readonly="" value="https://www.extravelmoney.com/?aff=<?php echo($aff_token); ?>" style="font-size: 18px;" size='67'><button data-clipboard-text="https://www.extravelmoney.com/?aff=<?php echo($aff_token); ?>" class="button button-rounded button-flat-primary button-jumbo button-copy copyCode tooltip" title="Click to Copy" style="padding:0;display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:500;">Copy</button>
                 
                        
                        
          	</div>
          	<div class="col13">
          	    <h3 class="" style="margin-top: 10px; margin-bottom: 7px; font-size: 20px;">Your Coupon Code</h3>
          	     <input class="form-control text-primary text-cust1" type="text" readonly="" value="<?php echo($aff_coupon); ?>" style="font-size: 18px;" size='20'><button data-clipboard-text="<?php echo($aff_coupon); ?>" class="button button-rounded button-flat-primary button-jumbo button-copy copyCode tooltip" title="Click to Copy" style="padding:0;display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:500;">Copy</button>
          	    	</div>
	</section>
	
	<section class="columns textcenter" style="margin-top: -10px;">
	     <h3 class="" style="margin-top: 0px; margin-bottom: 10px; font-size: 20px;">Refer & Earn Rs 500</h3>  
	     <p style="font-size: 14px;">Share the love. Refer ExTravelMoney.com to your friend.<br> 
You earn <b>Rs 500</b>, your friends gets up to <b>Rs 1000 OFF</b> on their 1st money transfer transaction.
</p>
     <!-- AddToAny BEGIN -->
     
<div style="margin-left: 0;" class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="https://www.extravelmoney.com/?aff=<?php echo($aff_token); ?>" data-a2a-title="Use my code '<?php echo($aff_coupon); ?>'. Get up to Rs 1000 OFF on booking your 1st money transfer transaction with ExTravelMoney">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_email"></a>
<a class="a2a_button_facebook_messenger"></a>
<a class="a2a_button_telegram"></a>
</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->  		
			
			
	</section>	
	


	
				<section class="columns textcenter">
			<h2 style="text-align: center;margin-bottom:1.9em"><span>How It Works</span></h2>
			
			<div class="col3 textcenter">
				<div class=""><i class="fa fa-share fa-lg etmred" style="font-size: 7rem !important;"></i></div>
				<h4 class="service-tittle4" style="font-size: 2em;">1. Refer</h4>
				<p style="padding:0 15px;font-size:14px;">Share your ExTravelMoney coupon code with your friends or family via WhatsApp, Facebook, Twitter, Email etc</p>
				
				</div>
				
					<div class="col3 textcenter">
				<div class=""><i class="fa-solid fa-sack-dollar fa-lg etmred" style="font-size: 7rem !important;"></i></div>
				<h4 class="service-tittle4" style="font-size: 2em;">2. Earn</h4>
				<p style="padding:0 15px;font-size:14px;">On their 1st money transfer transaction using your code, you will be credited Rs 500 & they will get up to Rs 1000 OFF</p>
				
				</div>
				
					<div class="col3 col-last textcenter">
				<div class=""><i class="fa fa-smile-o fa-lg etmred" style="font-size: 7rem !important;"></i></div>
				<h4 class="service-tittle4" style="font-size: 2em;">3. Get Credit</h4>
				<p style="padding:0 15px;font-size:14px;">Get money credited to your bank account on the 15th of every month</p>
				
				</div>
			
			

</section>

		<!--	<section class="columns with-icons">-->
		<!--<h2><span>Why ExTravelMoney</span></h2>-->
		
		<!--	<article class="col4">-->
			
		<!--		<h3><i class="fa fa-heart fa-lg etmred"></i>&nbsp;&nbsp;<a href="#">Popular Brand</a></h3>-->
		<!--		<p class="justify">1 in 4 online forex bookings in India are made via ExTravelMoney.com</p>-->
				
		<!--	</article><article class="col4">-->
		<!--		<h3><i class="fa fa-life-ring fa-lg etmred"></i>&nbsp;&nbsp;<a href="#">Customer Support</a></h3>-->
		<!--		<p class="justify">Our trained executives will support customers with quick transaction completion</p>-->
				
		<!--	</article><article class="col4">-->
		<!--		<h3><i class="fa fa-bolt fa-lg etmred"></i>&nbsp;&nbsp;<a href="#">Easy Process</a></h3>-->
		<!--		<p class="justify">Easily place your order and also complete your KYC verification online</p>-->
				
		<!--	</article>-->
		<!--	<article class="col4">-->
		<!--		<h3><i class="fa fa-dollar fa-lg etmred"></i>&nbsp;&nbsp;<a href="#">Best Rates</a></h3>-->
		<!--		<p class="justify">Get market beating exchange rates and save money on each forex transaction</p>-->
				
		<!--	</article>-->
		<!--</section>-->
			
		
					<section class="columns with-icons">
		<h4><span>Terms & Conditions</span></h4>
			<ol>
			    <li>Referral commission is credited upon referring a NEW customer to ExTravelMoney.com (No previous orders with us, not referred by anyone else previously)</li> 
			 <li>The Coupon Code is valid once per user.</li>  
			  <li>The coupon is applicable only on transactions above Rs 3 Lakh.</li> 
			  <li>The discount amount received on applying the Coupon Code depends on the transaction volume. Higher the volume, higher the discount.</li> 
			  <li>Referral commission will be directly credited to your bank account once it reaches Rs 1500, on the 15th of the next month.</li> 
			  <li>Referral commission will not be provided when doing self-referrals or referring direct family members who are doing remittance transactions to the same beneficiary. However, the discount from Coupon Code will be applicable.</li> 
			<li>ExTravelMoney reserves the right to cancel, discontinue, prematurely withdraw, change, suspend, terminate, alter or modify the Referral Program at our sole discretion at any time and the same shall be binding on the participants. Furthermore, ExTravelMoney reserves the right to disqualify/revoke any participants of the Referral Program including but not limited to in cases of fraudulent/ suspicious activities/not following the Terms and conditions of the program.</li> 
			</ol>
		
		</section>	
			
	
	</section>
	



	
	



<?php include $fold.'footer.php'; ?>



		<div class="remodal" id="user_profile_modal" data-remodal-id="user_profile_modal" data-remodal-options="hashTracking: false, closeOnOutsideClick: false, closeOnEscape: false" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" style="border-radius: 5px;">
  
  <div>
    <h3 id="modal1Title" style="margin-top: 0;">Complete Your Profile</h3>
	
	<div style="display: block; text-align: left; margin-top: 20px;">
	
<p><label>First Name<span style="color: red; font-weight: bold;">*</span>:</label>
	<input type="text" name="user_f_name" placeholder="First Name" value="<?php echo($fname); ?>" style="width: 94%;">
</p>
<p><label>Last Name<span style="color: red; font-weight: bold;">*</span>:</label>
	<input type="text" name="user_l_name" placeholder="Last Name" value="<?php echo($lname); ?>" style="width: 94%;">
</p>
<p><label>Email<span style="color: red; font-weight: bold;">*</span>:</label>
		<input type="text" name="user_reg_email" placeholder="Email Address" value="<?php echo($email); ?>" style="width: 94%;">
</p>
<p><label>Category<span style="color: red; font-weight: bold;">*</span>:</label><select name="user_class" id="user_class" style="width: 100%; padding: 10px 2%;"><option value="Resident Indian" <?php if($class=='Resident Indian') echo 'selected'; ?>>Resident Indian</option>
<option value="NRI" <?php if($class=='NRI') echo 'selected'; ?>>NRI</option>
<option value="Foreigner" <?php if($class=='Foreigner') echo 'selected'; ?>>Foreigner</option>
</select></p>
<p><input type="checkbox" id="wa_notify" name="wa_notify" value="1" <?php if($wa_notify==1) echo 'checked'; ?> ><label for="wa_notify" style="display: inline-block; margin-left: 5px;">Opt for notifications via WhatsApp?</label>
	
</p>

<p><label>Bank Account Number:</label>
		<input type="text" name="user_acno" placeholder="Bank Account Number" value="<?php echo($bank_acno); ?>" style="width: 94%;">
</p>	
<p><label>IFSC Code:</label>
		<input type="text" name="user_ifsc" placeholder="Bank IFSC Code" value="<?php echo($bank_ifsc); ?>" style="width: 94%;">
</p>
<p><label>Bank Name:</label>
		<input type="text" name="user_bank" placeholder="Bank Name" value="<?php echo($bank_name); ?>" style="width: 94%;">
</p>
<p><label>PAN Number:</label>
		<input type="text" name="user_bank" placeholder="Your PAN Number" value="<?php echo($pan); ?>" style="width: 94%;">
</p>

<p class="msg success user_profile_success" style="margin-top: 0px; display: none;">Profile Details Saved.</p>
      <p class="msg error user_profile_error" style="margin-top: 0px; display: none;">Please fill in all mandatory fields.</p>
 <p style="text-align: center; margin-top: 25px;">
 <button class="remodal-confirm user_profile_save" style="width: 180px;" >Save</button>
</p>
</div>


   
  </div>
  
</div>







 <script>
 
 $('.copyCode').click(function() {
 var copyText=$(this).data("clipboard-text");
 
   /* Select the text field */
  var fullLink = document.createElement('input');
    document.body.appendChild(fullLink);
    fullLink.value = copyText;
    fullLink.style.cssText = 'opacity:0; height:0px; padding: 0px; border: 0px;';
    fullLink.select();
  fullLink.setSelectionRange(0, 99999)
  document.execCommand("copy");
  fullLink.remove();
  //alert("Copied the text: " + fullLink.value);
  
  var that=$(this);
  
  $(this).html('<i class="fa fa-check"></i>');
  
  setTimeout(function(){ that.html('<i class="fa fa-clone"></i>'); }, 5000);
  
  
 
 });	
 

 /*$('#aff_withdraw').click(function() {

	//var uid = $('#uid').val();
	
	$.ajax({
	  type: "POST",
	  url: "../../includes/logincheck.php",
	   data: '',
	  dataType: "json",
	  success: function(res) {
		
   var dataString = 'action=aff_withdraw' + '&mob=' + res.mob+ '&code=' + res.code;
    $.ajax({
			type: "POST",
			url: "https://mvc.extravelmoney.com/extra-functions/",
			 data: dataString,
			// dataType: "json",
             success: function(output) {
				
//alert('Payout Request has been sent and will be processed in 3 working days.');
location.reload();


			 }
			 });

 }
			 });

});*/





  
  

  
  
<?php if($fname=='' || $lname=='' || $email==''){ ?>
$(window).load(function() {
	$('[data-remodal-id = user_profile_modal]').remodal().open();	
  });
  
  <?php } ?>
  
  
   $('#edit-aff-profile').click(function() {
      	$('[data-remodal-id = aff_profile_closable]').remodal().open();	 
   });
       
       

 </script>

<script src="<?php echo $fold; ?>js/user-profile.js?ver=1.0.10"></script> 
