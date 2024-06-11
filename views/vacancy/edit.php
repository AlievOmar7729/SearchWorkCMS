<?php
/** @var string $error_message Повідомленя про помилку */
$this->Title = "Редагування вакансії";
if(empty($vacancyEdit))
    $vacancyEdit = [];
?>


<head>
    <link href="../../style/FormStyle.css" rel="stylesheet">
</head>

<div class="authorizationDiv">
    <h1>Редагування вакансії</h1>
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
                    value="<?=$vacancyEdit['title']?>"
                    id="title"
                    name="title"
                    onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Назва вакансії</span>
        </label>

        <label class="input-wrapper">
        <textarea
                class="input"
                type="text"
                value=" "
                id="description"
                name="description"
                rows="5"
                onchange="this.setAttribute('value',this.value)"
        ><?=htmlspecialchars($vacancyEdit['description'])?></textarea>
            <span class="input-placeholder">Опис вакансії</span>
        </label>

        <label class="input-wrapper">
            <span class="select-placeholder">Вид зайнятості</span>
            <select class="select" id="employment" name="employment">
                <option value="full-time">Повна</option>
                <option value="part-time">Неповна</option>
            </select>

        </label>

        <label class="input-wrapper">
            <input
                    class="input"
                    type="number"
                    value="<?=htmlspecialchars($vacancyEdit['salary'])?>"
                    id="salary"
                    name="salary"
                    onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Заробітна плата</span>
        </label>

        <label class="input-wrapper">
            <input
                    class="input"
                    type="text"
                    value="<?=$vacancyEdit['location']?>"
                    id="location"
                    name="location"
                    onchange="this.setAttribute('value',this.value)"
            >
            <span class="input-placeholder">Місто</span>
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

