<?php

namespace App\Filament\Admin\Pages;

use App\Models\Site_settings;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
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
            $data['established_location'] = $record->getTranslations('established_location');
        }

        $this->form->fill($data);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    Section::make('الهوية الأساسية')
                        ->description('اسم الموقع والشعار النصي كما يظهران للزوار')
                        ->icon(Heroicon::OutlinedIdentification)
                        ->columns(2)
                        ->schema([
                            TextInput::make('site_name.ar')
                                ->label('اسم الموقع (عربي)')
                                ->required(),
                            TextInput::make('site_name.en')
                                ->label('Site name (English)')
                                ->required(),
                            TextInput::make('tagline.ar')
                                ->label('الشعار النصي (عربي)'),
                            TextInput::make('tagline.en')
                                ->label('Tagline (English)'),
                        ]),
                    Section::make('نبذة عن الشركة')
                        ->description('فقرة تعريفية قصيرة تظهر بالصفحة الرئيسية')
                        ->icon(Heroicon::OutlinedDocumentText)
                        ->columns(2)
                        ->schema([
                            Textarea::make('about.ar')
                                ->label('نبذة (عربي)')
                                ->rows(4),
                            Textarea::make('about.en')
                                ->label('About (English)')
                                ->rows(4),
                        ]),
                    Section::make('معلومات التأسيس')
                        ->description('تظهر بقسم Hero بالصفحة الرئيسية (مثال: Riyadh · 2005)')
                        ->icon(Heroicon::OutlinedCalendar)
                        ->columns(2)
                        ->schema([
                            TextInput::make('established_location.ar')
                                ->label('مكان التأسيس (عربي)'),
                            TextInput::make('established_location.en')
                                ->label('Establishment location (English)'),
                            TextInput::make('established_year')
                                ->label('سنة التأسيس')
                                ->numeric()
                                ->minValue(1900)
                                ->maxValue((int) date('Y')),
                        ]),
                    Section::make('العنوان والموقع')
                        ->icon(Heroicon::OutlinedMapPin)
                        ->columns(2)
                        ->schema([
                            TextInput::make('address.ar')
                                ->label('العنوان (عربي)'),
                            TextInput::make('address.en')
                                ->label('Address (English)'),
                            TextInput::make('google_map_url')
                                ->label('رابط خرائط جوجل')
                                ->url()
                                ->columnSpanFull(),
                        ]),
                    Section::make('الشعار (اللوجو)')
                        ->icon(Heroicon::OutlinedPhoto)
                        ->schema([
                            FileUpload::make('logo')
                                ->label('شعار الموقع (لوجو)')
                                ->image()
                                ->disk('public')
                                ->directory('site')
                                ->columnSpanFull(),
                        ]),
                    Section::make('معلومات التواصل')
                        ->icon(Heroicon::OutlinedPhone)
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
                    Section::make('روابط التواصل الاجتماعي')
                        ->icon(Heroicon::OutlinedShare)
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

        $record = $this->getRecord() ?? new Site_settings;

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
