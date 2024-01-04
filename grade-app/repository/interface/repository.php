<?php
  interface RepositoryInterface
  {
    public function create($data);
    public function readById($id);
    public function readAll();
    public function readByKey();
    public function update($data);
    public function delete($data);
  }