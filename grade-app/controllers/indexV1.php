<?php
  require 'config/database.php';
  require 'repository/grade.php'; 

  $clean = [];
  $feedback = [];

  $mysqlConnection = new MySQLConnection();
  $mysqlConnection->connectToDatabase();

  $gradeRepository = new GradeRepository($mysqlConnection); 

  $allGrades = $gradeRepository->readAll();

  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["grade_id"]))
  {
    $clean['gradeId'] = htmlentities($_POST["grade_id"]);
    
    $deleteResult = $gradeRepository->delete($clean['gradeId']);

    if ($deleteResult) 
    {
      $feedback['delete_operation_success'] = "The grade with ID = " . $clean['gradeId'] . " is deleted";
    } 
    else 
    {
      $feedback['delete_operation_failure'] = "The grade with ID = "  . $clean['gradeId'] . " is NOT deleted";
    }

    // Redirect to index.php with feedback message as a URL parameter
    header('Location: http://localhost/grade-app?'. http_build_query($feedback));
  }

  

