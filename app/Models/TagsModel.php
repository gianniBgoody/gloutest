<?php

namespace App\Models;

use CodeIgniter\Model;

class TagsModel extends Model

{
    protected $table      = 'tags';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nom_tags, parent_id'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;


    public function getTagsByParentId($id){

        // pour tout selectionner sans condition
        $query = $this  ->select('id, nom_tags, parent_id')
                        ->where('parent_id',$id)
                        -> get()
                        -> getResultArray();

        return $query;
    }


    // fonction pour selectionner uniquement les tags qui ont des recettes
    public function getTags(){

        // on recupère les id_tags qui sont associés avec id_recette dans la table de jointure
        // groupBy permet de récuperer 1 seul id même si celui-ci se répète 
        $tagIds = array_values($this->db->table('recette_tags')
                 ->select('id_tags')
                 ->groupBy('id_tags')
                 ->get()
                 ->getResultArray());

        //tableau vide pour pouvoir y stocker  tous les id_tags récupérer via une boucle 
        $tags = [];

        foreach($tagIds as $tagId) {
            $tags[] = $tagId['id_tags'];
        }
        
        $query = $this  -> whereIn('id',$tags)
                        ->get()
                        ->getResultArray();

        return $query;
    }

    
}