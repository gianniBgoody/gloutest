<?php

namespace App\Models;

use CodeIgniter\Model;

class RecetteTagModel extends Model

{
    protected $table      = 'recette_tags';
    protected $primaryKey = 'id_recette';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_tags'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    
    public function getTagIode(){
        $tagsIode = [18, 19];

        $getTagsIode = $this->whereIn('id_tags', $tagsIode)
                ->join('recette', 'recette.id = recette_tags.id_recette')
                ->get()
                ->getResultArray();

        return $getTagsIode;
    }
    

}