<?php require_once("configs_head.php");?>
<body>
    <div id="all">
        <?php require_once("configs_header.php");?>

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>พื้นที่จังหวัดศรีสะเกษ</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="">ปัญหาเด็กและเยาวชน</a>
                            </li>
                            <li>พื้นที่จังหวัดศรีสะเกษ</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <section>

            <div class="row text-center">
              <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2></h2>
                    </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                      <?php require_once("map.php"); ?>
                  </div>
              </div>
            </div>
            <!-- /.row -->

        </section>

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
