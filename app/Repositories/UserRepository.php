<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Repositories;
 * @method User|null find($id, $columns = ['*'])
 * @method User[]|Collection findWhere(array $where, $columns = ['*'])
 * @method User[]|Collection findByField($field, $value = null, $columns = ['*'])
 * @method User create(array $attributes)
 */
interface UserRepository extends RepositoryInterface
{
    //
}
