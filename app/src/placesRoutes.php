<?php

include "app/src/FormsValidation.php";


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $app->get('/places', function ($request, $response, $args) {

        $places = $this->places->getAllPlaces($_SESSION['customer_id']);
        $flash_messages = $this->flash->getMessages();

    //ddd($places);

    return $this->view->render($response, 'places/places_all.twig', [
                'places' => $places,
                'flash_messages' => $flash_messages,
    ]);
})->setName('places-all');


$app->map(['GET', 'POST'], 'places/add', function ($request, $response, $args) {

    $field_errors = [];
    $place = [];
    $tags = $this->places->getTags();
    //$places = new PlacesService($this-db)
    //ddd($tags);

    $flash_messages = $this->flash->getMessages();

    if ($request->isPost()) {
        $place['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $place['address'] = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
        $place['postcode'] = filter_var($_POST['postcode'], FILTER_SANITIZE_STRING);
        $place['suburb'] = filter_var($_POST['suburb'], FILTER_SANITIZE_STRING);
        $place['tag_id'] = filter_var($_POST['tag_id'], FILTER_SANITIZE_NUMBER_INT);
        //Need customer_id so we know which PLACE belongs to which USER
        $place['customer_id'] = $_SESSION['customer_id'];

        $place_form = validateAddPlaceForm($place);
        
        //ddd($place);
        //call add place
        //redirect to places_all
            if ($place_form['is_valid']) {
                $this->places->addPlace($place);
                $this->flash->addMessage('success', 'Place details have been updated');
                return $response->withRedirect($this->router->pathFor('places-all'));
            } else {
                $field_errors = $place_form['has_errors'];
            }
        }
    
    return $this->view->render($response, 'places/places_add.twig', [
                'place' => $place,
                'tags' => $tags,
                'flash_messages' => $flash_messages,
                'errors' => $field_errors,
                //'userLogged' => isset($_SESSION['user_id']),
                'csrf' => [
                    'name' => $request->getAttribute('csrf_name'),
                    'value' => $request->getAttribute('csrf_value'),
                ]
    ]);
})->setName('places-add');

$app->get('places/show/{id:[\d]*}', function ($request, $response, $args) {
    $place_id = (int) $args['id'];
    //$place_id = 1;
    $place = $this->places->getPlacesById($place_id);
    //ddd($place_id);

    
   
    $tags = $this->places->getTags();
    //ddd($tags);

    $flash_messages = $this->flash->getMessages();

    
return $this->view->render($response, 'places/places_show.twig', [
                'place' => $place,
                'tags' => $tags,
                'flash_messages' => $flash_messages,
                //'errors' => $field_errors,
                //'userLogged' => isset($_SESSION['user_id']),
                'csrf' => [
                    'name' => $request->getAttribute('csrf_name'),
                    'value' => $request->getAttribute('csrf_value'),
                ]
        ]);
})->setName('places-show');

$app->map(['GET', 'POST'], 'places/edit/{id:[\d]*}', function ($request, $response, $args) {
        $place_id = (int) $args['id'];
        //$place_id = 1;
        $place = $this->places->getPlacesById($place_id);
        $flash_messages = $this->flash->getMessages();
        $tags = $this->places->getTags();

        //$place = $this->places->getPlacesById($place_id);

        if ($request->isPost()) {

            $place['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $place['address'] = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
            $place['suburb'] = filter_var($_POST['suburb'], FILTER_SANITIZE_STRING);
            $place['postcode'] = filter_var($_POST['postcode'], FILTER_SANITIZE_STRING);
            $place['tag_id'] = filter_var($_POST['tag_id'], FILTER_SANITIZE_NUMBER_INT);
            //Need customer_id so we know which PLACE belongs to which USER

            $place_form = validateAddPlaceForm($place);

            //ddd($place_form);
            //call add place
            //redirect to places_all 
            
            if ($place_form['is_valid']) {
                $this->places->updatePlace($place);
                $this->flash->addMessage('success', 'User details have been updated');
                return $response->withRedirect($this->router->pathFor('places-all'));
            } else {
                $field_errors = $places_form['has_errors'];
            }
        }

        return $this->view->render($response, 'places/places_edit.twig', [
                'place' => $place,
                'tags' => $tags,
                'flash_messages' => $flash_messages,
                //'errors' => $field_errors,
                //'userLogged' => isset($_SESSION['user_id']),
                'csrf' => [
                    'name' => $request->getAttribute('csrf_name'),
                    'value' => $request->getAttribute('csrf_value'),
                ]
        ]);
    })->setName('places-edit');
    
    $app->map(['GET', 'POST'], 'places/delete/{id:[\d]*}', function ($request, $response, $args) {
        //$place = [];
        $place_id = (int) $args['id'];
        //ddd($id);
        $flash_messages = $this->flash->getMessages();
        //$userService = new AuthService();
        $place = $this->places->getPlacesById($place_id);

        $OK_link = $this->router->pathFor('places-delete', ['id' => $place_id]);

        if ($request->isPost()) {
            $this->places->deletePlace($place_id);
            $this->flash->addMessage('success', 'Place has been successfully deleted');
            return $response->withRedirect($this->router->pathFor('places-all'));
        }

        return $this->view->render($response, 'places/places_delete.twig', [
                    'place' => $place,
                    'OK_link' => $OK_link,
                    'flash_messages' => $flash_messages,
                   // 'userLogged' => isset($_SESSION['user_id']), MOVED TO GLOBAL SECTION
                    'csrf' => [
                        'name' => $request->getAttribute('csrf_name'),
                        'value' => $request->getAttribute('csrf_value'),
                    ]
        ]);
    })->setName('places-delete');
    
    
    
    