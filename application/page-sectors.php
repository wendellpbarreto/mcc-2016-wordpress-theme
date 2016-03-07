<?php
	get_header();

	the_post();
	$current_page = get_post();
	$current_page->permalink = get_permalink();
	$current_page->categories = get_the_category();
	$current_page->image = wp_get_attachment_url( get_post_thumbnail_id($current_page->ID) );
	$current_page->image = aq_resize( $current_page->image, 2000, 800, true, true, true, false );
?>

<?php include 'includes/topbar.php' ?>

<?php include 'includes/hero.php' ?>


<?php
	function print_organogram($post_type) {
		echo '<div class="tree">';
			echo '<ul>';
				get_posts_children(0, $post_type, 0);
			echo '</ul>';
		echo '</div>';
	}

	function get_posts_children($parent_id, $post_type, $level) {
		$sectors_query_args = array(
			'post_type' => $post_type,
			'posts_per_page' => -1,
			'post_parent' => $parent_id,
		);
		$sectors_query = new WP_Query( $sectors_query_args );

		if ($sectors_query->have_posts()) {
			while ($sectors_query->have_posts()) {
				$sectors_query->the_post();
				$current_post = get_post();
				$current_post->permalink = get_permalink();
				$current_post->tags = wp_get_post_tags($current_post->ID);
				$current_post->image = wp_get_attachment_url( get_post_thumbnail_id($current_post->ID) );
				$current_post->image500x400 = aq_resize( $current_page->image, 500, 400, true );
				$current_post->attachments = get_attachments_from_post($current_post);
				$current_post->post_content = strip_shortcodes($current_post->post_content);

				echo '<li>';
					echo '<a href="#">';
						echo '<div class="background" style="background-image: url(' . $current_post->image . ');"></div>';
						echo '<div class="title">' . $current_post->post_title . '</div>';
					echo '</a>';
					echo '<ul class="' . ($level > 2 ? "vertical" : "") . '">';
						get_posts_children($current_post->ID, $post_type, $level + 1);
					echo '</ul>';
				echo '</li>';
			}
		}
	}
?>
<section id="sectors" class="container">
	<div class="row">
		<div class="small-20 column">
			<?php print_organogram('sector') ?>
		</div>
	</div>
</section>

<div class="page-gap"></div>

<?php include 'includes/footer.php' ?>

<?php get_footer() ?>

<!-- scripts::animate -->
<script>
	new cbpScroller(document.getElementById('footer'));
</script>
