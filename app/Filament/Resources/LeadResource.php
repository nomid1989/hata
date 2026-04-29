<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadResource\Pages;
use App\Models\Lead;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $modelLabel = 'Заявка';

    protected static ?string $pluralModelLabel = 'Заявки';

    protected static ?string $navigationLabel = 'Заявки';

    protected static ?int $navigationSort = -1;

    public static function getNavigationBadge(): ?string
    {
        return Lead::where('status', 'new')->count() ?: null;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->label('Ім\'я')->required(),
            Forms\Components\TextInput::make('contact')->label('Контакт')->required(),
            Forms\Components\Textarea::make('message')->label('Повідомлення')->rows(4)->columnSpanFull(),
            Forms\Components\Select::make('status')
                ->label('Статус')
                ->options([
                    'new' => 'Нова',
                    'contacted' => 'Зв\'язались',
                    'closed' => 'Закрита',
                ])
                ->default('new')
                ->required(),
            Forms\Components\TextInput::make('source')->label('Джерело')->disabled(),
            Forms\Components\Textarea::make('notes')->label('Внутрішні нотатки')->rows(3)->columnSpanFull(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')->label('Створено')->since()->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Ім\'я')->searchable(),
                Tables\Columns\TextColumn::make('contact')->label('Контакт')->searchable()->copyable(),
                Tables\Columns\TextColumn::make('message')->label('Повідомлення')->limit(60),
                Tables\Columns\TextColumn::make('status')->label('Статус')->badge()->colors([
                    'warning' => 'new',
                    'info' => 'contacted',
                    'success' => 'closed',
                ]),
                Tables\Columns\TextColumn::make('source')->label('Джерело')->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->label('Статус')->options([
                    'new' => 'Нова',
                    'contacted' => 'Зв\'язались',
                    'closed' => 'Закрита',
                ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLead::route('/create'),
            'view' => Pages\ViewLead::route('/{record}'),
            'edit' => Pages\EditLead::route('/{record}/edit'),
        ];
    }
}
