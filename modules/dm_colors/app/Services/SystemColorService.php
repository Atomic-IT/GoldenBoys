<?php

namespace App\Services;

use App\Models\SystemColor;
use App\Traits\Setters\RequestSetterTrait;
use App\Traits\Setters\TimeSetterTrait;
use App\Traits\Setters\UserSetterTrait;
use App\Transformers\SystemColorTransformer;
use Exception;
use Illuminate\Http\Request;

class SystemColorService
{
    use RequestSetterTrait;
    use TimeSetterTrait;
    use UserSetterTrait;

    public function __construct(
        private readonly SystemColor $model,
        protected string $entity = 'system color',
        private readonly LoggerService $logger = new LoggerService
    ) {}

    /**
     * @throws Exception
     */
    public function index(Request $request): mixed
    {
        $this->defineRequestData($request);
        $this->defineUserData();

        $result = $this->model->all();

        $name = $this->causer ? $this->causer->name : 'Guest';

        $this->logger->logIndex($name, $this->entity, true);

        return fractal()
            ->collection($result)
            ->transformWith(new SystemColorTransformer)
            ->toArray()['data'];
    }

    /**
     * @throws Exception
     */
    public function countByCreatedLastWeek(Request $request): int
    {
        $this->defineRequestData($request);
        $this->defineTimeData();
        $this->defineUserData();

        $result = $this->model->whereDate('created_at', '>=', $this->lastWeek)->count();

        $name = $this->causer ? $this->causer->name : 'Guest';

        $this->logger->logCountByCreatedLastWeek($name, $this->entity, $this->isRefererStructural);

        return $result;
    }

    /**
     * @throws Exception
     */
    public function getByName(string $name): array
    {
        $this->defineUserData();

        $result = $this->model::getByName($name)->get();

        $name = $this->causer ? $this->causer->name : 'Guest';

        $this->logger->logMessage($name . ' fetched system colors by name: ' . $name . '.');

        return fractal()
            ->collection($result)
            ->transformWith(new SystemColorTransformer)
            ->toArray()['data'];
    }

    /**
     * @throws Exception
     */
    public function show($id): array
    {
        $this->defineUserData();

        $result = $this->model::findOrFail($id);

        $name = $this->causer ? $this->causer->name : 'Guest';

        $this->logger->log($name, $result->getValue(), $this->entity, 'showed');

        return fractal()
            ->item($result)
            ->transformWith(new SystemColorTransformer)
            ->toArray()['data'];
    }

    /**
     * @throws Exception
     */
    public function create(array $data): array
    {
        $this->defineUserData();

        $result = $this->model::create($data);

        $name = $this->causer ? $this->causer->name : 'Guest';

        $this->logger->log($name, $result->getName(), $this->entity, 'created');

        return fractal()
            ->item($result)
            ->transformWith(new SystemColorTransformer)
            ->toArray()['data'];
    }

    /**
     * @throws Exception
     */
    public function update($id, array $data): array
    {
        $this->defineUserData();

        $result = $this->model::findOrFail($id);

        $result->update($data);

        $name = $this->causer ? $this->causer->name : 'Guest';

        $this->logger->log($name, $result->getName(), $this->entity, 'updated');

        return fractal()
            ->item($result->fresh())
            ->transformWith(new SystemColorTransformer)
            ->toArray()['data'];

    }

    /**
     * @throws Exception
     */
    public function delete($id): void
    {
        $this->defineUserData();

        $model = $this->model::findOrFail($id);

        $model->delete();

        $name = $this->causer ? $this->causer->name : 'Guest';

        $this->logger->log($name, $model->getName(), $this->entity, 'deleted');
    }
}
