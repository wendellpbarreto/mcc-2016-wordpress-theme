<?php
	get_header();

	$args = array(
		'post_type'   		=> 'banner',
		'posts_per_page'    => 5,
	);
	$banner_query = new WP_Query( $args );

	$args = array(
		'post_type'   		=> 'post',
		'posts_per_page'    => 4,
		'meta_query' => array(
			array(
				'key'     => 'is_highlight',
				'compare' => '=',
				'value'   => 'true',
			),
		),
	);
	$highlight_post_query = new WP_Query( $args ); 

	$args = array(
		'post_type'   		=> 'post',
		'posts_per_page'    => 4,

	);
	$post_query = new WP_Query( $args ); 
?>

<?php include 'includes/topbar.php' ?>

<section id="hero" class="main">
	<div class="carousel">

		<?php
		if ($highlight_post_query->have_posts()) :
		    while ($highlight_post_query->have_posts()) :
		        $highlight_post_query->the_post();
		        $current_post = get_post();
		        $current_post->permalink = get_permalink();

		        $current_post->highligh_image = reset( rwmb_meta( 'highligh_image', 'type=image', $current_post->ID) );
		        $current_post->main_image = reset( rwmb_meta( 'main_image', 'type=image', $current_post->ID) );
		        $current_post->image = wp_get_attachment_url( get_post_thumbnail_id($current_post->ID) );

		        if ( !empty($current_post->highligh_image) ) {
		        	$current_post->image = $current_post->highligh_image['full_url'];
		        } elseif ( !empty($current_post->main_image) ) {
		        	$current_post->image = $current_post->main_image['full_url'];
		        }

		        $current_post->image = aq_resize( $current_post->image, 2000, 800, true, true, true, false );
		?>
		<div class="carousel__item" data-href="<?php echo $current_post->permalink ?>">
			<img data-src="<?php echo $current_post->image ?>" alt="<?php echo $current_post->post_title ?>" class="owl-lazy">
		</div>
		<?php
				endwhile;
			endif;
		?>

		<?php
			if ($banner_query->have_posts()) :
			    while ($banner_query->have_posts()) :
			        $banner_query->the_post();
			        $current_post = get_post();
			        $current_post->image = wp_get_attachment_url( get_post_thumbnail_id($current_post->ID) );
		            $current_post->image = aq_resize( $current_post->image, 2000, 800, true, true, true, false );

		            if ($current_post->image): 
		?>
		<div class="carousel__item">
			<img data-src="<?php echo $current_post->image ?>" alt="<?php echo $current_post->post_title ?>" class="owl-lazy">
		</div>
		<?php
					endif;
				endwhile;
			endif; 
		?>
	</div>	

	<?php include 'includes/topbar-dropdowns.php' ?>
</section>

<div class="posts__wrapper aside__wrapper row">
	
	<section id="posts" class="container small-20 medium-13 columns">
	
		<?php
			if ($post_query->have_posts()) :
			    while ($post_query->have_posts()) :
			        $post_query->the_post();
    		        $current_post = get_post();
    		        $current_post->permalink = get_permalink();
					$current_post->categories = get_the_category();
					$current_post->category = reset( $current_post->categories );

    		        $current_post->thumbnail_image = reset(rwmb_meta( 'thumbnail_image', 'type=image', $current_post->ID ));
    		        $current_post->main_image = reset(rwmb_meta( 'main_image', 'type=image', $current_post->ID ));
    		        $current_post->image = wp_get_attachment_url( get_post_thumbnail_id($current_post->ID) );

    		        if ( !empty($current_post->thumbnail_image) ) {
    		        	$current_post->image = $current_post->thumbnail_image['full_url'];
    		        }  elseif ( !empty($current_post->main_image) ) {
    		        	$current_post->image = $current_post->main_image['full_url'];
    		        }

    		        $current_post->image = aq_resize( $current_post->image, 320, 180, true, true, true, false );

		            if ($current_post->image): 
		?>

		<div class="post">
			<div class="row collapse">
				<div class="small-8 columns">

					<figure data-href="<?php echo $current_post->permalink ?>">
						<img src="<?php echo $current_post->image ?>">
						<figcaption>
							<h4><?php echo $current_post->category->name ?></h4>
						</figcaption>
					</figure>
					
				</div>
				<div class="small-12 columns">
					<h3 class="post__heading" data-href="<?php echo $current_post->permalink ?>"><?php echo $current_post->post_title ?></h3>
					<p class="post__subheading"><?php echo wp_trim_words( strip_shortcodes($current_post->post_content), 17, '') ?> <span class="post__suspension-points">(...)</span></p>
					<div class="post__meta">
						<div class="post__meta-date"><?php echo strftime('%d de %b/%y', strtotime($current_post->post_date)); ?></div>
						<div class="post__meta-read-more"><a href="<?php echo $current_post->permalink ?>">leia mais</a></div>
					</div>
				</div>
			</div>
		</div>

		<?php 		else: ?>

		<div class="post">
			<div class="row collapse">
				<div class="small-20 columns">
					<h3 class="post__heading"><a href="<?php echo $current_post->permalink ?>"><?php echo $current_post->post_title ?></a></h3>
					<p class="post__subheading"><?php echo wp_trim_words($current_post->post_content, 25, '') ?> <span class="post__suspension-points">(...)</span></p>
					<div class="post__meta">
						<div class="post__meta-date"><?php echo strftime('%d de %b/%y', strtotime($current_post->post_date)); ?></div>
						<div class="post__meta-read-more"><a href="<?php echo $current_post->permalink ?>">leia mais</a></div>
					</div>
				</div>
			</div>
		</div>
		
		<?php
					endif;
				endwhile;
			endif; 
		?>

	</section>

	<aside id="aside" class="container small-20 medium-7 columns">

		<div class="row">
			<div class="small-20 column">
		        <?php include TEMPLATEPATH.'/search.php'; ?>
			</div>
		</div>

        <div class="aside__facebook-widget row">
        	<div class="small-20 column">
        		<div class="fb-page" data-href="https://www.facebook.com/museucamaracascudoufrn" data-width="500" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
        	</div>
        </div>

        <div class="row m-t-md">
        	<div class="small-20 column">
        	</div>
        </div>

        <!-- <div class="aside__social row">
        	<div class="small-16 small-centered column">
        		<div class="row">
		        	<div class="small-10 columns text-center">
		        		<a href="#" target="_blank"><i class="icon-instagram"></i></a>
		        	</div>
		        	<div class="small-10 columns text-center">
		        		<a href="https://twitter.com/mccufrn" target="_blank"><i class="icon-twitter"></i></a>
		        	</div>
		        </div>
        	</div>
        </div> -->
        <!-- <div class="row">
        	<div class="small-20">
		        <div class="aside__visit-us m-t-md" data-href="<?php echo get_permalink(get_page_by_path( 'contact' ))?>">
		        	<img src="<?php echo get_image('visit-us.jpg') ?>" alt="Visite Nosso Museu">
		        	<div class="aside__visit-us-title">
		        		<h3>VISITE</h3>
		        		<h2>NOSSO</h2>
		        		<h3>MUSEU</h3>
		        	</div>
		        </div>
        	</div>
        </div> -->
        <!-- <div class="aside__vernaculo-widget row">
    		<img src="<?php echo get_image( 'vernaculo.jpg' ) ?>" alt="Projeto Vernáculo" class="responsive" data-href="http://vernaculo.ufrn.br/" data-target="_blank">
        </div> -->
    </aside>
</div>

<div class="page-gap"></div>

<?php include 'includes/address.php' ?>

<section id="map" class="container"></section>

<?php include 'includes/footer.php' ?>

<?php get_footer() ?>

<!-- scripts::animate -->
<script>
    // new cbpScroller(document.getElementById('posts'));
    // new cbpScroller(document.getElementById('aside'));
    new cbpScroller(document.getElementById('footer'));
</script>
