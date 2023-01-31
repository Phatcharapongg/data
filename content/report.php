<?PHP
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

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="text-bold">รายงาน</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main?path=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">รายงาน</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid ">

        <center>
            <h2 class="text-bold">บันทึกรายงานการฝากออมเงินของเด็กนักเรียน</h2>
        </center>

        <br>
        <?PHP
        if ($selectClass == 0) {
        ?>
            <center>
                <h4 class="text-bold">( ชั้นประถมศึกษาปีที่ 1 - 6 ) </h4>
                <div class="col-6">
                    <form action="" method="POST">
                        <div class="col-12">
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

                        </div>
                        <div class="col-3">
                            <button type="submit" id="btns" class='btn btn-primary btn-block mt-3'>ค้นหา</button>

                        </div>


                    </form>
                </div>

            </center>

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
            <form action="" method="POST">
                <div class="row mb-1">
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
                </div>

                <div class="row mb-2">
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
                </div>
                <div class="col-12">

                    <button type="submit" class='btn btn-primary btn-block mb-3 '>ค้นหา</button>
                </div>
            </form>
        <?PHP } ?>

        <?PHP
        if ($selectClass == 2) {
        ?>

            <h4 class="text-bold"> <?= $studenFullname; ?> ชั้นประถมศึกษาปีที่ : <?= $classNumber; ?></h4>
            <br>
            <center>
                <h5 class="text-bold">รายการตั้งแต่วันที่ <?= KTgetData::convertTHDate($fdate, "DMY"); ?> -
                    <?= KTgetData::convertTHDate($ldate, "DMY"); ?></h5>
            </center>
            <br>
            <div class="card">
                <div class="card-body">
                    <table id="usertable" class="table table-bordered table-striped">
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

                            $getDepositByIdSQL = "SELECT * FROM deposit WHERE dep_student_id = '$studenID' AND dep_insdt BETWEEN '$fdate 00:00:00' AND '$ldate 23:59:59' AND dep_status != '9'";
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
                                <td class="text-bold"><?= isset($dep_amount_balance) ? $dep_amount_balance : '0'; ?> บาท</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
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

        <?PHP  } ?>
    </div>
</section>



<script>
    $(function() {
        $("#usertable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#usertable_wrapper .col-md-6:eq(0)');


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