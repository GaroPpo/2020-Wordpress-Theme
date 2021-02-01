<?php
function wordpress__wp_title($title, $sep)
{
	global $paged, $page;
	if (is_feed()) {
		return $title;
	}

	$title .= get_bloginfo('name');
	$site_description = get_bloginfo('description', 'display');

	if ($site_description && (is_home() || is_front_page())) {
		$title = "$title";
	}

	if ($paged >= 2 || $page >= 2) {
		$title = "$title $sep " . sprintf(__('Page %s', 'read'), max($paged, $page));
	}
	return $title;
}
add_filter('wp_title', 'wordpress__wp_title', 10, 2);

/*
============================================================================================*/
function register_navwalker()
{
	if (!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
		// File does not exist... return an error.
		return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
	} else {
		// File exists... require it.
		require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
	}
}
add_action('after_setup_theme', 'register_navwalker');
register_nav_menus(array(
	'primary' => __('Primary Menu', 'mcmxcvviix'),
));


/* Featured Image
============================================================================================*/
add_theme_support('post-thumbnails');

/* Theme Options
============================================================================================*/
// Add Theme Options Page
$themename = "Eric Liputra 2020 Wordpress Theme";
$shortname = "WordpressTheme2020";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list) {
	$wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category");

$options = array(

	array("name" => $themename . " Options", "type" => "title"),

	// General Section
	array("name" => "General", "type" => "section"),
	array("type" => "open"),

	array(
		"name" => "Favicon / Touch Icon",
		"desc" => "Enter the link to your favicon image, recommended size is 152x152.",
		"id" => $shortname . "_favicon_touch_icon",
		"type" => "text",
		"std" => ""
	),

	array("type" => "close"),

	// Footer Section
	array("name" => "Footer", "type" => "section"),
	array("type" => "open"),

	array(
		"name" => "Social Link 1",
		"desc" => "Enter the link to an your social media.",
		"id" => $shortname . "_social_link_1",
		"type" => "text",
		"std" => ""
	),

	array(
		"name" => "Social Link 1 Name",
		"desc" => "Enter your social media name.",
		"id" => $shortname . "_social_link_1_name",
		"type" => "text",
		"std" => ""
	),

	array(
		"name" => "Social Link 2",
		"desc" => "Enter the link to an your social media.",
		"id" => $shortname . "_social_link_2",
		"type" => "text",
		"std" => ""
	),

	array(
		"name" => "Social Link 2 Name",
		"desc" => "Enter your social media name.",
		"id" => $shortname . "_social_link_2_name",
		"type" => "text",
		"std" => ""
	),

	array(
		"name" => "Social Link 3",
		"desc" => "Enter the link to an your social media.",
		"id" => $shortname . "_social_link_3",
		"type" => "text",
		"std" => ""
	),

	array(
		"name" => "Social Link 3 Name",
		"desc" => "Enter your social media name.",
		"id" => $shortname . "_social_link_3_name",
		"type" => "text",
		"std" => ""
	),

	array(
		"name" => "Social Link 4",
		"desc" => "Enter the link to an your social media.",
		"id" => $shortname . "_social_link_4",
		"type" => "text",
		"std" => ""
	),

	array(
		"name" => "Social Link 4 Name",
		"desc" => "Enter your social name.",
		"id" => $shortname . "_social_link_4_name",
		"type" => "text",
		"std" => ""
	),

	array(
		"name" => "Social Link 5",
		"desc" => "Enter the link to an your social media.",
		"id" => $shortname . "_social_link_5",
		"type" => "text",
		"std" => ""
	),

	array(
		"name" => "Social Link 5 Name",
		"desc" => "Enter your social media name.",
		"id" => $shortname . "_social_link_5_name",
		"type" => "text",
		"std" => ""
	),

	array(
		"name" => "Google Analytics Code",
		"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
		"id" => $shortname . "_ga_code",
		"type" => "textarea",
		"std" => " "
	),

	array("type" => "close")
);

// Theme Admin Function
function mytheme_add_admin()
{
	global $themename, $shortname, $options;

	if (isset($_GET['page']) && $_GET['page'] == basename(__FILE__)) {
		if ('save' == isset($_REQUEST['action'])) {
			foreach ($options as $value) {
				update_option($value['id'], $_REQUEST[$value['id']]);
			}

			foreach ($options as $value) {
				if (isset($_REQUEST[$value['id']])) {
					update_option($value['id'], $_REQUEST[$value['id']]);
				} else {
					delete_option($value['id']);
				}
			}
			header("Location: admin.php?page=functions.php&saved=true");
			die;
		} else if ('reset' == isset($_REQUEST['action'])) {
			foreach ($options as $value) {
				delete_option($value['id']);
			}
			header("Location: admin.php?page=functions.php&reset=true");
			die;
		}
	}
	add_menu_page('Theme Panel', 'Theme Panel', 'administrator', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init()
{
	$file_dir = get_bloginfo('template_directory');

	wp_enqueue_style("functions", $file_dir . "/admin/admin.css", false, "1.0", "all");
}

//Show Theme Admin to Menu
function mytheme_admin()
{
	global $themename, $shortname, $options;
	$i = 0;

	if (isset($_REQUEST['saved'])) {
		echo '<div id="message" class="updated fade"><p><strong>' . $themename . ' settings saved.</strong></p></div>';
	} else if (isset($_REQUEST['reset'])) {
		echo '<div id="message" class="updated fade"><p><strong>' . $themename . ' settings reset.</strong></p></div>';
	}
?>
	<div class="wrap rm_wrap">
		<h2>Theme Panel</h2>
		<div class="rm_opts">
			<form method="post">
				<?php foreach ($options as $value) {
					switch ($value['type']) {
						case "open": ?>
						<?php break;
						case "close": ?>
		</div>
	</div>
	<br />
<?php break;
						case "title": ?>

<?php break;
						case 'text': ?>
	<div class="rm_input rm_text">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if (get_option($value['id']) != "") {
																																																															echo stripslashes(get_option($value['id']));
																																																														} else {
																																																															echo $value['std'];
																																																														} ?>" />

		<small><?php echo $value['desc']; ?></small>
		<div class="clearfix"></div>
	</div>

<?php break;
						case 'textarea': ?>

	<div class="rm_input rm_textarea">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
		<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows="">
					<?php if (get_option($value['id']) != "") {
								echo stripslashes(get_option($value['id']));
							} else {
								echo $value['std'];
							} ?>
				</textarea>
		<small><?php echo $value['desc']; ?></small>
		<div class="clearfix"></div>
	</div>

<?php break;
						case 'select': ?>
	<div class="rm_input rm_select">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
			<?php foreach ($value['options'] as $option) { ?>
				<option <?php if (get_option($value['id']) == $option) {
									echo 'selected="selected"';
								} ?>><?php echo $option; ?></option><?php } ?>
		</select>
		<small><?php echo $value['desc']; ?></small>
		<div class="clearfix"></div>
	</div>
<?php break;
						case "checkbox": ?>

	<div class="rm_input rm_checkbox">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
		<?php if (get_option($value['id'])) {
								$checked = "checked=\"checked\"";
							} else {
								$checked = "";
							} ?>

		<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
		<small><?php echo $value['desc']; ?></small>
		<div class="clearfix"></div>
	</div>

<?php break;
						case "section":
							$i++; ?>
	<div class="rm_section">
		<div class="rm_title">
			<h3><?php echo $value['name']; ?></h3>
			<span class="submit">
				<input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
			</span>
			<div class="clearfix"></div>
		</div>
		<div class="rm_options">

<?php break;
					}
				} ?>

<input type="hidden" name="action" value="save" />
</form>
<form method="post">
	<p class="submit">
		<input name="reset" type="submit" value="Reset" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>
		</div>

	<?php
}

add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');

/* Show Number of Post
============================================================================================*/
// function to display number of posts.
function getPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0";
	}
	return $count;
}
// function to count views.
function setPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);

function posts_column_views($defaults)
{
	$defaults['post_views'] = __('Views');
	return $defaults;
}
function posts_custom_column_views($column_name, $id)
{
	if ($column_name === 'post_views') {
		echo getPostViews(get_the_ID());
	}
}

/* Favicon
============================================================================================*/
function show_favicon()
{
	$touchfavicon = stripslashes(get_option('WordpressTheme2020_favicon_touch_icon'));

	if (!empty($touchfavicon)) {
		echo '<link rel="apple-touch-icon-precomposed" href="' . $touchfavicon . '" />';
		echo '<link rel="icon" href="' . $touchfavicon . '" type="image/x-icon" />';
	}
}

/* Social Media Footer
============================================================================================*/
// Add Sosial Media to Footer
function footer_social_media()
{
	$link = array(
		"WordpressTheme2020_social_link_1",
		"WordpressTheme2020_social_link_2",
		"WordpressTheme2020_social_link_3",
		"WordpressTheme2020_social_link_4",
		"WordpressTheme2020_social_link_5"
	);

	$name = array(
		"WordpressTheme2020_social_link_1_name",
		"WordpressTheme2020_social_link_2_name",
		"WordpressTheme2020_social_link_3_name",
		"WordpressTheme2020_social_link_4_name",
		"WordpressTheme2020_social_link_5_name"
	);

	foreach (array_combine($link, $name) as $links => $names) {
		$link_show = stripslashes(get_option($links));
		$name_show = stripslashes(get_option($names));

		if (!empty($link_show) && !empty($name_show)) {
			echo '<li><a target="_blank" href="' . $link_show . '">' . $name_show . '</a></li>';
		}
	}
}

/* Google Analytics
============================================================================================*/
function WordpressTheme2020_analytics()
{
	$analytics = stripslashes(get_option('WordpressTheme2020_ga_code'));

	if (!empty($analytics)) {
		echo stripslashes(get_option('WordpressTheme2020_ga_code'));
	}
}

/*
============================================================================================*/
function alternate_rows($i)
{
	if ($i % 2) {
		echo ' class="odd"';
	} else {
		echo ' class="even"';
	}
}
	?>