<?php
$this->Title = "Особистий кабінет";

$user = core\Core::get()->session->get('user');
if(empty($userInfo))
    $userInfo = [];
if(isset($user)){
    $Role = $user['role'];
}else{
    $Role = "noLogged";
}
?>
<head>
    <link href="../../style/news.css" rel="stylesheet">
</head>


<?php if ($Role === 'admin') : ?>
    <div class="news-container">
        <a href="/users/edit" class="news-item">
            <div>
                <h2>Редагувати данні &#x270F;</h2>
            </div>
        </a>
    </div>
    <div class="news-container">
        <a href="/news/add" class="news-item">
            <div>
                <h2>Додати новину &#x1F4DD;</h2>
            </div>
        </a>
    </div>
    <div class="news-container">
        <a href="/users/logout" class="news-item">
            <div>
                <h2>Вийти з акаунту &#x1F6AA;</h2>
            </div>
        </a>
    </div>
<?php endif; ?>

<?php if ($Role === 'applicant') : ?>
    <div class="news-container">
        <a href="/users/edit" class="news-item">
            <div>
                <h2>Редагувати данні &#x270F;</h2>
            </div>
        </a>
    </div>
    <div class="news-container">
        <a href="/resume/add" class="news-item">
            <div>
                <h2>Розмістити резюме &#x1F4DD;</h2>
            </div>
        </a>
    </div>
    <div class="news-container">
        <a href="/applications/my" class="news-item">
            <div>
                <h2>Мої заявки &#x1F468;</h2>
            </div>
        </a>
    </div>
    <div class="news-container">
        <a href="/users/logout" class="news-item">
            <div>
                <h2>Вийти з акаунту &#x1F6AA;</h2>
            </div>
        </a>
    </div>
<?php endif; ?>

<?php if ($Role === 'employer') : ?>
    <div class="news-container">
        <a href="/users/edit" class="news-item">
            <div>
                <h2>Редагувати данні &#x270F;</h2>
            </div>
        </a>
    </div>
    <div class="news-container">
        <a href="/resume/add" class="news-item">
            <div>
                <h2>Розмістити вакансію &#x1F4DD;</h2>
            </div>
        </a>
    </div>

    <div class="news-container">
        <a href="/resume/add" class="news-item">
            <div>
                <h2>Подані резюме &#x1F4E5; </h2>
            </div>
        </a>
    </div>

    <div class="news-container">
        <a href="/users/logout" class="news-item">
            <div>
                <h2>Вийти з акаунту &#x1F6AA;</h2>
            </div>
        </a>
    </div>
<?php endif; ?>







