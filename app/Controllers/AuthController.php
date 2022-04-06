<?php

class AuthController
{
    public function __construct()
    {
        if (auth()->check()) {
            redirect('/');
        }
    }

    public function loginForm()
    {
        render('login');
    }

    public function login()
    {
        $base = Base::getInstance();
        $users_repo = new UsersRepository($base->get('DB'));
        if (!$users_repo->exists($_POST['username'])) {
            Flash::set('danger', 'نام کاربری یا رمز عبور نادرست است.');
            redirect('/login');
        }
        $password_hash = $users_repo->getPassword($_POST['username']);
        if (!password_verify($_POST['password'], $password_hash)) {
            Flash::set('danger', 'نام کاربری یا رمز عبور نادرست است.');
            redirect('/login');
        }
        $expiration_time = time()
            + (isset($_POST['remember'])
            ? $base->get('EXTENDED_EXP')
            : $base->get('DEFAULT_EXP'));
        $payload = [
            'user' => $_POST['username'],
            'exp' => $expiration_time
        ];
        setcookie('authorization', JWT::encode($payload), $expiration_time);
        Flash::set('success', 'شما با موفقیت وارد شدید.');
        redirect('/');
    }

    public function logout()
    {
        setcookie('authorization', null, -1);
        redirect('/login');
    }
}
