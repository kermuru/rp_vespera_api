<?php

namespace App\Domain\AutomationDashboard\DTO;

class UpdateConversationDTO
{
    public function __construct(
        public ?int $customer_psid,
        public ?string $last_message,
    ) {}
}