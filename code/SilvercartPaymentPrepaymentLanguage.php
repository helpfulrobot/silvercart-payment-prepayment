<?php
/**
 * Copyright 2012 pixeltricks GmbH
 *
 * This file is part of SilverCart.
 *
 * SilverCart is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * SilverCart is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with SilverCart.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package SilverCart
 * @subpackage translation
 */

/**
 * Translations for the multilingual attributes that all payment methods have in common
 *
 * @author Roland Lehmann <rlehmann@pixeltricks.de>
 * @copyright Pixeltricks GmbH
 * @since 28.01.2012
 * @license see license file in modules root directory
 */
class SilvercartPaymentPrepaymentLanguage extends SilvercartPaymentMethodLanguage {
    
    /**
     * Attributes.
     *
     * @var array
     * 
     * @author Roland Lehmann <rlehmann@pixeltricks.de>
     * @since 28.01.2012
     */
    public static $db = array(
        'TextBankAccountInfo'   => 'Text',
        'InvoiceInfo'           => 'Text'
    );
    
    /**
     * 1:1 or 1:n relationships.
     *
     * @var array
     * 
     * @author Roland Lehmann <rlehmann@pixeltricks.de>
     * @since 28.01.2012
     */
    public static $has_one = array(
        'SilvercartPaymentPrepayment' => 'SilvercartPaymentPrepayment'
    );
    
    /**
     * Returns the translated singular name of the object. If no translation exists
     * the class name will be returned.
     * 
     * @return string The objects singular name 
     * 
     * @author Roland Lehmann <rlehmann@pixeltricks.de>
     * @since 28.01.2012
     */
    public function singular_name() {
        if (_t('SilvercartPaymentPrepaymentLanguage.SINGULARNAME')) {
            return _t('SilvercartPaymentPrepaymentLanguage.SINGULARNAME');
        } else {
            return parent::singular_name();
        } 
    }


    /**
     * Returns the translated plural name of the object. If no translation exists
     * the class name will be returned.
     * 
     * @return string the objects plural name
     * 
     * @author Roland Lehmann <rlehmann@pixeltricks.de>
     * @since 28.01.2012
     */
    public function plural_name() {
        if (_t('SilvercartPaymentPrepaymentLanguage.PLURALNAME')) {
            return _t('SilvercartPaymentPrepaymentLanguage.PLURALNAME');
        } else {
            return parent::plural_name();
        }

    }
    
    /**
     * Field labels for display in tables.
     *
     * @param boolean $includerelations A boolean value to indicate if the labels returned include relation fields
     *
     * @return array
     *
     * @author Roland Lehmann <rlehmann@pixeltricks.de>
     * @copyright 2012 pixeltricks GmbH
     * @since 28.01.2012
     */
    public function fieldLabels($includerelations = true) {
        $fieldLabels = array_merge(
                parent::fieldLabels($includerelations),             array(
            'TextBankAccountInfo' => _t('SilvercartPaymentPrepaymentLanguage.TEXTBANKACCOUNTINFO'),
            'InvoiceInfo' => _t('SilvercartPaymentPrepaymentLanguage.INVOICEINFO')
                )
        );

        $this->extend('updateFieldLabels', $fieldLabels);
        return $fieldLabels;
    }
    
    /**
     * CMS fields for this object
     *
     * @param array $params Params
     * 
     * @return FieldSet
     */
    public function getCMSFields($params = null) {
        $fields = parent::getCMSFields($params);
        
        switch ($this->SilvercartPaymentPrepayment()->PaymentChannel) {
            case 'invoice':
                $fields->removeByName('TextBankAccountInfo');
                break;
            case 'prepayment':
            default:
                $fields->removeByName('InvoiceInfo');
        }
        
        return $fields;
    }
}

