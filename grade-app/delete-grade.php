<?php
  $title = 'Delete a Grade';
  require_once 'controllers/delete-grade.php';
?>

<!doctype html>
<html>
  <!-- html-head -->
  <?php require 'includes/html-components/html-head.php' ?>

  <body>
    <main class="main-content">
     <div class="delete-confirmation-details text-center">
       <p class="fw-bold delete-instruction"> You are about to delete the Grade record with the following values </p>

       <?php  if ($gradeDetails) { ?>
          <div class="col-lg-12 mb-2">
            <p> Grade Character: <?php echo $gradeDetails['grade_letter']; ?> </p>
            <p> Grade Points: <?php echo $gradeDetails['points'];?> </p>

            <form method="POST">
              <input type="hidden" value="<?php echo $gradeDetails['id']; ?>" name="grade_id">
              <button type="submit" class="delete-content-button btn btn-danger"> 
                DELETE
              </button>
            </form>
          </div>

          <div class="text-center">
            <a href="/grade-app" class="go-to-homepage"> 
              Go to Index
            </a>
          </div>

        <?php } else { ?>
          <div>
            <h4> No records. </h4>
          </div>
        <?php } ?>
     </div>
    </main>

    <!-- html-footer pinned-bottom -->
    <?php require 'includes/html-components/footer-pinned-bottom.php' ?>

    <!-- include-js-scripts -->
    <?php require 'includes/html-components/include-scripts.php' ?> 
  </body>
</html>