<?php
/*
Plugin Name:   Ocooking
Author:        Max Lefranc
*/

// Load the new post-type
require plugin_dir_path(__FILE__) . './post-types/recette.php';

// Load new taxonomies
require plugin_dir_path(__FILE__) . './taxonomies/ingredient.php';
require plugin_dir_path(__FILE__) . './taxonomies/type.php';
