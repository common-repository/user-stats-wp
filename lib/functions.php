<?php

function userstatswpworbee_add_event($user_id, $event_type, $event_details = [])
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'userstatswpworbee';
	$event_details = htmlspecialchars(json_encode($event_details, JSON_PRETTY_PRINT));

	$wpdb->query($wpdb->prepare("
      INSERT INTO `$table_name`
      (user_id, event_time, event_type, event_details)
      VALUES
      (%d, NOW(), %s, %s)
    ",
		$user_id, $event_type, $event_details));
}

function userstatswpworbee_delete_all_entries()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'userstatswpworbee';

	$wpdb->query("DELETE FROM $table_name");
}

function userstatswpworbee_drop_table()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'userstatswpworbee';

	$wpdb->query("DROP TABLE $table_name");
}
