<!DOCTYPE html>

<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KingCrawler - Crawl Everything</title>
    <link rel="icon" href="{{ asset('Assets/Images/icon.ico')}}" type="image/x-icon"/>
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('Assets/Images/logo.png') }}" alt="KingCrawl.com"/>
        </div>
        <ul class="navbar">
            <li class="nav active">
                <a href="#">Zing MP3</a>
            </li>
            <li class="nav">
                <a href="#">NCT</a>
            </li>
            <li class="nav">
                <a href="#">CSN</a>
            </li>
        </ul>
    </header>
    <article>
        <div class="input">
            <span class="title">Nhập url:</span>
            <input type="text" value="" placeholder="Đường dẫn"/>
        </div>
        <div class="result">
            
        </div>
    </article>
</body>

</html>