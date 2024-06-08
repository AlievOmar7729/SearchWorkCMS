<?php
/** @var string $error_message Повідомленя про помилку */
$this->Title = "Реєстрація";


?>
<head>
    <link href="../../style/usersLoginStyle.css" rel="stylesheet">

</head>

<div class="authorizationDiv">
    <h1>Реєстрація</h1>
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
                autocomplete="username"
                id="login"
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
                autocomplete="new-password"
                name="password"
                onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Пароль</span>
        </label>
        <label class="input-wrapper">
            <input
                class="input"
                type="password"
                value=""
                id="password2"
                autocomplete="new-password"
                name="password2"
                onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Пароль (ще раз)</span>
        </label>
        <label class="checkbox-wrapper">
            <input
                    class="checkbox"
                    type="checkbox"
                    id="user_type"
                    name="userType"
                    value="employer"
            >
            <span class="checkbox-label">Реєстрація компанії</span>
        </label>
        <br>
        <button type="submit" class="loginButton">Зареєструвати</button>
        <br>
        <a href="/users/login">Є аккаунт ?</a>
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