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


                        //         <?PHP
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