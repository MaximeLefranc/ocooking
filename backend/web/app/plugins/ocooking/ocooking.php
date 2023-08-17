<?php
/*
Plugin Name:   Ocooking
Author:        Max Lefranc
*/

// Load the new post-type
require plugin_dir_path(__FILE__) . './post-types/recette.php';

// Load new taxonomies
require plugin_dir_path(__FILE__) . './taxonomies/ingredient.php';
require plugin_dir_path(__FILE__) . './taxonomies/famille.php';

// Load new role functions
require plugin_dir_path(__FILE__) . './roles/cuisinier.php';

// Load a new API root 
require plugin_dir_path(__FILE__) . './custom-endpoints/registration.php';

if (!function_exists('ocookingActivationPlugin')) {
    function ocookingActivationPlugin()
    {
        ocookingCreateCuisinierRole();
    }
    register_activation_hook(__FILE__, 'ocookingActivationPlugin');
}

if (!function_exists('ocookingDeactivationPlugin')) {
    function ocookingDeactivationPlugin()
    {
        ocookingRemoveCuisinierRole();
    }
    register_deactivation_hook(__FILE__, 'ocookingDeactivationPlugin');
}
