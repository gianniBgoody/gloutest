<?php

namespace App\Controllers;

class Administrateur extends BaseController
{
    public function adminIndex(){

        $data = [
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Page Console Administrateur'
        ];

        return view('template/pageAdmin',$data);
    }

    // public function afficherRecette(){

    //     $recetteModel = new \App\Models\RecetteModel();
    //     $cardData = $recetteModel ->getAllRecette();

    //     $data = [
    //         'cardData' => $cardData
    //     ];

    //     // echo "<pre>";
    //     // print_r ($data["cardData"]);
    //     // die();
    //      return view('template/pageRecette', $data);
    // }

}
