<?php
/** @var string $error_message Повідомленя про помилку */
$this->Title = "Редагування новини";
if(empty($newsEdit))
    $newsEdit = [];
?>


<head>
    <link href="../../style/FormStyle.css" rel="stylesheet">
</head>

<div class="authorizationDiv">
    <h1>Редагування новини</h1>
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
                value="<?=htmlspecialchars($newsEdit['title'])?>"
                id="title"
                autocomplete="current-password"
                name="title"
                onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Заголовок</span>
        </label>


        <label class="input-wrapper">
            <textarea
                class="input"
                type="text"
                value="."
                id="news"
                autocomplete="current-password"
                name="news"
                rows="10"
                onchange="this.setAttribute('value',this.value)"
            ><?=htmlspecialchars($newsEdit['news'])?></textarea>
            <span class="input-placeholder">Текст новини</span>
        </label>

        <label class="input-wrapper">
            <input
                class="input"
                type="text"
                value="<?=htmlspecialchars($newsEdit['photourl'])?>"
                id="photourl"
                autocomplete="current-password"
                name="photourl"
                onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Посилання на фотографію для обкладинки</span>
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

