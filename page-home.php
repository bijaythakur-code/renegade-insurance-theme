<?php get_header(); ?>
<div id="content" class="site-content">
  <div id="primary" class="content-area">
    <main id="main" class="site-main">

      <!-- Hero Section -->

      <?php
      $sec_1_hero_banner_title = get_field('hero_banner_title');
      $sec_1_hero_banner_subtitle = get_field('hero_banner_subtitle');
      $sec_1_hero_banner_image_id = get_field('hero_banner_image'); // Returns the image ID

      ?>


      <section class="rgi-hero">
        <div class="rgi-hero-wrap rgi-container">
          <div class="hero-left">

            <?php if ($sec_1_hero_banner_title): ?>
              <h1><?php echo esc_html($sec_1_hero_banner_title); ?></h1>
            <?php else: ?>
              <h1><?php esc_html_e('Please type some title here', 'renegade-insurance'); ?></h1>
            <?php endif; ?>

            <?php if ($sec_1_hero_banner_subtitle): ?>
              <p><?php echo esc_html($sec_1_hero_banner_subtitle); ?></p>
            <?php else: ?>
              <p><?php esc_html_e('Please type some sub-title here', 'renegade-insurance'); ?></p>
            <?php endif; ?>

          </div>
          <div class="hero-right">
            <div class="hero-right-w">
              <div class="hero-right-img-c">
                <?php
                if (!empty($sec_1_hero_banner_image_id)):
                  $image_url = wp_get_attachment_image_src($sec_1_hero_banner_image_id, 'full')[0];
                  $srcset = wp_get_attachment_image_srcset($sec_1_hero_banner_image_id, 'full');
                  $sizes = wp_get_attachment_image_sizes($sec_1_hero_banner_image_id, 'full');
                  $alt_text = get_post_meta($sec_1_hero_banner_image_id, '_wp_attachment_image_alt', true);
                ?>
                  <img
                    src="<?php echo esc_url($image_url); ?>"
                    srcset="<?php echo esc_attr($srcset); ?>"
                    sizes="<?php echo esc_attr($sizes); ?>"
                    alt="<?php echo esc_attr($alt_text ?: 'Hero Image'); ?>">
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.png" alt="Placeholder Image">
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

      </section>

      <!-- Section 2  -->
      <?php
      $sec_2_banner_left_txt = get_field('banner_left_text');
      $sec_2_banner_right_txt = get_field('banner_right_text');
      $sec_2_banner_read_more_txt = get_field('read_more_text');
      $sec_2_banner_read_more_url = get_field('read_more_url');

      ?>

      <section class="rgi-home-sec-2">
        <div class="sec-wrap rgi-container">
          <div class="c-left">
            <?php if (!empty($sec_2_banner_left_txt)): ?>
              <?php echo wp_kses_post($sec_2_banner_left_txt); ?>
            <?php else: ?>
              <p><?php esc_html_e('Please type some text here.', 'renegade-insurance'); ?></p>
            <?php endif; ?>
          </div>

          <div class="c-right">

            <?php if (!empty($sec_2_banner_right_txt)): ?>
              <?php echo wp_kses_post($sec_2_banner_right_txt); ?>
            <?php else: ?>
              <p><?php esc_html_e('Please type some text here', 'renegade-insurance'); ?></p>
            <?php endif; ?>

            <a href="<?php echo esc_url(!empty($sec_2_banner_read_more_url) ? $sec_2_banner_read_more_url : '#'); ?>" class="read-more-btn">
              <?php echo !empty($sec_2_banner_read_more_txt) ? esc_html($sec_2_banner_read_more_txt) : esc_html__('Read More', 'renegade-insurance'); ?>
            </a>

          </div>
        </div>
      </section>

      <!-- section 3 -->

      <?php
      $sec_3_banner_txt = get_field('section_3_banner_text');
      $sec_3_button_txt = get_field('section_3_button_text');
      $sec_3_button_url = get_field('section_3_button_link');

      ?>

      <section class="rgi-home-sec-3">
        <div class="sec-wrap rgi-container">

          <div class="c-left">
            <?php if (!empty($sec_3_banner_txt)): ?>
              <span><?php echo esc_html($sec_3_banner_txt); ?></span>
            <?php else: ?>
              <span><?php esc_html_e('Please type some text here', 'renegade-insurance'); ?></span>
            <?php endif; ?>
          </div>

          <div class="c-right">

            <a href="<?php echo esc_url(!empty($sec_3_button_url) ? $sec_3_button_url : '#'); ?>" class="button">
              <?php echo !empty($sec_3_button_txt) ? esc_html($sec_3_button_txt) : esc_html__('Button text', 'renegade-insurance'); ?>
            </a>


          </div>


        </div>
      </section>

      <!-- section 4 Testimonial Slider -->

      <?php
      $sec_4_slider_heading = get_field('section_4_slider_heading');
      ?>

      <section class="rgi-home-sec-4-sl">

        <div class="sec-4-wrap rgi-container">

          <!-- Section Heading -->
          <?php if ($sec_4_slider_heading): ?>
            <h2><?php echo esc_html($sec_4_slider_heading); ?></h2>
          <?php else: ?>
            <h2><?php esc_html_e('Please type heading text here', 'renegade-insurance'); ?></h2>
          <?php endif; ?>

          <?php
          // Query Testimonials CPT
          $testimonials = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'testimonial',
            'orderby' => 'title',
            'order' => 'ASC'
          ));

          if ($testimonials->have_posts()): ?>

            <div class="slider-wrap">

              <?php
              while ($testimonials->have_posts()):
                $testimonials->the_post();

                get_template_part('template-parts/content', 'testimonial');

              endwhile; ?>
            </div>
          <?php else: ?>
            <p><?php esc_html_e('No testimonials found.', 'renegade-insurance'); ?></p>
          <?php endif; ?>

          <?php wp_reset_postdata(); ?>

        </div>

      </section>

      <!-- Section 5 the franchise process -->

      <section class="rgi-home-sec-5">
        <div class="sec-5-wrap ">

          <?php $sec_5_fp_heading = get_field('section_5_franchise_process_heading'); ?>

          <!-- Section Heading -->
          <?php if ($sec_5_fp_heading): ?>
            <h2 class="rgi-container"><?php echo esc_html($sec_5_fp_heading); ?></h2>
          <?php else: ?>
            <h2 class="rgi-container"><?php esc_html_e('Please type heading text here', 'renegade-insurance'); ?></h2>
          <?php endif; ?>

          <?php
          // Query Franchise Process CPT
          $franchise_processes = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'franchise-process',
            'orderby' => 'title',
            'order' => 'ASC'
          ));

          if ($franchise_processes->have_posts()): ?>

            <div class="process-wrap">

              <?php
              while ($franchise_processes->have_posts()):
                $franchise_processes->the_post();

                get_template_part('template-parts/content', 'franchise-process');

              endwhile; ?>
            </div>

          <?php else: ?>
            <p class="rgi-container"><?php esc_html_e('No franchise processes found.', 'renegade-insurance'); ?></p>
          <?php endif; ?>

          <?php wp_reset_postdata(); ?>

          <!-- <h2 class="rgi-container">Franchise Facts</h2> -->
          <!-- Heading -->
          <?php $sec_5_franchise_facts_heading = get_field('section_5_franchise_facts_heading'); ?>

          <?php if ($sec_5_franchise_facts_heading): ?>
            <h2 class="rgi-container"><?php echo esc_html($sec_5_franchise_facts_heading); ?></h2>
          <?php else: ?>
            <h2 class="rgi-container"><?php esc_html_e('Please type heading text here', 'renegade-insurance'); ?></h2>
          <?php endif; ?>

          <div class="franchise-facts-wrap rgi-container">

            <?php
            $franchise_facts_container_1_heading = get_field('franchise_facts_container_1_heading');
            $franchise_facts_container_1_content = get_field('franchise_facts_container_1_content');
            $franchise_facts_container_2_heading = get_field('franchise_facts_container_2_heading');
            $franchise_facts_container_2_content = get_field('franchise_facts_container_2_content');
            $franchise_facts_container_3_heading = get_field('franchise_facts_container_3_heading');
            $franchise_facts_container_3_content = get_field('franchise_facts_container_3_content');

            // var_dump($franchise_facts_container_1_content);

            ?>

            <div class="ff-item ff-item-1">

              <!-- Container 1 Heading -->
              <?php if ($franchise_facts_container_1_heading): ?>
                <h3><?php echo esc_html($franchise_facts_container_1_heading); ?></h3>
              <?php else: ?>
                <h3><?php esc_html_e('Please type heading text here', 'renegade-insurance'); ?></h3>
              <?php endif; ?>

              <!-- Container 1 Content list -->
              <?php if (!empty($franchise_facts_container_1_content)): ?>
                <?php echo wp_kses_post($franchise_facts_container_1_content); ?>
              <?php else: ?>
                <p><?php esc_html_e('Please type lists here.', 'renegade-insurance'); ?></p>
              <?php endif; ?>

            </div>

            <div class="ff-item ff-item-2">

              <!-- Container 2 Heading -->
              <?php if ($franchise_facts_container_2_heading): ?>
                <h3><?php echo esc_html($franchise_facts_container_2_heading); ?></h3>
              <?php else: ?>
                <h3><?php esc_html_e('Please type heading text here', 'renegade-insurance'); ?></h3>
              <?php endif; ?>

              <!-- Container 2 Content list -->
              <?php if (!empty($franchise_facts_container_2_content)): ?>
                <?php echo wp_kses_post($franchise_facts_container_2_content); ?>
              <?php else: ?>
                <p><?php esc_html_e('Please type lists here.', 'renegade-insurance'); ?></p>
              <?php endif; ?>

            </div>

            <div class="ff-item ff-item-3">
              <!-- Container 3 Heading -->
              <?php if ($franchise_facts_container_3_heading): ?>
                <h3><?php echo esc_html($franchise_facts_container_3_heading); ?></h3>
              <?php else: ?>
                <h3><?php esc_html_e('Please type heading text here', 'renegade-insurance'); ?></h3>
              <?php endif; ?>

              <!-- Container 2 Content list -->
              <?php if (!empty($franchise_facts_container_3_content)): ?>
                <?php echo wp_kses_post($franchise_facts_container_3_content); ?>
              <?php else: ?>
                <p><?php esc_html_e('Please type lists here.', 'renegade-insurance'); ?></p>
              <?php endif; ?>

            </div>

          </div>

        </div>
      </section>

      <!-- Section 6 Banner text -->
      <section class="rgi-home-sec-6">
        <div class="sec-wrap rgi-container">
          <span>We Are Looking Forward To Getting To Know You!</span>

          <p>Start Revolutionizing The World Of Insurance Services By Filling Out Our Contact Form Below. <a href="#"><strong>Get Started.</strong></a> </p>

        </div>
      </section>

      <!--  Section 7 Contact form section -->
      <section class="rgi-home-sec-7-form">
        <div class="sec-wrap rgi-container">
          <div id="rgi-contact-form" class="form-left">
            <h2>Contact Form</h2>
            <?php
            echo do_shortcode('[contact-form-7 id="686227f" title="RGI Contact Form"]');
            ?>

            <p>This is not a franchise offering. A Franchise offering can be made by us only in a state if we are first registered, excluded, exempt, or otherwise qualified to offer franchises in that state, and only if we provide you with an appropriate franchise disclosure document. </p>
          </div>
          <div class="img-right">
            <div class="img-right-w">
              <div class="right-img-c">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/temp/contact-form-img.png" alt="Contact image">
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
  </div>
</div>
<?php get_footer(); ?>