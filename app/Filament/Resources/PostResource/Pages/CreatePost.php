<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\CreateAction;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

}
