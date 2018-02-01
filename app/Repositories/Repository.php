<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository
 *
 * Common eloquent methods.
 *
 * @package App\Repositories
 *
 */
abstract class Repository implements RepositoryInterface
{
    /**
     * @var Model
     *
     */
    protected $model;

    /**
     * Repository constructor.
     *
     * @param $modelClass
     * @param $attributes
     *
     */
    public function __construct($modelClass)
    {
        $this->model = $modelClass;
    }

    /**
     * Create
     *
     * Creates a new model.
     *
     * @param array $attributes
     *
     * @return Model
     *
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }
    
    /**
     * First or create.
     *
     * First and returns the first record if
     * exists or creates a new model.
     *
     * @param array $attributes
     *
     * @return mixed
     *
     */
    public function firstOrCreate(array $attributes)
    {
        return $this->model->firstOrCreate($attributes);
    }


    /**
     * All
     *
     * Gets all models.
     *
     * @param array $attributes
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     *
     */
    public function all(array $attributes = array('*'))
    {
        return $this->model->all($attributes);
    }


    /**
     * Find.
     *
     * Find a record by it's primary id.
     *
     * @param $id
     *
     * @return mixed
     *
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Update
     *
     * Update the model find by id with de given data.
     *
     * @param $id
     * @param array $newData
     */
    public function update($id, array $newData)
    {
        $model = $this->find($id);
        $model->update($newData);

        return $model;
    }

    /**
     * Where
     *
     * Standard mySql where statement.
     *
     * @param $needle
     * @param $hayStack
     * @param string $option
     *
     * @return mixed
     *
     */
    public function where($needle, $hayStack, $option = '=')
    {
        return $this->model->where($needle, $option, $hayStack);
    }

    /**
     * Paginate
     *
     * return the result paginated for the take value and with the attributes.
     *
     * @param int $take
     * @param string $search
     *
     * @return mixed
     *
     */

    public function paginate($take = 10, $search = null)
    {
        if ($search) {
            $searchTerms = explode(' ', $search);
            $result = $this->model->where( function ($q) use($searchTerms) {
                foreach ($searchTerms as $term) {
                   foreach ($this->attributes as $attribute) {
                        $q->orwhere($attribute, "like", "%{$term}%");
                    }
                }
            })->paginate($take)->appends(['search' => $search]);

        } else {
            $result = $this->model->paginate($take);

        }

        return $result;

    }

    /**
     * With
     *
     * Return the current model with the relationships given.
     *
     * @param array $relationships
     *
     * @return \Illuminate\Database\Eloquent\Builder|static
     *
     */
    public function with(array $relationships)
    {
        return $this->model->with($relationships);
    }

    /**
     * Active
     *
     * Restoring Soft Deleted Model find by the given id.
     *
     * @param $id
     */
    public function active($id)
    {
        $model = $this->model->withTrashed()->find($id);
        $model->restore();

        return $model;
    }

    /**
     * Destroy
     *
     * Delete the model find by the given id.
     *
     * @param $id
     */
    public function delete($id)
    {       
        return $this->model->destroy($id);
    }

     /**
     * lists
     *
     * @param string $column
     * @param string $key
     */
    public function lists($column = 'name', $key = 'id')
    {
        return $this->model->all([$column,$key])->sortBy($column)->pluck($column, $key)->filter()->all();
    }

    /**
     * orderBy
     *
     * Order by column 
     *
     * @param string $column
     * @param string $order
     */
    public function orderBy($column = 'created_at', $order = 'desc')
    {       
        return $this->model->orderBy($column, $order);
    }


}
