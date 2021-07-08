<?php

function jmts_remove_admin_bar() {
    if (!current_user_can('administrator')) {
        show_admin_bar(false);
    }
}

function jmts_user_get_meta_data ($jmts_user) {
    $jmts_user_is_importer = get_user_meta($jmts_user->ID, 'jmts_user_is_importer', true);
}

function jmts_user_get_importer_manufacturer_form_table($jmts_user) {
    ?>
    <table class="form-table" style="border: 0;">    
        <tr>
            <td style="border: 0;">
                <label for="jmts_user_is_importer">
                    <strong>Are you an importer?</strong>
                </label>
            </td>
            <td style="border: 0;">
                <select id="jmts_user_is_importer" name="jmts_user_is_importer">
                    <option 
                            <?= selected('no', get_user_meta($jmts_user->ID, 'jmts_user_is_importer', true), true) ?> value="no"> 
    <?= __('No', 'jmts') ?>
                    </option>
                    <option <?= selected('yes', get_user_meta($jmts_user->ID, 'jmts_user_is_importer', true), true) ?> value="yes">
    <?= __('Yes', 'jmts') ?>
                    </option>                        
                </select>
            </td>            
        </tr>
        <tr>
            <td style="border: 0;">
                <label for="jmts_user_is_manufacturer">
                    <strong>Are you a manufacturer?</strong>
                </label>
            </td>
            <td style="border: 0;">
                <select id="jmts_user_is_manufacturer" name="jmts_user_is_manufacturer">
                    <option <?= selected('no', get_user_meta($jmts_user->ID, 'jmts_user_is_manufacturer', true), true) ?> value="no"> 
    <?= __('No', 'jmts') ?>
                    </option>
                    <option <?= selected('yes', get_user_meta($jmts_user->ID, 'jmts_user_is_manufacturer', true), true) ?> value="yes">
    <?= __('Yes', 'jmts') ?>
                    </option>                        
                </select>
            </td>            
        </tr>
        <tr>
            <td style="border: 0;">
                <label for="jmts_user_is_first_time">
                    <strong>Are you registering for first time?</strong>
                </label>
            </td>
            <td style="border: 0;">
                <select id="jmts_user_is_first_time" name="jmts_user_is_first_time">
                    <option <?= selected('no', get_user_meta($jmts_user->ID, 'jmts_user_is_first_time', true), true) ?> value="no"> 
    <?= __('No', 'jmts') ?>
                    </option>
                    <option <?= selected('yes', get_user_meta($jmts_user->ID, 'jmts_user_is_first_time', true), true) ?> value="yes">
    <?= __('Yes', 'jmts') ?>
                    </option>                        
                </select>
            </td>            
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_trn">
                    <strong>Tax Registration Number (TRN)</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_trn"
                       name="jmts_user_trn"
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_trn', true) ?>" >
            </td>
        </tr>
        <tr>
            <td style="border: 0;">
                <label for="jmts_user_is_tcc_valid">
                    <strong>Tax Compliance Certificate (TCC) valid?</strong>
                </label>
            </td>
            <td style="border: 0;">
                <select id="jmts_user_is_tcc_valid" name="jmts_user_is_tcc_valid">
                    <option <?= selected('no', get_user_meta($jmts_user->ID, 'jmts_user_is_tcc_valid', true), true) ?> value="no"> 
    <?= __('No', 'jmts') ?>
                    </option>
                    <option <?= selected('yes', get_user_meta($jmts_user->ID, 'jmts_user_is_tcc_valid', true), true) ?> value="yes">
    <?= __('Yes', 'jmts') ?>
                    </option>                        
                </select>
            </td>            
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_tcc_expiration_date">
                    <strong>If yes please state date of expiration</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="date"
                       id="jmts_user_tcc_expiration_date"
                       name="jmts_user_tcc_expiration_date"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_tcc_expiration_date', true) ?>" >

            </td>
        </tr>
        <tr>
            <th style="border: 0;" colspan="2">
                <strong>Applicant details:</strong>
            </th>            
        </tr>
        <tr>
            <td style="border: 0;text-align: center;" colspan="2">
                <span style="color: red;">
                    (Either Individual or Incorporated Business / Partnership/ Associated or Trust)
                </span>
            </td>            
        </tr>
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Applicant(s) Name(s):</strong>
            </th>            
        </tr>
        <tr>   
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_applicant_lastname1"
                       name="jmts_user_applicant_lastname1"
                       placeholder="Last Name (required)" 
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname1', true) ?>" >
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_applicant_firstname1"
                       name="jmts_user_applicant_firstname1"
                       placeholder="First Name (required)" 
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname1', true) ?>" >
            </td>                
        </tr>
        <tr>   
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_applicant_lastname2"
                       name="jmts_user_applicant_lastname2"
                       placeholder="Last Name (optional)" 
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname2', true) ?>" >
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_applicant_firstname2"
                       name="jmts_user_applicant_firstname2"
                       placeholder="First Name (optional)"                            
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname2', true) ?>" >
            </td>                
        </tr>
        <tr>   
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_applicant_lastname3"
                       name="jmts_user_applicant_lastname3"
                       placeholder="Last Name (optional)" 
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname3', true) ?>" >
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_applicant_firstname3"
                       name="jmts_user_applicant_firstname3"
                       placeholder="First Name (optional)"                            
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname3', true) ?>" >
            </td>                
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_applicant_business_name">
                    <strong>Business Name</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       placeholder="Business Name (optional)"
                       id="jmts_user_applicant_business_name"
                       name="jmts_user_applicant_business_name"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_business_name', true) ?>" >
            </td>
        </tr>
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Partner(s) Name(s):</strong>
            </th>            
        </tr>
        <tr>   
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_partner_lastname1"
                       name="jmts_user_partner_lastname1"
                       placeholder="Last Name (optional)" 
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_partner_lastname1', true) ?>" >
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_partner_firstname1"
                       name="jmts_user_partner_firstname1"
                       placeholder="First Name (optional)" 
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_partner_firstname1', true) ?>" >
            </td>                
        </tr>
        <tr>   
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_partner_lastname2"
                       name="jmts_user_partner_lastname2"
                       placeholder="Last Name (optional)" 
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_partner_lastname2', true) ?>" >
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_partner_firstname2"
                       name="jmts_user_partner_firstname2"
                       placeholder="First Name (optional)" 
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_partner_firstname2', true) ?>" >
            </td>                
        </tr>
        <tr>   
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_partner_lastname3"
                       name="jmts_user_partner_lastname3"
                       placeholder="Last Name (optional)" 
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_partner_lastname3', true) ?>" >
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_partner_firstname3"
                       name="jmts_user_partner_firstname3"
                       placeholder="First Name (optional)" 
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_partner_firstname3', true) ?>" >
            </td>                
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_trading_name">
                    <strong>Trading Name(s)</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_trading_name"
                       name="jmts_user_trading_name"
                       placeholder="Trading Name(s) (optional)"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_trading_name', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_business_type">
                    <strong>Business Type</strong>
                </label>
            </td>
            <td style="border: 0;">
                <select id="jmts_user_business_type" name="jmts_user_business_type">
                    <option 
                    <?=
                    selected('Individual',
                            get_user_meta($jmts_user->ID, 'jmts_user_business_type', true), true)
                    ?> value="Individual"> 
    <?= __('Individual', 'jmts') ?>
                    </option>
                    <option <?=
                    selected('Partnership',
                            get_user_meta($jmts_user->ID, 'jmts_user_business_type', true), true)
                    ?> value="Partnership">
    <?= __('Partnership', 'jmts') ?>
                    </option>  
                    <option <?=
                    selected('Incorporated Company',
                            get_user_meta($jmts_user->ID, 'jmts_user_business_type', true), true)
                    ?> value="Incorporated Company">
    <?= __('Incorporated Company', 'jmts') ?>
                    </option>
                    <option <?=
                    selected('Trust',
                            get_user_meta($jmts_user->ID, 'jmts_user_business_type', true), true)
                    ?> value="Trust">
    <?= __('Trust', 'jmts') ?>
                    </option>
                    <option <?=
                    selected('Co-operative Association',
                            get_user_meta($jmts_user->ID, 'jmts_user_business_type', true), true)
                    ?> value="Co-operative Association">
    <?= __('Co-operative Association', 'jmts') ?>
                    </option>
                    <option <?=
                    selected('Other',
                            get_user_meta($jmts_user->ID, 'jmts_user_business_type', true), true)
                    ?> value="Other">
    <?= __('Other', 'jmts') ?>
                    </option>
                </select>
                <!--
                <input type="text"
                       id="jmts_user_business_type"
                       name="jmts_user_business_type"
                       placeholder="Business Type (required)"
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_business_type', true) ?>" >
                -->
            </td>
        </tr>
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Principal Address:</strong>
            </th>            
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_principal_address_line1">
                    <strong>Address Line 1</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_principal_address_line1"
                       name="jmts_user_principal_address_line1"
                       placeholder="Address Line 1 (required)"
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_principal_address_line1', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_principal_address_line2">
                    <strong>Address Line 2</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_principal_address_line2"
                       name="jmts_user_principal_address_line2"
                       placeholder="Address Line 2 (optional)"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_principal_address_line2', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_principal_postal_address">
                    <strong>Postal Address</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       placeholder="Postal Address (optional)"
                       id="jmts_user_principal_postal_address"
                       name="jmts_user_principal_postal_address"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_principal_postal_address', true) ?>" >
            </td>
        </tr>
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Principal Contact:</strong>
            </th>            
        </tr>
        <tr>   
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_principal_lastname1"
                       name="jmts_user_principal_lastname1"
                       placeholder="Last Name (required)" 
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_principal_lastname1', true) ?>" >
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_principal_firstname1"
                       name="jmts_user_principal_firstname1"
                       placeholder="First Name (required)" 
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_principal_firstname1', true) ?>" >
            </td>                
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_principal_position">
                    <strong>Position</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_principal_position"
                       placeholder="e.g. Managing Director (optional)"
                       name="jmts_user_principal_position"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_principal_position', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_principal_phone">
                    <strong>Phone</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="tel"
                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                       placeholder="e.g. 123-456-0789 (required)"
                       required
                       id="jmts_user_principal_phone"
                       name="jmts_user_principal_phone"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_principal_phone', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_principal_mobile">
                    <strong>Mobile</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="tel"
                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                       placeholder="e.g. 123-456-0789 (required)"
                       required
                       id="jmts_user_principal_mobile"
                       name="jmts_user_principal_mobile"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_principal_mobile', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_principal_fax">
                    <strong>Fax</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="tel"
                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                       placeholder="e.g. 123-456-0789 (optional)"
                       id="jmts_user_principal_fax"
                       name="jmts_user_principal_fax"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_principal_fax', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_principal_email">
                    <strong>Email</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="email"
                       placeholder="e.g. email@example.com (required)"
                       required
                       id="jmts_user_principal_email"
                       name="jmts_user_principal_email"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_principal_email', true) ?>" >
            </td>
        </tr>
        <tr> 
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Receival Location 1:</strong>
            </th>            
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival1_address_line1">
                    <strong>Address Line 1</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_receival1_address_line1"
                       name="jmts_user_receival1_address_line1"
                       placeholder="Address Line 1 (required)"
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival1_address_line1', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival1_address_line2">
                    <strong>Address Line 2</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_receival1_address_line2"
                       name="jmts_user_receival1_address_line2"
                       placeholder="Address Line 2 (required)"
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival1_address_line2', true) ?>" >
            </td>
        </tr>
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Receival Location 1 Contact:</strong>
            </th>            
        </tr>
        <tr>   
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_receival1_lastname1"
                       name="jmts_user_receival1_lastname1"
                       placeholder="Last Name (required)"
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival1_lastname1', true) ?>" >
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_receival1_firstname1"
                       name="jmts_user_receival1_firstname1"
                       placeholder="First Name (required)"
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival1_firstname1', true) ?>" >
            </td>                
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival1_phone">
                    <strong>Phone</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="tel"
                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                       placeholder="e.g. 123-456-0789 (required)"
                       required
                       id="jmts_user_receival1_phone"
                       name="jmts_user_receival1_phone"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival1_phone', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival1_mobile">
                    <strong>Mobile</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="tel"
                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                       placeholder="e.g. 123-456-0789 (required)"
                       required
                       id="jmts_user_receival1_mobile"
                       name="jmts_user_receival1_mobile"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival1_mobile', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival1_fax">
                    <strong>Fax</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="tel"
                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                       placeholder="e.g. 123-456-0789 (optional)"
                       id="jmts_user_receival1_fax"
                       name="jmts_user_receival1_fax"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival1_fax', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival1_email">
                    <strong>Email</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="email"
                       placeholder="e.g. email@example.com (required)"
                       id="jmts_user_receival1_email"
                       name="jmts_user_receival1_email"
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival1_email', true) ?>" >
            </td>
        </tr>            
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Receival Location Clearance Method(s):</strong>
            </th>            
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival1_aeo">
                    <strong>AEO</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_receival1_aeo"
                       name="jmts_user_receival1_aeo"
                       <?=
                       checked('jmts_user_receival1_aeo',
                               get_user_meta($jmts_user->ID, 'jmts_user_receival1_aeo', true), true)
                       ?>
                       value="jmts_user_receival1_aeo" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival1_port_clearance">
                    <strong>Port Clearance</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_receival1_port_clearance"
                       name="jmts_user_receival1_port_clearance"
                       <?=
                       checked('jmts_user_receival1_port_clearance',
                               get_user_meta($jmts_user->ID, 'jmts_user_receival1_port_clearance', true), true)
                       ?>
                       value="jmts_user_receival1_port_clearance" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival1_site">
                    <strong>Site</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_receival1_site"
                       name="jmts_user_receival1_site"
                       <?=
                       checked('jmts_user_receival1_site',
                               get_user_meta($jmts_user->ID, 'jmts_user_receival1_site', true), true)
                       ?>
                       value="jmts_user_receival1_site" >
            </td>
        </tr>
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Receival Location 2:</strong>
            </th>            
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival2_address_line1">
                    <strong>Address Line 1</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_receival2_address_line1"
                       name="jmts_user_receival2_address_line1"
                       placeholder="Address Line 1 (optional)"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival2_address_line1', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival2_address_line2">
                    <strong>Address Line 2</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_receival2_address_line2"
                       name="jmts_user_receival2_address_line2"
                       placeholder="Address Line 2 (optional)"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival2_address_line2', true) ?>" >
            </td>
        </tr>
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Receival Location 2 Contact:</strong>
            </th>            
        </tr>
        <tr>   
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_receival2_lastname1"
                       name="jmts_user_receival2_lastname1"
                       placeholder="Last Name (optional)" 
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival2_lastname1', true) ?>" >
            </td>
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_receival2_firstname1"
                       name="jmts_user_receival2_firstname1"
                       placeholder="First Name (optional)" 
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival2_firstname1', true) ?>" >
            </td>                
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival2_phone">
                    <strong>Phone</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="tel"
                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                       placeholder="e.g. 123-456-0789 (optional)"
                       id="jmts_user_receival2_phone"
                       name="jmts_user_receival2_phone"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival2_phone', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival2_mobile">
                    <strong>Mobile</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="tel"
                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                       placeholder="e.g. 123-456-0789 (optional)"
                       id="jmts_user_receival2_mobile"
                       name="jmts_user_receival2_mobile"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival2_mobile', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival2_fax">
                    <strong>Fax</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="tel"
                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                       placeholder="e.g. 123-456-0789 (optional)"
                       id="jmts_user_receival2_fax"
                       name="jmts_user_receival2_fax"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival2_fax', true) ?>" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_receival2_email">
                    <strong>Email</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="email"
                       placeholder="e.g. email@example.com (optional)"
                       id="jmts_user_receival2_email"
                       name="jmts_user_receival2_email"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_receival2_email', true) ?>" >
            </td>
        </tr>  
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Import Details:</strong>
            </th>            
        </tr>
        <tr>
            <td style="border: 0;" colspan="2">
                <strong>Type of Import</strong>
            </td>            
        </tr>
        <tr>
            <td style="border: 0;text-align: center;" colspan="2">
                <span style="color: red;">
                    (tick each type that applies) 
                </span>
            </td>            
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_import_type_appliance">
                    <strong>Appliances</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_import_type_appliance"
                       name="jmts_user_import_type_appliance"
                       <?=
                       checked('jmts_user_import_type_appliance',
                               get_user_meta($jmts_user->ID, 'jmts_user_import_type_appliance', true), true)
                       ?>
                       value="jmts_user_import_type_appliance" >
            </td>
        </tr>            
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_import_type_construct_mat">
                    <strong>Construction Material</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_import_type_construct_mat"
                       name="jmts_user_import_type_construct_mat"
                       <?=
                       checked('jmts_user_import_type_construct_mat',
                               get_user_meta($jmts_user->ID, 'jmts_user_import_type_construct_mat', true), true)
                       ?>
                       value="jmts_user_import_type_construct_mat" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_import_type_pre_pack_goods">
                    <strong>Pre-packaged Goods</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_import_type_pre_pack_goods"
                       name="jmts_user_import_type_pre_pack_goods"
                       <?=
                       checked('jmts_user_import_type_pre_pack_goods',
                               get_user_meta($jmts_user->ID, 'jmts_user_import_type_pre_pack_goods', true), true)
                       ?>
                       value="jmts_user_import_type_pre_pack_goods" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_import_type_non_met_mat">
                    <strong>Non-metallic Material</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_import_type_non_met_mat"
                       name="jmts_user_import_type_non_met_mat"
                       <?=
                       checked('jmts_user_import_type_non_met_mat',
                               get_user_meta($jmts_user->ID, 'jmts_user_import_type_non_met_mat', true), true)
                       ?>
                       value="jmts_user_import_type_non_met_mat" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_import_type_gen_merchandise">
                    <strong>General Merchandise</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_import_type_gen_merchandise"
                       name="jmts_user_import_type_gen_merchandise"
                       <?=
                       checked('jmts_user_import_type_gen_merchandise',
                               get_user_meta($jmts_user->ID, 'jmts_user_import_type_gen_merchandise', true), true)
                       ?>
                       value="jmts_user_import_type_gen_merchandise" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_imports_origin">
                    <strong>Origin of Imports</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       placeholder="Separate countries with a comma"
                       id="jmts_user_imports_origin"
                       name="jmts_user_imports_origin"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_imports_origin', true) ?>" >
            </td>
        </tr> 
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Manufacturer Details:</strong>
            </th>            
        </tr>
        <tr>
            <td style="border: 0;" colspan="2">
                <strong>Type of Manufacturing</strong>
            </td>            
        </tr>
        <tr>
            <td style="border: 0;text-align: center;" colspan="2">
                <span style="color: red;">
                    (tick each type that applies) 
                </span>
            </td>            
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_manufacture_type_appliance">
                    <strong>Appliances</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_manufacture_type_appliance"
                       name="jmts_user_manufacture_type_appliance"
                       <?=
                       checked('jmts_user_manufacture_type_appliance',
                               get_user_meta($jmts_user->ID, 'jmts_user_manufacture_type_appliance', true), true)
                       ?>
                       value="jmts_user_manufacture_type_appliance" >
            </td>
        </tr>            
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_manufacture_type_construct_mat">
                    <strong>Construction Material</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_manufacture_type_construct_mat"
                       name="jmts_user_manufacture_type_construct_mat"
                       <?=
                       checked('jmts_user_manufacture_type_construct_mat',
                               get_user_meta($jmts_user->ID, 'jmts_user_manufacture_type_construct_mat', true), true)
                       ?>
                       value="jmts_user_manufacture_type_construct_mat" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_manufacture_type_pre_pack_goods">
                    <strong>Pre-packaged Goods</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_manufacture_type_pre_pack_goods"
                       name="jmts_user_manufacture_type_pre_pack_goods"
                       <?=
                       checked('jmts_user_manufacture_type_pre_pack_goods',
                               get_user_meta($jmts_user->ID, 'jmts_user_manufacture_type_pre_pack_goods', true), true)
                       ?>
                       value="jmts_user_manufacture_type_pre_pack_goods" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_manufacture_type_non_met_mat">
                    <strong>Non-metallic Material</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_manufacture_type_non_met_mat"
                       name="jmts_user_manufacture_type_non_met_mat"
                       <?=
                       checked('jmts_user_manufacture_type_non_met_mat',
                               get_user_meta($jmts_user->ID, 'jmts_user_manufacture_type_non_met_mat', true), true)
                       ?>
                       value="jmts_user_manufacture_type_non_met_mat" >
            </td>
        </tr>   
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_total_consignment_production">
                    <strong>Total Consignments or Production / Annum</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="text"
                       pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"
                       placeholder="e.g. $1,000,000.00"
                       id="jmts_user_total_consignment_production"
                       name="jmts_user_total_consignment_production"
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_total_consignment_production', true) ?>" >
            </td>
        </tr> 
        <tr>
            <td style="border: 0;">
                <label for="jmts_user_seasonal_importer_manufacturer">
                    <strong>Seasonal Importer/Manufacturer?</strong>
                </label>
            </td>
            <td style="border: 0;">
                <select id="jmts_user_seasonal_importer_manufacturer" name="jmts_user_seasonal_importer_manufacturer">
                    <option 
                            <?= selected('no', get_user_meta($jmts_user->ID, 'jmts_user_seasonal_importer_manufacturer', true), true) ?> value="no"> 
    <?= __('No', 'jmts') ?>
                    </option>
                    <option <?= selected('yes', get_user_meta($jmts_user->ID, 'jmts_user_seasonal_importer_manufacturer', true), true) ?> value="yes">
    <?= __('Yes', 'jmts') ?>
                    </option>                        
                </select>
            </td>            
        </tr>         
        <tr>
            <td style="border: 0;text-align: left;" colspan="2">
                <span style="color: black;">
                    I/we the above-named applicant(s) do hereby declare that 
                    the information provided herein is accurate to the best 
                    of my/our knowledge and belief and make this application 
                    on my behalf, or on behalf of the above-mentioned business 
                    as a representative appointed or authorized to do so.
                </span>
            </td>            
        </tr>
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Product(s) Details:</strong>
            </th>            
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_product_id" >
                    <strong>Product Id(s)</strong>
                </label>
            </td>
            <td style="border: 0;">
                <textarea name="jmts_user_product_id" 
                          placeholder="Separate items with a comma"
                          style="text-align:left"><?= get_user_meta($jmts_user->ID, 'jmts_user_product_id', true) ?></textarea>
            </td>
        </tr> 
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_product_name">
                    <strong>Common Name(s)</strong>
                </label>
            </td>
            <td style="border: 0;">
                <textarea name="jmts_user_product_name" 
                          placeholder="Separate items with a comma"
                          style="text-align:left"><?= get_user_meta($jmts_user->ID, 'jmts_user_product_name', true) ?></textarea>
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_product_supplier">
                    <strong>Supplier(s)</strong>
                </label>
            </td>
            <td style="border: 0;">
                <textarea name="jmts_user_product_supplier" 
                          placeholder="Separate items with a comma"
                          style="text-align:left"><?= get_user_meta($jmts_user->ID, 'jmts_user_product_supplier', true) ?></textarea>
            </td>
        </tr>            
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_product_brand">
                    <strong>Brand(s)</strong>
                </label>
            </td>
            <td style="border: 0;">
                <textarea name="jmts_user_product_brand" 
                          placeholder="Separate items with a comma"
                          style="text-align:left"><?= get_user_meta($jmts_user->ID, 'jmts_user_product_brand', true) ?></textarea>
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_product_model">
                    <strong>Model(s)</strong>
                </label>
            </td>
            <td style="border: 0;">
                <textarea name="jmts_user_product_model" 
                          placeholder="Separate items with a comma"
                          style="text-align:left"><?= get_user_meta($jmts_user->ID, 'jmts_user_product_model', true) ?></textarea>
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_product_serial">
                    <strong>Serial #(s)</strong>
                </label>
            </td>
            <td style="border: 0;">
                <textarea name="jmts_user_product_serial" 
                          placeholder="Separate items with a comma"
                          style="text-align:left"><?= get_user_meta($jmts_user->ID, 'jmts_user_product_serial', true) ?></textarea>
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_product_country">
                    <strong>Country(ies) of Origin</strong>
                </label>
            </td>
            <td style="border: 0;">                   
                <textarea name="jmts_user_product_country" 
                          placeholder="Separate items with a comma"
                          style="text-align:left"><?= get_user_meta($jmts_user->ID, 'jmts_user_product_country', true) ?>
                </textarea>                    
            </td>
        </tr>            
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Type of Label:</strong>
            </th>            
        </tr>
        <tr>
            <td style="border: 0;text-align: center;" colspan="2">
                <span style="color: red;">
                    Tick the applicable boxes
                </span>
            </td>            
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_label_type_neck">
                    <strong>Neck Label</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_label_type_neck"
                       name="jmts_user_label_type_neck"
                       <?=
                       checked('jmts_user_label_type_neck',
                               get_user_meta($jmts_user->ID, 'jmts_user_label_type_neck', true), true)
                       ?>
                       value="jmts_user_label_type_neck" >
            </td>
        </tr>            
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_label_type_front">
                    <strong>Front Label</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_label_type_front"
                       name="jmts_user_label_type_front"
                       <?=
                       checked('jmts_user_label_type_front',
                               get_user_meta($jmts_user->ID, 'jmts_user_label_type_front', true), true)
                       ?>
                       value="jmts_user_label_type_front" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_label_type_back">
                    <strong>Back Label</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_label_type_back"
                       name="jmts_user_label_type_back"
                       <?=
                       checked('jmts_user_label_type_back',
                               get_user_meta($jmts_user->ID, 'jmts_user_label_type_back', true), true)
                       ?>
                       value="jmts_user_label_type_back" >
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_label_type_resubmission">
                    <strong>Resubmission After Rejection</strong>
                </label>
            </td>
            <td style="border: 0;">
                <input type="checkbox"
                       id="jmts_user_label_type_resubmission"
                       name="jmts_user_label_type_resubmission"
                       <?=
                       checked('jmts_user_label_type_resubmission',
                               get_user_meta($jmts_user->ID, 'jmts_user_label_type_resubmission', true), true)
                       ?>
                       value="jmts_user_label_type_resubmission" >
            </td>
        </tr>
        <tr>
            <th style="border: 0;text-align: left;" colspan="2">
                <strong>Label Images:</strong>
            </th>            
        </tr>
        <tr>
            <td style="border: 0;text-align: center;" colspan="2">
                <span style="color: red;">
                    Upload label images based on type. Images will be uploaded 
                    after you press the UPDATE button.
                </span>
            </td>            
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_label_image_neck">
                    <strong>Neck Label Image</strong>
                </label>
            </td>
            <td style="border: 0;">
                <img src="<?= get_user_meta($jmts_user->ID, 'jmts_user_label_image_neck', true) ?>" 
                     height="100" width="100"
                     alt="Maximum upload file size: 256 MB"
                     />
                <br>
                <input type="file" 
                       id="jmts_user_label_image_file_neck" 
                       title="Choose image file (PNG, JPG or JPEG)"
                       name="jmts_user_label_image_file_neck" 
                       value="" />
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_label_image_front">
                    <strong>Front Label Image</strong>
                </label>
            </td>
            <td style="border: 0;">
                <img src="<?= get_user_meta($jmts_user->ID, 'jmts_user_label_image_front', true) ?>" 
                     height="100" width="100"
                     alt="Maximum upload file size: 256 MB"
                     />
                <br>
                <input type="file" 
                       id="jmts_user_label_image_file_front" 
                       title="Choose image file (PNG, JPG or JPEG)"
                       name="jmts_user_label_image_file_front" 
                       value="" />
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_label_image_back">
                    <strong>Back Label Image</strong>
                </label>
            </td>
            <td style="border: 0;">
                <img src="<?= get_user_meta($jmts_user->ID, 'jmts_user_label_image_back', true) ?>" 
                     height="100" width="100"
                     alt="Maximum upload file size: 256 MB"
                     />
                <br>
                <input type="file" 
                       id="jmts_user_label_image_file_back" 
                       title="Choose image file (PNG, JPG or JPEG)"
                       name="jmts_user_label_image_file_back" 
                       value="" />
            </td>
        </tr>
        <tr>            
            <td style="border: 0;">
                <label for="jmts_user_label_image_resubmission">
                    <strong>Resubmission Label Image</strong>
                </label>
            </td>
            <td style="border: 0;">
                <img src="<?= get_user_meta($jmts_user->ID, 'jmts_user_label_image_resubmission', true) ?>" 
                     height="100" width="100"
                     alt="Maximum upload file size: 256 MB"
                     />
                <br>
                <input type="file" 
                       id="jmts_user_label_image_file_resubmission" 
                       title="Choose image file (PNG, JPG or JPEG)"
                       name="jmts_user_label_image_file_resubmission" 
                       value="" />
            </td>
        </tr>
        <tr>
            <td style="border: 0;" colspan="2">
                <hr/>
            </td>
        </tr>
        <tr>
            <th style="border: 0;text-align: center;" colspan="2">
                <strong>Applicant's Declaration</strong>
            </th>            
        </tr>
        <tr>
            <td style="border: 0;text-align: left;" colspan="2">
                <span style="color: black;">
                    I declare that all statements appearing on this application 
                    are true and correct to the best of my knowledge and belief; 
                    and, that the representation attached to this form, including 
                    supplemental documents, truly and correctly represents the 
                    content of the container to which these labels will be applied. 
                    I also certify that I have read, understood and complied 
                    with the conditions and instructions which are attached 
                    to the Labelling Standards, JS CRS 5, JS 349, JS 350, JS 1: Parts 2 to 30 
                    and any other relevant product standard and the procedures 
                    and requirements for this certificate.
                </span>
            </td>            
        </tr>  
        <tr>
            <td style="border: 0;text-align: center;" colspan="2">
                <span style="color: red;">
                    Type your name below and upload an image in the PNG or JPEG 
                    file format that contains your signature. The image will be uploaded 
                    after you press the UPDATE button.
                </span>
            </td>            
        </tr>
        <tr>            
            <td style="border: 0;">
                <input type="text"
                       id="jmts_user_applicant_name"
                       name="jmts_user_applicant_name"
                       placeholder="Applicant's Name (required)" 
                       required
                       value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_name', true) ?>" >
            </td>  
            <td style="border: 0;">
                <img src="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_signature', true) ?>" 
                     height="100" width="100"
                     alt="Maximum upload file size: 256 MB"
                     />
                <br>
                <input type="file" 
                       id="jmts_user_applicant_signature_image_file" 
                       title="Choose image file (PNG, JPG or JPEG)"
                       name="jmts_user_applicant_signature_image_file" 
                       value="" />
            </td>
        </tr>
        <tr>
            <td style="border: 0;text-align: center;" colspan="2">
                <input type="submit" value="Update">
            </td>            
        </tr>            

    </table>
    <?php
}

function jmts_user_save__meta_data($jmts_user) {
    
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
    // Applicant's Name
    $jmts_user_applicant_name = isset($_POST['jmts_user_applicant_name']) ?
            sanitize_text_field($_POST['jmts_user_applicant_name']) : '';
    // Applicant's Signature
    $jmts_user_applicant_signature = '';
    if (isset($_FILES['jmts_user_applicant_signature_image_file']) &&
            $_FILES['jmts_user_applicant_signature_image_file']['tmp_name'] !== '') {
        $file = wp_upload_bits($_FILES['jmts_user_applicant_signature_image_file']['name'],
                null,
                file_get_contents($_FILES['jmts_user_applicant_signature_image_file']['tmp_name']));

        if (FALSE === $file['error']) {
            $jmts_user_applicant_signature = $file['url'];
        } else {
            $jmts_user_applicant_signature = 'Error uploading file!';
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
    // Applicant's Name
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_name', $jmts_user_applicant_name);
    // Applicant's Signature
    if ($jmts_user_applicant_signature !== '') {
        update_user_meta($jmts_user->ID, 'jmts_user_applicant_signature', $jmts_user_applicant_signature);
    }
}

