<?php

namespace App\Repos;

use App\Models\Developer;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\Model;

trait UserIdFilterDeveloperTrait
{
    public function developer($user_id)
    {
        $developer_id = Developer::where('user_id',$user_id)->first();
        return $developer_id['id'];
    }
}
abstract class BaseRepo implements RepoInterface
{
    use HttpResponses;
    use UserIdFilterDeveloperTrait;

    private function model($model): Model
    {
        return new $model;
    }
    /**
     * Retrieve all records.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function retrieve($model, $user_id)
    {
        try{
            $data = $this->model($model)->where('developer_id','=',$this->developer($user_id))->get();
            return $data;
        }catch (\Exception $e){
            return $this->error('error','error fetch developer data attach to this user', 403);
        }
    }

    /**
     * Create a new record.
     * @param model $model
     * @param array $data
     * @return Model
     */
    public function store($model, array $data, $user_id)
    {
        try{
            return $this->model($model)->where('developer_id','=',$this->developer($user_id))->create($data);
        }catch (\Exception $e){
            return $this->error('error','error fetch developer data attach to this user', 403);
        }

    }

    /**
     * Update an existing record.
     * @param model $model
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function update($model, int $id, array $data, $user_id)
    {
        $updateData = $this->model($model)->where('developer_id','=',$this->developer($user_id))->findOrFail($id);

        $updateData->update($data);

        return $updateData;
    }

    /**
     * Show a record by ID.
     * @param model $model
     * @param int $id
     * @return Model
     */
    public function show($model, $id, $user_id)
    {
        return $this->model($model)->where('developer_id','=',$this->developer($user_id))->findOrFail($id);
    }

    /**
     * Delete a record by ID.
     * @param model $model
     * @param int $id
     * @return bool
     */
    public function delete($model, $id, $user_id)
    {
        $this->model($model)->where('developer_id','=',$this->developer($user_id))->findOrFail($id)->delete();
    }
}
