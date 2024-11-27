<footer class="site-footer">
  <div class="footer-wrap rgi-container">

    <div class="footer-logo">

      <div class="footer-logo">
        <!-- Footer Logo -->
        <?php
        $footer_logo_image = get_theme_mod('footer_logo_image');
        if ($footer_logo_image): ?>
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url($footer_logo_image); ?>" alt="<?php esc_attr_e('Footer Logo', 'renegade-insurance'); ?>">
          </a>
        <?php endif; ?>
      </div>

    </div>

    <div class="main-footer">
      <!-- Contact Us -->
      <div class="footer-item footer-item-1">

        <h3><?php echo esc_html(get_theme_mod('footer_contact_us_heading', __('Contact Us', 'renegade-insurance'))); ?></h3>

        <a class="email" href="mailto:<?php echo esc_attr(get_theme_mod('footer_contact_email', 'info@renegadeinsurance.com')); ?>">
          <?php echo esc_html(get_theme_mod('footer_contact_email', 'info@renegadeinsurance.com')); ?>
        </a>

        <a class="tel" href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('footer_contact_phone', '+1 707-233-933'))); ?>">
          <?php echo esc_html(get_theme_mod('footer_contact_phone', '+1 707-233-933')); ?>
        </a>

        <p class="address"><?php echo nl2br(esc_html(get_theme_mod('footer_contact_address', '9450 SW Gemini Dr, PMB 47941, Beaverton, Oregon 97008-7105'))); ?></p>

        <div class="social-wrap">

          <h3><?php echo esc_html(get_theme_mod('footer_connect_heading', __('Connect with Us', 'renegade-insurance'))); ?></h3>

          <div class="social-links">

            <?php foreach (['facebook', 'twitter', 'linkedin', 'instagram'] as $social): ?>
              <?php $social_url = get_theme_mod('footer_social_' . $social, '#'); ?>
              <?php if ($social_url): ?>
                <a href="<?php echo esc_url($social_url); ?>">
                  <img src="<?php echo esc_url(get_template_directory_uri() . "/assets/images/icons/{$social}-icon.png"); ?>" alt="<?php echo ucfirst($social); ?> Icon">
                </a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>

        </div>


      </div>

      <!-- Learn More -->
      <div class="footer-item footer-item-2">
        <h3>
          <?php echo esc_html(get_theme_mod('footer_learn_more_heading', __('Learn More', 'renegade-insurance'))); ?>
        </h3>

        <!-- Learn More Nav menu -->
        <?php wp_nav_menu(array('theme_location' => 'rgi_footer_learn_more_menu', 'depth' => 1)); ?>

      </div>

      <!-- Legal -->
      <div class="footer-item footer-item-3">
        <h3>
          <?php echo esc_html(get_theme_mod('footer_legal_heading', __('Legal', 'renegade-insurance'))); ?>
        </h3>

        <!-- Legal Nav menu -->
        <?php wp_nav_menu(array('theme_location' => 'rgi_footer_legal_menu', 'depth' => 1)); ?>

      </div>

      <!-- Designed for Assurance -->
      <div class="footer-item footer-item-4">
        <h3>
          <?php echo esc_html(get_theme_mod('footer_assurance_heading', __('Designed for Assurance', 'renegade-insurance'))); ?>
        </h3>

        <p><?php echo esc_html(get_theme_mod('footer_assurance_text', __('We have ethical and professional agents who always put our clients’ best interests forward.', 'renegade-insurance'))); ?></p>

        <img src="<?php echo esc_url(get_theme_mod('footer_assurance_image', get_template_directory_uri() . '/assets/images/placeholder.png')); ?>"
          alt="<?php esc_attr_e('Trusted Choice', 'renegade-insurance'); ?>">

      </div>

      <!-- Accountability at the Forefront -->
      <div class="footer-item footer-item-5">
        <h3><?php echo esc_html(get_theme_mod('footer_accountability_heading', __('Accountability at the Forefront', 'renegade-insurance'))); ?></h3>

        <p><?php echo esc_html(get_theme_mod('footer_accountability_text', __('We are held to a higher standard for customer service, transparency and ethical business practices.', 'renegade-insurance'))); ?></p>

        <img src="<?php echo esc_url(get_theme_mod('footer_accountability_image', get_template_directory_uri() . '/assets/images/placeholder.png')); ?>"
          alt="<?php esc_attr_e('BBB Logo', 'renegade-insurance'); ?>">

      </div>


    </div>

    <div class="copyright">
      <p><?php echo esc_html(get_theme_mod('footer_copyright', '© ' . date('Y') . ' Renegade Insurance')); ?></p>
    </div>

  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>