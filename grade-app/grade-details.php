<?php
   $title = 'Grade details';
   require_once 'controllers/grade-details.php';
?>

<!doctype html>
<html>
  <!-- html-head -->
  <?php require 'includes/html-components/html-head.php' ?>

  <body>
    <main class="data-form">
      <div class="container text-center">
        <h6 class="mb-3"> <u> Grade details below. </u> </h6>

        <?php  if ($gradeDetails) { ?>
          <div class="col-lg-12">
            <p> Grade Character: <?php echo $gradeDetails['grade_letter']; ?> </p>
            <p> Grade Points: <?php echo $gradeDetails['points'];?> </p>
          </div>

        <?php } else { ?>
          <div>
            <h4> No records. </h4>
          </div>
        <?php } ?>
      </div>
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