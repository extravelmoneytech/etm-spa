<?php 
session_start();
if(!isset($_SESSION["login_code"]) || !isset($_SESSION["login"])){


$_SESSION["rdurl"]='profile';
header('Location: ../');
exit;
}


$code=$_SESSION["login_code"];
$mob=$_SESSION["login"];





include '../../includes/dbconnect.php';






//echo $_SESSION["login"];
$title="Profile - ExTravelMoney"; 
$description="Contact us for any foreign currency exchange related queries or for all your international money transfer needs. We are here to help you."; 
$sub=2; $page=703; $citypage=0; $curpage=0; $fold="../../"; 


$ogurl="https://www.extravelmoney.com/myaccount/profile";
$ogtype="article";

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
 

$uid=$uidquery_row->u_id;
$name=$uidquery_row->fname;
$email=$uidquery_row->email;
$code=$uidquery_row->country_code;
$phno='+'.$code.' '.$uidquery_row->phone;
$class=$uidquery_row->class;
$bank_acno=$uidquery_row->bank_acno;
$bank_ifsc=$uidquery_row->bank_ifsc;
$bank_name=$uidquery_row->bank_name;
$pan=$uidquery_row->pan;
$wa_notify=$uidquery_row->wa_notify;
if($name!=''){
$namearray = explode(' ', $name, 2);
$fname=$namearray[0];
$lname=$namearray[1];
}
else
$fname=$lname='';


if($class=='')
$class='Resident Indian';

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


label{
        font-size: 12px;
    margin-bottom: 3px;
}


@media (max-width: 767px) {


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

</style>

			<section class="content fullwidth" style="padding-top: 60px; min-height: 400px; overflow: hidden;" id="foroverlay">
			    
			    	    <div class="tabbed">
					<ul class="tabs">
						<li><a href="../transactions">Transactions</a></li>
						<li><a href="../referrals" class="">Referrals</a></li>
					    	<li><a href="../profile" class="selected">Profile</a></li>
					</ul>
		
	
				</div>
			    
			<!-- <h1 class="textcenter" style="margin-top: 25px; ">Affiliate Dashboard</h1> -->
			
		
			
			

  
 	<section class="columns">
 	    
 	    

 	    
      <div class="col2">
 	               
	
<p><label>First Name:</label>
	<input type="text" name="user_f_name" placeholder="First Name*" value="<?php echo($fname); ?>" style="width: 93%;">
</p>
<p><label>Last Name:</label>
	<input type="text" name="user_l_name" placeholder="Last Name*" value="<?php echo($lname); ?>" style="width: 93%;">
</p>
<p><label>Email:</label>
		<input type="text" name="user_reg_email" placeholder="Email*" value="<?php echo($email); ?>" style="width: 93%;">
</p>

<p><label>Mobile Number:</label>
		<input type="text" name="user_reg_mob" value="<?php echo($phno); ?>" style="width: 93%;" disabled>
		<span style="font-size: 11px; padding-top: 3px;">Please contact care@extravelmoney.com to change mobile number.</span>
</p>

<p><label>Notifications Via:</label><select name="wa_notify" id="wa_notify" style="width: 99%;"><option value="0" <?php if($wa_notify==0) echo 'selected'; ?>><?php if($code==91) echo 'SMS & Email'; else echo 'Email'; ?></option>
<option value="1" <?php if($wa_notify==1) echo 'selected'; ?>>WhatsApp & Email</option>

</select></p>	





</div> 
                     
     <div class="col2"> 
     
     
     <p><label>Category:</label><select name="user_class" id="user_class" style="width: 99%;"><option value="Resident Indian" <?php if($class=='Resident Indian') echo 'selected'; ?>>Resident Indian</option>
<option value="NRI" <?php if($class=='NRI') echo 'selected'; ?>>NRI</option>
<option value="Foreigner" <?php if($class=='Foreigner') echo 'selected'; ?>>Foreigner</option>
</select></p>
     
     <p><label>Bank Account Number:</label>
		<input type="text" name="user_acno" placeholder="Bank Account Number" value="<?php echo($bank_acno); ?>" style="width: 93%;">
</p>	

     <p><label>IFSC Code:</label>
		<input type="text" name="user_ifsc" placeholder="Bank IFSC Code" value="<?php echo($bank_ifsc); ?>" style="width: 93%;">
</p>
<p><label>Bank Name:</label>
		<input type="text" name="user_bank" placeholder="Bank Name" value="<?php echo($bank_name); ?>" style="width: 93%;">
</p>
<p><label>PAN Number:</label>
     		<input type="text" name="user_pan" placeholder="PAN Number" value="<?php echo($pan); ?>" style="width: 93%;">
</p>
      </div>   
      
      <p class="msg success user_profile_success" style="margin-top: 0px; display: none;">Profile Details Saved.</p>
      <p class="msg error user_profile_error" style="margin-top: 0px; display: none;">Please fill in all mandatory fields with valid data.</p>
       <p style="text-align: center; margin-top: 25px;">
           	<input type="hidden" id="page_reload" name="page_reload" value=0>
           	
 <button class="button button-rounded button-flat-caution user_profile_save" style="width: 180px;" >Save</button>
 
</p>
      
	</section>	
			
	
			
	
	</section>
	



	
	



<?php include $fold.'footer.php'; ?>


 <script src="<?php echo $fold; ?>js/user-profile.js?ver=1.0.17"></script> 
	






