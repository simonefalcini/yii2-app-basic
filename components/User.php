<?php

namespace app\components;

use Yii;

class User extends \yii\web\User
{
    /**
     * Returns the User model to avoid intelephense errors
     *
     * @return app\models\User
     */
    public function getModel()
    {
        return $this->identity;
    }
}
