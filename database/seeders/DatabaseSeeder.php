<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\City;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\CarType;
use App\Models\CarImage;
use App\Models\FeulType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $states = [
            'California' => ['Los Angeles', 'San Francisco', 'San Diego', 'Sacramento', 'Fresno'],
            'Texas' => ['Houston', 'Dallas', 'Austin', 'San Antonio', 'Fort Worth'],
            'Florida' => ['Miami', 'Orlando', 'Tampa', 'Jacksonville', 'St. Petersburg'],
            'New York' => ['New York City', 'Buffalo', 'Rochester', 'Yonkers', 'Syracuse'],
            'Illinois' => ['Chicago', 'Aurora', 'Naperville', 'Rockford', 'Joliet'],
            'Georgia' => ['Atlanta', 'Savannah', 'Augusta', 'Athens', 'Columbus'],
            'Arizona' => ['Phoenix', 'Tucson', 'Mesa', 'Chandler', 'Scottsdale'],
            'Pennsylvania' => ['Philadelphia', 'Pittsburgh', 'Allentown', 'Erie', 'Scranton'],
            'Ohio' => ['Columbus', 'Cleveland', 'Cincinnati', 'Toledo', 'Akron'],
            'North Carolina' => ['Charlotte', 'Raleigh', 'Greensboro', 'Durham', 'Winston-Salem']
        ];

        $makers = [
            'Toyota' => ['Corolla', 'Camry', 'RAV4', 'Highlander', 'Prius'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot', 'Fit'],
            'Ford' => ['Focus', 'Mustang', 'F-150', 'Explorer', 'Fusion'],
            'Chevrolet' => ['Malibu', 'Silverado', 'Tahoe', 'Equinox', 'Impala'],
            'BMW' => ['3 Series', '5 Series', 'X5', 'X3', '7 Series'],
            'Mercedes-Benz' => ['C-Class', 'E-Class', 'S-Class', 'GLE', 'GLC']
        ];
        

        // FOR CARTYPE TABLE
        CarType::factory()
            ->sequence(
                ['name' => 'Sedan'],
                ['name' => 'SUV'],
                ['name' => 'Coupe'],
                ['name' => 'Convertible'],
                ['name' => 'Hatchback'],
                ['name' => 'Wagon'],
                ['name' => 'Van'],
                ['name' => 'Pickup'],
                ['name' => 'Sports Car']
            )
            ->count(9)
            ->create();

        // FOR FUELTYPE TABLE
        FeulType::factory()
            ->sequence(
                ['name' => 'Petrol'],
                ['name' => 'Diesel'],
                ['name' => 'Electric'],
                ['name' => 'Hybrid']
            )
            ->count(4)
            ->create();

        // FOR STATES AND CITIES
        foreach ($states as $state => $cities) {
            State::factory()
                ->state(['name' => $state])
                ->has(
                    City::factory()
                        ->count(count($cities))
                        ->sequence(...array_map(fn($city) => ['name' => $city], $cities))
                )
                ->create();
        }

        // FOR MAKER AND MODELS
        foreach ($makers as $maker => $models) {
            Maker::factory()
                ->state(['name' => $maker])
                ->has(
                    Model::factory()
                        ->count(count($models))
                        ->sequence(...array_map(fn($model) => ['name' => $model], $models))
                )
                ->create();
        }

        // CREATE SOME USERS
        User::factory()
            ->count(3)
            ->create();
            
            User::factory()
            ->count(2)
            ->has(
                Car::factory()
                    ->count(50)
                    ->has(
                        CarImage::factory()
                            ->count(5)
                            ->sequence(
                                fn (Sequence $sequence) => ['position' => $sequence->index % 5 + 1]
                            ),
                        'images'
                    )
                    ->hasFeatures(),
                'favouriteCars'
            )
            ->create();
        
    }
}
