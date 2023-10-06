<div class="container hide">

    <div class="row">
        <div class="col">
            <div class="text-center">
                <div class="col box  fade_in_effect">
                    <div>
                        <table class="table" style="color:black">
                            <thead>
                                <tr>
                                    <td colspan="2">Your Information:</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Nome:
                                    </td>
                                    <td><?= $name ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        E-mail:
                                    </td>
                                    <td><?= $email ?></td>
                                </tr>
                                <tr>
                                    <td>Created at:</td>
                                    <td><?= $date ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <a class="button" onclick="logout()" style="--color: #6eff3e;">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container show">

    <div class="row">
        <div class="col">
            <div class="text-center">
                <div class="col box_2 fade_in_effect">
                    <div>
                        <table class="table box_3" style="color:black; text-shadow: 0px 1px 2px white;">
                            <thead>
                                <tr>
                                    <td colspan="2">Your Information cel:</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Nome:
                                    </td>
                                    <td><?= $name ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        E-mail:
                                    </td>
                                    <td><?= $email ?></td>
                                </tr>
                                <tr>
                                    <td>Created at:</td>
                                    <td><?= $date ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <a class="button" onclick="logout()" style="--color: #6eff3e;">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header gold_text letra" style="background-color: black;">
                <h1 class="modal-title fs-7" id="exampleModalLabel" style="color:brown; font-style: oblique;">Fazer Logout?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: black;">
                <div class="text-center">
                    <img src="src//124173984.jpg" width="150px" style="border-radius: 50%;">
                </div>
            </div>
            <div class="modal-footer" style="background-color: black;">
                <button type="button" class="btn btn-success"><a href="?a=logout" style="text-decoration: none; color:antiquewhite;">Logout</a></button>
                <button type="button" class="btn btn-danger text-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    function logout() {
        console.log("click");
        var modalStatus = new bootstrap.Modal(document.getElementById('logoutModal'));
        modalStatus.show();
    }
</script>



<!-- 
    Funcionalidad:

    - Esta página muestra la información del usuario y proporciona la opción de cerrar sesión. La versión "cel" tiene un diseño ligeramente diferente que se adapta a los telefonos moviles, pero ofrece las mismas funcionalidades.
 -->
