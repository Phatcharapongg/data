<?PHP
ob_start();
session_start();

//Connect DB 
require('config/config.php');

//...Code สำหรับเช๊คการ login ว่า login แล้วหรือยัง...//
if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
    header("location:" . $_SESSION['uri'] . "/" . $path . "/pages/main.php");
    exit(0);

    // "http://localhost/deposit/pages/main.php"
}


//....เช๊คค่าPOSTจากฟอร์มล๊อคอินที่กรอกเข้ามา โดยเช๊คยูสเซอร์และพาสเวิดร์   !=''&"" = ต้องไม่เท่ากับค่าว่าง //
if (
    isset($_POST["user"]) && $_POST["user"] != ''
    && isset($_POST["password"]) && $_POST["password"] != ''
) {

    //...เก็บค่าPOSTไว้ในตัวแปร ค่าPOST ที่กรอกเข้ามาคือusername&password // 
    $username = trim($_POST["user"]);
    $password = trim($_POST["password"]);


    //...นำ user มาเช๊คในฐานข้อมูลว่ามีหรือไม่?
    $getUserSQL = "SELECT * FROM user WHERE usr_username = '" .  $username . "'";
    $getUserARR = mysqli_query($conn, $getUserSQL);
    $getUserNUM = mysqli_num_rows($getUserARR);

    if ($getUserNUM == 1) {

        //...ถ้าเจอ user & password ให้สามารถเข้าสู่ระบบได้
        $getPasswordSQL = "SELECT * FROM user WHERE usr_username = '" .  $username . "' AND usr_password = '" .  $password . "'";
        $getPasswordARR = mysqli_query($conn, $getPasswordSQL);
        $getPasswordNUM = mysqli_num_rows($getPasswordARR);

        if ($getPasswordNUM == 1) {
            // ถ้าถูกทั้งสองค่า เช๊ค status ต่อว่าเท่า1ไหม     
            $getStatusSQL = "SELECT * FROM user WHERE usr_username = '" .  $username . "' AND usr_password = '" . $password . "'  AND usr_status = '1' OR usr_status = '8'";
            $getStatusARR = mysqli_query($conn, $getStatusSQL);
            $getStatusNUM = mysqli_num_rows($getStatusARR);

            //...ถ้ามีค่าเท่ากับ 1 ให้เข้าถึงหน้าต่อไปได้ ใช้ 0/1 ในการกำหนด 1 = สามารถเข้าใช้งานได้ 0 = ไม่สามารถเข้าถึงข้อมูลได้ // 
            if ($getStatusNUM == 1) {

                // ดึงข้อมูลออกมาวนลูป  
                foreach ($getStatusARR as $getStatus) {
                    // เก็บค่า username ไว้ใน $_SESSION
                    $_SESSION['username'] = $getStatus['usr_username'];
                    //และสั่งให้ไปหน้า main ต่อ
                    header("location:" . $_SESSION['uri'] . "/" . $path . "/pages/main.php");
                    exit(0);
                }
            } else {
                // ถ้าไม่เจอให้ Alert บอกว่าuserของคุณยังไม่ได้ถูกอนุมัติการใช้งาน กรุณาติดต่อแอดมิน
                header("location:" . $_SESSION['uri'] . "/" . $path . "/login.php?error=status&u=" . $username);
                exit(0);
            }
        } else {
            // ถ้าไม่เจอให้ Alert บอกว่าpassword ผิด
            header("location:" . $_SESSION['uri'] . "/" . $path . "/login.php?error=password&u=" . $username);
            exit(0);
        }
    } else {
        // ถ้าไม่เจอให้ Alert บอกว่าuser ผิด
        header("location:" . $_SESSION['uri'] . "/" . $path . "/login.php?error=username&u=" . $username);
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
// ....START ALERT....แจ้งต่างๆหากไม่ถูกต้องหรือไม่สามารถเข้าถึงได้
// echo $_GET["error"];
// เช๊คค่า $_GET["error"] 
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
<!-- script  ALERT -->
<script>
    $(document).ready(function() {
        if (<?= $alert; ?> == 1) {
            toastr.<?= $icon; ?>('<?= $title; ?>')
        }
    });
</script>
<!--  END ALERT -->


<?PHP
?>

<!-- From Login -->

<body style="font-family: 'Kanit', sans-serif;  background-image: url('./dist/img/do.jfif');"></body>
<body  class="hold-transition login-page   ">
    

    <div class="login-box">
        <div class="login-logo">
            <h2><a href="#"><b> Student Deposit Login</b></a> </h2>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body ">
                <h6>
                    <p class="login-box-msg"><b>Sign in to access your account.</b></p>
                </h6>

                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <?PHP
                        $valUsr = '';
                        if (
                            isset($_GET['u'])
                        ) {
                            $valUsr = $_GET['u'];
                        }
                        ?>
                        <input type="text" class="form-control" name="user" placeholder="User" value="<?= $valUsr; ?>">
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