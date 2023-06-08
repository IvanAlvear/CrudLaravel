<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\ComputerResource\Pages;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\ComputerResource\RelationManagers;
use App\Models\Computer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComputerResource extends Resource
{
    protected static ?string $model = Computer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre'),
                TextInput::make('marca'),
                TextInput::make('cantidad'),
                TextInput::make('precio')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')->sortable()->searchable(),
                TextColumn::make('marca')->sortable()->searchable(),
                TextColumn::make('cantidad')->sortable()->searchable(),
                TextColumn::make('precio')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListComputers::route('/'),
            'create' => Pages\CreateComputer::route('/create'),
            'edit' => Pages\EditComputer::route('/{record}/edit'),
        ];
    }    
}
