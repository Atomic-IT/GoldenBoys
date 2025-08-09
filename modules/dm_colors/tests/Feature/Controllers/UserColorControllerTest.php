<?php

if (!defined('PEST_RUNNING')) {
    return;
}

uses()->group('user-color-controller');

use App\Http\Controllers\UserColorController;
use App\Http\Requests\UserColor\PostRequest;
use App\Http\Requests\UserColor\PutRequest;
use App\Models\UserColor;
use App\Services\UserColorService;
use Illuminate\Http\Request;

beforeEach(function (): void {
    $this->createUsers();
    $this->actingAs($this->admin);
    $this->controller = app()->makeWith(UserColorController::class, ['userColorService' => app()->make(UserColorService::class)]);
});

test('index > success', function (): void {
    UserColor::factory()->count(3)->create();

    $request = new Request;

    $response = $this->controller->index($request);

    expect($response->getStatusCode())->toEqual(200);
    expect($response->getData(true));
});

test('countByCreatedLastWeek > success', function (): void {
    $request = new Request;

    $response = $this->controller->countByCreatedLastWeek($request);

    expect($response->getStatusCode())->toEqual(200);
});

test('getByName > success', function (): void {
    $names = ['other', 'science', 'article'];

    foreach ($names as $name) {
        UserColor::factory()->create(['name' => $name]);
    }

    $response = $this->controller->getByName($name);
    $data = $response->getData(true);

    expect($response->getStatusCode())->toEqual(200);

    foreach ($data as $userColor) {
        expect($userColor['name'])->toEqual($name);
    }

    expect(count($data))->toEqual(UserColor::where('name', $name)->count());
});

test('show > success', function (): void {
    $color = UserColor::factory()->create();

    $response = $this->controller->show($color->id);

    expect($response->getStatusCode())->toEqual(200);
    expect($response->getData(true));
});

test('store > success', function (): void {
    $request = Mockery::mock(PostRequest::class);
    $request->shouldReceive('validated')
        ->andReturn(userColorData);

    $response = $this->controller->store($request);

    expect($response->getStatusCode())->toEqual(200);
    expect($response->getData(true));
});

test('update > success', function (): void {
    $color = UserColor::factory()->create();

    $request = Mockery::mock(PutRequest::class);
    $request->shouldReceive('validated')
        ->andReturn(updatedUserColorData);

    $response = $this->controller->update($request, $color->id);

    expect($response->getStatusCode())->toEqual(200);
    expect($response->getData(true));
});

test('delete > success', function (): void {
    $color = UserColor::factory()->create();

    $response = $this->controller->destroy($color->id);

    expect($response->getStatusCode())->toEqual(200);
    $this->assertDatabaseMissing('user_colors', ['id' => $color->id]);
});
