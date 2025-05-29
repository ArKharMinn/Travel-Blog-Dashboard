<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Category;
use App\Models\Post;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->directory('post/images')
                            ->disk('public')
                            ->imageEditor()
                            ->imageResizeTargetWidth(800)
                            ->imageResizeTargetHeight(500)
                            ->maxSize(2048)
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->required()
                            ->maxLength(120),

                        Select::make('category_id')
                            ->label('Category')
                            ->options(fn() => Category::pluck('name', 'id'))
                            ->required()
                            ->searchable(),

                        Textarea::make('content')
                            ->required()
                            ->columnSpanFull()
                            ->rows(5),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),

                TextColumn::make('content')
                    ->limit(20)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created Date')
                    ->date('d-F-y')
                    ->searchable()
                    ->sortable()
            ])
            ->filters([
                SelectFilter::make('category_id')

                    ->label('Category')
                    ->options(fn() => Category::pluck('name', 'id'))
                    ->searchable()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
