<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Item;

class TestController extends Controller
{
    public function q1() {
        // Write a query to get list of users which using gmail
        $answer1 = [];
        $users = User::where('email', 'LIKE', '%gmail%')->get();
        foreach ($users as $u){
            array_push($answer1, $u);
        }


        return view('q1')->with([
            'answer1' => $answer1
        ]);
    }
    
    public function q2() {
        // Write a query to get list of items with price below than 300
        // if no result, get below 400, 500, 600 and so on until it show something
        $answer2 = [];
        $items = Item::select('price')->where('price', '<', 300)->get();
        foreach ($items as $i){
            array_push($answer2, $i);
        }

        // Based on $answer2 result, sum up the price
        $answer3 = 0;
        foreach($answer2 as $a){
            $answer3 += $a->price;
        }
        

        return view('q2')->with([
            'answer2' => $answer2,
            'answer3' => $answer3
        ]);
    }

    public function q3() {
        // Define the relationship in App\Models\User to fix the logic below
        $user = User::find(1);
        $user->address;


        // Currently only show first_name
        // Please include last_name by defining a full_name accessor in App\Models\User 

        return view('q3')->with([
            'user' => $user,
        ]);
    }

    public function q4() {
        $users = User::get();


        // Write a logic to map a new key for each user based on user->gender, 
        // The value is either 'Mr' or 'Ms'
        // Key name: name_prefix
        foreach ($users as $u){
            if ($u->gender == "male"){
                $u->name_prefix = "Mr";
            }else if ($u->gender == "female"){
                $u->name_prefix = "Ms";
            }
        }

        return view('q4')->with([
            'users' => $users,
        ]);
    }

    public function q5(Request $request) {
        // Copy and paste this link in your browser: http://yourlocalhostwithorwithoutport/q5?param1=parameter1&param2=parameter2
        // Get the query param from the url and assign the variables below accordingly

        $param1 = $request->input('param1');
        $param2 = $request->input('param2');

        return view('q5')->with([
            'param1' => $param1,
            'param2' => $param2,
        ]);
    }
}
