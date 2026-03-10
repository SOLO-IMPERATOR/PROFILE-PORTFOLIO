<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryAbillityResource\Pages;
use App\Filament\Resources\CategoryAbillityResource\RelationManagers;
use App\Models\CategoryAbillity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;



class CategoryAbillityResource extends Resource
{
    protected static ?string $model = CategoryAbillity::class;

    protected static ?string $navigationGroup = "Навыки";

    protected static ?string $label = "Категории навыков";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function getPluralLabel(): ?string
    {
        return "Категории навыков";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Checkbox::make('is_active')
                ->label('Активность'),
                Forms\Components\TextInput::make('name')->required()->label('Название'),
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('class_icon')
                    ->helperText('Нужно подставить класс иконки Font Awesome 6')
                    ->requiredWithoutAll(['svg','image'])
                    ,
                    Forms\Components\TextInput::make('svg')
                    ->requiredWithoutAll(['image','class_icon']),
                    Forms\Components\FileUpload::make('image')
                    ->requiredWithoutAll(['svg','class_icon'])
                    ,
                ])
                ->heading('Иконка категории')
                ->collapsed(false)
                ->description('Необходимо заполнить только одно поле')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name')
                ->label('Название'),
                Tables\Columns\CheckboxColumn::make('is_active')
                ->label('Активность')
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
            'index' => Pages\ListCategoryAbillities::route('/'),
            'create' => Pages\CreateCategoryAbillity::route('/create'),
            'edit' => Pages\EditCategoryAbillity::route('/{record}/edit'),
        ];
    }
}
