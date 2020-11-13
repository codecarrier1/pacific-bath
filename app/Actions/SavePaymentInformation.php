<?php

namespace App\Actions;

use App\FinancingOption;
use App\Payment;
use App\VeteranDiscount;

class SavePaymentInformation
{
    /**
     * @var string
     */
    private string $paymentType;
    /**
     * @var FinancingOption
     */
    private $financingOption;
    private $additionalDiscount;
    /**
     * @var VeteranDiscount
     */
    private $veteranDiscount;
    private $downPayment;
    private $discountedTotal;
    private $promotions;


    public function setCash()
    {
        $this->paymentType = 'cash';
        return $this;
    }

    public function setFinancing(FinancingOption $financingOption)
    {
        $this->paymentType = 'finance';
        $this->financingOption = $financingOption;
        return $this;
    }

    public function setAdditionalDiscount($discount)
    {
        $this->additionalDiscount = $discount;
        return $this;
    }

    public function setVeteransDiscount(VeteranDiscount $veteranDiscount)
    {
        $this->veteranDiscount = $veteranDiscount;
        return $this;
    }

    public function setDownPayment($amount)
    {
        $this->downPayment = $amount;
        return $this;
    }


    public function setDiscountedTotal($amount)
    {
        $this->discountedTotal = $amount;
        return $this;
    }

    public function setPromotions($promotions)
    {
        $this->promotions = $promotions;
        return $this;
    }

    public function save(Payment $payment)
    {
        $this->resetPayment($payment);

        $payment->deposit = $this->downPayment;
        $payment->final_type = $this->paymentType;
        $payment->discounted_total = $this->discountedTotal;
        $details = [];
        if($this->financingOption){
            $details['financing_option'] = $this->financingOption;
        }
        if($this->veteranDiscount){
            $details['veterans_discount'] = $this->veteranDiscount;
        }
        if($this->additionalDiscount){
            $details['additional_discount'] = $this->additionalDiscount;
        }
        if($this->promotions){
            $details['promotions'] = $this->promotions;
        }
        $payment->details = (object)$details;
        $payment->save();
    }

    protected function resetPayment(Payment $payment)
    {
        $payment->details = '';
        $payment->save();
    }


}