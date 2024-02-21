<footer class="blockquote-footer fixed-bottom">
    <?php 
    echo "Está usted conectado como " . $_SESSION['usuario']; ?> <br>
    <?php
    echo "Fecha última de conexión: " . $_SESSION['fecha']; ?> <br>
    <?php
    echo "Dirección última de conexión: " . $_SERVER['REMOTE_ADDR'];?> <br>
    Gestión de incidencias de el <a href="https://iesamachado.org" target="_blank">IES Antonio Machado</a>. Desarrollado por Pepe, Antonio Manuel y Juan</footer>
</body>
</html>