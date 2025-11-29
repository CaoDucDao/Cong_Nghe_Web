<?php
$host = '127.0.0.1'; // hoặc localhost 
$dbname = 'flowers'; // Tên CSDL bạn vừa tạo 
$username = 'root'; // Username mặc định của XAMPP 
$password = ''; // Password mặc định của XAMPP (rỗng) 
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
try {

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}



$stmt = $pdo->query("SELECT * FROM flowers");
$flowers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý Hoa</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        img {
            width: 70px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }

        button {
            cursor: pointer;
            padding: 4px 8px;
        }
    </style>
</head>

<body>

    <h2>Danh sách các loài hoa</h2>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên hoa</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $index => $flower): ?>
                <tr>
                    <td><?= $index + 1 ?></td>

                    <td><?= htmlspecialchars($flower['ten_hoa']) ?></td>

                    <td><?= htmlspecialchars($flower['mo_ta']) ?></td>

                    <td>
                        <img src=" <?= htmlspecialchars($flower['hinh_anh']) ?>" width="80">
                    </td>

                    <td>

                        <button class="edit"> sửa</button>
                        <button class="delete"> xóa</button>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>