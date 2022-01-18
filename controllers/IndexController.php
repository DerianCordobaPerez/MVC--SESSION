<?php
<<<<<<< HEAD
use JetBrains\PhpStorm\NoReturn;
include_once 'LoginController.php';
include_once 'SearchController.php';
include_once 'StudentController.php';
include_once 'CarController.php';
include_once 'components/Alerts.php';
include_once 'helpers/generate_alert.php';
=======

use JetBrains\PhpStorm\NoReturn;

>>>>>>> 33a280e8ed68f1026b0fb59fe6f81dfe034d9f6b
class IndexController {

    public function __construct() {}

    #[NoReturn] public function init(): void {
        $module = "";
        if(isset($_REQUEST['module']))  $module = $_REQUEST['module'];

<<<<<<< HEAD
        if($module === 'login')
            LoginController::init();
        else if($module === 'student') {
            if(!LoginController::exists_session()) generated_alert();
            else {
                include_once 'StudentController.php';
                StudentController::init();
            }
        } else if($module === 'car') {
            if(!LoginController::exists_session()) generated_alert();
            else {
                include_once 'CarController.php';
                CarController::init();
            }
        } else if($module === 'search') {
            if(!LoginController::exists_session()) generated_alert();
            else {
                include_once 'SearchController.php';
                SearchController::init();
            }
        }
=======
        if($module === 'student') {
            include_once 'StudentController.php';
            StudentController::init();
        } else if($module === 'car') {
            include_once 'CarController.php';
            CarController::init();
        }
        redirect();
>>>>>>> 33a280e8ed68f1026b0fb59fe6f81dfe034d9f6b
    }
}