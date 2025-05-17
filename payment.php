<?php
session_start();
include 'db_connection.php';

if (!isset($_GET['booking_id'])) {
    die("Booking ID không hợp lệ.");
}

$booking_id = $_GET['booking_id'];

// Xử lý thanh toán giả lập
$sql = "UPDATE booking SET is_paid = 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $booking_id);
if ($stmt->execute()) {
    echo "<h2>Thanh toán thành công cho mã vé: $booking_id</h2>";
    echo "<a href='index.html'>Quay lại trang chủ</a>";
} else {
    echo "Lỗi thanh toán: " . $conn->error;
}
$conn->close();
?>
