

######################################################################################
//ADD custom logo on wordpress login page
######################################################################################
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo() {
	global $fdata;
	//print_r($fdata['login-logo']);
	
	$default_logo = get_template_directory() . '/img/site-logo.png';
	if ( !file_exists( $default_logo ) ) {
		$default_logo = '';
	}
	$logo_url = ( isset($fdata['login-logo']['url']) ? $fdata['login-logo']['url'] : $default_logo );
	$logo_height = ( isset($fdata['login-logo']) ? $fdata['login-logo']['height'] : '111' );
	
	$bg_img = ( empty($logo_url)  ?  ''  :  'background-image: url("'.$logo_url.'");' );
	?>
    <style type="text/css">
		body.login {
			background-color:<?=$fdata['login-color-bg']?>;
		}
        body.login div#login h1 a {
           <?=$bg_img?>
            padding: 0px;
			margin:0 auto 25px;
			width:auto;
			height:<?=$logo_height?>px;
			background-position:center center;
			background-size:contain;
        }
    </style>
<?php }


function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return get_bloginfo('name');//'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );