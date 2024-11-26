<?php

$testimonial_description = get_field('testimonial_description');
$person_image = get_field('person_image'); // // Returns the image ID
?>

<div class="slider-item">
  <div class="sl-item-left">

    <!-- Testimonial Description -->
    <?php if (!empty($testimonial_description)): ?>
      <p><?php echo esc_html($testimonial_description); ?></p>
    <?php else: ?>
      <p><?php esc_html_e('No testimonial description available.', 'renegade-insurance'); ?></p>
    <?php endif; ?>

    <!-- Title -->
    <h3>- <?php echo esc_html(get_the_title() ? get_the_title() : esc_html__('Anonymous', 'renegade-insurance')); ?></h3>
  </div>

  <div class="sl-item-right">
    <div class="right-wrap">
      <div class="img-c">
        <!-- Person Image -->
        <?php if (!empty($person_image)): ?>

          <img src="<?php echo esc_url(wp_get_attachment_image_url($person_image, 'medium')); ?>"
            srcset="<?php echo esc_attr(wp_get_attachment_image_srcset($person_image, 'medium')); ?>"
            sizes="(max-width: 768px) 100vw, 50vw"
            alt="<?php the_title_attribute(); ?>">
        <?php else: ?>
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/temp/testimonial-img.jpg'); ?>"
            alt="<?php esc_attr_e('Default Testimonial Image', 'renegade-insurance'); ?>">
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>