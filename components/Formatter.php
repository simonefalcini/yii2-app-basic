<?php

namespace app\components;

use Yii;

class Formatter extends \yii\i18n\Formatter
{
    public function asKg($value, $decimals = 2)
    {
        return $this->asDecimal($value, $decimals) . ' Kg';
    }
}
