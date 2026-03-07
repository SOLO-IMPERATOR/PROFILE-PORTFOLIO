<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbillityResource\Pages;
use App\Filament\Resources\AbillityResource\RelationManagers;
use App\Models\Abillity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use enshrined\svgSanitize\Sanitizer;
class AbillityResource extends Resource
{
    protected static ?string $model = Abillity::class;

    protected static ?string $navigationGroup = "Ability";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Название')
                ->required(),
                Forms\Components\TextInput::make('level')
                ->label('Уровень навыка')
                ->suffix('%')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(100)
                ->default(50),
                Forms\Components\Select::make('category_id')
                ->label('Категория')
                ->relationship('category', 'name')
                ->required()
                ->placeholder('Выберите категорию навыка')
                ->preload(),
                
                Forms\Components\Section::make('Иконка')->schema([
                    Forms\Components\TextInput::make('class_icon')
                    ->helperText('Нужно подставить класс иконки devicon')
                    ->requiredWithoutAll(['svg','image'])
                    ,
                    Forms\Components\TextInput::make('svg')
                    ->requiredWithoutAll(['image','class_icon'])
                    ->dehydrateStateUsing(fn($state) => ((new Sanitizer())->sanitize($state) ))
                    ,
                    Forms\Components\FileUpload::make('image')
                    ->requiredWithoutAll(['svg','class_icon'])
                    ,
                ])
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name')
                ->label('Название'),
                Tables\Columns\TextColumn::make('level')
                ->label('Уровень навыка'),
                Tables\Columns\TextColumn::make('category.name')
                ->label('Категория')
                
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
            'index' => Pages\ListAbillities::route('/'),
            'create' => Pages\CreateAbillity::route('/create'),
            'edit' => Pages\EditAbillity::route('/{record}/edit'),
        ];
    }
}
