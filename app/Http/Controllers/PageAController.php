<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UniqueUrl;
use App\History;
use Carbon\Carbon;
use function Sodium\compare;


class PageAController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function generateRandomString($length = 13) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function pageA()
    {
        $user = \Auth::user();
        $uniqueUrl = UniqueUrl::where('user_id', $user->id)->where('updated_at', '>=', Carbon::now()->subDays(7)->toDateTimeString())->orderby('created_at', 'desc')->first();

        if(is_null($uniqueUrl) || $uniqueUrl->status != '1')
        {
            $url = true;
            while ($url){
                $random_string = $this->generateRandomString(13);
                $url = UniqueUrl::where('url',$random_string)->first();
            }
            $slug = $random_string;

            UniqueUrl::create([
                'user_id' => $user->id,
                'url' => $slug,
                'status' => '1'
            ]);
        }else{
            $slug = $uniqueUrl->url;
        }


        return redirect('pageA/'.$slug);
    }

    public function pageA_slug($slug)
    {
        $userSlug = UniqueUrl::where('url', $slug)->first();

        return view('pageA', compact('slug', 'userSlug'));
    }

    public function generateNewOne($id){

        $url = true;
        while ($url){
            $random_string = $this->generateRandomString(13);
            $url = UniqueUrl::where('url',$random_string)->first();
        }
        $slug = $random_string;

        $model = UniqueUrl::find($id);
        $model -> fill(['url' => $slug]);
        $model -> save();

        return redirect('pageA/'.$slug);
    }

    public function DeactivateUrl($id){

        $model = UniqueUrl::find($id);
        $model -> fill(['status' => '0']);
        $model -> save();
        $slug = $model->url;

        return redirect('pageA/'.$slug);
    }

    public function FeelLucky($id){
        $userSlug = UniqueUrl::find($id);
        $slug = $userSlug->url;
        $result = true;
        $randomNumber = rand(1,1000);
        if($randomNumber % 2 == 0){
            if($randomNumber > 900){
                $result = "Win " . $randomNumber*0.7 . "$";
            }
            if($randomNumber <= 900 && $randomNumber > 600){
                $result = "Win " . $randomNumber*0.5."$";
            }
            if($randomNumber <= 600 && $randomNumber > 300){
                $result = "Win " . $randomNumber*0.3 . "$";
            }
            else{
                $result = "Win " . $randomNumber*0.1 . "$";
            }
        }
        else{
            $result = "Lose";
        }

        History::create([
            'user_id' => $userSlug->user_id,
            'result' => $result,
        ]);

        return view('pageA', compact('slug', 'userSlug', 'randomNumber', 'result'));
    }

    public function history($id){

        $userSlug = UniqueUrl::find($id);
        $history = History::where('user_id', $userSlug->user_id)->orderby('created_at', 'desc')->take(3)->get();

        return view('history', compact('history'));
    }
}
