<?php

//$app->get('/search', function ($request, $response, $args) {
//$this->view->render($response, 'search/search.twig', [
//'place' => $place,
//'tags' => $tags,//'docs' => $this->toc,
//'flash_messages' => $flash_messages,
// 'userLogged' => isset($_SESSION['user_id']),
//'page_content' => "<h1>Welcome to the Top 5 website.</h1>",
//]);
//})->setName('search');

/* * *
 * declare variables
 * flash messages
 * 
 * if request is post do this
 * bind fields to sanitize
 * 
 * form validation
 * if empty errors
 * 
 * redirect
 * 
 * else
 * 
 * display errors
 * 
 * render view - search page again
 * 
 * 
 * 
 */

//$app->get('/top5', function ($request, $response, $args) {
//
//    $tags = $this->places->getTags();
//
//
//    $this->view->render($response, 'search/search.twig', [
//        //'place' => $place,
//        'tags' => $tags, //'docs' => $this->toc,
//        //'flash_messages' => $flash_messages,
//        // 'userLogged' => isset($_SESSION['user_id']),
//        'page_content' => "<h1>Welcome to the Top 5 website.</h1>",
//    ]);
//})->setName('searchsss');


$app->map(['GET', 'POST'], '/search', function ($request, $response, $args) {
    $search = [];
    //$search['suburb'] = 'foo';
    //$search['tag_id'] = 1;
    $results = [];
    $field_errors = [];
    $flash_messages = $this->flash->getMessages();
    //$field_name = 'all_displays';
    $tags = $this->places->getTags();
  

    if ($request->isPost()) {
         $search['suburb'] = filter_var($_POST['suburb'], FILTER_SANITIZE_STRING);
         $search['tag_id'] = filter_var($_POST['tag_id'], FILTER_SANITIZE_STRING);
         
         $search_form = validateSearchForm($search);
         //ddd($search_form);
            if ($search_form['is_valid']) {
                $results = $this->places->searchPlaces($search);
                //ddd($results);
                $counter = $this->places->incrementDisplayCounters($results); //$field_name,
                if (empty($errors)) {
                //ddd($results);
                //$this->flash->addMessage('success', 'Search results have been found');  
                    if ($results) {
                        $flash_messages['success'][] = 'Search results have been found';
                    } else {
                        $flash_messages['danger'][] = 'No Search results have been found';
                    }
                    //d($flash_messages);
                return $this->view->render($response, 'search/results_all.twig', [
                    'counter' => $counter,
                    'search' => $search,
                    'results' => $results,
                    'tags' => $tags,
                    'title' => 'Search Results',
                    'flash_messages' => $flash_messages,
//                    /* ==== THIS EFFECTS WHAT IS SHOWN ON THE CUSTOMERS LOGIN/LOGOUT DROPDOWN MENU ==== */
//                    /* ==== REQUIRED IN EVERY ROUTE ==== */
//                    'customerLogged' => isset($_SESSION['customer_id']),
                    'csrf' => [
                        'name' => $request->getAttribute('csrf_name'),
                        'value' => $request->getAttribute('csrf_value'),
                    ]
                ]);
   
            } else {
                $flash_messages['danger'][] = "You need to enter a Postcode/Suburb & choose Category to search - Please try again!";
                }
            } else {
                $field_errors = $search_form['has_errors'];
            }         
    }//END ->isPost()
  //ddd($results);
    //d($search);
    return $this->view->render($response, 'search/search.twig', [
        
                    'search' => $search,
                    'results' => $results,
                    'tags' => $tags,
                    'flash_messages' => $flash_messages,
                    'errors' => $field_errors,
                    'title' => 'Search',
//                    /* ==== THIS EFFECTS WHAT IS SHOWN ON THE CUSTOMERS LOGIN/LOGOUT DROPDOWN MENU ==== */
//                    /* ==== REQUIRED IN EVERY ROUTE ==== */
//                    'customerLogged' => isset($_SESSION['customer_id']),
                    'csrf' => [
                        'name' => $request->getAttribute('csrf_name'),
                        'value' => $request->getAttribute('csrf_value'),
                    ]
        ]);    
})->setName('search');

$app->get('search/result/{id:[\d]*}', function ($request, $response, $args) {
    $place_id = (int) $args['id'];
    
    //ddd($place_id);
    //$place_id = 1;
    $place = $this->places->getPlacesById($place_id);
    //ddd($place_id);
    $counter = $this->places->incrementClicksCounters($place_id); //$field_name,

    $tags = $this->places->getTags();
    //ddd($place);

    $flash_messages = $this->flash->getMessages();

    
return $this->view->render($response, 'search/result_show.twig', [
                'counter' => $counter,
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
})->setName('result-show');




//$app->get('/search/results', function ($request, $response, $args) {
//    
//    //$results = $this->places->searchPlaces($search);
//    return $this->view->render($response, 'search/results_all.twig', [
//                //'results' => $results,
//                //'tags' => $tags,
//                //'flash_messages' => $flash_messages,
//                //'errors' => $field_errors,
//                //'userLogged' => isset($_SESSION['user_id']),
//                'csrf' => [
//                    'name' => $request->getAttribute('csrf_name'),
//                    'value' => $request->getAttribute('csrf_value'),
//                ]
//    ]);
//})->setName('results-all');

$app->get('/client/places/{id}', function ($request, $response, $args) {
    return $response->write("HELLO top5 FROM CLIENT PLaces");
})->setName('client-place-display');











//$app->map(['GET', 'POST'], '/search', function ($request, $response, $args) {
//    $search = [];
//    //$search['suburb'] = 'foo';
//    //$search['tag_id'] = 1;
//    //ddd($results);
//    $tags = $this->places->getTags();
//    if ($request->isPost()) {
//        //process search
//        $search['search'] = filter_var($_POST['search'], FILTER_SANITIZE_STRING);
//        $search['tag_id'] = filter_var($_POST['tag_id'], FILTER_SANITIZE_STRING);
//
//        $search_form = validateSearchForm($search);
//        //ddd($search);
//
//
//        if ($search_form['is_valid']) {
//
//            $this->flash->addMessage('success', 'Search Successful');
//
//            $results = $this->places->searchPlaces($search);
//
//           //ddd($results);
//                //return $response->write("Display search form and results if ANY");
//        return $this->view->render($response, 'search/results_all.twig', [
//                    'results' => $results,
//                    'tags' => $tags,
//                    'title' => 'Search',
//                    /* ==== THIS EFFECTS WHAT IS SHOWN ON THE CUSTOMERS LOGIN/LOGOUT DROPDOWN MENU ==== */
//                    /* ==== REQUIRED IN EVERY ROUTE ==== */
//                    'customerLogged' => isset($_SESSION['customer_id']),
//                    'csrf' => [
//                        'name' => $request->getAttribute('csrf_name'),
//                        'value' => $request->getAttribute('csrf_value'),
//                    ]
//        ]);
//        } else {
//            $flash_messages['danger'][] = "You need to enter a Postcode/Suburb & choose Category to search - Please try again!";
//
//            $field_errors = $search_form['has_errors'];
//        }
//    }
//
//    })->setName('search');
