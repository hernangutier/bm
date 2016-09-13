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
                       'heading' => ' Movimientos',
                       'items' => [
        
        [
            'label' => 'Asignasiones',
            //'icon' => 'glyphicon glyphicon-folder-open',
            'url' => ['movimientos/asignaciones'],
        ],    
            
        [
            'label' => 'Traslados',
            //'icon' => 'glyphicon glyphicon-arrow-down',
            'url' => ['bienes/index'],
        ],  
        //-------- Oficios 
        [
            'label' => 'Desvinculaciones',
            //'icon' => 'glyphicon glyphicon-arrow-up',
            
        ],
        //-------- Oficios 
        [
            'label' => 'Movimientos',
            //'icon' => 'glyphicon glyphicon-retweet',
            //'url' => ['site/indexmovimientos'],
             
        ], 
        //-------- Oficios 
        [
            'label' => 'Inventarios y Periodos',
            //'icon' => 'glyphicon glyphicon-tasks',
            
        ],
        //-------- Oficios glyphicon 
        [
            'label' => 'Consultas',
            //'icon' => 'glyphicon glyphicon-search',
            
        ],    
        [
            'label' => 'Reportes',
            //'icon' => 'glyphicon glyphicon-list-alt',
            'url' => ['site/indexreportes'],
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
