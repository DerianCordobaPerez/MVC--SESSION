<?php
class Input {
    private function __construct() {}

    /**
     * Componente input
     * @param string $class
     * @param string $title_span
     * @param string $type
     * @param string $name
     * @param string $placeholder
     * @param string $value
     * @param bool $exist_span
     * @param string $license
     * @param string $values
     * @param string $id
     * @param string $required
     * @return void
     */
<<<<<<< HEAD
    public static function input(string $class, string $title_span, string $type, string $name, string $placeholder, string $value = '', $exist_span = true, $readonly = false, string $id = "", string $license = "", string $values = "", bool $required = true): void {
        include_once 'components/Span.php';
=======
    public static function input(string $class, string $title_span, string $type, string $name, string $placeholder, string $value = '', $exist_span = true, $readonly = false, string $id = "", string $license = "", string $values = ""): void {
>>>>>>> 33a280e8ed68f1026b0fb59fe6f81dfe034d9f6b
        Divs::open_div('input-group');
            if($exist_span) Span::span('input-group-text', $title_span);
            echo "<input class='$class' type='$type' name='$name' ";
            if($readonly) echo " readonly ";
            if($type === 'number' || $type === 'text') echo $values;
            if($id !== "") echo " id='$id' ";
<<<<<<< HEAD
            echo " placeholder='$placeholder' value='$value' ";
            if($required) echo "required";
            echo " />";
=======
            echo " placeholder='$placeholder' value='$value' required />";
>>>>>>> 33a280e8ed68f1026b0fb59fe6f81dfe034d9f6b
        Divs::close_div();
    }

    /**
     * Componente input string
     * @param string $class
     * @param string $type
     * @param string $name
     * @param string $value
     * @return string
     */
    public static function input_string(string $class, string $type, string $name, string $value = ''): string {
        return "<input class='$class' type='$type' name='$name' value='$value' required />";
    }

    /**
     * Componente input hidden
     * @param string $name
     * @param string $value
     * @retun void
     */
    public static function input_hidden(string $name, string $value): void {
        echo "<input type='hidden' name='$name' value='$value'/>";
    }
}
