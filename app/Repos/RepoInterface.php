<?php

namespace App\Repos;
Interface RepoInterface
{
    public function retrieve($model, $user_id);
    public function store($model, array $data, $user_id);
    public function update($model, int $id, array $data, $user_id);
    public function show($model, $id, $user_id);
    public function delete($model, $id, $user_id);
    // public function retrieve($model)
    // {
    //     try{
    //         $data = $this->model($model)->get();
    //         return $this->success($data,'success',200);
    //     }catch (\Exception $e){
    //         return $this->error('error','error fetch data', 404);
    //     }
    // }
}
