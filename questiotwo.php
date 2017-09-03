<?php require_once("configs_head.php");?>
<body>
    <div id="all">
        <?php require_once("configs_header.php");
            $s = $_GET["side_id"];
        ?>

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>สรุปปัญหาเด็กและเยาวชน</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="">ปัญหาเด็กและเยาวชน</a>
                            </li>
                            <li>สรุปปัญหาเด็กและเยาวชน</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">
                
                <form method="POST" action="">
                            <table>
                                <tr>
                                    <td><label for="txt_year">ระบุปี :</label></td>
                                    <td>
                                        <select id="txt_year" class="form-control" name="txt_year">
                                            <option value="">--------------</option>
                                            <?php
                                            $txtYear = (isset($_POST['txt_year']) && $_POST['txt_year'] != '') ? $_POST['txt_year'] : date('Y');
                                            $yearStart = date('Y');
                                            $yearEnd = $txtYear - 5;
                                            for ($year = $yearStart; $year > $yearEnd; $year--) {
                                                $selected = '';
                                                if ($txtYear == $year)
                                                    $selected = 'selected="selected"';
                                                echo '<option value="' . $year . '" ' . $selected . '>' . ($year + 543) . '</option>' . "\n";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><input class="btn btn-primary form-control" type="submit" value="ค้นหา" /></td>
                                </tr>
                            </table>
                        </form>

                <section>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="panel-body">
                            <div class="table-responsive">
                              <?php
                              $y = $year + 548;
                                 include 'config/connection.php';
                          			 $sql_get1 = "SELECT tbl_guilt.GUILT_NAME, tbl_guilt.GUILT_ID, sum(tbl_case.TOTAL) as TOTAL 
                                                                FROM tbl_case 
                                                                JOIN tbl_guilt ON tbl_case.GUILT_ID = tbl_guilt.GUILT_ID 
                                                                JOIN tdl_police ON tbl_case.POLICEST_ID = tdl_police.AMPHUR_ID 
                                                                WHERE tbl_case.INST_ID IN (2,4) AND tbl_case.SIDE_ID = $s 
                                                                AND tbl_case.YEAR = '$y' 
                                                                GROUP BY tbl_guilt.GUILT_ID
                                                                ORDER BY sum(tbl_case.TOTAL) DESC";
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
                                        <?php $iii=1; while($row_get1 = @mysql_fetch_array($rel_get1)){?>
                                          <tr class="odd gradeX">
                                              <td style="text-align:center;">
                                                <?php echo $iii++; ?>
                                              </td>
                                              <td>
                                                  <a href="#myModal" class="link_dialog_two" data-guilt="<?=$row_get1["GUILT_NAME"]?>" data-guilt-id="<?=$row_get1["GUILT_ID"]?>" data-toggle="modal">
                                                        <?php echo $row_get1["GUILT_NAME"];?>
                                                  </a>
                                              </td>
                                              <td style="text-align:center;">
                                                <?php echo $row_get1["TOTAL"];?>
                                              </td>
                                          </tr>
                                        <?php $iii; } ?>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </section>

            </div>
            <!-- /#contact.container -->
        </div>
        <!-- /#content -->
        
        <div class="modal fade" id="myModal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 class="modal-title" id="modal_sub_title"></h3>
                                        </div>
                                        <div class="modal-body">
                                            <!--<h4 class="text-center" id="modal_sub_title"></h4>-->
                                            <table class="table table-striped" id="tblGrid">
                                                <thead id="tblHead">
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>สภ.</th>
                                                        <th>รวม</th>
                                                        <th>เฉลี่ย</th>
                                                        <!--<th class="text-right">Mean</th>-->
                                                    </tr>
                                                </thead>
                                                <tbody class="md_tb_bd">
                                                    
                                                </tbody>
                                            </table>
<!--                                            <div class="form-group">
                                                <input type="button" class="btn btn-warning btn-sm pull-right" value="Reset">
                                                <div class="clearfix"></div>
                                            </div>-->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="btn_close" class="btn btn-default">Close</button>
                                            <!--<button type="button" class="btn btn-primary">Save Changes</button>-->
                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

        <section class="bar background-image-fixed-2 no-mb color-white text-center">
            <div class="dark-mask"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-uppercase"></h3>
                        <p class="lead"></p>
                        <p class="text-center">
                            <a href="index.php" class="btn btn-template-transparent-black btn-lg">ปัญหาเด็กและเยาวชน ...ปัญหาของใคร ?</a>
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <div id="get-it">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <h3></h3>
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
