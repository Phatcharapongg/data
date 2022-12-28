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
<section class="content">
    <div class="container-fluid">
    </div>
</section>