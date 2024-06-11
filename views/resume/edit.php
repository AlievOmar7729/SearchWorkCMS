<?php
/** @var string $error_message Повідомленя про помилку */
$this->Title = "Редагування резюме";
if(empty($resumeEdit))
    $resumeEdit = [];
?>

<head>
    <link href="../../style/FormStyle.css" rel="stylesheet">
</head>


<div class="authorizationDiv">
    <h1>Редагування резюме</h1>
    <?php if (!empty($error_message)) : ?>
        <div class="errorMessage">
            <?= $error_message ?>
        </div>
    <?php endif; ?>


    <div class="indentationDiv"></div>
    <form method="post" action="" class="loginForm">

        <label class="input-wrapper">
            <input
                class="input"
                type="text"
                value="<?=$resumeEdit['education']?>"
                id="education"
                name="education"
                onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Ваша освіта</span>
        </label>

        <label class="input-wrapper">
            <input
                class="input"
                type="text"
                value="<?=$resumeEdit['work_experience']?>"
                id="work_experience"
                name="work_experience"
                onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Досвід роботи</span>
        </label>
        <label class="input-wrapper">
            <input
                class="input"
                type="text"
                value="<?=$resumeEdit['skills']?>"
                id="skills"
                name="skills"
                onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Ваши навички</span>
        </label>
        <label class="input-wrapper">
            <input
                class="input"
                type="text"
                value="<?=$resumeEdit['personal_qualities']?>"
                id="personal_qualities"
                name="personal_qualities"
                onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Особисті якості</span>
        </label>
        <label class="input-wrapper">

            <textarea
                class="input"
                type="text"
                value=" "
                id="about_me"
                name="about_me"
                onchange="this.setAttribute('value',this.value)"
            ><?=$resumeEdit['about_me']?></textarea>
            <span class="input-placeholder">Про себе</span>

        </label>

        <button type="submit" class="loginButton">Зберегти зміни</button>
        <br>
    </form>
</div>
<style>
    label{
        background: linear-gradient(to bottom,#f2f2f2,#ffffff);
    }

    .errorMessage {

        background-color: rgba(255, 0, 0, 0.5);
        color: white;
        padding: 20px;
        border-radius: 10px;
    }
</style>
