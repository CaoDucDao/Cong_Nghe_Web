<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Danh sách sinh viên</title>
   
</head>
<body>

    <h1>Danh sách các sinh viên</h1>

    <table>
        <?php
    
        $filename = "65HTTT_Danh_sach_diem_danh.csv";

        if (file_exists($filename)) {
           
            $file = fopen($filename, "r");

           
            while (($row = fgetcsv($file)) !== false) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }

            
            fclose($file);
        } 
        ?>
    </table>

</body>
</html>