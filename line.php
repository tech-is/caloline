<?php
// アクセストークン
$accessToken = 'msd0KrCVvYna4an9JjtTOU2KaounSXKbJa3m7NIR5hRFw/PbTdzcDjwf9NYriW4BdGMvyA0Md9//CGz4HzRgOe1pyjxXpyVO8SXMe4NBMzFAPCKwNeHsUilvaKUBuju9m7fniGhqME77eKJD20cbDgdB04t89/1O/w1cDnyilFU=';
 
//ユーザーからのメッセージ取得
$json_string = file_get_contents('php://input');
$json_object = json_decode($json_string);
 
//取得データ
$replyToken = $json_object->{"events"}[0]->{"replyToken"};           //返信用トークン
$event_type = $json_object->{"events"}[0]->{"type"};                 //イベントタイプ
$message_type = $json_object->{"events"}[0]->{"message"}->{"type"};  //メッセージタイプ
$message_text = $json_object->{"events"}[0]->{"message"}->{"text"};  //メッセージ内容
$user_id = $json_object->{"events"}[0]->{"source"}->{"userId"};      //ユーザID
// file_put_contents('line.txt', var_export($json_object, true));
// exit;

// イベントタイプが「postback」のとき( 画面下のボタンが押されたとき )
if ( $event_type === "postback" ) {
    // ポストバックされてきた値
    $postback_data = $json_object->{"events"}[0]->{"postback"}->{"data"};

    // 「別メニュー」が押されたとき
    if ( $postback_data === "another_menu" ) {
        // データベース接続
        $user = 'root';
        $pass = '=77jXk7!';

        try {
            // MySQLへの接続
            $dbh = new PDO('mysql:host=153.127.49.73;dbname=caloline', $user, $pass);
            // SQL文作成
            $sql = "SELECT training_name from training_menu";
            // SQL文実行
            $res = $dbh->query($sql);
            // トレーニングメニュー名の配列を作成
            $training_name_array = array();
            // 取り出したトレーニングメニュー名を配列に追加
            foreach ($sth as $row) {
                $training_name_array[] = $row['training_name'];
            }
            // 配列からランダムにキーの値を取り出す
            $r = array_rand($training_name_array);
            // 別メニューを取得
            $another_menu = $training_name_array[$r];
            // 「今日のメニュー」を更新するSQL文作成
            $sql = "UPDATE ";
            // SQL文実行
            $res = $dbh->query($sql);
            // 接続終了
            $sql = null;
            $dbh = null;
            // 返信メッセージ
            $return_message_text = "別メニューは「{$another_menu}」です。";

        } catch (PDOException $e) {
            print "エラー!: " . $e->getMessage();
            die();
        }

    // 「マイページ」が押されたとき
    } else {
        // uriタイプ 
        // $messageData = [ 
        //     "type" => "uri", 
        //     "label" => "calolineのWebサイトへ", 
        //     "uri" => "https://caloline.tk/", 
        //     "altUri" => [
        //         "desktop" => "https://caloline.tk/"
        //     ] 
        // ];

        // $response = [ "replyToken" => $replyToken, "messages" => [$messageData] ]; 
        // error_log(json_encode($response)); 
        // $ch = curl_init("https://api.line.me/v2/bot/message/reply"); 
        // curl_setopt($ch, CURLOPT_POST, true); 
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response)); 
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json; charser=UTF-8', 'Authorization: Bearer ' . $accessToken )); 
        // $result = curl_exec($ch); error_log($result); 
        // curl_close($ch);

        //返信メッセージ
        $return_message_text = "calolineのURLはこちらから↓↓　　https://caloline.tk/";
    }

// イベントタイプが「follow」のとき( ユーザに追加されたとき )
} elseif ( $event_type === "follow" ) {
    // ユーザIDを登録
    try {
        // MySQLへの接続
        $dbh = new PDO('mysql:host=153.127.49.73;dbname=caloline', $user, $pass);
        // SQL文作成
        $sql = "INSERT $user_id INTO";
        // SQL文実行
        $res = $dbh->query($sql);

    } catch (PDOException $e) {
        print "エラー!: " . $e->getMessage();
        die();
    }

// イベントタイプが「postback」と「follow」以外のとき( テキストメッセージ等ほか )
} else {
    $return_message_text = "画面下のメニューから選んでね！";
}

//返信実行
sending_messages($accessToken, $replyToken, "text", $return_message_text);
?>

<?php
//メッセージの送信
function sending_messages($accessToken, $replyToken, $message_type, $return_message_text){
    //レスポンスフォーマット
    $response_format_text = [
        "type" => $message_type,
        "text" => $return_message_text
    ];
 
    //ポストデータ
    $post_data = [
        "replyToken" => $replyToken,
        "messages" => [$response_format_text]
    ];
 
    //curl実行
    $ch = curl_init("https://api.line.me/v2/bot/message/reply");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charser=UTF-8',
        'Authorization: Bearer ' . $accessToken
    ));
    $result = curl_exec($ch);
    curl_close($ch);
}
?>