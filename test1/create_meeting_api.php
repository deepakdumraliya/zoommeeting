<?php
require_once 'class-db.php';
    if (isset($_POST['submit'])) 
    {
        // API url
        $url = 'https://api.zoom.us/v2/users/me/meetings';

        // Initializes a new cURL session
        $curl = curl_init($url);

        //Data
        // $post_data = [
        //     "grant_type" => "authorization_code",
        //     "code" => $code,
        //     "redirect_uri" => REDIRECT_URI
        // ];

        // 1. Set the CURLOPT_RETURNTRANSFER option to true
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // 2. Set the CURLOPT_POST option to true for POST request
        curl_setopt($curl, CURLOPT_POST, true);

        // 3. Set the request data as JSON using json_encode function
        $topic=trim($_POST['topic']);
        $password=trim($_POST['password']);
        $post_data = [
            "topic" => $topic,
            "type" => 2,
            "start_time" => "2021-05-05T20:30:00",
            "duration" => "30", // 30 mins
            "password" => $password
        ];
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_data));
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);


        // 4. Set custom headers for RapidAPI Auth and Content-Type header
        $accessToken = $_POST['access_token'];
        $header_data = array(
            'Content-Type:application/json',
            'Authorization:Bearer ' . $accessToken . ''
        );
        // echo "<br/>Response : <pre>";
        // print_r($header_data);
        // echo "</pre>";
        // die;

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header_data);
        // Execute cURL request with all previous settings
        $response = curl_exec($curl);
        $meeting_data = json_decode($response, true);
       
       
        
        $meeting_id = $meeting_data['id'];
        $meeting_password = $meeting_data['password'];
        $join_url=$meeting_data['join_url'];

        $db = new DB();
        $db->add_new_meeting($meeting_id, $meeting_password,$topic,$join_url);

        if ($db) {
            echo "Meeting added successfully";
        } else {
            echo "failed";
        }
    }