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





