<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/4/16
 * Time: 5:06 PM
 */
/**
 * Add widget to top menu in dashboard panel
 */
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
    global $wp_meta_boxes;

    wp_add_dashboard_widget('custom_help_widget', 'Subscribed users', 'subscribers_grid');
}

/**
 * Output subscibed users
 */
function subscribers_grid() {
    echo '<b>Hi all! This will output the users grid:</b> <br/>';
    show_subscribers();
}

function show_subscribers() {
    global $wpdb;

    $appTable = $wpdb->prefix . "subscribers";
    // echo $appTable;
    $query = $wpdb->prepare("SELECT * FROM $appTable", RID);
    $subscribers = $wpdb->get_results($query);

    foreach ( $subscribers as $subscriber ) {
        echo $subscriber->email . "<br/>";
    }
}