<?PHP

//----------------------------------------------------------------------------------------------- START MODAL STUDENT
if (
    isset($_POST['formstudents']) && $_POST['formstudents'] == 'insertlist_students'
    && isset($_POST['insertstudents']) && $_POST['insertstudents'] == 'students'
    && isset($_POST['ls_student_id']) && $_POST['ls_student_id'] != ''
    && isset($_POST['ls_prefix']) && $_POST['ls_prefix'] != ''
    && isset($_POST['ls_fname']) && $_POST['ls_fname'] != ''
    && isset($_POST['ls_lname']) && $_POST['ls_lname'] != ''
    && isset($_POST['ls_class']) && $_POST['ls_class'] != ''


) {

    $Insertlist_studentsSQL = "INSERT INTO list_students (ls_student_id, ls_prefix, ls_fname, ls_lname, ls_class , ls_status)
    VALUES (
        '" . $_POST['ls_student_id'] . "',
        '" . $_POST['ls_prefix'] . "',
        '" . $_POST['ls_fname'] . "',
        '" . $_POST['ls_lname'] . "',
        '" . $_POST['ls_class'] . "',
        '1'
        )";

    // echo 'sql : ' . $editlist_studentsSQL;
    mysqli_query($conn, $Insertlist_studentsSQL);

    header("location: " . $_SESSION['uri'] . "/" . $path . "/pages/main?path=addstudent&alert=insertstudents-success");
    exit(0);
}
//    echo "<pre>";
// print_r($_POST);
// echo "</pre>";
//----------------------------------------------------------------------------------------------- END MODAL STUDENT


//----------------------------------------------------------------------------------------------- START MODAL EDIT
if (
    isset($_POST['form']) && $_POST['form'] == 'editstudents'
    && isset($_POST['edit']) && $_POST['edit'] == 'list_students'
    && isset($_POST['editID']) && $_POST['editID'] != ''
    && isset($_POST['editls_student_id']) && $_POST['editls_student_id'] != ''
    && isset($_POST['editls_prefix']) && $_POST['editls_prefix'] != ''
    && isset($_POST['editls_fname']) && $_POST['editls_fname'] != ''
    && isset($_POST['editls_lname']) && $_POST['editls_lname'] != ''
    && isset($_POST['editls_class']) && $_POST['editls_class'] != ''

) {

    $editlist_studentsSQL = "UPDATE list_students SET ";
    $editlist_studentsSQL .= "ls_student_id  = '" . $_POST['editls_student_id'] . "' ";
    $editlist_studentsSQL .= ",ls_prefix     = '" . $_POST['editls_prefix'] . "' ";
    $editlist_studentsSQL .= ",ls_fname      = '" . $_POST['editls_fname'] . "' ";
    $editlist_studentsSQL .= ",ls_lname      = '" . $_POST['editls_lname'] . "' ";
    $editlist_studentsSQL .= ",ls_class      = '" . $_POST['editls_class'] . "' ";


    $editlist_studentsSQL .= "WHERE ls_id    = '" . $_POST['editID'] . "' ";

    //   echo 'sql : ' . $editlist_studentsSQL;

    mysqli_query($conn, $editlist_studentsSQL);
    header("location: " . $_SESSION['uri'] . "/" . $path . "/pages/main?path=addstudent&alert=edit-success");



    exit(0);
}
// ----------------------------------------------------------------------------------------------- END MODAL EDIT


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";



//----------------------------------------------------------------------------------------------- START MODAL DELETE


if (
    isset($_POST['form']) && $_POST['form'] == 'list_students'
    && isset($_POST['delete']) && $_POST['delete'] == 'list_students'
    && isset($_POST['valueDel']) && $_POST['valueDel'] == '9'
    && isset($_POST['idDel']) && $_POST['idDel'] != ''
) {

    $dellist_studentsSQL = "DELETE FROM list_students WHERE ls_id = '" . $_POST['idDel'] . "'";
    mysqli_query($conn, $dellist_studentsSQL);
    header("location: " . $_SESSION['uri'] . "/" . $path . "/pages/main?path=addstudent&alert=delete-success");
    exit(0);
}

//----------------------------------------------------------------------------------------------- END MODAL DELETE

?>




<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="text-bold">Control Student</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main?path=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Control Student</li>
                </ol>
            </div>
        </div>
    </div>
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b> ข้อมูลรายชื่อนักเรียน </b></h3>
                <div class='text-right'>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-addstudents">
                        <i class="fas fa-user-plus"></i>
                        Add Student
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="list_students" class="table table-bordered table-striped">

                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>รหัสประจำตัว</th>
                            <th>ชื่อ - นามสกุล</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        // $getlist_studentsSQL = "SELECT * FROM list_students WHERE ls_status != '9'";
                        $getlist_studentsSQL = "SELECT * FROM list_students WHERE ls_class = '" . $classTeacher . "' AND ls_status != '9'";
                        $getlist_studentsARR = mysqli_query($conn, $getlist_studentsSQL);
                        $getlist_studentsNUM = mysqli_num_rows($getlist_studentsARR);

                        if ($getlist_studentsNUM > 0) {
                            $id = 1;
                            foreach ($getlist_studentsARR as $getlist_students) {
                        ?>
                                <tr class="text-center">

                                    <td><?= $id; ?></td>
                                    <td><?= $getlist_students['ls_student_id']; ?></td>
                                    <td><?= $getlist_students['ls_prefix']; ?><?= $getlist_students['ls_fname']; ?><?= $getlist_students['ls_lname']; ?>
                                    </td>
                                    <td>ชั้นประถมศึกษาปีที่ <?= $getlist_students['ls_class']; ?></td>





                                    <td class="project-actions text-center">
                                        <button type="button" class="btn btn-warning btn-sm edit" data-info="<?= $getlist_students['ls_id']; ?>|x|<?= $getlist_students['ls_student_id']; ?>|x|<?= $getlist_students['ls_prefix']; ?>|x|<?= $getlist_students['ls_fname']; ?>|x|<?= $getlist_students['ls_lname']; ?>|x|<?= $getlist_students['ls_class']; ?>" data-toggle="modal" data-target="#modal-editstudents">
                                            <i class='fas fa-edit'></i>
                                        </button>
                                        <script>
                                            $(document).ready(function() {
                                                $('.edit').click(function() {
                                                    var getInfo = $(this).attr('data-info')
                                                    var splitARR = getInfo.split('|x|')
                                                    // alert(splitARR)
                                                    $("#editID").val(splitARR[0])
                                                    $("#editls_student_id").val(splitARR[1])
                                                    $("#editls_prefix").val(splitARR[2])
                                                    $("#editls_fname").val(splitARR[3])
                                                    $("#editls_lname").val(splitARR[4])
                                                    $("#editls_class").val(splitARR[5])

                                                })
                                            })
                                        </script>

                                        <div class="btn-group">
                                            <form action="" method="POST">
                                                <input type="hidden" name="form" value="list_students">
                                                <input type="hidden" name="delete" value="list_students">
                                                <input type="hidden" name="idDel" value="<?= $getlist_students['ls_id']; ?>">
                                                <button type="submit" class="btn btn-danger btn-sm confirm" txtAlert='คุณต้องการลบข้อมูลนี้จริงหรือไม่ ?' name="valueDel" value="9">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

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

<!-- //-------------------------------------------------------------------- เพิ่ม student -->
<div class="modal fade" id="modal-addstudents">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <input type="hidden" name='formstudents' value="insertlist_students" />
                <input type="hidden" name='insertstudents' value="students" />
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="ls_student_id">รหัสประจำตัว</label>
                                <input type="text" class="form-control" id="ls_student_id" name="ls_student_id" placeholder=" ID">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="ls_prefix">คำนำหน้า</label>
                                <select class="form-control select2bs4" id='ls_prefix' name="ls_prefix">
                                    <option>กรุณาเลือกคำนำหน้า</option>
                                    <option value='ด.ช.'>ด.ช.</option>
                                    <option value='ด.ญ.'>ด.ญ.</option>
                                    <option value='นาย'>นาย</option>
                                    <option value='นางสาว.'>นางสาว</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="ls_fname">ชื่อ</label>
                                <input type="text" class="form-control" id="ls_fname" name="ls_fname" placeholder="Enter fname">
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="ls_lname">สกุล</label>
                                <input type="text" class="form-control" id="ls_lname" name="ls_lname" placeholder="Enter lname">
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="ls_class">ชั้นเรียนที่</label>
                                <select class="form-control select2bs4" id='ls_class' name="ls_class">
                                    <option>กรุณาเลือกชั้นเรียน</option>
                                    <option value='1/1'>ชั้นประถมศึกษาปีที่ 1/1</option>
                                    <option value='1/2'>ชั้นประถมศึกษาปีที่ 1/2</option>
                                    <option value='1/3'>ชั้นประถมศึกษาปีที่ 1/3</option>
                                    <option value='2/1'>ชั้นประถมศึกษาปีที่ 2/1</option>
                                    <option value='2/2'>ชั้นประถมศึกษาปีที่ 2/2</option>
                                    <option value='2/2'>ชั้นประถมศึกษาปีที่ 2/3</option>
                                    <option value='3/1'>ชั้นประถมศึกษาปีที่ 3/1</option>
                                    <option value='3/2'>ชั้นประถมศึกษาปีที่ 3/2</option>
                                    <option value='3/2'>ชั้นประถมศึกษาปีที่ 3/3</option>
                                </select>
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

<!-- //-------------------------------------------------------------------- เพิ่ม student -->

<!-- //-------------------------------------------------------------------- แก้ไข student -->
<div class="modal fade" id="modal-editstudents">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <input type="hidden" name='form' value="editstudents" />
                <input type="hidden" name='edit' value="list_students" />
                <input type="hidden" id='editID' name='editID' />
                <input type="hidden" name='username' value="<?= $_SESSION['username']; ?>" />
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editls_student_id">รหัสประจำตัว</label>
                                <input type="text" class="form-control" id="editls_student_id" name="editls_student_id" placeholder="Enter ID">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editls_prefix">คำนำหน้า</label>
                                <select class="form-control select2bs4" id='editls_prefix' name="editls_prefix">
                                    <option>กรุณาเลือกคำนำหน้า</option>
                                    <option value='ด.ช.'>ด.ช.</option>
                                    <option value='ด.ญ.'>ด.ญ.</option>
                                    <option value='นาย'>นาย</option>
                                    <option value='นางสาว.'>นางสาว</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editls_fname">fname</label>
                                <input type="text" class="form-control" id="editls_fname" name="editls_fname" placeholder="Enter fname">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editls_lname">lname</label>
                                <input type="text" class="form-control" id="editls_lname" name="editls_lname" placeholder="Enter lname">
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-12">
                            <div class="form-group">
                                <label for="editls_class">ชั้นเรียนที่</label>
                                <select class="form-control select2bs4" id='editls_class' name="editls_class">
                                    <option>กรุณาเลือกชั้นเรียน</option>
                                    <option value='1/1'>ชั้นประถมศึกษาปีที่ 1/1</option>
                                    <option value='1/2'>ชั้นประถมศึกษาปีที่ 1/2</option>
                                    <option value='1/3'>ชั้นประถมศึกษาปีที่ 1/3</option>
                                    <option value='2/1'>ชั้นประถมศึกษาปีที่ 2/1</option>
                                    <option value='2/2'>ชั้นประถมศึกษาปีที่ 2/2</option>
                                    <option value='2/2'>ชั้นประถมศึกษาปีที่ 2/3</option>
                                    <option value='3/1'>ชั้นประถมศึกษาปีที่ 3/1</option>
                                    <option value='3/2'>ชั้นประถมศึกษาปีที่ 3/2</option>
                                    <option value='3/3'>ชั้นประถมศึกษาปีที่ 3/3</option>
                                </select>
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


<!-- //-------------------------------------------------------------------- แก้ไข student -->



<script>
    $(function() {
        $("#usertable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["colvis"]
        }).buttons().container().appendTo('#usertable_wrapper .col-md-6:eq(0)');


        //searchdate picker
        $('#searchdate').datetimepicker({
            format: 'L'
        });

        //reservationdate picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    });
</script>