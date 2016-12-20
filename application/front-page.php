<?php get_header() ?>

<?php
$banner_query = new WP_Query(array('post_type' => 'banner', 'posts_per_page' => 5));
$highlight_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'meta_query' => array(array('key' => 'is_highlight', 'compare' => '=','value' => 'true'))));
$post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4));
?>

<div class="page-wrapper">
	<?php include 'includes/masthead.php' ?>

	<div class="main-wrapper">
		<main>
			<?php $highlights = Highlight::get_posts(array('posts_per_page' => 6, 'thumbnail_sizes' => array('1800x963'), 'meta_query' => array(array('key' => 'post_is_active', 'value' => 1, 'compare' => '=')))) ?>
			<?php if($highlights): ?>
				<section id="highlights" class="owl-carousel">
					<?php foreach($highlights as $index=>$highlight): ?>
						<?php if($highlight->thumbnail): ?>
							<div class="highlight" style="background-image: url(<?php echo $highlight->thumbnail_sizes['1800x963'] ? $highlight->thumbnail_sizes['1800x963'] : $highlight->thumbnail ?>)">
								<div class="info">
									<h1 class="title"><?php echo $highlight->post_title ?></h1>
									<h2 class="subtitle"><?php echo $highlight->post_subtitle ?></h2>
									<?php if ($highlight->post_button_text && $highlight->post_button_link): ?>
										<a href="<?php echo $highlight->post_button_link ?>" class="btn btn-blue"><?php echo $highlight->post_button_text ?></a>
									<?php endif ?>
								</div>
							</div>
						<?php endif ?>
					<?php endforeach ?>
				</section>
			<?php endif ?>

			<div class="timeline">

				<section id="social" class="timeline-item">
					<h1>Siga-nos</h1>
					<nav class="social-navigation">
						<a href="https://www.facebook.com/mccufrn/" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="https://twitter.com/mccufrn" target="_blank"><i class="fa fa-twitter"></i></a>
					</nav>
				</section>

				<?php $latest_posts = Post::get_posts(array('posts_per_page' => 4, 'thumbnail_sizes' => array('400x400'))) ?>
				<?php foreach($latest_posts as $index=>$latest_post): ?>
					<figure class="post timeline-item" data-href="<?php echo $latest_post->permalink ?>">
						<figcaption>
							<p class="category"><?php echo $latest_post->category ?></p>
							<h1 class="title"><?php echo $latest_post->post_title ?></h1>
							<p class="date"><?php echo $latest_post->date ?></p>
						</figcaption>
						<div class="thumbnail-wrapper">
							<?php if($latest_post->thumbnail): ?>
								<div class="fake-image" style="background-image: url(<?php echo $latest_post->thumbnail_sizes['400x400'] ? $latest_post->thumbnail_sizes['400x400'] : $latest_post->thumbnail ?>);"></div>
							<?php else: ?>
								<div class="fake-image"></div>
							<?php endif ?>
						</div>
					</figure>
				<?php endforeach ?>

				<section id="facebook-widget" class="timeline-item">
					<div class="fb-page" data-href="https://www.facebook.com/mccufrn" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/mccufrn" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/mccufrn">Museu Câmara Cascudo/UFRN</a></blockquote></div>
				</section>
			</div>

			<section id="map"></section>
		</main>
	</div>

</div>

<?php get_footer() ?>
