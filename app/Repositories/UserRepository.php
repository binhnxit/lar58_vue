<?php

namespace App\Repositories;

use Herode\ARepo\BaseRepository;
use App\Entities\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class UserRepository.
 *
 * @package namespace App\Repositories;
 */
class UserRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Specify Query Builder
     *
     * @return Builder
     */
    public function query()
    {
        return User::query();
    }
}
