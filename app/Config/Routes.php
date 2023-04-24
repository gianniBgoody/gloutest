<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::landing');
$routes->add('land', 'Home::landing');
$routes->add('login', 'Session::sessionLogin');
$routes->add('inscription', 'Home::inscription');
$routes->add('gloutForm', 'Home::formRecette');
$routes->add('session', 'Home::afficherRecette');
$routes->add('glouton/(:num)', 'Home::recetteComplete/$1');
$routes->add('admin', 'Administrateur::adminIndex');

$routes->add('boisson', 'Session::getBoissonCategorie');
$routes->add('vegetarien', 'Session::getVegetarienTags');
$routes->add('pic-nic', 'Session::getPicnicTags');
$routes->add('iodées', 'Session::getIodeAll');
$routes->add('sucrées', 'Session::getSucreAll');



// route specifique par thématique
$routes->add('tag/(:num)','Session::getRecettesByTagId/$1');
$routes->add('categorie/(:num)','Session::getRecettesByCategorieId/$1');
$routes->add('sousCategorie/(:num)','Session::getRecettesBySousCategorieId/$1');

$routes->add('formulaireSeul', 'Session::formRecetteSeul');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
