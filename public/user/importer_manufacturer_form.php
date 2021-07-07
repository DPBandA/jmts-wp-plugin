<?php ?>
<h5 style="text-align:center;">IMPORTERS/MANUFACTURERS REGISTRATION FORM</h5>
<h6 style="text-align:center;">Standards Regulations, 1983</h6>
<h6 style="text-align:center;">Regulation 8B</h6>
<p style="color: red;">
    This form must be completed in full to register as an importer and or 
    manufacturer in accordance with regulation 8B of the Standards Regulations, 1983.
</p>
<form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="form_submitted" value="true" />
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
                        <?= selected('Individual', 
                                get_user_meta($jmts_user->ID, 'jmts_user_business_type', true), true) ?> value="Individual"> 
                            <?= __('Individual', 'jmts') ?>
                    </option>
                    <option <?= selected('Partnership', 
                            get_user_meta($jmts_user->ID, 'jmts_user_business_type', true), true) ?> value="Partnership">
                        <?= __('Partnership', 'jmts') ?>
                    </option>  
                    <option <?= selected('Incorporated Company', 
                            get_user_meta($jmts_user->ID, 'jmts_user_business_type', true), true) ?> value="Incorporated Company">
                        <?= __('Incorporated Company', 'jmts') ?>
                    </option>
                    <option <?= selected('Trust', 
                            get_user_meta($jmts_user->ID, 'jmts_user_business_type', true), true) ?> value="Trust">
                        <?= __('Trust', 'jmts') ?>
                    </option>
                    <option <?= selected('Co-operative Association', 
                            get_user_meta($jmts_user->ID, 'jmts_user_business_type', true), true) ?> value="Co-operative Association">
                        <?= __('Co-operative Association', 'jmts') ?>
                    </option>
                    <option <?= selected('Other', 
                            get_user_meta($jmts_user->ID, 'jmts_user_business_type', true), true) ?> value="Other">
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
                    Upload label images based on type
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
                <input type="submit" value="Update">
            </td>            
        </tr>            

    </table>
</form>


