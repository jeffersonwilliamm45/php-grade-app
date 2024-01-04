<?php
  $title = 'Index Page';
  require_once 'controllers/index.php';
?>

<!doctype html>
<html>
  <!-- html-head -->
  <?php require 'includes/html-components/html-head.php' ?>

  <body>
    <div class="container-fluid py-4">
      <div class="row">
        <!-- Main Content -->
        <main class="col-lg-12 col-md-12 ms-sm-auto px-md-4 main-content">
          <div class="add-a-grade mb-3">
            <a href="add-grade.php"> 
              <button type="button" class="add-content-button btn btn-primary"> Add a grade </button> 
            </a>
          </div> 

          <div class="notification-center">
            <?php if (null !== $session->getValue('delete_operation_success')) { ?>
              <h6 class="operation-successfull-message"> <?php echo $session->getValue('delete_operation_success'); ?> </h6>
              <?php $session->remove('delete_operation_success'); ?>
                          
            <?php } if (null !== $session->getValue('delete_operation_failure'))  { ?>
              <h6 class="operation-failure-message"> <?php echo $session->getValue('delete_operation_failure'); ?> </h6>
              <?php $session->remove('delete_operation_failure'); ?>
            <?php } ?>
          </div>

          <div class="search-content-container col-lg-6">
            <form class="mb-3">
              <input class="form-control" type="search" placeholder="Search by key.." aria-label="Search">
            </form>
          </div>

          <?php if (empty($allGrades)) { ?>
            <div class="no-content-msg">
              <h6> There are no grades yet! </h6>
            </div>

          <?php } else { ?> 
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr> 
                      <th scope="col"> Grade Letter </th>
                      <th scope="col"> Points </th> 
                      <th scope="col"> Actions  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($allGrades as $gradeData) { ?>
                      <tr> 
                        <td> <?php echo $gradeData['grade_letter']; ?> </td>
                        <td> <?php echo $gradeData['points']; ?> </td> 
                        <td> 
                          <span> <a href="grade-details.php?id=<?php echo $gradeData['id']; ?>"> View data </a> </span>   
                          <span> <a href="update-grade.php?id=<?php echo $gradeData['id']; ?>"> Update </a> </span>
                          
                          <span>
                            <form class="resource-update-link-form" id="deleteForm_<?php echo $gradeData['id']; ?>" 
                              method="post">
                              <input type="hidden" name="grade_id" value="<?php echo $gradeData['id']; ?>">
                              <a href="javascript:void(0)" class="delete-link"
                                onclick="document.getElementById('deleteForm_<?php echo $gradeData['id']; ?>').submit();"> 
                                Delete
                              </a>
                            </form>
                          </span>

                          <span>
                            <a href="delete-grade.php?id=<?php echo $gradeData['id']; ?>" class="delete-link"> Delete </a>
                          </span>

                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
          <?php } ?> 

        </main>
      </div>
    </div>

    <!-- html-footer pinned-bottom -->
    <?php require 'includes/html-components/footer-pinned-bottom.php' ?>

    <!-- include-js-scripts -->
    <?php require 'includes/html-components/include-scripts.php' ?> 
  </body>
</html>