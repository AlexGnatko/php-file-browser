<div class="content">
    <div class="is-flex is-align-items-center is-justify-content-center" style="min-height: 80vh">
        <div class="has-text-centered">
            <h1>Добро пожаловать!</h1>
            <p>Для начала работы нужно ввести логин и пароль.</p>
            <form method="post" action="." class="has-text-left">
                <input type="hidden" name="post_login" value="1" />
                <div class="field">
                    <label class="label">Логин:</label>
                    <input type="text" name="username" class="input" />
                </div>
                <div class="field">
                    <label class="label">Пароль:</label>
                    <input type="password" name="password" class="input" />
                </div>
                <div class="has-text-right">
                    <button type="submit" class="button is-primary">
                        Войти
                    </button>
                </div>
                <?php
                if ($_POST['post_login']) {
                    ?>
                    <div class="notification is-alert mt-5">
                        Вы ввели неверный логин или пароль.
                    </div>
                <?php
                }
                ?>
            </form>
        </div>
    </div>

</div>

