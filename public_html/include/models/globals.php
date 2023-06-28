<?php

abstract class table
{
    protected $connexion;
    protected string $table_name;

    public function doesExist(){
        $sql = "SELECT id FROM ". $this->table_name . " WHERE id = ?";
        $request = $this->connexion->prepare($sql);
        $request->execute([$this->id]);
        if ($request->rowCount() > 0) {
            return True;
        }
        else {
            return False;
        }
    } 
}


?>