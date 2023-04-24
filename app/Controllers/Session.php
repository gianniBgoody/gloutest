<?php

namespace App\Controllers;

class Session extends BaseController
{
    public function sessionLogin(){

        $data = [
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Bienvenue sur l\'espace de connexion  à la communauté Gloutonne'
        ];
        return view('template/login', $data);
    }

    
    public function getBoissonCategorie(){
 
        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getRecetteByCategorieId(4);

        $tagModel = new \App\Models\TagsModel();
        $tags = $tagModel->getTags();

        $data = [
            'tags' => $tags,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Toutes les recettes de boissons'
        ];

        return view('template/pageRecette', $data);
    }

    
    public function getVegetarienTags(){

        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getRecettesByTagId(20);

        $data = [
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Toutes les recettes végétariennes'
        ];

        // echo "<pre>";
        // print_r ($data["cardData"]);
        // die();

        return view('template/pageRecette', $data);
    }



    public function getPicnicTags(){
        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getRecettesByTagId(6);

        $data = [
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les recettes idéales en plein air'
        ];

        // echo "<pre>";
        // print_r ($data["cardData"]);
        // die();

        return view('template/pageRecette', $data);

    }

    public function getRecettesByTagId($tagId){
        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getRecettesByTagId($tagId);

        $tagModel = new \App\Models\TagsModel();
        $tags = $tagModel->getTags();

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        $data = [
            'cats' => $cats,
            'tags' => $tags,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les recettes idéales en plein air'
        ];

        // echo "<pre>";
        // print_r ($data["cardData"]);
        // die();

        return view('template/pageRecette', $data);

    }

    
    public function getRecettesByCategorieId($catId){
        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getRecettesByCategorieId($catId);

        $tagModel = new \App\Models\TagsModel();
        $tags = $tagModel->getTags();

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        $data = [
            'tags' => $tags,
            'cats' => $cats,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les recettes idéales en plein air'
        ];


        return view('template/pageRecette', $data);

}


    public function getRecettesBySousCategorieId($sousCatId){
        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getRecettesBySousCategorieId($sousCatId);

        $tagModel = new \App\Models\TagsModel();
        $tags = $tagModel->getTags();

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        
        $data = [
            'tags' => $tags,
            'cats' => $cats,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les recettes par sous catégories'
        ];


        // echo "<pre>";
        // print_r ($data["iodes"]);
        // die();

        return view('template/pageRecette', $data);

}

    public function getIodeAll(){
        $recetteModel = new \App\Models\RecetteModel();
        $recetteIode = $recetteModel ->getIode();

        $recetteTagModel = new \App\Models\RecetteTagModel();
        $tagsIode = $recetteTagModel->getTagIode();

        $cardData = array_merge($recetteIode,$tagsIode);
        
        $tagModel = new \App\Models\TagsModel();
        $tags = $tagModel->getTags();
        
        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();
        

        $data = [
            'tags' => $tags,
            'cats' => $cats,
            'tagsIode' => $tagsIode,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les recettes par sous catégories'
        ];


        return view('template/pageRecette', $data);
    }


    public function getSucreAll(){
        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getSucre();

        $tagModel = new \App\Models\TagsModel();
        $tags = $tagModel->getTags();

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();


        $data = [
            'tags' => $tags,
            'cats' => $cats,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les recettes par sous catégories'
        ];


        return view('template/pageRecette', $data);
    }


public function formRecetteSeul()
    {
        $tagModel = new \App\Models\TagsModel();
        $tags = $tagModel->getTags();
        $data['tags']= $tags;

        $data['meta_title'] = 'Gloutest | Recettes de cuisine';
        $data['title'] = 'Partager une Gloutonnerie';


        helper('form');
        $postData = $this->request->getPost();

        $categorieModel = model('App\Models\CategorieModel');
        $data["categories"] = $categorieModel->getCategorie();
        // die(var_dump($data["categories"]));

        $sousCategorieModel = model('App\Models\SousCategorieModel');
        $data["sousCategories"] = $sousCategorieModel->getSousCategorie();
        //  die(var_dump($data["sousCategories"]));

        $tagsModel = model('App\Models\TagsModel');
        $data["tagsOccasion"] = $tagsModel->getTagsByParentId(1);
        $data["tagsIngr"] = $tagsModel->getTagsByParentId(2);
        $data["tagsDivers"] = $tagsModel->getTagsByParentId(3);
        // die(var_dump($data["tagsDivers"]));


        if($postData){
            
            $recetteModel = new \App\Models\RecetteModel();
            
            $img = $this->request->getFile('image');
            if ($img->isValid() && ! $img->hasMoved()) {
                $newName = $img->getRandomName();
                $img->move(FCPATH.'uploads', $newName);
                $postData['image']= $newName;
            }

            // si aucun tags n'est choisi (le tableau n'existe pas), donc on crée un tableau vide pour que la boucle puisse se faire quand même.
            if(!isset($postData["tagsEnvoi"])){
                $postData["tagsEnvoi"] = [];
            }
            $recetteModel ->addRecette($postData);
            

            return view('template/pageFormulaireSeul', $data);
        }

        return view('template/pageFormulaireSeul', $data);
    }

}


?>
