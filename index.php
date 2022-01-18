<?php
<<<<<<< HEAD
    session_start();

    include_once 'controllers/LoginController.php';
    include_once 'controllers/IndexController.php';
    (new LoginController())::render_page();
=======
    include_once 'views/IndexView.php';
    include_once 'controllers/IndexController.php';
    (new IndexView())->show_index('Practica #04');
>>>>>>> 33a280e8ed68f1026b0fb59fe6f81dfe034d9f6b
    (new IndexController)->init();