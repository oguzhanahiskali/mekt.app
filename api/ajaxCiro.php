<?php
//test x

include '../header-top.php';


$query = "SELECT * FROM view_tahsilat_alinanlar WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'ISLEM_TARIHI BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (ISLEM_TARIHI LIKE "%'.$_POST["search"]["value"].'%" 
  OR TITLEx LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY order_id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($mysqli, $query));

//$result = mysqli_query($connect, $query . $query1);
$result = $mysqli->query($query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["ID"];
 $sub_array[] = $row["ADISOYADI"];
 $sub_array[] = $row["CEP"];
 $sub_array[] = $row["TITLEx"];
 $sub_array[] = $row["ISLEM_TARIHI"];
 $data[] = $sub_array;
}

function get_all_data($mysqli)
{
 $query = "SELECT * FROM view_tahsilat_alinanlar WHERE FIRMA_ID = 24";
 $result = mysqli_query($mysqli, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($mysqli),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>

