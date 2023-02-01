<?PHP
session_start();

session_destroy();
require('config/config.php');

header("location: " . $_SESSION['uri'] . "/" . $path . '/login.php');
exit(0);
// Codeให้สิ้นสุดแค่หน้านั้นๆหากไม่มีค่า....."/" = 0