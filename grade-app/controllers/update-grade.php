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