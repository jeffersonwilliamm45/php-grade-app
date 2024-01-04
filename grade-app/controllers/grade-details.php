<?php
  require 'config/database.php';
  require 'repository/grade.php'; 

  $mysqlConnection = new MySQLConnection();
  $mysqlConnection->connectToDatabase();

  $gradeRepository = new GradeRepository($mysqlConnection); 

  if (isset($_GET['id'])) 
  {
  	$gradeId = htmlspecialchars($_GET['id']);
  	$gradeDetails = $gradeRepository->readById($gradeId);
  }
  