<HTML>

<Head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"></Head>

<body>
<?php
require_once 'config.php';
$url = "https://zoom.us/oauth/authorize?response_type=code&client_id=" . CLIENT_ID . "&redirect_uri=" . REDIRECT_URI;
?>
<center>
<br>
<a href="<?php echo $url; ?>" target="_blank"  class="btn btn-primary">Create meeting</a>
<hr>
<a href="<?php echo BASE_URL;?>/user.php" target="_blank"  class="btn btn-primary" >Join Meeting</a>
</center>

   
  
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</HTML>