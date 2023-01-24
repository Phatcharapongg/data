<?PHP
     echo '<pre>';
     print_r($_POST);
     echo '</pre>';
//----------------------------------------------------------------------------------------------- START MODAL ADD

use function PHPSTORM_META\type;

if (
    isset($_POST['form']) && $_POST['form'] == 'insertDeposit'
    && isset($_POST['insert']) && $_POST['insert'] == 'deposit'
    && isset($_POST['studentID']) && $_POST['studentID'] != ''
    && isset($_POST['type']) && $_POST['type'] != ''
    && isset($_POST['amount']) && $_POST['amount'] != ''
) {

    $type = $_POST['type'];
    $sumAmount = 0;

    $chkMaxBalanceSQL = "SELECT dep_amount_balance AS NowBalance FROM deposit WHERE dep_student_id = '" . $_POST['studentID'] . "' ORDER BY dep_id DESC LIMIT 1";
    $chkMaxBalanceARR = mysqli_query($conn, $chkMaxBalanceSQL);
    $chkMaxBalanceNUM = mysqli_num_rows($chkMaxBalanceARR);

    foreach ($chkMaxBalanceARR as $chkMaxBalance) {
        if ($type == 'ฝาก') {
            $sumAmount =  intval($chkMaxBalance['NowBalance']) + $_POST['amount'];
        } else {
            $sumAmount =  intval($chkMaxBalance['NowBalance']) - $_POST['amount'];
        }
    }

    // Insert

    // if ($type == 'ฝาก') {
    //     $InsertDepositSQL = "INSERT INTO deposit (dep_type, dep_amount_in, dep_amount_out, dep_amount_balance, dep_insby, dep_insdt, dep_status, dep_student_id, dep_note)
    //     VALUES (
    //         '" . $type . "',
    //         '" . $_POST['amount'] . "',
    //         '0',
    //         '" .  $sumAmount . "',
    //         '" . $_POST['username'] . "',
    //         '" . date("Y-m-d H:i:s") . "',
    //         '1',
    //         '" . $_POST['studentID'] . "',
    //         '" . $_POST['note'] . "'
    //         )";
    //     mysqli_query($conn, $InsertDepositSQL);
    // } else {
    //     $InsertDepositSQL = "INSERT INTO deposit (dep_type, dep_amount_in,dep_amount_out, dep_amount_balance, dep_insby, dep_insdt, dep_status, dep_student_id, dep_note)
    //     VALUES (
    //         '" . $type . "',
    //         '0',
    //         '" . $_POST['amount'] . "',
    //         '" .  $sumAmount . "',
    //         '" . $_POST['username'] . "',
    //         '" . date("Y-m-d H:i:s") . "',
    //         '1',
    //         '" . $_POST['studentID'] . "',
    //         '" . $_POST['note'] . "'
    //         )";
    //     mysqli_query($conn, $InsertDepositSQL);
    // }

    // header("location: " . $_SESSION['uri'] . "/" . $path . "/pages/main?path=deposit&alert=insert-success");
    // exit(0);


}
//----------------------------------------------------------------------------------------------- END MODAL ADD



//----------------------------------------------------------------------------------------------- START MODAL EDIT
if (
    isset($_POST['form']) && $_POST['form'] == 'editDeposit'
    && isset($_POST['edit']) && $_POST['edit'] == 'deposit'
    && isset($_POST['editStudentID']) && $_POST['editStudentID'] != ''
    && isset($_POST['editType']) && $_POST['editType'] != ''
    && isset($_POST['editAmount']) && $_POST['editAmount'] != ''

) {

    $editDepositSQL = "UPDATE deposit SET ";
    $editDepositSQL .= "dep_student_id  = '" . $_POST['editStudentID'] . "' ";
    $editDepositSQL .= ",dep_type       = '" . $_POST['editType'] . "' ";
    $editDepositSQL .= ",dep_amount     = '" . $_POST['editAmount'] . "' ";
    $editDepositSQL .= ",dep_note       = '" . $_POST['editNote'] . "' ";
    $editDepositSQL .= ",dep_upby       = '" . $_SESSION['username'] . "' ";
    $editDepositSQL .= ",dep_updt       = '" . date("Y-m-d H:i:s") . "' ";

    $editDepositSQL .= "WHERE dep_id = '" . $_POST['editID'] . "' ";
    mysqli_query($conn, $editDepositSQL);
    header("location: " . $_SESSION['uri'] . "/" . $path . "/pages/main?path=deposit&alert=edit-success");
    exit(0);
}

//----------------------------------------------------------------------------------------------- END MODAL EDIT

//----------------------------------------------------------------------------------------------- START MODAL DELETE


if (
    isset($_POST['form']) && $_POST['form'] == 'delDeposit'
    && isset($_POST['delete']) && $_POST['delete'] == 'deposit'
    && isset($_POST['valueDel']) && $_POST['valueDel'] == '9'
    && isset($_POST['idDel']) && $_POST['idDel'] != ''
) {

    $delDepositSQL = "UPDATE deposit SET ";
    $delDepositSQL .= "dep_status      = '" . $_POST['valueDel'] . "' ";
    $delDepositSQL .= ",dep_upby       = '" . $_SESSION['username'] . "' ";
    $delDepositSQL .= ",dep_updt       = '" . date("Y-m-d H:i:s") . "' ";

    $delDepositSQL .= "WHERE dep_id = '" . $_POST['idDel'] . "' ";
    mysqli_query($conn, $delDepositSQL);
    header("location: " . $_SESSION['uri'] . "/" . $path . "/pages/main?path=deposit&alert=delete-success");
    exit(0);

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
}
//----------------------------------------------------------------------------------------------- END MODAL DELETE




//  FUNCTION GET FULLNAME BY USERNAME 
function getNameUser($conn, $username)
{
    $getUserSQL = "SELECT * FROM user WHERE usr_username = '" . $username . "'";
    $getUserARR = mysqli_query($conn, $getUserSQL);
    $getUserNUM = mysqli_num_rows($getUserARR);
    if ($getUserNUM == 1) {
        foreach ($getUserARR as $getUser) {
            return $getUser['usr_fname'] . ' ' . $getUser['usr_lname'];
        }
    }
}


?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ฝาก-ถอนเงินฝาก</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main?path=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">ฝากเงิน</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b> บันทึกการรับฝากเงินนักเรียนชั้ันประศึกษาปีที่ 1 </b></h3>
                <div class='text-right'>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-adddata">
                        <i class='fas fa-coins'></i> Add
                    </button>
                </div>
                <div class="card-body">
                    <table id="usertable" class="table table-bordered table-striped">

                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>รหัสประจำตัวนักเรียน</th>
                                <th>ชื่อ - นามสกุล</th>
                                <th>รายการ</th>
                                <th>ฝาก / ถอน</th>
                                <th>ชื่อครูผู้เพิ่มข้อมูล</th>
                                <th>วันที่</th>
                                <th>ชื่อครูผู้แก้ไขข้อมูล</th>
                                <th>วันที่</th>
                                <th>หมายเหตุ</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>



                            <?PHP
                            $getDepositSQL = "SELECT * FROM deposit d
                            LEFT JOIN list_students ls ON ls.ls_student_id = d.dep_student_id
                            WHERE ls_class = '" . $class . "'
                            AND dep_status != '9'";
                            $getDepositARR = mysqli_query($conn, $getDepositSQL);
                            $getDepositNUM = mysqli_num_rows($getDepositARR);


                            if ($getDepositNUM > 0) {
                                $id = 1;
                                foreach ($getDepositARR as $getDeposit) {
                                    $fullname = $getDeposit['ls_prefix'] . '' . $getDeposit['ls_fname'] . ' ' . $getDeposit['ls_lname']
                            ?>
                                    <tr class="text-center">
                                        <td><?= $id; ?></td>
                                        <td><?= $getDeposit['ls_student_id']; ?></td>
                                        <td><?= $fullname; ?></td>
                                        <td>
                                            <?PHP
                                            if ($getDeposit['dep_type'] == 'ฝาก') {
                                                echo "<span class='text-success'>ฝาก</span>";
                                            } else {
                                                echo "<span class='text-red'>ถอน</span>";
                                            }
                                            ?>
                                        </td>

                                        <td>

                                            <?PHP
                                            if ($getDeposit['dep_amount_in'] != 0) {
                                            ?>
                                                <span class="text-success">+<?= $getDeposit['dep_amount_in']; ?>.-</span>
                                            <?PHP
                                            } else {
                                            ?>
                                                <span class="text-danger ml-5">-<?= $getDeposit['dep_amount_out']; ?>.-</span>
                                            <?PHP
                                            }
                                            ?>

                                        </td>




                                        <td><?= getNameUser($conn, $getDeposit['dep_insby']); ?></td>
                                        <td><?= KTgetData::convertTHDate($getDeposit['dep_insdt'], 'DMY'); ?></td>
                                        <td><?= $getDeposit['dep_upby'] != null ? getNameUser($conn, $getDeposit['dep_upby']) : '-'; ?>
                                        </td>
                                        <td><?= $getDeposit['dep_updt'] != null ? KTgetData::convertTHDate($getDeposit['dep_updt'], 'DMY') : '-'; ?>
                                        </td>
                                        <td><?= $getDeposit['dep_note'] != '' ? $getDeposit['dep_note'] : '-'; ?></td>



                                        <td class="project-actions text-center">
                                            <button type="button" class="btn btn-warning btn-sm edit" data-info="<?= $getDeposit['dep_id']; ?>|x|<?= $getDeposit['ls_student_id'];
                                                                                                                                                    ?>|x|<?= $getDeposit['dep_type']; ?>|x|<?= $getDeposit['dep_amount'];
                                                                                                                                                                                            ?>|x|<?= $getDeposit['dep_note']; ?>" data-toggle="modal" data-target="#modal-editdata">
                                                <i class='fas fa-edit'></i>
                                            </button>
                                            <script>
                                                $(document).ready(function() {
                                                    $('.edit').click(function() {
                                                        var getInfo = $(this).attr('data-info')
                                                        var splitARR = getInfo.split('|x|')
                                                        $("#editID").val(splitARR[0])
                                                        $("#editStudentID").val(splitARR[1])
                                                        $("#editType").val(splitARR[2])
                                                        $("#editAmount").val(splitARR[3])
                                                        $("#editNote").val(splitARR[4])
                                                    })
                                                })
                                            </script>

                                            <div class="btn-group">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="form" value="delDeposit">
                                                    <input type="hidden" name="delete" value="deposit">
                                                    <input type="hidden" name="idDel" value="<?= $getDeposit['dep_id']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm confirm" txtAlert='คุณต้องการลบข้อมูลนี้จริงหรือไม่ ?' name="valueDel" value="9">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                            <?PHP
                                    $id++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
</section>


<!-- //-------------------------------------------------------------------- ฝากเงิน -->
<div class="modal fade" id="modal-adddata">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ฝากเงิน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <input type="hidden" name='form' value="insertDeposit" />
                <input type="hidden" name='insert' value="deposit" />
                <input type="hidden" name='username' value="<?= $_SESSION['username']; ?>" />
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="studentID">ชื่อนักเรียน</label>
                                <select class="form-control select2bs4" id='fullname' name="fullname">
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
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="type">รายการ</label>
                                <select class="form-control" id='type' name="type">
                                    <option value=''>กรุณาเลือกประเภท</option>
                                    <option value='ฝาก'>ฝาก</option>
                                    <option value='ถอน'>ถอน</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="amount">amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="note">หมายเหตุ</label>
                                <input type="text" class="form-control" id="note" name="note" placeholder="Enter note">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- //-------------------------------------------------------------------- ฝากเงิน -->

<!-- //-------------------------------------------------------------------- แก้ไขการฝากเงิน -->
<div class="modal fade" id="modal-editdata">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขการฝากเงิน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <input type="hidden" name='form' value="editDeposit" />
                <input type="hidden" name='edit' value="deposit" />
                <input type="hidden" id='editID' name='editID' />
                <input type="hidden" name='username' value="<?= $_SESSION['username']; ?>" />
                <input type="hidden" name='date' value="<?= $dataNow; ?>" />
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editStudentID">ชื่อนักเรียน</label>
                                <select class="form-control select2bs4" id='editStudentID' name="editStudentID">
                                    <option>กรุณาเลือกนักเรียน</option>
                                    <option value='4017'>นายเอ</option>
                                    <option value='4018'>นายเอ้</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editType">ประเภท</label>
                                <select class="form-control" id='editType' name="editType">
                                    <option value=''>กรุณาเลือกประเภท</option>
                                    <option value='ฝาก'>ฝาก</option>
                                    <option value='ถอน'>ถอน</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editAmount">amount</label>
                                <input type="number" class="form-control" id="editAmount" name="editAmount" placeholder="Enter amount">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editNote">หมายเหตุ</label>
                                <input type="text" class="form-control" id="editNote" name="editNote" placeholder="Enter note">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- //-------------------------------------------------------------------- แก้ไขการฝากเงิน -->

<script>
    $(function() {
        $("#usertable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#usertable_wrapper .col-md-6:eq(0)');
    });
</script>