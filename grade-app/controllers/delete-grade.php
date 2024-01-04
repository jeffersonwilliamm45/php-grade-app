<?php
  require 'config/database.php';
  require 'repository/grade.php';
  require 'config/session.php';

  $clean = [];
  $errors = [];

  $mysqlConnection = new MySQLConnection();
  $mysqlConnection->connectToDatabase();

  $gradeRepository = new GradeRepository($mysqlConnection);

  if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
  {
    $clean['gradeId'] = htmlentities($_GET["id"]);
    $gradeDetails = $gradeRepository->readById($clean['gradeId']);
  }

  if ($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $clean['gradeId'] = htmlentities($_POST['grade_id']);
    $deleteResult = $gradeRepository->delete($clean['gradeId']);
    header('Location: http://localhost/grade-app/');
  }