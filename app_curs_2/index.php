<?php 
  require 'includes/header.php';
  require 'utils/functions.php';

  $cursuri = get_courses('cursuri.json');
?>
    <div class="jumbotron">
        <div class="container">
            <h1>Curs Drupal</h1>

            <p>
              <?php
                echo ucwords("avem ") . rand(1, 30) . ucwords(" studenti!");
              ?>
          </p>

            <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
          <?php foreach ($cursuri as $curs) { ?>
            <div class="col-lg-4">
                <h2><?php echo $curs['nume'] ?></h2>

                <p><?php echo $curs['descriere'] ?></p>
              
                <p>
                   <strong><?php echo count($curs['profesori']) > 1 ? 'Profesori' : 'Profesor' ?>:</strong>
                   <?php echo implode(', ', $curs['profesori']) ?>.
                </p>
              </p>

                <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
            </div>
          <?php } ?>
        </div>

        <hr>
    </div>
<?php require 'includes/footer.php'?>
    <!-- /container -->
