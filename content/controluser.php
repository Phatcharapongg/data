<?PHP
//...โค้ดสำหรับเช็คการล้อคอิน ว่าล็อคอินแล้วหรือยัง.....
if (empty($_SESSION['username'])) {
    header("location:" . $_SESSION['uri'] . "/" . $path);
    exit(0);
}


?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Control User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main?path=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Control User</li>
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
                <h3 class="card-title"><b> บันทึกการรับฝากเงินนักเรียนชั้ันประศึกษาปีที่ 1 </b></h3>
                <div class='text-right'>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-user-plus"></i>
                        Add
                    </button>
                    <button type="button" class="btn btn-success testAlert3">
                        <i class="fas fa-user-plus"></i>
                        TEST
                    </button>
                    <script>
                        $(document).ready(function() {
                            $(".testAlert3").click(function() {
                                Swal.fire('TEST')
                            })
                        })
                    </script>

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

                        $getUserSQL = "SELECT * FROM user";
                        $getUserARR = mysqli_query($conn, $getUserSQL);
                        $getUserNUM = mysqli_num_rows($getUserARR);

                        if ($getUserNUM > 0) {
                            $id = 1;
                            foreach ($getUserARR as $getUser) {
                        ?>
                                <tr>
                                    <td><?= $id; ?></td>
                                    <td><?= $getUser['usr_cid']; ?></td>
                                    <td><?= $getUser['usr_fname']; ?> <?= $getUser['usr_lname']; ?></td>
                                    <td>15/12/2565</td>
                                    <td>80</td>
                                    <td>ฝาก</td>
                                    <td class="project-actions text-center">
                                        <button type="button" class="btn btn-success btn-sm view" data-toggle="modal" data-target="#setuser">
                                            <i class='fas fa-user-check'></i>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm view" data-toggle="modal" data-target="#editDataList">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <button type="button" class="btn btn-danger btn-sm testAlert" dataID="<?= $getUser['usr_id']; ?>" name="del" value="9">
                                            <i class="fas fa-trash"> </i>
                                        </button>
                                        <script>
                                            $(document).ready(function() {
                                                $(".testAlert").click(function() {
                                                    var getId = $(this).attr('dataID')
                                                    // alert(getName)
                                                    Swal.fire({
                                                        title: getName,
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
                                        </script>

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
            </form>
        </div>
    </div>
</div>
<?PHP // =============================================================================================================================  END EDIT 
?>


<!-- //-------------------------------------------------------------------- ฝากเงิน -->
<div class="modal fade" id="modal-default">
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
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<script>
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
</script>