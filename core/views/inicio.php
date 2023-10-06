<div class="container hide" style="background-color: black;">

    <video width="100%" height="100%" id="jinx" controls autoplay muted>
        <source src="src//jinx.mp4" type="video/mp4">
        <source src="src//jinx.webm" type="video/webm">
        Tu navegador no soporta la etiqueta de video.
    </video>
    
</div>

<div class="container show" style="background-color: black;">
    
    <video width="100%" height="100%" id="jinx" controls autoplay muted>
        <source src="src//jinx_celular.mp4" type="video/mp4">
        <source src="src//jinx_celular.webm" type="video/webm">
        Tu navegador no soporta la etiqueta de video.
    </video>
    
</div>

<script>
    var video = document.getElementById("jinx");
    video.addEventListener('canplaythrough', function() {
        video.play();
    });
    video.addEventListener("ended", function() {
        window.location.href = "?a=system_start";
    });
</script>


<!--
Funcionalidad:

- Este código crea dos contenedores que muestran videos (Uno para movil y otro para computador) y, una vez que el video ha terminado de reproducirse, redirige al usuario a otra página. La redirección ocurre después de que el video ha finalizado.

-->