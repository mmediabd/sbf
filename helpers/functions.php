<?php 
if (! function_exists('old')) {
    /**
     * Get the old name of form field
     *
     * @param  string|object  $class
     * @return string
     */
    function old($field)
    {
        if (isset($_POST[$field])) {
            echo escape($_POST[$field]);
        }
    }
}

if (! function_exists('escape')) {
    /**
     * Get the class "basename" of the given object / class.
     *
     * @param  string|object  $class
     * @return string
     */
    function escape($value)
    {
        return htmlspecialchars(trim($value), ENT_QUOTES);
    }
}

if (! function_exists('option')) {

	function option($name, $value) {
		if(isset($_POST[$name]) && $_POST[$name] == $value) {
			echo "checked";
		} 
	}
}


