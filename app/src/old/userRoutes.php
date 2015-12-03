<?php
//NEED TO KNOW USER IS LOGGED IN AND ADMIN
$app->map(['GET', 'POST'], '/users/login', function ($request, $response, $args) {
    $field_errors = [];
    $flash_messages = $this->flash->getMessages();
    $user = [];
    if ($request->isPost()) {
        //$userService = new AuthService();

        $user['user_name'] = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
        $user['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $user_form = validateLoginForm($user);

        if ($user_form['is_valid']) {
            $valid_user = $this->auth->authenticateUser($user['user_name'], $user['password']);

            if ($valid_user) {
                //NEED TO KNOW USER IS LOGGED IN AND ADMIN
                $_SESSION['user_id'] = $valid_user['user_id']; //this data can now be passed throughout
                $_SESSION['user_role'] = $valid_user['role']; //this data can bow be passed throughout
                
                $this->flash->addMessage('success', 'Login successful');
                return $response->withRedirect($this->router->pathFor('docs-home'));
            } else {
                $flash_messages['danger'][] = "Incorrect combination of username/email AND password - Please try again";
            }
        } else {
            $field_errors = $user_form['has_errors'];
        }
    }
    return $this->view->render($response, 'users/login.twig', [
                'user' => $user,
                'flash_messages' => $flash_messages,
                'errors' => $field_errors,
               // 'userLogged' => isset($_SESSION['user_id']),
                'csrf' => [
                    'name' => $request->getAttribute('csrf_name'),
                    'value' => $request->getAttribute('csrf_value'),
                ]
    ]);
})->setName('login');


$app->map(['GET', 'POST'], '/users/register', function ($request, $response, $args) {

    $field_errors = [];
    $user = [];
    
    $flash_messages = $this->flash->getMessages();

    if ($request->isPost()) {

        $user['user_name'] = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
        $user['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $user['full_name'] = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);
        $user['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

        
        $user_form = validateRegisterForm($user);

        if ($user_form['is_valid']) {
            //$userService = new AuthService();
            $errors = $this->auth->validateUser($user);

            if (empty($errors)) {
                //determine id for USER role and add it to the user array
                $roles = $this->auth->getRoles();
                $key = array_search('USER', $roles);
                $user['role_id'] = $key;
                
                $this->auth->addUser($user);
                $this->flash->addMessage('success', 'New user added');
                $this->flash->addMessage('success', 'Please login with your credentials');
                return $response->withRedirect($this->router->pathFor('login'));
            } else {
                $flash_messages['danger'] = $errors;
            }
        } else {
            $field_errors = $user_form['has_errors'];
        }
    }
    return $this->view->render($response, 'users/users_register.twig', [
                'user' => $user,
                'flash_messages' => $flash_messages,
                'errors' => $field_errors,
              //  'userLogged' => isset($_SESSION['user_id']),
                'csrf' => [
                    'name' => $request->getAttribute('csrf_name'),
                    'value' => $request->getAttribute('csrf_value'),
                ]
    ]);
})->setName('register');

$app->map(['GET', 'POST'], '/users/edit', function ($request, $response, $args) {

    $field_errors = [];
    $flash_messages = $this->flash->getMessages();

    //$userService = new AuthService();
    $user = $this->auth->getUserById($_SESSION['user_id']);

    if ($request->isPost()) {

        $user['full_name'] = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);
        $user['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

        $user_form = validateUserEditForm($user);

        if ($user_form['is_valid']) {
            $userService->updateUser($user);
            $this->flash->addMessage('success', 'Your details have been updated');
            return $response->withRedirect($this->router->pathFor('docs-home'));
        } else {
            $field_errors = $user_form['has_errors'];
        }
    }

    return $this->view->render($response, 'users/users_edit.twig', [
                'user' => $user,
                'flash_messages' => $flash_messages,
                'errors' => $field_errors,
               // 'userLogged' => isset($_SESSION['user_id']),
                'csrf' => [
                    'name' => $request->getAttribute('csrf_name'),
                    'value' => $request->getAttribute('csrf_value'),
                ]
    ]);
})->setName('user-edit');

$app->map(['GET', 'POST'], '/users/password/change', function ($request, $response, $args) {
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
                //$userService = new AuthService();
                $user = $this->auth->getUserById($_SESSION['user_id']);
                $errors = $userService->changeUserPassword($user['user_name'], $fdata['current_password'], $fdata['new_password']);
                if (empty($errors)) {
                    $this->flash->addMessage('success', 'Password has been changed');
                    return $response->withRedirect($this->router->pathFor('docs-home'));
                } else {
                    $flash_messages['danger'][] = $errors; //
                }
            } else {
                $flash_messages['danger'][] = "Please confirm new passowrd";
            }
        } else {
            $field_errors = $password_form['has_errors'];
        }
    }

    return $this->view->render($response, 'users/password_change.twig', [
                'user' => $fdata,
                'flash_messages' => $flash_messages,
                'errors' => $field_errors,
               // 'userLogged' => isset($_SESSION['user_id']),
                'csrf' => [
                    'name' => $request->getAttribute('csrf_name'),
                    'value' => $request->getAttribute('csrf_value'),
                ]
    ]);
})->setName('user-password-change');

$app->get('/users/logout', function ($request, $response, $args) {

    $flash_messages = $this->flash->getMessages();
    $_SESSION = [];
    $this->flash->addMessage('success', 'Logout successful');
    $this->flash->addMessage('success', 'Please login again');
    return $response->withRedirect($this->router->pathFor('login'));
})->setName('logout');

