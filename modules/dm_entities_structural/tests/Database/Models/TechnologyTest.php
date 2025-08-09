<?php

if (!defined('PEST_RUNNING')) {
    return;
}

use App\Models\Technology;

beforeEach(function (): void {
    $this->createUsers();
    $this->model = Technology::factory()->create();
});

it('can be created', function (): void {
    expect($this->model)->toBeInstanceOf(Technology::class);
});

describe('Instance', function (): void {
    test('can get id', function (): void {
        expect($this->model->getId())
            ->toBeInt()
            ->toBe($this->model->id);
    });

    test('can get label', function (): void {
        expect($this->model->getLabel())
            ->toBeString()
            ->toBe($this->model->label);
    });

    test('can get description', function (): void {
        expect($this->model->getDescription())
            ->toBeString()
            ->toBe($this->model->description);
    });

    test('can get href', function (): void {
        expect($this->model->getHref())
            ->toBeString()
            ->toBe($this->model->href);
    });

    test('can get src', function (): void {
        expect($this->model->getSrc())
            ->toBeString()
            ->toBe($this->model->src);
    });

    test('can get category', function (): void {
        expect($this->model->getCategory())
            ->toBeString()
            ->toBe($this->model->category);
    });

    test('can get display', function (): void {
        expect($this->model->getDisplay())
            ->toBeBool()
            ->toBe($this->model->display);
    });

    test('can get created_at date', function (): void {
        expect($this->model->getCreatedAt())
            ->toBeString()
            ->toBe($this->model->created_at->toDateTimeString());
    });

    test('can get updated_at date', function (): void {
        expect($this->model->getUpdatedAt())
            ->toBeString()
            ->toBe($this->model->updated_at->toDateTimeString());
    });
});

describe('Scope', function (): void {
    test('can filter by id using scopeGetById', function (): void {
        $foundModel = Technology::getById($this->model->id)->first();

        expect($foundModel->id)->toBe($this->model->id);
    });

    test('can filter by answer using scopeGetByLabel', function (): void {
        $foundModel = Technology::getByLabel($this->model->label)->first();

        expect($foundModel->label)->toBe($this->model->label);
    });

    test('can filter by category using scopeGetByDescription', function (): void {
        $foundModel = Technology::getByDescription($this->model->description)->first();

        expect($foundModel->description)->toBe($this->model->description);
    });

    test('can filter by id using scopeGetByHref', function (): void {
        $foundModel = Technology::getByHref($this->model->href)->first();

        expect($foundModel->href)->toBe($this->model->href);
    });

    test('can filter by id using scopeGetBySrc', function (): void {
        $foundModel = Technology::getBySrc($this->model->src)->first();

        expect($foundModel->src)->toBe($this->model->src);
    });

    test('can filter by category using scopeGetByCategory', function (): void {
        $foundModel = Technology::getByCategory($this->model->category)->first();

        expect($foundModel->category)->toBe($this->model->category);
    });

    test('can filter by display using scopeGetByDisplay', function (): void {
        $foundModel = Technology::getByDisplay($this->model->display)->first();

        expect($foundModel->display)->toEqual($this->model->display);
    });

    test('can filter by created_at using scopeGetByCreatedAt', function (): void {
        $foundModel = Technology::getByCreatedAt($this->model->created_at->toDateString())->first();

        expect($foundModel->created_at->toDateString())->toBe($this->model->created_at->toDateString());
    });

    test('can filter by updated_at using scopeGetByUpdatedAt', function (): void {
        $foundModel = Technology::getByUpdatedAt($this->model->updated_at->toDateString())->first();

        expect($foundModel->updated_at->toDateString())->toBe($this->model->updated_at->toDateString());
    });
});
