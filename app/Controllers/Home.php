<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }


    public function landing(){

        $recetteModel = new \App\Models\RecetteModel();
        $recettes = $recetteModel ->getRecettesByTagId(19);

        // pour afficher au hasard à partir de plusieures recettes ayant le même tag ($recettes, 3 ici on passe  le nombre d'affichage qu'on veut 3 sur les 25 tags)
        $cardAccueil =$recettes[array_rand($recettes)];

        $data = [
            'cardAccueil' => $cardAccueil,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Landing Page de la Gloutonnade'
        ];

        // echo "<pre>";
        // print_r ($cardAccueil);
        // die();
        return view('template/pageLanding', $data);


    }

    
    public function formRecette()
    {
        $tagModel = new \App\Models\TagsModel();
        $tags = $tagModel->getTags();
        $data['tags']= $tags;

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();
        $data['cats']= $cats;


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
            

            return view('template/pageFormulaire', $data);
        }

        return view('template/pageFormulaire', $data);
    }



    public function afficherRecette(){

        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getAllRecette();

        $tagModel = new \App\Models\TagsModel();
        $tags = $tagModel->getTags();

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        $data = [
            'cats' => $cats,
            'tags' => $tags,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Page accueil Session 1'
        ];

        // echo "<pre>";
        // print_r ($data["cardData"]);
        // die();
         return view('template/pageRecette', $data);
    }


    public function recetteComplete($id){
        
        $recetteModel = new \App\Models\RecetteModel();
        $tagModel = new \App\Models\TagsModel();

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();
        
        $recetteData = $recetteModel ->getRecetteById($id);
        $tags = $tagModel->getTags();

        // echo "<pre>";
        // print_r ($recetteData);
        // die();
        $data = [
            'cats' => $cats,
            'tags' => $tags,
            'recetteData' => $recetteData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Page Recette Complète'
        ];

        return view('template/pageFiche', $data);
    }

    public function inscription(){

        $data = [
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Merci de bien vouloir remplir le formulaire'
        ];


        return view('template/inscription', $data);

    }

    
}
