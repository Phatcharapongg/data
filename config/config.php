<?PHP
ob_start();
date_default_timezone_set("Asia/Bangkok");

$dataNow = date("Y-m-d H:i:s");

$_SESSION['uri'] = 'http://localhost';
$path = 'deposit';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "deposit";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}



class KTgetData
{

    public static function formatNumber($number)
    {

        // 👇 format phone number
        $format_phone =
            substr($number, -10, -7) . "-" .
            substr($number, -7, -4) . "-" .
            substr($number, -4);
        return $format_phone;
    }

    public static function convertTHDate($strDate, $show)
    {

        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strTime = date("H:i:s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];

        if (isset($strDate)) {
            if ($show == "DMY") {
                return "$strDay $strMonthThai $strYear";
            } else if ($show == "MY") {
                return "$strMonthThai $strYear";
            } else if ($show == "Y") {
                return "$strYear";
            } else if ($show == "DMYT") {
                return "$strDay $strMonthThai $strYear $strTime";
            }
        } else {
            return $strDate;
        }
    }
}
