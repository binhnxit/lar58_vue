<?php
/**
 * Created by PhpStorm.
 * User: binhnx
 * Date: 4/26/19
 * Time: 3:53 PM
 */

namespace Herode\Role;

use Herode\Role\Exceptions\RoleDoesNotExist;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'id', 'name', 'description'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('herode-roles.table_names.roles'));
    }

    /**
     * @param string $name
     * @return Role
     */
    public static function findByName(string $name)
    {

        $role = static::where('name', $name)->first();

        if (! $role) {
            throw RoleDoesNotExist::named($name);
        }

        return $role;
    }

    /**
     * @param int $id
     * @return Role
     */
    public static function findById(int $id)
    {

        $role = static::where('id', $id)->first();

        if (! $role) {
            throw RoleDoesNotExist::withId($id);
        }

        return $role;
    }
}
