$variations = $product->get_available_variations();
$variation_names = array();
foreach ( $variations as $variation ) {

	// Get attribute taxonomies
	$taxonomies = array_keys($variation['attributes']);
	
	// Loop through variation taxonomies to get variation name and slug
	foreach ($taxonomies as $tax) {

		// Check if its a taxonomy you wish to exclude
		// Remove if statement if you're not excluding anything. 
		if ( $tax != 'attribute_YOUR_EXCLUDED_TAXONOMY' ) {
			$get_term_tax = str_replace('attribute_', '', $tax);
			$meta = get_post_meta( $variation['variation_id'], $tax, true );
			$term = get_term_by( 'slug', $meta, $get_term_tax );
			$var_name = $term->name;
			$variation_names[] = $var_name;
		}
	}
}
