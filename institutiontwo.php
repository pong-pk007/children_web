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

                            <div class="heading">
                                <h2>We are here to help you</h2>
                            </div>

                            <p class="lead">Are you curious about something? Do you have some kind of problem with our products? As am hastily invited settled at limited civilly fortune me. Really spring in extent an by. Judge but built gay party world. Of so am he remember
                                although required. Bachelor unpacked be advanced at. Confined in declared marianne is vicinity.</p>
                            <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>

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
