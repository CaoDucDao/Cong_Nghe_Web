<?php
// Đọc file câu hỏi
$content = file("quiz.txt", FILE_IGNORE_NEW_LINES);


$questions = [];
$temp = [];

foreach ($content as $line) {
    $line = trim($line);
    if ($line === "") {
        if (!empty($temp)) {
            $questions[] = $temp;
            
            $temp = [];
        
        }
    } else {
        $temp[] = $line;
    }
}
if (!empty($temp)) $questions[] = $temp;

// Nộp bài
$score = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $score = 0;
    foreach ($questions as $i => $q) {
        $correct = substr(end($q), -1); /
        $user = $_POST["q$i"] ?? "";
        if ($user === $correct) $score++;
    }
}
?>
<!DOCTYPE html>
<html>
<body>

<h2>Bài thi trắc nghiệm</h2>

<?php if ($score !== null): ?>
    <h3>Kết quả: <?= $score ?>/<?= count($questions) ?></h3>
<?php endif; ?>

<form method="post">
<?php
foreach ($questions as $i => $q) {
    echo "<p><b>Câu " . ($i+1) . ":</b> " . $q[0] . "</p>";
    echo "<label><input type='radio' name='q$i' value='A'> {$q[1]}</label><br>";
    echo "<label><input type='radio' name='q$i' value='B'> {$q[2]}</label><br>";
    echo "<label><input type='radio' name='q$i' value='C'> {$q[3]}</label><br>";
    echo "<label><input type='radio' name='q$i' value='D'> {$q[4]}</label><br>";
    echo "<hr>";
}
?>
    <button type="submit">Nộp bài</button>
</form>

</body>
</html>
