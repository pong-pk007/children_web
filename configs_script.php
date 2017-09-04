<!-- #### JAVASCRIPT FILES ### -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
</script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="js/jquery.cookie.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/front.js"></script>

<!-- owl carousel -->
<script src="js/owl.carousel.min.js"></script>

<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        var year = $('#txt_year').val();

        $('#dataTables-example').dataTable({
            paging: true,
            info: false,
            pageLength: 10
        });
        $('.link_dialog').click(function () {
            var inst_id = $(this).attr('data-inst_id');
            var guilt = $(this).attr('data-guilt');
            var guilt_id = $(this).attr('data-guilt-id');


            if (inst_id != null && guilt != null) {
                console.log("inst_id: " + inst_id);
                console.log("guilt: " + guilt);
                $('#modal_sub_title').text("ฐานความผิด: " + guilt);
                console.log("data-guilt-id: " + guilt_id);
                console.log("year: " + (parseInt(year) + 543));


            }

//            $("#tr1").remove();
//            $("#tr1").empty();

            $.ajax({
                url: "api/guilt_detail_data.php?inst_id=" + inst_id + "&guilt_id=" + guilt_id + "&year=" + (parseInt(year) + 543),
                type: "POST",
                success: function (result) {
                    var obj = jQuery.parseJSON(result);
                    if (obj != '') {
                        var j;
                        for (i = 1; i < 23; i++) {//remove tr before append
                            $("#tr").remove();
                        }

                        var i = 1;
                        $.each(obj, function (key, val) {
                            var tr = "<tr id='tr'>"; // start table row
                            tr = tr + "<td>" + i + "</td>";
                            tr = tr + "<td>" + val["AMPHUR_NAME"] + "</td>";
                            tr = tr + "<td>" + val["SUM_TOTAL"] + "</td>";
                            tr = tr + "<td>" + "-" + "</td>";
                            tr = tr + "</tr>"; //end table row
                            $("#tblGrid").append(tr);
                            i++;
                        });
                    }
                }
            });



//            var tr = "<tr id='tr1'>";
//            tr = tr + "<td>" + ("test_table1") + "</td>";
//            tr = tr + "<td>" + ("test_table2") + "</td>";
//            tr = tr + "<td>" + ("test_table3") + "</td>";
//            tr = tr + "<td>" + ("test_table4") + "</td>";
//            tr = tr + "<td>" + ("test_table5") + "</td>";
//            tr = tr + "</tr>";
//            $("#tblGrid").append(tr);

//            $('#myModal').show();
            $("#btn_close").click(function () {
//                $("#tr1").remove();
//                $("#tblGrid").remove();
                $("#md_tb_bd").empty();
                console.log("clear");
                $('#myModal').modal("hide");
            });
//               console.log("test");
        });

        $('.link_dialog_two').click(function () {
            var guilt = $(this).attr('data-guilt');
            var guilt_id = $(this).attr('data-guilt-id');


            if (guilt != null) {
                console.log("guilt: " + guilt);
                $('#modal_sub_title').text("ฐานความผิด: " + guilt);
                console.log("data-guilt-id: " + guilt_id);
                console.log("year: " + (parseInt(year) + 543));


            }

//            $("#tr1").remove();
//            $("#tr1").empty();

            $.ajax({
                url: "api/guilt_data_all.php?&guilt_id=" + guilt_id + "&year=" + (parseInt(year) + 543),
                type: "POST",
                success: function (result) {
                    var obj = jQuery.parseJSON(result);
                    if (obj != '') {
                        var j;
                        for (i = 1; i < 74; i++) {//remove tr before append
                            $("#tr").remove();
                        }

                        var i = 1;
                        $.each(obj, function (key, val) {
                            var tr = "<tr id='tr'>"; // start table row
                            tr = tr + "<td>" + i + "</td>";
                            tr = tr + "<td>" + val["AMPHUR_NAME"] + "</td>";
                            tr = tr + "<td>" + val["SUM_TOTAL"] + "</td>";
                            tr = tr + "<td>" + "-" + "</td>";
                            tr = tr + "</tr>"; //end table row
                            $("#tblGrid").append(tr);
                            i++;
                        });
                    }
                }
            });



//            var tr = "<tr id='tr1'>";
//            tr = tr + "<td>" + ("test_table1") + "</td>";
//            tr = tr + "<td>" + ("test_table2") + "</td>";
//            tr = tr + "<td>" + ("test_table3") + "</td>";
//            tr = tr + "<td>" + ("test_table4") + "</td>";
//            tr = tr + "<td>" + ("test_table5") + "</td>";
//            tr = tr + "</tr>";
//            $("#tblGrid").append(tr);

//            $('#myModal').show();
            $("#btn_close").click(function () {
//                $("#tr1").remove();
//                $("#tblGrid").remove();
                $("#md_tb_bd").empty();
                console.log("clear");
                $('#myModal').modal("hide");
            });
//               console.log("test");
        });
    });
</script>
