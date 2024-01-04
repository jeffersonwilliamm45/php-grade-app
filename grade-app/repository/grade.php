<?php
  interface RepositoryInterface
  {
    public function create($data);
    public function readById($id);
    public function readAll();
    public function readByKey($key,$value);
    public function update($data);
    public function delete($data);
  }
  
  class GradeRepository implements RepositoryInterface
  {
    protected $databaseConnection;

      public function __construct(DatabaseConnection $databaseConnection)
      {
        $this->databaseConnection = $databaseConnection;
      }

      public function create($data)
      {
        $query = $this->databaseConnection->getConnection()->prepare("insert into grade (grade_letter, points) VALUES (?,?)");
        $query->execute([$data['grade_letter'],$data['points']]);  
      }

      public function readById($id)
      {
        $query = $this->databaseConnection->getConnection()->prepare("SELECT id,grade_letter,points FROM grade WHERE id = ?");
        $query->execute([$id]); 
        return $query->fetch(PDO::FETCH_ASSOC);
      }

      public function readAll()
      {
        $query = 'SELECT id, grade_letter, points FROM grade ORDER BY points DESC';
        $stmt = $this->databaseConnection->getConnection()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      public function readByKey($key,$value)
      {
        $query = $this->databaseConnection->getConnection()->prepare("SELECT COUNT(*) FROM grade WHERE $key = ?");
        $query->execute([$value]);
        $rowCount = $query->fetchColumn();
        return $rowCount > 0; 
      }

      public function update($data)
      {
        $query = $this->databaseConnection->getConnection()->prepare("UPDATE grade SET grade_letter = ?, points = ? WHERE id = ?");
        $query->execute([$data['grade_letter'], $data['points'], $data['id']]);
        return $query->rowCount() > 0;
      }

      public function delete($id)
      {
        $query = $this->databaseConnection->getConnection()->prepare("DELETE FROM grade WHERE id = ?");
        $query->execute([$id]);
        return $query->rowCount() > 0; 
      }
   }