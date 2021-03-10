<?php 
$mvc = new MvcController();
?>
    <html>
    <div class="container col-8 secdiv">
        <h1>Afiliar Persona</h1>
        <form action="" method="POST">
            <div class="mb-3">
            <input type="hidden" value="<?php echo $_GET['persona']?>" name="persona" id="persona">
            <label class="col-form-label">Elige un cargo</label>
            <select name="jerarquia" id="jerarquia" class="form-control cimp">
                <?php $mvc -> muestraJerarquia();?>
            </select>
            </div>
            <div class="mb-3">
            <label class="col-form-label">Elige una sección</label>
            <select name="seccion" id="seccion" class="form-control cimp">
                <?php $mvc -> muestraSeccion();?>
            </select>
            </div>
            <div class="mb-3">
            <label class="col-form-label">Ingresa el folio</label>
            <input type="text" id="folio" name="folio" class="form-control cimp">
            </div>
            <div class="mb-3">
            <label class="col-form-label">Ingresa la clave de elector</label>
            <input type="text" name="clave_e" id="clave_e" class="form-control cimp">
            </div>
            <div class="mb-3">
            <label class="col-form-label">Ingresa el folio del ine</label>
            <input type="text" name="folio_ine" id="folio_ine" class="form-control cimp">
            </div>
            <div class="mb-3">
            <label class="col-form-label">Ingresa el distrito electoral</label>
            <input type="text" name="distrito" id="distrito" class="form-control cimp"></div>
            <input type="submit" value="Afiliar" class="btn btn-info benv">
        </form><br>
        <?php $mvc->registroMiembroController() ?>
    </div>
    </html>