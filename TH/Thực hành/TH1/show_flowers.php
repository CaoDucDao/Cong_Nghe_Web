<?php

require 'data_flowers.php';


?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Quản lý Đồ án</title>
    <!-- Chèn CSS nếu cần, ví dụ Bootstrap hay style.css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navbar">
    <div>Quản lý Đồ án Tốt nghiệp</div>
   
</div>

<div class="container">
  

    <!-- Bước 4: Hiển thị bảng dữ liệu -->
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Tên hoa</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Thao tác</th>
            
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($flowers)): ?>
            <?php foreach ($flowers as $index => $flower): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($flower['tenHoa']) ?></td>
                    <td><?= htmlspecialchars($flower['moTa']) ?></td>
                    <td>
                        <img src="<?= htmlspecialchars($flower['anh']) ?>" 
                             alt="<?= htmlspecialchars($flower['tenHoa']) ?>"
                             width="80">
                    </td>
                    <td>
                        <button  class="edit"> sửa</button>
                        <button  class="delete"> xóa</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        
        </tbody>
    </table>
</div>
</body>
</html>
