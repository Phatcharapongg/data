<?PHP
$selectClass = 0;

if (isset($_POST['class']) && $_POST['class'] != '') {
    $class = $_POST['class'];
    $selectClass = 1;
} else if (isset($_POST['student']) && $_POST['student'] != '') {
    $dataStuden     = explode("|x|", $_POST['student']);
    $studenID       = $dataStuden[0];
    $studenFullname = $dataStuden[1];
    $classNumber    = $dataStuden[2];
    $selectClass    = 2;
    $fdate = $_POST['fdate'];
    $ldate = $_POST['ldate'];
} else {
    $selectClass = 0;
}
?>

<!-- <section class="content-header">
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
</section> -->

<!-- Main content -->
<br>
<br>

<body style="font-family: 'Kanit', sans-serif;  background-image: url('./dist/img/bgg.jpg');">

    <div class="contect">
        <div class="container">
            <center>
                <h3 class="text-bold">บันทึกการฝากออมเงินของนักเรียน</h3>
            </center>

            <br>
            <?PHP
            if ($selectClass == 0) {
            ?>
            <center>
                <h4 class="text-bold">( ชั้นประถมศึกษาปีที่ 1 - 6 ) </h4>
            </center>

        </div>
    </div>
</body>
<br>
<section class="content">
    <div class="container-fluid ">
        <form action="" method="POST">
            <div class="row mb-4">
                <div class='col-12 mb-3'>
                    <select class="form-control select2bs4 " id='class' name="class">
                        <option value="">กรุณาเลือกชั้นเรียน</option>
                        <option value='1/1'>ชั้นประถมศึกษาปีที่ 1/1</option>
                        <option value='1/2'>ชั้นประถมศึกษาปีที่ 1/2</option>
                        <option value='1/3'>ชั้นประถมศึกษาปีที่ 1/3</option>
                        <option value='2/1'>ชั้นประถมศึกษาปีที่ 2/1</option>
                        <option value='2/2'>ชั้นประถมศึกษาปีที่ 2/2</option>
                        <option value='2/3'>ชั้นประถมศึกษาปีที่ 2/3</option>
                        <option value='3/1'>ชั้นประถมศึกษาปีที่ 3/1</option>
                        <option value='3/2'>ชั้นประถมศึกษาปีที่ 3/2</option>
                        <option value='3/3'>ชั้นประถมศึกษาปีที่ 3/3</option>
                        <option value='4/1'>ชั้นประถมศึกษาปีที่ 4/1</option>
                        <option value='4/2'>ชั้นประถมศึกษาปีที่ 4/2</option>
                        <option value='4/3'>ชั้นประถมศึกษาปีที่ 4/3</option>
                        <option value='5/1'>ชั้นประถมศึกษาปีที่ 5/1</option>
                        <option value='5/2'>ชั้นประถมศึกษาปีที่ 5/2</option>
                        <option value='5/3'>ชั้นประถมศึกษาปีที่ 5/3</option>
                        <option value='6/1'>ชั้นประถมศึกษาปีที่ 6/1</option>
                        <option value='6/2'>ชั้นประถมศึกษาปีที่ 6/2</option>
                        <option value='6/3'>ชั้นประถมศึกษาปีที่ 6/3</option>
                    </select>
                </div>

                <br>
                <div class="col-12 mb-3">
                    <button type="submit" id="btns" class='btn btn-info btn-block mb-3'>ค้นหา</button>
                </div>
            </div>
        </form>

        <script>
        $(document).ready(function() {
            $('#btns').attr('disabled', 'disabled');
            $('#class').change(function() {
                if ($(this).val != '') {
                    $('#btns').removeAttr('disabled');
                }
            });
        });
        </script>

        

        

        

        
        

    </div>
    <?PHP  } ?>





</section>



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