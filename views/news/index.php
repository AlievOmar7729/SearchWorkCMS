<?php
/** @var string $error_message Повідомленя про помилку */
$this->Title = "Новини";
?>

<body>
<?php if(empty($newsList)) :?>
<h1>Новин немає</h1>
<?php endif; ?>
<div class="news-container">
    <?php foreach ($newsList as $news): ?>    <!-- Додати $newsList як ErrorMessage -->
        <a href="/news/index/<?php echo $news['news_id']; ?>" class="news-item">
            <div>
                <?php if (!empty($news['photourl'])): ?>
                    <?php echo $news['photourl']; ?>
                <?php endif; ?>
                <h2><?php echo $news['title']; ?></h2>
                <p><?php echo substr($news['news'], 0, 200) . (strlen($news['news']) > 100 ? '...' : ''); ?></p>
                <p class="date">Дата публикации: <?php echo $news['date_create']; ?></p>
            </div>
        </a>
    <?php endforeach; ?>
</div>

</body>
<style>
    .news-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin: 10px 20px 10px 20px;
    }
    .news-item {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 8px;
    }
    .news-item img {
        max-width: 100%;
        border-radius: 4px;
        margin-bottom: 10px;
    }
    .news-item h2 {
        font-size: 20px;
        margin-bottom: 10px;
    }
    .news-item p {
        font-size: 16px;
        color: #666;
    }
    .news-item .date {
        font-size: 14px;
        color: #999;
    }
    a {
        color: black;
        text-decoration: none;
    }
</style>