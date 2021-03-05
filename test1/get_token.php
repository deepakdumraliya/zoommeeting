<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"></Head>
</head>
<?php
require_once "config.php";
require_once 'class-db.php';

$code = $_GET['code'];

// API url
$url = 'https://zoom.us/oauth/token';

// Initializes a new cURL session
$curl = curl_init($url);

//Data
$post_data = [
    "grant_type" => "authorization_code",
    "code" => $code,
    "redirect_uri" => REDIRECT_URI
];

// 1. Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// 2. Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_POST, true);

// 3. Set the request data as JSON using json_encode function
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

// 4. Set custom headers for RapidAPI Auth and Content-Type header
$data = "Basic " . base64_encode(CLIENT_ID . ':' . CLIENT_SECRET);
$header_data = array(
    'Authorization:' . $data . '',
    'Content-Type : application/json',
);
// $dt = array(
//     "Authorization" => "Basic " . base64_encode(CLIENT_ID . ':' . CLIENT_SECRET)
// );
curl_setopt($curl, CURLOPT_HTTPHEADER, $header_data);

// Execute cURL request with all previous settings
$response = curl_exec($curl);




$data = json_decode($response, true);
// echo $data['access_token'];

if (isset($data['access_token']) && !empty($data['access_token'])) {

?>
<center>
<h2>CREATE MEETING</h2>
<hr>
    <form method="post" action="create_meeting_api.php">
        <table>
            <tr>
                <td>
                    Topic
                </td>
                <td>
                    <input type="text" class="form-control" id="tpoic" name="topic" placeholder="Enter Topic">
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Create meeting">
                </td>
            </tr>
        </table>
        <input type='hidden' name='access_token' value='<?php echo $data['access_token'];?>'> 
    </form>
    </center>
<?php
}
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
