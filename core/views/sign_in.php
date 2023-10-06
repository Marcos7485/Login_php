<div class="container hide">
    <div class="row">
        <div class="col">
            <div class="text-center">
                <div class="col box  fade_in_effect">
                    <div>
                        <h1 id="title">Sign In</h1>
                    </div>
                    <form action="?a=login_submit" method="post">

                        <div class="my-3">
                            <label>E-mail</label>
                            <input type="email" name="text_usuario" placeholder="E-mail" required class="form-control">
                        </div>

                        <div class="my-3">
                            <label>Password:</label>
                            <input type="password" name="text_senha" placeholder="Password" required class="form-control">
                        </div>
                        <div>
                            <input type="submit" value="Login" class="button" style="--color: #6eff3e;">
                            <a class="button" href="?a=system_start" style="--color: #6eff3e;">
                                Back
                            </a>
                        </div>
                    </form>
                    <?php if (isset($_SESSION['erro'])) : ?>
                        <div class="col">
                            <div class="alert alert-danger text-center p-2">
                                <?= $_SESSION['erro'] ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container show">
    <div class="row hide">
        <div class="col">
            <div class="text-center">
                <div class="col box_2 fade_in_effect" style="padding-top: 30%;">
                    <div>
                        <h1 id="title">Sign In cel</h1>
                    </div>
                    <form action="?a=login_submit" method="post">

                        <div class="my-3">
                            <input type="email" name="text_usuario" placeholder="E-mail" required class="form-control">
                        </div>

                        <div class="my-3">
                            <input type="password" name="text_senha" placeholder="Password" required class="form-control">
                        </div>
                        <div>
                            <input type="submit" value="Login" class="button" style="--color: #6eff3e;">
                            <a class="button" href="?a=system_start" style="--color: #6eff3e;">
                                Back
                            </a>
                        </div>
                    </form>
                    <?php if (isset($_SESSION['erro'])) : ?>
                        <div class="col">
                            <div class="alert alert-danger text-center p-2">
                                <?= $_SESSION['erro'] ?>
                                <?php unset($_SESSION['erro']) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- 

Funcionalidad:

- Esta página proporciona un formulario de inicio de sesión que se adapta a pantallas de computadoras, dispositivos móviles y muestra mensajes de error si el inicio de sesión es incorrecto.

 -->
