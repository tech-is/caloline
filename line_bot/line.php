<?php
// アクセストークン
$accessToken = '< chanel access token >';
 
//ユーザーからのメッセージ取得
$json_string = file_get_contents('php://input');
$json_object = json_decode($json_string);
 
//取得データ
$replyToken = $json_object->{"events"}[0]->{"replyToken"};           //返信用トークン
$event_type = $json_object->{"events"}[0]->{"type"};                 //イベントタイプ
$message_type = $json_object->{"events"}[0]->{"message"}->{"type"};  //メッセージタイプ
$message_text = $json_object->{"events"}[0]->{"message"}->{"text"};  //メッセージ内容
$user_id = $json_object->{"events"}[0]->{"source"}->{"userId"};      //ユーザID

// イベントタイプが「postback」のとき
if ( $event_type === "postback" ) {
    // ポストバック値
    $postback_data = $json_object->{"events"}[0]->{"postback"}->{"data"};
    // 「別メニュー」が押されたとき
    if ( $postback_data === "another_menu" ) {
        // データベース接続
        $user = 'root';
        $pass = '=77jXk7!';

        try {
            // DBへの接続
            $pdo = new PDO('mysql:host=localhost;dbname=caloline', $user, $pass);
            // トレーニングメニュー数取得
            // $sql = 'SELECT COUNT(*) FROM training_menu';
            // $stmt = $pdo->prepare($sql);
            // $training_count = $stmt->execute();
            //返信実行
            // sending_messages($accessToken, $replyToken, "text", $training_count);
            // exit;

            // トレーニング名取得
            $training_id = rand(1, 30);
            $sql = "SELECT training_name FROM training_menu WHERE training_id = $training_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $training_name = $stmt->fetchColumn();
            // 接続終了
            $sql = null;
            $dbh = null;
            // 返信メッセージ
            $return_message_text = "本日のメニューを[{$training_name}]に変更しました！かんばっていきましょう🔥";

        } catch (PDOException $e) {
            print "エラー!: " . $e->getMessage();
            die();
        }

    // 「マイページ」が押されたとき
    } else {
        //返信メッセージ
        $return_message_text = "calolineのURLはこちらから↓↓　　https://caloline.tk/";
    }

// イベントタイプが「follow」のとき
} elseif ( $event_type === "follow" ) {
    try {
        // MySQLへの接続
        $dbh = new PDO('mysql:host=localhost;dbname=caloline', $user, $pass);
        // ユーザIDを登録するSQL文作成


        /* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        どこにinsertすればいいか分からない
        ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */
        $sql = "INSERT INTO members(line_user_id) VALUES($user_id)";
        $res = $dbh->prepare($sql);

    } catch (PDOException $e) {
        print "エラー!: " . $e->getMessage();
        die();
    }

// イベントタイプが「postback」と「follow」以外のとき
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