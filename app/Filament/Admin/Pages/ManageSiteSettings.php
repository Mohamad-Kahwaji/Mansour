<?php

namespace App\Filament\Admin\Pages;

use App\Models\Site_settings;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

/**
 * @property-read Schema $form
 */
class ManageSiteSettings extends Page
{
    protected string $view = 'filament.admin.pages.manage-site-settings';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'إعدادات الموقع';

    protected static ?string $title = 'إعدادات الموقع';

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $record = $this->getRecord();

        $data = $record?->attributesToArray() ?? [];

        if ($record) {
            $data['site_name'] = $record->getTranslations('site_name');
            $data['tagline'] = $record->getTranslations('tagline');
            $data['about'] = $record->getTranslations('about');
            $data['address'] = $record->getTranslations('address');
        }

        $this->form->fill($data);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    Fieldset::make('اسم الموقع')
                        ->columns(2)
                        ->schema([
                            TextInput::make('site_name.ar')
                                ->label('اسم الموقع (عربي)')
                                ->required(),
                            TextInput::make('site_name.en')
                                ->label('Site name (English)')
                                ->required(),
                        ]),
                    Fieldset::make('الشعار النصي')
                        ->columns(2)
                        ->schema([
                            TextInput::make('tagline.ar')
                                ->label('الشعار النصي (عربي)'),
                            TextInput::make('tagline.en')
                                ->label('Tagline (English)'),
                        ]),
                    Fieldset::make('نبذة عن الشركة')
                        ->columns(2)
                        ->schema([
                            Textarea::make('about.ar')
                                ->label('نبذة (عربي)'),
                            Textarea::make('about.en')
                                ->label('About (English)'),
                        ]),
                    Fieldset::make('العنوان')
                        ->columns(2)
                        ->schema([
                            TextInput::make('address.ar')
                                ->label('العنوان (عربي)'),
                            TextInput::make('address.en')
                                ->label('Address (English)'),
                        ]),
                    FileUpload::make('logo')
                        ->label('شعار الموقع (لوجو)')
                        ->image()
                        ->directory('site')
                        ->columnSpanFull(),
                    Fieldset::make('التواصل')
                        ->columns(3)
                        ->schema([
                            TextInput::make('phone')
                                ->label('الهاتف')
                                ->tel(),
                            TextInput::make('whatsapp')
                                ->label('واتساب')
                                ->tel(),
                            TextInput::make('email')
                                ->label('البريد الإلكتروني')
                                ->email(),
                        ]),
                    Fieldset::make('روابط التواصل الاجتماعي')
                        ->columns(2)
                        ->schema([
                            TextInput::make('facebook_url')
                                ->label('فيسبوك')
                                ->url(),
                            TextInput::make('instagram_url')
                                ->label('انستغرام')
                                ->url(),
                            TextInput::make('linkedin_url')
                                ->label('لينكدإن')
                                ->url(),
                            TextInput::make('x_url')
                                ->label('X (تويتر)')
                                ->url(),
                        ]),
                    TextInput::make('google_map_url')
                        ->label('رابط خرائط جوجل')
                        ->url()
                        ->columnSpanFull(),
                ])
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make([
                            Action::make('save')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ])
            ->record($this->getRecord())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $record = $this->getRecord() ?? new Site_settings();

        $record->fill($data);
        $record->save();

        Notification::make()
            ->success()
            ->title('تم الحفظ')
            ->send();
    }

    public function getRecord(): ?Site_settings
    {
        return Site_settings::query()->first();
    }
}
