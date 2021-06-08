<p><?= $params['message'] ?></p>
<?php if ($params['message'] !== "Вы успешно зарегистрированны!") : ?>
    <div class="reg">
        <h2>Регистрация</h2>
        <form action="" method="post">
            <input type="text" name="login" placeholder="login">
            <input type="password" name="pass" placeholder="password">
            <div>
                <span>Save?</span>
                <input type="checkbox" name="save">
            </div>
            <input type="submit" name="reg">
        </form>
    </div>
<? endif; ?>
<a href="/sing_in">Войти</a>