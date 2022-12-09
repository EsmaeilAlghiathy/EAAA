<?php
include 'connect.php' ;

include 'demo.php';


if($demo){
    header('location:app_settings.php');
}else{
if(isset($_POST['submit'])){
    $daily_check_in=$_POST['daily_check_in'];
    $ads_between=$_POST['ads_between'];
    $daily_scratch_limit=$_POST['daily_scratch_limit'];
    $daily_spin_limit=$_POST['daily_spin_limit'];
    $daily_check_in_points=$_POST['daily_check_in_points'];
    $coin_to_rupee_text=$_POST['coin_to_rupee_text'];
    
    $daily_captcha_limit=$_POST['daily_captcha_limit'];
    $minimum_redeem_points=$_POST['minimum_redeem_points'];
    $ad_type=$_POST['ad_type'];
    $admob_banner_id=$_POST['admob_banner_id'];
    $admob_interstital_id=$_POST['admob_interstital_id'];
    $admob_rewarded_id=$_POST['admob_rewarded_id'];
    $unity_banner_id=$_POST['unity_banner_id'];
    $unity_interstital_id=$_POST['unity_interstital_id'];
    $unity_rewarded_id=$_POST['unity_rewarded_id'];
    $startapp_banner_id=$_POST['startapp_banner_id'];
    $startapp_interstital_id=$_POST['startapp_interstital_id'];
    $is_vpn_enable=$_POST['is_vpn_enable'];
    $refer_text=$_POST['refer_text'];
    $spin_price_coins=$_POST['spin_price_coins'];
    $scratch_price_coins=$_POST['scratch_price_coins'];
    $captcha_price_coins=$_POST['captcha_price_coins'];
    $signup_points=$_POST['signup_points'];
    $unity_game_id=$_POST['unity_game_id'];
    $startapp_app_id=$_POST['startapp_app_id'];
    $admob_app_id=$_POST['admob_app_id'];
    
    $applovin_banner_id=$_POST['applovin_banner_id'];
    $applovin_interstital_id=$_POST['applovin_interstital_id'];
    $applovin_rewarded_id=$_POST['applovin_rewarded_id'];
    
    $scratch_price_coins_gold=$_POST['scratch_price_coins_gold'];
    $scratch_price_coins_platinum=$_POST['scratch_price_coins_platinum'];
    
    $sql="UPDATE admin_control SET ads_between='$ads_between' , daily_scratch_limit='$daily_scratch_limit'
    ,daily_spin_limit= '$daily_spin_limit',daily_check_in_points='$daily_check_in_points',coin_to_rupee_text='$coin_to_rupee_text',daily_captcha_limit='$daily_captcha_limit',minimum_redeem_points='$minimum_redeem_points',ad_type='$ad_type',admob_banner_id='$admob_banner_id',admob_interstital_id='$admob_interstital_id',admob_rewarded_id='$admob_rewarded_id',unity_banner_id='$unity_banner_id',unity_interstital_id='$unity_interstital_id',unity_rewarded_id='$unity_rewarded_id',startapp_banner_id='$startapp_banner_id',startapp_interstital_id='$startapp_interstital_id',is_vpn_enable='$is_vpn_enable',refer_text='$refer_text',spin_price_coins='$spin_price_coins',scratch_price_coins='$scratch_price_coins',captcha_price_coins='$captcha_price_coins',signup_points='$signup_points',unity_game_id='$unity_game_id',startapp_app_id='$startapp_app_id',admob_app_id='$admob_app_id',scratch_coin_gold='$scratch_price_coins_gold',scratch_coin_platinum='$scratch_price_coins_platinum',applovin_banner_id='$applovin_banner_id',applovin_interstital_id='$applovin_interstital_id',applovin_rewarded_id='$applovin_rewarded_id' WHERE id=1";
    
    $query=mysqli_query($conn,$sql);
    if($query){
       header('location:app_settings.php');
    } else{
        echo (mysqli_error($conn));
       // header('location:app_settings.php');
    }
}
}
?>