<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kultprosvet test</title>
</head>
<body>

    <div>
        <form id = "form">
            <input id = "name" type = "text" minlength="2" placeholder="Ваше имя" name = "name" required>
            <input id = "s_name" type = "text" placeholder="Ваша фамилия" name = "s_name" required>
            <input id = "email" type = "text" placeholder="email" name = "email" required>
            <select id = "ticket" required name = "ticket">
                <option>free</option>
                <option>standart</option>
                <option>premium</option>
            </select>
            <img alt="" id="captcha" src="captcha.php" />
            <span onclick="document.getElementById('captcha').src=document.getElementById( 'captcha').src + '?' + Math.random();">обновить код</span>
            <input id="captchainput" type="text" autocomplete="off" minlength="6" required name="captcha" value="" placeholder="Введите код с картинки" />
            <input id = "submit" type = "submit">
        </form>

        <div id = "errors"></div>
        <?php echo $_SESSION['capture']; ?>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src = "script.js"></script>
</body>


