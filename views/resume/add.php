<?php

/** @var string $error_message Повідомленя про помилку */
$this->Title = "Додати Резюме";
?>

<head>
    <link href="../../style/FormStyle.css" rel="stylesheet">
</head>


<?php

/** @var string $error_message Повідомленя про помилку */
$this->Title = "Додати вакансію";
?>


<head>
    <link href="../../style/FormStyle.css" rel="stylesheet">
</head>

<div class="authorizationDiv">
    <h1>Додавання резюме</h1>
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
                value=""
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
                value=""
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
                value=""
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
                value=""
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
            ></textarea>
            <span class="input-placeholder">Про себе</span>

        </label>






        <button type="submit" class="loginButton">Додати резюме</button>
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
    select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        appearance: none;
        -webkit-appearance: none;
        background-color: #fff;

        background-repeat: no-repeat;
        background-position: right 10px center;
    }
</style>