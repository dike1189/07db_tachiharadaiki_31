<?php
//1. POSTデータ取得
$id = $_GET['id'];


//2. DB接続します
//*** function化する！  *****************
require_once('funcs.php'); 
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare(
    'DELETE FROM 
        gs_an_kadai_table 
    WHERE id = :id
    '
);

$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}
