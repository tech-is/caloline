<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap&subset=latin-ext" rel="stylesheet">
    <title>カロライン(メイン)</title>
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
                    <li><a href="#" target="_self">トップ</a></li>
                    <li><a href="#" target="_self">ログイン</a></li>
                    <li><a href="#" target="_self">サインイン</a></li>
                </ul>
            </nav>
        </div>
    </header>
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