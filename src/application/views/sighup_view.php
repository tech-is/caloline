<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap&subset=latin-ext" rel="stylesheet">
    <title>カロライン(サインアップ)</title>
</head>
<body>
    <header class="l-header fixed-nav">
        <div class="l-header-inner">
            <h1 class="l-product-logo">
                <a href="/">
                    <img src="../img/icon/caloline_logo.jpg" alt="カロライン">
                </a>
            </h1>
            <button class="nav-toggle-button outside" data-about-nav-toggle aria-label="ナビゲーション メニューの切り替え"
                id="nav-toggle-button">
                <img alt="ナビゲーション メニューを開く" class="menu-bars" src="../img/icon/menu.png" height="24" width="24">
                <img alt="ナビゲーション メニューを閉じる" class="menu-close" src="../img/icon/close.png" height="24" width="24">
            </button>
            <nav class="l-header__nav-top">
                <h1 class="l-product-logo">
                    <a href="/" target="_self">
                        <img alt="カロライン" src="../img/icon/caloline_logo.jpg" />
                    </a>
                </h1>
                <ul>
                    <li><a href="/caloline/src/Caloline" target="_self">トップ</a></li>
                    <li><a href="/caloline/src/Caloline/login" target="_self">ログイン</a></li>
                    <li><a href="/caloline/src/Caloline/sighup" target="_self">サインイン</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="module-spacer--large "></div>
    <div class="module-spacer--large "></div>
    <div class="module-spacer--large "></div>
    <form method="POST" action="" class="p-forms">
        <h2>サインアップ</h2>
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
        <?php if(isset($success_mess)) :?>
            <div class="alert alert-success" role="alert"><?= $success_mess?></div>
        <?php endif; ?>    
        <div class="cp_inputText">
            <input class="ef" type="text" name ="name" placeholder="">
            <label>ニックネーム</label>
            <div class="alert-danger" role="alert"><?= form_error('name');?></div>
            <span class="focus_line"></span>
        </div>
        <div class="cp_inputText">
            <input class="ef" type="text" name="mail" placeholder="">
            <label>メールアドレス</label>
            <div class="alert-danger" role="alert"><?= form_error('mail');?></div>
            <span class="focus_line"></span>
        </div>
        <div class="cp_inputText">
            <input class="ef" type="password" name="password" placeholder="">
            <label>パスワード(英数字８文字以上)</label>
            <div class="alert-danger" role="alert"><?= form_error('password');?></div>
            <span class="focus_line"></span>
        </div>
        <div class="cp_inputText">
            <input class="ef" type="password" name="conf_pass" placeholder="">
            <label>確認用パスワード</label>
            <div class="alert-danger" role="alert"><?= form_error('conf_pass');?></div>
            <span class="focus_line"></span>
        </div>
        <div class="cp_inputText">
            <input class="ef" type="text" name="first_weight" placeholder="">
            <label>現在の体重</label>
            <div class="alert-danger" role="alert"><?= form_error('first_weight');?></div>
            <span class="focus_line"></span>
        </div>
        <div class="cp_inputText">
            <input class="ef" type="text" name="target_weight" placeholder="">
            <label>目標体重</label>
            <div class="alert-danger" role="alert"><?= form_error('target_weight');?></div>
            <?php if(isset($error_mess)): ?>
                <div class="alert-danger" role="alert"><?= $error_mess; ?></div>
            <?php endif;?>
            <span class="focus_line"></span>
        </div>
        <div class="cp_inputText">
            <input class="" type="checkbox" name="poss_menu[]" value="1">
            <label>自転車を所有している(購入予定である)</label>
        </div>
        <div class="cp_inputText">
            <input class="" type="checkbox" name="poss_menu[]" value="2">
            <label>ロードバイク・クロスバイクを所有している（購入予定である）</label>
        </div>
        <div class="cp_inputText">
            <input class="" type="checkbox" name="poss_menu[]" value="3">
            <label>フィットネスクラブ・ジムに加入している（加入予定である）</label>
        </div>
        <div class="cp_inputText">
            <input class=""  type="checkbox" name="poss_menu[]" value="4">
            <label>縄跳びを所有している（購入予定である）</label>
        </div>
        <!--<a class="p-btn-round p-icon__arrow-next" href="" role="button">登録する</a> -->
        <button type="submit" class="p-btn-round p-icon__arrow-next">登録する</button>
    </form>
    <div class="module-spacer--large"></div>
    <div class="module-spacer--large"></div>
    <div class="module-spacer--large"></div>
    <footer class="footer">
        <div class="main c-section">
            <div class="main-inner">
                <section class="logo-area">
                    <a class="p-btn-round p-icon__arrow-next" href="#" target="_self"
                        role="button">プログラミングを学ぶ</a>
                </section>
                <section class="sitemap">
                    <ul class="footer-links">
                        <li class="p-accordion" id="footer-sitemap-about">
                            <h4 role="button" onclick="accordionModule.toggleMenu('accordion-about')">運営チーム</h4>
                            <input type="checkbox" id="accordion-about" />
                            <label for="accordion-about"></label>
                            <ul class="p-accordion__items">
                                <a href="#" target="_self">
                                    <li>リーダー 岩本 拓也</li>
                                </a>
                                <a href="#" target="_self">
                                    <li>伊賀上 尚彦</li>
                                </a>
                                <a href="#" target="_self">
                                    <li>西岡 祐希</li>
                                </a>
                                <a href="#" target="_self">
                                    <li>阿部 泰樹</li>
                                </a>
                            </ul>
                        </li>
                        <li class="p-accordion" id="footer-sitemap-school">
                            <h4 role="button" onclick="accordionModule.toggleMenu('accordion-school')">TECH.I.S メンター</h4>
                            <input type="checkbox" id="accordion-school" />
                            <label for="accordion-school"></label>
                            <ul class="p-accordion__items">
                                <a href="#" target="_self">
                                    <li>校長 植松 洋平</li>
                                </a>
                                <a href="#" target="_self">
                                    <li>CTO 中塚 貴也</li>
                                </a>
                            </ul>
                        </li>
                        <li class="p-accordion" id="footer-sitemap-links">
                            <h4 role="button" onclick="accordionModule.toggleMenu('accordion-links')">Copyright&copy;2020 HECH.I.S</h4>
                            <input type="checkbox" id="accordion-links" />
                            <label for="accordion-links"></label>
                            <ul class="p-accordion__items">
                                <a href="#" target="_blank">
                                    <li>Blog</li>
                                </a>
                                <a href="#" target="_blank">
                                    <li>Twitter</li>
                                </a>
                                <a href="#" target="_blank">
                                    <li>YouTube</li>
                                </a>
                                <a href="#" target="_blank">
                                    <li>GitHub</li>
                                </a>
                            </ul>
                        </li>
                    </ul>
                </section>
                <section class="foot">
                    <ul>
                        <a href="#">
                            <li>利用規約</li>
                        </a>
                        <a href="#">
                            <li>プライバシーポリシー</li>
                        </a>
                    </ul>
                </section>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/ja.js"></script>
    <script src="../js/animate.js" type="text/javascript"></script>
    <script src="../js/carousel.js" type="text/javascript"></script>
    <script src="../js/menu.js" type="text/javascript"></script>
</body>
</html>