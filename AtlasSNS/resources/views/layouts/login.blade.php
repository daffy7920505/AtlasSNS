<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('js/script.js') }} ">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="./js/main.js"></script>
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->

</head>
<body>
    <header>
        <div id = "head">
            <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}"></a></h1>
        </div>
            <div id="top">
                <div id="top-menu">
                    <p> 〇〇さん<img src="{{ asset('images/icon1.png') }}"></p>
                </div>
<dl class="ac">
    <dt class="ac-parent">メニュー1</dt>
    <dd class="ac-child">
      <dl>
        <dt class="ac-child__item"><a href="/top">HOME</a></dt>
        <dt class="ac-child__item"><a href="/profile">プロフィール編集</a></dt>
        <dt class="ac-child__item"><a href="/logout">ログアウト</a></dt>

       </dl>
    </dd>
  </dl>

            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>〇〇さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{ Auth::user()->follows()->get()->count() }}名</p>
                </div>
                <p class="btn"><a href="/Follow">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{ Auth::user()->followers()->get()->count() }}名</p>
                </div>
                <p class="btn"><a href="/Follower">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="JavaScriptファイルのURL"></script>

</body>
</html>
