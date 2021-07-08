<?php

require  plugin_dir_path( __FILE__ ).'functions.php';

// Remove admin toolbar for non-admin users
add_action('after_setup_theme', 'jmts_remove_admin_bar');

function jmts_remove_admin_bar() {
    if (!current_user_can('administrator')) {
        show_admin_bar(false);
    }
}

function jmts_save_user_meta_data() {
    $jmts_user = wp_get_current_user();

    $jmts_user_is_importer = isset($_POST['jmts_user_is_importer']) ?
            sanitize_text_field($_POST['jmts_user_is_importer']) : '';
    $jmts_user_is_manufacturer = isset($_POST['jmts_user_is_manufacturer']) ?
            sanitize_text_field($_POST['jmts_user_is_manufacturer']) : '';
    $jmts_user_is_first_time = isset($_POST['jmts_user_is_first_time']) ?
            sanitize_text_field($_POST['jmts_user_is_first_time']) : '';
    $jmts_user_trn = isset($_POST['jmts_user_trn']) ?
            sanitize_text_field($_POST['jmts_user_trn']) : '';
    $jmts_user_is_tcc_valid = isset($_POST['jmts_user_is_tcc_valid']) ?
            sanitize_text_field($_POST['jmts_user_is_tcc_valid']) : '';
    $jmts_user_tcc_expiration_date = isset($_POST['jmts_user_tcc_expiration_date']) ?
            sanitize_text_field($_POST['jmts_user_tcc_expiration_date']) : '';
    // Applicants
    $jmts_user_applicant_firstname1 = isset($_POST['jmts_user_applicant_firstname1']) ?
            sanitize_text_field($_POST['jmts_user_applicant_firstname1']) : '';
    $jmts_user_applicant_lastname1 = isset($_POST['jmts_user_applicant_lastname1']) ?
            sanitize_text_field($_POST['jmts_user_applicant_lastname1']) : '';
    $jmts_user_applicant_firstname2 = isset($_POST['jmts_user_applicant_firstname2']) ?
            sanitize_text_field($_POST['jmts_user_applicant_firstname2']) : '';
    $jmts_user_applicant_lastname2 = isset($_POST['jmts_user_applicant_lastname2']) ?
            sanitize_text_field($_POST['jmts_user_applicant_lastname2']) : '';
    $jmts_user_applicant_firstname3 = isset($_POST['jmts_user_applicant_firstname3']) ?
            sanitize_text_field($_POST['jmts_user_applicant_firstname3']) : '';
    $jmts_user_applicant_lastname3 = isset($_POST['jmts_user_applicant_lastname3']) ?
            sanitize_text_field($_POST['jmts_user_applicant_lastname3']) : '';
    // Business name
    $jmts_user_applicant_business_name = isset($_POST['jmts_user_applicant_business_name']) ?
            sanitize_text_field($_POST['jmts_user_applicant_business_name']) : '';
    // Partners
    $jmts_user_partner_firstname1 = isset($_POST['jmts_user_partner_firstname1']) ?
            sanitize_text_field($_POST['jmts_user_partner_firstname1']) : '';
    $jmts_user_partner_lastname1 = isset($_POST['jmts_user_partner_lastname1']) ?
            sanitize_text_field($_POST['jmts_user_partner_lastname1']) : '';
    $jmts_user_partner_firstname2 = isset($_POST['jmts_user_partner_firstname2']) ?
            sanitize_text_field($_POST['jmts_user_partner_firstname2']) : '';
    $jmts_user_partner_lastname2 = isset($_POST['jmts_user_partner_lastname2']) ?
            sanitize_text_field($_POST['jmts_user_partner_lastname2']) : '';
    $jmts_user_partner_firstname3 = isset($_POST['jmts_user_partner_firstname3']) ?
            sanitize_text_field($_POST['jmts_user_partner_firstname3']) : '';
    $jmts_user_partner_lastname3 = isset($_POST['jmts_user_partner_lastname3']) ?
            sanitize_text_field($_POST['jmts_user_partner_lastname3']) : '';
    // Trading Name (s)
    $jmts_user_trading_name = isset($_POST['jmts_user_trading_name']) ?
            sanitize_text_field($_POST['jmts_user_trading_name']) : '';
    // Business Type
    $jmts_user_business_type = isset($_POST['jmts_user_business_type']) ?
            sanitize_text_field($_POST['jmts_user_business_type']) : '';
    // Principal Details
    $jmts_user_principal_address_line1 = isset($_POST['jmts_user_principal_address_line1']) ?
            sanitize_text_field($_POST['jmts_user_principal_address_line1']) : '';
    $jmts_user_principal_address_line2 = isset($_POST['jmts_user_principal_address_line2']) ?
            sanitize_text_field($_POST['jmts_user_principal_address_line2']) : '';
    $jmts_user_principal_postal_address = isset($_POST['jmts_user_principal_postal_address']) ?
            sanitize_text_field($_POST['jmts_user_principal_postal_address']) : '';
    // Principal Contact
    $jmts_user_principal_firstname1 = isset($_POST['jmts_user_principal_firstname1']) ?
            sanitize_text_field($_POST['jmts_user_principal_firstname1']) : '';
    $jmts_user_principal_lastname1 = isset($_POST['jmts_user_principal_lastname1']) ?
            sanitize_text_field($_POST['jmts_user_principal_lastname1']) : '';
    $jmts_user_principal_position = isset($_POST['jmts_user_principal_position']) ?
            sanitize_text_field($_POST['jmts_user_principal_position']) : '';
    $jmts_user_principal_phone = isset($_POST['jmts_user_principal_phone']) ?
            sanitize_text_field($_POST['jmts_user_principal_phone']) : '';
    $jmts_user_principal_mobile = isset($_POST['jmts_user_principal_mobile']) ?
            sanitize_text_field($_POST['jmts_user_principal_mobile']) : '';
    $jmts_user_principal_fax = isset($_POST['jmts_user_principal_fax']) ?
            sanitize_text_field($_POST['jmts_user_principal_fax']) : '';
    $jmts_user_principal_email = isset($_POST['jmts_user_principal_email']) ?
            sanitize_text_field($_POST['jmts_user_principal_email']) : '';
    // Receival Location 1
    $jmts_user_receival1_address_line1 = isset($_POST['jmts_user_receival1_address_line1']) ?
            sanitize_text_field($_POST['jmts_user_receival1_address_line1']) : '';
    $jmts_user_receival1_address_line2 = isset($_POST['jmts_user_receival1_address_line2']) ?
            sanitize_text_field($_POST['jmts_user_receival1_address_line2']) : '';
    // Receival Location 1 Contact
    $jmts_user_receival1_firstname1 = isset($_POST['jmts_user_receival1_firstname1']) ?
            sanitize_text_field($_POST['jmts_user_receival1_firstname1']) : '';
    $jmts_user_receival1_lastname1 = isset($_POST['jmts_user_receival1_lastname1']) ?
            sanitize_text_field($_POST['jmts_user_receival1_lastname1']) : '';
    $jmts_user_receival1_phone = isset($_POST['jmts_user_receival1_phone']) ?
            sanitize_text_field($_POST['jmts_user_receival1_phone']) : '';
    $jmts_user_receival1_mobile = isset($_POST['jmts_user_receival1_mobile']) ?
            sanitize_text_field($_POST['jmts_user_receival1_mobile']) : '';
    $jmts_user_receival1_fax = isset($_POST['jmts_user_receival1_fax']) ?
            sanitize_text_field($_POST['jmts_user_receival1_fax']) : '';
    $jmts_user_receival1_email = isset($_POST['jmts_user_receival1_email']) ?
            sanitize_text_field($_POST['jmts_user_receival1_email']) : '';
    // Receival Location 1 Clearance Methods
    $jmts_user_receival1_aeo = isset($_POST['jmts_user_receival1_aeo']) ?
            sanitize_text_field($_POST['jmts_user_receival1_aeo']) : '';
    $jmts_user_receival1_port_clearance = isset($_POST['jmts_user_receival1_port_clearance']) ?
            sanitize_text_field($_POST['jmts_user_receival1_port_clearance']) : '';
    $jmts_user_receival1_site = isset($_POST['jmts_user_receival1_site']) ?
            sanitize_text_field($_POST['jmts_user_receival1_site']) : '';
    // Receival Location 2
    $jmts_user_receival2_address_line1 = isset($_POST['jmts_user_receival2_address_line1']) ?
            sanitize_text_field($_POST['jmts_user_receival2_address_line1']) : '';
    $jmts_user_receival2_address_line2 = isset($_POST['jmts_user_receival2_address_line2']) ?
            sanitize_text_field($_POST['jmts_user_receival2_address_line2']) : '';
    // Receival Location 2 Contact
    $jmts_user_receival2_firstname1 = isset($_POST['jmts_user_receival2_firstname1']) ?
            sanitize_text_field($_POST['jmts_user_receival2_firstname1']) : '';
    $jmts_user_receival2_lastname1 = isset($_POST['jmts_user_receival2_lastname1']) ?
            sanitize_text_field($_POST['jmts_user_receival2_lastname1']) : '';
    $jmts_user_receival2_phone = isset($_POST['jmts_user_receival2_phone']) ?
            sanitize_text_field($_POST['jmts_user_receival2_phone']) : '';
    $jmts_user_receival2_mobile = isset($_POST['jmts_user_receival2_mobile']) ?
            sanitize_text_field($_POST['jmts_user_receival2_mobile']) : '';
    $jmts_user_receival2_fax = isset($_POST['jmts_user_receival2_fax']) ?
            sanitize_text_field($_POST['jmts_user_receival2_fax']) : '';
    $jmts_user_receival2_email = isset($_POST['jmts_user_receival2_email']) ?
            sanitize_text_field($_POST['jmts_user_receival2_email']) : '';
    // Types of Import
    $jmts_user_import_type_appliance = isset($_POST['jmts_user_import_type_appliance']) ?
            sanitize_text_field($_POST['jmts_user_import_type_appliance']) : '';
    $jmts_user_import_type_construct_mat = isset($_POST['jmts_user_import_type_construct_mat']) ?
            sanitize_text_field($_POST['jmts_user_import_type_construct_mat']) : '';
    $jmts_user_import_type_pre_pack_goods = isset($_POST['jmts_user_import_type_pre_pack_goods']) ?
            sanitize_text_field($_POST['jmts_user_import_type_pre_pack_goods']) : '';
    $jmts_user_import_type_non_met_mat = isset($_POST['jmts_user_import_type_non_met_mat']) ?
            sanitize_text_field($_POST['jmts_user_import_type_non_met_mat']) : '';
    $jmts_user_import_type_gen_merchandise = isset($_POST['jmts_user_import_type_gen_merchandise']) ?
            sanitize_text_field($_POST['jmts_user_import_type_gen_merchandise']) : '';
    // Types of Manufacture
    $jmts_user_manufacture_type_appliance = isset($_POST['jmts_user_manufacture_type_appliance']) ?
            sanitize_text_field($_POST['jmts_user_manufacture_type_appliance']) : '';
    $jmts_user_manufacture_type_construct_mat = isset($_POST['jmts_user_manufacture_type_construct_mat']) ?
            sanitize_text_field($_POST['jmts_user_manufacture_type_construct_mat']) : '';
    $jmts_user_manufacture_type_pre_pack_goods = isset($_POST['jmts_user_manufacture_type_pre_pack_goods']) ?
            sanitize_text_field($_POST['jmts_user_manufacture_type_pre_pack_goods']) : '';
    $jmts_user_manufacture_type_non_met_mat = isset($_POST['jmts_user_manufacture_type_non_met_mat']) ?
            sanitize_text_field($_POST['jmts_user_manufacture_type_non_met_mat']) : '';
    //  Origin of Imports
    $jmts_user_imports_origin = isset($_POST['jmts_user_imports_origin']) ?
            sanitize_text_field($_POST['jmts_user_imports_origin']) : '';
    // Total Consignments or Production / Annum 
    $jmts_user_total_consignment_production = isset($_POST['jmts_user_total_consignment_production']) ?
            sanitize_text_field($_POST['jmts_user_total_consignment_production']) : '';
    // Seasonal Importer /Manufacturer
    $jmts_user_seasonal_importer_manufacturer = isset($_POST['jmts_user_seasonal_importer_manufacturer']) ?
            sanitize_text_field($_POST['jmts_user_seasonal_importer_manufacturer']) : '';
    // Product Details
    $jmts_user_product_id = isset($_POST['jmts_user_product_id']) ?
            wp_kses_post($_POST['jmts_user_product_id']) : '';
    $jmts_user_product_name = isset($_POST['jmts_user_product_name']) ?
            wp_kses_post($_POST['jmts_user_product_name']) : '';
    $jmts_user_product_supplier = isset($_POST['jmts_user_product_supplier']) ?
            wp_kses_post($_POST['jmts_user_product_supplier']) : '';
    $jmts_user_product_distributor = isset($_POST['jmts_user_product_distributor']) ?
            wp_kses_post($_POST['jmts_user_product_distributor']) : '';
    $jmts_user_product_brand = isset($_POST['jmts_user_product_brand']) ?
            wp_kses_post($_POST['jmts_user_product_brand']) : '';
    $jmts_user_product_model = isset($_POST['jmts_user_product_model']) ?
            wp_kses_post($_POST['jmts_user_product_model']) : '';
    $jmts_user_product_serial = isset($_POST['jmts_user_product_serial']) ?
            wp_kses_post($_POST['jmts_user_product_serial']) : '';
    $jmts_user_product_country = isset($_POST['jmts_user_product_country']) ?
            wp_kses_post($_POST['jmts_user_product_country']) : '';
    // Type of Label
    $jmts_user_label_type_neck = isset($_POST['jmts_user_label_type_neck']) ?
            sanitize_text_field($_POST['jmts_user_label_type_neck']) : '';
    $jmts_user_label_type_front = isset($_POST['jmts_user_label_type_front']) ?
            sanitize_text_field($_POST['jmts_user_label_type_front']) : '';
    $jmts_user_label_type_back = isset($_POST['jmts_user_label_type_back']) ?
            sanitize_text_field($_POST['jmts_user_label_type_back']) : '';
    $jmts_user_label_type_resubmission = isset($_POST['jmts_user_label_type_resubmission']) ?
            sanitize_text_field($_POST['jmts_user_label_type_resubmission']) : '';
    // Label Images    
    // Neck
    $jmts_user_label_image_neck = '';
    if (isset($_FILES['jmts_user_label_image_file_neck']) &&
            $_FILES['jmts_user_label_image_file_neck']['tmp_name'] !== '') {
        $file = wp_upload_bits($_FILES['jmts_user_label_image_file_neck']['name'],
                null,
                file_get_contents($_FILES['jmts_user_label_image_file_neck']['tmp_name']));

        if (FALSE === $file['error']) {
            $jmts_user_label_image_neck = $file['url'];
        } else {
            $jmts_user_label_image_neck = 'Error uploading file!';
        }
    }
    // Front
    $jmts_user_label_image_front = '';
    if (isset($_FILES['jmts_user_label_image_file_front']) &&
            $_FILES['jmts_user_label_image_file_front']['tmp_name'] !== '') {
        $file = wp_upload_bits($_FILES['jmts_user_label_image_file_front']['name'],
                null,
                file_get_contents($_FILES['jmts_user_label_image_file_front']['tmp_name']));

        if (FALSE === $file['error']) {
            $jmts_user_label_image_front = $file['url'];
        } else {
            $jmts_user_label_image_front = 'Error uploading file!';
        }
    }
    // Back
    $jmts_user_label_image_back = '';
    if (isset($_FILES['jmts_user_label_image_file_back']) &&
            $_FILES['jmts_user_label_image_file_back']['tmp_name'] !== '') {
        $file = wp_upload_bits($_FILES['jmts_user_label_image_file_back']['name'],
                null,
                file_get_contents($_FILES['jmts_user_label_image_file_back']['tmp_name']));

        if (FALSE === $file['error']) {
            $jmts_user_label_image_back = $file['url'];
        } else {
            $jmts_user_label_image_back = 'Error uploading file!';
        }
    }
    // Resubmission
    $jmts_user_label_image_resubmission = '';
    if (isset($_FILES['jmts_user_label_image_file_resubmission']) &&
            $_FILES['jmts_user_label_image_file_resubmission']['tmp_name'] !== '') {
        $file = wp_upload_bits($_FILES['jmts_user_label_image_file_resubmission']['name'],
                null,
                file_get_contents($_FILES['jmts_user_label_image_file_resubmission']['tmp_name']));

        if (FALSE === $file['error']) {
            $jmts_user_label_image_resubmission = $file['url'];
        } else {
            $jmts_user_label_image_resubmission = 'Error uploading file!';
        }
    }

    // SAVE USER META DATA
    update_user_meta($jmts_user->ID, 'jmts_user_is_importer', $jmts_user_is_importer);
    update_user_meta($jmts_user->ID, 'jmts_user_is_manufacturer', $jmts_user_is_manufacturer);
    update_user_meta($jmts_user->ID, 'jmts_user_is_first_time', $jmts_user_is_first_time);
    update_user_meta($jmts_user->ID, 'jmts_user_trn', $jmts_user_trn);
    update_user_meta($jmts_user->ID, 'jmts_user_is_tcc_valid', $jmts_user_is_tcc_valid);
    update_user_meta($jmts_user->ID, 'jmts_user_tcc_expiration_date', $jmts_user_tcc_expiration_date);
    // Applicants
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname1', $jmts_user_applicant_firstname1);
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname1', $jmts_user_applicant_lastname1);
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname2', $jmts_user_applicant_firstname2);
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname2', $jmts_user_applicant_lastname2);
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname3', $jmts_user_applicant_firstname3);
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname3', $jmts_user_applicant_lastname3);
    // Business name
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_business_name', $jmts_user_applicant_business_name);
    // Partners
    update_user_meta($jmts_user->ID, 'jmts_user_partner_firstname1', $jmts_user_partner_firstname1);
    update_user_meta($jmts_user->ID, 'jmts_user_partner_lastname1', $jmts_user_partner_lastname1);
    update_user_meta($jmts_user->ID, 'jmts_user_partner_firstname2', $jmts_user_partner_firstname2);
    update_user_meta($jmts_user->ID, 'jmts_user_partner_lastname2', $jmts_user_partner_lastname2);
    update_user_meta($jmts_user->ID, 'jmts_user_partner_firstname3', $jmts_user_partner_firstname3);
    update_user_meta($jmts_user->ID, 'jmts_user_partner_lastname3', $jmts_user_partner_lastname3);
    // Trading Name (s)
    update_user_meta($jmts_user->ID, 'jmts_user_trading_name', $jmts_user_trading_name);
    // Business Type
    update_user_meta($jmts_user->ID, 'jmts_user_business_type', $jmts_user_business_type);
    // Principal Details
    update_user_meta($jmts_user->ID, 'jmts_user_principal_address_line1', $jmts_user_principal_address_line1);
    update_user_meta($jmts_user->ID, 'jmts_user_principal_address_line2', $jmts_user_principal_address_line2);
    update_user_meta($jmts_user->ID, 'jmts_user_principal_postal_address', $jmts_user_principal_postal_address);
    // Principal Contact
    update_user_meta($jmts_user->ID, 'jmts_user_principal_firstname1', $jmts_user_principal_firstname1);
    update_user_meta($jmts_user->ID, 'jmts_user_principal_lastname1', $jmts_user_principal_lastname1);
    update_user_meta($jmts_user->ID, 'jmts_user_principal_position', $jmts_user_principal_position);
    update_user_meta($jmts_user->ID, 'jmts_user_principal_phone', $jmts_user_principal_phone);
    update_user_meta($jmts_user->ID, 'jmts_user_principal_mobile', $jmts_user_principal_mobile);
    update_user_meta($jmts_user->ID, 'jmts_user_principal_fax', $jmts_user_principal_fax);
    update_user_meta($jmts_user->ID, 'jmts_user_principal_email', $jmts_user_principal_email);
    // Receival Location 1
    update_user_meta($jmts_user->ID, 'jmts_user_receival1_address_line1', $jmts_user_receival1_address_line1);
    update_user_meta($jmts_user->ID, 'jmts_user_receival1_address_line2', $jmts_user_receival1_address_line2);
    // Receival Location 1 Contact
    update_user_meta($jmts_user->ID, 'jmts_user_receival1_firstname1', $jmts_user_receival1_firstname1);
    update_user_meta($jmts_user->ID, 'jmts_user_receival1_lastname1', $jmts_user_receival1_lastname1);
    update_user_meta($jmts_user->ID, 'jmts_user_receival1_phone', $jmts_user_receival1_phone);
    update_user_meta($jmts_user->ID, 'jmts_user_receival1_mobile', $jmts_user_receival1_mobile);
    update_user_meta($jmts_user->ID, 'jmts_user_receival1_fax', $jmts_user_receival1_fax);
    update_user_meta($jmts_user->ID, 'jmts_user_receival1_email', $jmts_user_receival1_email);
    // Receival Location 1 Clearance Methods
    update_user_meta($jmts_user->ID, 'jmts_user_receival1_aeo', $jmts_user_receival1_aeo);
    update_user_meta($jmts_user->ID, 'jmts_user_receival1_port_clearance', $jmts_user_receival1_port_clearance);
    update_user_meta($jmts_user->ID, 'jmts_user_receival1_site', $jmts_user_receival1_site);
    // Receival Location 2
    update_user_meta($jmts_user->ID, 'jmts_user_receival2_address_line1', $jmts_user_receival2_address_line1);
    update_user_meta($jmts_user->ID, 'jmts_user_receival2_address_line2', $jmts_user_receival2_address_line2);
    // Receival Location 2 Contact
    update_user_meta($jmts_user->ID, 'jmts_user_receival2_firstname1', $jmts_user_receival2_firstname1);
    update_user_meta($jmts_user->ID, 'jmts_user_receival2_lastname1', $jmts_user_receival2_lastname1);
    update_user_meta($jmts_user->ID, 'jmts_user_receival2_phone', $jmts_user_receival2_phone);
    update_user_meta($jmts_user->ID, 'jmts_user_receival2_mobile', $jmts_user_receival2_mobile);
    update_user_meta($jmts_user->ID, 'jmts_user_receival2_fax', $jmts_user_receival2_fax);
    update_user_meta($jmts_user->ID, 'jmts_user_receival2_email', $jmts_user_receival2_email);
    // Types of Import
    update_user_meta($jmts_user->ID, 'jmts_user_import_type_appliance', $jmts_user_import_type_appliance);
    update_user_meta($jmts_user->ID, 'jmts_user_import_type_construct_mat', $jmts_user_import_type_construct_mat);
    update_user_meta($jmts_user->ID, 'jmts_user_import_type_pre_pack_goods', $jmts_user_import_type_pre_pack_goods);
    update_user_meta($jmts_user->ID, 'jmts_user_import_type_non_met_mat', $jmts_user_import_type_non_met_mat);
    update_user_meta($jmts_user->ID, 'jmts_user_import_type_gen_merchandise', $jmts_user_import_type_gen_merchandise);
    // Types of Manufacture
    update_user_meta($jmts_user->ID, 'jmts_user_manufacture_type_appliance', $jmts_user_manufacture_type_appliance);
    update_user_meta($jmts_user->ID, 'jmts_user_manufacture_type_construct_mat', $jmts_user_manufacture_type_construct_mat);
    update_user_meta($jmts_user->ID, 'jmts_user_manufacture_type_pre_pack_goods', $jmts_user_manufacture_type_pre_pack_goods);
    update_user_meta($jmts_user->ID, 'jmts_user_manufacture_type_non_met_mat', $jmts_user_manufacture_type_non_met_mat);
    // Origin of Imports
    update_user_meta($jmts_user->ID, 'jmts_user_imports_origin', $jmts_user_imports_origin);
    // Total Consignments or Production / Annum
    update_user_meta($jmts_user->ID, 'jmts_user_total_consignment_production', $jmts_user_total_consignment_production);
    // Seasonal Importer /Manufacturer
    update_user_meta($jmts_user->ID, 'jmts_user_seasonal_importer_manufacturer', $jmts_user_seasonal_importer_manufacturer);
    // Product Details
    update_user_meta($jmts_user->ID, 'jmts_user_product_id', $jmts_user_product_id);
    update_user_meta($jmts_user->ID, 'jmts_user_product_name', $jmts_user_product_name);
    update_user_meta($jmts_user->ID, 'jmts_user_product_supplier', $jmts_user_product_supplier);
    update_user_meta($jmts_user->ID, 'jmts_user_product_distributor', $jmts_user_product_distributor);
    update_user_meta($jmts_user->ID, 'jmts_user_product_brand', $jmts_user_product_brand);
    update_user_meta($jmts_user->ID, 'jmts_user_product_model', $jmts_user_product_model);
    update_user_meta($jmts_user->ID, 'jmts_user_product_serial', $jmts_user_product_serial);
    update_user_meta($jmts_user->ID, 'jmts_user_product_country', $jmts_user_product_country);
    // Type of Label
    update_user_meta($jmts_user->ID, 'jmts_user_label_type_neck', $jmts_user_label_type_neck);
    update_user_meta($jmts_user->ID, 'jmts_user_label_type_front', $jmts_user_label_type_front);
    update_user_meta($jmts_user->ID, 'jmts_user_label_type_back', $jmts_user_label_type_back);
    update_user_meta($jmts_user->ID, 'jmts_user_label_type_resubmission', $jmts_user_label_type_resubmission);
    // Label Images
    if ($jmts_user_label_image_neck !== '') {
        update_user_meta($jmts_user->ID, 'jmts_user_label_image_neck', $jmts_user_label_image_neck);
    }
    if ($jmts_user_label_image_front !== '') {
        update_user_meta($jmts_user->ID, 'jmts_user_label_image_front', $jmts_user_label_image_front);
    }
    if ($jmts_user_label_image_back !== '') {
        update_user_meta($jmts_user->ID, 'jmts_user_label_image_back', $jmts_user_label_image_back);
    }
    if ($jmts_user_label_image_resubmission !== '') {
        update_user_meta($jmts_user->ID, 'jmts_user_label_image_resubmission', $jmts_user_label_image_resubmission);
    }
}

// A short code to display a user's data for editing and viewing
add_shortcode('jmts_user', 'jmts_user_meta_data_form');

function jmts_user_meta_data_form() {
    
    if (is_user_logged_in()) {
        $jmts_user = wp_get_current_user();
    } else {
        ?>
        <h5 style="text-align:center;color: darkblue;">
            PLEASE LOG IN OR REGISTER TO SUBMIT OR UPDATE THE IMPORTER REGISTRATION FORM:
        </h5>     
        <div style="text-align:center;">            
            <a href="<?= site_url() ?>/wp-login.php"><input type="button" value="Log In" ></a>
            <a href="<?= site_url() ?>/wp-login.php?action=register"><input type="button" value="Register" ></a>         
        </div>
        <?php
        exit();
    }

    if (!empty($_POST['form_submitted'])) {

        jmts_save_user_meta_data();
        ?>
        <h6 style="text-align:center;color: darkblue;">
            YOUR FORM WAS SUCCESSFULLY UPDATED
        </h6>
        <div style="text-align:center;">
            <form>
                <input type="submit" value="View Form" >
            </form>
        </div>
        <?php
        exit();
    }
   
    require  plugin_dir_path( __FILE__ ).'importer_manufacturer_form.php';
}
