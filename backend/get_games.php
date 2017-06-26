<?php
    //error_reporting(E_ERROR);
    //ini_set('display_errors', 1);

    require_once '../config.php';
    
    $mysqli = new mysqli($servername, $username, $password, $dbname);
    $response = array("status" => false);
    if ($result = $mysqli->query("SELECT * FROM games")) {
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
                $json[] = $row;
        }
        $response['data'] = $json;
        $response['status'] = true;
    }

    $result->close();
    $mysqli->close();

    echo json_encode($response);
?>