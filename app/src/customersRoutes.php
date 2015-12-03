<?php

/* 
 * ROUTE - displayed as:
 * customers/places
 * customers/places/show/place_id
 * customers/places/edit/place_id
 * customers/places/add/place_id
 * ... don't worry about delete for now ...
 * customers/places/delete/place_id
 * ... need good SQL ...
 * SELECT * 
 * FROM places 
 * WHERE customer_id = 1
 * need a condition which will be the customer/user_id
 * ... need sample data for the database ...
 * 
 */



//NEED TO KNOW USER IS LOGGED IN AND ADMIN
$app->map(['GET', 'POST'], '/customers/login', function ($request, $response, $args) {
    $field_errors = [];
    $flash_messages = $this->flash->getMessages();
    $customer = [];
    if ($request->isPost()) {
        //$userService = new AuthService();

        $customer['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $customer['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $customer_form = validateLoginForm($customer);

        if ($customer_form['is_valid']) {
            $valid_customer = $this->auth->authenticateUser($customer['username'], $customer['password']);

            if ($valid_customer) {
                //NEED TO KNOW USER IS LOGGED IN AND ADMIN
                $_SESSION['customer_id'] = $valid_customer['customer_id']; //this data can now be passed throughout
                
                $this->flash->addMessage('success', 'Login successful');
                return $response->withRedirect($this->router->pathFor('places-home'));
            } else {
                $flash_messages['danger'][] = "Incorrect Username or Email & Password combination - Please try again!";
            }
        } else {
            $field_errors = $user_form['has_errors'];
        }
    }
    return $this->view->render($response, 'customers/login.twig', [
                'customer' => $customer,
                'flash_messages' => $flash_messages,
                'errors' => $field_errors,
               // 'userLogged' => isset($_SESSION['user_id']),
                'csrf' => [
                    'name' => $request->getAttribute('csrf_name'),
                    'value' => $request->getAttribute('csrf_value'),
                ]
    ]);
})->setName('login');
