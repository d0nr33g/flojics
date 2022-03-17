<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'speciality' => $this->faker->randomElement([
                'dentistry', 'dermatology', 'psychiatry', 'pediatrics',
                'neurology', 'orthopedics', 'gynaecology', 'ear, nose & throat',
                'cardiology' ]),
            'experience' => $this->faker->paragraph(),
            'photo' => $this->faker->randomElement([
                'public/img/OCXGafS8uRQmS8cvdCv0STykDyUWRC7ExDNnRqQV.jpg',
                'public/img/1RrJJd9XlFUE0aZ1u64bDfithmtqOfKliL2uTzrc.jpg',
                'public/img/OQF7yWwUewIHPdFlHS3mfJlN8LENAYCb6SplruMh.jpg',
                'public/img/OQF7yWwUewIHPdFlHS3mfJlN8LENAYCb6SplruMh.jpg',
                'public/img/T2fU58CZQGPi9p1r0c6EdkL37w66bAM1S9QbDazA.jpg',
                'public/img/5dyYHls1LqzA14d1uVI5F0Rvn4uICIvq3bhS8Bvz.jpg',
                'public/img/IBwM2g4vn2j10eyOJPodnMnPFQEyT3gikJ3lvX5g.jpg',
                'public/img/iTnLHbW0E1vAug4Rgd57UqFcv7Rtnn5Q5DV1Q9Fu.jpg',
                'public/img/PszyeyoxhXD0oY17AroBLKDtllsuZLK9GkQ4VDJS.jpg',
                ])
        ];
    }
}
