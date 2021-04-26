<?php
require("vendor/autoload.php");
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('< chanel access token >');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '< chanel secret >']);

//送信先のユーザーID
$user_id = '< 送信先のユーザーID >';


// データベース接続
$user = 'root';
$pass = '=77jXk7!';

try {
    // データベース接続
    $pdo = new PDO('mysql:host=localhost;dbname=caloline', $user, $pass);

    //membersテーブルからuser_idとfirst_weightを取得する
    
    // トレーニングメニュー数取得
    $sql = 'SELECT COUNT(*) FROM training_menu';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $training_count = $stmt->fetchColumn();

    // trainig_menuテーブルから取得
    $training_id = rand(1, $training_count);
    $sql = "SELECT * FROM training_menu WHERE training_id = $training_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $training_id = $result[0]['training_id'];
    $training_name = $result[0]['training_name'];
    $mets = $result[0]['mets'];
    $training_time = $result[0]['training_time'];

    //消費カロリー計算（　METS　×　体重　×　時間　×　1.05　）
    $calories = round($mets * 60 * $training_time * 1.05, 2);
    
    // 送信メッセージ準備
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        "おはようございます！本日のメニューは[{$training_name}]です！かんばっていきましょう🔥"
    );
    $response = $bot->pushMessage("{$user_id}", $textMessageBuilder);
    
    // 送信実行
    echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
    //トレーニング名をinsert
    $sql = "INSERT INTO training_rec(user_id, imp_training_id, used_calories) VALUES(1, $training_id, $calories)";
    $result = $pdo->query($sql);
    
    //$stmt = $pdo->prepare($sql);
    // 接続を閉じる
    $sth = null;
    $dbh = null;
    $pdo = null;

} catch (PDOException $e) {
    print "エラー!: " . $e->getMessage();
    die();
}
?>