<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Collection;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("name")->required(),
                TextInput::make("designation")->required(),
                TextInput::make("fb_url")->url()->label("Facebook Url"),
                TextInput::make("tw_url")->url()->label("Twitter Url"),
                TextInput::make("in_url")->url()->label("Linkedin Url"),
                Select::make("status")->options([
                    1 => "Active",
                    0 => "Block"
                ]),
                FileUpload::make("image")->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->disk('public')->visibility('public')->label('Image')->height(30)
                    ->defaultImageUrl(''),
                TextColumn::make("name")->sortable(),
                TextColumn::make("designation"),
                TextColumn::make("fb_url")->label("Facebook"),
                TextColumn::make("tw_url")->label("Twitter"),
                TextColumn::make("in_url")->label("Linkedin"),
                ToggleColumn::make('status')
                    ->label('Status')
                    ->onIcon('heroicon-o-check-circle')
                    ->offIcon('heroicon-o-x-circle')
                    ->onColor('success')
                    ->offColor('danger')
                    ->beforeStateUpdated(function ($record, $state) {
                        // Optional: Custom logic before update
                    })
                    ->afterStateUpdated(function ($record, $state) {
                        // Optional: Custom logic after update
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('toggleStatus')
                        ->label('Toggle Status')
                        ->action(function (Collection $records) {
                            foreach ($records as $record) {
                                $record->update([
                                    'status' => $record->status ? 0 : 1,
                                ]);
                            }
                        })
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion()
                        ->icon('heroicon-o-arrows-right-left')
                        ->color('warning'),

                    // Optional: Add more actions to the dropdown
                    BulkAction::make('setActive')
                        ->label('Set Active')
                        ->action(fn(Collection $records) => $records->each->update(['status' => 1]))
                        ->icon('heroicon-o-check-circle')
                        ->color('success'),

                    BulkAction::make('setBlocked')
                        ->label('Set Blocked')
                        ->action(fn(Collection $records) => $records->each->update(['status' => 0]))
                        ->icon('heroicon-o-no-symbol')
                        ->color('danger'),
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
