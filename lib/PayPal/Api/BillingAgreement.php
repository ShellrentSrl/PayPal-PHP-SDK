<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Core\PayPalConstants;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class Agreement
 *
 * A resource representing an billing-agreement.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string state
 * @property string name
 * @property string description
 * @property string start_date
 * @property string token_id
 * @property \PayPal\Api\Payer payer
 * @property \PayPal\Api\Address shipping_address
 * @property \PayPal\Api\MerchantPreferences override_merchant_preferences
 * @property \PayPal\Api\OverrideChargeModel[] override_charge_models
 * @property \PayPal\Api\Plan plan
 * @property string create_time
 * @property string update_time
 * @property \PayPal\Api\AgreementDetails agreement_details
 */
class BillingAgreement extends PayPalResourceModel
{
    /**
     * Identifier of the agreement.
     *
     * @param string $id
     * 
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Identifier of the agreement.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * State of the agreement.
     *
     * @param string $state
     * 
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * State of the agreement.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Name of the agreement.
     *
     * @param string $name
     * 
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Name of the agreement.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Description of the agreement.
     *
     * @param string $description
     * 
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Description of the agreement.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Start date of the agreement. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $start_date
     * 
     * @return $this
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * Start date of the agreement. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Details of the buyer who is enrolling in this agreement. This information is gathered from execution of the approval URL.
     *
     * @param \PayPal\Api\Payer $payer
     * 
     * @return $this
     */
    public function setPayer($payer)
    {
        $this->payer = $payer;
        return $this;
    }

    /**
     * Details of the buyer who is enrolling in this agreement. This information is gathered from execution of the approval URL.
     *
     * @return \PayPal\Api\Payer
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * Shipping address object of the agreement, which should be provided if it is different from the default address.
     *
     * @param \PayPal\Api\Address $shipping_address
     * 
     * @return $this
     */
    public function setShippingAddress($shipping_address)
    {
        $this->shipping_address = $shipping_address;
        return $this;
    }

    /**
     * Shipping address object of the agreement, which should be provided if it is different from the default address.
     *
     * @return \PayPal\Api\Address
     */
    public function getShippingAddress()
    {
        return $this->shipping_address;
    }

    /**
     * Default merchant preferences from the billing plan are used, unless override preferences are provided here.
     *
     * @param \PayPal\Api\MerchantPreferences $override_merchant_preferences
     * 
     * @return $this
     */
    public function setOverrideMerchantPreferences($override_merchant_preferences)
    {
        $this->override_merchant_preferences = $override_merchant_preferences;
        return $this;
    }

    /**
     * Default merchant preferences from the billing plan are used, unless override preferences are provided here.
     *
     * @return \PayPal\Api\MerchantPreferences
     */
    public function getOverrideMerchantPreferences()
    {
        return $this->override_merchant_preferences;
    }

    /**
     * Array of override_charge_model for this agreement if needed to change the default models from the billing plan.
     *
     * @param \PayPal\Api\OverrideChargeModel[] $override_charge_models
     * 
     * @return $this
     */
    public function setOverrideChargeModels($override_charge_models)
    {
        $this->override_charge_models = $override_charge_models;
        return $this;
    }

    /**
     * Array of override_charge_model for this agreement if needed to change the default models from the billing plan.
     *
     * @return \PayPal\Api\OverrideChargeModel[]
     */
    public function getOverrideChargeModels()
    {
        return $this->override_charge_models;
    }

    /**
     * Append OverrideChargeModels to the list.
     *
     * @param \PayPal\Api\OverrideChargeModel $overrideChargeModel
     * @return $this
     */
    public function addOverrideChargeModel($overrideChargeModel)
    {
        if (!$this->getOverrideChargeModels()) {
            return $this->setOverrideChargeModels(array($overrideChargeModel));
        } else {
            return $this->setOverrideChargeModels(
                array_merge($this->getOverrideChargeModels(), array($overrideChargeModel))
            );
        }
    }

    /**
     * Remove OverrideChargeModels from the list.
     *
     * @param \PayPal\Api\OverrideChargeModel $overrideChargeModel
     * @return $this
     */
    public function removeOverrideChargeModel($overrideChargeModel)
    {
        return $this->setOverrideChargeModels(
            array_diff($this->getOverrideChargeModels(), array($overrideChargeModel))
        );
    }

    /**
     * Plan details for this agreement.
     *
     * @param \PayPal\Api\Plan $plan
     * 
     * @return $this
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
        return $this;
    }

    /**
     * Plan details for this agreement.
     *
     * @return \PayPal\Api\Plan
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Date and time that this resource was created. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $create_time
     * 
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->create_time = $create_time;
        return $this;
    }

    /**
     * Date and time that this resource was created. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Date and time that this resource was updated. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $update_time
     * 
     * @return $this
     */
    public function setUpdateTime($update_time)
    {
        $this->update_time = $update_time;
        return $this;
    }

    /**
     * Date and time that this resource was updated. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Agreement Details
     *
     * @param \PayPal\Api\AgreementDetails $agreement_details
     * 
     * @return $this
     */
    public function setAgreementDetails($agreement_details)
    {
        $this->agreement_details = $agreement_details;
        return $this;
    }

    /**
     * Agreement Details
     *
     * @return \PayPal\Api\AgreementDetails
     */
    public function getAgreementDetails()
    {
        return $this->agreement_details;
    }

    /**
     * Id of the of the agreement-token.
     *
     * @param string $tokenId
     * 
     * @return $this
     */
    public function setTokenId($tokenId)
    {
        $this->token_id = $tokenId;
        return $this;
    }

    /**
     * Id of the of the agreement-token.
     *
     * @return string
     */
    public function getTokenId()
    {
        return $this->token_id;
    }

    /**
     * Get Approval Link
     *
     * @return null|string
     */
    public function getApprovalLink()
    {
        return $this->getLink(PayPalConstants::APPROVAL_URL);
    }

    /**
     * Create a new billing agreement by passing the details for the agreement, including the name, description, start date, payer, and billing plan in the request JSON.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Agreement
     */
    public function create($apiContext = null, $restCall = null)
    {
        $payLoad = $this->toJSON();
var_dump($payLoad);
        $json = self::executeCall(
            "/v1/billing-agreements/agreements",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

    /**
     * Retrieve details for a particular billing agreement by passing the ID of the agreement to the request URI.
     *
     * @param string $billingAgreementId
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return BillingAgreement
     */
    public static function get($billingAgreementId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($billingAgreementId, 'billingAgreementId');
        $payLoad = "";
        $json = self::executeCall(
            "/v1/billing-agreements/agreements/$billingAgreementId",
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new BillingAgreement();
        $ret->fromJson($json);
        return $ret;
    }
}
