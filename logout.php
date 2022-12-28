<?PHP 
session_start();

session_destroy();
require('config/config.php');

header("location: " . $_SESSION['uri'] ."/". $path);
exit(0);
