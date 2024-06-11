<?php
$this->Title = "Список вакансій";
$user = core\Core::get()->session->get('user');
if(isset($user)){
    $Role = $user['role'];
}else{
    $Role = "noLogged";
}
if(empty($vacancyList))
    $vacancyList = [];
?>
<head>
    <link href="/style/vacancy.css" rel="stylesheet">
</head>

<body>
<div class="top-side">
    <form class="SearchForm" role="search" id="searchForm">
        <input type="search" class="searchInput" id="searchInput-position" placeholder="Посада">
        <input type="search" class="searchInput" id="searchInput-city" placeholder="Місто">
        <button type="button" class="searchButton" id="searchButton">Знайти вакансію</button>
    </form>
</div>
<div class="left-side">
    <?php if (count($vacancyList) === 0) : ?>
    <h2>Вакансій по вашему запиту не знайдено</h2>
    <?php endif; ?>
    <?php if (count($vacancyList) === 1) : ?>
        <?php
        $vacancy = $vacancyList[0];
        ?>
    <div class="vacancyList">
        <a href="/vacancy/index">&larr; Назад</a>
        <h2><?php echo $vacancy['title']; ?></h2>
        <br>
        <p>&#128176;<?php echo $vacancy['salary'] . 'грн.'; ?></p>
        <br>
        <p>&#127757;<?php echo $vacancy['location']; ?></p>
        <br>
        <h3>Опис вакансії</h3>
        <br>
        <p><?php echo $vacancy['description'] ?></p>
        <br>
        <?php if($Role === 'applicant') :?>
            <a href="/applications/add/<?php echo $vacancy['vacancy_id']; ?>">
            <button type="button" class="searchButton" id="searchButton">Відгукнутися</button>
            </a>
        <?php endif; ?>
    </div>
    <?php else : ?>
    <body>
    <div class="news-container">
        <?php foreach ($vacancyList as $vacancyOne): ?>
        <a href="/vacancy/index/<?php echo $vacancyOne['vacancy_id']; ?>" class="news-item">
            <div>
                <h2><?php echo $vacancyOne['title']; ?></h2>
                <br>
                <p><?php echo $vacancyOne['salary'] . 'грн.'; ?></p>
                <br>
                <p><?php echo $vacancyOne['location']; ?></p>
                <br>
                <h3>Опис вакансії</h3>
                <br>
                <p><?php echo substr($vacancyOne['description'], 0, 150) . (strlen($vacancyOne['description']) > 100 ? '...' : ''); ?></p>
                <br>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
    </body>
    <?php endif; ?>

</div>
<div class="right-side" style="display: none">
    <h2>Розширений фільтр</h2>
    <form method="POST" action="" id="filterForm">
        <br>
        <label class="title" for="salary">Заробітна плата</label>
        <br>Від-До
        <input class="salary" type="text" id="salaryFrom" name="salaryFrom">
        -
        <input class="salary" type="text" id="salaryTo" name="salaryTo">
        <br><br><br><br><br>

        <label class="title" for="type-time">Вид зайнятості</label>
        <br><br>
        <label for="full-time">Повна зайнятість:</label>
        <input type="checkbox" id="full-time" name="employment" value="full-time">
        <br>
        <label for="part-time">Неповна зайнятість:</label>
        <input type="checkbox" id="part-time" name="employment" value="part-time">
    </form>
</div>


<script>

</script>
</body>
<style>
    .top-side{
        background: #2c3e50;
        margin-top: 0;
    }
    .left-side {
        width: 100%;
        float: left;
    }

    .right-side {
        width: 20%;
        float: right;
    }
    .title{
        font-size: 1.5em;
    }
    .salary{
        width: 0;
    }

    .vacancyList{
        background: #ffffff;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 8px;
        gap: 20px;
        margin: 10px 20px 10px 20px;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }
</style>
