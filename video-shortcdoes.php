<?php
/*
Plugin Name: WP Responsive Video
Plugin URI:  http://sohel.prowpexpert.com/
Description: This plugin provides a shortcode you wrap around the ID of a video in YouTube. The plugin then adds the necessary markup and CSS to make that video responsive. To use it, type [youtube]'id'[/youtube], where 'id' is the iframe embed code for your video.
Version: 1.0
Author: sohelwpexpert
Author URI: http://sohel.prowpexpert.com/
License: GPLv2
*/
//////////////////////////////////////////////////////////////////
// Remove extra P tags
//////////////////////////////////////////////////////////////////
function ms_video_shortcodes_formatter($content) {
	$block = join("|",array("youtube", "vimeo", "soundcloud"));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)/","[/$2]",$rep);

	return $rep;
}

add_filter('the_content', 'ms_video_shortcodes_formatter');
add_filter('widget_text', 'ms_video_shortcodes_formatter');


/*
[youtube id="dSn72h_6I9Q" width="940" height="425"]

[vimeo id="32987274" width="940" height="529"]
*/

//////////////////////////////////////////////////////////////////
// Youtube shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('youtube', 'ms_video_shortcode_youtube');
	function ms_video_shortcode_youtube($atts) {
		$atts = shortcode_atts(
			array(
				'id' => 'vT0wPf56bEE',
				'width' => 600,
				'height' => 360
			), $atts);

			return '<div style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><div class="video-shortcode"><iframe title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . '" frameborder="0" allowfullscreen></iframe></div></div>';
			//return '<div class="wptuts-video-container"><iframe src="//www.youtube.com/embed/' . $id . '" allowfullscreen="" frameborder="0"></iframe></div>;
	}
	
//////////////////////////////////////////////////////////////////
// Vimeo shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('vimeo', 'ms_video_shortcode_vimeo');
	function ms_video_shortcode_vimeo($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '24496773',
				'width' => 600,
				'height' => 360
			), $atts);
		
			return '<div style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><div class="video-shortcode"><iframe src="http://player.vimeo.com/video/' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></iframe></div></div>';
	}

	
	
	
	

//////////////////////////////////////////////////////////////////
// Tagline box shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('tagline_box', 'shortcode_tagline_box');
	function shortcode_tagline_box($atts, $content = null) {
		global $data;

		extract(shortcode_atts(array(
			'backgroundcolor' => '',
			'shadow' => 'no',
			'border' => '1px',
			'bordercolor' => '',
			'highlightposition' => 'left',
			'linktarget' => '_self'
		), $atts));

		if(!$backgroundcolor) {
			$backgroundcolor = $data['tagline_bg'];
		}

		if(!$bordercolor) {
			$bordercolor = $data['tagline_border_color'];
		}

		$str = '';
		$str .= '<section class="reading-box clearfix" style="background-color:'.$backgroundcolor.' !important;border-width:'.$border.';border-color:'.$bordercolor.'!important;border-'.$highlightposition.'-width:3px !important;border-'.$highlightposition.'-color:'.$data['primary_color'].'!important;border-style:solid;">';
			if((isset($atts['link']) && $atts['link']) && (isset($atts['button']) && $atts['button'])):
			$str .= '<a href="'.$atts['link'].'" target="'.$linktarget.'" class="continue button large green">'.$atts['button'].'</a>';
			endif;
			if(isset($atts['title']) && $atts['title']):
			$str .= '<h2>'.$atts['title'].'</h2>';
			endif;
			if(isset($atts['description']) && $atts['description']):
			$str.= '<p>'.$atts['description'].'</p>';
			endif;
			if(isset($atts['link']) && $atts['link'] && isset($atts['button']) && $atts['button']):
			$str .= '<a href="'.$atts['link'].'" target="'.$linktarget.'" class="continue mobile-button button large green">'.$atts['button'].'</a>';
			endif;
			if($shadow == 'yes') {
			$str .= '<div class="tagline-shadow"></div>';
			}
		$str .= '</section>';

		return $str;
	}

//[tagline_box backgroundcolor="#fff" shadow="yes" border="1px" bordercolor="#e8e6e6" highlightposition="top" link="" linktarget="" button="" title="" description="Prow's google map shortocde is very versatile. Choose from 4 map styles; terrain, roadmap, hybrid, satellite. Use multiple map markers, insert custom width and height and also control many display/funtion options like zoom control, mouse wheel control, zoom level and scale"][/tagline_box]
	
	
	
// don't call the file directly
 if ( !defined( 'ABSPATH' ) ) EXIT;

 
function ms_video_shortcode_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'ms_video_shortcode_jquery'); 




//////////////////////////////////////////////////////////////////
// dailymotion shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('dailymotion', 'ms_video_dailymotion_shortcode');
	function ms_video_dailymotion_shortcode($atts) {
		$atts = shortcode_atts(
			array(
				'id' => 'x38ythk',
				'width' => 600,
				'height' => 360
			), $atts);
		
			return '<div style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><div class="video-shortcode"><iframe src="http://www.dailymotion.com/embed/video/' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></iframe></div></div>';
	}


//////////////////////////////////////////////////////////////////
// liveleak shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('liveleak', 'ms_video_liveleak_shortcode');
	function ms_video_liveleak_shortcode($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '5c342b23a3e2',
				'width' => 600,
				'height' => 360
			), $atts);
		
			return '<div style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><div class="video-shortcode"><iframe src="http://www.liveleak.com/ll_embed?f=' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></iframe></div></div>';
	}


//////////////////////////////////////////////////////////////////
// metacafe shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('metacafe', 'ms_video_metacafe_shortcode');
	function ms_video_metacafe_shortcode($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '11373922',
				'width' => 600,
				'height' => 360
			), $atts);
		
			return '<div style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><div class="video-shortcode"><iframe src="http://www.metacafe.com/embed/' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></iframe></div></div>';
	}


//////////////////////////////////////////////////////////////////
// vine shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('vine', 'ms_video_vine_shortcode');
	function ms_video_vine_shortcode($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '56gZQ0wd9e0',
				'width' => 600,
				'height' => 360
			), $atts);
		
			return '<div style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><div class="video-shortcode"><iframe src="https://vine.co/v/' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></iframe></div></div><script src="https://platform.vine.co/static/scripts/embed.js"></script>
			';
	}


//////////////////////////////////////////////////////////////////
// SoundCloud shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('soundcloud', 'shortcode_soundcloud');
	function shortcode_soundcloud($atts) {
		$atts = shortcode_atts(
			array(
				'url' => '',
				'width' => '100%',
				'height' => 81,
				'comments' => 'true',
				'auto_play' => 'true',
				'color' => 'ff7700',
			), $atts);
			
			return '<iframe width="'.$atts['width'].'" height="'.$atts['height'].'" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=' . urlencode($atts['url']) . '&amp;show_comments=' . $atts['comments'] . '&amp;auto_play=' . $atts['auto_play'] . '&amp;color=' . $atts['color'] . '"></iframe>';
			//return '<object height="' . $atts['height'] . '" width="' . $atts['width'] . '"><param name="movie" value="http://player.soundcloud.com/player.swf?url=' . urlencode($atts['url']) . '&amp;show_comments=' . $atts['comments'] . '&amp;auto_play=' . $atts['auto_play'] . '&amp;color=' . $atts['color'] . '"></param><param name="allowscriptaccess" value="always"></param><embed allowscriptaccess="always" height="' . $atts['height'] . '" src="http://player.soundcloud.com/player.swf?url=' . urlencode($atts['url']) . '&amp;show_comments=' . $atts['comments'] . '&amp;auto_play=' . $atts['auto_play'] . '&amp;color=' . $atts['color'] . '" type="application/x-shockwave-flash" width="' . $atts['width'] . '"></embed></object>';
	}
	

function ms_video_jquery_fitvids_js() {

wp_enqueue_script( 'fitvids-js', plugins_url('/js/jquery.fitvids.js',__FILE__), array('jquery'), 1.1, false);
wp_enqueue_script( 'active-js', plugins_url('/js/active.js',__FILE__), array('jquery'), 1.0, false);
wp_enqueue_style( 'video-css', plugins_url('/css/video.css',__FILE__), 1.0, false);
}
add_action('init','ms_video_jquery_fitvids_js');


function ms_video_custome_css() {
?>
<style type="text/css">
.res_video{margin-bottom:20px;width:100%}

.video-container {
	position:relative;
	padding-bottom:56.25%;
	padding-top:30px;
	height:0;
	overflow:hidden;
}

.video-container iframe, .video-container object, .video-container embed {
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
}


.videoWrapper {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 25px;
	height: 0;
}
.videoWrapper iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

/*
stylesheet for use with responsive video shortcode plugin.
Provides the CSS that makes the video responsive.
*/
 
.wptuts-video-container {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 30px;
    height: 0;
    overflow: hidden;
}
 
.wptuts-video-container iframe {
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}





</style>
<?php 
}
add_action('wp_head','ms_video_custome_css');




function ms_video_buttons() {
	add_filter ("mce_external_plugins", "my_external_js_video");
	add_filter ("mce_buttons", "our_awesome_buttons_video");
}

function my_external_js_video($plugin_array) {
	$plugin_array['wptuts'] = plugins_url('js/custom-button.js', __FILE__);
	return $plugin_array;
}

function our_awesome_buttons_video($buttons) {
	array_push ($buttons, 'youtube', 'vimeo');
	return $buttons;
}
add_action ('init', 'ms_video_buttons'); 
function ms_video_boxed_css() {
	echo "
		<style type='text/css'>
			#boxed_style {border:5px solid red;padding:25px;}
			
		</style>
	";
}
add_action ('wp_head', 'ms_video_boxed_css');



?>

