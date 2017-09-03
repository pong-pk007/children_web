<?php require_once("configs_head.php");?>
<body>
    <div id="all">
        <?php require_once("configs_header.php");?>

        <div id="heading-breadcrumbs">
          <?php
                include 'config/connection.php';
                $pro_id = $_GET["id"];
                $sqlpro = "SELECT * FROM tbl_amphur WHERE AMPHUR_ID = $pro_id";
                $querypro = mysql_query($sqlpro);
                $resultpro = mysql_fetch_array($querypro,MYSQL_ASSOC);
          ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>อำเภอ<?php echo $resultpro["AMPHUR_NAME"];?></h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="#">ปัญหาเด็กและเยาวชน</a>
                            </li>
                            <li><?php echo $resultpro["AMPHUR_NAME"];?></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <section>
                  <div class="row">
                      <div class="col-md-4">
                          <section>
                            <div class="col-md-12">
                              <img class="img-thumbnail" alt="Cinque Terre" width="404" height="836" src="<?php echo $resultpro["PHOTO_MAP"];?>">
                              <p></p>
                              <div class="text-center">
                              <p><b>รูปแผนที่</b> อำเภอ<?php echo $resultpro["AMPHUR_NAME"];?></p>
                              </div>
                              <p></p>
                              <ul class="nav nav-pills nav-stacked">
                                <li class="active text-center"><a href="#">ข้อมูลทั่วไป</a></li>
                              </ul>
                              <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                  <th>จำนวนประชากร</th>
                                  <td><?php echo $resultpro["POPULATION"];?></td>
                                </tr>
                                <tr>
                                  <th>พื้นที่</th>
                                  <td><?php echo $resultpro["AREA"];?></td>
                                </tr>
                                <tr>
                                  <th>พิกัด</th>
                                  <td><?php echo $resultpro["LOCATION"];?></td>
                                </tr>
                                <tr>
                                  <th>คำขวัญ</th>
                                  <td><?php echo $resultpro["SLOGAN"];?></td>
                                </tr>
                                <tr>
                                  <th>อนาเขต</th>
                                  <td><?php echo $resultpro["TERRITORY"];?></td>
                                </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.col-md-3 -->
                          </section>
                      </div>
                      <div class="col-md-8">

                          <section>
                              <div class="panel-body">
                                <div class="table-responsive">
                                  <?php
                                     include 'config/connection.php';
                              			 $sql_get1 = "SELECT  side.SIDE_NAME
                                                                      ,side.SIDE_ID
                                                                    ,(SELECT COUNT(tbl_case.CASE_ID) 
                                                                             FROM tbl_case 
                                                                             WHERE tbl_case.SIDE_ID = side.SIDE_ID AND tbl_case.POLICEST_ID = $pro_id) AS CNT_CASE

                                                                    ,ifNULL((SELECT SUM(tbl_case.TOTAL) 
                                                                             FROM tbl_case 
                                                                             WHERE tbl_case.SIDE_ID = side.SIDE_ID AND tbl_case.POLICEST_ID = $pro_id),0) AS SUM_TOTAL
                                                                     FROM tbl_side AS side

                                                                     ORDER BY (SELECT COUNT(tbl_case.CASE_ID) FROM tbl_case WHERE tbl_case.SIDE_ID = side.SIDE_ID) DESC";
                              			 $rel_get1 = mysql_query($sql_get1) or die(mysql_error());
                              		?>
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                          <thead>
                                              <tr>
                                                  <th style="text-align:center;">ลำดับ</th>
                                                  <th style="text-align:center;">ฐานความผิด</th>
                                                  <th style="text-align:center;">รวม</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              $iii=1;
                                              while($row_get1 = mysql_fetch_array($rel_get1)){
                                            ?>
                                              <tr class="odd gradeX" <?php if($iii == 1){echo 'style="background-color: #FF3333"';}elseif($iii==2){    echo 'style="background-color: #FFCC00"';}elseif($iii==3){    echo 'style="background-color: #FFFF33"';} ?> >
                                         
                                                  <td style="text-align:center;">
                                                    <?php echo $iii++; ?>
                                                  </td>
                                            
                                                  <td>
                                                      <a href="amphoetwo.php?id=<?=$pro_id?>&side_name=<?= $row_get1['SIDE_NAME'];?>&side_id=<?=$row_get1["SIDE_ID"]?>" data-toggle="tooltip" data-placement="right" title="รายละเอียด">
                                                            <?php echo $row_get1["SIDE_NAME"];?> 
                                                      </a>
                                                  </td>
                                           
                                                  <td style="text-align:center;">
                                                    <?php echo number_format($row_get1["SUM_TOTAL"]);?>
                                                  </td>
                                              </tr>
                                            <?php $iii; } ?>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                            <!-- /.col-md-3 -->
                          </section>
                          <blockquote>
                              <p><B>จากตาราง</B> สรุปปัญหาด้านเด็กและเยาวชน ทำการวิเคราะห์จากข้อมูลของหน่วนงาน ต่อไปนี้</p>
                              <ul>
                                  <li>สำนักงานคุมประพฤติจังหวัดศรีสะเกษ</li>
                                  <li>สำนักงานคณะกรรมการการศึกษาขั้นพื้นฐาน</li>
                              </ul>
                          </blockquote>
                      </div>
                  </div>
                  <!-- /.row -->
                </section>
            </div>
            <!-- /#contact.container -->
        </div>
        <!-- /#content -->

        <?php require_once("configs_footer.php");?>

    </div>
    <!-- /#all -->

    <?php require_once("configs_script.php");?>

</body>

</html>
