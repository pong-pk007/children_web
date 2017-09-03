<?php require_once("configs_head.php"); ?>
<body>
    <div id="all">
        <?php require_once("configs_header.php"); ?>

        <div id="heading-breadcrumbs">
            <?php
            include 'config/connection.php';
            $pro_id = $_GET["id"];
            $sqlpro = "SELECT * FROM tdl_institution WHERE tdl_institution.INST_ID = $pro_id";
            $querypro = mysql_query($sqlpro);
            $resultpro = mysql_fetch_array($querypro, MYSQL_ASSOC);
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h3><?php echo $resultpro["INST_NAME"]; ?></h3>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li>
                                <a href="institution.php">หน่วยงาน</a>
                            </li>
                            <li>
                                <a href=""><?php echo $resultpro["INST_NAME"]; ?></a>
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
                                            <img class="img-thumbnail" alt="Cinque Terre" width="404" height="836" src="<?php echo $resultpro["INST_LOGO"]; ?>">
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th class="active">ที่ตั้งหน่วยงาน</th>
                                                        <td><?php echo $resultpro["INST_LOCATION"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>เบอร์โทรศัพท์</th>
                                                        <td><?php echo $resultpro["TEL"]; ?></td>
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

                            <!--                            <div class="heading">
                                                            <h2>We are here to help you</h2>
                                                        </div>-->

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php
                                    include 'config/connection.php';
                                    $y = $year + 548;
                                    $sql_get1 = "SELECT tbl_guilt.GUILT_NAME, sum(tbl_case.TOTAL)  as TOTAL
                                                                FROM tbl_case 
                                                                JOIN tbl_guilt ON tbl_case.GUILT_ID = tbl_guilt.GUILT_ID 
                                                                JOIN tdl_police ON tbl_case.POLICEST_ID = tdl_police.AMPHUR_ID 
                                                                WHERE tbl_case.INST_ID = $pro_id 
                                                                    AND YEAR LIKE '$y' 
                                                                        GROUP by  tbl_guilt.GUILT_NAME
                                                                ORDER BY tbl_case.TOTAL DESC";
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
                                            $iii = 1;
                                            while ($row_get1 = @mysql_fetch_array($rel_get1)) {
                                                ?>
                                                <tr class="odd gradeX" <?php if ($iii == 1) {
                                                    echo 'style="background-color: #FF3333"';
                                                } elseif ($iii == 2) {
                                                    echo 'style="background-color: #FFCC00"';
                                                } elseif ($iii == 3) {
                                                    echo 'style="background-color: #FFFF33"';
                                                } ?>>
                                                    <td style="text-align:center;">
                                                        <?php echo $iii++; ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="link_dialog">
                                                <?php echo $row_get1["GUILT_NAME"]; ?>
                                                        </a>
                                                    </td>
                                                    <td style="text-align:center;">
    <?php echo $row_get1["TOTAL"]; ?>
                                                    </td>
                                                </tr>
    <?php $iii;
} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col-md-3 -->

                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 class="modal-title">Big Title</h3>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="text-center">Hello. Some text here.</h5>
                                            <table class="table table-striped" id="tblGrid">
                                                <thead id="tblHead">
                                                    <tr>
                                                        <th>Location</th>
                                                        <th>Points</th>
                                                        <th class="text-right">Mean</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr><td>Long Island, NY, USA</td>
                                                        <td>3</td>
                                                        <td class="text-right">45001</td>
                                                    </tr>
                                                    <tr><td>Chicago, Illinois, USA</td>
                                                        <td>5</td>
                                                        <td class="text-right">76455</td>
                                                    </tr>
                                                    <tr><td>New York, New York, USA</td>
                                                        <td>10</td>
                                                        <td class="text-right">39097</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="form-group">
                                                <input type="button" class="btn btn-warning btn-sm pull-right" value="Reset">
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save Changes</button>
                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

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


<?php require_once("configs_footer.php"); ?>



    </div>
    <!-- /#all -->

<?php require_once("configs_script.php"); ?>


    <script>
        $(document).ready(function () {
            $('.link_dialog').click(function () {
//                $.ajax({
//                    url: "PHP_AJAX/COUNT_AJAX.php",
//                    type: "POST",
//                    success: function (result) {
//                        var obj = jQuery.parseJSON(result);
//                        if (obj != '') {
//                            $("#bd_pd_count").empty();
//                            $.each(obj, function (key, val) {
//                                var tr = "<tr>";
//                                tr = tr + "<td>" + (key + 1) + "</td>";
//                                tr = tr + "<td>" + val["code"] + "</td>";
//                                tr = tr + "<td id='val'>" + val["val"] + "</td>";
//                                tr = tr + "</tr>";
//                                $("#tb_pd_count").append(tr);
//                            });
//                        }
//                    }
//                });
               $('#myModal').show();
               console.log("test");
            });
        });
    </script>

</body>

</html>
