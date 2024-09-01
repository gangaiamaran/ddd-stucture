<?php

namespace Domain\V1\Contact\Actions;

use Domain\V1\Contact\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class ContactUpdateAction
{
    protected string $id;

    protected array $data;

    protected Model $model;

    public function __construct(string $id, array $data)
    {
        $this->id = $id;
        $this->data = $data;
    }

    public static function initiate(string $id, array $data): self
    {
        return new self($id, $data);
    }

    public function execute(): self
    {
        $this->model = Contact::query()->findOrFail($this->id);
        $this->model->name = Arr::get($this->data, 'name');
        $this->model->email = Arr::get($this->data, 'email');
        $this->model->tag = Arr::get($this->data, 'tag');
        $this->model->save();

        return $this;
    }

    public function log(): self
    {
       //Audit log
        return $this;
    }

    public function emit(): self
    {
        ContactUpdatedEvent::dispatch();

        return $this;
    }

    public function complete(): Model
    {
        return $this->model;
    }
}
