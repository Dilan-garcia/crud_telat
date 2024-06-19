<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<h3 class="my-3">Editar Empleado</h3>

<?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>

<?php } ?>

<form action="<?= base_url('empleados/' . $empleado['id']); ?>" class="row g-3" method="post" autocomplete="off">

    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="empleado_id" value="<?= $empleado['id']; ?>">


    <div class="col-md-5">
        <label for="id_tipo_usuario" class="form-label">Tipo de Usuario</label>
        <select class="form-select" id="id_tipo_usuario" name="id_tipo_usuario" required>
            <option value="">Seleccionar</option>
            <!-- ciclo db usuarios, select tipo de usuario  -->
            <?php foreach ($usuarios as $tipo_usuario) : ?>
                <option value="<?= $tipo_usuario['id']; ?>" <?php echo ($tipo_usuario['id'] == $empleado['id_tipo_usuario']) ? 'selected' : ''; ?>><?= $tipo_usuario['tipo_usuario']; ?></option>

            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-3">
        <label for="clave" class="form-label">Clave</label>
        <input type="text" class="form-control" id="clave" name="clave" maxlength="8" value="<?= $empleado['clave']; ?>" required autofocus>
    </div>

    <div class="col-md-5">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $empleado['nombre']; ?>" required>
    </div>

    <div class="col-md-5">
        <label for="apellidos" class="form-label">apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $empleado['apellidos']; ?>" required>
    </div>

    <div class="col-md-3">
        <label for="sexo" class="form-label">sexo</label>
        <input type="text" class="form-control" id="sexo" name="sexo" value="<?= $empleado['sexo']; ?>" required>
    </div>

    <div class="col-md-5">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $empleado['email']; ?>">
    </div>

    <!-- <div class="col-md-9">
        <label for="email" class="form-label">Direccion:</label>
    </div> -->

    <div class="col-md-4">
        <label for="cp" class="form-label">Codigo Postal</label>
        <input type="text" class="form-control" id="cp" name="cp" value="<?= $empleado['cp']; ?>" required>
    </div>

    <div class="col-md-4">
        <label for="colonia" class="form-label">Colonia</label>
        <input type="text" class="form-control" id="colonia" name="colonia" value="<?= $empleado['colonia']; ?>" required>
    </div>

    <div class="col-md-4">
        <label for="delegacion_municipio" class="form-label">Delegacion Municipio</label>
        <input type="text" class="form-control" id="delegacion_municipio" name="delegacion_municipio" value="<?= $empleado['delegacion_municipio']; ?>" required>
    </div>

    <div class="col-12">
        <a href="<?= base_url('empleados'); ?>" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</form>



<?= $this->endSection(); ?>