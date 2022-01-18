<?php
include_once 'views/LoginRegisterView.php';
include_once 'views/IndexView.php';
include_once 'components/Alerts.php';
include_once 'models/Admin.php';
include_once 'dao/AdminDao.php';
class LoginController {

    public function __construct() {}

    public static function init(): void {
        $action = "";
        if(isset($_REQUEST['action'])) $action = $_REQUEST['action'];

        if($action === "logout") self::logout();
        else if($action === 'login') self::login();
        else if($action === 'register') self::render_form_login("add");
        else if($action === 'add') self::register();

        if($action !== 'register') echo "<script src='public/js/redirect.js'></script>";
    }

    private static function render_form_login($route = "login"): void {
        (new LoginRegisterView())->login_form($route);
    }

    private static function render_index(): void {
        (new IndexView())->show_index('Practica #05');
    }

    public static function exists_session(): bool {
        return isset($_SESSION['user']);
    }

    public static function render_page(): void {
        if(isset($_SESSION['user'])) self::render_index();
        else self::render_form_login();
    }

    private static function login(): void {
        $license = $_REQUEST['license'];
        $password = $_REQUEST['password'];
        if (($admin = (new AdminDao())->get_admin($license, $password))) {
            $_SESSION['user'] = $admin->get_license().time();
            Alerts::alert('success', 'Sesion iniciada correctamente ');
        } else Alerts::alert('danger', 'Datos incorrectos');
    }

    private static function logout(): void {
        $_SESSION = array();
        session_destroy();
        Alerts::alert('success', 'Sesion cerrada correctamente');
    }

    private static function register(): void {
        $admin = new Admin(
            $_REQUEST['license'],
            $_REQUEST['password'],
        );
        if(!(new AdminDao())->register_admin($admin))
            Alerts::alert('danger', 'No se ha podido registrar el administrador');
        else
            Alerts::alert('success', 'Se registro correctamente el administrador');
    }
}