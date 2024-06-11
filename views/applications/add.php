<?php

$this->Title = "Оберіть резюме";
$user = core\Core::get()->session->get('user');
if (isset($user)) {
    $Role = $user['role'];
} else {
    $Role = "noLogged";
}

if (empty($myResume))
    $myResume = [];

?>

<head>
    <link href="../../style/news.css" rel="stylesheet">
</head>


<body>
<h1>Оберіть резюме для відправки відгуку</h1>
<br>
<div class="news-container">
    <?php foreach ($myResume as $resumeOne): ?>

        <a href="" class="news-item" data-resume-id="<?php echo $resumeOne['resume_id']; ?>">
            <div>
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
                <p><?php echo substr($resumeOne['about_me'], 0, 150) . (strlen($resumeOne['about_me']) > 100 ? '...' : ''); ?></p>
                <br>
            </div>
        </a>
    <?php endforeach; ?>
</div>
</body>

<style>
    .vacancyList {
        background: #ffffff;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 8px;
        gap: 20px;
        margin: 10px 20px 10px 20px;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }
    .news-item{
        border: 2px solid #E67E22;
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let newsItems = document.querySelectorAll('.news-item');
        newsItems.forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.preventDefault(); // Отменяем стандартное поведение ссылки
                let resumeId = this.getAttribute('data-resume-id');
                let currentURL = window.location.href;
                let newURL = currentURL + '/' + resumeId;
                window.location.href = newURL;
            });
        });
    });
</script>



