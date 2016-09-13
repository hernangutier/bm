<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\sidenav\SideNav;


AppAsset::register($this);

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Bienes Muebles',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/sdb-categorias-general/index']],
            ['label' => 'Contact', 'url' => ['/sdb-categorias-sub/index']],
            Yii::$app->user->isGuest ?
                ['label' => 'Iniciar Sesión', 'url' => ['/site/login']] :
                [
                    'label' => 'Salir de la Sesión (' . Yii::$app->user->identity->name . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    
     <div class="row">
      <div class="col-lg-3">    
      <!-- Menu Inicial del Sistema -->  
                         <?=
                       //---------- Sidebar Menu -----------
                       SideNav::widget([
                       'type' => SideNav::TYPE_PRIMARY,
                       'heading' => 'Modulo: Reportes',
                       'items' => [
        
                 ['label' => 'Listados', 'url'=> ['report/listreportes'],
                 'icon' => 'glyphicon glyphicon-folder-open',
                   
                ],
                //------------------- Proveedores y Dependencias --------------
                ['label' => 'Proveedores, Dependencias, Responsables ...', 'url'=> '#',
                 'icon' => 'glyphicon glyphicon-folder-open',
                    'items'=>[
                        ['label' => 'Maestro de Proveedores', 'url'=> ['/proveedores/index']],
                        ['label' => 'Maestro de Unidades Admin.', 'url'=> ['/unidades-admin/index']],
                        ['label' => 'Maestro de Responsables', 'url'=> ['/responsables/index']],
                        

                    ],
                ],
                ['label' => 'Catalogos SUDEBIP', 'url'=> '#',
                'icon' => 'glyphicon glyphicon-globe',
                    'items'=>[
                        ['label' => 'Lugares sedes y unidadades admin.', 'url'=> '#',
                        'items'=>[
                            ['label' => 'Paises', 'url'=> ['/sdb-paises/index']],
                            ['label' => 'Estados', 'url'=> ['/sdb-estados/index']],
                            ['label' => 'Municipios', 'url'=> ['/sdb-municipios/index']],
                            ['label' => 'Ciudades', 'url'=> ['/sdb-ciudades/index']],
                            ['label' => 'Parroquias', 'url'=> ['/sdb-parroquias/index']],
                            ['label' => 'Categoria de Unidades Administrativas', 'url'=> ['/sdb-cat-unidades-admin/index']],
                            ['label' => 'Tipos de Lugares de Ubicación (Anexo P)', 'url'=> ['/sdb-sedes-tipos/index']],
                        ],
                        ],
                        //------- Sub-Catalogo de Bienes ---
                        ['label' => 'Catalogos de Bienes', 'url'=> '#',
                            'items'=>[
                        


                                        ['label' => 'Catalogo General', 'url'=> ['/sdb-categorias-general/index']],
                                        ['label' => 'Catalogo Sub-Categorias', 'url'=> ['/sdb-categorias-sub/index']],
                                        ['label' => 'Catalogo Especificos', 'url'=> ['/sdb-categorias-esp/index']],
                            ],

                         
                        ],


                    ],
                ],
        ],        
                   
]);
?>
       
      </div>
    

            <div class="col-lg-9">    

        <?= $content ?>

 
      </div>  
    </div>
</div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Procuraduria General del Estado Barinas <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


