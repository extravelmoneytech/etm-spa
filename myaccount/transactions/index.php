<?php 
session_start();
if(!isset($_SESSION["login_code"]) || !isset($_SESSION["login"])){

if(!isset($_GET["inid"]) || !isset($_GET["type"])){  //list=1
$_SESSION["rdurl"]='transactions';
}
else{
$_SESSION["rdurl"]='transactions/?inid='.htmlspecialchars($_GET["inid"]).'&type='.htmlspecialchars($_GET["type"]).'&cls='.htmlspecialchars($_GET["cls"]).'&prp='.htmlspecialchars($_GET["prp"]);   //list=0
    
}
header('Location: ../');
exit;
}

include '../../includes/dbconnect.php';
include '../../includes/kyc-func.php';

$code=$_SESSION["login_code"];
$mob=$_SESSION["login"];

// register if not yet registered

$uidquery = mysqli_query($con, "select * from register WHERE phone = '$mob' AND country_code='$code'");
 $uidquery_row = mysqli_fetch_object($uidquery);
 
 if(!$uidquery_row->u_id){
     $sql = "INSERT INTO register (phone, country_code,fname,lname,email,class,password,mcallid,device,os_version,google_id,device_type,altphone,altname,email_valid,aff_token,aff_coupon,address,district,state,pan,bank_name,bank_acno,old_txn_mt,howfindetm,referredby) VALUES ('$mob', '$code','','','','Resident Indian','','','','','','','','','','','','','','','','','','','','')"; 
    mysqli_query($con, $sql); 
    
  
    
 $uidquery = mysqli_query($con, "select * from register WHERE phone = '$mob' AND country_code='$code'");
 $uidquery_row = mysqli_fetch_object($uidquery);   
    
$_SESSION['uuid']=$uidquery_row->u_id; 

  // feeds
    $fsql = "INSERT INTO activity (type, descr,data,user,extra_data) VALUES (2, 'New User Registered',$uidquery_row->u_id,'','')"; 
    mysqli_query($con, $fsql); 
   
    
 }
 
 $name=$uidquery_row->fname;
$email=$uidquery_row->email;
if($name!=''){
$namearray = explode(' ', $name, 2);
$fname=$namearray[0];
$lname=$namearray[1];
}
else
$fname=$lname='';
 
$wa_notify=$uidquery_row->wa_notify; 

if(!isset($_GET["inid"]) || !isset($_GET["type"])){
	$list=1;

}
else{
	$list=0;
		$invoiceid=htmlspecialchars($_GET["inid"]);
	$type=htmlspecialchars($_GET["type"]);
$ddtext='Delivery';
	if($type=="Buy")
		$type1="buy";
	if($type=="Sell"){
		$type1="sell";
		$ddtext='Pickup';
	}
	if($type=="Transfer"){
		$type1="mt";
$ddtext='KYC Pickup';
}






$inid=htmlspecialchars($_GET["inid"]);
$_SESSION["invoiceid"]=$inid;

$class=htmlspecialchars($_GET["cls"]);
$mt_purp=htmlspecialchars($_GET["prp"]);

if($type1=='mt')
$result2 = mysqli_query($con, "SELECT inc_gen FROM money_transfer WHERE invoiceid = '$inid'");   
else
$result2 = mysqli_query($con, "SELECT inc_gen FROM money_exchange WHERE invoiceid = '$inid'");   

$row2 = mysqli_fetch_object($result2);	
$inc_gen = $row2->inc_gen;

/*
$result2 = mysqli_query($con, "SELECT * FROM register WHERE country_code = $code AND phone = $mob");      
$row2 = mysqli_fetch_object($result2);	
$check_id = $row2->u_id;

//echo $check_id;
*/
//Adhaar Check -->
$check_id = (int)$_SESSION["uuid"];
if(!$check_id)
$check_id = (int)$_SESSION["userid"];

$tran=$_SESSION["tran"];
if($tran=="buy"){
$buy_purp= $_SESSION["buypurp"];
}


//echo $check_id;

if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/adhaar_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/adhaar_image')) {   
	$adh = 'Update';
	$filename = get_filename($dir);
	$aadharfile = encrypt_decrypt( $check_id.'*adhaar_image*'.$filename, 'e' );
	

	
	$adh_prv = 'Click to View';
    $adh_dlt = '<p  onclick="deleteKycIntial(\'adhaar_image\')">Delete</p>';
    
  
}
else
{
    $adh_dlt = '<p style="display:none;"  onclick="deleteKycIntial(\'adhaar_image\')">Delete</p>';
	$adh = 'Upload';
}

//Passport Check -->
if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/passport_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/passport_image')) {   
	$pas = 'Update';
	$filename = get_filename($dir);

	$passportfile = encrypt_decrypt( $check_id.'*passport_image*'.$filename, 'e' );
	$pas_prv = 'Click to View';
	$pas_dlt = '<p onclick="deleteKycIntial(\'passport_image\')">Delete</p>';
	
}
else
{
    $pas_dlt = '<p style="display:none;" onclick="deleteKycIntial(\'passport_image\')">Delete</p>';
	$pas = 'Upload';
}




if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/passport2_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/passport2_image')) {   
	$pas2 = 'Update';
	$filename = get_filename($dir);

	$passport2file = encrypt_decrypt( $check_id.'*passport2_image*'.$filename, 'e' );
	$pas2_prv = 'Click to View';
	$pas2_dlt = '<p onclick="deleteKycIntial(\'passport2_image\')">Delete</p>';
	
}
else
{
    $pas2_dlt = '<p style="display:none;" onclick="deleteKycIntial(\'passport2_image\')">Delete</p>';
	$pas2 = 'Upload';
}



//Driving Liscense Check -->
if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/oth_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/oth_image')) {   
	$dl = 'Update';
	$filename = get_filename($dir);

	$othfile = encrypt_decrypt( $check_id.'*oth_image*'.$filename, 'e' );
	
	$dl_prv = 'Click to View';
	$dl_dlt = '<p onclick="deleteKycIntial(\'oth_image\')">Delete</p>';
}
else
{
    $dl_dlt = '<p style="display:none;" onclick="deleteKycIntial(\'oth_image\')">Delete</p>';
	$dl = 'Upload';
	$dl_loc = '';
}

//PAN Card Check -->
if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/pan_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'.$check_id.'/pan_image')) {   
	$pan = 'Update';
	$filename = get_filename($dir);
	

	
	$pan_prv = 'Click to View';
	$pan_del = '<p onclick="deleteKycIntial(\'pan_image\')">Delete</p>';
	$panfile = encrypt_decrypt( $check_id.'*pan_image*'.$filename, 'e' );
}
else
{
    $pan_del = '<p style="display:none;" onclick="deleteKycIntial(\'pan_image\')">Delete</p>';
	$pan = 'Upload';
}

//Air Ticket for Buy Currency Check -->
if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/a_tkt_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/a_tkt_image')) {   
	$a_tkt = 'Update';
	$filename = get_filename($dir);
$aticketfile = encrypt_decrypt( $check_id.'*a_tkt_image*'.$filename.'*'.$inid, 'e' );
	$a_tkt_prv = 'Click to View';
	$a_tkt_del='<p onclick="deleteKycIntial(\'a_tkt_image\')">Delete</p>';
}
else
{
    $a_tkt_del='<p style="display:none;" onclick="deleteKycIntial(\'a_tkt_image\')">Delete</p>';
	$a_tkt = 'Upload';
}


//Air Ticket for Buy Currency Check -->
if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/a_tkt_return_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/a_tkt_return_image')) {   
	$a_tkt_return = 'Update';
	$filename = get_filename($dir);
$aticketReturnfile = encrypt_decrypt( $check_id.'*a_tkt_return_image*'.$filename.'*'.$inid, 'e' );
	$a_tkt_return_prv = 'Click to View';
	$a_tkt_return_del='<p onclick="deleteKycIntial(\'a_tkt_return_image\')">Delete</p>';
}
else
{
    $a_tkt_return_del='<p style="display:none;" onclick="deleteKycIntial(\'a_tkt_return_image\')">Delete</p>';
	$a_tkt_return = 'Upload';
}

//Valid Visa for Buy Currency Check -->
if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/vvisa_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/vvisa_image')) {   
	$vvisa = 'Update';
	$filename = get_filename($dir);
$visafile = encrypt_decrypt( $check_id.'*vvisa_image*'.$filename.'*'.$inid, 'e' );
	$vvisa_prv = 'Click to View';
	$vvisa_del='<p onclick="deleteKycIntial(\'vvisa_image\')">Delete</p>';
}
else
{
    $vvisa_del='<p style="display:none;" onclick="deleteKycIntial(\'vvisa_image\')">Delete</p>';
	$vvisa = 'Upload';
}

//Beneficery Passport for Money Transfer Check -->
if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/ben_pass_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/ben_pass_image')) {   
	$ben_pass = 'Update';
	$filename = get_filename($dir);
$benpassportfile = encrypt_decrypt( $check_id.'*ben_pass_image*'.$filename.'*'.$inid, 'e' );
	
	$ben_pass_prv = 'Click to View';
	$ben_pass_del='<p onclick="deleteKycIntial(\'ben_pass_image\')">Delete</p>';
}
else
{
    $ben_pass_del='<p style="display:none;" onclick="deleteKycIntial(\'ben_pass_image\')">Delete</p>';
	$ben_pass = 'Upload';
}

//Purpose proof for Money Transfer Check -->
if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/purp_proof_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/purp_proof_image')) {   
	$purp_proof = 'Update';
	$filename = get_filename($dir);
$purprooffile = encrypt_decrypt( $check_id.'*purp_proof_image*'.$filename.'*'.$inid, 'e' );
	
	$purp_proof_prv = 'Click to View';
	$purp_proof_del='<p onclick="deleteKycIntial(\'purp_proof_image\')">Delete</p>';
}
else
{
    $purp_proof_del='<p style="display:none;" onclick="deleteKycIntial(\'purp_proof_image\')">Delete</p>';
	$purp_proof = 'Upload';
}


//Indian Passport of Student for Money Transfer Check -->
if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/stud_pass_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/stud_pass_image')) {   
	$stud_pass = 'Update';
	$filename = get_filename($dir);
$studpassportfile = encrypt_decrypt( $check_id.'*stud_pass_image*'.$filename.'*'.$inid, 'e' );
	
	$stud_pass_prv = 'Click to View';
	$stud_pass_del='<p onclick="deleteKycIntial(\'stud_pass_image\')">Delete</p>';
}
else
{
    $stud_pass_del='<p style="display:none;" onclick="deleteKycIntial(\'stud_pass_image\')">Delete</p>';
	$stud_pass = 'Upload';
}

//Indian Entry Visa for Sell Currency Check -->
if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/ent_visa_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/ent_visa_image')) {   
	$ent_visa = 'Update';
	$filename = get_filename($dir);
$indvisafile = encrypt_decrypt( $check_id.'*ent_visa_image*'.$filename.'*'.$inid, 'e' );
	
	$ent_visa_prv = 'Click to View';
	$ent_visa_del='<p onclick="deleteKycIntial(\'ent_visa_image\')">Delete</p>';
}
else
{
    $ent_visa_del='<p style="display:none;" onclick="deleteKycIntial(\'ent_visa_image\')">Delete</p>';
	$ent_visa = 'Upload';
}

//NR Status Page copy for Sell Currency Check -->
if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/nr_stat_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/nr_stat_image')) {   
	$nr_stat = 'Update';
	$filename = get_filename($dir);
$nrstatusfile = encrypt_decrypt( $check_id.'*nr_stat_image*'.$filename.'*'.$inid, 'e' );
	
	$nr_stat_prv = 'Click to View';
	$nr_stat_del='<p onclick="deleteKycIntial(\'nr_stat_image\')">Delete</p>';
}
else
{
    $nr_stat_del='<p style="display:none;" onclick="deleteKycIntial(\'nr_stat_image\')">Delete</p>';
	$nr_stat = 'Upload';
}


//Valid Foreign Passport copy for Sell Currency Check -->
if (file_exists($pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/valf_pass_image') && !is_dir_empty($dir=$pre_loc.'uploads/thumb/'. $check_id.'/'.$inid.'/valf_pass_image')) {   
	$valf_pass = 'Update';
	$filename = get_filename($dir);
$fpassportfile = encrypt_decrypt( $check_id.'*valf_pass_image*'.$filename.'*'.$inid, 'e' );
	
	$valf_pass_prv = 'Click to View';
	$valf_pass_del='<p onclick="deleteKycIntial(\'valf_pass_image\')">Delete</p>';
}
else
{
    $valf_pass_del='<p style="display:none;" onclick="deleteKycIntial(\'valf_pass_image\')">Delete</p>';
	$valf_pass = 'Upload';
}

if($inc_gen==2){
    $valf_pass_del=$nr_stat_del=$ent_visa_del=$stud_pass_del=$purp_proof_del=$ben_pass_del=$vvisa_del=$a_tkt_del=$pan_del=$dl_dlt=$pas_dlt=$adh_dlt="";
}
}

if($fname=='' || $lname=='' || $email=='')
$list=2;

//echo $_SESSION["login"];
$title="Transactions - ExTravelMoney"; 
$description="Contact us for any foreign currency exchange related queries or for all your international money transfer needs. We are here to help you."; 
$sub=2; $page=701; $citypage=0; $curpage=0; $fold="../../"; 


$ogurl="https://www.extravelmoney.com/myaccount/transactions";
$ogtype="article";


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
padding: 10px 2%;	
	width: 34%;
}

label{
        font-size: 12px;
    margin-bottom: 3px;
}
	
.button-add{
padding: 0 8.6px;
    height: 25px!important;
    line-height: 25px;
    font-size: 13px;
    margin-top: 10px;
    margin-left: 15px;
	background: #14ce1a;
	color: #fff !important;
}	

.button-add:hover{
	background: #00ad06 !important;
	color: #fff !important;
}
.button-add:focus{
	background: #00ad06 !important;
	color: #fff !important;
}
	
.button-rem{
padding: 0 8.6px;
    height: 25px!important;
    line-height: 25px;
    font-size: 13px;
    margin-top: 10px;
    margin-left: 5px;
	background: #ff585c;
	color: #fff !important;
}	
.button-rem:hover{
	background: #de151a !important;
	color: #fff !important;
}
.button-rem:focus{
	background: #de151a !important;
	color: #fff !important;
}
	
#mtsendermodal label, #mtbenfmodal label, #buyapplicantmodal label{
font-size: 12px;
    margin-top: 15px;
}	

#sendermodal_btn, #benfmodal_btn, #applicantmodal_btn{
	
	    background: #029400 !important;
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
#orderlist{
    font-family: 'Open Sans';
    font-size:14px;
}
#orderlist thead th{
    background:#0e51a0;
    border:none;
}
table.alt th{
    font-family: 'Open Sans' !important;
}
.color-red ul.tabs a.selected{
    background:#0e51a0;
    border:none;
}
.color-red ul.tabs a:hover{
    color:#0e51a0;
}
.color-red ul.tabs a{
    border-radius:10px 10px 0 0;
}
.color-red ul.tabs a.selected:hover{
    color:white;
}
.tabbed .tabs{
    font-family: 'Open Sans';
}
table.dataTable tbody th, table.dataTable tbody td {
    padding: 12px 10px;
}
.orderviewbutton{
    color:#0e51a0;
    border:1px solid #0e51a0;
    padding:0 12px;
    background:none;
    
}
.orderviewbutton:hover{
    background:#0e51a0;
    color:white !important;
}
.orderstatus.cancelled {
    border-radius: 3px;
    background:#DF3838;
}
.orderstatus.completed{
    border-radius: 3px;
    background:#12B010;
}
.orderstatus.placed{
    border-radius: 3px;
    background:#2193F9;
}
.orderstatus.confirmed{
    border-radius:3px;
}
table.dataTable.no-footer {
    border:none;
}
.dataTables_paginate .current{
    background:none !important;
    padding:5px 12px !important;
    border:1px solid #0e51a0 !important;
    color:#0e51a0 !important;
}
.mobHeader{
    display:none !important;
}
@media(max-width:800px){
    .tabbed{
        margin-top:1rem;
    }
}
.col-border{
    min-height:9rem !important;
}
.dltContainer{
    display:flex;
    align-items:center;
    justify-content:center;
}
.dltContainer p{
    text-align:center;
    cursor:pointer;
    background:#0e51a0;
    color:white;
    padding:0px 10px;
    border-radius:10px;
    margin:0;
    margin-top:5px;
}
.uploadresdiv{
    margin-top:-5px;
}
.tooltipN {
            position: relative;
            display: inline-block;
            font-size:0.9rem;
            font-weight:500;
            cursor:pointer;
        }

        .tooltipN .tooltiptext {
            visibility: hidden;
            width: 20rem;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            right: 65%;
            margin-right: -60px;
            opacity: 0;
            transition: opacity 0.3s;
            font-size:0.8rem;
            line-height:20px;
            border:none;
            font-weight:300;
        }

        .tooltipN:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
        @media (max-width: 402px){
            .tooltipN .tooltiptext{
                right: 0%;
                margin-right: 0px;
                left: 0%;
                margin-left: 0;
                }
            }
</style>
<?php if($list==1 || $list==2) {?>
			<section class="content fullwidth" style="padding-top: 60px; min-height: 400px; overflow: hidden;" id="foroverlay">
			    
			    <div class="tabbed">
					<ul class="tabs">
						<li><a href="../transactions" class="selected">Transactions</a></li>
						<li><a href="../referrals" class="">Referrals</a></li>
					<li><a href="../profile" class="">Profile</a></li>
					</ul>
		
	
				</div>
			    
		<!--	<h1 class="textcenter" style="margin-top: 0px; margin-bottom: 30px;">My Transactions</h1> -->
			
			
			
			
			
			
			
			<div class="tb-wrapper" style="overflow-x: auto;">
			<table class="alt" id="orderlist" style="white-space: nowrap">
					</table>
			
				</div>
			
			
			
			
			
	
	</section>
	
	<?php }  else{ ?>
	<section class="content fullwidth ordercomplete" style="padding-top: 60px; min-height: 400px; overflow: hidden;" id="foroverlay">
	    
	       <div class="tabbed">
					<ul class="tabs">
						<li><a href="../transactions" class="selected">Transactions</a></li>
						<li><a href="../referrals" class="">Referrals</a></li>
					 <li><a href="../profile">Profile</a></li>
					</ul>
		
	
				</div>
	    
	    
	<h2 class="textcenter" style="margin-top: 25px; padding-bottom: 10px; ">Order Details</h2>
	<div class="row" style="background: #FAFAFA; padding: 0 10px;">
	<div class="col-md-5">
	<h3 class="" style="margin-top: 15px;">Estimate Number: <span id="estno"><?php echo $invoiceid; ?></span></h3>
	
	<input type="hidden" name="inid" id="inid" value="<?php echo $invoiceid; ?>">
		<input type="hidden" name="ordtype" id="ordtype" value="<?php echo $type1; ?>">
	</div>
		<div class="col-md-6">
		<h3 class="text-right" style="margin-top: 15px;">Status: <span id="invstatus" style="border:none;"></span></h3>
		
	</div>
	
	
	</div>
	
	<div id="figure">
	</div>
	

	<div class="clear gap gap-small"></div>
	<h2 class="orderdetails textcenter">Order Summary</h2>
	
	<table class="plist" id="pdata">
	
	</table>
			
		<!--	<ul class="order-payment-list webonly" id="pdata">
			
                   
                    </ul> -->
	
	
	
<!--	<div class="row" style="margin-top: 35px;">

		<div class="col-md-6" style="">
		
		<div class="alert alert-grey">
	<h4 style="margin-top: 0; margin-bottom:0;">Door <?php echo $ddtext; ?></h4>
	<p id="ddtext">
	</p>
	
	
	</div>
		

	
	</div>
	
	
	</div>
	-->
	
	
	
	
	<div class="clear"></div>
			
	<div class="gap"></div>
	
	
	
		<h3 style="font-weight:400; text-align: center;">Go Paper-less! Upload your KYC Documents online and help us serve you faster. </h3>
		
		
		<?php if($type1=='sell'){ ?>
		<p class="textcenter" style="margin: 0;font-size: 13px;">Any one of the following documents:</p>
		<?php } ?>
		<div class="row" style="margin: 0 !important;">
		    <?php if($inc_gen!=1) echo '<p class="textcenter" style="color: #ff1e1e; font-size: 13px;">Documents upload has been disabled as the order is not in "Pending" Status. Please contact or support team to enable the documents upload.</p>'; ?>
		<?php
			if($class != 2)
			{
		?>
			<div class="col-md-2 col-border" >
		<!--	<h4>PAN Card:</h4>		-->
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $pan; ?> PAN Card</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="pan" id="file4" class="upload" /> <?php } ?>
				</div>
				<div id="pan_image" class="uploadresdiv"></div>
				<br />
					
					<div id="pan_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $panfile; ?>" target="_blank" ><?php echo $pan_prv; ?></a>
					
					</div>
					<div id="pan_prvkycDlt" class="dltContainer"><?php echo $pan_del; ?></div>
			</div>
		
			
			<div id="aadharCont" class="col-md-2 col-border" style="display:none;">
		<!--	<h4>Adhaar:</h4>	-->
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $adh; ?> Aadhar</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="adhaar" id="file1" class="upload" /> <?php } ?>
				</div>
				<div id="adhaar_image" class="uploadresdiv"></div>
				<br/>
		
					<div id="adhaar_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $aadharfile; ?>" target="_blank" ><?php echo $adh_prv; ?></a>
					
					
					</div>
					<div id="adhaar_prvkycDlt" class="dltContainer"><?php echo $adh_dlt ?></div>
			</div>
		
			
			<div class="col-md-2 col-border">
		<!--	<h4>Passport:</h4>		-->
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $pas; ?> Passport</span>
			<?php if($inc_gen==1) { ?>		<input type="file" name="passport" id="file2" class="upload" />  <?php } ?>
				</div>
				<div id="passport_image" class="uploadresdiv"></div>
				<br />
		
					<div id="passport_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $passportfile; ?>" target="_blank" ><?php echo $pas_prv; ?></a>
					
					</div>
					<div id="passport_prvkycDlt" class="dltContainer"><?php echo $pas_dlt; ?></div>
			</div>
			
			
			<div class="col-md-2 col-border">
		<!--	<h4>Passport2:</h4>		-->
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $pas2; ?> Passport Address Page</span>
			<?php if($inc_gen==1) { ?>		<input type="file" name="passport2" id="file9" class="upload" />  <?php } ?>
				</div>
				<div id="passport2_image" class="uploadresdiv"></div>
				<br />
		
					<div id="passport2_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $passport2file; ?>" target="_blank" ><?php echo $pas2_prv; ?></a>
					
					</div>
					<div id="passport2_prvkycDlt" class="dltContainer"><?php echo $pas2_dlt; ?></div>
			</div>
	
			<div class="col-md-2 col-border">
		<!--	<h4>Driving Lisence:</h4>		-->
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $dl; ?> Other ID</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="dl" id="file3" class="upload" /> <?php } ?>
				</div>
				<div id="oth_image" class="uploadresdiv"></div>
				<br />
		
					<div id="dl_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $othfile; ?>" target="_blank" ><?php echo $dl_prv; ?></a>
				
					</div>
					<div id="dl_prvkycDlt" class="dltContainer"><?php echo $dl_dlt; ?></div>
			</div>
	
			
			<?php
			}
			//If loop Starts for Buy Currency
			if($type1 == 'buy')
			{
			?>	
				
				<div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $a_tkt; ?> Air Ticket</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="a_tkt" id="file5" class="upload2" /><?php } ?>
				</div>
				<div id="a_tkt_image" class="uploadresdiv"></div>
				<br />
					
					<div id="a_tkt_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $aticketfile; ?>" target="_blank" ><?php echo $a_tkt_prv; ?></a>
					
					</div>
					<div id="a_tkt_prvkycDlt" class="dltContainer"><?php echo $a_tkt_del; ?></div>
				</div>
				
				<?php if($buy_purp=='holidayLeisure')
				{ ?>
				
				
				    <div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $a_tkt_return; ?> Return Air Ticket</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="a_tkt_return" id="file16" class="upload2" /><?php } ?>
				</div>
				<div id="a_tkt_return_image" class="uploadresdiv"></div>
				<br />
					
					<div id="a_tkt_return_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $aticketReturnfile; ?>" target="_blank" ><?php echo $a_tkt_return_prv; ?></a>
					
					</div>
					<div id="a_tkt_return_prvkycDlt" class="dltContainer"><?php echo $a_tkt_return_del; ?></div>
				</div>
				
				
				<?php } ?>
		
				
				<div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $vvisa; ?> Travel Visa</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="vvisa" id="file6" class="upload2" /> <?php } ?>
				</div>
				<div id="vvisa_image" class="uploadresdiv"></div>
				<br />
					
					<div id="vvisa_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $visafile; ?>" target="_blank" ><?php echo $vvisa_prv; ?></a>
					
					</div>
					<div id="vvisa_prvkycDlt" class="dltContainer"><?php echo $vvisa_del; ?></div>
				</div>
		
											<div class="col-md-2 col-border" style="text-align: center;">
			
				
				<a class="button button-rounded button-flat-caution button-complete1" style="margin-top: 10px; height: auto !important; line-height: 20px; padding-top: 5px; padding-bottom: 5px;" id="applicantmodal_btn" data-remodal-target="applicantmodal" href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i> Add Applicant Details</a>
				
				
				
				<br />
					<div id="sender_saved" style="text-align: center; margin-top: 20px;display: none;"><i class="fa fa-check-circle" style="color: #51a351;"></i>&nbsp;<span style="font-size: 12px;">Done</span></div>
			
					
					
				</div>
				
			<?php	
			}
			elseif($type1 == 'sell')
			{
				if($class == 1)
				{
			?>	
				<div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $ent_visa; ?> Indian Entry Visa</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="ent_visa" id="file11" class="upload2" /> <?php } ?>
				</div>
				<div id="ent_visa_image" class="uploadresdiv"></div>
				<br />
					
					<div id="ent_visa_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $indvisafile; ?>" target="_blank" ><?php echo $ent_visa_prv; ?></a>
					    
					</div>
					<div id="ent_visa_prvkycDlt" class="dltContainer"><?php echo $ent_visa_del; ?></div>
				</div>
		
				
				<div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $nr_stat; ?> NR Status Page</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="nr_stat" id="file12" class="upload2" /> <?php } ?>
				</div>
				<div id="nr_stat_image" class="uploadresdiv"></div>
				<br />
					
					<div id="nr_stat_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $nrstatusfile; ?>" target="_blank" ><?php echo $nr_stat_prv; ?></a>
					
					</div>
					<div id="nr_stat_prvkycDlt" class="dltContainer"><?php echo $nr_stat_del; ?></div>
				</div>
		
				
				
			<?php
				}
				elseif($class == 2)
				{
			?>
				
				<div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $valf_pass; ?> Foreign Passport</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="valf_pass" id="file13" class="upload2" /> <?php } ?>
				</div>
				<div id="valf_pass_image" class="uploadresdiv"></div>
				<br />
					
					<div id="valf_pass_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $fpassportfile; ?>" target="_blank" ><?php echo $valf_pass_prv; ?></a>
					
					</div>
					<div id="$valf_pass_prvkycDlt" class="dltContainer"><?php echo $valf_pass_del  ?></div>
				</div>
			
				
				<div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $ent_visa; ?> Indian Entry Visa</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="ent_visa" id="file11" class="upload2" /> <?php } ?>
				</div>
				<div id="ent_visa_image" class="uploadresdiv"></div>
				<br />
					
					<div id="ent_visa_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $indvisafile; ?>" target="_blank" ><?php echo $ent_visa_prv; ?></a>
					
					</div>
					<div id="ent_visa_prvkycDlt" class="dltContainer"><?php echo $ent_visa; ?></div>
				</div>
	
				
				
			<?php
				}
			}
			elseif($type1 == 'mt')
			{
				if($mt_purp == 'gr')
				{
			?>	
				<div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $ben_pass; ?> Beneficiary Passport</span>
			<?php if($inc_gen==1) { ?>		<input type="file" name="ben_pass" id="file7" class="upload2" /> <?php } ?>
				</div>
				<div id="ben_pass_image" class="uploadresdiv"></div>
				<br />
					
					<div id="ben_pass_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $benpassportfile; ?>" target="_blank" ><?php echo $ben_pass_prv; ?></a>
					
					</div>
					<div id="ben_passkycDlt" class="dltContainer"><?php echo $ben_pass_del; ?></div>
				</div>
					<?php
				}
				elseif($mt_purp == 'mcr')
				{
				    
				    	?>
				    	
				 				<div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $ben_pass; ?> Beneficiary Passport</span>
			<?php if($inc_gen==1) { ?>		<input type="file" name="ben_pass" id="file7" class="upload2" /> <?php } ?>
				</div>
				<div id="ben_pass_image" class="uploadresdiv"></div>
				<br />
					
					<div id="ben_pass_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $benpassportfile; ?>" target="_blank" ><?php echo $ben_pass_prv; ?></a>
		
					</div>
					<div id="ben_passkycDlt" class="dltContainer"><?php echo $ben_pass_del ?></div>
				</div>
			   	
				    	
				<?php
				}	    
				elseif($mt_purp == 'oe' || $mt_purp == 'oes')
				{
			?>
				<div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $stud_pass; ?> Student Passport</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="stud_pass" id="file8" class="upload2" /> <?php } ?>
				</div>
				<div id="stud_pass_image" class="uploadresdiv"></div>
				<br />
					
					<div id="stud_pass_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $studpassportfile; ?>" target="_blank" ><?php echo $stud_pass_prv; ?></a>
					
					</div>
					<div id="stud_passkycDlt" class="dltContainer"><?php echo $stud_pass_del ?> </div>
				</div>
		
				<div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $purp_proof; ?> Purpose Proof</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="purp_proof" id="file10" class="upload2"  /> <?php } ?>
				</div>
				<div id="purp_proof_image" class="uploadresdiv"></div>
				<br />
					
					<div id="purp_proof_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $purprooffile; ?>" target="_blank" ><?php echo $purp_proof_prv; ?></a>
					
					</div>
					<div id="purp_proofkycDlt" class="dltContainer"><?php echo $purp_proof_del; ?> </div>
				</div>
		
	<?php
				}
					elseif($mt_purp == 'eecf')
				{
				    	?>
				    	
						<div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $purp_proof; ?> Purpose Proof</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="purp_proof" id="file10" class="upload2" /> <?php } ?>
				</div>
				<div id="purp_proof_image" class="uploadresdiv"></div>
				<br />
					
					<div id="purp_proof_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $purprooffile; ?>" target="_blank" ><?php echo $purp_proof_prv; ?></a>
					
					</div>
					<div id="purp_proofkycDlt" class="dltContainer"><?php echo $purp_proof_del; ?> </div>
				</div>  	
				    
				    
			<?php		}    
				elseif($mt_purp == 'vf')
				{
			?>
				<div class="col-md-2 col-border" >
				<div class="fileUpload" style="text-align: center; <?php if($inc_gen!=1) echo 'background: #cecece;'; ?>">
					<span class="uploadtxt"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo $purp_proof; ?> Purpose Proof</span>
				<?php if($inc_gen==1) { ?>	<input type="file" name="purp_proof" id="file10" class="upload2" /> <?php } ?>
				</div>
				<div id="purp_proof_image" class="uploadresdiv"></div>
				<br />
					
					<div id="purp_proof_prv" class="uploadresdiv"><a href="kycview?file=<?php echo $purprooffile; ?>" target="_blank" ><?php echo $purp_proof_prv; ?></a>
					
					</div>
					<div id="purp_proofkycDlt" class="dltContainer"><?php echo $purp_proof_del; ?> </div>
				</div>
			
			

			
			<?php	
				}	?>
				
				<?php if($inc_gen==1) { ?>
		<div class="col-md-2 col-border" style="text-align: center;">
			
				
				<a class="button button-rounded button-flat-caution button-complete1" style="margin-top: 10px; height: auto !important; line-height: 20px; padding-top: 5px; padding-bottom: 5px;" id="sendermodal_btn" data-remodal-target="sendermodal" href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i> Add Remitter Details</a>
				
				
				
				<br />
			<div id="sender_saved" style="text-align: center; margin-top: 20px;display: none;"><i class="fa fa-check-circle" style="color: #51a351;"></i>&nbsp;<span style="font-size: 12px;">Done</span></div>
					
					
				</div>
				
				<div class="col-md-2 col-border" style="text-align: center;">
			
				
				<a class="button button-rounded button-flat-caution button-complete1" id="benfmodal_btn" data-remodal-target="benfmodal" style="margin-top: 10px; height: auto !important; line-height: 20px; padding-top: 5px; padding-bottom: 5px;" href="../../" ><i class="fa fa-plus" aria-hidden="true"></i> Add Beneficiary Details</a>
				
				
				
				<br />
					<div id="benf_saved" style="text-align: center; margin-top: 20px;display: none;"><i class="fa fa-check-circle" style="color: #51a351;"></i>&nbsp;<span style="font-size: 12px;">Done</span></div>
		
					
					
				</div>		
				
			<?php } ?>	
				
				
		<?php	}
			?>
		</div>		
		

<p style="font-size: 13px;">Please Note : The forex store may sometimes request for original KYC documents for verification. Kindly keep the originals handy in such a case. If you are not able to upload the KYC, simply e-mail the documents to kyc@extravelmoney.com or send via Whatsapp to 04842886900</p>	
					
					<div class="clear gap"></div>

			
			
		<p style="text-align: center;"><a href="../transactions" class="button button-rounded button-flat-caution"><i class="fa fa-arrow-left"></i> Back to Transactions</a></p>
			
			
			
	
	</section>
	
	

	
	
	<?php } ?>
	
			<div class="remodal" id="user_profile_modal" data-remodal-id="user_profile" data-remodal-options="hashTracking: false, closeOnOutsideClick: false, closeOnEscape: false" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" style="border-radius: 5px;">
  
  <div>
    <h3 id="modal1Title" style="margin-top: 0;">Complete your Profile</h3>
	
	<div style="display: block; text-align: left; margin-top: 20px;">
	
<p><label>First Name:</label>
	<input type="text" name="user_f_name" placeholder="First Name" value="<?php echo($fname); ?>" style="width: 94%;">
</p>
<p><label>Last Name:</label>
	<input type="text" name="user_l_name" placeholder="Last Name" value="<?php echo($lname); ?>" style="width: 94%;">
</p>
<p><label>Email:</label>
		<input type="text" name="user_reg_email" placeholder="Email Address" value="<?php echo($email); ?>" style="width: 94%;">
</p>

<p><label>Category:</label><select name="user_class" id="user_class" style="width: 100%;padding: 10px 2%;"><option value="Resident Indian" <?php if($class=='Resident Indian') echo 'selected'; ?>>Resident Indian</option>
<option value="NRI" <?php if($class=='NRI') echo 'selected'; ?>>NRI</option>
<option value="Foreigner" <?php if($class=='Foreigner') echo 'selected'; ?>>Foreigner</option>
</select></p>

<p><input type="checkbox" id="wa_notify" name="wa_notify" value="1" <?php if($wa_notify==1) echo 'checked'; ?> ><label for="wa_notify" style="display: inline-block; margin-left: 5px;">Opt for notifications via WhatsApp?</label>
	
</p>

<p class="msg success user_profile_success" style="margin-top: 0px; display: none;">Profile Details Saved.</p>
      <p class="msg error user_profile_error" style="margin-top: 0px; display: none;">Please fill in all fields.</p>

 <p style="text-align: center; margin-top: 25px;">
 <button class="remodal-confirm user_profile_save" style="width: 180px;" >Save</button>
</p>
</div>


   
  </div>
  
</div>
	


<?php include $fold.'footer.php'; ?>


<?php if($type1=='buy'){ ?>

		<div class="remodal" id="buyapplicantmodal" data-remodal-id="applicantmodal" data-remodal-options="hashTracking: false" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" style="border-radius: 5px;">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h3 id="modal1Title" style="margin-top: 0;">Applicant Details: </h3>
	
	<div id="" style="display: block; text-align: left; margin-top: 5px;">
		<form id="applicant_data_buy_cust" action="javascript:;">
	
	<div class="row">
	<div class="col-md-5">
	<label>Applicant Full Name:</label>
	<input type="text" name="s_name" id="s_name" placeholder="" style="width: 100%; " required>
	</div>
	<div class="col-md-5">
	<label>Applicant PAN no:</label>
	<input type="text" name="s_pan" id="s_pan" placeholder="" style="width: 100%; " required>
	</div>
	<div class="col-md-5">
	<label>Applicant Address (As per the KYC ID provided):</label>
	<textarea name="s_addr" id="s_addr" placeholder="" style="width: 100%; min-height: 95px;" required></textarea>

	</div>
	<div class="col-md-5">
	<label>State:</label>
		 <select name="s_state" id="s_state" onchange='select_s_dist(this.value)'  style="width: 100%; ">
								
									
						  </select>	
<label>District:</label>
<select name="s_dist" id="s_dist"  style="width: 100%; " required>
								
								
						  </select>						  
									
	</div>
	<div style="clear:both"></div>
	
		<div class="col-md-5">
	<label>Purpose of Travel:</label>
		 <select name="travelpurp" id="travelpurp" style="width: 100%; " required>
				<option value=''>-- Please Select --</option>	
				<option value='Holiday/Leisure Trip (S0306)'>Holiday/Leisure Trip (S0306)</option>	
				<option value='Travel for Education (S0305)'>Travel for Education (S0305)</option>	
				<option value='Business Travel (S0301)'>Business Travel (S0301)</option>	
				<option value='Travel for Pilgrimage (S303)'>Travel for Pilgrimage (S303)</option>	
				<option value='Travel for Medical Treatment (S0304)'>Travel for Medical Treatment (S0304)</option>						
						  </select>	
					  
									
	</div>
		<div style="clear:both" class="hideifcash"></div>
	<div class="col-md-5 hideifcash">
	<label>Applicant Bank Name for this purchase:</label>
	<select name="s_bank_name" id="s_bank_name"  style="width: 100%; " required>
					<option value=''>-- Please Select --</option>		
<option value='AB Bank Ltd'>AB Bank Ltd</option>
<option value='Abu Dhabi Commercial Bank Ltd'>Abu Dhabi Commercial Bank Ltd</option>
<option value='Aditya Birla Idea Payments Bank Ltd'>Aditya Birla Idea Payments Bank Ltd</option>
<option value='Airtel Payments Bank Ltd'>Airtel Payments Bank Ltd</option>
<option value='American Express Banking Corp'>American Express Banking Corp</option>
<option value='Andhra Pradesh GVB'>Andhra Pradesh GVB</option>
<option value='Andhra Pragathi Grameena Bank'>Andhra Pragathi Grameena Bank</option>
<option value='Arunachal Pradesh Rural Bank'>Arunachal Pradesh Rural Bank</option>
<option value='Aryavart Bank'>Aryavart Bank</option>
<option value='Assam Gramin Vikash Bank'>Assam Gramin Vikash Bank</option>
<option value='Au Small Finance Bank Ltd'>Au Small Finance Bank Ltd</option>
<option value='Australia and New Zealand Banking Group Ltd'>Australia and New Zealand Banking Group Ltd</option>
<option value='Axis Bank Ltd'>Axis Bank Ltd</option>
<option value='Bandhan Bank Ltd'>Bandhan Bank Ltd</option>
<option value='Bangiya Gramin Vikash Bank'>Bangiya Gramin Vikash Bank</option>
<option value='Bank of America'>Bank of America</option>
<option value='Bank of Bahrain & Kuwait BSC'>Bank of Bahrain & Kuwait BSC</option>
<option value='Bank of Baroda'>Bank of Baroda</option>
<option value='Bank of Ceylon'>Bank of Ceylon</option>
<option value='Bank of India'>Bank of India</option>
<option value='Bank of Maharashtra'>Bank of Maharashtra</option>
<option value='Bank of Nova Scotia'>Bank of Nova Scotia</option>
<option value='Barclays Bank Plc'>Barclays Bank Plc</option>
<option value='Baroda Gujarat Gramin Bank'>Baroda Gujarat Gramin Bank</option>
<option value='Baroda Rajasthan Kshetriya Gramin Bank'>Baroda Rajasthan Kshetriya Gramin Bank</option>
<option value='Baroda Uttar Pradesh Gramin Bank'>Baroda Uttar Pradesh Gramin Bank</option>
<option value='BNP Paribas'>BNP Paribas</option>
<option value='Canara Bank'>Canara Bank</option>
<option value='Capital Small Finance Bank Ltd'>Capital Small Finance Bank Ltd</option>
<option value='Central Bank of India'>Central Bank of India</option>
<option value='Chaitanya Godavari GB'>Chaitanya Godavari GB</option>
<option value='Chhattisgarh Rajya Gramin Bank'>Chhattisgarh Rajya Gramin Bank</option>
<option value='Citibank'>Citibank</option>
<option value='City Union Bank Ltd'>City Union Bank Ltd</option>
<option value='Coastal Local Area Bank Ltd'>Coastal Local Area Bank Ltd</option>
<option value='Cooperatieve Rabobank U.A.'>Cooperatieve Rabobank U.A.</option>
<option value='Credit Agricole Corporate & Investment Bank'>Credit Agricole Corporate & Investment Bank</option>
<option value='Credit Suisse A.G'>Credit Suisse A.G</option>
<option value='CSB Bank Limited'>CSB Bank Limited</option>
<option value='CTBC Bank Co Ltd'>CTBC Bank Co Ltd</option>
<option value='Dakshin Bihar Gramin Bank'>Dakshin Bihar Gramin Bank</option>
<option value='DBS Bank Ltd'>DBS Bank Ltd</option>
<option value='DCB Bank Ltd'>DCB Bank Ltd</option>
<option value='Deutsche Bank'>Deutsche Bank</option>
<option value='Dhanlaxmi Bank Ltd'>Dhanlaxmi Bank Ltd</option>
<option value='Doha Bank'>Doha Bank</option>
<option value='Ellaquai Dehati Bank'>Ellaquai Dehati Bank</option>
<option value='Emirates NBD Bank PJSC'>Emirates NBD Bank PJSC</option>
<option value='Equitas Small Finance Bank Ltd'>Equitas Small Finance Bank Ltd</option>
<option value='ESAF Small Finance Bank Ltd'>ESAF Small Finance Bank Ltd</option>
<option value='Export-Import Bank of India'>Export-Import Bank of India</option>
<option value='Federal Bank Ltd'>Federal Bank Ltd</option>
<option value='Fincare Small Finance Bank Ltd'>Fincare Small Finance Bank Ltd</option>
<option value='FINO Payments Bank Ltd'>FINO Payments Bank Ltd</option>
<option value='First Abu Dhabi Bank PJSC'>First Abu Dhabi Bank PJSC</option>
<option value='FirstRand Bank Ltd'>FirstRand Bank Ltd</option>
<option value='HDFC Bank Ltd'>HDFC Bank Ltd</option>
<option value='Himachal Pradesh Gramin Bank'>Himachal Pradesh Gramin Bank</option>
<option value='HSBC Ltd'>HSBC Ltd</option>
<option value='ICICI Bank Ltd'>ICICI Bank Ltd</option>
<option value='IDBI Bank Limited'>IDBI Bank Limited</option>
<option value='IDFC FIRST Bank Limited'>IDFC FIRST Bank Limited</option>
<option value='India Post Payments Bank Ltd'>India Post Payments Bank Ltd</option>
<option value='Indian Bank'>Indian Bank</option>
<option value='Indian Overseas Bank'>Indian Overseas Bank</option>
<option value='IndusInd Bank Ltd'>IndusInd Bank Ltd</option>
<option value='Industrial & Commercial Bank of China Ltd'>Industrial & Commercial Bank of China Ltd</option>
<option value='Industrial Bank of Korea'>Industrial Bank of Korea</option>
<option value='J&K Grameen Bank'>J&K Grameen Bank</option>
<option value='J.P. Morgan Chase Bank'>J.P. Morgan Chase Bank</option>
<option value='Jammu & Kashmir Bank Ltd'>Jammu & Kashmir Bank Ltd</option>
<option value='Jana Small Finance Bank Ltd'>Jana Small Finance Bank Ltd</option>
<option value='Jharkhand Rajya Gramin Bank'>Jharkhand Rajya Gramin Bank</option>
<option value='Jio Payments Bank Ltd'>Jio Payments Bank Ltd</option>
<option value='JSC VTB Bank'>JSC VTB Bank</option>
<option value='Karnataka Bank Ltd'>Karnataka Bank Ltd</option>
<option value='Karnataka Gramin Bank'>Karnataka Gramin Bank</option>
<option value='Karnataka Vikas Gramin Bank'>Karnataka Vikas Gramin Bank</option>
<option value='Karur Vysya Bank Ltd'>Karur Vysya Bank Ltd</option>
<option value='Kashi Gomti Samyut Gramin Bank'>Kashi Gomti Samyut Gramin Bank</option>
<option value='KEB Hana Bank'>KEB Hana Bank</option>
<option value='Kerala Gramin Bank'>Kerala Gramin Bank</option>
<option value='Kotak Mahindra Bank Ltd'>Kotak Mahindra Bank Ltd</option>
<option value='Krishna Bhima Samruddhi LAB Ltd'>Krishna Bhima Samruddhi LAB Ltd</option>
<option value='Krung Thai Bank Public Co. Ltd'>Krung Thai Bank Public Co. Ltd</option>
<option value='Lakshmi Vilas Bank Ltd'>Lakshmi Vilas Bank Ltd</option>
<option value='Madhya Pradesh Gramin Bank'>Madhya Pradesh Gramin Bank</option>
<option value='Madhyanchal Gramin Bank'>Madhyanchal Gramin Bank</option>
<option value='Maharashtra GB'>Maharashtra GB</option>
<option value='Manipur Rural Bank'>Manipur Rural Bank</option>
<option value='Mashreq Bank PSC'>Mashreq Bank PSC</option>
<option value='Meghalaya Rural Bank'>Meghalaya Rural Bank</option>
<option value='Mizoram Rural Bank'>Mizoram Rural Bank</option>
<option value='Mizuho Bank Ltd'>Mizuho Bank Ltd</option>
<option value='Nagaland Rural Bank'>Nagaland Rural Bank</option>
<option value='Nainital bank Ltd'>Nainital bank Ltd</option>
<option value='National Australia Bank'>National Australia Bank</option>
<option value='National Bank for Agriculture and Rural Development'>National Bank for Agriculture and Rural Development</option>
<option value='National Housing Bank'>National Housing Bank</option>
<option value='North East Small finance Bank Ltd'>North East Small finance Bank Ltd</option>
<option value='NSDL Payments Bank Limited'>NSDL Payments Bank Limited</option>
<option value='Odisha Gramya Bank'>Odisha Gramya Bank</option>
<option value='Paschim Banga Gramin Bank'>Paschim Banga Gramin Bank</option>
<option value='Paytm Payments Bank Ltd'>Paytm Payments Bank Ltd</option>
<option value='Prathama U.P. Gramin Bank'>Prathama U.P. Gramin Bank</option>
<option value='PT Bank Maybank Indonesia TBK'>PT Bank Maybank Indonesia TBK</option>
<option value='Puduvai Bharathiar Grama Bank'>Puduvai Bharathiar Grama Bank</option>
<option value='Punjab & Sind Bank'>Punjab & Sind Bank</option>
<option value='Punjab Gramin Bank'>Punjab Gramin Bank</option>
<option value='Punjab National Bank'>Punjab National Bank</option>
<option value='Purvanchal Bank'>Purvanchal Bank</option>
<option value='Qatar National Bank SAQ'>Qatar National Bank SAQ</option>
<option value='Rajasthan Marudhara Gramin Bank'>Rajasthan Marudhara Gramin Bank</option>
<option value='RBL Bank Ltd'>RBL Bank Ltd</option>
<option value='Saptagiri Grameena Bank'>Saptagiri Grameena Bank</option>
<option value='Sarva Haryana Gramin Bank'>Sarva Haryana Gramin Bank</option>
<option value='Saurashtra Gramin Bank'>Saurashtra Gramin Bank</option>
<option value='Sberbank'>Sberbank</option>
<option value='Shinhan Bank'>Shinhan Bank</option>
<option value='Small Industries Development Bank of India'>Small Industries Development Bank of India</option>
<option value='Societe Generale'>Societe Generale</option>
<option value='Sonali Bank Ltd'>Sonali Bank Ltd</option>
<option value='South Indian Bank Ltd'>South Indian Bank Ltd</option>
<option value='Standard Chartered Bank'>Standard Chartered Bank</option>
<option value='State Bank of India'>State Bank of India</option>
<option value='Subhadra Local Bank Ltd'>Subhadra Local Bank Ltd</option>
<option value='Sumitomo Mitsui Banking Corporation'>Sumitomo Mitsui Banking Corporation</option>
<option value='Suryoday Small Finance Bank Ltd'>Suryoday Small Finance Bank Ltd</option>
<option value='Tamil Nadu Grama Bank'>Tamil Nadu Grama Bank</option>
<option value='Tamilnad Mercantile Bank Ltd'>Tamilnad Mercantile Bank Ltd</option>
<option value='Telengana Grameena Bank'>Telengana Grameena Bank</option>
<option value='The Bank of Tokyo- Mitsubishi UFJ Ltd'>The Bank of Tokyo- Mitsubishi UFJ Ltd</option>
<option value='The Royal Bank of Scotland plc'>The Royal Bank of Scotland plc</option>
<option value='Tripura Gramin Bank'>Tripura Gramin Bank</option>
<option value='UCO Bank'>UCO Bank</option>
<option value='Ujjivan Small Finance Bank Ltd'>Ujjivan Small Finance Bank Ltd</option>
<option value='Union Bank of India'>Union Bank of India</option>
<option value='United Overseas Bank Ltd'>United Overseas Bank Ltd</option>
<option value='United Bank of India'>United Bank of India</option>
<option value='Utkal Grameen Bank'>Utkal Grameen Bank</option>
<option value='Utkarsh Small Finance Bank Ltd'>Utkarsh Small Finance Bank Ltd</option>
<option value='Uttar Bihar Gramin Bank'>Uttar Bihar Gramin Bank</option>
<option value='Uttarakhand Gramin Bank'>Uttarakhand Gramin Bank</option>
<option value='UttarBanga Kshetriya Gramin Bank'>UttarBanga Kshetriya Gramin Bank</option>
<option value='Vidharbha Konkan Gramin Bank'>Vidharbha Konkan Gramin Bank</option>
<option value='Westpac Banking Corporation'>Westpac Banking Corporation</option>
<option value='Woori Bank'>Woori Bank</option>
<option value='Yes Bank Ltd'>Yes Bank Ltd</option>
									
						  </select>	
	</div>
	<div class="col-md-5 hideifcash">
	<label>Applicant Bank Account Number:</label>
	<input type="text" name="s_acno" id="s_acno" value="" placeholder="" style="width: 100%; " required>
	</div>
	
	
	<div style="clear:both"></div>
	
	<h5 style="margin-top: 0;     margin-top: 15px;    font-size: 13px;    margin-left: 15px;    margin-bottom: 0px;    font-weight: 500;">Details of international transactions made in the current financial year (01 April 2024 - 31 March 2025):</h5>
	<div id='TextBoxesGroup'>
	
	<!--<div id="TextBoxDiv1">
	 <div class="col-md-3">
	<input type="text" name="remit_date1" id="remit_date1" value="" placeholder="Transaction Date" style="width: 100%; margin-top: 10px;">
	</div>
	<div class="col-md-3">
	<input type="text" name="remit_amt1" id="remit_amt1" value="" placeholder="Amount" style="width: 100%; margin-top: 10px;">
	</div>
	<div class="col-md-4">
	<input type="text" name="remit_branch1" id="remit_branch1" value="" placeholder="AD Name & Branch" style="width: 100%; margin-top: 10px;">
	</div>
	<div style="clear:both"></div> 
</div>-->
	
	
	
	
	</div>
	<a class="button button-rounded button-flat-etmcolor button-add" id="add_old_txn" title="" href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i> Add Transaction</a>
	<a class="button button-rounded button-flat-etmcolor button-rem" id="del_old_txn" title="" href="javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i> Remove Transaction</a>
	
	
	
	<div class="col-md-12" style="text-align:center;">
 <button class="remodal-confirm" id="sender_details_submit" type="submit" style="margin-top: 25px; margin-right: 10px; width: 180px;" >Save</button>

	</div>
	</div>


 
</form>
</div>

<span id="sender_details_submit_success" style="display: none; padding: 9px;color: rgb(0 160 20); ">Applicant Details Saved Successfully</span>
   
  </div>
  
</div>

	<?php } ?>

<?php if($type1=='mt'){ ?>

	<div class="remodal" id="mtsendermodal" data-remodal-id="sendermodal" data-remodal-options="hashTracking: false" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" style="border-radius: 5px;">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h3 id="modal1Title" style="margin-top: 0;">Remitter Details: </h3>
	
	<div id="" style="display: block; text-align: left; margin-top: 5px;">
		<form id="sender_data_mt_cust" action="javascript:;">
	
	<div class="row">
	<div class="col-md-5">
	<label>Remitter (Sender) Full Name:</label>
	<input type="text" name="s_name" id="s_name" placeholder="" style="width: 100%; " required>
	</div>
	<div class="col-md-5">
	<label>Remitter PAN no:</label>
	<input type="text" name="s_pan" id="s_pan" placeholder="" style="width: 100%; " required>
	</div>
	<div class="col-md-5">
	<label>Remitter Address (As per the KYC ID provided):</label>
	<textarea name="s_addr" id="s_addr" placeholder="" style="width: 100%; min-height: 95px;" required></textarea>

	</div>
	<div class="col-md-5">
	<label>State:</label>
		 <select name="s_state" id="s_state" onchange='select_s_dist(this.value)'  style="width: 100%; ">
								
									
						  </select>	
<label>District:</label>
<select name="s_dist" id="s_dist"  style="width: 100%; " required>
								
								
						  </select>						  
									
	</div>
	<div style="clear:both"></div>
	<div class="col-md-5">
	<label>Remitter Bank Name for this remitance:</label>
	<select name="s_bank_name" id="s_bank_name"  style="width: 100%; " required>
					<option value=''>-- Please Select --</option>		
<option value='AB Bank Ltd'>AB Bank Ltd</option>
<option value='Abu Dhabi Commercial Bank Ltd'>Abu Dhabi Commercial Bank Ltd</option>
<option value='Aditya Birla Idea Payments Bank Ltd'>Aditya Birla Idea Payments Bank Ltd</option>
<option value='Airtel Payments Bank Ltd'>Airtel Payments Bank Ltd</option>
<option value='American Express Banking Corp'>American Express Banking Corp</option>
<option value='Andhra Pradesh GVB'>Andhra Pradesh GVB</option>
<option value='Andhra Pragathi Grameena Bank'>Andhra Pragathi Grameena Bank</option>
<option value='Arunachal Pradesh Rural Bank'>Arunachal Pradesh Rural Bank</option>
<option value='Aryavart Bank'>Aryavart Bank</option>
<option value='Assam Gramin Vikash Bank'>Assam Gramin Vikash Bank</option>
<option value='Au Small Finance Bank Ltd'>Au Small Finance Bank Ltd</option>
<option value='Australia and New Zealand Banking Group Ltd'>Australia and New Zealand Banking Group Ltd</option>
<option value='Axis Bank Ltd'>Axis Bank Ltd</option>
<option value='Bandhan Bank Ltd'>Bandhan Bank Ltd</option>
<option value='Bangiya Gramin Vikash Bank'>Bangiya Gramin Vikash Bank</option>
<option value='Bank of America'>Bank of America</option>
<option value='Bank of Bahrain & Kuwait BSC'>Bank of Bahrain & Kuwait BSC</option>
<option value='Bank of Baroda'>Bank of Baroda</option>
<option value='Bank of Ceylon'>Bank of Ceylon</option>
<option value='Bank of India'>Bank of India</option>
<option value='Bank of Maharashtra'>Bank of Maharashtra</option>
<option value='Bank of Nova Scotia'>Bank of Nova Scotia</option>
<option value='Barclays Bank Plc'>Barclays Bank Plc</option>
<option value='Baroda Gujarat Gramin Bank'>Baroda Gujarat Gramin Bank</option>
<option value='Baroda Rajasthan Kshetriya Gramin Bank'>Baroda Rajasthan Kshetriya Gramin Bank</option>
<option value='Baroda Uttar Pradesh Gramin Bank'>Baroda Uttar Pradesh Gramin Bank</option>
<option value='BNP Paribas'>BNP Paribas</option>
<option value='Canara Bank'>Canara Bank</option>
<option value='Capital Small Finance Bank Ltd'>Capital Small Finance Bank Ltd</option>
<option value='Central Bank of India'>Central Bank of India</option>
<option value='Chaitanya Godavari GB'>Chaitanya Godavari GB</option>
<option value='Chhattisgarh Rajya Gramin Bank'>Chhattisgarh Rajya Gramin Bank</option>
<option value='Citibank'>Citibank</option>
<option value='City Union Bank Ltd'>City Union Bank Ltd</option>
<option value='Coastal Local Area Bank Ltd'>Coastal Local Area Bank Ltd</option>
<option value='Cooperatieve Rabobank U.A.'>Cooperatieve Rabobank U.A.</option>
<option value='Credit Agricole Corporate & Investment Bank'>Credit Agricole Corporate & Investment Bank</option>
<option value='Credit Suisse A.G'>Credit Suisse A.G</option>
<option value='CSB Bank Limited'>CSB Bank Limited</option>
<option value='CTBC Bank Co Ltd'>CTBC Bank Co Ltd</option>
<option value='Dakshin Bihar Gramin Bank'>Dakshin Bihar Gramin Bank</option>
<option value='DBS Bank Ltd'>DBS Bank Ltd</option>
<option value='DCB Bank Ltd'>DCB Bank Ltd</option>
<option value='Deutsche Bank'>Deutsche Bank</option>
<option value='Dhanlaxmi Bank Ltd'>Dhanlaxmi Bank Ltd</option>
<option value='Doha Bank'>Doha Bank</option>
<option value='Ellaquai Dehati Bank'>Ellaquai Dehati Bank</option>
<option value='Emirates NBD Bank PJSC'>Emirates NBD Bank PJSC</option>
<option value='Equitas Small Finance Bank Ltd'>Equitas Small Finance Bank Ltd</option>
<option value='ESAF Small Finance Bank Ltd'>ESAF Small Finance Bank Ltd</option>
<option value='Export-Import Bank of India'>Export-Import Bank of India</option>
<option value='Federal Bank Ltd'>Federal Bank Ltd</option>
<option value='Fincare Small Finance Bank Ltd'>Fincare Small Finance Bank Ltd</option>
<option value='FINO Payments Bank Ltd'>FINO Payments Bank Ltd</option>
<option value='First Abu Dhabi Bank PJSC'>First Abu Dhabi Bank PJSC</option>
<option value='FirstRand Bank Ltd'>FirstRand Bank Ltd</option>
<option value='HDFC Bank Ltd'>HDFC Bank Ltd</option>
<option value='Himachal Pradesh Gramin Bank'>Himachal Pradesh Gramin Bank</option>
<option value='HSBC Ltd'>HSBC Ltd</option>
<option value='ICICI Bank Ltd'>ICICI Bank Ltd</option>
<option value='IDBI Bank Limited'>IDBI Bank Limited</option>
<option value='IDFC FIRST Bank Limited'>IDFC FIRST Bank Limited</option>
<option value='India Post Payments Bank Ltd'>India Post Payments Bank Ltd</option>
<option value='Indian Bank'>Indian Bank</option>
<option value='Indian Overseas Bank'>Indian Overseas Bank</option>
<option value='IndusInd Bank Ltd'>IndusInd Bank Ltd</option>
<option value='Industrial & Commercial Bank of China Ltd'>Industrial & Commercial Bank of China Ltd</option>
<option value='Industrial Bank of Korea'>Industrial Bank of Korea</option>
<option value='J&K Grameen Bank'>J&K Grameen Bank</option>
<option value='J.P. Morgan Chase Bank'>J.P. Morgan Chase Bank</option>
<option value='Jammu & Kashmir Bank Ltd'>Jammu & Kashmir Bank Ltd</option>
<option value='Jana Small Finance Bank Ltd'>Jana Small Finance Bank Ltd</option>
<option value='Jharkhand Rajya Gramin Bank'>Jharkhand Rajya Gramin Bank</option>
<option value='Jio Payments Bank Ltd'>Jio Payments Bank Ltd</option>
<option value='JSC VTB Bank'>JSC VTB Bank</option>
<option value='Karnataka Bank Ltd'>Karnataka Bank Ltd</option>
<option value='Karnataka Gramin Bank'>Karnataka Gramin Bank</option>
<option value='Karnataka Vikas Gramin Bank'>Karnataka Vikas Gramin Bank</option>
<option value='Karur Vysya Bank Ltd'>Karur Vysya Bank Ltd</option>
<option value='Kashi Gomti Samyut Gramin Bank'>Kashi Gomti Samyut Gramin Bank</option>
<option value='KEB Hana Bank'>KEB Hana Bank</option>
<option value='Kerala Gramin Bank'>Kerala Gramin Bank</option>
<option value='Kotak Mahindra Bank Ltd'>Kotak Mahindra Bank Ltd</option>
<option value='Krishna Bhima Samruddhi LAB Ltd'>Krishna Bhima Samruddhi LAB Ltd</option>
<option value='Krung Thai Bank Public Co. Ltd'>Krung Thai Bank Public Co. Ltd</option>
<option value='Lakshmi Vilas Bank Ltd'>Lakshmi Vilas Bank Ltd</option>
<option value='Madhya Pradesh Gramin Bank'>Madhya Pradesh Gramin Bank</option>
<option value='Madhyanchal Gramin Bank'>Madhyanchal Gramin Bank</option>
<option value='Maharashtra GB'>Maharashtra GB</option>
<option value='Manipur Rural Bank'>Manipur Rural Bank</option>
<option value='Mashreq Bank PSC'>Mashreq Bank PSC</option>
<option value='Meghalaya Rural Bank'>Meghalaya Rural Bank</option>
<option value='Mizoram Rural Bank'>Mizoram Rural Bank</option>
<option value='Mizuho Bank Ltd'>Mizuho Bank Ltd</option>
<option value='Nagaland Rural Bank'>Nagaland Rural Bank</option>
<option value='Nainital bank Ltd'>Nainital bank Ltd</option>
<option value='National Australia Bank'>National Australia Bank</option>
<option value='National Bank for Agriculture and Rural Development'>National Bank for Agriculture and Rural Development</option>
<option value='National Housing Bank'>National Housing Bank</option>
<option value='North East Small finance Bank Ltd'>North East Small finance Bank Ltd</option>
<option value='NSDL Payments Bank Limited'>NSDL Payments Bank Limited</option>
<option value='Odisha Gramya Bank'>Odisha Gramya Bank</option>
<option value='Paschim Banga Gramin Bank'>Paschim Banga Gramin Bank</option>
<option value='Paytm Payments Bank Ltd'>Paytm Payments Bank Ltd</option>
<option value='Prathama U.P. Gramin Bank'>Prathama U.P. Gramin Bank</option>
<option value='PT Bank Maybank Indonesia TBK'>PT Bank Maybank Indonesia TBK</option>
<option value='Puduvai Bharathiar Grama Bank'>Puduvai Bharathiar Grama Bank</option>
<option value='Punjab & Sind Bank'>Punjab & Sind Bank</option>
<option value='Punjab Gramin Bank'>Punjab Gramin Bank</option>
<option value='Punjab National Bank'>Punjab National Bank</option>
<option value='Purvanchal Bank'>Purvanchal Bank</option>
<option value='Qatar National Bank SAQ'>Qatar National Bank SAQ</option>
<option value='Rajasthan Marudhara Gramin Bank'>Rajasthan Marudhara Gramin Bank</option>
<option value='RBL Bank Ltd'>RBL Bank Ltd</option>
<option value='Saptagiri Grameena Bank'>Saptagiri Grameena Bank</option>
<option value='Sarva Haryana Gramin Bank'>Sarva Haryana Gramin Bank</option>
<option value='Saurashtra Gramin Bank'>Saurashtra Gramin Bank</option>
<option value='Sberbank'>Sberbank</option>
<option value='Shinhan Bank'>Shinhan Bank</option>
<option value='Small Industries Development Bank of India'>Small Industries Development Bank of India</option>
<option value='Societe Generale'>Societe Generale</option>
<option value='Sonali Bank Ltd'>Sonali Bank Ltd</option>
<option value='South Indian Bank Ltd'>South Indian Bank Ltd</option>
<option value='Standard Chartered Bank'>Standard Chartered Bank</option>
<option value='State Bank of India'>State Bank of India</option>
<option value='Subhadra Local Bank Ltd'>Subhadra Local Bank Ltd</option>
<option value='Sumitomo Mitsui Banking Corporation'>Sumitomo Mitsui Banking Corporation</option>
<option value='Suryoday Small Finance Bank Ltd'>Suryoday Small Finance Bank Ltd</option>
<option value='Tamil Nadu Grama Bank'>Tamil Nadu Grama Bank</option>
<option value='Tamilnad Mercantile Bank Ltd'>Tamilnad Mercantile Bank Ltd</option>
<option value='Telengana Grameena Bank'>Telengana Grameena Bank</option>
<option value='The Bank of Tokyo- Mitsubishi UFJ Ltd'>The Bank of Tokyo- Mitsubishi UFJ Ltd</option>
<option value='The Royal Bank of Scotland plc'>The Royal Bank of Scotland plc</option>
<option value='Tripura Gramin Bank'>Tripura Gramin Bank</option>
<option value='UCO Bank'>UCO Bank</option>
<option value='Ujjivan Small Finance Bank Ltd'>Ujjivan Small Finance Bank Ltd</option>
<option value='Union Bank of India'>Union Bank of India</option>
<option value='United Overseas Bank Ltd'>United Overseas Bank Ltd</option>
<option value='Utkal Grameen Bank'>Utkal Grameen Bank</option>
<option value='Utkarsh Small Finance Bank Ltd'>Utkarsh Small Finance Bank Ltd</option>
<option value='Uttar Bihar Gramin Bank'>Uttar Bihar Gramin Bank</option>
<option value='Uttarakhand Gramin Bank'>Uttarakhand Gramin Bank</option>
<option value='UttarBanga Kshetriya Gramin Bank'>UttarBanga Kshetriya Gramin Bank</option>
<option value='Vidharbha Konkan Gramin Bank'>Vidharbha Konkan Gramin Bank</option>
<option value='Westpac Banking Corporation'>Westpac Banking Corporation</option>
<option value='Woori Bank'>Woori Bank</option>					
									
						  </select>	
	</div>
	<div class="col-md-5">
	<label>Remitter Bank Account Number:</label>
	<input type="text" name="s_acno" id="s_acno" value="" placeholder="" style="width: 100%; " required>
	</div>
	
	
	<div style="clear:both"></div>
	
	<h5 style="margin-top: 0;     margin-top: 15px;    font-size: 13px;    margin-left: 15px;    margin-bottom: 0px;    font-weight: 500;">Details of international transactions made in the current financial year (01 April 2024 - 31 March 2025):</h5>
	<div id='TextBoxesGroup'>
	
	<!--<div id="TextBoxDiv1">
	 <div class="col-md-3">
	<input type="text" name="remit_date1" id="remit_date1" value="" placeholder="Transaction Date" style="width: 100%; margin-top: 10px;">
	</div>
	<div class="col-md-3">
	<input type="text" name="remit_amt1" id="remit_amt1" value="" placeholder="Amount" style="width: 100%; margin-top: 10px;">
	</div>
	<div class="col-md-4">
	<input type="text" name="remit_branch1" id="remit_branch1" value="" placeholder="AD Name & Branch" style="width: 100%; margin-top: 10px;">
	</div>
	<div style="clear:both"></div> 
</div>-->
	
	
	
	
	</div>
	<a class="button button-rounded button-flat-etmcolor button-add" id="add_old_txn" title="" href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i> Add Transaction</a>
	<a class="button button-rounded button-flat-etmcolor button-rem" id="del_old_txn" title="" href="javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i> Remove Transaction</a>
	
	
	
	<div class="col-md-12" style="text-align:center;">
 <button class="remodal-confirm" id="sender_details_submit" type="submit" style="margin-top: 25px; margin-right: 10px; width: 180px;" >Save</button>

	</div>
	</div>


 
</form>
</div>

<span id="sender_details_submit_success" style="display: none; padding: 9px;color: rgb(0 160 20); ">Remitter Details Saved Successfully</span>
   
  </div>
  
</div>



		<div class="remodal" id="mtbenfmodal" data-remodal-id="benfmodal" data-remodal-options="hashTracking: false" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" style="border-radius: 5px;">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h3 id="modal1Title" style="margin-top: 0;">Beneficiary Details: </h3>
	
	<div id="" style="display: block; text-align: left; margin-top: 5px;">
		<form id="benf_data_mt_cust" action="javascript:;">
	
	<div class="row">
	<div class="col-md-5">
	<label>Select Beneficiary:</label>
	<select name="b_id" id="b_id" style="width: 100%; " required>

										
										
	</select>									
	</div>
	<div class="col-md-5">
	<label>Beneficiary Full Name (As given in bank):</label>
	<input type="text" name="b_name" id="b_name" placeholder="" style="width: 100%; " required>
	</div>
	<div class="col-md-5">
	<label>Beneficiary Address (As given in bank):</label>
	<textarea name="b_addr" id="b_addr" placeholder="" style="width: 100%; min-height: 95px;" required></textarea>

	</div>
	<div class="col-md-5">
	<label>Beneficiary Country:</label>
		 <select name="b_country" id="b_country" style="width: 100%; " required>
										
							
<option value="Afghanistan">Afghanistan</option>
   <option value="Albania">Albania</option>
   <option value="Algeria">Algeria</option>
   <option value="American Samoa">American Samoa</option>
   <option value="Andorra">Andorra</option>
   <option value="Angola">Angola</option>
   <option value="Anguilla">Anguilla</option>
   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
   <option value="Argentina">Argentina</option>
   <option value="Armenia">Armenia</option>
   <option value="Aruba">Aruba</option>
   <option value="Australia">Australia</option>
   <option value="Austria">Austria</option>
   <option value="Azerbaijan">Azerbaijan</option>
   <option value="Bahamas">Bahamas</option>
   <option value="Bahrain">Bahrain</option>
   <option value="Bangladesh">Bangladesh</option>
   <option value="Barbados">Barbados</option>
   <option value="Belarus">Belarus</option>
   <option value="Belgium">Belgium</option>
   <option value="Belize">Belize</option>
   <option value="Benin">Benin</option>
   <option value="Bermuda">Bermuda</option>
   <option value="Bhutan">Bhutan</option>
   <option value="Bolivia">Bolivia</option>
   <option value="Bonaire">Bonaire</option>
   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
   <option value="Botswana">Botswana</option>
   <option value="Brazil">Brazil</option>
   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
   <option value="Brunei">Brunei</option>
   <option value="Bulgaria">Bulgaria</option>
   <option value="Burkina Faso">Burkina Faso</option>
   <option value="Burundi">Burundi</option>
   <option value="Cambodia">Cambodia</option>
   <option value="Cameroon">Cameroon</option>
   <option value="Canada">Canada</option>
   <option value="Canary Islands">Canary Islands</option>
   <option value="Cape Verde">Cape Verde</option>
   <option value="Cayman Islands">Cayman Islands</option>
   <option value="Central African Republic">Central African Republic</option>
   <option value="Chad">Chad</option>
   <option value="Channel Islands">Channel Islands</option>
   <option value="Chile">Chile</option>
   <option value="China">China</option>
   <option value="Christmas Island">Christmas Island</option>
   <option value="Cocos Island">Cocos Island</option>
   <option value="Colombia">Colombia</option>
   <option value="Comoros">Comoros</option>
   <option value="Congo">Congo</option>
   <option value="Cook Islands">Cook Islands</option>
   <option value="Costa Rica">Costa Rica</option>
   <option value="Cote DIvoire">Cote DIvoire</option>
   <option value="Croatia">Croatia</option>
   <option value="Cuba">Cuba</option>
   <option value="Curaco">Curacao</option>
   <option value="Cyprus">Cyprus</option>
   <option value="Czech Republic">Czech Republic</option>
   <option value="Denmark">Denmark</option>
   <option value="Djibouti">Djibouti</option>
   <option value="Dominica">Dominica</option>
   <option value="Dominican Republic">Dominican Republic</option>
   <option value="East Timor">East Timor</option>
   <option value="Ecuador">Ecuador</option>
   <option value="Egypt">Egypt</option>
   <option value="El Salvador">El Salvador</option>
   <option value="Equatorial Guinea">Equatorial Guinea</option>
   <option value="Eritrea">Eritrea</option>
   <option value="Estonia">Estonia</option>
   <option value="Ethiopia">Ethiopia</option>
   <option value="Falkland Islands">Falkland Islands</option>
   <option value="Faroe Islands">Faroe Islands</option>
   <option value="Fiji">Fiji</option>
   <option value="Finland">Finland</option>
   <option value="France">France</option>
   <option value="French Guiana">French Guiana</option>
   <option value="French Polynesia">French Polynesia</option>
   <option value="French Southern Ter">French Southern Ter</option>
   <option value="Gabon">Gabon</option>
   <option value="Gambia">Gambia</option>
   <option value="Georgia">Georgia</option>
   <option value="Germany">Germany</option>
   <option value="Ghana">Ghana</option>
   <option value="Gibraltar">Gibraltar</option>
   <option value="Great Britain">Great Britain</option>
   <option value="Greece">Greece</option>
   <option value="Greenland">Greenland</option>
   <option value="Grenada">Grenada</option>
   <option value="Guadeloupe">Guadeloupe</option>
   <option value="Guam">Guam</option>
   <option value="Guatemala">Guatemala</option>
   <option value="Guinea">Guinea</option>
   <option value="Guyana">Guyana</option>
   <option value="Haiti">Haiti</option>
   <option value="Hawaii">Hawaii</option>
   <option value="Honduras">Honduras</option>
   <option value="Hong Kong">Hong Kong</option>
   <option value="Hungary">Hungary</option>
   <option value="Iceland">Iceland</option>
   <option value="Indonesia">Indonesia</option>
   <option value="Iran">Iran</option>
   <option value="Iraq">Iraq</option>
   <option value="Ireland">Ireland</option>
   <option value="Isle of Man">Isle of Man</option>
   <option value="Israel">Israel</option>
   <option value="Italy">Italy</option>
   <option value="Jamaica">Jamaica</option>
   <option value="Japan">Japan</option>
   <option value="Jordan">Jordan</option>
   <option value="Kazakhstan">Kazakhstan</option>
   <option value="Kenya">Kenya</option>
   <option value="Kiribati">Kiribati</option>
   <option value="Korea North">Korea North</option>
   <option value="Korea Sout">Korea South</option>
   <option value="Kuwait">Kuwait</option>
   <option value="Kyrgyzstan">Kyrgyzstan</option>
   <option value="Laos">Laos</option>
   <option value="Latvia">Latvia</option>
   <option value="Lebanon">Lebanon</option>
   <option value="Lesotho">Lesotho</option>
   <option value="Liberia">Liberia</option>
   <option value="Libya">Libya</option>
   <option value="Liechtenstein">Liechtenstein</option>
   <option value="Lithuania">Lithuania</option>
   <option value="Luxembourg">Luxembourg</option>
   <option value="Macau">Macau</option>
   <option value="Macedonia">Macedonia</option>
   <option value="Madagascar">Madagascar</option>
   <option value="Malaysia">Malaysia</option>
   <option value="Malawi">Malawi</option>
   <option value="Maldives">Maldives</option>
   <option value="Mali">Mali</option>
   <option value="Malta">Malta</option>
   <option value="Marshall Islands">Marshall Islands</option>
   <option value="Martinique">Martinique</option>
   <option value="Mauritania">Mauritania</option>
   <option value="Mauritius">Mauritius</option>
   <option value="Mayotte">Mayotte</option>
   <option value="Mexico">Mexico</option>
   <option value="Midway Islands">Midway Islands</option>
   <option value="Moldova">Moldova</option>
   <option value="Monaco">Monaco</option>
   <option value="Mongolia">Mongolia</option>
   <option value="Montserrat">Montserrat</option>
   <option value="Morocco">Morocco</option>
   <option value="Mozambique">Mozambique</option>
   <option value="Myanmar">Myanmar</option>
   <option value="Nambia">Nambia</option>
   <option value="Nauru">Nauru</option>
   <option value="Nepal">Nepal</option>
   <option value="Netherland Antilles">Netherland Antilles</option>
   <option value="Netherlands">Netherlands (Holland, Europe)</option>
   <option value="Nevis">Nevis</option>
   <option value="New Caledonia">New Caledonia</option>
   <option value="New Zealand">New Zealand</option>
   <option value="Nicaragua">Nicaragua</option>
   <option value="Niger">Niger</option>
   <option value="Nigeria">Nigeria</option>
   <option value="Niue">Niue</option>
   <option value="Norfolk Island">Norfolk Island</option>
   <option value="Norway">Norway</option>
   <option value="Oman">Oman</option>
   <option value="Pakistan">Pakistan</option>
   <option value="Palau Island">Palau Island</option>
   <option value="Palestine">Palestine</option>
   <option value="Panama">Panama</option>
   <option value="Papua New Guinea">Papua New Guinea</option>
   <option value="Paraguay">Paraguay</option>
   <option value="Peru">Peru</option>
   <option value="Phillipines">Philippines</option>
   <option value="Pitcairn Island">Pitcairn Island</option>
   <option value="Poland">Poland</option>
   <option value="Portugal">Portugal</option>
   <option value="Puerto Rico">Puerto Rico</option>
   <option value="Qatar">Qatar</option>
   <option value="Republic of Montenegro">Republic of Montenegro</option>
   <option value="Republic of Serbia">Republic of Serbia</option>
   <option value="Reunion">Reunion</option>
   <option value="Romania">Romania</option>
   <option value="Russia">Russia</option>
   <option value="Rwanda">Rwanda</option>
   <option value="St Barthelemy">St Barthelemy</option>
   <option value="St Eustatius">St Eustatius</option>
   <option value="St Helena">St Helena</option>
   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
   <option value="St Lucia">St Lucia</option>
   <option value="St Maarten">St Maarten</option>
   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
   <option value="Saipan">Saipan</option>
   <option value="Samoa">Samoa</option>
   <option value="Samoa American">Samoa American</option>
   <option value="San Marino">San Marino</option>
   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
   <option value="Saudi Arabia">Saudi Arabia</option>
   <option value="Senegal">Senegal</option>
   <option value="Seychelles">Seychelles</option>
   <option value="Sierra Leone">Sierra Leone</option>
   <option value="Singapore">Singapore</option>
   <option value="Slovakia">Slovakia</option>
   <option value="Slovenia">Slovenia</option>
   <option value="Solomon Islands">Solomon Islands</option>
   <option value="Somalia">Somalia</option>
   <option value="South Africa">South Africa</option>
   <option value="Spain">Spain</option>
   <option value="Sri Lanka">Sri Lanka</option>
   <option value="Sudan">Sudan</option>
   <option value="Suriname">Suriname</option>
   <option value="Swaziland">Swaziland</option>
   <option value="Sweden">Sweden</option>
   <option value="Switzerland">Switzerland</option>
   <option value="Syria">Syria</option>
   <option value="Tahiti">Tahiti</option>
   <option value="Taiwan">Taiwan</option>
   <option value="Tajikistan">Tajikistan</option>
   <option value="Tanzania">Tanzania</option>
   <option value="Thailand">Thailand</option>
   <option value="Togo">Togo</option>
   <option value="Tokelau">Tokelau</option>
   <option value="Tonga">Tonga</option>
   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
   <option value="Tunisia">Tunisia</option>
   <option value="Turkey">Turkey</option>
   <option value="Turkmenistan">Turkmenistan</option>
   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
   <option value="Tuvalu">Tuvalu</option>
   <option value="Uganda">Uganda</option>
   <option value="United Kingdom">United Kingdom</option>
   <option value="Ukraine">Ukraine</option>
   <option value="United Arab Emirates">United Arab Emirates</option>
   <option value="United States of America" selected>United States of America</option>
   <option value="Uraguay">Uruguay</option>
   <option value="Uzbekistan">Uzbekistan</option>
   <option value="Vanuatu">Vanuatu</option>
   <option value="Vatican City State">Vatican City State</option>
   <option value="Venezuela">Venezuela</option>
   <option value="Vietnam">Vietnam</option>
   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
   <option value="Wake Island">Wake Island</option>
   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
   <option value="Yemen">Yemen</option>
   <option value="Zaire">Zaire</option>
   <option value="Zambia">Zambia</option>
   <option value="Zimbabwe">Zimbabwe</option>

						  </select>
						  
	<?php	
			if($mt_purp=='mcr'){ 
			?>					  
<label>Relationship:</label>
<select name="b_rel" id="b_rel" style="width: 100%; " required>
										
										<option value="">--Select--</option>
										<option value="Father">Father</option>
										<option value="Mother" >Mother</option>
										<option value="Son" >Son</option>
										<option value="Son's Wife" >Son's Wife</option>
										<option value="Daughter" >Daughter</option>
										<option value="Daughter's Husband" >Daughter's Husband</option>
										<option value="Brother" >Brother</option>
										<option value="Sister" >Sister</option>
										<option value="Husband" >Husband</option>
										<option value="Wife" >Wife</option>
						  </select>
										  
		<?php	
				}
			?>							
	</div>
		<div class="col-md-5">
	<label>Beneficiary Email:</label>
	<input type="text" name="ben_email" id="ben_email" placeholder="" style="width: 100%; ">
	</div>
	<div style="clear:both"></div>
	<div class="col-md-5">
	<label>Beneficiary Bank Name:</label>
<input type="text" name="b_bank" id="b_bank" placeholder="" style="width: 100%; " required>
	</div>
	<div class="col-md-5">
	<label>Beneficiary Bank Account Number:</label>
	<input type="text" name="b_acno" id="b_acno" value="" placeholder="" style="width: 100%; " required>
	</div>
	<div class="col-md-5">
	<label>Beneficiary Bank Address:</label>
		<textarea id="b_bank_addr" name="b_bank_addr" style="width: 100%; min-height: 60px;" required ></textarea>
	</div>
	<div class="col-md-5">
	<label>Special messages to be added:</label>
		<textarea name="sp_msg" id="sp_msg"  style="width: 100%; min-height: 60px;"></textarea>
	</div>
	<div class="col-md-5">
	<label>SWIFT/BIC Code:</label>
	<input type="text" name="b_swift" id="b_swift" value="" placeholder="" style="width: 100%; " required>
	</div>
	<div class="col-md-5" id="aba_no_div">
	<label>ABA Routing Number:</label>
	<input type="text" name="aba_no" id="aba_no" value="" placeholder="" style="width: 100%; " required>
	</div>
	<div class="col-md-5" id="transit_code_div">
	<label>TRANSIT Code:</label>
	<input type="text" name="transit_code" id="transit_code" value="" placeholder="" style="width: 100%; " required>
	</div>
	<div class="col-md-5" id="bsb_no_div">
	<label>BSB Number:</label>
	<input type="text" name="bsb_no" id="bsb_no" value="" placeholder="" style="width: 100%; " required>
	</div>
	<div class="col-md-5" id="sort_code_div">
	<label>SORT Code:</label>
	<input type="text" name="sort_code" id="sort_code" value="" placeholder="" style="width: 100%; " required>
	</div>
	<div class="col-md-5" id="iban_no_div">
	<label>IBAN Number:</label>
	<input type="text" name="iban_no" id="iban_no" value="" placeholder="" style="width: 100%; " required>
	</div>
	
	<div style="clear:both"></div>
	

	
	<div class="col-md-12" style="text-align:center;">
 <button class="remodal-confirm" id="benf_details_submit" type="submit" style="margin-top: 25px; margin-right: 10px; width: 180px;" >Save</button>

	</div>
	</div>


 
</form>

</div>
<span id="benf_details_submit_success" style="display: none; padding: 9px;color: rgb(0 160 20);">Beneficiary Details Saved Successfully</span>

   
  </div>
  
</div>

	<?php } ?>






<?php if($list==1) {?>
<script type="text/javascript" src="<?php echo $fold; ?>js/order-list.js?ver=1.0.0"></script>
<script>



</script>

<?php } elseif($list==0){ ?>
<script type="text/javascript" src="<?php echo $fold; ?>js/order-view.js?ver=1.0.4"></script>
<script>



</script>

<?php if($type1=='mt' || $type1=='buy'){ ?>
<script type="text/javascript" src="<?php echo $fold; ?>js/order-view-sender-benf.js?ver=1.0.6"></script>

<?php } } else{ ?>

<?php } ?>


<?php if($fname=='' || $lname=='' || $email==''){ ?>
<script>
$(window).load(function() {
	$('[data-remodal-id = user_profile]').remodal().open();	
  });
 </script> 
  <?php } ?>
  <script src="<?php echo $fold; ?>js/user-profile.js?ver=1.0.10"></script> 
  <script>
 

    function deleteKycIntial(val) {
    let uid = '<?php echo $check_id; ?>';
    let inid = '<?php echo $inid; ?>';

    
    console.log(val);
    let dataString;

if (val === 'pan_image' || val === 'adhaar_image' || val === 'passport_image' || val === 'passport2_image' || val === 'oth_image') {
    dataString = 'action=delete_kyc_customer&uid=' + uid + '&doc=' + val;
} else {
    dataString = 'action=delete_kyc_customer&uid=' + uid + '&doc=' + val + '&invoiceid=' + inid;
}

    console.log(dataString);

    $.ajax({
        url:"https://mvc.extravelmoney.com/extra-functions/",
        type:"POST",
        data: dataString,
        dataType: "json",
        success:function(data) {
            location.reload();
        }
    });
}
const tooltips = document.querySelectorAll('.tooltipN');
    tooltips.forEach(tooltip => {
        tooltip.addEventListener('click', function () {
            this.querySelector('.tooltiptext').classList.toggle('mobile-visible');
        });
    });


  </script>