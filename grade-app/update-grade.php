<?php
  $title = 'Update grade details';
  require_once 'controllers/update-grade.php';
?>

<!doctype html>
<html>
  <!-- html-head -->
  <?php require 'includes/html-components/html-head.php' ?>

  <body>
    <main class="data-form">
      <form class="container">
        <h6 class="mb-3 text-center"> Edit/Update the grade details below </h6>

        <?php  if ($gradeDetails) { ?>
          <div class="col-lg-12">
            <div class="form mb-2">
              <input type="text" class="form-control" id="grade_letter" 
              value="<?php echo $gradeDetails['grade_letter']; ?>"> 
            </div>

            <div class="form mb-2">
              <input type="text" class="form-control" id="grade_points"
              value="<?php echo $gradeDetails['points'];?>"> 
            </div>
          </div>

        <?php } else { ?>
          <div>
            <h4> No records. </h4>
          </div>
        <?php } ?>

        <div class="text-center mb-3">
          <button class="update-content-button btn btn-primary" type="submit"> Update grade </button>
        </div>     
      </form>
      <div class="text-center">
        <a href="/grade-app" class="go-to-homepage"> 
          Go to Index
        </a>
      </div>
    </main>

    <!-- html-footer pinned-bottom -->
    <?php require 'includes/html-components/footer-pinned-bottom.php' ?>

    <!-- include-js-scripts -->
    <?php require 'includes/html-components/include-scripts.php' ?> 
  </body>
</html>