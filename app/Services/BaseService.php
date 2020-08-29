<?php


namespace App\Services;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
    /**
     * @var Application
     */
    public $model;

    /**
     * BaseService constructor.
     */
    public function __construct()
    {
        $this->model = app($this->model());
    }

    /**
     * @return mixed
     */
    public function truncate() {
        return $this->model->truncate();
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return $this->model->query();
    }

    /**
     * @return mixed
     */
    public function all() {
        return $this->model->all();
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function select($columns = ['*']) {
        return $this->model->select($columns)->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id) {
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findOrFail(int $id) {
        return $this->model->findOrFail($id);
    }


    /**
     * @param $insertData
     * @return \Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function create($insertData)
    {
        return $this->model->create($insertData);
    }

    /**
     * @param $where array|integer|Model
     * @param $data
     * @return bool|int
     */
    public function update($where, $data)
    {
        if ($where instanceof Model) {
            return $where->update($data);
        }

        if (is_array($where)) {
            return $this->model->where($where)->update($data);
        }

        return $this->model->findOrFail($where)->update($data);

    }

    /**
     * @param array $where
     * @param array $data
     * @return mixed
     */
    public function updateOrCreate(array $where, array $data) {
        return $this->model->updateOrCreate($where, $data);
    }

    /**
     * @param array $where
     * @return Builder
     */
    public function where(array $where)
    {
        return $this->model->where($where);
    }

    /**
     * @param array $where
     * @return Builder
     */
    public function whereNull(array $where)
    {
        return $this->model->whereNull($where);
    }

    /**
     * @param array $where
     * @return Builder
     */
    public function whereNotNull(array $where)
    {
        return $this->model->whereNotNull($where);
    }


    /**
     * @param array $where
     * @param $columns
     * @return Builder
     */
    public function getWhere(array $where, $columns=['*'])
    {
        return $this->model->where($where)->get($columns);
    }

    /**
     * Find By columns
     *
     * @param $array
     * @return Builder|Model
     */
    public function findBy($array)
    {
        return $this->model->where($array)->firstOrFail();
    }

    /**
     * @param $take
     * @param string $orderBy
     * @param string $orderColumn
     * @return mixed
     */
    public function take($take=3, $orderBy='asc', $orderColumn='id') {
        return $this->model->take($take)->orderBy($orderColumn, $orderBy)->get();
    }

    /**
     * @return mixed
     */
    public function firstOrFail() {
        return $this->model->firstOrFail();
    }

    /**
     * @return mixed
     */
    public function first() {
        return $this->model->first();
    }

    /**
     * @return mixed
     */
    public abstract  function model();
}
