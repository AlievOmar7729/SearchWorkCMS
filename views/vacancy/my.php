<?php

$this->Title = "Мої вакансії";
$user = core\Core::get()->session->get('user');
if (isset($user)) {
    $Role = $user['role'];
} else {
    $Role = "noLogged";
}

if (empty($myVacancy))
    $myVacancy = [];
if (empty($applications))
    $applications = [];


?>

<head>
    <link href="../../style/news.css" rel="stylesheet">
</head>


<?php if (count($myVacancy) === 1) : ?>
    <?php
    $vacancy = $myVacancy[0][0];
    ?>
    <div class="vacancyList">
        <a href="/vacancy/my">&larr; Назад</a>
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

        <?php if ($Role === 'employer') : ?>
            <br><br><br>
            <a href="<?= "/vacancy/edit/{$vacancy['vacancy_id']}" ?>" style="margin: 25px">Редагувати &#9999;</a>
            <a href="<?= "/vacancy/delete/{$vacancy['vacancy_id']}" ?>" style="margin: 100px">Видалити &#10060;</a>
        <?php endif; ?>
    </div>
    <?php if ($Role === 'employer') : ?>
        <p style="font-size: 24px">Усі відгуки до вакансії</p>
        <div class="news-container">

        </div>

        <div class="news-container">
    <?php endif; ?>
    <?php foreach ($applications as $resumeOne): ?>

            <div class="markerDiv">
                <div class="vacancyList">
                    <h1>Особиста інформація</h1>
                    <br>
                    <h2>Ім`я</h2>
                    <p><?php echo $resumeOne['name']; ?></p>
                    <br>
                    <h2>Пошта</h2>
                    <p><?php echo $resumeOne['email']; ?></p>
                    <br>
                    <h2>Телефон</h2>
                    <p><?php echo $resumeOne['phone']; ?></p>
                </div>
                <div class="vacancyList">
                    <h1>Професійна інформація</h1>
                    <h2>Освіта:</h2>
                    <br>
                    <p><?php echo $resumeOne['education']; ?></p>
                    <br>
                    <h2>Досвід роботи:</h2>
                    <br>
                    <p><?php echo $resumeOne['work_experience']; ?></p>
                    <br>
                    <h2>Навички:</h2>
                    <br>
                    <p><?php echo $resumeOne['skills']; ?></p>
                    <br>
                    <h2>Особисті якості:</h2>
                    <br>
                    <p><?php echo $resumeOne['personal_qualities']; ?></p>
                    <br>
                    <h2>Про мене:</h2>
                    <br>
                    <p><?php echo $resumeOne['about_me']; ?></p>
                    <br>
                </div>

            </div>
    <?php endforeach; ?>
    </div>
<?php else : ?>
    <body>
    <div class="news-container">
        <?php foreach ($myVacancy as $vacancyOne): ?>
            <a href="/vacancy/my/<?php echo $vacancyOne['vacancy_id']; ?>" class="news-item">
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
<style>
    .vacancyList {
        background: #ffffff;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 8px;
        gap: 20px;
        margin: 10px 20px 10px 20px;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        overflow: auto;
    }
    .markerDiv{
        border: 2px solid #E67E22;
    }
</style>





