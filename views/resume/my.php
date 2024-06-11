<?php

$this->Title = "Мої резюме";
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
        <link href="/style/news.css" rel="stylesheet">
    </head>


<?php if (count($myResume) === 1) : ?>
    <?php
    if(!empty($myResume[0][0]))
        $resume = $myResume[0][0];
    else
        $resume = $myResume[0];

    ?>
    <div class="vacancyList">
        <a href="/resume/my">&larr; Назад</a>

        <h2>Освіта:</h2>
        <br>
        <p><?php echo $resume['education']; ?></p>
        <br>
        <h2>Досвід роботи:</h2>
        <br>
        <p><?php echo $resume['work_experience']; ?></p>
        <br>
        <h2>Навички:</h2>
        <br>
        <p><?php echo $resume['skills']; ?></p>
        <br>
        <h2>Особисті якості:</h2>
        <br>
        <p><?php echo $resume['personal_qualities']; ?></p>
        <br>
        <h2>Про мене:</h2>
        <br>
        <p><?php echo $resume['about_me']; ?></p>
        <br>


        <?php if ($Role === 'applicant') : ?>
            <br><br><br>
            <a href="<?= "/resume/edit/{$resume['resume_id']}" ?>" style="margin: 25px">Редагувати &#9999;</a>
            <a href="<?= "/resume/delete/{$resume['resume_id']}" ?>" style="margin: 100px">Видалити &#10060;</a>
        <?php endif; ?>
    </div>
<?php else : ?>
    <body>
    <div class="news-container">
        <?php foreach ($myResume as $resumeOne):?>

            <a href="/resume/my/<?php echo $resumeOne['resume_id']; ?>" class="news-item">
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

