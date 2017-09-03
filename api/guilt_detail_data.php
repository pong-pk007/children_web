<?php
$inst_id = $_GET["inst_id"];
$guilt_id = $_GET["guilt_id"];
$year = $_GET["year"];
if(isset($inst_id)){
include '../config/connection.php';
$sql = "SELECT    amphur.AMPHUR_NAME
                        ,amphur.AMPHUR_ID
                        ,IFNULL((SELECT SUM(tbl_case.TOTAL) FROM tbl_case WHERE tbl_case.POLICEST_ID = amphur.AMPHUR_ID AND tbl_case.INST_ID = $inst_id AND tbl_case.GUILT_ID = $guilt_id AND tbl_case.YEAR = '$year'),0) AS SUM_TOTAL
                  FROM tbl_amphur AS amphur
                    ORDER BY (SELECT SUM(tbl_case.TOTAL) FROM tbl_case WHERE tbl_case.POLICEST_ID = amphur.AMPHUR_ID AND tbl_case.INST_ID = $inst_id AND tbl_case.GUILT_ID = $guilt_id AND tbl_case.YEAR = '$year') DESC";

$query = mysql_query($sql);
$initNumField = mysql_num_fields($query);
$resultArray = array();
while ($ObjResult = mysql_fetch_array($query)) {
    $arrCol = array();
    for ($i = 0; $i < $initNumField; $i++) {
        $arrCol[mysql_field_name($query, $i)] = $ObjResult[$i];
    }
    array_push($resultArray, $arrCol);
}
mysql_close();
echo json_encode($resultArray);

    }
?>
       