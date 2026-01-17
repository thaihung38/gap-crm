<?php

namespace App\Domains\Base;

use App\SharedKernels\DTOs\Dto;
use App\SharedKernels\Exceptions\Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class Entity extends Model
{
    const ID = 'id';

    /**
     * Sub entities need to be saved with aggregate root as a unit of work
     *
     * @var Collection<int, Entity>
     */
    public Collection $savingEntities {
        get {
            if (empty($this->savingEntities)) $this->savingEntities = new Collection();

            return $this->savingEntities;
        }
    }

    /**
     * Sub entities need to be deleted
     *
     * @var Collection<int, Entity>
     */
    public Collection $deletingEntities {
        get {
            if (empty($this->deletingEntities)) $this->deletingEntities = new Collection();

            return $this->deletingEntities;
        }
    }

    protected function getValidator(): ?Validator
    {
        return null;
    }

    /**
     * @throws Exception
     */
    public function validate(): void
    {
        $this->getValidator()?->validate();
    }

    public function updateFromDto(Dto $dto): void
    {
        foreach ($dto->toArray() as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
