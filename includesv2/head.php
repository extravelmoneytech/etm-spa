<?php 
if(isset($_GET['aff'])) {
    
$afftoken=$_GET['aff']; 

setcookie('etmref', $afftoken, time() + (86400 * 365), "/");  

}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PVCSFZ2');</script>
<!-- End Google Tag Manager -->
    
    <title><?php echo($title); ?></title>
    <meta name="description" content="<?php echo($description); ?>" />
    
    
    <!-- Preconnect for Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
        
    <link rel="canonical" href="<?php echo($ogurl); ?>" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="<?php echo($ogtype); ?>" />
<meta property="og:title" content="<?php echo($title); ?>" />
<meta property="og:description" content="<?php echo($description); ?>" />
<meta property="og:url" content="<?php echo($ogurl); ?>" />
<meta property="og:site_name" content="ExTravelMoney" />
<meta property="og:image" content="http://www.extravelmoney.com/images/extravelmoney_dp.png" />    
    
    <!-- Local Stylesheets with PHP $fold -->
    <link rel="stylesheet" href="<?php echo $fold . 'src/output.css?ver=2.1'; ?>">
    <link rel="stylesheet" href="<?php echo $fold . 'stylesv2/extraStyles.css?ver=1.6'; ?>">
    <link rel="stylesheet" href="<?php echo $fold . 'stylesv2/dropDown.css'; ?>">
    
    <!-- External Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    
    <link rel="stylesheet" href="<?php echo $fold . 'stylesv2/countryPageStyles.css?ver=3.8'; ?>">
    
</head>
