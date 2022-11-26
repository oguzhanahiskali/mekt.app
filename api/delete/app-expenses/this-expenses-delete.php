<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
    
if(!empty($_POST['ids'])){

    $id = $_POST['ids'];
    if ($result = $link->query("SELECT * FROM view_expenses WHERE ID = '{$id}' AND FIRMA_ID=$user_Firma ORDER BY ID DESC")) {
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            if($row['ID']!=null){
                if($row['FILE']!=null){ unlink('/var/www/vhosts/estetik.app/httpdocs/adropzone/upload/'.$row['FILE']); }
                $query = $db->prepare("DELETE FROM tbl_gider WHERE ID = :id AND FIRMA_ID = $user_Firma");
                $delete = $query->execute(array( 'id' => $id ));
                if($delete){ $json[]=[ 'Results'=>true ];
                }else{ $json[]=[ 'Results'=>false ]; }
            }else{ $json[]=[ 'Results'=> false, 'because'=> 'wrong request sent']; }
        }
    }else{ $json[]=[ 'Results'=> false, 'because'=> 'Bad request!' ]; }
 }else{
    $json[]=[ 'Results'=> false, 'because'=> 'Bad request!' ];
 }
 echo json_encode($json);
?>