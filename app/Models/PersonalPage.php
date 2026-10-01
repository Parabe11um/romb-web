<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PersonalPage extends Model
{
    protected $fillable = [
        'name', 'headline', 'hero_description', 'hero_label', 'photo_path',
        'about_title', 'about_text', 'phone', 'telegram', 'email', 'skills',
        'experience', 'projects', 'contact_title', 'contact_text',
        'meta_title', 'meta_description', 'is_published',
    ];

    protected function casts(): array
    {
        return [
            'skills' => 'array',
            'experience' => 'array',
            'projects' => 'array',
            'is_published' => 'boolean',
        ];
    }

    public function visibleItems(string $field): array
    {
        return array_values(array_filter($this->getAttribute($field) ?? [],
            fn ($item) => is_array($item) && ($item['is_visible'] ?? true)));
    }

    public function photoUrl(): string
    {
        return $this->photo_path
            ? Storage::disk('public')->url($this->photo_path)
            : asset('images/roman-bazhenov.png');
    }

    public function phoneUrl(): ?string
    {
        $number = preg_replace('/[^0-9+]/', '', $this->phone ?? '');

        return preg_match('/^\+?[0-9]{7,15}$/', $number) ? 'tel:'.$number : null;
    }

    public function telegramUrl(): ?string
    {
        $handle = ltrim($this->telegram ?? '', '@');

        return preg_match('/^[A-Za-z0-9_]{5,32}$/', $handle) ? 'https://t.me/'.$handle : null;
    }

    public function emailUrl(): ?string
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) ? 'mailto:'.$this->email : null;
    }

    public static function webUrl(?string $url): ?string
    {
        return filter_var($url, FILTER_VALIDATE_URL)
            && in_array(strtolower(parse_url($url, PHP_URL_SCHEME) ?? ''), ['http', 'https'], true)
                ? $url : null;
    }
}
