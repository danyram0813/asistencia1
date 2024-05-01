<?php use yii\helpers\Html;?>
<!-- Illustrations -->

<div class="row">
    <div class="col-lg-3 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
            </div>
                <div class="card-body">
                    <div class="text-center">
            
                    <?= Html::a('<span class="icon text-white-50">
                                <i class="fas fa-user"></i>
                            </span>Usuarios', ['/user-management/user/index'],
                        ['class' => 'btn btn-primary btn-icon-split']) ?>
                    </div>
                            
                </div>
        </div>
    </div>

    <div class="col-lg-3 mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ciclos</h6>
        </div>
        <div class="card-body">
        <div class="text-center">
            
            <?= Html::a('<span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>Ciclo Escolar', ['/user-management/user/index'],
                ['class' => 'btn btn-primary btn-icon-split']) ?>
        </div>
                            
        </div>
    </div>
    </div>
</div>
            
        
    



 




   
