<?php

/* @var $this yii\web\View */

$this->title = 'bm-maestros';
?>


<div class="site-index">
     <div class="col-lg-12">

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>


                <h1 class="text-center">MODULO DE ARCHIVOS MAESTROS</h1>

                <h2 class="lead text-center">Procuraduria General del Estado Barinas</h2>
            <?php if (Yii::$app->user->isGuest) {
               
               echo '<p class="text-center"><a class="btn btn-lg btn-success"
                            href="http://localhost/sads/web/index.php?r=site/login"><span
                            class="glyphicon glyphicon-circle-arrow-right"></span> Iniciar Session</a></p>';
               
                        
              }; 
            ?>       
         </div>       
  
</div>
