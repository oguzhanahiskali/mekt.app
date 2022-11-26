<?php
include 'header-top.php';

//  $connect = new PDO("mysql:host=localhost;dbname=estetikp_db", "estetikp_usr", "gzeCIeUkaJOR");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
       $data = array(
        ':seans_tarih'      => "%" . $_GET['seans_tarih'] . "%",
        ':seans_saat'  => "%" . $_GET['seans_saat'] . "%",
        ':durum'            => "%" . $_GET['durum'] . "%",
        ':tahsilat_durum'   => "%" . $_GET['tahsilat_durum'] . "%",
        ':tahsilat_tipi'    => "%" . $_GET['tahsilat_tipi'] . "%",
        ':fiyat'            => "%" . $_GET['fiyat'] . "%",
        ':islem_tarihi'     => "%" . $_GET['islem_tarihi'] . "%"
       );
       //$query = "SELECT * FROM sample_data WHERE first_name LIKE :first_name AND last_name LIKE :last_name AND age LIKE :age AND gender LIKE :gender ORDER BY id DESC";
       $query = "
       SELECT * FROM tbl_seans_detay WHERE
           SEANS_TARIH LIKE :seans_tarih
       AND SEANS_SAAT LIKE :seans_saat
       AND DURUM LIKE :durum
       AND TAHSILAT_DURUM LIKE :tahsilat_durum
       AND TAHSILAT_TIPI LIKE :tahsilat_tipi
       AND FIYAT LIKE :fiyat
       AND ISLEM_TARIHI LIKE :islem_tarihi
       AND FIRMA_ID=$user_Firma
       ORDER BY id DESC";

       $statement = $connect->prepare($query);
       $statement->execute($data);
       $result = $statement->fetchAll();
       foreach($result as $row)
       {
        $output[] = array(
         'id'    => $row['id'],   
         'first_name'  => $row['first_name'],
         'last_name'   => $row['last_name'],
         'age'    => $row['age'],
         'gender'   => $row['gender']
        );
       }
       header("Content-Type: application/json");
       echo json_encode($output);
}

if($method == "POST")
{
         $data = array(
          ':first_name'  => $_POST['first_name'],
          ':last_name'  => $_POST["last_name"],
          ':age'    => $_POST["age"],
          ':gender'   => $_POST["gender"]
         );

         $query = "INSERT INTO sample_data (first_name, last_name, age, gender) VALUES (:first_name, :last_name, :age, :gender)";
         $statement = $connect->prepare($query);
         $statement->execute($data);
        }

if($method == 'PUT')
{
         parse_str(file_get_contents("php://input"), $_PUT);
         $data = array(
          ':id'   => $_PUT['id'],
          ':first_name' => $_PUT['first_name'],
          ':last_name' => $_PUT['last_name'],
          ':age'   => $_PUT['age'],
          ':gender'  => $_PUT['gender']
         );
         $query = "
         UPDATE sample_data 
         SET first_name = :first_name, 
         last_name = :last_name, 
         age = :age, 
         gender = :gender 
         WHERE id = :id
         ";
         $statement = $connect->prepare($query);
         $statement->execute($data);
}

if($method == "DELETE")
{
         parse_str(file_get_contents("php://input"), $_DELETE);
         $query = "DELETE FROM sample_data WHERE id = '".$_DELETE["id"]."'";
         $statement = $connect->prepare($query);
         $statement->execute();
}

?>
