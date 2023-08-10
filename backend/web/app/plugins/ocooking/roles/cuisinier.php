<?php

function ocookingCreateCuisinierRole()
{
    add_role('cuisinier', 'Cuisinier', get_role('editor')->capabilities);
}

function ocookingRemoveCuisinierRole()
{
    remove_role('cuisinier');
}
