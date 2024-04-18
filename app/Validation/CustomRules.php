<?php

namespace App\Validation;

use CodeIgniter\Validation\Validation;
use CodeIgniter\Validation\Exceptions\ValidationException;

class CustomRules
{
    public function positiveNumber(int $donasi): bool
    {
        if ($donasi > 0 && $donasi >= 1000) {
            return true;
        }

        return false;
    }
}
