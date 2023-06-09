<!-- Card Information for Test
    Card Number: 4242424242424242
    Name: John_Doe
    Expired month: 12
    Expired year: 24
    Security code: 123
-->

<?php
include('server.php');
$price = $_POST['price'].'00';

// echo $price;
// exit();

require_once dirname(__FILE__).'/omise-php/lib/Omise.php';
define('OMISE_API_VERSION', '2015-11-17');
// define('OMISE_PUBLIC_KEY', 'PUBLIC_KEY');
// define('OMISE_SECRET_KEY', 'SECRET_KEY');
define('OMISE_PUBLIC_KEY', '_________'); // <----Enter Public Key Here instead of _________
define('OMISE_SECRET_KEY', '_________'); // <----Enter Secret Key Here instead of _________

$charge = OmiseCharge::create(array(
  'amount' => $price,
  'currency' => 'thb',
  'card' => $_POST["omiseToken"]
));

$status = ($charge['status']);

// print('<pre>');
// print_r($charge);
// print('</pre>');

// echo $status;

if ($status == 'successful'){
    // success
    echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    echo '<script>
        setTimeout(function() {
            swal({
                title: "ชำระเงินสำเร็จ",
                text: "ตกปุ่ม OK เพื่อไปหน้าแรก",
                type: "success"
            }, function() {
                window.location = "course.php"; //หน้าที่ต้องการให้กระโดดไป
            });
        }, 1000);
    </script>';

}else {
    // error
    echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    echo '<script>
        setTimeout(function() {
            swal({
                title: "เกิดข้อผิดพลาด",
                text: "กรุณาลองใหม่อีกครั้ง",
                type: "error"
            }, function() {
                window.location = "course.php"; //หน้าที่ต้องการให้กระโดดไป
            });
        }, 1000);
    </script>';
}

session_start();
$student_id = $_SESSION['student_id'];

// Check the conditions and insert payment information accordingly
if ($status == 'successful' && $price == 9900) {
    $started_at = date('Y-m-d');
    $end_at = date('Y-m-d', strtotime('+1 month'));

    $sql = "INSERT INTO payment (student_id, payment_status, started_at, end_at) VALUES ($student_id, 'Paid', '$started_at', '$end_at')";
    mysqli_query($conn, $sql);

} elseif ($status == 'successful' && $price == 49900) {
    $started_at = date('Y-m-d');
    $end_at = date('Y-m-d', strtotime('+6 months'));

    $sql = "INSERT INTO payment (student_id, payment_status, started_at, end_at) VALUES ($student_id, 'Paid', '$started_at', '$end_at')";
    mysqli_query($conn, $sql);

} elseif ($status == 'successful' && $price == 89900) {
    $started_at = date('Y-m-d');
    $end_at = date('Y-m-d', strtotime('+12 months'));

    $sql = "INSERT INTO payment (student_id, payment_status, started_at, end_at) VALUES ($student_id, 'Paid', '$started_at', '$end_at')";
    mysqli_query($conn, $sql);

} else {
    // if error then 'Unpaid'
    $started_at = date('Y-m-d');
    $end_at = date('Y-m-d');

    $sql = "INSERT INTO payment (student_id, payment_status, started_at, end_at) VALUES ($student_id, 'UnPaid', '$started_at', '$end_at')";
    mysqli_query($conn, $sql);
}

$conn->close();
?>
