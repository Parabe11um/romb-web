<?php

namespace Database\Seeders;

use App\Models\PersonalPage;
use Illuminate\Database\Seeder;

class PersonalPageSeeder extends Seeder
{
    public function run(): void
    {
        // Repeated deployments must preserve changes made in the admin panel.
        PersonalPage::firstOrCreate(['id' => 1], [
            'name' => 'Роман Баженов',
            'headline' => 'Разработчик. Технический руководитель.',
            'hero_label' => 'Fullstack · Архитектура · Управление командой',
            'hero_description' => 'Создаю веб-продукты и помогаю им развиваться: от архитектуры и первого запуска до поддержки, интеграций и роста команды.',
            'about_title' => 'От задачи бизнеса — к работающему продукту',
            'about_text' => "Более 12 лет занимаюсь веб-разработкой. Работаю на стыке технологий и бизнеса: проектирую архитектуру, пишу код, выстраиваю процессы и руковожу командами.\n\nМой основной стек — PHP и Laravel. Разрабатываю интернет-магазины, корпоративные сайты и сервисы, интегрирую API, работаю с базами данных и инфраструктурой. Мне важно понимать задачу целиком и сопровождать продукт после запуска.",
            'phone' => '+7 (916) 972-97-19',
            'telegram' => '@rombweb',
            'email' => 'capri@inbox.ru',
            'skills' => [
                ['title' => 'Разработка', 'items' => ['PHP', 'Laravel', 'JavaScript', 'React', 'Python / Django'], 'is_visible' => true],
                ['title' => 'Архитектура и инфраструктура', 'items' => ['REST API', 'MySQL', 'PostgreSQL', 'Redis', 'Docker', 'Linux'], 'is_visible' => true],
                ['title' => 'Работа с продуктом', 'items' => ['Управление командой', 'Интеграции', 'Поддержка и развитие', 'Kanban'], 'is_visible' => true],
            ],
            'experience' => [
                [
                    'company' => 'Romb-web', 'role' => 'CEO / CTO', 'period' => '2017 — 2026',
                    'description' => 'Веб-разработка и техническое руководство проектами студии.',
                    'results' => "Проектирование и разработка сайтов, интернет-магазинов и сервисов.\nПоддержка, развитие и интеграции веб-проектов.", 'is_visible' => true,
                ],
                [
                    'company' => 'Sellerexpert', 'role' => 'CTO', 'period' => '2021 — 2023',
                    'description' => 'SaaS-сервис аналитики маркетплейсов Ozon и Wildberries.',
                    'results' => "Формирование и управление командой разработки.\nПроектирование IT-архитектуры продукта.\nРабота с PHP, Laravel, ClickHouse, PostgreSQL и интеграциями.", 'is_visible' => true,
                ],
                [
                    'company' => 'СК «Согласие»', 'role' => 'Lead развития и поддержки интернет-проектов', 'period' => '2017 — 2021',
                    'description' => 'Развитие цифровых сервисов страховой компании.',
                    'results' => "Редизайн и рефакторинг личных кабинетов физических и юридических лиц.\nРазвитие онлайн-калькуляторов страхования и сервиса заявления о страховом событии.\nОнлайн-оформление ОСАГО и регистрация страховых агентов.", 'is_visible' => true,
                ],
            ],
            'projects' => [
                ['title' => 'Chaochay', 'category' => 'Интернет-магазин', 'description' => 'Китайский чай и культура чаепития.', 'contribution' => 'Разработка, поддержка, развитие и продвижение.', 'url' => 'https://chaochay.ru', 'image' => null, 'status' => 'published', 'is_visible' => true],
                ['title' => 'Attribut', 'category' => 'Сайт производителя', 'description' => 'Двери, шкафы, кухни, стеновые панели и другие столярные изделия.', 'contribution' => 'Разработка сайта.', 'url' => 'https://attribut.ru', 'image' => null, 'status' => 'published', 'is_visible' => true],
                ['title' => 'Tile of Spain', 'category' => 'Корпоративный сайт', 'description' => 'Испанская керамическая плитка, архитектура, дизайн и производители керамических покрытий.', 'contribution' => 'Разработка сайта.', 'url' => null, 'image' => null, 'status' => 'published', 'is_visible' => true],
                ['title' => 'Checkyweb', 'category' => 'Веб-сервис', 'description' => 'Сервис мониторинга сайтов.', 'contribution' => 'Разработка собственного сервиса.', 'url' => 'https://checkyweb.ru', 'image' => null, 'status' => 'published', 'is_visible' => true],
                ['title' => 'Kidstime', 'category' => 'Веб-сервис', 'description' => 'Будущий сервис для прогулок с детьми.', 'contribution' => 'Развитие идеи и разработка продукта.', 'url' => null, 'image' => null, 'status' => 'development', 'is_visible' => true],
            ],
            'contact_title' => 'Давайте обсудим вашу задачу',
            'contact_text' => 'Нужна разработка, развитие сайта или техническое руководство проектом? Напишите мне — обсудим задачу и подход к работе.',
            'meta_title' => 'Роман Баженов — fullstack-разработчик и технический руководитель',
            'meta_description' => 'Веб-разработка, архитектура и управление IT-командой. Опыт Romb-web, Sellerexpert и СК «Согласие». Проекты и контакты Романа Баженова.',
            'is_published' => true,
        ]);
    }
}
