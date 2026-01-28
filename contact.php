<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date = date("Y-m-d H:i:s");

    // 保存するデータ
    $line = [$date, $name, $email, $message];

    // CSVを開いて追記（なければ作成）
    $f = fopen("inquiries.csv", "a");
    fputcsv($f, $line);
    fclose($f);

    // 完了したら元の画面に戻る
    header("Location: index.html?status=success");
    exit;
}
?>