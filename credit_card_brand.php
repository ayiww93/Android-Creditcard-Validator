<?php
require_once('Zend/Validate/CreditCard.php');

var_dump(getCcBrand('4980000000000006')); // => "VISA"

function getCcBrand($ccnum) {
    $brands = array(
        Zend_Validate_CreditCard::VISA              => 'VISA',
        Zend_Validate_CreditCard::MASTERCARD        => 'MASTER',
        Zend_Validate_CreditCard::JCB               => 'JCB',
        Zend_Validate_CreditCard::AMERICAN_EXPRESS  => 'AMEX',
        Zend_Validate_CreditCard::DINERS_CLUB       => 'DINERS',
        Zend_Validate_CreditCard::DINERS_CLUB_US    => 'DINERS',
        Zend_Validate_CreditCard::UNIONPAY          => 'UNIONPAY',
        Zend_Validate_CreditCard::DISCOVER          => 'DISCOVER',
        Zend_Validate_CreditCard::LASER             => 'LASER',
        Zend_Validate_CreditCard::MAESTRO           => 'MAESTRO',
        Zend_Validate_CreditCard::SOLO              => 'SOLO',
    );
    $validator = new Zend_Validate_CreditCard();
    foreach($brands as $validator_type_id => $name) {
        $validator->setType($validator_type_id);
        if($validator->isValid($ccnum)) {
            return $name;
        }
    }
    return false;
}