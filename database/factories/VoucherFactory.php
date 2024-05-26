<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_voucher' => $this->faker->unique()->randomNumber(5),
            'nama_voucher' => "Voucher " . $this->faker->word(),
            'potongan_harga' => $this->faker->randomFloat(2, 0.1, 0.5),
            'deskripsi' => $this->faker->text(),
            'tanggal_mulai' => $this->faker->dateTimeBetween('now', '+1 days'),
            'tanggal_berakhir' => $this->faker->dateTimeBetween('now', '+1 years'),
        ];
    }
}
