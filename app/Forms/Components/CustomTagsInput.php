<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TagsInput;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class CustomTagsInput extends TagsInput
{
    protected string|Closure|null $relationship = null;
    protected string|Closure $relationshipColumn = 'name';

    protected function setUp(): void
    {
        parent::setUp();
        $this->configureRelationships();
    }

    protected function configureRelationships(): void
    {
        $this->loadStateFromRelationshipsUsing(static function (TagsInput $component, ?Model $record): void {
            if (!$component->checkRelationPresence($record, $component)) {
                return;
            }

            $relationship = $component->getRelationship();
            $relationshipColumn = $component->getRelationshipColumn();

            $record->loadMissing($relationship);

            $component->state(
                $record->{$relationship}()->select($relationshipColumn)->pluck($relationshipColumn)->all()
            );
        });

        $this->saveRelationshipsUsing(static function (TagsInput $component, ?Model $record, array $state) {
            if (!$component->checkRelationPresence($record, $component)) {
                return;
            }

            $relationship = $component->getRelationship();
            $relationshipColumn = $component->getRelationshipColumn();

            /** @var Model $related */
            $related = $record->{$relationship}()->getRelated();

            $tagIds = collect($state)
                ->map(fn($tag) => $related->newQuery()->firstOrCreate([$relationshipColumn => $tag]))
                ->pluck($related->getKeyName())
                ->all();

            $record->{$relationship}()->sync($tagIds);
        });

        $this->dehydrated(fn(TagsInput $component) => $component->getRelationship() === null);
    }

    public function relationship(string|Closure $column = 'name', string|Closure|null $relationship = null): static
    {
        $this->relationshipColumn = $column;

        $this->relationship = $relationship ?? Str::camel($this->name);

        return $this;
    }

    public function getSuggestions(): array
    {
        if ($this->checkRelationPresence($model = new ($this->getModel()), $this)) {
            return $model->{$this->getRelationship()}()
                ->getRelated()
                ->newQuery()
                ->select('name')
                ->orderBy('name')
                ->pluck('name')
                ->all();
        }

        $suggestions = $this->evaluate($this->suggestions ?? []);

        if ($suggestions instanceof Arrayable) {
            return $suggestions;
        }
    }

    public
    function getRelationship(): ?string
    {
        return $this->evaluate($this->relationship);
    }

    public
    function getRelationshipColumn(): string
    {
        return $this->evaluate($this->relationshipColumn);
    }

    protected function checkRelationPresence(Model $record, TagsInput $component): bool
    {
        $relationship = $component->getRelationship();

        // should we even be handling relationship?
        if ($relationship === null) {
            return false;
        }

        // make sure we have a relationship method
        if (! method_exists($record, $relationship)) {
            return false;
        }

        // and make sure it's a belongsToMany relationship
        if (! ($record->{$relationship}() instanceof BelongsToMany)) {
            return false;
        }

        return true;
    }
    // Bạn có thể thêm các phương thức tùy chỉnh ở đây
    public
    function customMethod(): static
    {
        // Thêm logic xử lý ở đây


        return $this;
    }
}