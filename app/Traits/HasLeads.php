<?php

namespace App\Traits;

use App\Lead;
use App\Service;
use App\SalesDisposition;

trait HasLeads
{
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function leadsWithData()
    {
        return $this
            ->leads()
            ->with('installationStatus', 'processor', 'processorStatus', 'salesDisposition', 'service')
            ->orderBy('appointment_time');
    }

    public function showerBtLeads()
    {
        return $this->leads()->whereIn('service_id', [Service::SHOWERS, Service::BATHTUBS]);
    }

    public function walkInLeads()
    {
        return $this->leads()->where('service_id', Service::WALK_INS);
    }

    public function soldLeads()
    {
        return $this->leads()->where('sales_disposition_id', SalesDisposition::SALES);
    }

    public function soldShowerBtLeads()
    {
        return $this->leads()->where('sales_disposition_id', SalesDisposition::SALES)->whereIn('service_id', [Service::SHOWERS, Service::BATHTUBS]);
    }

    public function soldWalkInLeads()
    {
        return $this->leads()->where('sales_disposition_id', SalesDisposition::SALES)->where('service_id', Service::WALK_INS);
    }
}
