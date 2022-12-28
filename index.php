<?PHP
ob_start();
session_start();

//Connect DB
require('config/config.php');

//...โค้ดสำหรับเช็คการล้อคอิน ว่าล็อคอินแล้วหรือยัง.....
if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
    header("location:" . $_SESSION['uri'] . "/" . $path . "/pages/main.php");
    exit(0);
}

็เช๊คuser&password ในตารางdatadatabase
if (
    isset($_POST["user"]) && $_POST["user"] != ''
    && isset($_POST["password"]) && $_POST["password"] != ''
) {

    $username = trim($_POST["user"]);
    $password = trim($_POST["password"]);

    $getUserSQL = "SELECT * FROM user WHERE usr_username = '" .  $username . "'";
    $getUserARR = mysqli_query($conn, $getUserSQL);
    $getUserNUM = mysqli_num_rows($getUserARR);

    if ($getUserNUM == 1) {

        $getPasswordSQL = "SELECT * FROM user WHERE usr_username = '" .  $username . "' AND usr_password = '" .  $password . "'";
        $getPasswordARR = mysqli_query($conn, $getPasswordSQL);
        $getPasswordNUM = mysqli_num_rows($getPasswordARR);

        if ($getPasswordNUM == 1) {
            $getStatusSQL = "SELECT * FROM user WHERE usr_username = '" .  $username . "' AND usr_password = '" . $password . "'  AND usr_status = '1'";
            $getStatusARR = mysqli_query($conn, $getStatusSQL);
            $getStatusNUM = mysqli_num_rows($getStatusARR);


            if ($getStatusNUM == 1) {
                foreach ($getStatusARR as $getStatus) {
                    $_SESSION['username'] = $getStatus['usr_username'];
                    header("location:" . $_SESSION['uri'] . "/" . $path . "/pages/main.php");
                    exit(0);
                }
            } else {
                header("location:" . $_SESSION['uri'] . "/" . $path . "?error=status");
                exit(0);
            }
        } else {
            header("location:" . $_SESSION['uri'] . "/" . $path . "?error=password");
            exit(0);
        }
    } else {
        header("location:" . $_SESSION['uri'] . "/" . $path . "?error=username");
        exit(0);
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
</head>


<?PHP
// ================================================================================================================================= START ALERT
// echo $_GET["error"];
if (isset($_GET["error"])) {
    switch ($_GET["error"]) {
        case 'username':
            $alert = 1;
            $icon = 'error';
            $title = 'username ผิด! กรุณาพิมพ์ให้ถูกต้อง';
            break;
        case 'password':
            $alert = 1;
            $icon = 'error';
            $title = 'password ผิด! กรุณาพิมพ์ให้ถูกต้อง';
            break;
        case 'status':
            $alert = 1;
            $icon = 'error';
            $title = 'user ของคุณยังไม่ได้ถูกอนุมัติการใช้งาน กรุณาติดต่อแอดมิน';
            break;
        default:
            $alert = 0;
            break;
    }
}
?>
<script>
    $(document).ready(function() {
        if (<?= $alert; ?> == 1) {
            toastr.<?= $icon; ?>('<?= $title; ?>')
        }
    });
</script>

<?PHP // =============================================================================================================================== END ALERT
?>


<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <h2><a href="#"><b>Deposit Login</b></a> </h2>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <h6>
                    <p class="login-box-msg"><b>Sign in to access your account.</b></p>
                </h6>

                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="user" placeholder="User">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success btn-block">Sign In</button>
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>