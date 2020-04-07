<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ConfirmationTokenRepository;
use App\Models\ConfirmationToken;
use App\Validators\ConfirmationTokenValidator;

/**
 * Class ConfirmationTokenRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ConfirmationTokenRepositoryEloquent extends BaseRepository implements ConfirmationTokenRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ConfirmationToken::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
