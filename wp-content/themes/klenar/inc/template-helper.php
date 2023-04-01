<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package klenar
 */

/**
 *
 * klenar header
 */

function klenar_check_header() {
    $klenar_header_style = function_exists( 'get_field' ) ? get_field( 'header_style' ) : NULL;
    $klenar_default_header_style = get_theme_mod( 'choose_default_header', 'header-style-1' );

    if ( $klenar_header_style == 'header-style-1' ) {
        klenar_header_style_1();
    }
    elseif ( $klenar_header_style == 'header-style-2' ) {
        klenar_header_style_2();
    }
    elseif ( $klenar_header_style == 'header-style-3' ) {
        klenar_header_style_3();
    }
    elseif ( $klenar_header_style == 'header-style-onepage-1' ) {
        klenar_header_style_onepage_1();
    }
    elseif ( $klenar_header_style == 'header-style-onepage-2' ) {
        klenar_header_style_onepage_2();
    }
    elseif ( $klenar_header_style == 'header-style-onepage-3' ) {
        klenar_header_style_onepage_3();
    }
    else {

        /** default header style **/
        if ( $klenar_default_header_style == 'header-style-2' ) {
            klenar_header_style_2();
        }
        elseif ( $klenar_default_header_style == 'header-style-3' ) {
            klenar_header_style_3();
        }
        elseif ( $klenar_default_header_style == 'header-style-onepage-1' ) {
            klenar_header_style_onepage_1();
        }
        elseif ( $klenar_default_header_style == 'header-style-onepage-2' ) {
            klenar_header_style_onepage_2();
        }
        elseif ( $klenar_default_header_style == 'header-style-onepage-3' ) {
            klenar_header_style_onepage_3();
        }
        else {
            klenar_header_style_1();
        }
    }

}
add_action( 'klenar_header_style', 'klenar_check_header', 10 );


/**
 * header default
 */
 function klenar_header_style_1() {

   $klenar_topbar_switch = get_theme_mod( 'klenar_topbar_switch', false );
   $klenar_contact_number = get_theme_mod( 'klenar_contact_number', __( '333 888 200 - 55', 'klenar' ) );
   $klenar_contact_link = get_theme_mod( 'klenar_contact_link', __( '333 888 200 - 55', 'klenar' ) );
   $klenar_button_text = get_theme_mod( 'klenar_button_text', __( 'Free Quote', 'klenar' ) );
   $klenar_button_link = get_theme_mod( 'klenar_button_link', __( '#', 'klenar' ) );
   $klenar_header_right = get_theme_mod( 'klenar_header_right', false );

   $klenar_menu_col = $klenar_header_right ? 'col-xxl-6 col-xl-6 col-4' : 'col-xxl-10 col-xl-9 col-4 text-end';

    ?>

    <!-- header area start -->
    <header>
        <div class="tp-header-area-three header-sticky header-default">
            <div class="tp-custom-container">
                <div class="row justify-content-xl-center align-items-center">
                    <div class="col-xxl-2 col-xl-3 col-8">
                        <div class="tp-header-logo-three">
                            <?php klenar_header_logo(); ?>
                        </div>
                    </div>
                    <div class="<?php print esc_attr($klenar_menu_col); ?>">
                        <div class="tp-main-menu tp-main-menu-three">
                            <nav id="tp-mobile-menu">
                                <?php klenar_header_menu();?>
                            </nav>
                        </div>
                        <!-- mobile menu activation -->
                        <div class="side-menu-icon d-xl-none text-end">
                            <button class="side-toggle"><i class="far fa-bars"></i></button>
                        </div>
                    </div>

                    <?php if (!empty($klenar_header_right)): ?>
                    <div class="col-xxl-4 col-xl-3 d-none d-xl-block">
                        <div class="tp-header-right-three">
                            <?php if (!empty($klenar_contact_number)): ?>
                            <div class="tp-header-number-three">
                                <span><?php print esc_html__('Call Us :', 'klenar') ?> <a href="tel:<?php print esc_url($klenar_contact_link); ?>"><?php print esc_html($klenar_contact_number) ?></a></span>
                            </div>
                          <?php endif; ?>

                          <?php if (!empty($klenar_button_text)): ?>
                            <div class="tp-header-btn-three">
                                <a href="<?php print esc_url($klenar_button_link); ?>" class="yellow-btn"><i class="flaticon-enter"></i> <?php print esc_html($klenar_button_text); ?></a>
                            </div>
                          <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->


   <!-- side info start -->
   <?php klenar_side_info(); ?>
   <!-- side info end -->
   <div class="body-overlay"></div>
   <!-- sidebar area end -->

<?php
}


/**
 * header style 2
 */
 function klenar_header_style_2() {

   $klenar_topbar_switch = get_theme_mod( 'klenar_topbar_switch', false );
   $klenar_address_text = get_theme_mod( 'klenar_address_text', __( '28/4 Palmal, London', 'klenar' ) );
   $klenar_email_text = get_theme_mod( 'klenar_email_text', __( 'info@klenar.com', 'klenar' ) );
   $klenar_email_link = get_theme_mod( 'klenar_email_link', __( 'info@klenar.com', 'klenar' ) );
   $klenar_contact_number = get_theme_mod( 'klenar_contact_number', __( '333 888 200 - 55', 'klenar' ) );
   $klenar_contact_link = get_theme_mod( 'klenar_contact_link', __( '333 888 200 - 55', 'klenar' ) );
   $klenar_button_text = get_theme_mod( 'klenar_button_text', __( 'Get Quote +', 'klenar' ) );
   $klenar_button_link = get_theme_mod( 'klenar_button_link', __( '#', 'klenar' ) );
   $klenar_header_right = get_theme_mod( 'klenar_header_right', false );

   $klenar_logo_bg = get_theme_mod( 'klenar_logo_bg', get_template_directory_uri() . '/assets/img/logo/logo-white-bg.png' );

    ?>

    <!-- header area start -->
    <header>
        <div class="tp-header-area-two header-sticky header-style-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-8">
                        <div class="tp-header-logo-two">
                            <div class="tp-header-logo-two-inner" data-background="<?php print esc_url($klenar_logo_bg); ?>">
                                <?php klenar_header_logo(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-4">
                        <div class="tp-header-menu-two-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tp-header-top-two">
                                        <div class="tp-header-top-two-info">
                                            <ul>
                                                <?php if (!empty($klenar_address_text)): ?>
                                                <li><i class="flaticon-pin"></i> <?php print esc_html($klenar_address_text); ?> </li>
                                                <?php endif; ?>

                                                <?php if (!empty($klenar_email_text)): ?>
                                                <li><i class="flaticon-email"></i><a href="mailto:<?php print esc_url($klenar_email_link); ?>"><?php print esc_html($klenar_email_text); ?></a></li>
                                                <?php endif; ?>

                                                <?php if (!empty($klenar_contact_number)): ?>
                                                <li><i class="flaticon-phone-call"></i><a href="tel:<?php print esc_url($klenar_contact_link); ?>"><?php print esc_html($klenar_contact_number) ?></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div class="tp-header-top-two-social">
                                            <?php klenar_header_social_profiles(); ?>
                                        </div>
                                    </div>
                                    <div class="tp-header-menu-two">
                                        <div class="tp-main-menu tp-main-menu-two">
                                            <nav id="tp-mobile-menu">
                                                <?php klenar_header_menu(); ?>
                                            </nav>
                                        </div>
                                        <div class="tp-main-menu-two-btn">
                                            <?php if (!empty($klenar_button_text)): ?>
                                            <a href="<?php print esc_url($klenar_button_link); ?>" class="yellow-btn"><?php print esc_html($klenar_button_text); ?></a>
                                            <?php endif; ?>

                                        </div>
                                        <!-- mobile menu activation -->
                                        <div class="side-menu-icon d-xl-none text-end">
                                            <button class="side-toggle"><i class="far fa-bars"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- header area end -->

   <!-- side info start -->
   <?php klenar_side_info(); ?>
   <!-- side info end -->
   <div class="body-overlay"></div>
   <!-- sidebar area end -->

<?php
}


// Header 3
function klenar_header_style_3() {

    $klenar_topbar_switch = get_theme_mod( 'klenar_topbar_switch', false );
    $klenar_address_text = get_theme_mod( 'klenar_address_text', __( '28/4 Palmal, London', 'klenar' ) );
    $klenar_email_text = get_theme_mod( 'klenar_email_text', __( 'info@klenar.com', 'klenar' ) );
    $klenar_email_link = get_theme_mod( 'klenar_email_link', __( 'info@klenar.com', 'klenar' ) );
    $klenar_contact_number = get_theme_mod( 'klenar_contact_number', __( '333 888 200 - 55', 'klenar' ) );
    $klenar_contact_link = get_theme_mod( 'klenar_contact_link', __( '333 888 200 - 55', 'klenar' ) );
    $klenar_button_text = get_theme_mod( 'klenar_button_text', __( 'Free Quote', 'klenar' ) );
    $klenar_button_link = get_theme_mod( 'klenar_button_link', __( '#', 'klenar' ) );
    $klenar_header_bg = get_theme_mod( 'klenar_header_bg', '#075F33');
    $klenar_header_right = get_theme_mod( 'klenar_header_right', false );


    ?>

    <!-- header area start -->
    <header>
        <div class="tp-header-area header-style-3">

            <?php if (!empty($klenar_topbar_switch)): ?>
              <div class="tp-header-top header-bg pt-20 pb-50 d-none d-xl-block" data-bg-color="<?php print esc_attr( $klenar_header_bg );?>">
                  <div class="tp-custom-container">
                      <div class="row align-items-center">
                          <div class="col-xxl-4 col-xl-5">
                              <div class="tp-header-top-info">

                                  <?php if (!empty($klenar_address_text)): ?>
                                  <div class="tp-header-top-info-single pr-40 mr-40 border-right-1">
                                      <div class="tp-header-top-info-single-icon mr-10">
                                          <i class="flaticon-pin"></i>
                                      </div>
                                      <div class="tp-header-top-info-single-text">
                                          <span class="tp-header-top-info-single-label"><?php print esc_html__('Free Contact','klenar'); ?></span>
                                          <span class="tp-header-top-info-single-content font-medium"><?php print esc_html($klenar_address_text); ?></span>
                                      </div>
                                  </div>
                                  <?php endif; ?>

                                  <?php if (!empty($klenar_email_text)): ?>
                                  <div class="tp-header-top-info-single">
                                      <div class="tp-header-top-info-single-icon mr-15">
                                          <i class="flaticon-email"></i>
                                      </div>
                                      <div class="tp-header-top-info-single-text">
                                          <span class="tp-header-top-info-single-label"><?php print esc_html__('Email us', 'klenar') ?></span>
                                          <a href="mailto:<?php print esc_url($klenar_email_link); ?>" class="tp-header-top-info-single-content font-medium"><?php print esc_html($klenar_email_text); ?></a>
                                      </div>
                                  </div>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="col-xxl-4 col-xl-2">
                              <div class="header-logo text-center">
                                <?php klenar_header_logo(); ?>
                              </div>
                          </div>
                          <div class="col-xxl-4 col-xl-5">
                          <?php if (!empty($klenar_header_right)): ?>
                              <div class="tp-header-top-info justify-content-end">
                                <?php if (!empty($klenar_contact_number)): ?>
                                  <div class="tp-header-top-info-single mr-85">
                                      <div class="tp-header-top-info-single-icon tp-header-top-info-single-icon-call mr-10">
                                          <i class="flaticon-phone-call"></i>
                                      </div>
                                      <div class="tp-header-top-info-single-text">
                                          <span class="tp-header-top-info-single-label"><?php print esc_html__('Free Call', 'klenar') ?></span>
                                          <a href="tel:<?php print esc_url($klenar_contact_link); ?>" class="tp-header-top-info-single-content font-medium"><?php print esc_html($klenar_contact_number) ?></a>
                                      </div>
                                  </div>
                                <?php endif; ?>
                                <?php if (!empty($klenar_button_text)): ?>
                                  <div class="tp-header-top-info-single">
                                      <div class="tp-header-top-info-single-btn">
                                          <a href="<?php print esc_url($klenar_button_link); ?>" class="yellow-btn"><i class="flaticon-enter"></i> <?php print esc_html($klenar_button_text); ?></a>
                                      </div>
                                  </div>
                                  <?php endif; ?>
                              </div>
                              <?php endif; ?>
                          </div>
                      </div>
                  </div>
              </div>
            <?php endif; ?>
            <div class="tp-header-menu-area tp-transparent-header-menu header-sticky header-mt-30">
                <div class="container">
                    <div class="row justify-content-xl-center align-items-center">
                        <div class="col-xl-2 col-8 tp-sticky-column">
                            <div class="tp-sticky-logo">
                                <?php klenar_header_sticky_logo(); ?>                          
                            </div>
                        </div>
                        <div class="col-xl-8 col-4">
                            <div class="tp-main-menu-bg">
                                <div class="tp-main-menu">
                                    <nav id="tp-mobile-menu">
                                        <?php klenar_header_menu_3(); ?>
                                    </nav>
                                </div>
                                <!-- mobile menu activation -->
                                <div class="side-menu-icon d-xl-none text-end">
                                    <button class="side-toggle"><i class="far fa-bars"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 tp-sticky-column-btn">
                            <?php if (!empty($klenar_button_text)): ?>
                                <div class="tp-sticky-btn text-end">
                                    <a href="<?php print esc_url($klenar_button_link); ?>" class="theme-btn justify-content-end"><i class="flaticon-enter"></i> <?php print esc_html($klenar_button_text); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

   <!-- side info start -->
   <?php klenar_side_info(); ?>
   <!-- side info end -->
   <div class="body-overlay"></div>
   <!-- sidebar area end -->

<?php
}



/**
 * header onepage 1
 */
 function klenar_header_style_onepage_1() {

   $klenar_topbar_switch = get_theme_mod( 'klenar_topbar_switch', false );
   $klenar_contact_number = get_theme_mod( 'klenar_contact_number', __( '333 888 200 - 55', 'klenar' ) );
   $klenar_contact_link = get_theme_mod( 'klenar_contact_link', __( '333 888 200 - 55', 'klenar' ) );
   $klenar_button_text = get_theme_mod( 'klenar_button_text', __( 'Free Quote', 'klenar' ) );
   $klenar_button_link = get_theme_mod( 'klenar_button_link', __( '#', 'klenar' ) );
   $klenar_header_right = get_theme_mod( 'klenar_header_right', false );

   $klenar_menu_col = $klenar_header_right ? 'col-xxl-6 col-xl-6 col-4' : 'col-xxl-10 col-xl-9 col-4 text-end';

    ?>

    <!-- header area start -->
    <header>
        <div class="tp-header-area-three header-sticky header-default">
            <div class="tp-custom-container">
                <div class="row justify-content-xl-center align-items-center">
                    <div class="col-xxl-2 col-xl-3 col-8">
                        <div class="tp-header-logo-three">
                            <?php klenar_header_logo(); ?>
                        </div>
                    </div>
                    <div class="<?php print esc_attr($klenar_menu_col); ?>">
                        <div class="tp-main-menu tp-main-menu-three">
                            <nav id="tp-mobile-menu">
                                <?php klenar_onepage_menu();?>
                            </nav>
                        </div>
                        <!-- mobile menu activation -->
                        <div class="side-menu-icon d-xl-none text-end">
                            <button class="side-toggle"><i class="far fa-bars"></i></button>
                        </div>
                    </div>

                    <?php if (!empty($klenar_header_right)): ?>
                    <div class="col-xxl-4 col-xl-3 d-none d-xl-block">
                        <div class="tp-header-right-three">
                            <?php if (!empty($klenar_contact_number)): ?>
                            <div class="tp-header-number-three">
                                <span><?php print esc_html__('Call Us :', 'klenar') ?> <a href="tel:<?php print esc_url($klenar_contact_link); ?>"><?php print esc_html($klenar_contact_number) ?></a></span>
                            </div>
                          <?php endif; ?>

                          <?php if (!empty($klenar_button_text)): ?>
                            <div class="tp-header-btn-three">
                                <a href="<?php print esc_url($klenar_button_link); ?>" class="yellow-btn"><i class="flaticon-enter"></i> <?php print esc_html($klenar_button_text); ?></a>
                            </div>
                          <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->


   <!-- side info start -->
   <?php klenar_side_info(); ?>
   <!-- side info end -->
   <div class="body-overlay"></div>
   <!-- sidebar area end -->

<?php
}


/**
 * header onepage style 2
 */
 function klenar_header_style_onepage_2() {

   $klenar_topbar_switch = get_theme_mod( 'klenar_topbar_switch', false );
   $klenar_address_text = get_theme_mod( 'klenar_address_text', __( '28/4 Palmal, London', 'klenar' ) );
   $klenar_email_text = get_theme_mod( 'klenar_email_text', __( 'info@klenar.com', 'klenar' ) );
   $klenar_email_link = get_theme_mod( 'klenar_email_link', __( 'info@klenar.com', 'klenar' ) );
   $klenar_contact_number = get_theme_mod( 'klenar_contact_number', __( '333 888 200 - 55', 'klenar' ) );
   $klenar_contact_link = get_theme_mod( 'klenar_contact_link', __( '333 888 200 - 55', 'klenar' ) );
   $klenar_button_text = get_theme_mod( 'klenar_button_text', __( 'Get Quote +', 'klenar' ) );
   $klenar_button_link = get_theme_mod( 'klenar_button_link', __( '#', 'klenar' ) );
   $klenar_header_right = get_theme_mod( 'klenar_header_right', false );

   $klenar_logo_bg = get_theme_mod( 'logo-bg', get_template_directory_uri() . '/assets/img/logo/logo-white-bg.png' );

    ?>

    <!-- header area start -->
    <header>
        <div class="tp-header-area-two header-sticky header-style-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-8">
                        <div class="tp-header-logo-two">
                            <div class="tp-header-logo-two-inner" data-background="<?php print esc_url($klenar_logo_bg); ?>">
                                <?php klenar_header_logo(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-4">
                        <div class="tp-header-menu-two-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tp-header-top-two">
                                        <div class="tp-header-top-two-info">
                                            <ul>
                                                <?php if (!empty($klenar_address_text)): ?>
                                                <li><i class="flaticon-pin"></i> <?php print esc_html($klenar_address_text); ?> </li>
                                                <?php endif; ?>

                                                <?php if (!empty($klenar_email_text)): ?>
                                                <li><i class="flaticon-email"></i><a href="mailto:<?php print esc_url($klenar_email_link); ?>"><?php print esc_html($klenar_email_text); ?></a></li>
                                                <?php endif; ?>

                                                <?php if (!empty($klenar_contact_number)): ?>
                                                <li><i class="flaticon-phone-call"></i><a href="tel:<?php print esc_url($klenar_contact_link); ?>"><?php print esc_html($klenar_contact_number) ?></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div class="tp-header-top-two-social">
                                            <?php klenar_header_social_profiles(); ?>
                                        </div>
                                    </div>
                                    <div class="tp-header-menu-two">
                                        <div class="tp-main-menu tp-main-menu-two">
                                            <nav id="tp-mobile-menu">
                                                <?php klenar_onepage_menu(); ?>
                                            </nav>
                                        </div>
                                        <div class="tp-main-menu-two-btn">
                                            <?php if (!empty($klenar_button_text)): ?>
                                            <a href="<?php print esc_url($klenar_button_link); ?>" class="yellow-btn"><?php print esc_html($klenar_button_text); ?></a>
                                            <?php endif; ?>

                                        </div>
                                        <!-- mobile menu activation -->
                                        <div class="side-menu-icon d-xl-none text-end">
                                            <button class="side-toggle"><i class="far fa-bars"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- header area end -->

   <!-- side info start -->
   <?php klenar_side_info(); ?>
   <!-- side info end -->
   <div class="body-overlay"></div>
   <!-- sidebar area end -->

<?php
}


// Header onepage 3

function klenar_header_style_onepage_3() {

    $klenar_topbar_switch = get_theme_mod( 'klenar_topbar_switch', false );
    $klenar_address_text = get_theme_mod( 'klenar_address_text', __( '28/4 Palmal, London', 'klenar' ) );
    $klenar_email_text = get_theme_mod( 'klenar_email_text', __( 'info@klenar.com', 'klenar' ) );
    $klenar_email_link = get_theme_mod( 'klenar_email_link', __( 'info@klenar.com', 'klenar' ) );
    $klenar_contact_number = get_theme_mod( 'klenar_contact_number', __( '333 888 200 - 55', 'klenar' ) );
    $klenar_contact_link = get_theme_mod( 'klenar_contact_link', __( '333 888 200 - 55', 'klenar' ) );
    $klenar_button_text = get_theme_mod( 'klenar_button_text', __( 'Free Quote', 'klenar' ) );
    $klenar_button_link = get_theme_mod( 'klenar_button_link', __( '#', 'klenar' ) );
    $klenar_header_bg = get_theme_mod( 'klenar_header_bg', '#075F33');
    $klenar_header_right = get_theme_mod( 'klenar_header_right', false );


    ?>

    <!-- header area start -->
    <header>
        <div class="tp-header-area header-style-3">

            <?php if (!empty($klenar_topbar_switch)): ?>
              <div class="tp-header-top header-bg pt-20 pb-50 d-none d-xl-block" data-bg-color="<?php print esc_attr( $klenar_header_bg );?>">
                  <div class="tp-custom-container">
                      <div class="row align-items-center">
                          <div class="col-xxl-4 col-xl-5">
                              <div class="tp-header-top-info">

                                  <?php if (!empty($klenar_address_text)): ?>
                                  <div class="tp-header-top-info-single pr-40 mr-40 border-right-1">
                                      <div class="tp-header-top-info-single-icon mr-10">
                                          <i class="flaticon-pin"></i>
                                      </div>
                                      <div class="tp-header-top-info-single-text">
                                          <span class="tp-header-top-info-single-label"><?php print esc_html__('Free Contact','klenar'); ?></span>
                                          <span class="tp-header-top-info-single-content font-medium"><?php print esc_html($klenar_address_text); ?></span>
                                      </div>
                                  </div>
                                  <?php endif; ?>

                                  <?php if (!empty($klenar_email_text)): ?>
                                  <div class="tp-header-top-info-single">
                                      <div class="tp-header-top-info-single-icon mr-15">
                                          <i class="flaticon-email"></i>
                                      </div>
                                      <div class="tp-header-top-info-single-text">
                                          <span class="tp-header-top-info-single-label"><?php print esc_html__('Email us', 'klenar') ?></span>
                                          <a href="mailto:<?php print esc_url($klenar_email_link); ?>" class="tp-header-top-info-single-content font-medium"><?php print esc_html($klenar_email_text); ?></a>
                                      </div>
                                  </div>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="col-xxl-4 col-xl-2">
                              <div class="header-logo text-center">
                                <?php klenar_header_logo(); ?>
                              </div>
                          </div>
                          <div class="col-xxl-4 col-xl-5">
                          <?php if (!empty($klenar_header_right)): ?>
                              <div class="tp-header-top-info justify-content-end">
                                <?php if (!empty($klenar_contact_number)): ?>
                                  <div class="tp-header-top-info-single mr-85">
                                      <div class="tp-header-top-info-single-icon tp-header-top-info-single-icon-call mr-10">
                                          <i class="flaticon-phone-call"></i>
                                      </div>
                                      <div class="tp-header-top-info-single-text">
                                          <span class="tp-header-top-info-single-label"><?php print esc_html__('Free Call', 'klenar') ?></span>
                                          <a href="tel:<?php print esc_url($klenar_contact_link); ?>" class="tp-header-top-info-single-content font-medium"><?php print esc_html($klenar_contact_number) ?></a>
                                      </div>
                                  </div>
                                <?php endif; ?>
                                <?php if (!empty($klenar_button_text)): ?>
                                  <div class="tp-header-top-info-single">
                                      <div class="tp-header-top-info-single-btn">
                                          <a href="<?php print esc_url($klenar_button_link); ?>" class="yellow-btn"><i class="flaticon-enter"></i> <?php print esc_html($klenar_button_text); ?></a>
                                      </div>
                                  </div>
                                  <?php endif; ?>
                              </div>
                              <?php endif; ?>
                          </div>
                      </div>
                  </div>
              </div>
            <?php endif; ?>
            <div class="tp-header-menu-area tp-transparent-header-menu header-sticky header-mt-30">
                <div class="container">
                    <div class="row justify-content-xl-center align-items-center">
                        <div class="col-xl-2 col-8 tp-sticky-column">
                            <div class="tp-sticky-logo">
                                <?php klenar_header_sticky_logo(); ?>                          
                            </div>
                        </div>
                        <div class="col-xl-8 col-4">
                            <div class="tp-main-menu-bg">
                                <div class="tp-main-menu">
                                    <nav id="tp-mobile-menu">
                                        <?php klenar_onepage_menu_3(); ?>
                                    </nav>
                                </div>
                                <!-- mobile menu activation -->
                                <div class="side-menu-icon d-xl-none text-end">
                                    <button class="side-toggle"><i class="far fa-bars"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 tp-sticky-column-btn">
                            <?php if (!empty($klenar_button_text)): ?>
                                <div class="tp-sticky-btn text-end">
                                    <a href="<?php print esc_url($klenar_button_link); ?>" class="theme-btn justify-content-end"><i class="flaticon-enter"></i> <?php print esc_html($klenar_button_text); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

   <!-- side info start -->
   <?php klenar_side_info(); ?>
   <!-- side info end -->
   <div class="body-overlay"></div>
   <!-- sidebar area end -->

<?php
}




// klenar_side_info
function klenar_side_info() {

    $klenar_side_hide = get_theme_mod( 'klenar_side_hide', false );
    $klenar_side_contact_hide = get_theme_mod( 'klenar_side_contact_hide', false );
    $klenar_side_address = get_theme_mod( 'klenar_side_address', __( '28/4 Palmal, London', 'klenar' ) );
    $klenar_side_phone = get_theme_mod( 'klenar_side_phone', __( '333 888 200 - 55', 'klenar' ) );
    $klenar_side_phone_link = get_theme_mod( 'klenar_side_phone_link', __( '333 888 200 - 55', 'klenar' ) );
    $klenar_side_mail = get_theme_mod( 'klenar_side_mail', __( 'info@klenar.com', 'klenar' ) );
    $klenar_side_mail_link = get_theme_mod( 'klenar_side_mail_link', __( 'info@klenar.com', 'klenar' ) );


    ?>


    <!-- mobile menu info -->
    <div class="fix">
        <div class="side-info">
            <button class="side-info-close"><i class="fal fa-times"></i></button>
            <div class="side-info-content">
                <div class="tp-mobile-menu"></div>
                <?php if (!empty($klenar_side_contact_hide)): ?>
                <div class="contact-infos mb-30">
                    <div class="contact-list mb-30">
                        <h4><?php print esc_html__('Contact Us', 'klenar') ?></h4>
                        <ul>
                            <?php if (!empty($klenar_side_address)): ?>
                            <li><i class="flaticon-pin"></i><?php print esc_html($klenar_side_address); ?></li>
                            <?php endif; ?>

                            <?php if (!empty($klenar_side_mail)): ?>
                            <li><i class="flaticon-email"></i><a href="mailto:<?php print esc_url($klenar_side_mail_link); ?>"><?php print esc_html($klenar_side_mail); ?></a></li>
                            <?php endif; ?>

                            <?php if (!empty($klenar_side_phone)): ?>
                            <li><i class="flaticon-phone-call"></i><a href="tel:<?php print esc_url($klenar_side_phone_link); ?>"><?php print esc_html($klenar_side_phone); ?></a></li>
                            <?php endif; ?>

                        </ul>
                        
                            <div class="sidebar__menu--social">
                                <?php klenar_header_social_profiles(); ?>
                            </div>
                        
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- mobile menu info -->


<?php }

/**
 * [klenar_header_lang description]
 * @return [type] [description]
 */
function klenar_header_lang_defualt() {
    $klenar_header_lang = get_theme_mod( 'klenar_header_lang', false );
    if ( $klenar_header_lang ): ?>

    <ul>
        <li><a href="#0" class="lang__btn"><?php print esc_html__( 'EN', 'klenar' );?> <i class="ti-arrow-down"></i></a>
        <?php do_action( 'klenar_language' );?>
        </li>
    </ul>

    <?php endif;?>
<?php
}

/**
 * [klenar_language_list description]
 * @return [type] [description]
 */
function _klenar_language( $mar ) {
    return $mar;
}
function klenar_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul>';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul>';
        $mar .= '<li><a href="#">' . esc_html__( 'USA', 'klenar' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'UK', 'klenar' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'CA', 'klenar' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'AU', 'klenar' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _klenar_language( $mar );
}
add_action( 'klenar_language', 'klenar_language_list' );

// favicon logo
function klenar_favicon_logo_func() {
        $klenar_favicon = get_template_directory_uri() . '/assets/img/favicon.png';
        $klenar_favicon_url = get_theme_mod( 'favicon_url', $klenar_favicon );
    ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $klenar_favicon_url );?>">

    <?php
}
add_action( 'wp_head', 'klenar_favicon_logo_func' );

// header logo
function klenar_header_logo() {
    ?>
    <?php
        $klenar_logo_on = function_exists( 'get_field' ) ? get_field( 'is_enable_sec_logo' ) : NULL;
        $klenar_logo = get_template_directory_uri() . '/assets/img/logo/logo-black.png';
        $klenar_logo_black = get_template_directory_uri() . '/assets/img/logo/logo.png';

        $klenar_site_logo = get_theme_mod( 'logo', $klenar_logo );
        $klenar_secondary_logo = get_theme_mod( 'seconday_logo', $klenar_logo_black );
    ?>

        <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                if ( !empty( $klenar_logo_on ) ) {
                    ?>
                        <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) );?>">
                            <img src="<?php print esc_url( $klenar_secondary_logo );?>" alt="<?php print esc_attr__( 'logo', 'klenar' );?>" />
                        </a>
                    <?php
                } else {
                    ?>
                        <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) );?>">
                            <img src="<?php print esc_url( $klenar_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'klenar' );?>" />
                        </a>
                    <?php
                }
            }
        ?>
    <?php
}

// header logo
function klenar_header_sticky_logo() {?>
    <?php
        $klenar_logo_black = get_template_directory_uri() . '/assets/img/logo/logo-black.png';
        $klenar_secondary_logo = get_theme_mod( 'seconday_logo', $klenar_logo_black );
    ?>
      <a class="sticky-logo" href="<?php print esc_url( home_url( '/' ) );?>">
          <img src="<?php print esc_url( $klenar_secondary_logo );?>" alt="<?php print esc_attr__( 'logo', 'klenar' );?>" />
      </a>
    <?php
}

function klenar_mobile_logo() {
    // side info
    $klenar_mobile_logo_hide = get_theme_mod( 'klenar_mobile_logo_hide', false );

    $klenar_site_logo = get_theme_mod( 'logo', get_template_directory_uri() . '/assets/img/logo/logo.png' );

    ?>

    <?php if ( !empty( $klenar_mobile_logo_hide ) ): ?>
    <div class="side__logo mb-25">
        <a class="sideinfo-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img src="<?php print esc_url( $klenar_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'klenar' );?>" />
        </a>
    </div>
    <?php endif;?>



<?php }

/**
 * [klenar_header_social_profiles description]
 * @return [type] [description]
 */
function klenar_header_social_profiles() {
    $klenar_topbar_fb_url = get_theme_mod( 'klenar_topbar_fb_url', __( '#', 'klenar' ) );
    $klenar_topbar_twitter_url = get_theme_mod( 'klenar_topbar_twitter_url', __( '#', 'klenar' ) );
    $klenar_topbar_instagram_url = get_theme_mod( 'klenar_topbar_instagram_url', __( '#', 'klenar' ) );
    $klenar_topbar_google_url = get_theme_mod( 'klenar_topbar_google_url', __( '#', 'klenar' ) );
    $klenar_topbar_linkedin_url = get_theme_mod( 'klenar_topbar_linkedin_url', __( '#', 'klenar' ) );
    $klenar_topbar_youtube_url = get_theme_mod( 'klenar_topbar_youtube_url', __( '#', 'klenar' ) );
    ?>

        <?php if ( !empty( $klenar_topbar_fb_url ) ): ?>
          <a href="<?php print esc_url( $klenar_topbar_fb_url );?>"><i class="fab fa-facebook-f"></i></a>
        <?php endif;?>

        <?php if ( !empty( $klenar_topbar_twitter_url ) ): ?>
            <a href="<?php print esc_url( $klenar_topbar_twitter_url );?>"><i class="fab fa-twitter"></i></a>
        <?php endif;?>

        <?php if ( !empty( $klenar_topbar_instagram_url ) ): ?>
            <a href="<?php print esc_url( $klenar_topbar_instagram_url );?>"><i class="fab fa-instagram"></i></a>
        <?php endif;?>

        <?php if ( !empty( $klenar_topbar_google_url ) ): ?>
            <a href="<?php print esc_url( $klenar_topbar_google_url );?>"><i class="fab fa-google-plus-g"></i></a>
        <?php endif;?>

        <?php if ( !empty( $klenar_topbar_linkedin_url ) ): ?>
            <a href="<?php print esc_url( $klenar_topbar_linkedin_url );?>"><i class="fab fa-linkedin-in"></i></a>
        <?php endif;?>

        <?php if ( !empty( $klenar_topbar_youtube_url ) ): ?>
            <a href="<?php print esc_url( $klenar_topbar_youtube_url );?>"><i class="fab fa-youtube"></i></a>
        <?php endif;?>

<?php
}

function klenar_footer_social_profiles() {
    $klenar_footer_fb_url = get_theme_mod( 'klenar_footer_fb_url', __( '#', 'klenar' ) );
    $klenar_footer_twitter_url = get_theme_mod( 'klenar_footer_twitter_url', __( '#', 'klenar' ) );
    $klenar_footer_instagram_url = get_theme_mod( 'klenar_footer_instagram_url', __( '#', 'klenar' ) );
    $klenar_footer_linkedin_url = get_theme_mod( 'klenar_footer_linkedin_url', __( '#', 'klenar' ) );
    $klenar_footer_youtube_url = get_theme_mod( 'klenar_footer_youtube_url', __( '#', 'klenar' ) );
    ?>

        <ul>
        <?php if ( !empty( $klenar_footer_fb_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $klenar_footer_fb_url );?>">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $klenar_footer_twitter_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $klenar_footer_twitter_url );?>">
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $klenar_footer_instagram_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $klenar_footer_instagram_url );?>">
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $klenar_footer_linkedin_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $klenar_footer_linkedin_url );?>">
                    <i class="fab fa-linkedin"></i>
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $klenar_footer_youtube_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $klenar_footer_youtube_url );?>">
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif;?>
        </ul>
<?php
}

/**
 * [klenar_header_menu description]
 * @return [type] [description]
 */
function klenar_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Klenar_Navwalker_Class::fallback',
            'walker'         => new Klenar_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [klenar_header_menu_3 description]
 * @return [type] [description]
 */
function klenar_header_menu_3() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'text-center',
            'container'      => '',
            'fallback_cb'    => 'Klenar_Navwalker_Class::fallback',
            'walker'         => new Klenar_Navwalker_Class,
        ] );
    ?>
    <?php
}

function klenar_onepage_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'onepage-menu',
            'menu_class'     => 'onepage-single-menu',
            'container'      => '',
            'fallback_cb'    => 'Klenar_Navwalker_Class::fallback',
            'walker'         => new Klenar_Navwalker_Class,
        ] );
    ?>
    <?php
}

function klenar_onepage_menu_3() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'onepage-menu',
            'menu_class'     => 'onepage-single-menu text-center',
            'container'      => '',
            'fallback_cb'    => 'Klenar_Navwalker_Class::fallback',
            'walker'         => new Klenar_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 *
 * klenar footer
 */
add_action( 'klenar_footer_style', 'klenar_check_footer', 10 );

function klenar_check_footer() {
    $klenar_footer_style = function_exists( 'get_field' ) ? get_field( 'footer_style' ) : NULL;
    $klenar_default_footer_style = get_theme_mod( 'choose_default_footer', 'footer-style-1' );

    if ( $klenar_footer_style == 'footer-style-1' ) {
        klenar_footer_style_1();
    }
    elseif ( $klenar_footer_style == 'footer-style-2' ) {
        klenar_footer_style_2();
    }
    elseif ( $klenar_footer_style == 'footer-style-3' ) {
        klenar_footer_style_3();
    }
    else {

        /** default footer style **/
        if ( $klenar_default_footer_style == 'footer-style-2' ) {
            klenar_footer_style_2();
        }
        if ( $klenar_default_footer_style == 'footer-style-3' ) {
            klenar_footer_style_3();
        }
        else {
            klenar_footer_style_1();
        }

    }
}

/**
 * footer  style_defaut
 */
function klenar_footer_style_1() {

    $footer_bg_img = get_theme_mod( 'klenar_footer_bg' );
    $klenar_footer_logo = get_theme_mod( 'klenar_footer_logo' );
    $klenar_footer_top_space = function_exists('get_field') ? get_field('klenar_footer_top_space') : '0';
    $klenar_copyright_center = $klenar_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
    $klenar_footer_bg_url_from_page = function_exists( 'get_field' ) ? get_field( 'klenar_footer_bg' ) : '';
    $klenar_footer_bg_color_from_page = function_exists( 'get_field' ) ? get_field( 'klenar_footer_bg_color' ) : '';
    $footer_bg_color = get_theme_mod( 'klenar_footer_bg_color' );

    $klenar_footer_bg_color_from_page_bottom = function_exists( 'get_field' ) ? get_field( 'klenar_footer_bottom_bg_color' ) : '';

    $footer_bg_color_bottom = get_theme_mod( 'klenar_footer_bg_color_bottom' );

    // bg image
    $bg_img = !empty( $klenar_footer_bg_url_from_page['url'] ) ? $klenar_footer_bg_url_from_page['url'] : $footer_bg_img;

    // bg color
    $bg_color = !empty( $klenar_footer_bg_color_from_page ) ? $klenar_footer_bg_color_from_page : $footer_bg_color;

    // bg color
    $bg_color_bottom = !empty( $klenar_footer_bg_color_from_page_bottom ) ? $klenar_footer_bg_color_from_page_bottom : $footer_bg_color_bottom;


    // footer_columns
    $footer_columns = 0;
    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-' . $num ) ) {
            $footer_columns++;
        }
    }

    switch ( $footer_columns ) {
    case '1':
        $footer_class[1] = 'col-lg-12';
        break;
    case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
    case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;
    case '4':
        $footer_class[1] = 'col-lg-3 col-md-6 col-sm-6';
        $footer_class[2] = 'col-lg-3 col-md-6 col-sm-6';
        $footer_class[3] = 'col-lg-3 col-md-6 col-sm-6';
        $footer_class[4] = 'col-lg-3 col-md-6 col-sm-6';
        break;
    default:
        $footer_class = 'col-xl-3 col-lg-3 col-md-6';
        break;
    }

    ?>

    
    <footer class="footer-bg include-bg" data-bg-color="<?php print esc_attr( $bg_color );?>" data-background="<?php print esc_url( $bg_img );?>">
        <?php if ( is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') OR is_active_sidebar('footer-4') ): ?>
            <div class="tp-footer-area pt-100 pb-70">
                <div class="container">
                    <div class="row">
                        <?php
                                if ( $footer_columns < 5 ) {
                                print '<div class="col-lg-3 col-sm-6">';
                                dynamic_sidebar( 'footer-1' );
                                print '</div>';

                                print '<div class="col-lg-3 col-sm-6">';
                                dynamic_sidebar( 'footer-2' );
                                print '</div>';

                                print '<div class="col-lg-3 col-sm-6">';
                                dynamic_sidebar( 'footer-3' );
                                print '</div>';

                                print '<div class="col-lg-3 col-sm-6">';
                                dynamic_sidebar( 'footer-4' );
                                print '</div>';
                                } else {
                                    for ( $num = 1; $num <= $footer_columns; $num++ ) {
                                        if ( !is_active_sidebar( 'footer-' . $num ) ) {
                                            continue;
                                        }
                                        print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                        dynamic_sidebar( 'footer-' . $num );
                                        print '</div>';
                                    }
                                }
                            ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'footer-subcriber' ) ) : ?>
            <?php dynamic_sidebar( 'footer-subcriber' ); ?>
        <?php endif; ?>

        <div  class="tp-copyright-area footer-bg-bottom z-index pt-45 pb-35" data-bg-color="<?php print esc_attr( $bg_color_bottom );?>">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="tp-copyright text-center">
                            <p>
                                <?php klenar_copyright_text(); ?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer>


<?php
}

/**
 * footer  style 2
 */
function klenar_footer_style_2() {
    $footer_bg_img = get_theme_mod( 'klenar_footer_bg' );
    $klenar_footer_logo = get_theme_mod( 'klenar_footer_logo' );
    $klenar_footer_top_space = function_exists('get_field') ? get_field('klenar_footer_top_space') : '0';
    $klenar_copyright_center = $klenar_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
    $klenar_footer_bg_url_from_page = function_exists( 'get_field' ) ? get_field( 'klenar_footer_bg' ) : '';
    $klenar_footer_bg_color_from_page = function_exists( 'get_field' ) ? get_field( 'klenar_footer_bg_color' ) : '';
    $footer_bg_color = get_theme_mod( 'klenar_footer_bg_color' );
    $footer_top_space = get_theme_mod( 'klenar_footer_top_space' );
    $footer_copyright2_switch = get_theme_mod( 'footer_copyright2_switch', true );

    $klenar_footer_bg_color_from_page_bottom = function_exists( 'get_field' ) ? get_field( 'klenar_footer_bottom_bg_color' ) : '';

    $footer_bg_color_bottom = get_theme_mod( 'klenar_footer_bg_color_bottom' );


    // bg image
    $bg_img = !empty( $klenar_footer_bg_url_from_page['url'] ) ? $klenar_footer_bg_url_from_page['url'] : $footer_bg_img;

    // bg color
    $bg_color = !empty( $klenar_footer_bg_color_from_page ) ? $klenar_footer_bg_color_from_page : $footer_bg_color;

    // bg color
    $bg_color_bottom = !empty( $klenar_footer_bg_color_from_page_bottom ) ? $klenar_footer_bg_color_from_page_bottom : $footer_bg_color_bottom;

    // footer space
    $footer_space = !empty( $klenar_footer_top_space ) ? $klenar_footer_top_space : $footer_top_space;

    $footer_columns = 0;
    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-2-' . $num ) ) {
            $footer_columns++;
        }
    }

    switch ( $footer_columns ) {
    case '1':
        $footer_class[1] = 'col-lg-12';
        break;
    case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
    case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;
    case '4':
        $footer_class[1] = 'col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6';
        $footer_class[2] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6';
        $footer_class[3] = 'col-xxl-3 col-xl-2 col-lg-2 col-md-4 col-sm-6';
        $footer_class[4] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6';
        break;
    case '5':
        $footer_class[1] = 'col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6';
        $footer_class[2] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6 footer__pl-70';
        $footer_class[3] = 'col-xxl-3 col-xl-2 col-lg-2 col-md-4 col-sm-6 footer__pl-90';
        $footer_class[4] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6';
        $footer_class[5] = 'col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6';
        break;
    default:
        $footer_class = 'col-xl-3 col-lg-3 col-md-6';
        break;
    }

    ?>

    <!-- footer area start -->
        <footer class="footer-bg include-bg" data-bg-color="<?php print esc_attr( $bg_color );?>" data-background="<?php print esc_url( $bg_img );?>">
            <?php if ( is_active_sidebar( 'footer-subcriber2' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-subcriber2' ); ?>
            <?php endif; ?>
            <?php if ( is_active_sidebar( 'footer-2-1' ) OR is_active_sidebar( 'footer-2-2' ) OR is_active_sidebar( 'footer-2-3' ) OR is_active_sidebar( 'footer-2-4' ) ): ?>
            <div class="tp-footer-area-two pt-100 pb-50 include-bg">
                <div class="container">
                    <div class="row">

                    <?php
                        if ( $footer_columns < 5 ) {
                        print '<div class="col-lg-3 col-sm-6">';
                        dynamic_sidebar( 'footer-2-1' );
                        print '</div>';

                        print '<div class="col-lg-3 col-sm-6">';
                        dynamic_sidebar( 'footer-2-2' );
                        print '</div>';

                        print '<div class="col-lg-3 col-sm-6">';
                        dynamic_sidebar( 'footer-2-3' );
                        print '</div>';

                        print '<div class="col-lg-3 col-sm-6">';
                        dynamic_sidebar( 'footer-2-4' );
                        print '</div>';
                        } else {
                            for ( $num = 1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-2-' . $num ) ) {
                                    continue;
                                }
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-2-' . $num );
                                print '</div>';
                            }
                        }
                    ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="tp-copyright-area-two footer-bg-bottom z-index pt-30 pb-30" data-bg-color="<?php print esc_attr( $bg_color_bottom );?>">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-copyright tp-copyright-two text-center">
                            <p class="m-0"><?php print klenar_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->
<?php
}

/**
 * footer  style 3
 */
function klenar_footer_style_3() {
    $footer_bg_img = get_theme_mod( 'klenar_footer_bg' );
    $klenar_footer_logo = get_theme_mod( 'klenar_footer_logo' );
    $klenar_footer_top_space = function_exists('get_field') ? get_field('klenar_footer_top_space') : '0';
    $klenar_copyright_center = $klenar_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
    $klenar_footer_bg_url_from_page = function_exists( 'get_field' ) ? get_field( 'klenar_footer_bg' ) : '';
    $klenar_footer_bg_color_from_page_3 = function_exists( 'get_field' ) ? get_field( 'klenar_footer_bg_color_3' ) : '';
    $footer_bg_color_3 = get_theme_mod( 'klenar_footer_bg_color_3', '#041459' );
    $footer_top_space = get_theme_mod( 'klenar_footer_top_space' );
    $footer_copyright2_switch = get_theme_mod( 'footer_copyright2_switch', true );

    $klenar_footer_bg_color_from_page_bottom_3 = function_exists( 'get_field' ) ? get_field( 'klenar_footer_bottom_bg_color_3' ) : '';

    $footer_bg_color_bottom_3 = get_theme_mod( 'klenar_footer_bg_color_bottom_3', '#18255e' );

    // bg image
    $bg_img = !empty( $klenar_footer_bg_url_from_page['url'] ) ? $klenar_footer_bg_url_from_page['url'] : $footer_bg_img;

    // bg color
    $bg_color = !empty( $klenar_footer_bg_color_from_page_3 ) ? $klenar_footer_bg_color_from_page_3 : $footer_bg_color_3;

    // bg color
    $bg_color_bottom = !empty( $klenar_footer_bg_color_from_page_bottom_3 ) ? $klenar_footer_bg_color_from_page_bottom_3 : $footer_bg_color_bottom_3;

   // footer space
    $footer_space = !empty( $klenar_footer_top_space ) ? $klenar_footer_top_space : $footer_top_space;

    $footer_columns = 0;
    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-3-' . $num ) ) {
            $footer_columns++;
        }
    }

    switch ( $footer_columns ) {
    case '1':
        $footer_class[1] = 'col-lg-12';
        break;
    case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
    case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;
    case '4':
        $footer_class[1] = 'col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6';
        $footer_class[2] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6';
        $footer_class[3] = 'col-xxl-3 col-xl-2 col-lg-2 col-md-4 col-sm-6';
        $footer_class[4] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6';
        break;
    case '5':
        $footer_class[1] = 'col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6';
        $footer_class[2] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6 footer__pl-70';
        $footer_class[3] = 'col-xxl-3 col-xl-2 col-lg-2 col-md-4 col-sm-6 footer__pl-90';
        $footer_class[4] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6';
        $footer_class[5] = 'col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6';
        break;
    default:
        $footer_class = 'col-xl-3 col-lg-3 col-md-6';
        break;
    }

    ?>


    <!-- footer area start -->
   <footer class="theme-dark-bg2 include-bg" data-bg-color="<?php print esc_attr( $bg_color );?>" data-background="<?php print esc_url( $bg_img );?>">
      <div class="tp-footer-area-two tp-footer-area-mt--60 pt-160 pb-40" data-top-space="<?php print esc_attr($footer_top_space); ?>">
      <?php if ( is_active_sidebar('footer-3-1') OR is_active_sidebar('footer-3-2') OR is_active_sidebar('footer-3-3') OR is_active_sidebar('footer-3-4') ): ?>
            <div class="container">
               <div class="row">
                <?php
                    if ( $footer_columns < 5 ) {
                    print '<div class="col-lg-3 col-sm-6">';
                    dynamic_sidebar( 'footer-3-1' );
                    print '</div>';

                    print '<div class="col-lg-3 col-sm-6">';
                    dynamic_sidebar( 'footer-3-2' );
                    print '</div>';

                    print '<div class="col-lg-3 col-sm-6">';
                    dynamic_sidebar( 'footer-3-3' );
                    print '</div>';

                    print '<div class="col-lg-3 col-sm-6">';
                    dynamic_sidebar( 'footer-3-4' );
                    print '</div>';
                    } else {
                        for ( $num = 1; $num <= $footer_columns; $num++ ) {
                            if ( !is_active_sidebar( 'footer-3-' . $num ) ) {
                                continue;
                            }
                            print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                            dynamic_sidebar( 'footer-3-' . $num );
                            print '</div>';
                        }
                    }
                ?>
               </div>
            </div>
         <?php endif; ?>
      </div>
      <div class="tp-copyright-area-two theme-dark-bg3 z-index pt-30 pb-30" data-bg-color="<?php print esc_attr( $bg_color_bottom );?>">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-copyright tp-copyright-two text-center">
                            <p class="m-0"><?php print klenar_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </footer>
<?php
}



// klenar_copyright_text
function klenar_copyright_text() {

    print get_theme_mod( 'footer__copyright_text', esc_html( 'Copyright ©2022 Theme_pure. All Rights Reserved Copyright', 'klenar' ) );
}

/**
 * [klenar_breadcrumb_func description]
 * @return [type] [description]
 */
function klenar_breadcrumb_func() {
    global $post;
        $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if ( is_front_page() && is_home() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','klenar'));
        $breadcrumb_class = 'home_front_page';
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','klenar'));
        $breadcrumb_show = 0;

    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts') );
        }
    }
    elseif ( is_single() && 'post' == get_post_type() ) { 
         $title = get_the_title();
    }
    elseif ( is_single() && 'product' == get_post_type() ) { 
        $title = get_theme_mod('breadcrumb_product_details', __('Shop','klenar'));
    }   
    elseif ( is_single() && 'bdevs-services' == get_post_type() ) { 
        $title = get_the_title();    
    }       
    elseif ( is_single() && 'bdevs-cases' == get_post_type() ) { 
        $title = get_the_title();
    }
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'klenar' ) . get_search_query();
    }
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'klenar' );
    }
    elseif ( function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop', __('Shop','klenar'));
    }
    elseif ( is_archive() ) {
        $title = get_the_archive_title();
    }
    else {
        $title = get_the_title();
    }



    $_id = get_the_ID();

    if ( is_single() && 'product' == get_post_type() ) {
        $_id = $post->ID;
    }
    elseif ( function_exists("is_shop") AND is_shop()  ) {
        $_id = wc_get_page_id('shop');
    }
    elseif ( is_home() && get_option( 'page_for_posts' ) ) {
        $_id = get_option( 'page_for_posts' );
    }

    $is_breadcrumb = function_exists( 'get_field' ) ? get_field( 'is_it_invisible_breadcrumb', $_id ) : '';

    $klenar_breadcrumb_bg_color = get_theme_mod( 'klenar_breadcrumb_bg_color','#f3ebde' );

    if ( empty( $is_breadcrumb ) && $breadcrumb_show == 1 ) {

        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image',$_id) : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image',$_id) : '';

        // get_theme_mod
        $bg_img = get_theme_mod( 'breadcrumb_bg_img' );
        $klenar_breadcrumb_switch = get_theme_mod( 'klenar_breadcrumb_switch', true );

        if ( $hide_bg_img ) {
            $bg_img = '';
        } else {
            $bg_img = !empty( $bg_img_from_page ) ? $bg_img_from_page['url'] : $bg_img;
        }?>


        <?php if(!empty($klenar_breadcrumb_switch)): ?>
        <div class="tp-page-title-area pt-180 pb-185 position-relative fix <?php print esc_attr( $breadcrumb_class );?>" data-bg-color="<?php print esc_attr( $klenar_breadcrumb_bg_color );?>"  data-background="<?php print esc_attr($bg_img);?>">
            <div class="tp-custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="tp-page-title z-index text-center">
                            <h2 class="breadcrumb-title"><?php echo wp_kses_post( $title ); ?></h2>
                            <div class="breadcrumb-menu">
                                  <?php klenar_breadcrumb_callback();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php
}
}
add_action( 'klenar_before_main_content', 'klenar_breadcrumb_func' );

function klenar_breadcrumb_callback() {
    $args = [
        'show_browse'   => false,
        'post_taxonomy' => ['product' => 'product_cat'],
    ];
    $breadcrumb = new Klenar_Breadcrumb_Class( $args );

    return $breadcrumb->trail();
}

// klenar_search_form
function klenar_search_form() {
    ?>
     <div class="search-wrapper p-relative transition-3 d-none">
         <div class="search-form transition-3">
             <form method="get" action="<?php print esc_url( home_url( '/' ) );?>" >
                 <input type="search" name="s" value="<?php print esc_attr( get_search_query() )?>" placeholder="<?php print esc_attr__( 'Enter Your Keyword', 'klenar' );?>" >
                 <button type="submit" class="search-btn"><i class="far fa-search"></i></button>
             </form>
             <a href="javascript:void(0);" class="search-close"><i class="far fa-times"></i></a>
         </div>
     </div>
   <?php
}

add_action( 'klenar_before_main_content', 'klenar_search_form' );


/**
 *
 * pagination
 */
if ( !function_exists( 'klenar_pagination' ) ) {

    function _klenar_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function klenar_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];
        }

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _klenar_pagi_callback( $pagi );
    }
}


// theme customization
function klenar_custom(){

    wp_enqueue_style('klenar-custom', KLENAR_THEME_CSS_DIR . 'klenar-custom.css', array());

    // theme color 
    $klenar_color_option = get_theme_mod('klenar_color_option', '#06ae5a');

    if (!empty($klenar_color_option)) {
        $custom_css = '';
        // bg
        $custom_css .= ".yellow-btn:hover, .tp-slider-video-btn a, .theme-btn, .yellow-btn:hover, .tp-choose-timeline-single::before,.tp-pricing-tabs button.active, .tp-project-text-icon a, .tp-project:hover .tp-project-text, .tp-skill__wrapper .progress .progress-bar, .tp-skill__wrapper .progress .progress-bar span, .tp-blog-img .tp-blog-badge, .slide-prev, .tp-main-menu ul li a::before, .tp-main-menu ul li .sub-menu li a::before, .tp-header-top-two-social a:hover, .tp-slider-video-btn-two a, .tp-slider-active .slide-prev:hover, .tp-slider-active .slide-next:hover, .tp-cta-two, .tp-cta-two:hover .tp-cta-two-icon, .tp-quality:hover .tp-quality-text-icon a, .tp-testimonial-two-qoute, .swiper-container-horizontal.common-dots .slide-dots .swiper-pagination-bullet.swiper-pagination-bullet-active, .tp-service-two-icon .share-icon, .tp-service-two-icon-wrapper ul li a, .tp-blog-date, .tp-service-three-img-icon, .tp-project-three-img-overlay-text-icon a:hover, .tp-testimonial-three-shadow.common-dots .slide-dots .swiper-pagination-bullet.swiper-pagination-bullet-active, .tp-choose-three-year, .tp-blog-three-text-meta, .tp-about-inner-page-text .tp-about-number-icon, .tp-service-four:hover .tp-service-three-text-btn a, .tp-services-sidebar-btn a, .tp-faqs-left-sidebar-title::before, .tp-appoint-contact .tp-testimonial-two-form-wrapper, .sidebar__menu--social a::before, .tp-prjects-tab-menu .nav-link.active, .sidebar__widget--title::before, .tagcloud a:hover, .basic-pagination ul li a:hover, .basic-pagination ul li span.current, .preloader span{ background: " . $klenar_color_option . "}";

        // color
        $custom_css .= ".tp-header-right-three .tp-header-number-three span, .tp-pricing-icon i, .tp-blog-title:hover, .tp-blog-link a:hover, .progress-wrap::after, .tp-main-menu ul li:hover > a, .tp-main-menu ul li .sub-menu li:hover > a, .hover-theme-color:hover, .tp-header-top-two-info ul li i, .tp-header-top-two-info ul li a i, .tp-section-title-two span, .tp-about-text-two-sign-text span, .tp-quality-text span, .tp-testimonial-form-title span, .tp-faq-text .accordion-button:not(.collapsed)::after, .tp-blog-title-two:hover, .tp-blog-meta-two ul li a:hover, .tp-blog-link-two a:hover, .tp-blog-three-link a:hover, .tp-section-subtitle-three, .tp-feature-three-title:hover, .tp-about-text-three .tp-about-service-text-title:hover, .tp-service-three-title:hover, .tp-project-three-img-overlay-title:hover, .tp-choose-three .tp-about-service-text-title:hover, tp-blog-three-title:hover, .tp-footer-newsletter-three form .tp-footer-newsletter-three-field i, .tp-service-two-title:hover, .tp-faqs-left-sidebar ul li a:hover, .tp-service-details p i, .sidebar__post--title:hover, .widget ul li a:hover, .widget ul li a::before, .ablog__text--title4:hover, .ablog__meta4 ul li a:hover, .ablog__meta4 ul li span:hover, .ablog__meta4 ul li a i, .ablog__meta4 ul li span i, .ablog__text4 blockquote::before, .tp-contact-info-icon i, .tp-services-text-link a:hover{ color: " . $klenar_color_option . "}";

        // border
        $custom_css .= ".tp-choose-timeline, .tp-about-text-two-service-single-icon span::before, .tp-quality-img, .swiper-container-horizontal.common-dots .slide-dots .swiper-pagination-bullet.swiper-pagination-bullet-active::before, .tp-main-menu ul li .sub-menu, .tp-faqs-left-sidebar.tp-services-sidebar ul li:hover, .tp-contact-form-field input:focus, .tp-contact-form-field select:focus, .tp-contact-form-field textarea:focus, .tp-team-social a:hover, .tp-prjects-tab-menu .nav-link.active, .tagcloud a:hover, .post-input textarea:focus { border-color: " . $klenar_color_option . "}";

        // svg stroke
        $custom_css .= ".progress-wrap svg.progress-circle path{ stroke: " . $klenar_color_option . "}";

        wp_add_inline_style('klenar-custom', $custom_css);
    }    

    // Primary color 
    $klenar_color_option_prim = get_theme_mod('klenar_color_option_prim', '#fed10c');

    if (!empty($klenar_color_option_prim)) {
        $custom_css = '';
        // bg
        $custom_css .= ".yellow-btn, .theme-btn:hover, .common-yellow-shape::before, .yellow-circle-shape::before, .tp-pricing-tabs button, .slide-next, .tp-project:hover .tp-project-text-icon a, .tp-cta-two-icon, .tp-cta-two:hover, .tp-about-img-two-badge, .tp-quality-text-icon a, .tp-pricing-two-rate.active, .tp-footer-widget-title::before, .tp-service-two-img-box::before, .tp-testimonial-slider-arrow .slide-next, .tp-pricing-btn .theme-btn:hover, .tp-pricing-btn .theme-btn.active, .tp-faqs-right .accordion-button:not(.collapsed)::after, .theme-yellow-bg, .tp-footer-subscribe-area::before { background: " . $klenar_color_option_prim . "}";

        // color
        $custom_css .= ".tp-heddader-right-three .tp-header-number-three span, .tp-footer-widget ul li a:hover, .tp-footer-news-single h6:hover, .tp-section-title-two span.theme-yellow, .tp-team-subtitle, .tp-team-text ul li i, .tp-team-text ul li a i{ color: " . $klenar_color_option_prim . "}";

        // border
        $custom_css .= ".fdddf{ border-color: " . $klenar_color_option_prim . "}";

        wp_add_inline_style('klenar-custom', $custom_css);
    }

    // Secondary color 
    $klenar_color_option_sec = get_theme_mod('klenar_color_option_sec', '#075f33');

    if (!empty($klenar_color_option_sec)) {
        $custom_css = '';
        // bg
        $custom_css .= ".theme-dark-bg, .tp-pricing-two-shape, .tp-service-two-icon-wrapper ul li a::before, .tp-testimonial-slider-arrow .slide-prev, .tp-appoint-contact button:hover { background: " . $klenar_color_option_sec . "}";
        // color
        $custom_css .= ".tp-heddader-right-three .tp-header-number-three span{ color: " . $klenar_color_option_sec . "}";
        $custom_css .= ".fdddf{ border-color: " . $klenar_color_option_sec . "}";

        wp_add_inline_style('klenar-custom', $custom_css);
    }

    // Third color 
    $klenar_color_option_third = get_theme_mod('klenar_color_option_third', '#084d2b');

    if (!empty($klenar_color_option_third)) {
        $custom_css = '';
        // bg
        $custom_css .= ".bg-green-light, .tp-footer-info-social a:hover, .bg-green-light, .tp-footer-info-social a:hover { background: " . $klenar_color_option_third . "}";
        // color
        $custom_css .= ".tp-heddader-right-three .tp-header-number-three span{ color: " . $klenar_color_option_third . "}";
        $custom_css .= ".fdddf{ border-color: " . $klenar_color_option_third . "}";

        wp_add_inline_style('klenar-custom', $custom_css);
    }


    // Third color 
    $klenar_color_option_fourth = get_theme_mod('klenar_color_option_fourth', '#102579');

    if (!empty($klenar_color_option_fourth)) {
        $custom_css = '';
        // bg
        $custom_css .= ".tp-project-three-img-overlay-text-icon a { background: " . $klenar_color_option_fourth . "}";

        // color
        $custom_css .= ".tp-main-menu-three ul li a, .color-theme-blue, .tp-about-text-three .tp-about-service-text-title, .tp-about-text-three .tp-about-service-icon i, .tp-service-three-title, .tp-project-three-img-overlay-title, .tp-choose-three .tp-about-service-icon i, .tp-choose-three .tp-about-service-text-title, tp-blog-three-title, .tp-feature-three-title { color: " . $klenar_color_option_fourth . "}";

        $custom_css .= ".fdddf{ border-color: " . $klenar_color_option_fourth . "}";

        wp_add_inline_style('klenar-custom', $custom_css);
    }

    // Breadcrumb Padding Top
    $klenar_breadcrumb_pad_top = get_theme_mod('klenar_breadcrumb_pad_top', '180px');

    if (!empty($klenar_breadcrumb_pad_top)) {
        $custom_css = '';
        // bg
        $custom_css .= ".tp-page-title-area { padding-top: " . $klenar_breadcrumb_pad_top . "}";
        wp_add_inline_style('klenar-custom', $custom_css);
    }

    // Breadcrumb Padding Bottom 
    $klenar_breadcrumb_pad_bottom = get_theme_mod('klenar_breadcrumb_pad_bottom', '185px');

    if (!empty($klenar_breadcrumb_pad_bottom)) {
        $custom_css = '';
        // bg
        $custom_css .= ".tp-page-title-area { padding-bottom: " . $klenar_breadcrumb_pad_bottom . "}";
        wp_add_inline_style('klenar-custom', $custom_css);
    }

    // Breadcrumb Padding Bottom 
    $klenar_breadcrumb_title_color = get_theme_mod('klenar_breadcrumb_title_color', '#09150f');

    if (!empty($klenar_breadcrumb_title_color)) {
        $custom_css = '';
        // bg
        $custom_css .= ".breadcrumb-title { color: " . $klenar_breadcrumb_title_color . "}";
        wp_add_inline_style('klenar-custom', $custom_css);
    }


}

add_action('wp_enqueue_scripts', 'klenar_custom');


// klenar_kses_intermediate
function klenar_kses_intermediate( $string = '' ) {
    return wp_kses( $string, klenar_get_allowed_html_tags( 'intermediate' ) );
}

function klenar_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}
