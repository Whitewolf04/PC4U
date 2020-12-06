<?php
    function dynamic_select($the_array, $element_name, $label, $init_value) {
        $menu = '';
        if ($label != '') {
            $menu .= '<label for="'.$element_name.'">'.$label.'</label>';
        }
        $menu .= '<select name="'.$element_name.'" id="'.$element_name.'">';
            
        if (empty($_REQUEST[$element_name])) {
            $curr_val = $init_value;
        } else {
            $curr_val = $_REQUEST[$element_name];
        }
        foreach ($the_array as $key => $value) {
            $menu .= '<option value="'.$key.'"';
            if ($key == $curr_val) {
                $menu .= ' selected="selected"';
            }
            $menu .= '>'.$value.'</option>';
        }
        $menu .= '</select>';
        return $menu;
    }

    
?>
