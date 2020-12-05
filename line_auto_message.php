<?php
require("./vendor/autoload.php");
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('msd0KrCVvYna4an9JjtTOU2KaounSXKbJa3m7NIR5hRFw/PbTdzcDjwf9NYriW4BdGMvyA0Md9//CGz4HzRgOe1pyjxXpyVO8SXMe4NBMzFAPCKwNeHsUilvaKUBuju9m7fniGhqME77eKJD20cbDgdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '0fdb44eaab504fc17559a15d8e76b3f1']);

// データベース接続
$user = 'root';
$pass = '=77jXk7!';

try {
    // DBへの接続
    $dbh = new PDO('mysql:host=153.127.49.73;dbname=caloline', $user, $pass);
    // SQL文作成
    $sql = "SELECT training_name from training_menu";
    // SQL文実行
    $res = $dbh->query($sql);
    // トレーニングメニュー名の配列を作成
    $training_name_array = array();
    // 配列に追加
    foreach ($res as $row) {
        $training_name_array[] = $row['training_name'];
    }

    // 配列からランダムにキーの値を取り出す
    $r = array_rand($training_name_array);
    // 「今日のメニュー」をランダムに取得
    $menu_of_today = $training_name_array[$r];
    // 送信メッセージ準備
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("今日のメニューは{$training_name_array[$r]}です。");
    $response = $bot->pushMessage('U38cc2b7074e99ae4dcf6c1c700aaf072', $textMessageBuilder);
    // 送信実行
    echo $response->getHTTPStatus() . ' ' . $response->getRawBody();


    // 「今日のメニュー」をDBに追加するSQL文作成
    // $sql = "INSERT INTO "

    // 接続を閉じる
    $sql = null;
    $dbh = null;

} catch (PDOException $e) {
    print "エラー!: " . $e->getMessage();
    die();
}

?>