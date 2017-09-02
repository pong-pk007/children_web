<?php require_once("configs_head.php");?>
<body>
    <div id="all">
        <?php require_once("configs_header.php");?>

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

                <section>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="panel-body">
                            <div class="table-responsive">
                              <?php
                                 include 'config/connection.php';
                          			 $sql_get1 = "SELECT tbl_side.SIDE_NAME,tbl_case.SIDE_ID,COUNT(tbl_case.CASE_ID),SUM(tbl_case.TOTAL) FROM tbl_case JOIN tbl_side ON tbl_case.SIDE_ID = tbl_side.SIDE_ID WHERE tbl_case.SIDE_ID AND INST_ID='2''4' GROUP BY tbl_case.SIDE_ID ORDER BY COUNT(tbl_case.CASE_ID) DESC";
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
                                                <?php echo $row_get1["SIDE_NAME"];?>
                                              </td>
                                              <td style="text-align:center;">
                                                <?php echo $row_get1["SUM(tbl_case.TOTAL)"];?>
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
