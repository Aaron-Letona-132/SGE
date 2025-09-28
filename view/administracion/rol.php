<?php 
    require_once("../../library/widgets/header.php");
?>

    <!--========== CONTENTS ==========-->
            <div class = "contenido_div">
                <div class = "margen_contenido">

                    <div class = "titulo_contenido">
                        <a><i class='bx bxs-user'></i>Mantenimiento Rol</a>
                    </div>
                    <!--AQUI VA EL TABLE Y LO DEMAS-->
                    <div id="divListadoRoles"></div>

                </div>
            </div>
        </section>
    </main>

    <?php include ("../../modal/rolModal.php")?>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../assets/js_sge/rol.js"></script>
    <script>
        $(document).ready(function(){
            cargarListadoRoles();
        });
    </script>

<?php 
    require_once("../../library/widgets/footer.php");
?>