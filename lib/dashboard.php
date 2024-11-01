<?php


add_action('admin_menu', 'userstatswpworbee_add_menu');
function userstatswpworbee_add_menu()
{
	add_menu_page(
		'User Stats WP',
		'User Stats WP',
		'manage_options',
		'user-stats-wp',
		'userstatswpworbee_dashboard',
		'dashicons-id-alt'
	);
}

function userstatswpworbee_dashboard()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'userstatswpworbee';

	$sql =
		"SELECT * FROM $table_name
    ORDER BY event_time DESC
    LIMIT 100";
	$events = $wpdb->get_results($sql, ARRAY_A);
	?>
	<div class="wrap userstatswp">
		<h2>User Stats WP</h2>
		<p>Showing the last 100 entries</p>

		<table>
			<thead>
			<tr>
				<th>Time</th>
				<th>User</th>
				<th>Event</th>
				<th class="no-sort">Details</th>
			</tr>
			</thead>
			<tbody>
			<?php

			foreach ($events as $event) {
				echo '<tr>';
				echo '<td>' . esc_html($event['event_time']) . '</td>';
				echo '<td>' . esc_html(get_user_by('id', $event['user_id'])->data->display_name) . '</td>';
				echo '<td>' . esc_html($event['event_type']) . '</td>';
				echo '<td style="white-space: pre-wrap">' . esc_html($event['event_details']) . '</td>';
				echo '</tr>';
			}
			?>
			</tbody>
		</table>
	</div>
	<script>
		jQuery(document).ready(function () {
			jQuery('.userstatswp table').DataTable({
				"paging": false,
				fixedHeader: true,
				"order": [[0, "desc"]],
				columnDefs: [
					{ orderable: false, targets: 3 }
				],
			});
		});
	</script>
	<?php
}

