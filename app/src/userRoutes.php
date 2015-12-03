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