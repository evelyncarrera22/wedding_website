<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _tk
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		?>

	<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php
get_header();
?>
<div id="container">
<a name="top"></a>
<?php
    $my_id = 206;
    $post_id_206 = get_post($my_id);
    $content = $post_id_206->post_content;
    $content = apply_filters('the_content',$content);
    $content = str_replace(']]>', ']]', $content);
    echo $content;
?>
<?php
$args = array(
    'sort_order' => 'ASC',
    'sort_column' => 'menu_order', //post_title
    'hierarchical' => 1,
    'exclude' => '',
    'child_of' => 0,
    'parent' => -1,
    'exclude_tree' => '',
    'number' => '',
    'offset' => 0,
    'post_type' => 'page',
    'post_status' => 'publish'
);
$pages = get_pages($args);
//start loop
foreach ($pages as $page_data) {
    $content = apply_filters('the_content', $page_data->post_content);
    $title = $page_data->post_title;
    $slug = $page_data->post_name;
?>
<div class='<?php echo "$slug" ?>'><a name='<?php echo "$slug" ?>'></a>
        <h2><?php echo "$title" ?></h2>
            <?php echo "$content" ?>
</div>
<?php
}
get_footer();
?>