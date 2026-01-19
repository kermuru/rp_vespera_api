<?php

namespace App\Domain\AutomationDashboard\DTO;

class LeadsSummaryDTO
{
    public function __construct(
        public int $Intake,
        public int $Qualified,
        public int $Schedule,
        public int $Closing,
        public int $Dormant,
        public int $Lost,
        public int $Unqualified,
        public int $Conversion_rate,
    ) {}
}