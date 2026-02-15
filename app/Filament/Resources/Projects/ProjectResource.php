<?php

namespace App\Filament\Resources\Projects;

use App\Filament\Resources\Projects\Pages\CreateProject;
use App\Filament\Resources\Projects\Pages\EditProject;
use App\Filament\Resources\Projects\Pages\ListProjects;
use App\Filament\Resources\Projects\Schemas\ProjectForm;
use App\Filament\Resources\Projects\Tables\ProjectsTable;
use App\Models\Project;
use Filament\Forms\Components\Repeater;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;


class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('title')
                ->label('Название проекта')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, $set) =>
                $set('slug', Str::slug($state))
                ),

            TextInput::make('slug')
                ->label('URL (slug)')
                ->required()
                ->unique(ignoreRecord: true),

            FileUpload::make('preview_image')
                ->label('Превью проекта')
                ->disk('public')
                ->directory('projects/preview')
                ->image(),

            FileUpload::make('detail_image')
                ->label('Детальное изображение')
                ->disk('public')
                ->directory('projects/detail')
                ->visibility('public')
                ->image()
                ->imageEditor(),

            Textarea::make('excerpt')
                ->label('Анонс проекта')
                ->rows(3),

            RichEditor::make('content')
                ->label('Детальное описание')
                ->columnSpanFull(),

            Select::make('services')
                ->label('Связанные услуги')
                ->relationship('services', 'title')
                ->multiple()
                ->preload(),

            Toggle::make('is_active')
                ->label('Активен')
                ->default(true),

            Section::make('Галерея проекта')
                ->schema([
                    Repeater::make('images')
                        ->relationship()
                        ->schema([
                            FileUpload::make('image')
                                ->label('Изображение')
                                ->image()
                                ->disk('public')
                                ->directory('projects/gallery')
                                ->required(),

                            TextInput::make('caption')
                                ->label('Подпись'),

                            TextInput::make('position')
                                ->label('Позиция')
                                ->numeric()
                                ->default(0),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string =>
                            $state['caption'] ?? 'Изображение'
                        )
                        ->reorderable()
                        ->columnSpanFull(),
                ])
                ->collapsed(),


            Section::make('SEO')
                ->schema([
                    TextInput::make('meta_title')
                        ->label('Meta title')
                        ->maxLength(70)
                        ->helperText('Рекомендуемо до 60–70 символов'),

                    Textarea::make('meta_description')
                        ->label('Meta description')
                        ->rows(3)
                        ->maxLength(160)
                        ->helperText('Рекомендуемо до 150–160 символов'),
                ])
                ->collapsed(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                IconColumn::make('is_active')->boolean(),
                TextColumn::make('created_at')->date(),
            ])
            ->defaultSort('created_at', 'desc');
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjects::route('/'),
            'create' => CreateProject::route('/create'),
            'edit' => EditProject::route('/{record}/edit'),
        ];
    }
}
