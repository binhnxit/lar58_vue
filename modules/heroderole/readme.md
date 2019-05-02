# Herode Roles and Permissions (Laravel) 

## Install
If you want to use other project, You can:

- Copy this folder `heroderole` to `modules/heroderole` into your root project

- Open file `composer.json` and edit

```$json
{
    //...
    "require": {
        "herode/role": "*@dev",
    },
    "repositories": [
        //...
        {
          "type": "path",
          "url": "./modules/heroderole"
        }
      ]
    //...
}
```

Next, run: `composer update`

You can publish the migrations, configure, seeds vie command: <br>
`php artisan herode-role:install`

After the migrations published you can create the roles tables by running the migrations: <br>
`php artisan migrate`

When published, The `config/herode-roles.php` config file contains: <br>
```php

return [
    'models' => [
        /*
         * Herode roles model
         */
        'role' => Herode\Role\Role::class,
    ],

    'table_names' => [
        'role' => 'roles'
    ],
];

```

## How to use

First, add the `Herode\Role\Contracts\HasRoles` trait to your `User` model: <br>
```php
use Herode\Role\Contracts\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
    // ...
}

```

Create a role: <br>
```php
$role = Role::create(['name' => 'admin', 'description' => 'Administrator']);

```

A role can be assign from user: <br>

```php
$user->assignRole($role);
```

You can check if user has a role: <br>

```php
$user->hasRole('admin')
```

Remove role from user: <br>

```php
$user->removeRole('admin')
```

## Using a middleware


