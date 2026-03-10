<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationGroup = "Проекты";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->label('Название'),
                Forms\Components\RichEditor::make('description')
                ->label('Описание')
                ->required(),
                
                Forms\Components\Select::make('category_id')
                ->label('Категория')
                ->required()
                ->preload()
                ->relationship('category','name')
                ->placeholder('Выберите категорию')
                ->createOptionForm([
                    Forms\Components\TextInput::make('name')->required()->label('Название')
                ]),

                Forms\Components\ColorPicker::make('background')
                ->required()
                ->label('Цвет фона'),

                Forms\Components\TextInput::make('class-icon')
                ->label('Иконка')
                ->helperText('Класс font-awesome 6'),

                Forms\Components\TextInput::make('url')
                ->placeholder('https://')
                ->label('Ссылка на проект')->nullable(),

                Forms\Components\FileUpload::make('gallery')
                ->label('Галерея проекта')
                ->image()
                ->multiple()
                ->reorderable()
                ->appendFiles()
                ->directory('projects/gallery')
                ->imageEditor()
                ->columnSpanFull(),

                Forms\Components\Select::make('tags')
                ->relationship(
                    'tags',
                    'name'
                )
                ->multiple()
                ->preload()
                ->searchable()
                ->createOptionForm([
                    Forms\Components\TextInput::make('name')->required()->label('Название тега')
                ])
            ]
        );
    }

                
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
