<?php
$this->Title = "Список вакансій";
?>


<body>
<div class="top-side">
    <form class="SearchForm" role="search" id="searchForm">
        <input type="search" class="searchInput" id="searchInput-position" placeholder="Посада">
        <input type="search" class="searchInput" id="searchInput-city" placeholder="Місто">
        <button type="button" class="searchButton" id="searchButton">Знайти вакансію</button>
    </form>
</div>
<div class="left-side">
    <!-- Перелік вакансій -->
</div>
<div class="right-side">
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
        width: 80%;
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
        width: 25%;
    }

</style>
