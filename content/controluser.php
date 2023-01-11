<?PHP
//...โค้ดสำหรับเช็คการล้อคอิน ว่าล็อคอินแล้วหรือยัง.....



// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


//----------------------------------------------------------------------------------------------- START MODAL ADDUSER
if (
    isset($_POST['form']) && $_POST['form'] == 'insertuser'
    && isset($_POST['insert']) && $_POST['insert'] == 'user'
    && isset($_POST['username']) && $_POST['username'] != ''
    && isset($_POST['password']) && $_POST['password'] != ''
    && isset($_POST['fname']) && $_POST['fname'] != ''
    && isset($_POST['lname']) && $_POST['lname'] != ''
    && isset($_POST['class']) && $_POST['class'] != ''
    && isset($_POST['cid']) && $_POST['cid'] != ''
    && isset($_POST['tel']) && $_POST['tel'] != ''
) {
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // Insert
    $InsertuserSQL = "INSERT INTO user (usr_username, usr_password, usr_fname, usr_lname, usr_class, usr_cid, usr_tel, usr_status)
    VALUES (
        '" . $_POST['username'] . "',
        '" . $_POST['password'] . "',
        '" . $_POST['fname'] . "',
        '" . $_POST['lname'] . "',
        '" . $_POST['class'] . "',
        '" . $_POST['cid'] . "',
        '" . $_POST['tel'] . "',
        '1'
        )";
    // echo  'sql : ' . $InsertuserSQL;
    mysqli_query($conn, $InsertuserSQL);

    header("location: " . $_SESSION['uri'] . "/" . $path . "/pages/main?path=controlUser&alert=insert-success");
    exit(0);
}
//----------------------------------------------------------------------------------------------- END MODAL ADDUSER




// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


//----------------------------------------------------------------------------------------------- START MODAL EDIT
if (
    isset($_POST['form']) && $_POST['form'] == 'edituser'
    && isset($_POST['edit']) && $_POST['edit'] == 'user'
    && isset($_POST['editusername']) && $_POST['editusername'] != ''
    && isset($_POST['editpassword']) && $_POST['editpassword'] != ''
    && isset($_POST['editfname']) && $_POST['editfname'] != ''
    && isset($_POST['editlname']) && $_POST['editlname'] != ''
    && isset($_POST['editclass']) && $_POST['editclass'] != ''
    && isset($_POST['editcid']) && $_POST['editcid'] != ''
    && isset($_POST['edittel']) && $_POST['edittel'] != ''
){
    $edituserSQL = "UPDATE user SET ";
    $edituserSQL .= "usr_username  = '" . $_POST['editusername'] . "' ";
    $edituserSQL .= ",usr_passworde       = '" . $_POST['editpassworde'] . "' ";
    $edituserSQL .= ",usr_fname     = '" . $_POST['editfname'] . "' ";
    $edituserSQL .= ",usr_lname       = '" . $_POST['editlname'] . "' ";
    $edituserSQL .= ",usr_class       = '" .  $_POST['editclass'] . "' ";
    $edituserSQL .= ",usr_cid       = '" .  $_POST['editcid'] . "' ";
    $edituserSQL .= ",usr_tel       = '" . $_POST['edittel'] . "' ";


$edituserSQL .= "WHERE usr_id = '" . $_POST['editID'] . "' ";
mysqli_query($conn, $edituserSQL);
header("location: " . $_SESSION['uri'] . "/" . $path . "/pages/main?path=controlUser&alert=edit-success");
exit(0);
}
// ----------------------------------------------------------------------------------------------- END MODAL EDIT








//----------------------------------------------------------------------------------------------- START MODAL DELETE


if (
    isset($_POST['form']) && $_POST['form'] == 'delUser'
    && isset($_POST['delete']) && $_POST['delete'] == 'user'
    && isset($_POST['valueDel']) && $_POST['valueDel'] == '9'
    && isset($_POST['idDel']) && $_POST['idDel'] != ''
) {

    $delUserSQL = "DELETE FROM user WHERE usr_id = '" . $_POST['idDel'] . "'";
    mysqli_query($conn, $delUserSQL);
    header("location: " . $_SESSION['uri'] . "/" . $path . "/pages/main?path=controlUser&alert=delete-success");
    exit(0);
}
//----------------------------------------------------------------------------------------------- END MODAL DELETE

?>






<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Control User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main?path=dashboard">Home</a></li>
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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-adduser">
                        <i class="fas fa-user-plus"></i>
                        Add
                    </button>

                    <!-- <button type="button" class="btn btn-success testAlert3">
                        <i class="fas fa-user-plus"></i>
                        TEST
                    </button>
                    <script>
                    $(document).ready(function() {
                        $(".testAlert3").click(function() {
                            Swal.fire('TEST')
                        })
                    })
                    </script> -->

                </div>
            </div>
            <div class="card-body">
                <table id="usertable" class="table table-bordered table-striped">

                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>รหัสประจำตัว</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>ชื่อ - นามสกุล</th>

                            <th>ชั้นเรียนที่รับผิดชอบ</th>
                            <th>Tel</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?PHP

                        $getUserSQL = "SELECT * FROM user WHERE usr_status != '9'";
                        $getUserARR = mysqli_query($conn, $getUserSQL);
                        $getUserNUM = mysqli_num_rows($getUserARR);

                        if ($getUserNUM > 0) {
                            $id = 1;
                            foreach ($getUserARR as $getUser) {
                        ?>
                        <tr class="text-center">

                            <td><?= $id; ?></td>
                            <td><?= $getUser['usr_cid']; ?></td>
                            <td><?= $getUser['usr_username']; ?></td>
                            <td><?= $getUser['usr_password']; ?></td>
                            <td><?= $getUser['usr_fname']; ?> <?= $getUser['usr_lname']; ?></td>
                            <td>ชั้นประถมศึกษาปีที่ <?= $getUser['usr_class']; ?></td>
                            <td><?= KTgetData::formatNumber($getUser['usr_tel']); ?></td>

                            <td class="project-actions text-center">
                                <div class="btn-group">
                                    <?PHP

                                            if ($getUser['usr_status'] == '1') {
                                            ?>

                                    <form accept="" method="POST">
                                        <input type="hidden" name="form" value="upStatusUser">
                                        <input type="hidden" name="update" value="user">
                                        <input type="hidden" name="upId" value="<?= $getUser['usr_id']; ?>">
                                        <button type="submit" class="btn btn-success btn-sm" name="upValue" value="0">
                                            <i class='fas fa-user-check'></i>
                                        </button>
                                    </form>
                                    <?PHP
                                            } else {
                                            ?>

                                    <form accept="" method="POST">
                                        <input type="hidden" name="form" value="upStatusUser">
                                        <input type="hidden" name="update" value="user">
                                        <input type="hidden" name="upId" value="<?= $getUser['usr_id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" name="upValue" value="1">
                                            <i class="fas fa-user-slash"></i>
                                        </button>
                                    </form>
                                    <?PHP
                                            }
                                            ?>
                                    <button type="button" class="btn btn-warning btn-sm view" data-toggle="modal"
                                        data-target="#modal-edituser">
                                        <i class="fas fa-edit"></i>
                                    </button>




                                    <form action="" method="POST">
                                        <input type="hidden" name="form" value="delUser">
                                        <input type="hidden" name="delete" value="user">
                                        <input type="hidden" name="idDel" value="<?= $getUser['usr_id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm confirm"
                                            txtAlert='คุณต้องการลบข้อมูลนี้จริงหรือไม่ ?' name="valueDel" value="9">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>


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



<!-- //-------------------------------------------------------------------- แก้ไข user -->
<div class="modal fade" id="modal-edituser">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <input type="hidden" name='form' value="edituser" />
                <input type="hidden" name='edit' value="user" />
                <input type="hidden" id='editID' name='editID' />
                <input type="hidden" name='username' value="<?= $_SESSION['username']; ?>" />
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editusername">UserName</label>
                                <input type="text" class="form-control" id="editusername" name="editusername"
                                    placeholder="Enter username">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editpassword">password</label>
                                <input type="text" class="form-control" id="editpassword" name="editpassword"
                                    placeholder="Enter password">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editfname">ชื่อ</label>
                                <input type="text" class="form-control" id="editfname" name="editfname"
                                    placeholder="Enter fname">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editlname">สกุล</label>
                                <input type="text" class="form-control" id="editlname" name="editlname"
                                    placeholder="Enter lname">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editcid">รหัสประจำตัว</label>
                                <input type="text" class="form-control" id="editcid" name="editcid"
                                    placeholder="Enter cid">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="edittel">เบอร์ติดต่อ</label>
                                <input type="text" class="form-control" id="edittel" name="edittel"
                                    placeholder="Enter Tel">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="editcalss">ชั้นเรียนที่รับผิดชอบ</label>
                                <select class="form-control select2bs4" id='editclass' name="editclass">
                                    <option>กรุณาเลือกชั้นเรียน</option>
                                    <option value='1/1'>ชั้นประถมศึกษาปีที่ 1/1</option>
                                    <option value='1/2'>ชั้นประถมศึกษาปีที่ 1/2</option>
                                    <option value='2/1'>ชั้นประถมศึกษาปีที่ 2/1</option>
                                    <option value='2/2'>ชั้นประถมศึกษาปีที่ 2/2</option>
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


<!-- //-------------------------------------------------------------------- แก้ไข user -->

<?PHP 
?>


<!-- //-------------------------------------------------------------------- เพิ่ม user -->
<div class="modal fade" id="modal-adduser">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <input type="hidden" name='form' value="insertuser" />
                <input type="hidden" name='insert' value="user" />
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="username">UserName</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter username">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="text" class="form-control" id="password" name="password"
                                    placeholder="Enter password">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="fname">ชื่อ</label>
                                <input type="text" class="form-control" id="fname" name="fname"
                                    placeholder="Enter fname">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="lname">สกุล</label>
                                <input type="text" class="form-control" id="lname" name="lname"
                                    placeholder="Enter lname">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="cid">รหัสประจำตัว</label>
                                <input type="text" class="form-control" id="cid" name="cid" placeholder="Enter ID">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="tel">เบอร์ติดต่อ</label>
                                <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter Tel">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="form-group">
                                <label for="calss">ชั้นเรียนที่รับผิดชอบ</label>
                                <select class="form-control select2bs4" id='class' name="class">
                                    <option>กรุณาเลือกชั้นเรียน</option>
                                    <option value='1/1'>ชั้นประถมศึกษาปีที่ 1/1</option>
                                    <option value='1/2'>ชั้นประถมศึกษาปีที่ 1/2</option>
                                    <option value='2/1'>ชั้นประถมศึกษาปีที่ 2/1</option>
                                    <option value='2/2'>ชั้นประถมศึกษาปีที่ 2/2</option>
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

<!-- //-------------------------------------------------------------------- เพิ่ม user -->


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