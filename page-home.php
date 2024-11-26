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
              <?php endwhile; ?>
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
          <h2 class="rgi-container">The Franchise Process</h2>

          <div class="process-wrap">
            <div class="process-item">
              <span class="number">1</span>
              <h3>Introduction</h3>
              <p>Complete the form below and we will reach out to provide you with more information.</p>

              <button>Contact Form</button>
            </div>

            <div class="process-item">
              <span class="number">2</span>
              <h3>Kick Off</h3>
              <p>We will schedule an in-person or riemote meeting to review your application and discuss details as we begin our partnership.</p>
            </div>

            <div class="process-item">
              <span class="number">3</span>
              <h3>Discovery Day</h3>
              <p>Our franchise development representative will schedule your visit to our corporate location. Here, we will review detailed information on our business model, support, and marketing and Tools Available </p>


            </div>

            <div class="process-item">
              <span class="number">4</span>
              <h3>Training</h3>
              <p>Our leadership team will train you and your team to prepare you to establish and operate your own Renegade Insurance franchise. </p>
            </div>
          </div>
          <h2 class="rgi-container">Franchise Facts</h2>

          <div class="franchise-facts-wrap rgi-container">
            <div class="ff-item ff-item-1">
              <h3>Forget High Franchise Fees:</h3>

              <ul>
                <li>
                  <strong>Initial Franchise Fee:</strong><br>
                  $20,000
                </li>
                <li>
                  <strong>Minimum Estimated Cost:</strong><br>
                  $51,900 including franchise fee
                </li>
              </ul>

            </div>

            <div class="ff-item ff-item-2">
              <h3>What We Look for In Our Franchisees: </h3>

              <ul>
                <li>
                  Entrepreneurial spirit.
                </li>
                <li>
                  Desire for success.
                </li>
                <li>
                  Love of helping customers.
                </li>
                <li>
                  Success in management, sales, and customer service.
                </li>
                <li>
                  The want to put those skills to use in a business of their own, but not on their own.
                </li>
              </ul>

            </div>

            <div class="ff-item ff-item-3">
              <h3>How We Support Our Franchisees </h3>

              <ul>
                <li>
                  <strong>Outstanding Training:</strong> Our 2-Week Training.
                </li>

                <li>
                  <strong>Program Dives</strong> Into The Details Of Renegade Insurance That Made Us Successful.
                </li>

                <li>
                  <strong>Program Dives</strong> Into The Details Of Renegade Insurance That Made Us Successful.
                </li>
                <li>
                  <strong>Program Dives</strong> Into The Details Of Renegade Insurance That Made Us Successful.
                </li>
                <li>
                  <strong>Program Dives</strong> Into The Details Of Renegade Insurance That Made Us Successful.
                </li>
                <li>
                  <strong>Program Dives</strong> Into The Details Of Renegade Insurance That Made Us Successful.
                </li>

              </ul>

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
          <div class="form-left">
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