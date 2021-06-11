<?php

// Add the Importer role.
add_action( 'init', 'jmts_add_importer_role' );

function jmts_add_importer_role() {
    add_role(
        'importer',
        'Importer',
        array(
            'read'         => true,
            'edit_posts'   => true,
            'upload_files' => true,
        ),
    );
}
 

    