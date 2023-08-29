<?PHP
ob_start();
date_default_timezone_set("Asia/Bangkok");

$dataNow = date("Y-m-d H:i:s");

// $_SESSION['uri'] = 'http://swdata.srisangworn.go.th';
$_SESSION['uri'] = 'http://localhost';
$path = 'deposit';

$servername = "192.168.0.32";
$username = "ict009";
$password = "Ss0810432245";
$dbname = "deposit";
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "test";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}


class KTgetData
{

    public static function getNumberBoxInDashboard($conn, $type, $data)
    {
        if ($type == 'numberofstudents' && $data != '') {
            $getNBSTNSQL = "SELECT COUNT(ls_id) AS numberofstudents FROM list_students WHERE ls_class = '" . $data . "'";
            $getNBSTNARR = mysqli_query($conn, $getNBSTNSQL);
            $getNBSTNNUM = mysqli_num_rows($getNBSTNARR);
            if ($getNBSTNNUM > 0) {
                foreach ($getNBSTNARR as  $getNBSTN) {
                    return $getNBSTN['numberofstudents'];
                }
            } else {
                return 0;
            }
        } elseif ($type == 'sumAmountByDay' && $data != '') {
            $getSAMBDSQL = "SELECT SUM(dep_amount_in) AS sumAmountByDay FROM deposit WHERE dep_insdt LIKE '" . $data . "%' AND dep_status != '9'";
            $getSAMBDARR = mysqli_query($conn, $getSAMBDSQL);
            $getSAMBDNUM = mysqli_num_rows($getSAMBDARR);
            if ($getSAMBDNUM > 0) {
                foreach ($getSAMBDARR as  $getSAMBD) {
                    return $getSAMBD['sumAmountByDay'];
                }
            } else {
                return 0;
            }
        } else {
            $getSAMASQL = "SELECT SUM(ls_balance) AS sum FROM list_students WHERE ls_class = '".$data."' ";
            $getSAMAARR = mysqli_query($conn, $getSAMASQL);
            $getSAMANUM = mysqli_num_rows($getSAMAARR);
            if ($getSAMANUM > 0) {
                foreach ($getSAMAARR as  $getSAMA) {
                    return $getSAMA['sum'];
                }
            } else {
                return 0;
            }
        }
    }

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
