<!-- C<?PHP
ob_start();
session_start();

?>
ontent Header (Page header) -->


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Report</h1>
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

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="../dist/img/user4-128x128.jpg"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">Teacher</h3>

                        <p class="text-muted text-center">Software Engineer</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>ครูประจำชั้นประถมศึกษาชั้นที่ </b> <a class="float-right">1</a>
                            </li>
                            <li class="list-group-item">
                                <b>ห้องเรียนที่ 1 จำนวนนักเรียน...</b> <a class="float-right">43</a>
                            </li>
                        </ul>

                        <div class='col-'>
                            <div class='text-right'>
                                <butto class="btn btn-warning" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </butto>

                            </div>


                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum
                            enim neque.</p>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->


            <div class="col-md-9">



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
                            <input type="text" class="form-control datetimepicker-input"
                                data-target="#reservationdate" />
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
                            <button class="btn btn-success" href="#">
                                <i class="fas fa-plus">
                                </i>
                                Add
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <tfoot>
                                <thead>
                                    <tr>
                                        <th>รหัสประจำตัวนักเรียน</th>
                                        <th>ชื่อ - นามสกุล</th>
                                        <th>วันที่</th>
                                        <th>จำนวนเงินฝากวันนี้</th>
                                        <th>ยอดรวมเงินฝาก</th>
                                        <th>แก้ไขข้อมูล</th>
                                    <tr>
                                        <td>01</td>
                                        <td>นายพัชรพงษ์ ทิมมณี</td>
                                        <td>14/12/2565</td>
                                        <td>40</td>
                                        <td>640</td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-warning btn-sm" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="#">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>02</td>
                                        <td>นายพัชรพงษ์ ทิมมณี</td>
                                        <td>15/12/2565</td>
                                        <td>80</td>
                                        <td>880</td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-warning btn-sm" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="#">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                </thead>        
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
    </div>
</section>


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