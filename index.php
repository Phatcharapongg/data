<?PHP
//Connect DB 
require('config/config.php');

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$selectClass = 0;

if (isset($_POST['class']) && $_POST['class'] != '') {
    $class = $_POST['class'];
    $selectClass = 1;
} else if (isset($_POST['student']) && $_POST['student'] != '') {
    $dataStuden     = explode("|x|", $_POST['student']);
    $studenID       = $dataStuden[0];
    $studenFullname = $dataStuden[1];
    $classNumber    = $dataStuden[2];
    $selectClass    = 2;
    $fdate = $_POST['fdate'];
    $ldate = $_POST['ldate'];
} else {
    $selectClass = 0;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเว็บหลัก</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="plugins/fullcalendar/main.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- pace-progress -->
    <!-- <link rel="stylesheet" href="plugins/pace-progress/themes/อยากได้สีอะไร ใส่ตรงนี้/pace-theme-flat-top.css"> -->
    <link rel="stylesheet" href="plugins/pace-progress/themes/red/pace-theme-flat-top.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>

</head>
<br><br><br>

<body style="font-family: 'Kanit', sans-serif;  background-image: url('./dist/img/bgg.jpg');">

    <div class="contect">
        <div class="container">
            <center>
                <h3 class="text-bold">บันทึกการฝากออมเงินของนักเรียน</h3>
            </center>

            <br>
            <?PHP
            if ($selectClass == 0) {
            ?>
                <center>
                    <h4 class="text-bold">( ชั้นประถมศึกษาปีที่ 1 - 6 ) </h4>
                </center>
                <br>
                <form action="" method="POST">
                    <div class="row mb-4">
                        <div class='col-12 mb-3'>
                            <select class="form-control select2bs4 " id='class' name="class" >
                                <option value="">กรุณาเลือกชั้นเรียน</option>
                                <option value='1/1'>ชั้นประถมศึกษาปีที่ 1/1</option>
                                <option value='1/2'>ชั้นประถมศึกษาปีที่ 1/2</option>
                                <option value='1/3'>ชั้นประถมศึกษาปีที่ 1/3</option>
                                <option value='2/1'>ชั้นประถมศึกษาปีที่ 2/1</option>
                                <option value='2/2'>ชั้นประถมศึกษาปีที่ 2/2</option>
                                <option value='2/3'>ชั้นประถมศึกษาปีที่ 2/3</option>
                                <option value='3/1'>ชั้นประถมศึกษาปีที่ 3/1</option>
                                <option value='3/2'>ชั้นประถมศึกษาปีที่ 3/2</option>
                                <option value='3/3'>ชั้นประถมศึกษาปีที่ 3/3</option>
                                <option value='4/1'>ชั้นประถมศึกษาปีที่ 4/1</option>
                                <option value='4/2'>ชั้นประถมศึกษาปีที่ 4/2</option>
                                <option value='4/3'>ชั้นประถมศึกษาปีที่ 4/3</option>
                                <option value='5/1'>ชั้นประถมศึกษาปีที่ 5/1</option>
                                <option value='5/2'>ชั้นประถมศึกษาปีที่ 5/2</option>
                                <option value='5/3'>ชั้นประถมศึกษาปีที่ 5/3</option>
                                <option value='6/1'>ชั้นประถมศึกษาปีที่ 6/1</option>
                                <option value='6/2'>ชั้นประถมศึกษาปีที่ 6/2</option>
                                <option value='6/3'>ชั้นประถมศึกษาปีที่ 6/3</option>
                            </select>
                <br>
                        <div class="col-12 mb-3">
                            <button type="submit" id="btns" class='btn btn-info btn-block mb-3'>ค้นหา</button>
                        </div>
                    </div>
                </form>

                <script>
                    $(document).ready(function() {
                        $('#btns').attr('disabled', 'disabled');
                        $('#class').change(function() {
                            if ($(this).val != '') {
                                $('#btns').removeAttr('disabled');
                            }
                        });
                    });
                </script>

                

            <?PHP } else if ($selectClass == 1) { ?>
                <?PHP

                ?>
                <!-- // echo 'class : ' . $class;
                // echo '<br/>';
                // echo 'selectClass : ' . $selectClass; -->
                <form action="" method="POST">
                    <div class="row">
                        <div class='col-12 mb-3'>
                            <select class="form-control select2bs4" id='student' name="student">
                                <option>กรุณาเลือกนักเรียน</option>
                                <?PHP
                                $getStudenSQL = "SELECT * FROM list_students WHERE ls_class = '$class' ";
                                $getStudenARR = mysqli_query($conn, $getStudenSQL);
                                $getStudenNUM = mysqli_num_rows($getStudenARR);
                                if ($getStudenNUM > 0) {
                                    foreach ($getStudenARR as $getStuden) {
                                        $classByStuden = $getStuden['ls_class'];
                                        $fullname = $getStuden['ls_prefix'] . ' ' .  $getStuden['ls_fname'] . ' ' . $getStuden['ls_lname'];
                                ?>
                                        <option value="<?= $getStuden['ls_student_id']; ?>|x|<?= $fullname; ?>|x|<?= $classByStuden; ?>">
                                            <?= $fullname ?></option>
                                <?PHP
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class='col-6 mb-3'>
                            <div class="input-group date" id="fdate" data-target-input="nearest">
                                <input name="fdate" type="text" class="form-control datetimepicker-input" data-target="#fdate" />
                                <div class="input-group-append" data-target="#fdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class='col-6 mb-3'>
                            <div class="input-group date" id="ldate" data-target-input="nearest">
                                <input name="ldate" type="text" class="form-control datetimepicker-input" data-target="#ldate" />
                                <div class="input-group-append" data-target="#ldate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">

                            <button type="submit" class='btn btn-info btn-block mb-3 '>ค้นหา</button>
                        </div>
                    </div>
                </form>
            <?PHP } ?>



            <?PHP
            if ($selectClass == 2) {
            ?>
                <br>
                <h4 class="text-bold"> <?= $studenFullname; ?> ชั้นประถมศึกษาปีที่ : <?= $classNumber; ?></h4>



                <center>
                    <h6 class="text-bold">รายการตั้งแต่วันที่ <?= KTgetData::convertTHDate($fdate, "DMY"); ?> -
                        <?= KTgetData::convertTHDate($ldate, "DMY"); ?></h6>
                </center>


                <table class="table table-bordered table-striped">
                    <thead>

                        <tr class="text-center">
                            <th>วันที่</th>
                            <th>รายการ</th>
                            <th>ฝาก / ถอน</th>
                            <th>ยอดคงเหลือ (บาท)</th>
                            <th>รายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP

                        $getDepositByIdSQL = "SELECT * FROM deposit WHERE dep_student_id = '$studenID' AND dep_status != '9' ";
                        $getDepositByIdARR = mysqli_query($conn, $getDepositByIdSQL);
                        $getDepositByIdNUM = mysqli_num_rows($getDepositByIdARR);
                        if ($getDepositByIdNUM > 0) {
                            foreach ($getDepositByIdARR as $getDepositById) {
                                $dep_amount_in      =  $getDepositById['dep_amount_in'];
                                $dep_amount_out     =  $getDepositById['dep_amount_out'];
                                $dep_amount_balance =  $getDepositById['dep_amount_balance'];
                                $dep_type           =  $getDepositById['dep_type'];
                                $dep_note           =  $getDepositById['dep_note'];
                                // echo "<pre>";
                                // print_r($getDepositById);
                                // echo "</pre>";
                        ?>
                                <tr class="text-center">
                                    <td class="text-bold"><?= KTgetData::convertTHDate($getDepositById['dep_insdt'], 'DMY') ?></td>
                                    <td class="text-bold">
                                        <?PHP
                                        if ($dep_type != 'ถอน') {
                                        ?>
                                            <span class="text-success"><?= $dep_type; ?></span>
                                        <?PHP
                                        } else {
                                        ?>
                                            <span class="text-danger"><?= $dep_type; ?></span>
                                        <?PHP
                                        }
                                        ?>
                                    </td>
                                    <td class="text-bold">
                                        <?PHP
                                        if ($dep_amount_in != 0) {
                                        ?>
                                            <span class="text-success">+<?= $dep_amount_in; ?>.-</span>
                                        <?PHP
                                        } else {
                                        ?>
                                            <span class="text-danger ml-5">-<?= $dep_amount_out; ?>.-</span>
                                        <?PHP
                                        }
                                        ?>
                                    </td>
                                    <td class="text-bold"><?= $dep_amount_balance; ?>.-</td>
                                    <td class="text-bold"><?= $dep_note; ?></td>
                                </tr>
                            <?PHP
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5" class="text-bold text-center bg-danger">ยังไม่มีการฝากเงิน</td>
                            </tr>
                        <?PHP
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-bold" colspan="4" style="text-align: right;">จำนวนเงินสะสม</td>
                            <td class="text-bold"><?= isset($dep_amount_balance) ? $dep_amount_balance : '0'; ?> บาท</td>
                        </tr>
                    </tfoot>
                </table>
            <?PHP  } ?>


            <?PHP
            if ($selectClass == 2) {
            ?>

                <?PHP
                $getTeacherSQL = "SELECT * FROM user WHERE usr_class = '$classNumber'";
                $getTeacherARR = mysqli_query($conn, $getTeacherSQL);
                $getTeacherNUM = mysqli_num_rows($getTeacherARR);

                foreach ($getTeacherARR as $getTeacher) {
                    $fullnameTeacher =  $getTeacher['usr_fname'] . ' ' . $getTeacher['usr_lname'];
                    $TelTeacher =  $getTeacher['usr_tel'];
                }
                ?>
                <h6 class="text-bold">ครู <?= $fullnameTeacher; ?> สามารถติดต่อได้ที่ เบอร์ <?= $TelTeacher; ?></h6>

        </div>
    <?PHP  } ?>

    <script src="sweetalert2.all.min.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/fullcalendar/main.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- JQVMap -->
    <!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- pace-progress -->
    <script src="plugins/pace-progress/pace.min.js"></script>

    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $(function() {
            // $("#usertable").DataTable({
            //     "responsive": true,
            //     "lengthChange": false,
            //     "autoWidth": false,
            //     "buttons": ["excel", "pdf", "print", "colvis"]
            // }).buttons().container().appendTo('#usertable_wrapper .col-md-6:eq(0)');


            //searchdate picker
            $('#fdate').datetimepicker({
                format: 'L'
            });

            //reservationdate picker
            $('#ldate').datetimepicker({
                format: 'L'
            });
        });
    </script>
</body>

</html>