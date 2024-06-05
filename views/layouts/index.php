<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="headerStyle.css" rel="stylesheet">
    <link href="footerStyle.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script defer src="headerMenu.js"></script>
    <title>Document</title>
</head>
<body>
<div class="wrapper">


<header>
    <div class="containerHeaderDiv">
        <a href="index.php" class="LogoA">
            <span class="LogoSpan">SearchWork</span>
        </a>
        <div class="menu-icon" onclick="toggleMenu()">☰</div>
        <ul class="navigationMenuUl">
            <li class="nav-itemLi">
                <a href="#" class="nav-linkA">Новини</a>
            </li>
            <li class="nav-itemLi">
                <a href="#" class="nav-linkA">Знайти вакансії</a>
            </li>
            <li class="nav-itemLi">
                <a href="#" class="nav-linkA">Розмістити резюме</a>
            </li>
            <li class="nav-itemLi">
                <a href="#" class="nav-linkA">User Name</a>
            </li>
        </ul>
    </div>

    <form class="SearchForm" role="search">
        <input type="search" class="searchInput" id="searchInput-position" placeholder="Position">
        <input type="search" class="searchInput" id="searchInput-city" placeholder="City">
        <button type="button" class="searchButton">Знайти вакансію</button>
    </form>
</header>

<main>
    <span>MAIN BLOCK</span>
</main>

<footer>
    <div class="containerFooterDiv">
        <span class="copyrightSpan">©Алієв Омар</span>
    </div>
</footer>
</div>
</body>
</html>