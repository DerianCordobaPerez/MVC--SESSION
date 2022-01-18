<?php
include_once 'components/Divs.php';
include_once 'components/Form.php';
include_once 'components/Input.php';
include_once 'components/Button.php';
include_once 'components/Html.php';
include_once 'components/Title.php';
class LoginRegisterView {

    public function __construct() {}

    public function login_form($route = "login"): void {
        $title = $route === "login" ? 'Inicio de Sesion' : 'Registro';
        Html::open_html('Login');

        Divs::open_div('row');
        Divs::open_div('col');
        Divs::close_div();

        Divs::open_div('col my-4');
        Divs::open_div('container box-container my-4 bg-white p-4');
        Title::title_void('h3', $title, 'text-center');
        Form::open_form("?module=login&action=$route", 'POST');

        Divs::open_div('mb-3');
        Input::input('form-control', "<i class='far fa-user'></i>", 'text', 'license', 'Carnet');
        Divs::close_div();

        Divs::open_div('mb-3');
        Input::input('form-control', "<i class='fas fa-key'></i>", 'password', 'password', 'Password');
        Divs::close_div();

        Divs::open_div('d-grid gap-2');
        echo Button::button("btn btn-primary", "login", $title, 'submit');
        Divs::close_div();
        Divs::close_div();
        Divs::close_div();

        Divs::open_div('col');
        Divs::close_div();

        Divs::close_div();

        Html::close_html();
    }
}