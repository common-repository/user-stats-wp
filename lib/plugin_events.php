<?php
function userstatswpworbee_activate()
{
	global $wpdb;

	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'userstatswpworbee';

	$sql =
		"CREATE TABLE  IF NOT EXISTS $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			user_id mediumint(9) NOT NULL,
			event_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			event_type varchar(20) NOT NULL,
			event_details text NOT NULL,
			PRIMARY KEY  (id),
			INDEX (event_time),
			INDEX (user_id)
  		) $charset_collate;";

	$wpdb->query($sql);
}

function userstatswpworbee_post_is_saved($post_id, $post, $update)
{
	$user_id = get_current_user_id();

	$data = [];
	$data['type'] = $post->post_type;
	$data['title'] = $post->post_title;
	$data['parent'] = $post->post_parent;

	userstatswpworbee_add_event($user_id, 'Entry Updated', $data);
}

function userstatswpworbee_attachment_is_added($attachment_ID)
{
	global $current_user;
	$user_id = $current_user->ID;

	$post = get_post( $attachment_ID );
	$data = [];
	$data['type'] = $post->post_type;
	$data['title'] = $post->post_title;
	$data['parent'] = $post->post_parent;

	userstatswpworbee_add_event($user_id, 'Attachment added', $data);
}

