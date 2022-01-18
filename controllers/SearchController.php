<?php
include_once 'models/Car.php';
include_once 'components/Alerts.php';
include_once 'components/Divs.php';
include_once 'views/InformationView.php';
class SearchController {
    public function __construct() {}

    public static function init(): void {
        $action = "";
        if(isset($_REQUEST['action'])) $action = $_REQUEST['action'];
        if($action === "search") self::render_car();
    }

    private static function render_car(): void {
        Divs::open_div('container bg-white');
        (new InformationView())::show_full_content(self::get_car($_REQUEST['license']), "select");
        Divs::close_div();
    }

    /**
     * @param $license
     * @return Car|null
     */
    private static function get_car($license): ?Car {
        if(!($car = (new CarDao)->get_car_license($license)))
            Alerts::alert('success', 'No se encontro el auto');
        else
            Alerts::alert('success', 'Auto encontrado: '.$car->get_license());
        return $car;
    }
}