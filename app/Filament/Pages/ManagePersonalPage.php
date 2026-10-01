<?php

namespace App\Filament\Pages;

use App\Models\PersonalPage;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ManagePersonalPage extends Page
{
    protected static ?string $title = 'Личный сайт';

    protected static ?string $navigationLabel = 'Личный сайт';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $slug = 'personal-page';

    protected string $view = 'filament.pages.manage-personal-page';

    public ?array $data = [];

    public static function canAccess(): bool
    {
        return strcasecmp(request()->getHost(), config('personal.domain')) !== 0
            && (auth()->user()?->canAccessPanel(Filament::getPanel('admin')) ?? false);
    }

    public function mount(): void
    {
        abort_unless(static::canAccess(), 403);
        $page = PersonalPage::firstOrCreate(['id' => 1]);
        $this->form->fill($page->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema->statePath('data')->model(PersonalPage::class)->components([
            Section::make('Публикация и главный экран')->description('Изменения появляются на сайте сразу после сохранения.')->schema([
                Toggle::make('is_published')->label('Страница опубликована'),
                TextInput::make('name')->label('Имя')->required()->maxLength(120),
                TextInput::make('headline')->label('Заголовок / специализация')->required()->maxLength(180),
                TextInput::make('hero_label')->label('Строка над заголовком')->maxLength(180),
                Textarea::make('hero_description')->label('Краткое описание')->required()->maxLength(1000)->rows(3),
                $this->imageUpload('photo_path', 'Фото', 'personal/profile')
                    ->helperText('Если фото не загружено, используется портрет из резюме. Рекомендуется квадратное фото.'),
            ])->columns(2),
            Section::make('Обо мне и навыки')->schema([
                TextInput::make('about_title')->label('Заголовок')->required()->maxLength(180),
                Textarea::make('about_text')->label('Текст')->required()->maxLength(6000)->rows(6),
                Repeater::make('skills')->label('Группы навыков')->schema([
                    TextInput::make('title')->label('Название')->required()->maxLength(100),
                    TagsInput::make('items')->label('Навыки')->required()->nestedRecursiveRules(['string', 'max:60']),
                    Toggle::make('is_visible')->label('Показывать')->default(true),
                ])->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                    ->reorderableWithButtons()->collapsible()->maxItems(12)->addActionLabel('Добавить группу'),
            ]),
            Section::make('Опыт и достижения')->schema([
                Repeater::make('experience')->label('Места работы')->schema([
                    TextInput::make('company')->label('Компания')->required()->maxLength(120),
                    TextInput::make('role')->label('Должность')->required()->maxLength(180),
                    TextInput::make('period')->label('Период')->required()->maxLength(80),
                    Textarea::make('description')->label('Краткое описание')->maxLength(1000)->rows(2),
                    Textarea::make('results')->label('Основные задачи и достижения')->maxLength(4000)->rows(4)
                        ->helperText('Каждый пункт с новой строки.'),
                    Toggle::make('is_visible')->label('Показывать')->default(true),
                ])->itemLabel(fn (array $state): ?string => $state['company'] ?? null)
                    ->reorderableWithButtons()->collapsible()->maxItems(20)->addActionLabel('Добавить место работы'),
            ]),
            Section::make('Проекты')->schema([
                Repeater::make('projects')->label('Список проектов')->schema([
                    TextInput::make('title')->label('Название')->required()->maxLength(120),
                    TextInput::make('category')->label('Категория')->required()->maxLength(100),
                    Textarea::make('description')->label('Описание проекта')->required()->maxLength(1500)->rows(3),
                    Textarea::make('contribution')->label('Моя роль')->maxLength(1000)->rows(2),
                    TextInput::make('url')->label('Адрес сайта')->rules(['nullable', 'url:http,https'])->maxLength(1000)
                        ->helperText('Полный адрес с https://. Можно оставить пустым.'),
                    $this->imageUpload('image', 'Обложка', 'personal/projects')
                        ->helperText('Необязательно. Без обложки используется абстрактная иллюстрация.'),
                    Select::make('status')->label('Статус')->options([
                        'published' => 'Работающий проект', 'development' => 'В разработке',
                    ])->default('published')->required()->rules(['in:published,development']),
                    Toggle::make('is_visible')->label('Показывать')->default(true),
                ])->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                    ->reorderableWithButtons()->collapsible()->maxItems(30)->addActionLabel('Добавить проект'),
            ]),
            Section::make('Контакты')->schema([
                TextInput::make('phone')->label('Телефон')->tel()->telRegex('/^\+?[0-9 ()\-]{7,40}$/')->maxLength(40)
                    ->rules(['nullable', 'regex:/^\+?[0-9 ()\-]{7,40}$/']),
                TextInput::make('telegram')->label('Telegram')->maxLength(33)
                    ->rules(['nullable', 'regex:/^@?[A-Za-z0-9_]{5,32}$/'])->helperText('Имя пользователя, например @rombweb.'),
                TextInput::make('email')->label('Почта')->email()->maxLength(254),
                TextInput::make('contact_title')->label('Заголовок контактного блока')->required()->maxLength(180),
                Textarea::make('contact_text')->label('Текст контактного блока')->maxLength(1500)->rows(3),
            ]),
            Section::make('SEO')->schema([
                TextInput::make('meta_title')->label('Заголовок страницы')->maxLength(180),
                Textarea::make('meta_description')->label('Описание для поисковых систем')->maxLength(500)->rows(3),
            ])->collapsed(),
        ]);
    }

    private function imageUpload(string $name, string $label, string $directory): FileUpload
    {
        return FileUpload::make($name)->label($label)->image()->disk('public')->directory($directory)
            ->visibility('public')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])->maxSize(4096);
    }

    public function save(): void
    {
        // Re-check authorization on every Livewire mutation, not just the initial page load.
        abort_unless(static::canAccess(), 403);
        $state = $this->form->getState();
        PersonalPage::findOrFail(1)->fill($state)->save();
        Notification::make()->title('Личный сайт сохранён')->success()->send();
    }

    protected function getHeaderActions(): array
    {
        return [Action::make('view')->label('Открыть сайт')->url(route('personal.home'))->openUrlInNewTab()];
    }
}
