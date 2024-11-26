<?php
$process_heading = get_field('process_heading');
$process_description = get_field('process_description');
$show_button = get_field('show_button');
$button_text = get_field('button_text');
$button_link = get_field('button_link');  // Link
?>

<div class="process-item">

  <span class="number"><?php echo esc_html(get_the_title() ? get_the_title() : esc_html__('No. Ex: 1', 'renegade-insurance')); ?></span>


  <h3>
    <?php echo esc_html($process_heading ? $process_heading : esc_html__('Step Name', 'renegade-insurance')); ?>
  </h3>

  <p>
    <?php echo esc_html($process_description ? $process_description : esc_html__('Description not available.', 'renegade-insurance')); ?>
  </p>

  <?php if ($show_button && !empty($button_text) && !empty($button_link)): ?>
    <a class="button" href="<?php echo esc_url($button_link); ?>">
      <?php echo esc_html($button_text); ?>
    </a>
  <?php elseif ($show_button): ?>
    <a class="button" href="#">
      <?php esc_html_e('Contact Form', 'renegade-insurance'); ?>
    </a>
  <?php endif; ?>

</div>