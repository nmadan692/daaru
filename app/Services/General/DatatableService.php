<?php


namespace App\Services\General;


use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DatatableService
{
    /**
     * @param $table
     * @param array $columns
     * @return mixed
     * @throws \Exception
     */
    public function getData($table, $joins = [], $columns = [], $groupBy = null, $where = [], $whereNull = [], $whereNotNull = []) {
        $data = DB::table($table);
        if($joins) {
            $this->getInnerJoin($data, $joins);
        }
        $data->select($columns);
        if($groupBy)
        {
            $data->groupBy($groupBy);
        }
        if($where)
        {
            $data->where($where);
        }
        if($whereNull)
        {
            $data->whereNull($whereNull);
        }
        if($whereNotNull)
        {
            $data->whereNotNull($whereNotNull);
        }

        return Datatables::of($data);
    }

    /**
     * @param $data
     * @param $joins
     * @return mixed
     */
    public function getInnerJoin($data, $joins) {
        foreach ($joins as $join) {
            $data->leftJoin($join['name'], $join['first'], '=', $join['second']);
            if($join['joins']) {
                $this->getInnerJoin($data, $join['joins']);
            }
        }

        return $data;
    }

    /**
     * @param $model
     * @param array $with
     * @return mixed
     * @throws \Exception
     */
    public function getDataByEloquent($model, $with= [], $select = []) {
        $query = app($model)->query();
        if($with) {
            $query->with($with);
        }
        if($select) {
            $query->select($select);
        }

        return DataTables::of($query);
    }
}
