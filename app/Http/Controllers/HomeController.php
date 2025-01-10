<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarType;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // $cars = Car::find(1);
        // dd($cars->carType);
        
        // $cars = Car::find(2);
        // $carType = CarType::where('name', 'sedan')->first();
        // $cars->car_type_id = $carType->id;
        // $cars->save();
        // dd($carType->car);


        // $car = Car::find(1);
        // dd($car->favouredUsers);
        
        // $user = User::find(1);
        // dd($user->favouriteCars);
        
        $user = User::find(1);
        // INSERT
        // $user->favouriteCars()->attach([1,2]);
        // DELETE PREVIOUS, AND INSERT NEW
        // $user->favouriteCars()->sync([3]);
        // REMOVE 1 AND 2
        // $user->favouriteCars()->detach([1,2]);
        // REMOVE ALL
        $user->favouriteCars()->detach();


        return view('home.index');
    }
}
