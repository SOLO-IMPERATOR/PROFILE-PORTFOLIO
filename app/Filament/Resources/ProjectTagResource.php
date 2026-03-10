<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectTagResource\Pages;
use App\Filament\Resources\ProjectTagResource\RelationManagers;
use App\Models\ProjectTag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectTagResource extends Resource
{
    protected static ?string $model = ProjectTag::class;

    protected static ?string $navigationGroup = "Проекты";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->label('Имя тега')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->sortable()
                ->label('Тег')
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
            'index' => Pages\ListProjectTags::route('/'),
            'create' => Pages\CreateProjectTag::route('/create'),
            'edit' => Pages\EditProjectTag::route('/{record}/edit'),
        ];
    }
}
