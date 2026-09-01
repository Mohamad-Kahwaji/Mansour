<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Support\CompressedMediaUpload;
use App\Models\Firestopping;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
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
class ManageFirestopping extends Page
{
    protected string $view = 'filament.admin.pages.manage-firestopping';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFire;

    protected static ?string $navigationLabel = 'قسم الفايرستوبينغ';

    protected static ?string $title = 'قسم الفايرستوبينغ';

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $record = $this->getRecord();

        $data = $record?->attributesToArray() ?? [];

        if ($record) {
            $data['heading'] = $record->getTranslations('heading');
            $data['description'] = $record->getTranslations('description');
        }

        $this->form->fill($data);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    Section::make('العنوان')
                        ->icon(Heroicon::OutlinedTag)
                        ->columns(2)
                        ->schema([
                            TextInput::make('heading.ar')
                                ->label('العنوان (عربي)')
                                ->required(),
                            TextInput::make('heading.en')
                                ->label('Heading (English)')
                                ->required(),
                        ]),
                    Section::make('الوصف')
                        ->icon(Heroicon::OutlinedDocumentText)
                        ->columns(2)
                        ->schema([
                            Textarea::make('description.ar')
                                ->label('الوصف (عربي)')
                                ->required(),
                            Textarea::make('description.en')
                                ->label('Description (English)')
                                ->required(),
                        ]),
                    Section::make('شارات الاعتماد')
                        ->icon(Heroicon::OutlinedShieldCheck)
                        ->description('أضف شارة لكل جهة اعتماد (STI، أو أي جهة أخرى)')
                        ->schema([
                            Repeater::make('badges')
                                ->label('')
                                ->addActionLabel('إضافة شارة اعتماد')
                                ->schema([
                                    TextInput::make('title')
                                        ->label('عنوان الشارة (مثال: STI Accredited Applicator)')
                                        ->required(),
                                    TextInput::make('subtitle_ar')
                                        ->label('نص الشارة (عربي)'),
                                    TextInput::make('subtitle_en')
                                        ->label('Badge subtitle (English)'),
                                ])
                                ->columns(1)
                                ->columnSpanFull()
                                ->collapsible()
                                ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                        ]),
                    Section::make('صور القسم')
                        ->icon(Heroicon::OutlinedPhoto)
                        ->description('أول 4 صور رح تبين بالموقع العام، وباقي الصور رح تنعرض بعلامة "+" على الصورة الرابعة')
                        ->columnSpanFull()
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('visual')
                                ->label('صور القسم')
                                ->collection('visual')
                                ->image()
                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                ->maxSize(10240)
                                ->maxParallelUploads(1)
                                ->helperText('الحد الأقصى للصورة 10MB. يتم ضغط الصورة تلقائيًا وتحويلها إلى WebP.')
                                ->multiple()
                                ->reorderable()
                                ->saveUploadedFileUsing(CompressedMediaUpload::handler('firestopping'))
                                ->columnSpanFull(),
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

        $record = $this->getRecord() ?? new Firestopping;

        $record->fill($data);
        $record->save();

        Notification::make()
            ->success()
            ->title('تم الحفظ')
            ->send();
    }

    public function getRecord(): ?Firestopping
    {
        return Firestopping::query()->first();
    }
}
