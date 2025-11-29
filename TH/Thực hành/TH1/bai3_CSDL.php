<?php

$host = '127.0.0.1'; // hoặc localhost 
$dbname = 'sv65httt'; // Tên CSDL bạn vừa tạo 
$username = 'root'; // Username mặc định của XAMPP 
$password = ''; // Password mặc định của XAMPP (rỗng) 
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
try {

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Kết nối thành công!"; // (Bỏ comment để test) 
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}
$sql_select = "SELECT * FROM 65httt_danh_sach_diem_danh ";

$stmt_select = $pdo->query($sql_select);

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Danh Sách Sinh Viên </h2>
    <table>
        <tr>
            <th>username</th>
            <th>password</th>
            <th>lastname</th>
            <th>firstname</th>
            <th>class</th>
            <th>email</th>
            <th>course1</th>

        </tr>
        <?php

        while ($row = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['COL 1']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 2']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 3']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 4']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 5']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 6']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 7']) . "</td>";
            echo "</tr>";

        }



        ?>
    </table>
</body>

</html>