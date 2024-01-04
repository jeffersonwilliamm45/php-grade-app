<?php
  require 'config/database.php';
  require 'repository/grade.php';
  require 'config/session.php'; 

  $clean = [];
  $errors = [];

  $mysqlConnection = new MySQLConnection();
  $mysqlConnection->connectToDatabase();

  $gradeRepository = new GradeRepository($mysqlConnection);

  if ($_SERVER['REQUEST_METHOD'] == "POST")
  {
  	$clean['grade_character'] = htmlentities($_POST['grade_character']);
    $clean['grade_points'] = htmlentities($_POST['grade_points']);
    $clean['token'] = htmlentities($_POST['token']);

    function IsGradeCharacterValid($char)
    {
       $pattern = '/^(A|B|B\+|C|D|F)$/';
       return preg_match($pattern,$char);
    }

    function isValidRange($number) 
    {
      return is_numeric($number) && $number >= 1 && $number <= 5;
    }

    if (empty($clean['grade_character'])) { $errors['emptyGradeCharacter'] = 'The grade character is required.';}

    if (empty($clean['grade_points'])) { $errors['emptyGradePoints'] = 'The grade points is required.'; }

    if (!(IsGradeCharacterValid($clean['grade_character']))) 
    { 
      $errors['invalidGradeCharacter'] = 'The Grade Character is Invalid.';
    }

    if (!(isValidRange($clean['grade_points'])))
    {
       $errors['gradePointsIsNotAcceptable'] = 'The Grade Point is not acceptable.'; 
    }

    if ($gradeRepository->readByKey('grade_letter',$clean['grade_character']))
    {
      $errors['gradeCharacterRecordExists'] = 'The Grade Character exists.'; 
    } 

    if ($gradeRepository->readByKey('points',$clean['grade_points']))
    {
      $errors['gradePointsRecordExists'] = 'The Grade Point exists.'; 
    }

    if (count($errors) == 0)
    {
      $data = [
        'grade_letter' => $clean['grade_character'],
        'points' => $clean['grade_points'],
      ];

      $gradeRepository->create($data);
      header('Location: http://localhost/grade-app/');
    }
    
  }

  

  
  