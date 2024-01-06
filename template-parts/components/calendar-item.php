<?php

/**
 * The template for displaying post text content
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
$postDate = get_post_meta(get_the_ID(), '_custom_date', true);

$day_of_week = date('l', strtotime($postDate));
$month = date('m', strtotime($postDate));
$day = date('j', strtotime($postDate));
$year = date('Y', strtotime($postDate));
?>
<div class="croxo-calendar-day d-flex flex-column border-theme-color ratio-square">
  <div class="croxo-calendar-day__stripe background-theme-color d-flex px-2 justify-content-between flexone">
    <span class="material-symbols-outlined material-symbols-filled croxo-color-white d-flex align-items-center">
      fiber_manual_record
    </span>
    <span class="material-symbols-outlined material-symbols-filled croxo-color-white d-flex align-items-center">
      fiber_manual_record
    </span>
  </div>
  <div class="croxo-calendar-day__text-container croxo-font-text--deep flexfive d-flex flex-column justify-content-center">
    <div class="croxo-calendar-day__text-container__numbers d-flex justify-content-center">
      <span><?php echo $day ?></span>
      <span>/</span>
      <span><?php echo $month ?></span>
    </div>
    <div class="croxo-calendar-day__text-container__word d-flex justify-content-center">
      <span><?php echo $day_of_week ?></span>
    </div>
  </div>
</div>