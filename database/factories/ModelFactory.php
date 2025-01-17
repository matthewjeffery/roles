<?php

use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define( \HttpOz\Roles\Tests\Stubs\User::class, function ( Faker\Generator $faker ) {
	static $password;

	return [
		'name'           => $faker->name,
		'email'          => $faker->unique()->safeEmail,
		'password'       => $password ?: $password = bcrypt( 'secret' ),
		'remember_token' => Str::random( 10 ),
	];
} );

$factory->define( HttpOz\Roles\Models\Role::class, function ( Faker\Generator $faker ) {
	return [
		'name'  => 'Admin',
		'slug'  => 'admin',
		'group' => 'system.admin'
	];
} );
