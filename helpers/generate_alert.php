<?php

    function generated_alert(): void {
        Alerts::alert('warning', 'No estas autorizados para acceder a estas rutas');
        echo "<script src='public/js/redirect.js'></script>";
    }
