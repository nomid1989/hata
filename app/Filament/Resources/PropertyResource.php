<?php

namespace App\Filament\Resources;

use App\Enums\PropertyStatus;
use App\Enums\PropertyType;
use App\Enums\UserRole;
use App\Filament\Resources\PropertyResource\Pages;
use App\Models\Property;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $modelLabel = 'Об\'єкт';

    protected static ?string $pluralModelLabel = 'Об\'єкти';

    protected static ?string $navigationLabel = 'Об\'єкти';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make()->columnSpanFull()->tabs([
                Forms\Components\Tabs\Tab::make('Основне')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Назва')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Select::make('type')
                            ->label('Тип')
                            ->options(PropertyType::class)
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->label('Статус')
                            ->options(PropertyStatus::class)
                            ->default(PropertyStatus::Draft)
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->label('Опис')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Tabs\Tab::make('Локація')
                    ->icon('heroicon-o-map-pin')
                    ->schema([
                        Forms\Components\TextInput::make('city')->label('Місто')->required(),
                        Forms\Components\TextInput::make('district')->label('Район'),
                        Forms\Components\TextInput::make('address')->label('Адреса')->required()->columnSpanFull(),
                        Forms\Components\TextInput::make('latitude')->label('Широта')->numeric(),
                        Forms\Components\TextInput::make('longitude')->label('Довгота')->numeric(),
                    ])->columns(2),

                Forms\Components\Tabs\Tab::make('Параметри та ціна')
                    ->icon('heroicon-o-currency-dollar')
                    ->schema([
                        Forms\Components\TextInput::make('rooms')->label('Кімнат')->numeric()->minValue(0),
                        Forms\Components\TextInput::make('floor')->label('Поверх')->numeric()->minValue(0),
                        Forms\Components\TextInput::make('area_sqm')->label('Площа (м²)')->numeric(),
                        Forms\Components\TextInput::make('min_term_months')
                            ->label('Мін. термін (місяців)')
                            ->numeric()
                            ->default(3)
                            ->minValue(1),
                        Forms\Components\TextInput::make('monthly_rent_uah')
                            ->label('Орендна плата (грн/міс)')
                            ->numeric()
                            ->required()
                            ->minValue(0),
                        Forms\Components\TextInput::make('deposit_uah')
                            ->label('Завдаток (грн)')
                            ->numeric()
                            ->minValue(0),
                        Forms\Components\TagsInput::make('amenities')
                            ->label('Зручності')
                            ->placeholder('Wi-Fi, кондиціонер, паркінг...')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Tabs\Tab::make('Фото')
                    ->icon('heroicon-o-camera')
                    ->schema([
                        Forms\Components\FileUpload::make('photos')
                            ->label('Фотографії')
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('properties')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Tabs\Tab::make('Оцінка менеджера')
                    ->icon('heroicon-o-clipboard-document-check')
                    ->schema([
                        Forms\Components\Select::make('manager_id')
                            ->label('Менеджер, що оглянув')
                            ->options(fn () => User::query()
                                ->whereIn('role', [UserRole::Manager->value, UserRole::Owner->value, UserRole::Admin->value])
                                ->pluck('name', 'id'))
                            ->searchable(),
                        Forms\Components\DateTimePicker::make('accepted_at')
                            ->label('Прийнято'),
                        Forms\Components\TextInput::make('overall_score')
                            ->label('Загальна оцінка (1-10)')
                            ->numeric()->minValue(1)->maxValue(10),
                        Forms\Components\TextInput::make('real_score')
                            ->label('Реальна оцінка (1-10)')
                            ->numeric()->minValue(1)->maxValue(10)
                            ->helperText('Наскільки об\'єкт відповідає реальності фото/опису.'),
                        Forms\Components\TextInput::make('adequate_score')
                            ->label('Адекватна оцінка (1-10)')
                            ->numeric()->minValue(1)->maxValue(10)
                            ->helperText('Адекватність ціни ринку.'),
                        Forms\Components\Textarea::make('assessment_notes')
                            ->label('Нотатки оцінки')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photos')
                    ->label('')
                    ->disk('public')
                    ->getStateUsing(fn (Property $record) => $record->photos[0] ?? null)
                    ->square(),
                Tables\Columns\TextColumn::make('title')->label('Назва')->searchable()->limit(40),
                Tables\Columns\TextColumn::make('type')->label('Тип')->badge(),
                Tables\Columns\TextColumn::make('city')->label('Місто')->searchable(),
                Tables\Columns\TextColumn::make('rooms')->label('Кімнат')->alignCenter(),
                Tables\Columns\TextColumn::make('area_sqm')->label('м²')->alignCenter(),
                Tables\Columns\TextColumn::make('monthly_rent_uah')
                    ->label('Оренда/міс')
                    ->numeric(thousandsSeparator: ' ')
                    ->suffix(' грн')
                    ->sortable(),
                Tables\Columns\TextColumn::make('overall_score')->label('Заг.')->alignCenter(),
                Tables\Columns\TextColumn::make('status')->label('Статус')->badge(),
                Tables\Columns\TextColumn::make('updated_at')->label('Оновлено')->since()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')->label('Тип')->options(PropertyType::class),
                Tables\Filters\SelectFilter::make('status')->label('Статус')->options(PropertyStatus::class),
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
            ->defaultSort('updated_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'view' => Pages\ViewProperty::route('/{record}'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
