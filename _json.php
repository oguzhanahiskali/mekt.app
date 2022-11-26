<?php

include '../header-top.php';


$sql = "SELECT * FROM tbl_logs";
		$result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
								            $json[] =	[
								             			'id'		=>$row['ID'],
								             			'userId'	=>$row['USERID'],
                                                        'page'		=>$row['PAGE'],
                                                        'old'		=> json_decode($row['OLD']),
                                                        'new'		=> json_decode($row['NEW']),
                                                        'date'		=>$row['DATE']
														]; 
        									}
    echo json_encode($json);
/*
    foreach($json as $tag) {
        echo $tag['id']." - ";
        echo $tag['userId']." - ";
        echo $tag['page']." - ";
        echo $tag['date']."<br>";
        print_r($tag['new'])."<br>";
     }
*/