<?php
/**
 * Created by PhpStorm.
 * User: binhnx
 * Date: 4/8/19
 * Time: 3:33 PM
 */

namespace App\Services;

use App\Entities\User;
use App\Helpers\FileHelper;
use App\Repositories\UserRepository;
use DB;
use Exception;
use Log;

class UserService
{
    /**
     * @var $userRepo UserRepository
     */
    protected $userRepo;

    public function __construct()
    {
        $this->userRepo = app(UserRepository::class);
    }

    /**
     * @param $params
     * @param $file
     * @return mixed
     * @throws Exception
     */
    public function create($params, $file)
    {
        try {
            DB::beginTransaction();
            $params['password'] = bcrypt($params['password']);
            $fileHelper = new FileHelper();
            $params['avatar'] = $fileHelper->upload($file, 'avatar');

            $user = $this->userRepo->create($params);

            DB::commit();
            return $user;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();

            return false;
        }

    }

    public function listAll()
    {
        return User::query()->orderBy('id', 'DESC')->get();
    }

    public function checkEmail($email)
    {
        $user = User::query()->where('email', $email)->first();

        return !empty($user);
    }
}
