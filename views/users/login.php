<?php
/** @var string $error_message Повідомленя про помилку */
$this->Title = "Вхід на сайт";
?>
<head>
    <link href="../../style/usersLoginStyle.css" rel="stylesheet">

</head>
<div class="authorizationDiv">
    <h1>Вхід на сайт</h1>
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
                    value="<?=$this->controller->post->login?>"
                    id="login"
                    autocomplete="username"
                    name="login"
                    onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Логін</span>
        </label>
        <label class="input-wrapper">
            <input
                    class="input"
                    type="password"
                    value=""
                    id="password"
                    autocomplete="current-password"
                    name="password"
                    onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Пароль</span>
        </label>
        <button type="submit" class="loginButton">Увійти</button>
        <br>
        <a href="/users/register">Немає аккаунту ?</a>
    </form>
</div>
<style>
    .errorMessage {

        background-color: rgba(255, 0, 0, 0.5);
        color: white;
        padding: 20px;
        border-radius: 10px;
    }
</style>
