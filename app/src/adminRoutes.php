<?php

$app->group('/admin/users', function() {
    //all routes for /admin/users

    $this->get('', function ($request, $response, $args) {
        $users = [];
        $flash_messages = $this->flash->getMessages();

        $users = $this->auth->getAllUsers();
        $roles = $this->auth->getRoles();

        return $this->view->render($response, 'admin/users_all.twig', [
                    'users' => $users,
                    'roles' => $roles,
                    'flash_messages' => $flash_messages,
                    //'userLogged' => isset($_SESSION['user_id']),
                    'csrf' => [
                        'name' => $request->getAttribute('csrf_name'),
                        'value' => $request->getAttribute('csrf_value'),
                    ]
        ]);
    })->setName('admin-users-all');


    $this->get('/show/{id:[\d]*}', function ($request, $response, $args) {
        $user = [];
        $id = (int) $args['id'];

        $flash_messages = $this->flash->getMessages();
        // $userService = new AuthService();
        $user = $this->auth->getUserById($id);

        return $this->view->render($response, 'admin/admin_users_show.twig', [
                    'user' => $user,
                    'flash_messages' => $flash_messages,
                    //'userLogged' => isset($_SESSION['user_id']),
                    'csrf' => [
                        'name' => $request->getAttribute('csrf_name'),
                        'value' => $request->getAttribute('csrf_value'),
                    ]
        ]);
    })->setName('admin-users-show');

    $this->map(['GET', 'POST'], '/add', function ($request, $response, $args) {

        $field_errors = [];
        $user = [];
        $roles = $this->auth->getRoles();
        $flash_messages = $this->flash->getMessages();

        if ($request->isPost()) {

            $user['user_name'] = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
            $user['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $user['full_name'] = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);
            $user['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $user['role_id'] = filter_var($_POST['role_id'], FILTER_SANITIZE_NUMBER_INT);

            $user_form = validateRegisterForm($user);

            if ($user_form['is_valid']) {
                //$userService = new AuthService();
                $errors = $this->auth->validateUser($user);

                if (empty($errors)) {
                    $this->auth->addUser($user);
                    $this->flash->addMessage('success', 'New user added');
                    return $response->withRedirect($this->router->pathFor('admin-users-all'));
                } else {
                    $flash_messages['danger'] = $errors;
                }
            } else {
                $field_errors = $user_form['has_errors'];
            }
        }
        return $this->view->render($response, 'admin/admin_users_add.twig', [
                    'user' => $user,
                    'roles' => $roles,
                    'flash_messages' => $flash_messages,
                    'errors' => $field_errors,
                    //'userLogged' => isset($_SESSION['user_id']),
                    'csrf' => [
                        'name' => $request->getAttribute('csrf_name'),
                        'value' => $request->getAttribute('csrf_value'),
                    ]
        ]);
    })->setName('admin-users-add');


    $this->map(['GET', 'POST'], '/edit/{id:[\d]*}', function ($request, $response, $args) {
        $user = [];
        $id = (int) $args['id'];
        $roles = $this->auth->getRoles();
        $flash_messages = $this->flash->getMessages();

        $user = $this->auth->getUserById($id);

        if ($request->isPost()) {

            $user['full_name'] = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);
            $user['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $user['role_id'] = filter_var($_POST['role_id'], FILTER_SANITIZE_NUMBER_INT);

            $user_form = validateUserEditForm($user);

            if ($user_form['is_valid']) {
                $this->auth->updateUser($user);
                $this->flash->addMessage('success', 'User details have been updated');
                return $response->withRedirect($this->router->pathFor('admin-users-all'));
            } else {
                $field_errors = $user_form['has_errors'];
            }
        }

        return $this->view->render($response, 'admin/admin_users_edit.twig', [
                    'user' => $user,
                    'roles' => $roles,
                    'flash_messages' => $flash_messages,
                   // 'userLogged' => isset($_SESSION['user_id']),
                    'csrf' => [
                        'name' => $request->getAttribute('csrf_name'),
                        'value' => $request->getAttribute('csrf_value'),
                    ]
        ]);
    })->setName('admin-users-edit');


    $this->map(['GET', 'POST'], '/delete/{id:[\d]*}', function ($request, $response, $args) {
        $user = [];
        $id = (int) $args['id'];

        $flash_messages = $this->flash->getMessages();
        //$userService = new AuthService();
        $user = $this->auth->getUserById($id);

        $OK_link = $this->router->pathFor('admin-users-delete', ['id' => $id]);

        if ($request->isPost()) {
            $this->auth->deleteUser($id);
            $this->flash->addMessage('success', 'User has been successfully deleted');
            return $response->withRedirect($this->router->pathFor('admin-users-all'));
        }

        return $this->view->render($response, 'admin/admin_users_delete.twig', [
                    'user' => $user,
                    'OK_link' => $OK_link,
                    'flash_messages' => $flash_messages,
                   // 'userLogged' => isset($_SESSION['user_id']), MOVED TO GLOBAL SECTION
                    'csrf' => [
                        'name' => $request->getAttribute('csrf_name'),
                        'value' => $request->getAttribute('csrf_value'),
                    ]
        ]);
    })->setName('admin-users-delete');

    //END OF GROUP ROUTES
    //group level middleware good example of middleware
    //are you entitled to be an administrator??
})->add(function ($request, $response, $next) use ($app) {
    if ($_SESSION['user_role'] != 'ADMIN') {
        $app->flash->addMessage('danger', 'Please login with admin privileges');
        return $response->withRedirect($app->router->pathFor('login'));
    }
    return $next($request, $response);
});

//NEED TO KNOW USER IS LOGGED IN AND ADMIN





