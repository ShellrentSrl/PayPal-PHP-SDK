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
 * A resource representing an agreement-token.
 *
 * @package PayPal\Api
 * 
 * @property string token_id
 * @property string token_status
 * @property string description
 * @property string merchant_custom_data
 * @property \PayPal\Api\Payer payer
 * @property \PayPal\Api\Address shipping_address
 * @property \PayPal\Api\Plan plan
 */
class BillingAgreementToken extends PayPalResourceModel
{
    /**
     * agreement-token id.
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
     * agreement-token id.
     *
     * @return string
     */
    public function getTokenId()
    {
        return $this->token_id;
    }
	
    /**
     * agreement-token status.
     *
     * @param string $tokenStatus
     * 
     * @return $this
     */
    public function setTokenStatus($tokenStatus)
    {
        $this->token_status = $tokenStatus;
        return $this;
    }

    /**
     * agreement-token status.
     *
     * @return string
     */
    public function getTokenStatus()
    {
        return $this->token_status;
    }
	
    /**
     * Description of the agreement-token.
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
     * Description of the agreement-token.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
	
    /**
     * merchant_custom_data of the agreement-token.
     *
     * @param string $merchant_custom_data
     * 
     * @return $this
     */
    public function setMerchantCustomData($merchant_custom_data)
    {
        $this->merchant_custom_data = $merchant_custom_data;
        return $this;
    }

    /**
     * merchant_custom_data of the agreement-token.
     *
     * @return string
     */
    public function getMerchantCustomData()
    {
        return $this->merchant_custom_data;
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
     * Get Approval Link
     *
     * @return null|string
     */
    public function getApprovalLink()
    {
        return $this->getLink(PayPalConstants::APPROVAL_URL);
    }

    /**
     * Create a new agreement-token by passing the details for the agreement-token, including the description, payer, and billing plan in the request JSON.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return BillingAgreementToken
     */
    public function create($apiContext = null, $restCall = null)
    {
        $payLoad = $this->toJSON();
		
        $json = self::executeCall(
            "/v1/billing-agreements/agreement-tokens",
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
     * Retrieve details for a particular billing agreement token by passing the ID of the billing agreement token to the request URI.
     *
     * @param string $billingAgreementTokenId
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return BillingAgreementToken
     */
    public static function get($billingAgreementTokenId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($billingAgreementTokenId, 'billingAgreementTokenId');
        $payLoad = "";
        $json = self::executeCall(
            "/v1/billing-agreements/agreement-tokens/$billingAgreementTokenId",
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new BillingAgreementToken();
        $ret->fromJson($json);
        return $ret;
    }
}
