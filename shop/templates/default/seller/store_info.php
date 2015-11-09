<?php defined('InShopNC') or exit('Access Invalid!');?>

        <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
            <thead>
                <tr>
                    <th colspan="20">Company and contact information</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="w150">Company name:</th>
                    <td colspan="20"><?php echo $output['joinin_detail']['company_name'];?></td>
                </tr>
                <tr>
                    <th>The location of the company:</th>
                    <td><?php echo $output['joinin_detail']['company_address'];?></td>
                    <th>Company address:</th>
                    <td colspan="20"><?php echo $output['joinin_detail']['company_address_detail'];?></td>
                </tr>
                <tr>
                    <th>Company phone:</th>
                    <td><?php echo $output['joinin_detail']['company_phone'];?></td>
                    <th>Total staff:</th>
                    <td><?php echo $output['joinin_detail']['company_employee_count'];?>&nbsp;People</td>
                    <th>Registered capital:</th>
                    <td><?php echo $output['joinin_detail']['company_registered_capital'];?>&nbsp;Million yuan </td>
                </tr>
                <tr>
                    <th>Contact name:</th>
                    <td><?php echo $output['joinin_detail']['contacts_name'];?></td>
                    <th>Contact phone:</th>
                    <td><?php echo $output['joinin_detail']['contacts_phone'];?></td>
                    <th>Electronic mail:</th>
                    <td><?php echo $output['joinin_detail']['contacts_email'];?></td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
            <thead>
                <tr>
                    <th colspan="20">Business license information (copy)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="w150">Business license number:</th>
                    <td><?php echo $output['joinin_detail']['business_licence_number'];?></td></tr><tr>

                    <th>Location of business license:</th>
                    <td><?php echo $output['joinin_detail']['business_licence_address'];?></td></tr><tr>

                    <th>Business license validity period:</th>
                    <td><?php echo $output['joinin_detail']['business_licence_start'];?> - <?php echo $output['joinin_detail']['business_licence_end'];?></td>
                </tr>
                <tr>
                    <th>Legal business scope:</th>
                    <td colspan="20"><?php echo $output['joinin_detail']['business_sphere'];?></td>
                </tr>
                <tr>
                    <th>Business license number<br />
                        Electronic</th>
                    <td colspan="20"><a nctype="nyroModal"  href="<?php echo getStoreJoininImageUrl($output['joinin_detail']['business_licence_number_electronic']);?>"> <img src="<?php echo getStoreJoininImageUrl($output['joinin_detail']['business_licence_number_electronic']);?>" alt="" /> </a></td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
            <thead>
                <tr>
                    <th colspan="20">Organization code certificate</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Organization code:</th>
                    <td colspan="20"><?php echo $output['joinin_detail']['organization_code'];?></td>
                </tr>
                <tr>
                    <th>Organization code certificate<br/>          Electronic</th>
                    <td colspan="20"><a nctype="nyroModal"  href="<?php echo getStoreJoininImageUrl($output['joinin_detail']['organization_code_electronic']);?>"> <img src="<?php echo getStoreJoininImageUrl($output['joinin_detail']['organization_code_electronic']);?>" alt="" /> </a></td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
            <thead>
                <tr>
                    <th colspan="20">General taxpayer:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>General taxpayer:</th>
                    <td colspan="20"><a nctype="nyroModal"  href="<?php echo getStoreJoininImageUrl($output['joinin_detail']['general_taxpayer']);?>"> <img src="<?php echo getStoreJoininImageUrl($output['joinin_detail']['general_taxpayer']);?>" alt="" /> </a></td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
            <thead>
                <tr>
                    <th colspan="20">Bank information:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="w150">Bank account name:</th>
                    <td><?php echo $output['joinin_detail']['bank_account_name'];?></td>
                    </tr><tr>
                    <th>Company bank account:</th>
                    <td><?php echo $output['joinin_detail']['bank_account_number'];?></td></tr>
                <tr>
                    <th>Bank branch name:</th>
                    <td><?php echo $output['joinin_detail']['bank_name'];?></td>
                </tr>
                <tr>
                    <th>Branch line contact:</th>
                    <td><?php echo $output['joinin_detail']['bank_code'];?></td>
                    </tr><tr>
                    <th>Where the bank is located:</th>
                    <td colspan="20"><?php echo $output['joinin_detail']['bank_address'];?></td>
                </tr>
                <tr>
                    <th>Bank permit<br/>Electronic</th>
                    <td colspan="20"><a nctype="nyroModal"  href="<?php echo getStoreJoininImageUrl($output['joinin_detail']['bank_licence_electronic']);?>"> <img src="<?php echo getStoreJoininImageUrl($output['joinin_detail']['bank_licence_electronic']);?>" alt="" /> </a></td>
                </tr>
            </tbody>

        </table>
        <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
            <thead>
                <tr>
                    <th colspan="20">Settlement account information:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="w150">Bank account name:</th>
                    <td><?php echo $output['joinin_detail']['settlement_bank_account_name'];?></td>
                </tr>
                <tr>
                    <th>Company bank account:</th>
                    <td><?php echo $output['joinin_detail']['settlement_bank_account_number'];?></td>
                </tr>
                <tr>
                    <th>Bank branch name:</th>
                    <td><?php echo $output['joinin_detail']['settlement_bank_name'];?></td>
                </tr>
                <tr>
                    <th>Branch line contact:</th>
                    <td><?php echo $output['joinin_detail']['settlement_bank_code'];?></td>
                </tr>
                <tr>
                    <th>Where the bank is located:</th>
                    <td><?php echo $output['joinin_detail']['settlement_bank_address'];?></td>
                </tr>
            </tbody>

        </table>
        <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
            <thead>
                <tr>
                    <th colspan="20">Tax registration certificate</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="w150">Tax registration certificate number:</th>
                    <td><?php echo $output['joinin_detail']['tax_registration_certificate'];?></td>
                </tr>
                <tr>
                    <th>Taxpayer identification number:</th>
                    <td><?php echo $output['joinin_detail']['taxpayer_id'];?></td>
                </tr>
                <tr>
                    <th>Tax registration certificate number<br />
                        Electronic</th>
                    <td><a nctype="nyroModal"  href="<?php echo getStoreJoininImageUrl($output['joinin_detail']['tax_registration_certificate_electronic']);?>"> <img src="<?php echo getStoreJoininImageUrl($output['joinin_detail']['tax_registration_certificate_electronic']);?>" alt="" /> </a></td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
            <thead>
                <tr>
                    <th colspan="20">Store management information</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="w150">Seller account:</th>
                    <td><?php echo $output['joinin_detail']['seller_name'];?></td>
                </tr>
                <tr>
                    <th class="w150">Shop name:</th>
                    <td><?php echo $output['joinin_detail']['store_name'];?></td>
                </tr>
                <tr>
                    <th class="w150">Store level:</th>
                    <td><?php echo $output['store_grade_name'];?></td>
                </tr>
                <tr>
                    <th class="w150">Shop category:</th>
                    <td><?php echo $output['store_class_name'];?></td>
                </tr>
                <tr>
                    <th>Business category:</th>
                    <td colspan="2"><table border="0" cellpadding="0" cellspacing="0" id="table_category" class="type">
                            <thead>
                                <tr>
                                    <th>Classification 1</th>
                                    <th>Classification 2</th>
                                    <th>Classification 3</th>
                                    <th>Proportion</th>
                                </tr>
                            </thead>
                            <?php if(!empty($output['store_bind_class_list']) && is_array($output['store_bind_class_list'])) {?>
                            <?php foreach($output['store_bind_class_list'] as $key=>$value) {?>
                                <tr>
                                    <td><?php echo $value['class_1_name'];?></td>
                                    <td><?php echo $value['class_2_name'];?></td>
                                    <td><?php echo $value['class_3_name'];?></td>
                                    <td><?php echo $value['commis_rate'];?>%</td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                            </tbody>
                    </table></td>
                </tr>
                <tr>
                    <th>Audit opinion:</th>
                    <td colspan="2"><?php echo $output['joinin_detail']['joinin_message'];?></td>
                </tr>
            </tbody>
        </table>

