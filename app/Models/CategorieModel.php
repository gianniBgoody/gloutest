<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model

{
    protected $table      = 'categorie';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nom_categorie'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;


    public function getCategorie(){

        // pour tout selectionner sans condition
        $query = $this  ->select('id, nom_categorie')
                        ->orderBy('id', 'asc')
                        -> get()
                        -> getResultArray();

        return $query;
    }


}