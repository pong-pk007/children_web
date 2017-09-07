<?php
date_default_timezone_set('UTC');
include '../config/connection.php';

$id = $_GET['id'];


$yearStart = date('Y');
       $yearEnd = $yearStart-5;
       
       $data[] = array();
       $data[0] = ["Year"];
       $j = 1;
       for($year = $yearStart; $year > $yearEnd; $year--){
           $y=$year+543;
           array_push($data[0], "$y");
                  
       }
       $current = $yearStart + 543;
       $current1 = $yearStart + 542;
       $current2 = $yearStart + 541;
       $current3 = $yearStart + 540;
       $current4 = $yearStart + 539;


//$sql_side = "SELECT * FROM `tbl_side`";
//$query_side = mysql_query($sql_side);
//$i = 0;
//while($rs_side = mysql_fetch_array($query_side)){
//    $data[$i] = $rs_side['SIDE_NAME'];
//    $i++;
//}

       
$sql = "SELECT  side.SIDE_NAME
               ,side.SIDE_ID
               ,ifNULL((SELECT SUM(tbl_case.TOTAL) 
                     FROM tbl_case 
                     WHERE tbl_case.SIDE_ID = side.SIDE_ID AND tbl_case.POLICEST_ID = $id AND tbl_case.YEAR = '$current'),0) AS SUM_1
               ,ifNULL((SELECT SUM(tbl_case.TOTAL) 
                     FROM tbl_case 
                     WHERE tbl_case.SIDE_ID = side.SIDE_ID AND tbl_case.POLICEST_ID = $id AND tbl_case.YEAR = '$current1'),0) AS SUM_2
               ,ifNULL((SELECT SUM(tbl_case.TOTAL) 
                     FROM tbl_case 
                     WHERE tbl_case.SIDE_ID = side.SIDE_ID AND tbl_case.POLICEST_ID = $id AND tbl_case.YEAR = '$current2'),0) AS SUM_3
               ,ifNULL((SELECT SUM(tbl_case.TOTAL) 
                     FROM tbl_case 
                     WHERE tbl_case.SIDE_ID = side.SIDE_ID AND tbl_case.POLICEST_ID = $id AND tbl_case.YEAR = '$current3'),0) AS SUM_4
               ,ifNULL((SELECT SUM(tbl_case.TOTAL) 
                     FROM tbl_case 
                     WHERE tbl_case.SIDE_ID = side.SIDE_ID AND tbl_case.POLICEST_ID = $id AND tbl_case.YEAR = '$current4'),0) AS SUM_5
             FROM tbl_side AS side
             ORDER BY (SELECT COUNT(tbl_case.CASE_ID) FROM tbl_case WHERE tbl_case.SIDE_ID = side.SIDE_ID) DESC";
$query = mysql_query($sql);
while ($result = mysql_fetch_array($query)) {
    
    $data[] = array($result['SIDE_NAME'], (int)$result['SUM_1'],(int)$result['SUM_2'],(int)$result['SUM_3'],(int)$result['SUM_4'],(int)$result['SUM_5']);
//    array_push($data, $result['SIDE_NAME']);
}

//	$data = array($data);			
echo json_encode($data);
?>