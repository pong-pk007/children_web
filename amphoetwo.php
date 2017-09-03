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
                                   echo $yearStart;
                                   $yearEnd = $txtYear-5;
                                   for($year=$yearStart; $year > $yearEnd; $year--){
                                    $selected = '';
                                    if($txtYear == $year) $selected = 'selected="selected"';
                                    echo '<option value="'.$year.'" '.$selected.'>'. ($year+543) .'</option>'."\n";
                                   }
                                   ?>
                                  </select>
                                 </td>
                                 <td><input class="btn btn-primary form-control" type="submit" value="ค้นหา" /></td>
                                </tr>
                            </table>
                           </form>
                           <section>
                              <div class="panel-body">
                                  <h4 class="center">ปัญหา: <?=$_GET["side_name"]?></h4>
                                  <h4>อำเภอ: <?php echo $resultpro["AMPHUR_NAME"];?> ประจำปี <?=($year+548)?></h4>
                                <div class="table-responsive">
                                  <?php
                                     include 'config/connection.php';
                                     $y = $year+548;
                              			 $sql_get1 = "SELECT tbl_guilt.GUILT_NAME, sum(tbl_case.TOTAL)  as TOTAL
                                                                FROM tbl_case 
                                                                JOIN tbl_guilt ON tbl_case.GUILT_ID = tbl_guilt.GUILT_ID 
                                                                JOIN tdl_police ON tbl_case.POLICEST_ID = tdl_police.AMPHUR_ID 
                                                                WHERE tbl_case.POLICEST_ID = $pro_id
                                                                    AND YEAR LIKE '$y' 
                                                                        GROUP by  tbl_guilt.GUILT_NAME
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
                                            <?php
                                              $iii=1;
                                              while($row_get1 = @mysql_fetch_array($rel_get1)){
                                            ?>
                                              <tr class="odd gradeX" <?php if($iii == 1){echo 'style="background-color: #FF3333"';}elseif($iii==2){    echo 'style="background-color: #FFCC00"';}elseif($iii==3){    echo 'style="background-color: #FFFF33"';} ?>>
                                                  <td style="text-align:center;">
                                                    <?php echo $iii++; ?>
                                                  </td>
                                                  <td>
                                                    <?php echo $row_get1["GUILT_NAME"];?>
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
                            <!-- /.col-md-3 -->
                            <blockquote>
                                <p><B>จากตาราง</B> สรุปปัญหาด้านเด็กและเยาวชน ทำการวิเคราะห์จากข้อมูลของหน่วนงาน ต่อไปนี้</p>
                                <ul>
                                    <li>สถานีตำรวจภูธรอำเภอ<?php echo $resultpro["AMPHUR_NAME"];?></li>
                                </ul>
                            </blockquote>
                           </section>
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
