<?php

namespace App\Rules;

use Illuminatech\Validation\Composite\CompositeRule;

class PasswordRule extends CompositeRule
{
    protected function rules(): array
    {
        return ['string', 'min:6', 'max:20', 'alpha_num'];
    }

    public function message()
    {
        return '密码格式错误';
    }
}
