<?php
/** @var string $Title */
/** @var string $Content */
/** @var string $Role */
/** @var string $Name */
if(empty($Title))
    $Title = "";
if(empty($Content))
    $Content = "";

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $Role = $user['role'];
    $Name = $user['login'];
}else{
    $Role = "noLogged";
    $Name = "";
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../style/headerStyle.css" rel="stylesheet">
    <link href="../../style/footerStyle.css" rel="stylesheet">
    <link href="../../style/style.css" rel="stylesheet">
    <script defer src="../../style/headerMenu.js"></script>
    <title><?=$Title?></title>
</head>
<body>
<div class="wrapper">


<header>

    <?php if($Role == 'applicant'):?>
    <div class="containerHeaderDiv">
        <a href="/" class="LogoA">
            <span class="LogoSpan">SearchWork</span>
        </a>
        <div class="menu-icon" onclick="toggleMenu()">☰</div>
        <ul class="navigationMenuUl">
            <li class="nav-itemLi">
                <a href="/news/index" class="nav-linkA">Новини</a>
            </li>
            <li class="nav-itemLi">
                <a href="/vacancy/index" class="nav-linkA">Знайти вакансії</a>
            </li>
            <li class="nav-itemLi">
                <a href="/resume/add" class="nav-linkA">Розмістити резюме</a>
            </li>
            <li class="nav-itemLi">
                <a href="/users/index" class="nav-linkA"><?=$Name?></a>
            </li>
        </ul>
    </div>
    <?php endif; ?>

    <?php if($Role == 'employer'): ?>
        <div class="containerHeaderDiv">
            <a href="/" class="LogoA">
                <span class="LogoSpan">SearchWork</span>
            </a>
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
            <ul class="navigationMenuUl">
                <li class="nav-itemLi">
                    <a href="/news/index" class="nav-linkA">Новини</a>
                </li>
                <li class="nav-itemLi">
                    <a href="/vacancy/add" class="nav-linkA">Надати вакансію</a>
                </li>
                <li class="nav-itemLi">
                    <a href="/vacancy/my" class="nav-linkA">Мої вакансії</a>
                </li>
                <li class="nav-itemLi">
                    <a href="/users/index" class="nav-linkA"><?=$Name?></a>
                </li>
            </ul>
        </div>
    <?php endif; ?>

    <?php if($Role == 'admin'): ?>
        <div class="containerHeaderDiv">
            <a href="/" class="LogoA">
                <span class="LogoSpan">SearchWork</span>
            </a>
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
            <ul class="navigationMenuUl">
                <li class="nav-itemLi">
                    <a href="/news/index" class="nav-linkA">Новини</a>
                </li>
                <li class="nav-itemLi">
                    <a href="/news/add" class="nav-linkA">Додати новину</a>
                </li>
                <li class="nav-itemLi">
                    <a href="/users/index" class="nav-linkA"><?=$Name?></a>
                </li>
            </ul>
        </div>
    <?php endif; ?>

    <?php if($Role == 'noLogged'): ?>
        <div class="containerHeaderDiv">
            <a href="/" class="LogoA">
                <span class="LogoSpan">SearchWork</span>
            </a>
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
            <ul class="navigationMenuUl">
                <li class="nav-itemLi">
                    <a href="/news/index" class="nav-linkA">Новини</a>
                </li>
                <li class="nav-itemLi">
                    <a href="/vacancy/index" class="nav-linkA">Знайти вакансію</a>
                </li>
                <li class="nav-itemLi">
                    <a href="/users/login" class="nav-linkA">Увійти</a>
                </li>
            </ul>
        </div>
    <?php endif; ?>




    <form class="SearchForm" role="search">
        <input type="search" class="searchInput" id="searchInput-position" placeholder="Position">
        <input type="search" class="searchInput" id="searchInput-city" placeholder="City">
        <button type="button" class="searchButton">Знайти вакансію</button>
    </form>
</header>

<main>
    <?=$Content?>
</main>

<footer>
    <div class="containerFooterDiv">
        <span class="copyrightSpan">©Алієв Омар</span>
    </div>
</footer>
</div>
</body>
</html>