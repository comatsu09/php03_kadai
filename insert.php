<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$bookcoment = $_POST["bookcoment"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_bm_table(bookname,bookurl,bookcoment,indate)VALUES(:bookname,:bookurl,:bookcoment,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bookname', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $email, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookcoment', $naiyou, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: index.php");
    exit;
}
