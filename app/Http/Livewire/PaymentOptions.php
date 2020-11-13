<?php

namespace App\Http\Livewire;

use App\Actions\SavePaymentInformation;
use App\FinancingOption;
use App\Promotion;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaymentOptions extends Component
{
    public $total;

    public $deposit;

    public $additionalDiscounts;

    public $promotions;

    public $veteransDiscount;

    public bool $veteransDiscountEnabled = false;

    public $selectedNumberOfMonths;

    public $selectedPromotion;

    public $selectedInterestRate;

    public $netPrice;

    public $financingOptions;

    public $terms;

    public $rates;

    public $financeOption;

    public $totalDiscounts;

    public bool $isFinanced = true;

    public $lead;

    public bool $paymentOptionSaved = false;




    public function render()
    {
        return view('livewire.payment-options');
    }

    public function mount($lead, $financingOptions)
    {
        $this->total = $lead->quote->total;
        $this->lead = $lead;
        $this->promotions = $lead->service->promotions()->isActive()->get();
        $this->veteransDiscount = $this->calculateVeteransDiscount();
        $this->financingOptions = $financingOptions;
        $this->deposit = round($this->total * 0.34, 2);
        $this->terms = $this->financingOptions->pluck('number_of_months')->values()->unique()->toArray();
        $this->rates = $this->financingOptions->pluck('default_interest_rate')->values()->unique()->toArray();
        sort($this->terms);
        sort($this->rates);
        $this->selectedNumberOfMonths = 60;
        $this->selectedInterestRate = 6.99;
        if (!in_array(6.99, $this->rates)) {
            $this->selectedInterestRate = $this->rates[0];
        }
        if (!in_array(60, $this->terms)) {
            $this->selectedNumberOfMonths = $this->terms[0];
        }
        $this->setFinanceOption();
        if($lead->payment->deposit){
            $this->deposit = $lead->payment->deposit;
        }
        if(is_object($lead->payment->details)){
            $this->paymentOptionSaved = true;
            if(property_exists($lead->payment->details, 'additonal_discount')){
                $this->setAdditionalDiscounts($lead->payment->details->additional_discount);
            }
            if(property_exists($lead->payment->details, 'veterans_discount')){
                $this->setVeteransDiscount(true);
            }
            if(property_exists($lead->payment->details, 'promotions')){
                $this->setSelectedPromotion($lead->payment->details->promotions->id);
            }
            if(property_exists($lead->payment->details, 'financing_option')){
                $this->financeOption = $this->financingOptions->firstWhere('id', $lead->payment->details->financing_option->id);
                $this->selectedNumberOfMonths = $lead->payment->details->financing_option->number_of_months;
                $this->selectedInterestRate = $lead->payment->details->financing_option->default_interest_rate;
            }
        }
        if($lead->payment->final_type === 'cash'){
            $this->isFinanced = false;
        }

    }

    public function savePaymentOption()
    {
        /** @var SavePaymentInformation $handler */
        $handler = app(SavePaymentInformation::class);
        $handler->setDownPayment($this->deposit)
        ->setAdditionalDiscount($this->additionalDiscounts)
        ->setDiscountedTotal($this->getNetTotalProperty());
        if($this->selectedPromotion){
            $handler->setPromotions($this->selectedPromotion);
        }
        if($this->veteransDiscountEnabled){
            $handler->setVeteransDiscount($this->lead->service->veteranDiscounts()->first());
        }
        if($this->isFinanced){
            $handler->setFinancing($this->financeOption);
        } else {
            $handler->setCash();
        }
        $handler->save($this->lead->payment);

        $this->paymentOptionSaved = true;
    }

    protected function calculateVeteransDiscount()
    {
        $veteransDiscount = $this->lead->service->veteranDiscounts()->first();
        $discount = $this->total * ($veteransDiscount->discount * 0.01);
        if ($discount < $veteransDiscount->max_value) {
            return $discount;
        }
        return $veteransDiscount->max_value;
    }

    protected function calculatePromotionalDiscount()
    {
        if ($this->selectedPromotion->discount_type === Promotion::DOLLAR_AMOUNT) {
            return $this->selectedPromotion->discount;
        }
        $discount = $this->total * ($this->selectedPromotion->discount * 0.01);
        if ($this->selectedPromotion->discount_type === Promotion::PERCENT_WITH_MAX) {
            if ($discount > $this->selectedPromotion->max_value) {
                $discount = $this->selectedPromotion->max_value;
            }
        }
        return $discount;
    }

    protected function asNumber($value)
    {
        return floatval($value);
    }

    public function calculateDiscounts()
    {
        $discount = $this->additionalDiscounts;
        if ($this->selectedPromotion) {
            $discount += $this->calculatePromotionalDiscount();
        }
        if ($this->veteransDiscountEnabled) {
            $discount += $this->veteransDiscount;
        }
        $this->totalDiscounts = $discount;
    }

    public function getMonthlyPaymentProperty()
    {
        $deposit = str_replace('$', '', $this->deposit);
        $deposit = str_replace(',', '', $deposit);
        return ($this->getNetTotalProperty() - floatval($deposit)) * $this->financeOption->default_monthly_payment_factor;
    }

    protected function getNetTotalProperty()
    {
        return $this->total - $this->deposit - $this->totalDiscounts;
    }

    protected function currencyStringToNumber($string)
    {
        $string = str_replace('$', '', $string);
        $string = str_replace(',', '', $string);
        return floatval($string);
    }



    public function setVeteransDiscount($value)
    {
        $this->veteransDiscountEnabled = (bool) $value;
        $this->calculateDiscounts();
    }

    public function setSelectedPromotion($id)
    {
        $this->selectedPromotion = $this->promotions->firstWhere('id', $id);
        $this->calculateDiscounts();
    }

    public function setDeposit($value)
    {
        $this->deposit = $this->currencyStringToNumber($value);
        $this->calculateDiscounts();
    }

    public function setAdditionalDiscounts($value)
    {
        $this->additionalDiscounts = $this->currencyStringToNumber($value);
        $this->calculateDiscounts();
    }

    public function setSelectedInterestRate($rate)
    {
        $this->selectedInterestRate = str_replace('%', '', $rate);
        $this->terms = $this->financingOptions->where('default_interest_rate', str_replace('%', '', $rate))->pluck('number_of_months')->values()->unique()->toArray();
        if(!in_array($this->selectedNumberOfMonths, $this->terms)){
            $this->selectedNumberOfMonths = $this->terms[0];
        }
        $this->setFinanceOption();
    }

    public function setSelectedNumberOfMonths($numberOfMonths)
    {
        if($numberOfMonths === 'reset'){
           return $this->resetOptions();
        }
        $this->selectedNumberOfMonths = $numberOfMonths;
        $this->rates = $this->financingOptions->where('number_of_months', $numberOfMonths)->pluck('default_interest_rate')->values()->unique()->toArray();
        if(!in_array($this->selectedInterestRate, $this->rates)){
            $this->selectedInterestRate = $this->rates[0];
        }
        $this->setFinanceOption();
    }

    protected function resetOptions()
    {
        $this->selectedInterestRate = 4.99;
        $this->selectedNumberOfMonths = 60;
        $this->rates = $this->financingOptions->pluck('default_interest_rate')->values()->unique()->toArray();
        $this->terms = $this->financingOptions->pluck('number_of_months')->values()->unique()->toArray();
        $this->setFinanceOption();
    }

    protected function setFinanceOption()
    {
        $options = $this->financingOptions->filter(function($option){
            return $option->default_interest_rate == $this->selectedInterestRate && $option->number_of_months == $this->selectedNumberOfMonths;
        });
        $this->financeOption = $options->first();
    }




}
