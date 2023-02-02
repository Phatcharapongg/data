<?PHP

//...โค้ดสำหรับเช็คการล้อคอิน ว่าล็อคอินแล้วหรือยัง.....
ob_start();
session_start();
require('../config/config.php');
// echo $_SESSION['username'];

// query ARR
$getUserSQL = "SELECT * FROM user WHERE usr_username = '" . $_SESSION['username'] . "' AND usr_status != '9' ";
$getUserARR = mysqli_query($conn, $getUserSQL);
$getUserNUM = mysqli_num_rows($getUserARR);

if ($getUserNUM == 1) {
    foreach ($getUserARR as $getUser) {

        $fullname         = $getUser['usr_fname'] . " " . $getUser['usr_lname'];
        $classTeacher     = $getUser['usr_class'];
        $status           = $getUser['usr_status'];
        $usr_username     = $getUser['usr_username'];
    }
} else {
    session_destroy();
    header("location: " . $_SESSION['uri'] . "/" . $path . '/login.php');
    exit(0);
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    <!-- pace-progress -->
    <!-- <link rel="stylesheet" href="../plugins/pace-progress/themes/อยากได้สีอะไร ใส่ตรงนี้/pace-theme-flat-top.css"> -->
    <link rel="stylesheet" href="../plugins/pace-progress/themes/red/pace-theme-flat-top.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>

</head>

<!-- แถบส่วนหัว -->

<body style="font-family: 'Kanit', sans-serif;">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main.php?path=dashboard" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main.php?path=dashboard" class="brand-link">
                <img src="../dist/img/8.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Student Deposit</span>
            </a>
            <!-- Student Deposit -->
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../dist/img/default.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main.php?path=dashboard" class="d-block"><?= strtoupper($fullname); ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <!-- เช๊คว่ามีค่าหรือเปล่ากดแถบเลือกให้เป็นสี active -->
                        <?PHP
                        if (isset($_GET['path']) && $_GET['path'] == 'controlUser.php') {
                            $controlUser = 'active';
                        } else if (isset($_GET['path']) && $_GET['path'] == 'report.php') {
                            $report = 'active';
                        } else if (isset($_GET['path']) && $_GET['path'] == 'deposit.php') {
                            $deposit = 'active';
                        } else if (isset($_GET['path']) && $_GET['path'] == 'addstudent.php') {
                            $addstudent = 'active';
                        } else {
                            $controlUser = '';
                            $report = '';
                            $deposit = '';
                            $addstudent = '';
                        }
                        ?>
                        <!-- หน้าต่างๆในแถบเมนู -->
                        <?PHP if ($usr_username == 'ict1') { ?>
                            <li class="nav-item">
                                <a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main.php?path=controlUser" class="nav-link <?= $controlUser; ?>">
                                    <i class="nav-icon fas fa-user-cog"></i>
                                    <p>
                                        ควบคุมผู้ใช้งาน
                                    </p>
                                </a>
                            </li>
                        <?PHP } ?>
                        <li class="nav-item">
                            <a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main.php?path=deposit" class="nav-link <?= $deposit; ?>">
                                <i class="nav-icon fas fa-coins"></i>
                                <p>
                                    ฝาก-ถอนเงิน
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main.php?path=report" class="nav-link <?= $report; ?>">
                                <i class="nav-icon fas fa-paste"></i>
                                <p>
                                    รายงานการฝาก-ถอนเงิน
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main.php?path=addstudent" class="nav-link <?= $addstudent; ?>">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    เพิ่ม,แก้ไขข้อมูลนักเรียน
                                </p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?PHP
            // echo $_GET['path'];

            // เช๊คหน้าเวลากดเลือกหน้านั้นๆ หากไม่มีค่าในระบบหรือระบบไม่เข้าใจจะเด้งไปหน้า dashboard //
            if (isset($_GET['path'])) {
                switch ($_GET['path']) {
                    case 'deposit':
                        $content = 'deposit.php';
                        break;
                    case 'contact':
                        $content = 'contact.php';
                        break;
                    case 'report':
                        $content = 'report.php';
                        break;
                    case 'controlUser':
                        $content = 'controluser.php';
                        break;
                    case 'addstudent':
                        $content = 'addstudent.php';
                        break;
                    default:
                        $content = 'dashboard.php';
                        break;
                }
            } else {
                $content = 'dashboard.php';
            }
            require_once('../content/' . $content);
            ?>
        </div>



        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2021-2021 <a href="#">Phatcharapong Timmanee</a>.</strong> All rights
            reserved.
        </footer>
    </div>

    <script src="sweetalert2.all.min.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/fullcalendar/main.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparklines/sparkline.js"></script>
    <!-- SweetAlert2 -->
    <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- JQVMap -->
    <!-- <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- Toastr -->
    <script src="../plugins/toastr/toastr.min.js"></script>
    <!-- Select2 -->
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <!-- pace-progress -->
    <script src="../plugins/pace-progress/pace.min.js"></script>

    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
            $('.select2').select2()
        });

        $('.confirm').click(function() {
            var getTxt = $(this).attr('txtAlert');
            var text = confirm(getTxt);

            if (text == true) {
                return true;
            } else {
                return false;
            }
        })
    </script>

</body>

</html>