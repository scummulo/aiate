<?php
/**
 * WooCommerce POS General Settings
 *
 * @author    Actuality Extensions
 * @package   WoocommercePointOfSale/Classes/settings
 * @category    Class
 * @since     0.1
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('WC_POS_Admin_Settings_Layout')) :

    /**
     * WC_POS_Admin_Settings_Layout
     */
    class WC_POS_Admin_Settings_Layout extends WC_Settings_Page
    {

        /**
         * Constructor.
         */
        public function __construct()
        {
            $this->id = 'layout_pos';
            $this->label = __('Layout', 'woocommerce');

            add_filter('wc_pos_settings_tabs_array', array($this, 'add_settings_page'), 20);
            add_action('wc_pos_settings_' . $this->id, array($this, 'output'));
            add_action('wc_pos_settings_save_' . $this->id, array($this, 'save'));
            add_action('woocommerce_admin_field_company_logo', array($this, 'company_logo_setting'));

        }

        /**
         * Output installed payment gateway settings.
         *
         * @access public
         * @return void
         */
        public function company_logo_setting()
        {
            $woocommerce_pos_company_logo = get_option('woocommerce_pos_company_logo', '');
            ?>
            <tr valign="top">
                <th class="titledesc" scope="row">
                    <label for="woocommerce_pos_company_logo"><?php _e('Company Logo', 'wc_point_of_sale'); ?></label>
                </th>
                <td class="forminp">
                    <?php
                    $src = '';
                    if (!empty($woocommerce_pos_company_logo)) {
                        $src = wp_get_attachment_image_src($woocommerce_pos_company_logo, array(150, 150));
                        $src = $src[0];
                    } ?>
                    <img width="150" src="<?php echo $src; ?>" alt="" id="woocommerce_pos_company_logo_img">
                    <input type="hidden" name="woocommerce_pos_company_logo" id="woocommerce_pos_company_logo_hidden"
                           value="<?php echo $woocommerce_pos_company_logo; ?>">
                    <input type="button" id="woocommerce_pos_company_logo" class="button button-large"
                           value="<?php echo ($woocommerce_pos_company_logo) ? 'Change' : 'Set'; ?>">
                </td>
            </tr>
            <?php
        }

        /**
         * Get settings array
         *
         * @return array
         */
        public function get_settings()
        {
            global $woocommerce;

            return apply_filters('woocommerce_point_of_sale_tax_settings_fields', array(

                array('type' => 'title', 'desc' => '', 'id' => 'tax_pos_options'),
                array(
                    'name' => __('Register Layout', 'wc_point_of_sale'),
                    'id' => 'woocommerce_pos_register_layout',
                    'css' => '',
                    'std' => '',
                    'type' => 'radio',
                    'desc' => __('Select the layout for the register.', 'wc_point_of_sale'),
                    'desc_tip' => true,
                    'options' => array(
                        'one' => __('One Column', 'wc_point_of_sale'),
                        'two' => __('Two columns', 'wc_point_of_sale'),
                    ),
                    'default' => 'two',
                    'class' => 'pos_register_layout_opt'
                ),
                array(
                    'name' => __('Column Size', 'wc_point_of_sale'),
                    'id' => 'woocommerce_pos_register_size',
                    'css' => '',
                    'std' => '',
                    'type' => 'radio',
                    'desc' => __('Select the size for the register.', 'wc_point_of_sale'),
                    'desc_tip' => true,
                    'options' => array(
                        'twenty' => __('60:40', 'wc_point_of_sale'),
                        'fifty' => __('50:50', 'wc_point_of_sale'),
                    ),
                    'default' => 'twenty',
                    'class' => 'pos_register_layout_opt'
                ),
                array(
                    'name' => __('Register Position', 'wc_point_of_sale'),
                    'id' => 'woocommerce_pos_register_revert_columns',
                    'css' => '',
                    'std' => '',
                    'type' => 'checkbox',
                    'desc' => __('Switch register position', 'wc_point_of_sale'),
                    'desc_tip' => __('Choose whether to switch the grid to the left and the register to the right.', 'wc_point_of_sale'),
                    'default' => 'yes',
                    'class' => 'pos_register_layout_opt'
                ),
                array(
                    'name' => __('Branding', 'wc_point_of_sale'),
                    'id' => 'woocommerce_pos_register_branding',
                    'css' => '',
                    'std' => '',
                    'type' => 'checkbox',
                    'desc' => __('Remove branding of the register on page', 'wc_point_of_sale'),
                    'desc_tip' => __('Choose whether to display the Actuality Extensions logo in the top left corner.', 'wc_point_of_sale'),
                    'default' => 'no',
                    'class' => 'pos_register_layout_opt'
                ),
				array(
					'title'    => __( 'Base Colour', 'woocommerce' ),
					'desc' => __('Rebrand the colour of the register to suit your shops colour scheme.', 'wc_point_of_sale'),
					'id'       => 'woocommerce_pos_register_base_color',
					'type'     => 'select',
					'css'      => 'width:6em;',
					'class'   => 'wc-enhanced-select',
					'default'  => '#8f1e20',
                    'desc_tip' => true,
                    'options' => array(
                        '#8f1e20' => __('Actuality Extensions', 'wc_point_of_sale'),
                        '#96588a' => __('WooCommerce', 'wc_point_of_sale'),
                        '#b71c1c' => __('Red', 'wc_point_of_sale'),
                        '#0d47a1' => __('Blue', 'wc_point_of_sale'),
                        '#004d40' => __('Teal', 'wc_point_of_sale'),
                        '#2e7d32' => __('Green', 'wc_point_of_sale'),
                        '#e65100' => __('Orange', 'wc_point_of_sale'),
                        '#37474f' => __('Grey', 'wc_point_of_sale'),
                    ),
				),
                array(
                    'name' => __('Second Column Layout', 'wc_point_of_sale'),
                    'id' => 'woocommerce_pos_second_column_layout',
                    'css' => '',
                    'std' => '',
                    'type' => 'radio',
                    'desc' => __('Select the layout for the second column.', 'wc_point_of_sale'),
                    'desc_tip' => true,
                    'options' => array(
                        'product_grids' => __('Product Grids', 'wc_point_of_sale'),
                        'company_image' => __('Company Image', 'wc_point_of_sale'),
                        'text' => __('Text', 'wc_point_of_sale'),
                        'company_image_text' => __('Company Image + Text', 'wc_point_of_sale'),
                    ),
                    'default' => 'product_grids',
                    'class' => 'pos_register_layout_opt'
                ),
                array('type' => 'company_logo'),
                array(
                    'name' => __('Text', 'wc_point_of_sale'),
                    'id' => 'woocommerce_pos_register_layout_text',
                    'css' => 'width: 100%; height: 150px;',
                    'std' => '',
                    'type' => 'textarea',
                ),
                array(
                    'name' => __('WordPress Admin Bar', 'wc_point_of_sale'),
                    'id' => 'woocommerce_pos_register_layout_admin_bar',
                    'css' => 'width: 100%; height: 150px;',
                    'std' => '',
                    'type' => 'checkbox',
                    'desc' => __('Hide', 'wc_point_of_sale'),
                    'desc_tip' => __('Choose whether to show or hide the WordPress admin bar when the Registers are open.', 'wc_point_of_sale'),
                    'checkboxgroup' => 'start',
                    'default' => 'yes',
                    'autoload' => false
                ),

                array(
                    'title' => __('Lock Screen', 'wc_point_of_sale'),
                    'desc' => __('Enable lock screen', 'wc_point_of_sale'),
                    'desc_tip' => __('Allow cashiers to lock the register with a password set below.', 'wc_point_of_sale'),
                    'id' => 'wc_pos_lock_screen',
                    'default' => 'no',
                    'type' => 'checkbox',
                    'checkboxgroup' => 'start'
                ),
                array(
                    'title' => __('Password', 'wc_point_of_sale'),
                    'id' => 'wc_pos_unlock_pass',
                    'type' => 'password',
                    'desc_tip' => __('Enter the password to be used to unlock the register when it is locked..', 'wc_point_of_sale'),
                ),
                array('type' => 'sectionend', 'id' => 'tax_pos_options'),

            )); // End general settings

        }

        /**
         * Save settings
         */
        public function save()
        {
            $settings = $this->get_settings();
            $woocommerce_pos_company_logo = (isset($_POST['woocommerce_pos_company_logo'])) ? $_POST['woocommerce_pos_company_logo'] : '';
            update_option('woocommerce_pos_company_logo', $woocommerce_pos_company_logo);
            WC_POS_Admin_Settings::save_fields($settings);
        }

    }

endif;

return new WC_POS_Admin_Settings_Layout();