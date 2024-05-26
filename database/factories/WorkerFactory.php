<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Worker::class;
    public function definition(): array
    {
        return [
            'login_id' => function () {
                return User::factory()->create()->id;
            },
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'no_hp' => $this->faker->address(),
            'foto_formal' => "/worker/Pas Foto 3x4.jpg",
            'foto_ktp' => "/worker/ktp.jpg",
            'status_menerima_order' => 0,
            'status_verifikasi' => 0,
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
        ];
    }
}
