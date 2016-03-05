<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/5/16
 * Time: 12:26 AM
 */



function insert_user_email(){
    $wpdb->insert(
        'wp_subscribers',
        array('email', $email)
    )
);
}

