<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Customer::class;
    public function definition(): array
    {
        return [
            'login_id' => function () {
                return User::factory()->create()->id;
            },
            'nama' => $this->faker->name(),
            'no_hp' => $this->faker->phoneNumber(),
            'foto_profil' => $this->faker->imageUrl(),
            'alamat' => $this->faker->address(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
        ];
    }
}
