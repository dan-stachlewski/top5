<?php

/* 
 * ROUTE - displayed as:
 * customers/places - Customers Dashboard = Administrators Dashboard
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

/* ============ [NOTE] ============ */
/***
 * B/c we are using encryption, we need to set up the registration 1st then register a new user b/c the current users are useless...
 * STEP 1 - REGISTER NEW Customer
 * STEP 2 - LOGIN NEW Customer
 ******** CRUD FUNCTIONALITY ********
 * STEP 3 - ADD NEW Place
 * STEP 4 - SHOW NEW place
 * step 5 - EDIT place
 * STEP 6 - DELETE place 
 */

require 'app/src/FormsValidation.php';
/* ============ CUSTOMER REGISTRATION ROUTE ============ */
$app->map(['GET', 'POST'], '/customers/register', function ($request, $response, $args) {

    $field_errors = [];
    $customer = [];
    
    $flash_messages = $this->flash->getMessages();

    if ($request->isPost()) {

        $customer['full_name'] = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);
        $customer['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $customer['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $customer['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        //ddd($customer);
        $customer_form = validateRegisterForm($customer);
        
        if ($customer_form['is_valid']) {
            //$userService = new AuthService();
            $errors = $this->customers->validateCustomer($customer);

            if (empty($errors)) {
//                $this->customers->addUser($customer);
//                $this->flash->addMessage('success', 'New Customer - ' . $_POST['username'] . 'added!');
//                $this->flash->addMessage('success', 'Hi, ' . $_POST['username'] . 'please login with your credentials');              
                $this->customers->addCustomer($customer);
                $this->flash->addMessage('success', 'New Customer added!');
                $this->flash->addMessage('success', 'Hi, please login with your credentials');
                return $response->withRedirect($this->router->pathFor('login'));
            } else {
                $flash_messages['danger'] = $errors;
            }
        } else {
            $field_errors = $customer_form['has_errors'];
        }
    }
    return $this->view->render($response, 'customers/customer_register.twig', [
                'customer' => $customer,
                'flash_messages' => $flash_messages,
                'errors' => $field_errors,
                'customerLogged' => isset($_SESSION['customer_id']),
                'csrf' => [
                    'name' => $request->getAttribute('csrf_name'),
                    'value' => $request->getAttribute('csrf_value'),
                ]
    ]);
})->setName('register');

/* ============ CUSTOMER LOGIN ROUTE ============ */
/* ============ [NOTE] ============ */
/* NEED TO KNOW USER IS LOGGED IN AND ADMIN */
$app->map(['GET', 'POST'], '/customers/login', function ($request, $response, $args) {
    $field_errors = [];
    $flash_messages = $this->flash->getMessages();
    $customer = [];
    $title = 'Login';
    if ($request->isPost()) {
        //$customerService = new CustomerService();

        $customer['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $customer['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        
        $customer_form = validateLoginForm($customer);
        //ddd($customer);

        if ($customer_form['is_valid']) {
            $valid_customer = $this->customers->authenticateCustomer($customer['username'], $customer['password']);
            if ($valid_customer) {
                //NEED TO KNOW USER IS LOGGED IN AND ADMIN
                
                
                $_SESSION['customer_id'] = $valid_customer['customer_id']; //this data can now be passed throughout
                //ddd($_SESSION['customer_id']);
                $this->flash->addMessage('success', 'Login successful');
                
                return $response->withRedirect($this->router->pathFor('places-all')); //customers-home
                //ddd($valid_customer);
            } else {
                $flash_messages['danger'][] = "Incorrect Username or Email & Password combination - Please try again!";
            }
        } else {
            $field_errors = $customer_form['has_errors'];
        }
    }
    return $this->view->render($response, 'customers/login.twig', [
                'customer' => $customer,
                'flash_messages' => $flash_messages,
                'errors' => $field_errors,
                'title' => 'Login',
                /* ==== THIS EFFECTS WHAT IS SHOWN ON THE CUSTOMERS LOGIN/LOGOUT DROPDOWN MENU ==== */
                /* ==== REQUIRED IN EVERY ROUTE ==== */
                'customerLogged' => isset($_SESSION['customer_id']),
                'csrf' => [
                    'name' => $request->getAttribute('csrf_name'),
                    'value' => $request->getAttribute('csrf_value'),
                ]
    ]);
})->setName('login');/* REFERS TO: <form action="{{ path_for('login') }}" method="post"> IN login.twig */

/* ============ CUSTOMER LOGOUT ROUTE ============ */
$app->get('customers/logout', function($request, $response, $args) {
    $flash_messages = $this->flash->getMessages();
    $_SESSION = [];
    $this->flash->addMessage('success', 'Logout successful');
    $this->flash->addMessage('success', 'Please login again');
    return $response->withRedirect($this->router->pathFor('login'));
})->setName('logout');

/* ============ CUSTOMER PROFILE ROUTE ============ */
$app->get('/customers/show/{id:[\d]*}', function ($request, $response, $args) {
    $customer = [];
    //$customer_id = (int) $args['id'];
    $customer_id = $_SESSION['customer_id'];
    //$place_id = 1;
    $customer = $this->customers->getCustomerById($customer_id);
    //ddd($customer_id);
    
   
    //$tags = $this->customers->getTags();
    //ddd($tags);
    $flash_messages = $this->flash->getMessages();

    
return $this->view->render($response, 'customers/customer_show.twig', [
                'customer' => $customer,
                //'tags' => $tags,
                'flash_messages' => $flash_messages,
                //'errors' => $field_errors,
                //'userLogged' => isset($_SESSION['user_id']),
                'csrf' => [
                    'name' => $request->getAttribute('csrf_name'),
                    'value' => $request->getAttribute('csrf_value'),
                ]
        ]);
})->setName('customers-show');
    
/* ============ CUSTOMER EDIT ROUTE ============ */
$app->map(['GET', 'POST'], '/customers/edit/{id:[\d]*}', function ($request, $response, $args) {
        //$customer = [];
        //$customer_id = (int) $args['id'];
        $customer_id = $_SESSION['customer_id'];
        //$roles = $this->auth->getRoles();
        $flash_messages = $this->flash->getMessages();

        $customer = $this->customers->getCustomerById($customer_id);
        if ($request->isPost()) {
        //ddd($customer['username']);

            $customer['full_name'] = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);
            //$customer['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            $customer['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

            $customer_form = validateCustomerEditForm($customer);

            if ($customer_form['is_valid']) {
                
                $this->customers->updateCustomer($customer);
                
                $this->flash->addMessage('success', 'Customer details have been updated');
                return $response->withRedirect($this->router->pathFor('customers-show', ['id'=>$_SESSION['customer_id']]));
            } else {
                $field_errors = $customer_form['has_errors'];
            }
        }

        return $this->view->render($response, 'customers/customer_edit.twig', [
                    'customer' => $customer,
                    //'roles' => $roles,
                    'flash_messages' => $flash_messages,
                    'customerLogged' => isset($_SESSION['customer_id']),
                    'csrf' => [
                        'name' => $request->getAttribute('csrf_name'),
                        'value' => $request->getAttribute('csrf_value'),
                    ]
        ]);
})->setName('customers-edit');


$app->map(['GET', 'POST'], '/customers/password/change', function ($request, $response, $args) {
    $fdata = [];
    $field_errors = [];
    $flash_messages = $this->flash->getMessages();

    if ($request->isPost()) {

        $fdata['current_password'] = filter_var($_POST['current_password'], FILTER_SANITIZE_STRING);
        $fdata['new_password'] = filter_var($_POST['new_password'], FILTER_SANITIZE_STRING);
        $fdata['confirmed_password'] = filter_var($_POST['confirmed_password'], FILTER_SANITIZE_STRING);

        $password_form = validatePasswordForm($fdata);

        if ($password_form['is_valid']) {
            if ($fdata['new_password'] == $fdata['confirmed_password']) {
                //$customerService = new CustomerService();
                $customer = $this->customers->getCustomerById($_SESSION['customer_id']);
                $errors = $this->customers->changeCustomerPassword($customer['username'], $fdata['current_password'], $fdata['new_password']);
                if (empty($errors)) {
                    $this->flash->addMessage('success', 'Password has been changed');
                    return $response->withRedirect($this->router->pathFor('customers-show', ['id'=>$_SESSION['customer_id']]));
                } else {
                    $flash_messages['danger'][] = $errors; //
                }
            } else {
                $flash_messages['danger'][] = "Please Confirm the New Passowrd";
            }
        } else {
            $field_errors = $password_form['has_errors'];
        }
    }

    return $this->view->render($response, 'customers/customer_password_change.twig', [
                'customer' => $fdata,
                'flash_messages' => $flash_messages,
                'errors' => $field_errors,
                'customerLogged' => isset($_SESSION['customer_id']),
                'csrf' => [
                    'name' => $request->getAttribute('csrf_name'),
                    'value' => $request->getAttribute('csrf_value'),
                ]
    ]);
})->setName('customer-password-change');



