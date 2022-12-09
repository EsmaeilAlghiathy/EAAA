<?php include 'header.php'; ?>
<?php include 'connect.php' ; ?>

<?php

session_start();
if(isset($_SESSION['login'])){
   header('location:index.php');
}
//$password=md5('1234');
//$res=mysqli_query($conn,"UPDATE login SET password='$password' WHERE email='admin@gmail.com'");

    $sql=mysqli_query($conn, "SELECT * FROM admin_control WHERE id=1");
    $num=mysqli_num_rows($sql);
  if($num>=1){
		$row=mysqli_fetch_array($sql);
		$_SESSION['ads_between']=$row['ads_between'];
		$_SESSION['daily_scratch_limit']=$row['daily_scratch_limit'];
		$_SESSION['daily_spin_limit']=$row['daily_spin_limit'];
		$_SESSION['daily_check_in_points']=$row['daily_check_in_points'];
		$_SESSION['coin_to_rupee_text']=$row['coin_to_rupee_text'];
		$_SESSION['daily_captcha_limit']=$row['daily_captcha_limit'];
		$_SESSION['minimum_redeem_points']=$row['minimum_redeem_points'];
		$_SESSION['ad_type']=$row['ad_type'];
		$_SESSION['admob_banner_id']=$row['admob_banner_id'];
		$_SESSION['admob_interstital_id']=$row['admob_interstital_id'];
		$_SESSION['admob_rewarded_id']=$row['admob_rewarded_id'];
		$_SESSION['unity_banner_id']=$row['unity_banner_id'];
		$_SESSION['unity_interstital_id']=$row['unity_interstital_id'];
		$_SESSION['unity_rewarded_id']=$row['unity_rewarded_id'];
		$_SESSION['startapp_banner_id']=$row['startapp_banner_id'];
		$_SESSION['startapp_interstital_id']=$row['startapp_interstital_id'];
		$_SESSION['is_vpn_enable']=$row['is_vpn_enable'];
		$_SESSION['refer_text']=$row['refer_text'];
		$_SESSION['spin_price_coins']=$row['spin_price_coins'];
		$_SESSION['scratch_price_coins']=$row['scratch_price_coins'];
		$_SESSION['captcha_price_coins']=$row['captcha_price_coins'];
		$_SESSION['signup_points']=$row['signup_points'];
		$_SESSION['unity_game_id']=$row['unity_game_id'];
		$_SESSION['startapp_app_id']=$row['startapp_app_id'];
		$_SESSION['admob_app_id']=$row['admob_app_id'];
		
		$_SESSION['scratch_price_coins_gold']=$row['scratch_coin_gold'];
		$_SESSION['scratch_price_coins_platinum']=$row['scratch_coin_platinum'];
		
		$_SESSION['applovin_banner_id']=$row['applovin_banner_id'];
		$_SESSION['applovin_interstital_id']=$row['applovin_interstital_id'];
		$_SESSION['applovin_rewarded_id']=$row['applovin_rewarded_id'];
  }
?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     
      <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

<div>
    <h1>App Settings</h1><br>
    
   <form action="update_settings.php" method="post" >
       
        <label for="daily_check_in_points">Daily Check in points</label><br>
     <input type="number" id="daily_check_in_points" name="daily_check_in_points" value="<?php echo ($_SESSION['daily_check_in_points']);?>"><br>
  
      <label for="">Ads Beetween</label><br>
      <input type="number" id="ads_between" name="ads_between" value="<?php echo ($_SESSION['ads_between']);?>"><br>
    
     <label for="daily_scratch_limit">Daily Scratch Limit</label><br>
     <input type="number" id="daily_scratch_limit" name="daily_scratch_limit" value="<?php echo ($_SESSION['daily_scratch_limit']);?>">
  
     <!--<label for="daily_spin_limit">Daily Spin Limit</label><br>-->
     <input type="hidden" id="daily_spin_limit" name="daily_spin_limit" value="<?php echo ($_SESSION['daily_spin_limit']);?>"><br>   
  
     <!--<label for="daily_captcha_limit">Daily Captcha Limit</label><br>-->
     <input type="hidden" id="daily_captcha_limit" name="daily_captcha_limit" value="<?php echo ($_SESSION['daily_captcha_limit']);?>">   
  
     <label for="coin_to_rupee_text">Coin to Rupee Text</label><br>
     <input type="text" id="coin_to_rupee_text" name="coin_to_rupee_text" value="<?php echo ($_SESSION['coin_to_rupee_text']);?>"><br>   
  
     <label for="minimum_redeem_points">Minimum Redeem Points</label><br>
     <input type="number" id="minimum_redeem_points" name="minimum_redeem_points" value="<?php echo ($_SESSION['minimum_redeem_points']);?>"><br>   
 
     <label for="ad_type">Ad Type (admob/unity/startapp/applovin)</label><br>
     <input type="text" id="ad_type" name="ad_type" value="<?php echo ($_SESSION['ad_type']);?>"><br>
     
       <label for="admob_app_id">Admob App Id</label><br>
     <input type="text" id="admob_app_id" name="admob_app_id" value="<?php echo ($_SESSION['admob_app_id']);?>"><br> 
 
     <label for="admob_banner_id">Admob Banner Id</label><br>
     <input type="text" id="admob_banner_id" name="admob_banner_id" value="<?php echo ($_SESSION['admob_banner_id']);?>"><br>   

     <label for="admob_interstital_id">Admob Interstital Id</label><br>
     <input type="text" id="admob_interstital_id" name="admob_interstital_id" value="<?php echo ($_SESSION['admob_interstital_id']);?>"><br>   
  
     <label for="admob_rewarded_id">Admob Rewarded Id</label><br>
     <input type="text" id="admob_rewarded_id" name="admob_rewarded_id" value="<?php echo ($_SESSION['admob_rewarded_id']);?>"><br>   
  
  
     <label for="unity_game_id">Unity Game Id</label><br>
     <input type="text" id="unity_game_id" name="unity_game_id" value="<?php echo ($_SESSION['unity_game_id']);?>"><br>   
  
     <label for="unity_banner_id">Unity Banner Id</label><br>
     <input type="text" id="unity_banner_id" name="unity_banner_id" value="<?php echo ($_SESSION['unity_banner_id']);?>"><br>   

     <label for="unity_interstital_id">Unity Interstital Id</label><br>
     <input type="text" id="unity_interstital_id" name="unity_interstital_id" value="<?php echo ($_SESSION['unity_interstital_id']);?>"><br>   

  
  
     <label for="unity_rewarded_id">Unity Rewarded Id</label><br>
     <input type="text" id="unity_rewarded_id" name="unity_rewarded_id" value="<?php echo ($_SESSION['unity_rewarded_id']);?>"><br>   


     <label type="hidden" for="startapp_app_id">StartApp App Id</label><br>
     <input type="text" id="startapp_app_id" name="startapp_app_id" value="<?php echo ($_SESSION['startapp_app_id']);?>"> <br>
     
      <label type="hidden" for="">Applovin Banner Id</label><br>
     <input type="text" id="applovin_banner_id" name="applovin_banner_id" value="<?php echo ($_SESSION['applovin_banner_id']);?>"><br>
     
      <label type="hidden" for="applovin_interstital_id">Applovin Interstital Id</label><br>
     <input type="text" id="applovin_interstital_id" name="applovin_interstital_id" value="<?php echo ($_SESSION['applovin_interstital_id']);?>"><br>
     
      <label type="hidden" for="applovin_rewarded_id">Applovin Rewarded Id</label><br>
     <input type="text" id="applovin_rewarded_id" name="applovin_rewarded_id" value="<?php echo ($_SESSION['applovin_rewarded_id']);?>">

     <!--<label for="startapp_banner_id">StartApp Banner Id</label><br>-->
     <input type="hidden" id="startapp_banner_id" name="startapp_banner_id" value="<?php echo ($_SESSION['startapp_banner_id']);?>">   
 
 
     <!--<label for="startapp_interstital_id">StartApp Interstital Id</label><br>-->
     <input type="hidden" id="startapp_interstital_id" name="startapp_interstital_id" value="<?php echo ($_SESSION['startapp_interstital_id']);?>">   
  

     <!--<label for="is_vpn_enable">Vpn Enable (true/false)</label><br>-->
     <input type="hidden" id="is_vpn_enable" name="is_vpn_enable" value="<?php echo ($_SESSION['is_vpn_enable']);?>"><br>   
 

     <label for="refer_text">Refer Text</label><br>
     <input type="text" id="refer_text" name="refer_text" value="<?php echo ($_SESSION['refer_text']);?>"><br>   
 
  
  
     <!--<label for="spin_price_coins">Spin Coin Between (eg. 1-10)</label><br>-->
     <input type="hidden" id="spin_price_coins" name="spin_price_coins" value="<?php echo ($_SESSION['spin_price_coins']);?>">
  

     <label for="scratch_price_coins">Scratch Coin Between for silver scratch(eg. 1-10)</label><br>
     <input type="text" id="scratch_price_coins" name="scratch_price_coins" value="<?php echo ($_SESSION['scratch_price_coins']);?>"><br>  
     
      <label for="scratch_price_coins">Scratch Coin Between for gold scratch(eg. 1-10)</label><br>
     <input type="text" id="scratch_price_coins_gold" name="scratch_price_coins_gold" value="<?php echo ($_SESSION['scratch_price_coins_gold']);?>"><br>  
     
      <label for="scratch_price_coins">Scratch Coin Between for platinum scratch(eg. 1-10)</label><br>
     <input type="text" id="scratch_price_coins_platinum" name="scratch_price_coins_platinum" value="<?php echo ($_SESSION['scratch_price_coins_platinum']);?>"><br>  
 
  
 
     <!--<label for="captcha_price_coins">Captcha Coin Between (eg. 1-10)</label><br>-->
     <input type="hidden" id="captcha_price_coins" name="captcha_price_coins" value="<?php echo ($_SESSION['captcha_price_coins']);?>">   
 
     <label for="signup_points">Sign Up Bounus</label><br>
     <input type="number" id="signup_points" name="signup_points" value="<?php echo ($_SESSION['signup_points']);?>"><br>
      <br>
      <input type="submit" name="submit" value="Update" class="regular">
   </form>
</div>
</div>

</section>
</div>

<?php include 'footer.php'; ?>