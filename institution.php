<?php require_once("configs_head.php");?>
<body>
    <div id="all">
        <?php require_once("configs_header.php");?>

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>หน่วยงานจังหวัดศรีสะเกษ</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="">ปัญหาเด็กและเยาวชน</a>
                            </li>
                            <li>หน่วยงาน</li>
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
                            <p class="lead">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              การบูรณาการข้อมูลเพื่อวิเคราะห์ปัญหาด้านเด็กและเยาวชน โดยนำข้อมูลแต่ละหน่วยงานในจังหวัดศรีสะเกษ
                              และข้อมูลเชิงพื้นที่ในระดับหมู่บ้าน หรือชุมชน ทำให้การแก้ไขปัญหาไม่ตรงตามความเป็นจริง
                              จากการศึกษาข้อมูลปัญหาด้านเด็กและเยาวชน
                            </p>
                            <p class="role">[รายละเอียดข้างล่าง...]</p>
                        </div>
                    </div>
                </section>
            </div>
            <!-- /#contact.container -->


        </div>
        <!-- /#content -->

        <section class="bar background-pentagon no-mb">
  					<div class="container">
  						<?php
  						 include 'config/connection.php';
  						 $sqlpro = "SELECT * FROM tdl_institution WHERE INST_ID ";
  						 $querypro = mysql_query($sqlpro);
  						?>
  							<div class="row">
  									<div class="col-md-12">
  											<ul class="owl-carousel testimonials same-height-row">
  													<?php
  														 $i = 1;
  														 while ($result = mysql_fetch_array($querypro, MYSQL_ASSOC)){
  													?>
  													<li class="item">
  															<div class="testimonial same-height-always">
  																	<div class="team-member" data-animate="fadeInUp">
  																			<div class="image">
  																					<a href="#">
  																							<img alt="Cinque Terre" width="304" height="436" src="<?php echo $result["INST_LOGO"]; ?>" class="img-responsive img-circle">
  																					</a>
  																			</div>
  																			<h6><?php echo $result["INST_NAME"]; ?></h6>
  																			<p class="role">[ดูรายละเอียด...]</p>

  																	</div>
  															</div>
  															<p class="text-center">
  																<a href="institutiontwo.php?id=<?php echo $result["INST_ID"]; ?>" class="btn btn-template-main">คลิก</a>
  															</p>
  													</li>
  													<?php
  														$i++;}	mysql_close();
  													?>
  											</ul>
  											<!-- /.owl-carousel -->
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
