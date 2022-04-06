<?php

class UsersController
{
    public function __construct()
    {
        if (!auth()->check()) {
            redirect('/login');
        }
    }

    public function addUserForm()
    {
        render('add_user');
    }

    public function addUser()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        $users_repo = new UsersRepository(Base::getInstance()->get('DB'));
        if ($users_repo->exists($username)) {
            Flash::set('danger', 'نام کاربری واردشده در حال حاضر موجود است.');
            redirect('/add_user');
        }
        if ($password != $password_confirm) {
            Flash::set('danger', 'رمز عبور واردشده و تکرار آن با یکدیگر مطابقت ندارند.');
            redirect('/add_user');
        }
        $users_repo->add($username, $password);
        Flash::set('success', 'کاربر با موفقیت اضافه شد.');
        redirect('/add_user');
    }

    public function changePasswordForm()
    {
        render('change_password');
    }

    public function changePassword()
    {
        $username = auth()->user();
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        $users_repo = new UsersRepository(Base::getInstance()->get('DB'));
        if ($password != $password_confirm) {
            Flash::set('danger', 'رمز عبور واردشده و تکرار آن با یکدیگر مطابقت ندارند.');
            redirect('/change_password');
        }
        $users_repo->changePassword($username, $password);
        Flash::set('success', 'رمز عبور با موفقیت تغییر یافت.');
        redirect('/change_password');
    }
}
