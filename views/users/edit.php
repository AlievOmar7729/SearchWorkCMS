<?php
/** @var string $error_message Повідомленя про помилку */
$this->Title = "Редагування даних";


$user = core\Core::get()->session->get('user');
if(empty($userInfo))
    $userInfo = [];
if(isset($user)){
    $Role = $user['role'];
}else{
    $Role = "noLogged";
}
?>

<head>
    <link href="../../style/FormStyle.css" rel="stylesheet">
</head>




<?php if ($Role === 'admin') : ?>
    <div class="authorizationDiv">
        <h1>Редагування даних</h1>
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
                        value="<?=$userInfo['username']?>"
                        id="title"
                        autocomplete="username"
                        name="username"
                        onchange="this.setAttribute('value',this.value)"
                >
                <span class="input-placeholder">Нікнейм</span>
            </label>

            <label class="input-wrapper">
                <input
                        class="input"
                        type="email"
                        value="<?=$userInfo['email']?>"
                        id="email"
                        autocomplete="username"
                        name="email"
                        onchange="this.setAttribute('value',this.value)"
                >
                <span class="input-placeholder">Пошта</span>
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
<?php endif; ?>

<?php if ($Role === 'applicant') : ?>
    <div class="authorizationDiv">
        <h1>Редагування даних</h1>
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
                        value="<?=$userInfo['name']?>"
                        id="name"
                        autocomplete="username"
                        name="name"
                        onchange="this.setAttribute('value',this.value)"
                >
                <span class="input-placeholder">Ім`я</span>
            </label>
            <label class="input-wrapper">
                <input
                        class="input"
                        type="text"
                        value="<?=$userInfo['surname']?>"
                        id="surname"
                        autocomplete="username"
                        name="surname"
                        onchange="this.setAttribute('value',this.value)"
                >
                <span class="input-placeholder">Прізвище</span>
            </label>

            <label class="input-wrapper">
                <input
                        class="input"
                        type="email"
                        value="<?=$userInfo['email']?>"
                        id="email"
                        autocomplete="username"
                        name="email"
                        onchange="this.setAttribute('value',this.value)"
                >
                <span class="input-placeholder">Пошта</span>
            </label>

            <label class="input-wrapper">
                <input
                        class="input"
                        type="text"
                        value="<?=$userInfo['phone']?>"
                        id="phone"
                        autocomplete="username"
                        name="phone"
                        onchange="this.setAttribute('value',this.value)"
                >
                <span class="input-placeholder">Номер телефону</span>
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
<?php endif; ?>

<?php if ($Role === 'employer') : ?>
    <div class="authorizationDiv">
        <h1>Редагування даних</h1>
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
                        value="<?=$userInfo['name_company']?>"
                        id="name_company"
                        autocomplete="username"
                        name="name_company"
                        onchange="this.setAttribute('value',this.value)"
                >
                <span class="input-placeholder">Назва компанії</span>
            </label>
            <label class="input-wrapper">
                <input
                        class="input"
                        type="email"
                        value="<?=$userInfo['email']?>"
                        id="email"
                        autocomplete="username"
                        name="email"
                        onchange="this.setAttribute('value',this.value)"
                >
                <span class="input-placeholder">Пошта</span>
            </label>
            <label class="input-wrapper">
                <input
                        class="input"
                        type="text"
                        value="<?=$userInfo['phone']?>"
                        id="phone"
                        autocomplete="username"
                        name="phone"
                        onchange="this.setAttribute('value',this.value)"
                >
                <span class="input-placeholder">Номер телефону</span>
            </label>
            <label class="input-wrapper">
            <textarea
                    class="input"
                    type="text"
                    value="."
                    id="about_company"
                    autocomplete="username"
                    name="about_company"
                    rows="5"
                    onchange="this.setAttribute('value',this.value)"
            ><?=$userInfo['about_company']?></textarea>
                <span class="input-placeholder">Про компанію</span>
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
<?php endif; ?>



