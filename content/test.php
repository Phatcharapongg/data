<?PHP

echo "<pre>";
print_r($_POST);
echo "</pre>";

?>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Test Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Report</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class='row pb-3'>
            <div class='col-4'>
                <div class="input-group date" id="searchdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#searchdate" />
                    <div class="input-group-append" data-target="#searchdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <button class='btn btn-info btn-block'>ค้นหา</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b> บันทึกการรับฝากเงินนักเรียนชั้ันประศึกษาปีที่ 1 </b></h3>
                <div class='text-right'>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-plus"></i>
                        Add
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

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

                                // echo "<pre>";
                                // print_r($getUser);
                                // echo "</pre>";

                        ?>
                                <tr>
                                    <td><?= $id; ?></td>
                                    <td><?= $getUser['usr_cid']; ?></td>
                                    <td><?= $getUser['usr_fname']; ?> <?= $getUser['usr_lname']; ?></td>
                                    <td>15/12/2565</td>
                                    <td>80</td>
                                    <td>ฝาก</td>
                                    <td class="project-actions text-center">
                                        <form action="" method="POST">
                                            <input type="hidden" name="type" value="del">
                                            <input type="hidden" name="id_del" value=<?= $getUser['usr_id']; ?>>
                                            <button type="submit" class="btn btn-danger btn-sm confirm" txtAlert="คุณต้องการลบใช่หรือไม่" name="del" value="9">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>
                                        </form>
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
    </div>
    </div>
    </div>
</section>






<!-- //-------------------------------------------------------------------- ปุ่มลบ-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="deleteModalLabel"><b>ยืนยันการลบข้อมูล</b></h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                คุณต้องการลบกลุ่มผู้ใช้นี้หรือไม่</div>
            <div class="modal-footer">
                <form class="form-horizontal" role="form" method="post" action="Delete.php?groupID=$row[0]" enctype="multipart/form-data">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>










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

<!-- //-------------------------------------------------------------------- ฝากเงิน -->


<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

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