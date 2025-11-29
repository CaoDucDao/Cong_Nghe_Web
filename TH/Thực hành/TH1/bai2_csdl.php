<?php
$host = '127.0.0.1'; // hoặc localhost 
$dbname = 'quiz'; // Tên CSDL bạn vừa tạo 
$username = 'root'; // Username mặc định của XAMPP 
$password = ''; // Password mặc định của XAMPP (rỗng) 
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
try {

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Kết nối thành công!";
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}
$questions = $pdo->query("SELECT * FROM `android_quiz` ")->fetchAll();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $score = 0;
    foreach ($questions as $q) {
        $userAns = $_POST[$q['id']] ?? '';

        if (is_array($userAns))
            $userAns = implode(', ', $userAns);
        if ($userAns === trim($q['answer']))
            $score++;
    }
    echo "<h1>Kết quả: $score / " . count($questions) . "</h1>";
}
?>

<form method="post">
    <?php foreach ($questions as $q):

        $isMulti = strpos($q['answer'], ',');
        $type = $isMulti ? 'checkbox' : 'radio';
        $name = $q['id'] . ($isMulti ? '[]' : '');
        ?>
        <p><b><?= $q['question'] ?></b></p>

        <?php foreach (['A', 'B', 'C', 'D'] as $opt): ?>
            <label>
                <input type="<?= $type ?>" name="<?= $name ?>" value="<?= $opt ?>">
                <?= $opt ?>. <?= $q['option_' . strtolower($opt)] ?>
            </label><br>
        <?php endforeach; ?>
        <hr>
    <?php endforeach; ?>
    <button>Nộp bài</button>
</form>