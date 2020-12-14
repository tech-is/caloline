<?php
require("./vendor/autoload.php");
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('msd0KrCVvYna4an9JjtTOU2KaounSXKbJa3m7NIR5hRFw/PbTdzcDjwf9NYriW4BdGMvyA0Md9//CGz4HzRgOe1pyjxXpyVO8SXMe4NBMzFAPCKwNeHsUilvaKUBuju9m7fniGhqME77eKJD20cbDgdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '0fdb44eaab504fc17559a15d8e76b3f1']);

// データベース接続
$user = 'root';
$pass = '=77jXk7!';

try {
    // データベース接続
    $pdo = new PDO('mysql:host=localhost;dbname=caloline', $user, $pass);
    // トレーニングメニュー数取得
    $sql = 'SELECT COUNT(*) FROM training_menu';
    $stmt = $pdo->prepare($sql);
    $training_count = $stmt->execute();
    // トレーニング名取得
    $training_id = rand(1, $training_count);
    $sql = "SELECT training_name FROM training_menu WHERE training_id = $training_id";
    $stmt = $pdo->prepare($sql);
    $training_name = $stmt->execute();
    // 送信メッセージ準備
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("{$training_name}");
    $response = $bot->pushMessage('U38cc2b7074e99ae4dcf6c1c700aaf072', $textMessageBuilder);
    // 送信実行
    echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
    // トレーニング名をinsert
    $sql = "INSERT $training_name INTO";



    
    $stmt = $pdo->prepare($sql);
    // 接続を閉じる
    $sth = null;
    $dbh = null;

} catch (PDOException $e) {
    print "エラー!: " . $e->getMessage();
    die();
}
?>