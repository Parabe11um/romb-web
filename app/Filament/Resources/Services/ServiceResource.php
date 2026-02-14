<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\Pages\CreateService;
use App\Filament\Resources\Services\Pages\EditService;
use App\Filament\Resources\Services\Pages\ListServices;
use App\Models\Service;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([

            Section::make('Основное')
                ->schema([
                    TextInput::make('title')
                        ->label('Название услуги')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(
                            fn ($state, callable $set) => $set('slug', Str::slug($state))
                        ),

                    TextInput::make('slug')
                        ->label('URL (slug)')
                        ->required()
                        ->unique(ignoreRecord: true),

                    FileUpload::make('image')
                        ->label('Изображение / иконка (для списка услуг)')
                        ->disk('public')
                        ->directory('services')
                        ->visibility('public')
                        ->image()
                        ->imageEditor(),

                    Textarea::make('excerpt')
                        ->label('Анонс услуги')
                        ->rows(3)
                        ->maxLength(255),

                    Toggle::make('is_active')
                        ->label('Активна')
                        ->default(true),
                ])
                ->columns(2),

            Section::make('Hero-блок на детальной странице')
                ->description('Поля опциональны. Если не заполнить заголовок — будет использован title услуги.')
                ->schema([
                    TextInput::make('hero_title')
                        ->label('Заголовок в hero')
                        ->maxLength(120),

                    Textarea::make('hero_subtitle')
                        ->label('Подзаголовок в hero')
                        ->rows(3)
                        ->maxLength(300),

                    FileUpload::make('hero_image')
                        ->label('Картинка в hero (баннер)')
                        ->disk('public')
                        ->directory('services/hero')
                        ->visibility('public')
                        ->image()
                        ->imageEditor(),
                ])
                ->columns(2)
                ->collapsed(),

            Section::make('Описание услуги')
                ->schema([
                    RichEditor::make('content')
                        ->label('Детальное описание (HTML)')
                        ->columnSpanFull(),
                ])
                ->collapsed(false),

            Section::make('Типовые решения')
                ->description('Например: лендинг, корпоративный сайт, интернет-магазин, сервис/CRM и т.д.')
                ->schema([
                    Repeater::make('solutions')
                        ->label('Список решений')
                        ->relationship() // Service::solutions()
                        ->schema([
                            TextInput::make('title')
                                ->label('Название')
                                ->required()
                                ->maxLength(120),

                            Textarea::make('description')
                                ->label('Короткое описание')
                                ->rows(3),

                            TextInput::make('position')
                                ->label('Сортировка')
                                ->numeric()
                                ->default(0),
                        ])
                        ->orderable('position')
                        ->defaultItems(0)
                        ->collapsed(),
                ])
                ->collapsed(),

            Section::make('Технологии')
                ->description('Стек/инструменты, которые релевантны именно этой услуге.')
                ->schema([
                    Repeater::make('technologies')
                        ->label('Список технологий')
                        ->relationship() // Service::technologies()
                        ->schema([
                            TextInput::make('name')
                                ->label('Название')
                                ->required()
                                ->maxLength(80),

                            TextInput::make('icon')
                                ->label('Иконка (опционально)')
                                ->helperText('Например: uil uil-brackets-curly или любое имя, которое ты будешь интерпретировать в шаблоне.')
                                ->maxLength(80),

                            TextInput::make('position')
                                ->label('Сортировка')
                                ->numeric()
                                ->default(0),
                        ])
                        ->orderable('position')
                        ->defaultItems(0)
                        ->collapsed(),
                ])
                ->collapsed(),

            Section::make('Процесс работы')
                ->description('Шаги процесса будут показаны в блоке “Как проходит работа”.')
                ->schema([
                    Repeater::make('steps')
                        ->label('Шаги')
                        ->relationship() // Service::steps()
                        ->schema([
                            TextInput::make('title')
                                ->label('Название шага')
                                ->required()
                                ->maxLength(120),

                            Textarea::make('description')
                                ->label('Описание')
                                ->rows(3),

                            TextInput::make('position')
                                ->label('Сортировка')
                                ->numeric()
                                ->default(0),
                        ])
                        ->orderable('position')
                        ->defaultItems(0)
                        ->collapsed(),
                ])
                ->collapsed(),

            Section::make('Проекты')
                ->schema([
                    Select::make('projects')
                        ->label('Проекты, относящиеся к услуге')
                        ->relationship('projects', 'title')
                        ->multiple()
                        ->searchable()
                        ->preload(),
                ])
                ->collapsed(),

            Section::make('SEO')
                ->schema([
                    TextInput::make('meta_title')
                        ->label('Meta title')
                        ->maxLength(70),

                    Textarea::make('meta_description')
                        ->label('Meta description')
                        ->rows(3)
                        ->maxLength(160),
                ])
                ->collapsed(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label('Slug'),

                IconColumn::make('is_active')
                    ->label('Активна')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Создана')
                    ->date(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            // можно оставить пустым, т.к. мы редактируем связанные записи через repeater relationship()
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListServices::route('/'),
            'create' => CreateService::route('/create'),
            'edit'   => EditService::route('/{record}/edit'),
        ];
    }
}
