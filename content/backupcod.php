<!-- ปุ่มลบ sweetalert2 -->
<!-- <button type="button" class="btn btn-danger btn-sm testAlert" dataID="<?= $getUser['usr_id']; ?>" name="del" value="9">
                                            <i class="fas fa-trash"> </i>
                                        </button>
                                        <script>
                                            $(document).ready(function() {
                                                $(".testAlert").click(function() {
                                                    var getId = $(this).attr('dataID')
                                                    // alert(getName)
                                                    Swal.fire({
                                                        title: 'test',
                                                        text: "You won't be able to revert this! ID : " + getId,
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Yes, delete it!'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            Swal.fire(
                                                                'Deleted!',
                                                                'Your file has been deleted.',
                                                                'success'
                                                            )
                                                        }
                                                    })
                                                });
                                            });
                                        </script> -->
<!-- ปุ่มลบ
                                        <td class="project-actions text-center">
                                <form action="" method="POST">
                                    <input type="hidden" name="type" value="del">
                                    <input type="hidden" name="id_del" value=<?= $getUser['usr_id']; ?>>
                                    <button type="submit" class="btn btn-danger btn-sm confirm"
                                        txtAlert="คุณต้องการลบใช่หรือไม่" name="del" value="9">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>

                                    <button type="button" class="btn btn-warning btn-sm view"
                                        info-Detail=" <?= $dataTodolist['td_id']; ?>|x|<?= $dataTodolist['td_case']; ?>|x|<?= $dataTodolist['td_dept']; ?>"
                                        data-toggle="modal" data-target="#editDataList">
                                        <i class="fas fa-edit"></i>
                                    </button>
 -->




<!-- ค้นหาวันที่ ค้นหา -->
<!-- Main content
<section class="content">
    <div class="container-fluid"> -->

<!-- <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    <div class='row pb-4'>


                        <div class='col-4'>
                            <div class="input-group date" id="searchdate" data-target-input="nearest">
                                <input type="text" name="one" class="form-control datetimepicker-input"
                                    data-target="#searchdate" />
                                <div class="input-group-append" data-target="#searchdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class='col-4'>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="two" class="form-control datetimepicker-input"
                                    data-target="#reservationdate" />
                                <div class="input-group-append" data-target="#reservationdate"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class='col-4'>
                            <button type="submit" class='btn btn-info btn-block'>ค้นหา</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> -->



<!-- // echo "<pre>";
                                // print_r($getUser);
                                // echo "</pre>"; -->

<!-- ปุ่มลบ
<form action="" method="POST">
    <input type="hidden" name="type" value="approve">
    <input type="hidden" name="id" value="<?= $dataStudent["empBadgenumber"]; ?>">
    <button type="submit" class="btn btn-<?= $statusColor; ?> btn-sm confirm"
        txtAlert="คุณต้องการยืนยันการ<?= $choose; ?>ใช้งานบุคคลนี้ใช่ไหม" name="value" value="<?= $valApprove; ?>"><i
            class="<?= $statusIcons; ?>"></i></button>
</form>
<!-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editData"><i class="fas fa-edit"></i></button> -->
<!-- </div>
<div class="btn-group">
    <form action="" method="POST">
        <input type="hidden" name="type" value="delete">
        <input type="hidden" name="id" value="<?= $dataStudent["empBadgenumber"]; ?>">
        <button type="submit" class="btn btn-danger btn-sm confirm" txtAlert="คุณต้องการลบบุคคลนี้ใช่ไหม" name="value"
            value="9">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form> --> -->



<!-- 
    <?PHP


?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ฝากเงิน</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main?path=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">ฝากเงิน</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<!-- <section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b> บันทึกการรับฝากเงินนักเรียนชั้ันประศึกษาปีที่ 1 </b></h3>
                <div class='text-right'>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-user-plus"></i>
                        Add
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="usertable" class="table table-bordered table-striped">

                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>รหัสประจำตัวนักเรียน</th>
                            <th>ชื่อ - นามสกุล</th>
                            <th>วันที่</th>
                            <th>จำนวนเงินฝากวันนี้</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                         <?PHP

//                         $getUserSQL = "SELECT * FROM user";
//                         $getUserARR = mysqli_query($conn, $getUserSQL);
//                         $getUserNUM = mysqli_num_rows($getUserARR);

//                         if ($getUserNUM > 0) {
//                             $id = 1;
//                             foreach ($getUserARR as $getUser) {
//                         ?> -->
<!-- //                         <tr>
//                             <td><?= $id; ?></td>
//                             <td><?= $getUser['usr_cid']; ?></td>
//                             <td><?= $getUser['usr_fname']; ?> <?= $getUser['usr_lname']; ?></td>
//                             <td>15/12/2565</td>
//                             <td>80</td>
//                             <td>ฝาก</td>

//                             <td class="project-actions text-center">
//                                 <button type="button" class="btn btn-warning btn-sm view" data-toggle="modal"
//                                     data-target="#editDataList">
//                                     <i class='fas fa-edit' style='font-size:15px'></i>
//                                 </button>
//                             </td>
//                             </form>
//                             </td>
//                         </tr>
//                         <?PHP 
                                $id++;
                      
//                         ?>
//                     </tbody>
//                 </table>
//             </div>
//         </div>
// </section>


 <div class="modal fade" id="editDataList">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มข้อมูลการแก้ปัญหา</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="status" value="edit">
                    <input type="hidden" name="type" value="editworklist">
                    <input type="hidden" id="id_edit" name="id_edit"> -->




<!-- <div class="form-group">
                        <label for="dept_edit">ที่ไหนแจ้งมา</label>
                        <input type="text" class="form-control" id="dept_edit" disabled>
                    </div>
                    <div class="form-group">
                        <label for="case_edit">อาการที่แจ้งมา</label>
                        <input type="text" class="form-control" id="case_edit" disabled>
                    </div>
                    <div class="form-group">
                        <label for="repair">วิธีแก้ปัญหา</label>
                        <input type="text" class="form-control" id="repair" name="repair" placeholder="วิธีแก้ปัญหา">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-success confirm"
                        txtAlert='กรุณาตรวจสอบความถูกต้องก่อนกดยืนยัน ?'>บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<?PHP // =============================================================================================================================  END EDIT 
?>


<!-- //-------------------------------------------------------------------- ฝากเงิน -->
<!-- <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label for="student">ชื่อนักเรียน</label>
                                <select class="form-control select2bs4" id='student' name="student">
                                    <option>กรุณาเลือกนักเรียน</option>
                                    <option value='1'>นายเอ</option>
                                    <option value='2'>นายเอ้</option>
                                    <option value='3'>นายเอก</option>
                                    <option value='4'>นายเอส</option>
                                    <option value='5'>นายเอว</option>
                                    <option value='6'>นายเอง</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label for="type">ประเภท</label>
                                <select class="form-control" id='type' name="type">
                                    <option>กรุณาเลือกประเภท</option>
                                    <option value='1'>ฝาก</option>
                                    <option value='2'>ถอน</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label for="amount">amount</label>
                                <input type="number" class="form-control" id="amount" name="amount"
                                    placeholder="Enter amount">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- //-------------------------------------------------------------------- ฝากเงิน -->


<!-- <script>
$(function() {
    $("#usertable").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
</script> --> -->

-->


-->







<!-- SELECT * FROM deposit 
WHERE dep_status != '9'


SELECT * FROM deposit 
WHERE dep_status != '9'
AND dep_student_id = '101'
AND dep_insdt BETWEEN '2022-12-27' AND '2023-01-06'


INSERT INTO deposit (dep_note, dep_amount, dep_insby, dep_insdt, dep_status, dep_student_id)
VALUES ('ฝาก','6000','ict1','2023-01-05 10:00:00','1','101')


INSERT INTO deposit (dep_note, dep_amount, dep_insby, dep_insdt, dep_status, dep_student_id)
VALUES ('ฝาก','200','ict1','2023-01-05 10:17:00','1','100')


UPDATE deposit
SET dep_amount = '800',
		dep_upby = 'ict1',
		dep_updt = '2023-01-05 10:00:00'
WHERE dep_id = '3'

 -->
<!-- 
 <form action="" method="POST">
                                    <input type="hidden" name="form" value="delUser">
                                    <input type="hidden" name="delete" value="user">
                                    <input type="hidden" name="idDel" value="<?= $getUser['usr_id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm confirm"
                                        txtAlert='คุณต้องการลบข้อมูลนี้จริงหรือไม่ ?' name="valueDel" value="9">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                                <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>รหัสประจำตัว</th>
                            <th>ชื่อ - นามสกุล</th>
                            <th>Calss</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        // $getlist_studentSQL = "SELECT * FROM list_student WHERE ls_status != '9'";
                        // $getlist_studentARR = mysqli_query($conn, $getlist_studentSQL);
                        // $getlist_studentNUM = mysqli_num_rows($getlist_studentARR);
                       
                        // if ($getlist_studentNUM > 0) {
                        //     $id = 1;
                        //     foreach ($getlist_studentARR as $getlist_student) {
                        // ?>
                        //         <tr class="text-center"> -->


//
<?PHP
                        // $getlist_studentSQL = "SELECT * FROM list_student WHERE ls_status != '9'";
                        // $getlist_studentARR = mysqli_query($conn, $getlist_studentSQL);
                        // $getlist_studentNUM = mysqli_num_rows($getlist_studentARR);

                        // if ($getlist_studentNUM > 0) {
                        //     $id = 1;
                        //     foreach ($getlist_studentARR as $getlist_student) {
                        // ?>
<!-- //         <tr class="text-center">

                        //             <td><?= $id; ?></td>
                        //             <td><?= $getlist_student['ls_student_id']; ?></td>
                        //             <td><?= $getlist_student['ls_fname']; ?> <?= $getlist_student['ls_lname']; ?></td>
                        //             <td>ชั้นประถมศึกษาปีที่ <?= $getlist_student['ls_class']; ?></td> -->


<!-- <h3> <?= $studen;?></h3> -->

<!-- <?PHP

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main?path=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Report</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<!-- <section class="content">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class='col-6 mb-3'>
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
            <div class='col-6 mb-3'>
                <select class="form-control select2bs4" id='student' name="student">
                    <option>กรุณาเลือกนักเรียน</option>
                    <option value='1'>นายเอ</option>
                    <option value='2'>นายเอ้</option>
                    <option value='3'>นายเอก</option>
                    <option value='4'>นายเอส</option>
                    <option value='5'>นายเอว</option>
                    <option value='6'>นายเอง</option>
                </select>
            </div>


            <div class='col-6 mb-3'>
                <div class="input-group date" id="searchdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#searchdate" />
                    <div class="input-group-append" data-target="#searchdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class='col-6 mb-3'>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-12">

                <button class='btn btn-info btn-block mb-3 '>ค้นหา</button>
            </div>
        </div>



        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b> บันทึกการรับฝากเงินนักเรียนชั้ันประศึกษาปีที่ 1 </b></h3> -->
</div>
<!-- /.card-header -->
<!-- <div class="card-body">


                <table id="usertable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>รายการ</th>
                            <th>ฝาก / ถอน</th>
                            <th>ยอดคงเหลือ (บาท)</th>
                            <th>รายละเอียด</th>
                        </tr>
                    </thead>



                    <tbody>

                        <?PHP

                        // $getUserSQL = "SELECT * FROM user";
                        // $getUserARR = mysqli_query($conn, $getUserSQL);
                        // $getUserNUM = mysqli_num_rows($getUserARR);

                        // if ($getUserNUM > 0) {
                        //     $id = 1;
                        //     foreach ($getUserARR as $getUser) {
                        ?>
                                <tr>
                                    <td>1 / 12 / 65</td>
                                    <td>ฝาก</td>
                                    <td>100.-</td>
                                    <td>100.-</td>
                                    <td>-</td>
                                </tr>
                        <?PHP
                                $id++;
                    
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align: right;">จำนวนเงินสะสม</td>
                            <td>50 บาท</td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</section>
<!-- 


<div class="modal fade" id="editDataList">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มข้อมูลการแก้ปัญหา</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="status" value="edit">
                    <input type="hidden" name="type" value="editworklist">
                    <input type="hidden" id="id_edit" name="id_edit">

                    <div class="form-group">
                        <label for="dept_edit">ที่ไหนแจ้งมา</label>
                        <input type="text" class="form-control" id="dept_edit" disabled>
                    </div>
                    <div class="form-group">
                        <label for="case_edit">อาการที่แจ้งมา</label>
                        <input type="text" class="form-control" id="case_edit" disabled>
                    </div>
                    <div class="form-group">
                        <label for="repair">วิธีแก้ปัญหา</label>
                        <input type="text" class="form-control" id="repair" name="repair" placeholder="วิธีแก้ปัญหา">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-success confirm" txtAlert='กรุณาตรวจสอบความถูกต้องก่อนกดยืนยัน ?'>บันทึก</button>
                </div>
            </form> -->
</div>
</div>
</div> -->
<?PHP // =============================================================================================================================  END EDIT 
?>


<!-- //-------------------------------------------------------------------- ฝากเงิน -->
<!-- <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label for="student">ชื่อนักเรียน</label>
                                <select class="form-control select2bs4" id='student' name="student">
                                    <option>กรุณาเลือกนักเรียน</option>
                                    <option value='1'>นายเอ</option>
                                    <option value='2'>นายเอ้</option>
                                    <option value='3'>นายเอก</option>
                                    <option value='4'>นายเอส</option>
                                    <option value='5'>นายเอว</option>
                                    <option value='6'>นายเอง</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label for="type">ประเภท</label>
                                <select class="form-control" id='type' name="type">
                                    <option>กรุณาเลือกประเภท</option>
                                    <option value='1'>ฝาก</option>
                                    <option value='2'>ถอน</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label for="amount">amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div> -->
</form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- //-------------------------------------------------------------------- ฝากเงิน -->
<!-- <script>
    $(function() {
        $("#usertable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#usertable_wrapper .col-md-6:eq(0)');


        //searchdate picker
        $('#searchdate').datetimepicker({
            format: 'L'
        });

        //reservationdate picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    }); -->
<!-- </script> --> -->



<?PHP } else if ($selectClass == 1) { ?>
<?PHP

                ?>
<!-- // echo 'class : ' . $class;
                // echo '<br/>';
                // echo 'selectClass : ' . $selectClass; -->
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
    <h5 class="text-bold">รายการตั้งแต่วันที่ <?= KTgetData::convertTHDate($fdate, "DMY"); ?> -
        <?= KTgetData::convertTHDate($ldate, "DMY"); ?></h5>
</center>

<br>
<br>
<br>
<table id="reporttable" class="table table-bordered table-striped">
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




</script>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class=" sticky-top mb-3">
                <div id="external-events"> </div>
            </div>
        </div>
    </div>
</section>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-body p-0">
            <div id="calendar"></div>
        </div>
    </div>
</div>
</div>

</div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/fullcalendar/main.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function() {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
        ele.each(function() {

            // create an Event Object (https://fullcalendar.io/docs/event-object)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            }

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject)

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            })

        })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
            return {
                title: eventEl.innerText,
                backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                    'background-color'),
                borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                    'background-color'),
                textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
            };
        }
    });

    var calendar = new Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        //Random default events
        events: [{
                title: 'All Day Event',
                start: new Date(y, m, 1),
                backgroundColor: '#f56954', //red
                borderColor: '#f56954', //red
                allDay: true
            },
            {
                title: 'Long Event',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2),
                backgroundColor: '#f39c12', //yellow
                borderColor: '#f39c12' //yellow
            },
            {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false,
                backgroundColor: '#0073b7', //Blue
                borderColor: '#0073b7' //Blue
            },
            {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false,
                backgroundColor: '#00c0ef', //Info (aqua)
                borderColor: '#00c0ef' //Info (aqua)
            },
            {
                title: 'Birthday Party',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false,
                backgroundColor: '#00a65a', //Success (green)
                borderColor: '#00a65a' //Success (green)
            },
            {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'https://www.google.com/',
                backgroundColor: '#3c8dbc', //Primary (light-blue)
                borderColor: '#3c8dbc' //Primary (light-blue)
            }
        ],
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
        }
    });


    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function(e) {
        e.preventDefault()
        // Save color
        currColor = $(this).css('color')
        // Add color effect to button
        $('#add-new-event').css({
            'background-color': currColor,
            'border-color': currColor
        })
    })
    $('#add-new-event').click(function(e) {
        e.preventDefault()
        // Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
            return
        }

        // Create events
        var event = $('<div />')
        event.css({
            'background-color': currColor,
            'border-color': currColor,
            'color': '#fff'
        }).addClass('external-event')
        event.text(val)
        $('#external-events').prepend(event)

        // Add draggable funtionality
        ini_events(event)

        // Remove event from text input
        $('#new-event').val('')
    })
})
</script>
</body>

</html>