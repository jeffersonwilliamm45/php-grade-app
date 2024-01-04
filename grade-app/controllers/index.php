<?php
  require 'config/database.php';
  require 'repository/grade.php';
  require 'config/session.php'; 

  $session = new SessionManager();
  
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
      $session->setValue('delete_operation_success',"The grade with ID = " . $clean['gradeId'] . " is deleted");
    } 
    else 
    {
      $session->setValue('delete_operation_failure',"The grade with ID = " . $clean['gradeId'] . " is deleted");
    } 
  }

  

