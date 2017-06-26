<?php
    //error_reporting(E_ERROR);
    //ini_set('display_errors', 1);

    $response = array("status" => false);

    try {
        include '../config.php';

        if(!isset($_POST))
            throw new Exception('Invalid data');
        
        if(!isset($_POST['player_name']))
            throw new Exception('Invalid player name');
        $player_name = $_POST['player_name'];

        if(!isset($_POST['frames']))
            throw new Exception('Invalid frames');
        $frames = $_POST['frames'];

        $mysqli = new mysqli($servername, $username, $password, $dbname);
        if ($mysqli->connect_error)
            throw new Exception("Connection failed: " . $mysqli->connect_error);

        $stmt = $mysqli->prepare("INSERT INTO games (player_name, frames, play_date) VALUES (?, ?, NOW())");
        if(!$stmt)
            throw new Exception("Invalid prepared statement");
        $stmt->bind_param("ss", $player_name, $frames);
        $stmt->execute();
 
        if($mysqli->error)
            throw new Exception($mysqli->error);
        
        $stmt->close();
        $mysqli->close();

        $response['status'] = true;

    } catch(Exception $err) {
        $response['err'] = $err->getMessage();
    }

    echo json_encode($response);
    
?>