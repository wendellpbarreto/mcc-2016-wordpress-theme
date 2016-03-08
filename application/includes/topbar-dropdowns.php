<?php $dropdowns = array (
		"institutional" => array ( "historical", "organogram", "team" ),
		"collection" => array ( "paleontology", "archeology", "ethnology" ),
		"expositions" => array ( "long-duration-expositions", "temporary-expositions" ),
		"visit-us" => array ( "contact", "schedule-your-visit", "science-park" ),
	);

	foreach ($dropdowns as $link_name => $pages):
?>
	<div class="dropdown--wrap">
		<div class="dropdown <?php echo $link_name ?>">
			<ul>
				<?php 
					foreach ($pages as $page_path):
						$page = get_page_by_path( $page_path );
						$page->permalink = get_permalink( $page );
						$page->thumbnail = wp_get_attachment_url( get_post_thumbnail_id($page->ID) );
						$page->image = aq_resize( $page->thumbnail, 680, 510, true, true, true, false ); 
				?>
				<li>
					<figure data-href="<?php echo $page->permalink ?>">
						<img src="<?php echo $page->image ?>">
						<figcaption>
							<h1><?php echo $page->post_title ?></h1>
						</figcaption>
					</figure>
				</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
<?php endforeach ?>