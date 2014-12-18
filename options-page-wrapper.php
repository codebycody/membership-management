<?php
$totalUsers = count(get_users());

if(isset($_POST['new_role']) && isset($_POST['user'])){
	$users = $_POST['user'];
	global $wpdb;
	$table_name = $wpdb->prefix . 'users';
	foreach ($users as $user) {
		$sql = 'UPDATE ' . $table_name . ' SET membership_management_level = ' . $_POST['new_role'] . ' WHERE ID = ' . $user;
		$wpdb->query($sql);
	}
}
?>
<div class="wrap">
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-1">
			<h1>Membership Management</h1>
			<form method="post" action="">
				<div class="tablenav top">
					<div class="alignleft actions">
						<label for="new_role" class="screen-reader-text">Change role to…</label>
							<select id="new_role" name="new_role">
								<option value="">Change level to…</option>
								<option value="1">Gold</option>
								<option value="2">Silver</option>
								<option value="3">Bronze</option>
							</select>
						<input type="submit" value="Change" class="button" id="changelevel" name="changelevel">
					</div>
					<div class="tablenav-pages one-page">
						<span class="displaying-num"><?php echo $totalUsers; ?> users</span>
					</div>
					<br class="clear">
				</div>
				<table class="wp-list-table widefat fixed users">
					<thead>
						<tr>
							<th style="" class="manage-column column-cb check-column" id="cb" scope="col">
								<label for="cb-select-all-1" class="screen-reader-text">Select All</label>
								<input type="checkbox" id="cb-select-all-1">
							</th>
							<th style="" class="manage-column column-username sortable desc" id="username" scope="col">
								<a href="http://localhost/wordpress/wp-admin/users.php?orderby=login&amp;order=asc">
									<span>Username</span>
									<span class="sorting-indicator"></span>
								</a>
							</th>
							<th style="" class="manage-column column-name sortable desc" id="name" scope="col">
								<a href="http://localhost/wordpress/wp-admin/users.php?orderby=name&amp;order=asc">
									<span>Name</span>
									<span class="sorting-indicator"></span>
								</a>
							</th>
							<th style="" class="manage-column column-email sortable desc" id="email" scope="col">
								<a href="http://localhost/wordpress/wp-admin/users.php?orderby=email&amp;order=asc">
									<span>E-mail</span>
									<span class="sorting-indicator"></span>
								</a>
							</th>
							<th style="" class="manage-column column-role" id="role" scope="col">Membership Level</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th style="" class="manage-column column-cb check-column" scope="col">
								<label for="cb-select-all-2" class="screen-reader-text">Select All</label>
								<input type="checkbox" id="cb-select-all-2">
							</th>
							<th style="" class="manage-column column-username sortable desc" scope="col">
								<a href="http://localhost/wordpress/wp-admin/users.php?orderby=login&amp;order=asc">
									<span>Username</span>
									<span class="sorting-indicator"></span>
								</a>
							</th>
							<th style="" class="manage-column column-name sortable desc" scope="col">
								<a href="http://localhost/wordpress/wp-admin/users.php?orderby=name&amp;order=asc">
									<span>Name</span>
									<span class="sorting-indicator"></span>
								</a>
							</th>
							<th style="" class="manage-column column-email sortable desc" scope="col">
								<a href="http://localhost/wordpress/wp-admin/users.php?orderby=email&amp;order=asc">
									<span>E-mail</span>
									<span class="sorting-indicator"></span>
								</a>
							</th>
							<th style="" class="manage-column column-role" scope="col">Membership Level</th>
						</tr>
					</tfoot>
					<tbody data-wp-lists="list:user" id="the-list">
						<?php foreach (get_users() as $i => $value) { ?>
						<tr class="alternate" id="user-<?php echo $value->ID; ?>">
							<th class="check-column" scope="row">
								<label for="cb-select-1" class="screen-reader-text">Select <?php echo $value->user_login; ?></label>
								<input type="checkbox" value="<?php echo $value->ID; ?>" class="user" id="user_<?php echo $value->ID; ?>" name="user[]">
							</th>
							<td class="column-username">
								<?php echo get_avatar($value->ID, 32); ?>
								<strong><a href=""><?php echo $value->user_login; ?></a></strong><br>
							</td>
							<td class="column-name"><?php echo $value->display_name; ?></td>
							<td class="column-email">
								<a title="E-mail: <?php echo $value->user_email; ?>" href="mailto:<?php echo $value->user_email; ?>"><?php echo $value->user_email; ?></a>
							</td>
							<td class="column-membership"><?php if($value->membership_management_level == 1){echo "Gold";}elseif($value->membership_management_level == 2){echo "Silvier";}elseif($value->membership_management_level == 3){echo "Bronze";} ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<div class="tablenav bottom">
					<div class="tablenav-pages one-page">
						<span class="displaying-num"><?php echo $totalUsers; ?> users</span>
						<br class="clear">
					</div>
				</div>
			</form>
		</div><!-- /#post-body -->
	</div><!-- /#poststuff -->
</div><!-- /.wrap -->

<?php  ?>