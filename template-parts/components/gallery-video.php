<?php

/**
 * The template for displaying post gallery
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$postType = get_post_type();
$animations = get_post_meta(get_the_ID(), '_animations', true);
$ratios = get_post_meta(get_the_ID(), '_animation_ratio', true);
// Ensure both arrays have the same length
$count = min(count($animations), count($ratios));
$animationData = array();

for ($i = 0; $i < $count; $i++) {
	$animationObject = new stdClass();
	$animationObject->name = $animations[$i];
	$animationObject->ratio = in_array('square', (array)$ratios[$i]) ? 'Square' : 'Panoramic';
	$animationData[] = $animationObject;
} ?>

	<?php foreach ($animationData as $index => $data) {
		$embedCode = $data->name;

		// Use a regular expression to extract the video ID from the embed code
		$pattern = '/(?:embed\/|youtu\.be\/|v=)([a-zA-Z0-9_-]{11})/';
		preg_match($pattern, $embedCode, $matches);

		// Extracted YouTube video ID
		$youtubeVideoId = isset($matches[1]) ? $matches[1] : '';
		if ($data->ratio == 'Square') { ?>
			<div class="croxo-gallery__gallery-item ratio-square border-theme-color--hover d-flex croxo-animations-gallery__video-wrapper">
				<?php if ($index == 0 && $postType == 'animation') { ?>
					<iframe id="<?php echo 'croxo-player-' . $index; ?>" width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $youtubeVideoId; ?>?autoplay=1&playlist=<?php echo $youtubeVideoId; ?>&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
				<?php } else { ?>
					<iframe id="<?php echo 'croxo-player-' . $index; ?>" width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $youtubeVideoId; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
				<?php } ?>
			</div>
		<?php }
		if ($data->ratio == 'Panoramic') { ?>
			<div class="w-100 ratio-panoramic border-theme-color--hover d-flex croxo-animations-gallery__video-wrapper">
				<?php if ($index == 0 && $postType == 'animation') { ?>
					<iframe id="<?php echo 'croxo-player-' . $index; ?>" width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $youtubeVideoId; ?>?autoplay=1&playlist=<?php echo $youtubeVideoId; ?>&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
				<?php } else { ?>
					<iframe id="<?php echo 'croxo-player-' . $index; ?>" width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $youtubeVideoId; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
				<?php } ?>
			</div>
	<?php }
	} 