<?php

namespace App\Filament\Admin\Pages\Auth;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Schemas\Components\Component;

class EditProfile extends BaseEditProfile
{
    protected function getCurrentPasswordFormComponent(): Component
    {
        return parent::getCurrentPasswordFormComponent()
            ->visible(true);
    }
}
