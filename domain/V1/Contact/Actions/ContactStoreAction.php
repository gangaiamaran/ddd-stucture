<?php

namespace Domain\V1\Contact\Actions;

use Domain\V1\Contact\Events\ContactStoredEvent;
use Domain\V1\Contact\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ContactStoreAction
{
    protected array $data;

    protected Model $model;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public static function initiate(array $data): self
    {
        return new self($data);
    }

    public function execute(): self
    {
        $this->model = new Contact();
        $this->model->name = Arr::get($this->data, 'name');
        $this->model->email = Arr::get($this->data, 'email');
        $this->model->tag = Arr::get($this->data, 'tag');
        $this->model->save();

        return $this;
    }

    public function log(): self
    {
        // Audit log
        return $this;
    }

    public function emit(): self
    {
        ContactStoredEvent::dispatch();

        return $this;
    }

    public function complete(): Model
    {
        return $this->model;
    }
}
