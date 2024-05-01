<?php
use yii\helpers\Html;
?>
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">ATTENDANCE</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <?= Html::a('<i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span>',
            ['/site/index'],
            ['class' => 'nav-link']) ?>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<?php if(Yii::$app->user->identity->hasRole('superadmin')){?>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Config</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Util:</h6>
            <?= Html::a('Usuarios',['/user-management/user/index'],['class' => 'collapse-item']) ?>
            <?= Html::a('Roles',['/user-management/role/index'],['class' => 'collapse-item']) ?>
            <?= Html::a('Permisos',['/user-management/permission/index'],['class' => 'collapse-item']) ?>
            <?= Html::a('Tipo Ciclo',['/tipociclo/index'],['class' => 'collapse-item']) ?>
            <?= Html::a('Ciclos escolares',['/cicloescolar/index'],['class' => 'collapse-item']) ?>
            <?= Html::a('Departamentos',['/departamento/index'],['class' => 'collapse-item']) ?>
            <?= Html::a('Grupos (estudiantes)',['/estudiantesgrupo/index'],['class' => 'collapse-item']) ?>
            <?= Html::a('Grupos',['/grupo/index'],['class' => 'collapse-item']) ?>
            <?= Html::a('Materias',['/materia/index'],['class' => 'collapse-item']) ?>
            <?= Html::a('Carreras',['/carrera/index'],['class' => 'collapse-item']) ?>
            <?= Html::a('Periodos',['/periodo/index'],['class' => 'collapse-item']) ?>
            <?= Html::a('Permisos',['/user-management/permission/index'],['class' => 'collapse-item']) ?>
            <?= Html::a('Personal',['/user-management/permission/index'],['class' => 'collapse-item']) ?>
        </div>
    </div>
</li>
<?php } ?>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->