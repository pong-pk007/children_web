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
$('#dataTables-example').dataTable({
    paging: true,
    info: false,
    pageLength: 10
});
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
//                $("#md_tb_bd").empty();
                 
                var tr = "<tr id='tr1'>";
                         tr = tr + "<td>" + ("test_table1") + "</td>";
                         tr = tr + "<td>" + ("test_table2") + "</td>";
                         tr = tr + "<td>" + ("test_table3") + "</td>";
                         tr = tr + "<td>" + ("test_table4") + "</td>";
                         tr = tr + "<td>" + ("test_table5") + "</td>";
                    tr = tr + "</tr>";
                    $("#tblGrid").append(tr);
                    
               $('#myModal').show();
               $("#btn_close").click(function (){
                         $("#tr1").remove();
                         console.log("clear");
                          $('#myModal').modal("hide");
                    });
//               console.log("test");
            });
            
});
</script>
