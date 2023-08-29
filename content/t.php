<div class="contect">
        <div class="container">
            <center>
                <h3 class="text-bold">บันทึกรายการฝากออมเงินของนักเรียน</h3>
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
                        <select class="form-control select2bs4 " id='class' name="class">
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
                            <option
                                value="<?= $getStuden['ls_student_id']; ?>|x|<?= $fullname; ?>|x|<?= $classByStuden; ?>">
                                <?= $fullname ?></option>
                            <?PHP
                                    }
                                }
                                ?>
                        </select>
                    </div>
                    <div class='col-6 mb-3'>
                        <div class="input-group date" id="fdate" data-target-input="nearest">
                            <input name="fdate" type="text" class="form-control datetimepicker-input"
                                data-target="#fdate" />
                            <div class="input-group-append" data-target="#fdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class='col-6 mb-3'>
                        <div class="input-group date" id="ldate" data-target-input="nearest">
                            <input name="ldate" type="text" class="form-control datetimepicker-input"
                                data-target="#ldate" />
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
            <div class='row'>
                <div class='col-6'>
                    <h3 class="text-bold">บันทึกรายการฝากออมเงินของนักเรียน</h3>
                </div>
                <div class='col-6' style='text-align: right;'>
                    <h4 class="text-bold"> <?= $studenFullname; ?> ชั้นประถมศึกษาปีที่ : <?= $classNumber; ?></h4>
                </div>
            </div>


            <center>
                <h6 class="text-bold">รายการตั้งแต่วันที่ <?= KTgetData::convertTHDate($fdate, "DMY"); ?> -
                    <?= KTgetData::convertTHDate($ldate, "DMY"); ?></h6>
            </center>


            <table class="table no-border">
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

                        $getDepositByIdSQL = "SELECT * FROM deposit WHERE dep_student_id = '$studenID' AND dep_insdt BETWEEN '$fdate 00:00:00' AND '$ldate 23:59:59' AND dep_status != '9' ";
                        $getDepositByIdARR = mysqli_query($conn, $getDepositByIdSQL);
                        $getDepositByIdNUM = mysqli_num_rows($getDepositByIdARR);
                        // echo $getDepositByIdSQL;
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
                            <span class="text-success">+<?= number_format($dep_amount_in); ?>.-</span>
                            <?PHP
                                        } else {
                                        ?>
                            <span class="text-danger ml-5">-<?= number_format($dep_amount_out); ?>.-</span>
                            <?PHP
                                        }
                                        ?>
                        </td>
                        <td class="text-bold"><?= number_format($dep_amount_balance); ?>.-</td>
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
                        <td class="text-bold">
                            <?= isset($dep_amount_balance) ? number_format($dep_amount_balance) : '0'; ?> บาท</td>
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
            <h6 class="text-bold">ครู <?= $fullnameTeacher; ?> สามารถติดต่อได้ที่ เบอร์
                <?= KTgetData::formatNumber($TelTeacher); ?></h6>

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
                format: 'Y-M-D'
            });

            //reservationdate picker
            $('#ldate').datetimepicker({
                format: 'Y-M-D'
            });
        });
        </script>


<nav class="navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="#" class="navbar-brand">
                <!-- <img src="./dist/img/default.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8"> -->
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>
            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index3.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>

                </ul>


            </div>

            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>