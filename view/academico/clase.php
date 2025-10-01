<?php 
    require_once("../../library/widgets/header.php");
?>

    <!--========== CONTENTS ==========-->
            <div class = "contenido_div">
                <div class = "margen_contenido">

                    <div class = "titulo_contenido">
                        <a><i class='bx bxs-user'></i>Mantenimiento Clases</a>
                    </div>
                    <!--AQUI VA EL TABLE Y LO DEMAS-->
                    <div id="divListadoClases"></div>

                </div>
            </div>
        </section>
    </main>

    <?php include ("../../modal/claseModal.php")?>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../assets/js_sge/clase.js"></script>
    <script>
        $(document).ready(function(){
            cargarListado();
        });
    </script>

<?php 
    require_once("../../library/widgets/footer.php");
?>