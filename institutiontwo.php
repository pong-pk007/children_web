<?php require_once("configs_head.php");?>
<body>
    <div id="all">
        <?php require_once("configs_header.php");?>

        <div id="heading-breadcrumbs">
          <?php
                include 'config/connection.php';
                $pro_id = $_GET["id"];
                $sqlpro = "SELECT * FROM tdl_institution WHERE tdl_institution.INST_ID = $pro_id";
                $querypro = mysql_query($sqlpro);
                $resultpro = mysql_fetch_array($querypro,MYSQL_ASSOC);
          ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h3><?php echo $resultpro["INST_NAME"];?></h3>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li>
                              <a href="institution.php">หน่วยงาน</a>
                            </li>
                            <li>
                              <a href=""><?php echo $resultpro["INST_NAME"];?></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container" id="contact">

                <div class="row">

                    <div class="col-md-4">

                        <section>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-12">
                                    <img class="img-thumbnail" alt="Cinque Terre" width="404" height="836" src="<?php echo $resultpro["INST_LOGO"];?>">
                                </div>
                              </div>
                              <p></p>
                              <div class="row">
                                <div class="col-md-12">
                                  <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                  <th class="active">ที่ตั้งหน่วยงาน</th>
                                  <td><?php echo $resultpro["INST_LOCATION"];?></td>
                                </tr>
                                <tr>
                                  <th>เบอร์โทรศัพท์</th>
                                  <td><?php echo $resultpro["TEL"];?></td>
                                </tr>
                                </tbody>
                              </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>

                    </div>

                    <div class="col-md-8">

                        <section>

<!--                            <div class="heading">
                                <h2>We are here to help you</h2>
                            </div>-->

                            <div class="panel-body">
                                <div class="table-responsive">
                                  <?php
                                     include 'config/connection.php';
                                     $y = $year+548;
                              			 $sql_get1 = "SELECT  side.SIDE_NAME
                                                                      ,side.SIDE_ID
                                                                    ,(SELECT COUNT(tbl_case.CASE_ID) 
                                                                             FROM tbl_case 
                                                                             WHERE tbl_case.SIDE_ID = side.SIDE_ID AND tbl_case.INST_ID = $pro_id) AS CNT_CASE

                                                                    ,ifNULL((SELECT SUM(tbl_case.TOTAL) 
                                                                             FROM tbl_case 
                                                                             WHERE tbl_case.SIDE_ID = side.SIDE_ID AND tbl_case.INST_ID = $pro_id),0) AS SUM_TOTAL
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
                                              while($row_get1 = @mysql_fetch_array($rel_get1)){
                                            ?>
                                              <tr class="odd gradeX" <?php if($iii == 1){echo 'style="background-color: #FF3333"';}elseif($iii==2){    echo 'style="background-color: #FFCC00"';}elseif($iii==3){    echo 'style="background-color: #FFFF33"';} ?>>
                                                  <td style="text-align:center;">
                                                    <?php echo $iii++; ?>
                                                  </td>
                                                  <td>
                                                      <a href="institutionthree.php?id=<?=$pro_id?>&side_name=<?= $row_get1["SIDE_NAME"];?>" data-toggle="tooltip" data-placement="right" title="รายละเอียด">
                                                    <?php echo $row_get1["SIDE_NAME"];?>
                                                      </a>
                                                  </td>
                                                  <td style="text-align:center;">
                                                    <?php echo $row_get1["SUM_TOTAL"];?>
                                                  </td>
                                              </tr>
                                            <?php $iii; } ?>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                            <!-- /.col-md-3 -->

                        </section>

                    </div>

                </div>
                <!-- /.row -->


            </div>
            <!-- /#contact.container -->
        </div>
        <!-- /#content -->


        <div id="get-it">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <h3>Do you want cool website like this one?</h3>
                </div>
                <div class="col-md-4 col-sm-12">
                    <a href="#" class="btn btn-template-transparent-primary">Buy this template now</a>
                </div>
            </div>
        </div>


        <!-- *** GET IT END *** -->


        <?php require_once("configs_footer.php");?>



    </div>
    <!-- /#all -->

    <?php require_once("configs_script.php");?>



</body>

</html>
