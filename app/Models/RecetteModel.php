<?php

namespace App\Models;

use CodeIgniter\Model;

class RecetteModel extends Model

{
    protected $table      = 'recette';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nom', 'ingredient', 'etape', 'image', 'difficulte', 'nbPart','duree', 'description', 'sousCategorie_id', 'categorie_id', 'utilisateur_id'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    

public function addRecette($postData){
    $this-> insert($postData);
    $idRecette =  $this->db->insertID();

    foreach($postData['tagsEnvoi'] as $idTags){
        $insert = array(
            'id_tags' => $idTags,
            'id_recette'   => $idRecette
        );
        $this->db->table('recette_tags')
                 ->insert($insert);
    }
}



public function getAllRecette(){

    // pour tout selectionner sans condition
    $query = $this  ->select('id, nom, image')
                    -> get()
                    -> getResultArray();

    // pour selectionner des colonnes particulières dans la table avec SELECT 
    // $query = $this -> select('id, nom, image, etape, ingredient')
    //                 -> orderBy('id', 'desc')
    //                 -> get()
    //                 ->getResultArray();

    // pour avoir la requete juste avec les data sans le num de l'index [0] dans le tableau
                    // $query = $this -> select('id, nom, image, etape, ingredient, description, duree, nbPart')
                    // -> where(['id' => 20])
                    // ->first(); 


    // pour avoir une selection de plusieurs id avec la méthode whereIn
                    // $query = $this -> select('id, nom, image, etape, ingredient')
                    // -> whereIn('id',[12, 19, 20, 22])
                    // ->get()
                    // ->getResultArray();

    return $query;

}

public function getRecetteById($id){

    $query = $this  -> where ('id', $id)
                    -> get()
                    -> getRowArray();
    
    return $query;
}

// public function getRecetteAccueil(){

//     $query = $this  -> where(['id' => 40])
//                     ->first(); 
//     return $query;

// }

//  requette pour la table de jointure tags 
public function getRecettesByTagId($tagId){

    $query = $this  ->db->table('recette_tags')
                    ->where('id_tags', $tagId)
                    ->join('recette', 'recette.id = recette_tags.id_recette')
                    ->get()
                    ->getResultArray();
    return $query;

}


    public function getRecettesByCategorieId($catId){

    $query = $this  /*->db->table('categorie')*/
                    
                    ->where('categorie_id', $catId)
                    // ->join('recette', 'recette.categorie_id = categorie.id')
                    ->get()
                    ->getResultArray();

    return $query;

}

public function getRecettesBySousCategorieId($sousCatId){

    $query = $this 
                ->where('sousCategorie_id', $sousCatId )
                ->get()
                ->getResultArray();

    return $query;
}

public function getIode(){
    
    $sousCatIode = [3, 4, 5, 13, 14, 15, 16, 17, 18, 23];

    $query = $this  -> whereIn('sousCategorie_id',$sousCatIode)
                    ->get()
                    ->getResultArray();

    return $query;

}

public function getSucre(){
    
    $sousCatSucre = [32, 33, 34, 35, 36, 37, 38, 39];

    $query = $this  -> whereIn('sousCategorie_id',$sousCatSucre)
                    ->get()
                    ->getResultArray();

    return $query;

}

}