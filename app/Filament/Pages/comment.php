<?php

namespace App\Filament\Pages;

use App\Models\Comment as ModelsComment;
use Filament\Pages\Page;

class comment extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static string $view = 'filament.pages.comment';

    public $comment;

    public function mount(): void
    {
        $this->comment = ModelsComment::with(['post', 'user'])->get();
    }
}
