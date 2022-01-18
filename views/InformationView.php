<?php
include_once 'controllers/StudentController.php';
include_once 'controllers/CarController.php';
include_once 'IndexView.php';
<<<<<<< HEAD
include_once 'components/Form.php';
include_once 'components/Input.php';
include_once 'components/Divs.php';
=======
>>>>>>> 33a280e8ed68f1026b0fb59fe6f81dfe034d9f6b
class InformationView {

    public function __construct() {}

    public function show_content() {
        $students = (new StudentController())->get_all_students();
        $cars = (new CarController())->get_all_cars();

        if(count($students) || count($cars))
            self::show_header_titles(array("Imagen", "Informacion", "Acciones"));

        if(count($students)) {
            Title::title_with_strong_void('h2', 'Estudiantes', 'text-center');
            foreach($students as $student)
                self::show_full_content($student);
        }
        if(count($cars)) {
<<<<<<< HEAD
            self::search();
=======
>>>>>>> 33a280e8ed68f1026b0fb59fe6f81dfe034d9f6b
            Title::title_with_strong_void('h2', 'Autos', 'text-center');
            foreach($cars as $car)
                self::show_full_content($car);
        }
        if(!(count($students)) && !(count($cars))) {
            Title::title_with_strong_void('h2', 'No hay modelos registrados', 'text-center');
            Divs::open_div('d-grid gap-2');
            echo Button::button_collapse('btn btn-primary', 'headingOne', 'Registra un nuevo modelo', 'collapseOne');
            Divs::close_div();
        }
    }

    /**
     * Inserta el contenido completo para un estudiante, en el apartado de listado de estudiante
     * @param mixed $model
     * @return void
     */
<<<<<<< HEAD
    public static function show_full_content(mixed $model, string $condition = "non"): void {
        // Contenedor de las partes correspondientes para el contenido del html
        $id = -1;
        if($model) $id = $model->get_id();
=======
    public static function show_full_content(mixed $model): void {
        // Contenedor de las partes correspondientes para el contenido del html
        $id = $model->get_id();
>>>>>>> 33a280e8ed68f1026b0fb59fe6f81dfe034d9f6b
        $module = $model instanceof Student ? "student" : "car";
        $route = "?module=$module&action";
        $content = array(
            self::show_photo_student($model->get_photo(), $model instanceof Student ? 'students' : 'cars'),
            IndexView::get_array_strings($model),
            array(
                Button::button_modal("btn btn-warning d-block mx-auto", "editButton", "<a class='link nav-link' href='$route=edit&id=$id'>Editar</a>"),
                Button::button_modal("btn btn-danger d-block mx-auto my-4", "deleteButton", "<a class='link nav-link' href='$route=delete&id=$id'>Borrar</a>")
            ),
        );
        // Maquetacion del html mediante funciones
        Divs::open_div('row');
        foreach($content as $item) {
            Divs::open_div('col-md-4');
            if(is_array($item)) {
                foreach($item as $string)
                    echo $string;
            } else  {
                Divs::open_div('d-grid gap-2');
                echo $item;
                Divs::close_div();
            }
            Divs::close_div();
        }
<<<<<<< HEAD
        if($condition !== "non") echo Button::button('btn btn-primary m-4', 'back', "<a class='link' href='index.php'>Regresar al inicio</a>");
=======
>>>>>>> 33a280e8ed68f1026b0fb59fe6f81dfe034d9f6b
        Divs::close_div();
        echo "<hr />";
    }

    /**
    * Inserta en pantalla de manera automatica los titulos superior del apartado lista de estudiantes
    * @param array|null $titles
    * @return void
    */
    private static function show_header_titles(array|null $titles): void {
        Divs::open_div('row');
        foreach($titles as $title) {
            Divs::open_div('col-md-4');
            Title::title_void('h3', $title, 'text-center');
            Divs::close_div();
        }
        Divs::close_div();
        echo "<hr />";
    }

    /**
     * Inserta la imagen del usuario
     * @param string $name
<<<<<<< HEAD
     * @param string $folder
=======
>>>>>>> 33a280e8ed68f1026b0fb59fe6f81dfe034d9f6b
     * @return string
     */
    public static function show_photo_student(string $name, string $folder): string {
        return "
            <div class='image-shadow'>
                <img class='rounded mx-auto d-block image' src='uploads/$folder/$name' alt='Foto de perfil'/>
            </div>
        ";
    }
<<<<<<< HEAD

    private static function search(): void {
        Form::open_form('index.php?module=search&action=search', 'POST');
        Title::title_void('h3', 'Buscar auto por placa', 'text-center');
        Divs::open_div('row m-4');
        Input::input('form-control', '<i class="fas fa-search"></i>', 'text', 'license', 'Placa del autos', '', true, false, 'license', '', 'maxlength="10"');
        Divs::close_div();
        Form::close_form();
    }
=======
>>>>>>> 33a280e8ed68f1026b0fb59fe6f81dfe034d9f6b
}