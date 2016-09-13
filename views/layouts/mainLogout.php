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
                ['label' => 'Inisiar Sesion', 'url' => ['/site/login']] :
                [
                    'label' => 'Salir de la Sesion (' . Yii::$app->user->identity->username . ')',
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
                       'heading' => ' Modulos del Sistema',
                       'items' => [
        
        [
            'label' => 'Archivos Maestros',
            'icon' => 'glyphicon glyphicon-folder-open',
            'items' => [
               
                ['label' => 'Bienes', 'url'=> '#',
                    'items'=>[
                        ['label' => 'Maestro de Bienes Activos', 'url'=> ['/bienes/index']],
                        ['label' => 'Maestro de Bienes de Uso Activos', 'url'=> ['/bienes/indexuso']],
                        ['label' => 'Maestro de Lineas', 'url'=> ['/lineas/index']],
                        ['label' => 'Maestro de Clasificaciones', 'url'=> ['/clasificacion/index']],

                    ],
                ],
                ['label' => 'Catalogos SUDEBIP', 'url'=> '#',
                    'items'=>[
                        


                        ['label' => 'Paises', 'url'=> ['/sdb-paises/index']],
                        ['label' => 'Estados', 'url'=> ['/sdb-estados/index']],
                        ['label' => 'Municipios', 'url'=> ['/sdb-municipios/index']],
                        ['label' => 'Ciudades', 'url'=> ['/sdb-ciudades/index']],
                        ['label' => 'Parroquias', 'url'=> ['/clasificacion/index']],
                        ['label' => 'Maestro de Clasificaciones', 'url'=> ['/clasificacion/index']],

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
        ],
        //-------- Oficios 
        [
            'label' => 'Incorporaciones',
            'icon' => 'glyphicon glyphicon-arrow-down',
            'items' => [
                ['label' => 'Consultar Host  por Emac', 'url'=> ['/emac/consulta']],
                ['label' => 'Listar Host por Dispositivo', 'url'=> ['/registro-fallas/index']],
            ],
        ],  
        //-------- Oficios 
        [
            'label' => 'Desincorporaciones',
            'icon' => 'glyphicon glyphicon-arrow-up',
            'items' => [
                ['label' => 'Consultar Host  por Emac', 'url'=> ['/emac/consulta']],
                ['label' => 'Listar Host por Dispositivo', 'url'=> ['/registro-fallas/index']],
            ],
        ],
        //-------- Oficios 
        [
            'label' => 'Movimientos',
            'icon' => 'glyphicon glyphicon-retweet',
            'items' => [
                ['label' => 'Consultar Host  por Emac', 'url'=> ['/emac/consulta']],
                ['label' => 'Listar Host por Dispositivo', 'url'=> ['/registro-fallas/index']],
            ],
        ], 
        //-------- Oficios 
        [
            'label' => 'Inventarios y Periodos',
            'icon' => 'glyphicon glyphicon-tasks',
            'items' => [
                ['label' => 'Consultar Host  por Emac', 'url'=> ['/emac/consulta']],
                ['label' => 'Listar Host por Dispositivo', 'url'=> ['/registro-fallas/index']],
            ],
        ],
        //-------- Oficios glyphicon 
        [
            'label' => 'Consultas',
            'icon' => 'glyphicon glyphicon-search',
            'items' => [
                ['label' => 'Consulta Rapida de Bienes', 'url'=> ['/bienes/consultarapida']],
                ['label' => 'Listar Host por Dispositivo', 'url'=> ['/registro-fallas/index']],
            ],
        ],    
        [
            'label' => 'Reportes',
            'icon' => 'glyphicon glyphicon-list-alt',
            'items' => [
                ['label' => 'Consultar Host  por Emac', 'url'=> ['/emac/consulta']],
                ['label' => 'Listar Host por Dispositivo', 'url'=> ['/registro-fallas/index']],
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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
