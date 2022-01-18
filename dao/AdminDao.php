<?php
include_once 'models/Admin.php';
include_once 'models/Connection.php';
include_once 'helpers/set_bind_value.php';
include_once 'components/Alerts.php';
class AdminDao {
    public function __construct() {}

    /**
     * @param Admin $admin
     * @return bool
     */
    public function register_admin(Admin $admin): bool {
        $correct = false;
        $query = 'INSERT INTO Admin (license, password) VALUES (:license, :password)';
        try {
            $insert = Connection::connect_database()->prepare($query);
            set_bind_value(
                array($admin->get_license(), $admin->get_password()),
                array('license', 'password'),
                $insert
            );
            $insert->execute();
            $correct = true;
            Alerts::alert('success', 'Se registro el administrador');
        } catch(PDOException $exception) {
            Alerts::alert('warning', 'No se pudo registrar el administrador');
        }
        return $correct;
    }

    /**
     * @param $license
     * @return Admin|null
     */
    public function get_admin($license, $password): ?Admin {
        $query = 'SELECT * FROM Admin WHERE license = :license AND password = :password';
        $admin = null;
        try {
            $select = Connection::connect_database()->prepare($query);
            set_bind_value(array($license, $password), array('license', 'password'), $select);
            $select->execute();
            if($select->rowCount()) {
                $admin = new Admin();
                $this->set_student($admin, $select->fetch());
            }
        } catch (Exception $exception) {}
        return $admin;
    }

    /**
     * @param Admin $admin
     * @param mixed $item
     */
    private function set_student(Admin $admin, mixed $item): void {
        $admin->set_license($item['license']);
        $admin->set_password($item['password']);
    }
}