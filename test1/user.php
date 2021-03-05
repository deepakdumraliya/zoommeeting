<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"></Head>
</head>
<?php
require_once 'config.php';
require_once 'class-db.php';
?>
<center>
<h2>Join Meeting</h2>
<hr>
<TABLE class="table table-striped table-primary table-sm w-50 p-3">
    <th>Meeting Id</th>
    <th>Password</th>
    <th>Join URL</th>
    <th>Join Meeting</th>
    <?php
    $db = new DB;
    $res = $db->get_meeting();
    // print_r($res);die;
    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        // printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);
        echo "<td>" . $row["meeting_id"] . "</td>";
        echo "<td>" . $row["passcode"] . "</td>";
        echo "<td>" . $row["join_url"] . "</td>";
        // $urls="https://zoom.us/wc/{$row["meeting_id"]}/start";
        $urls = "https://zoom.us/wc/{$row["meeting_id"]}/join?prefer=1&un=RWR3aW4=";
        echo "<td><a href='{$urls}' target='_blank' class='btn btn-primary'>Join</a></td>";
        echo "</tr>";
    }
    ?>
</TABLE>
</center>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
