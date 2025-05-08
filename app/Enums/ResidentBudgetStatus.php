<?php

namespace App\Enums;

enum ResidentBudgetStatus: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Suspended = 'suspended';
}
