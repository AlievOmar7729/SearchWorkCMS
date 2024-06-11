<?php
/** @var string $error_message Повідомленя про помилку */
$this->Title = "Новини";
$user = core\Core::get()->session->get('user');
if(isset($user)){
    $Role = $user['role'];
}else{
    $Role = "noLogged";
}
if(empty($newsList))
    $newsList = [];
?>
<head>
    <link href="../../style/news.css" rel="stylesheet">
</head>

<?php if (count($newsList) === 1) : ?>
<?php
$news = $newsList[0];
?>
<div class="vacancyList">
    <a href="/news/index">&larr; Назад</a>
    <br>
    <h2><?php echo $news['title']; ?></h2>
    <br>
    <?php if (!empty($news['photourl'])): ?>
        <?php echo $news['photourl']; ?>

    <?php endif; ?>
    <br>
    <?php echo $news['news']?>
    <br><br>
    <p class="date">Дата публікації: <?php echo $news['date_create']; ?></p>

    <?php if($Role === 'admin') :?>
        <br><br><br>
        <a href="<?="/news/edit/{$news['news_id']}"?>" style="margin: 25px">Редагувати &#9999;</a>

        <a href="<?="/news/delete/{$news['news_id']}"?>" style="margin: 100px">Видалити &#10060;</a>
    <?php endif; ?>
</div>
<?php else : ?>
<body>
<?php if(empty($newsList)) :?>
<h1>Новин немає</h1>
<?php endif; ?>
<div class="news-container">
    <?php foreach ($newsList as $news): ?>
        <a href="/news/index/<?php echo $news['news_id']; ?>" class="news-item">
            <div>
                <?php if (!empty($news['photourl'])): ?>
                    <?php echo $news['photourl']; ?>
                <?php endif; ?>
                <h2><?php echo $news['title']; ?></h2>
                <p><?php echo mb_substr($news['news'], 0, 100, 'UTF-8') . (mb_strlen($news['news'], 'UTF-8') > 100 ? ' ...' : ''); ?></p>
                <p class="date">Дата публікації: <?php echo $news['date_create']; ?></p>
            </div>
        </a>
    <?php endforeach; ?>
</div>
</body>
<?php endif; ?>

<style>
    img {
        max-width: 100%;
        height: auto;
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
