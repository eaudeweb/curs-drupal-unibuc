<?php
  require 'includes/header.php';
  require 'utils/functions.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // adaugam cursul
    $nume = $_POST['curs_nume'];
    $descriere = $_POST['curs_descriere'];
    
    $curs = array(
      'nume' => $nume,
      'descriere' => $descriere,
      'profesori' => array('John Doe')
    );
    
    $cursuri = get_courses('cursuri.json');
    $cursuri[] = $curs;
    
    save_courses($cursuri, 'cursuri.json');
    
    header('Location: /');
    exit();
  } else {
    // nu facem nimic
  }
?>
<div class="jumbotron">
  <div class="container">
    <h1>Add new course!</h1>

    <p>This is our new php page.</p>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2>Add a new course!</h2>
      <form action="" method="POST">
        <div class="form-group">
          <label for="curs_nume" class="control-label">Course name:</label>
          <input class="form-control" name="curs_nume" type="text" />
        </div>
        <div class="form-group">
          <label for="curs_descriere" class="control-label">Course description:</label>
          <textarea class="form-control" name="curs_descriere"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add course</button>
      </form>
    </div>
  </div>
  <hr>
</div>

<?php require 'includes/footer.php'?>