<?PHP

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
<section class="content">
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
                <h3 class="card-title"><b> บันทึกการรับฝากเงินนักเรียนชั้ันประศึกษาปีที่ 1 </b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">


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

                        $getUserSQL = "SELECT * FROM user";
                        $getUserARR = mysqli_query($conn, $getUserSQL);
                        $getUserNUM = mysqli_num_rows($getUserARR);

                        if ($getUserNUM > 0) {
                            $id = 1;
                            foreach ($getUserARR as $getUser) {
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
                            }
                        }
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

<!-- //-------------------------------------------------------------------- ฝากเงิน -->
<script>
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
    });
</script>