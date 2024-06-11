<?php
$this->Title = "Мої подані заявки";
$user = core\Core::get()->session->get('user');

if (isset($user)) {
    $Role = $user['role'];
} else {
    $Role = "noLogged";
}
if (empty($myApplications))
    $myApplications = [];

?>


<head>
    <link href="../../style/news.css" rel="stylesheet">
</head>
<body>
<div class="news-container">
    <?php foreach ($myApplications as $application): ?>

            <div class="applicationsList">
                <h3>Заявку подано на вакансію:</h3>
                <p><?php echo $application['title']; ?></p>
                <br><br>
                <h4>Дата створеня запиту</h4>
                <p><?php echo $application['date_create']; ?></p>
                <br>
                <h4>Дата редагування статусу</h4>
                <p><?php echo $application['date_editing']; ?></p>
                <br>
                <h4>Cтатус</h4>
                <p><?php echo $application['type_application']; ?></p>
                <br>
            </div>
    <?php endforeach; ?>
</div>
</body>
<style>
    .applicationsList{
        background: #ffffff;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 8px;
        gap: 20px;
        margin: 10px 20px 10px 20px;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }
</style>