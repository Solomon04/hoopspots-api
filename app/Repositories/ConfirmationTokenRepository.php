<?php

namespace App\Repositories;

use App\Models\ConfirmationToken;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ConfirmationTokenRepository.
 *
 * @package namespace App\Repositories;
 * @method ConfirmationToken|null find($id, $columns = ['*'])
 * @method ConfirmationToken[]|Collection findWhere(array $where, $columns = ['*'])
 * @method ConfirmationToken[]|Collection findByField($field, $value = null, $columns = ['*'])
 * @method ConfirmationToken create(array $attributes)
 */
interface ConfirmationTokenRepository extends RepositoryInterface
{
    //
}
