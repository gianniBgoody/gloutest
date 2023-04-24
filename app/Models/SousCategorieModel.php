<?php

namespace App\Models;

use CodeIgniter\Model;

class SousCategorieModel extends Model

{
    protected $table      = 'sousCategorie';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nom_souscat', 'categorie_id'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    
    public function getSousCategorie(){

        // pour tout selectionner sans condition
        $query = $this  ->select('id, nom_souscat, categorie_id')
                        ->orderBy('categorie_id','asc')
                        -> get()
                        -> getResultArray();

        return $query;
    }




}