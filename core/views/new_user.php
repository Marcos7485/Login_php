<div class="container hide">

    <div class="row">
        <div class="col">
            <div class="text-center">
                <div class="col box fade_in_effect">
                    <div>
                        <h1 id="title">Register</h1>
                    </div>
                    <form action="?a=add_user" method="post">
                        <!-- name -->
                        <div class="my-3">
                            <label>Name</label>
                            <input type="text" name="text_nome_completo" placeholder="Name" class="form-control" required>
                        </div>
                        <!-- email -->
                        <div class="my-3">
                            <label>Email</label>
                            <input type="email" name="text_email" placeholder="Email" class="form-control" required>
                        </div>
                        <!-- senha_1 -->
                        <div class="my-3">
                            <label>Password</label>
                            <input type="password" name="text_senha_1" placeholder="Password" class="form-control" minlength="6" required>
                        </div>
                        <!-- senha_2 -->
                        <div class="my-3">
                            <label>Repeat password</label>
                            <input type="password" name="text_senha_2" placeholder="Repeat password" class="form-control" required>
                        </div>
                        <div>
                            <input type="submit" value="Register" class="button" style="--color: #6eff3e;">
                            <a class="button" href="?a=system_start" style="--color: #6eff3e;">
                                Back
                            </a>
                        </div>
                    </form>
                    <?php if (isset($_SESSION['erro'])) : ?>
                        <div class='row'>
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


<!--CELULAR-->

<div class="container show">

    <div class="row">
        <div class="col">
            <div class="text-center">
                <div class="col box_2 fade_in_effect">
                    <div>
                        <h1 id="title" style="text-shadow: 0px 2px 2px white">Register</h1>
                    </div>
                    <form action="?a=add_user" method="post">
                        <!-- name -->
                        <div class="my-3">
                            <label>Name</label>
                            <input type="text" name="text_nome_completo" placeholder="Name" class="form-control" required>
                        </div>
                        <!-- email -->
                        <div class="my-3">
                            <label>Email</label>
                            <input type="email" name="text_email" placeholder="Email" class="form-control" required>
                        </div>
                        <!-- senha_1 -->
                        <div class="my-3">
                            <label>Password</label>
                            <input type="password" name="text_senha_1" placeholder="Password" class="form-control" minlength="6" required>
                        </div>
                        <!-- senha_2 -->
                        <div class="my-3">
                            <label>Repeat password</label>
                            <input type="password" name="text_senha_2" placeholder="Repeat password" class="form-control" required>
                        </div>
                        <div>
                            <input type="submit" value="Register" class="button" style="--color: #6eff3e;">
                            <a class="button" href="?a=system_start" style="--color: #6eff3e;">
                                Back
                            </a>
                        </div>
                    </form>
                    <?php if (isset($_SESSION['erro'])) : ?>
                        <div class='row'>
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

    - Este código HTML crea dos formularios de registro con diseño responsivo, uno para pantallas grandes y otro para pantallas pequeñas, y maneja mensajes de error si los usuarios ingresan información incorrecta.
 -->