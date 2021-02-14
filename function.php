<?php

    /* find location based on IP wiht WP geolocation */
	$location = WC_Geolocation::geolocate_ip();
	global $country;
	$country = $location['country'];

    /* if locains == PL then show only Poland in the checkout country list */
	if($country == 'PL'){
		function woo_override_checkout_fields_billing( $fields ) { 
			 $fields['billing']['billing_country'] = array(
      			'type'      => 'select',
        		'label'     => __('Country', 'woocommerce'),
        		'options'   => array('PL' => 'Poland')
			);
			return $fields; 
		} add_filter( 'woocommerce_checkout_fields' , 'woo_override_checkout_fields_billing' );		
	}
    else{
    	/* if locains != PL, show following countries  in the checkout country list */
		function woo_override_checkout_fields_billing( $fields ) { 
		$fields['billing']['billing_country'] = array(
					'type'      => 'select',
					'label'     => __('Country', 'woocommerce'),
					'options'   => array('AT' => 'Austria',
										'BE' => 'Belgium',
										'BG' => 'Bulgaria',
										'HR' => 'Croatia',
										'CZ' => 'Czech Republic',
										'DK' => 'Denmark',
										'EE' => 'Estonia',
										'FI' => 'Finland',
										'FR' => 'France',
										'DE' => 'Germany',
										'GR' => 'Greece',
										'HU' => 'Hungary',
										'IE' => 'Ireland',
										'IT' => 'Italy',
										'LV' => 'Latvia',
										'LT' => 'Lithuania',
										'LU' => 'Luxembourg',
										'MT' => 'Malta',
										'NL' => 'Netherlands',
										'PT' => 'Portugal',
										'SK' => 'Slovakia',
										'SI' => 'Slovenia',
										'ES' => 'Spain',
										'SE' => 'Sweden',
										'UK' => 'United Kingdom',
						)); return $fields; 
		} add_filter( 'woocommerce_checkout_fields' , 'woo_override_checkout_fields_billing' );		    
    }
?>