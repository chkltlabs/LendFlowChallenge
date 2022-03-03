<?php

namespace App\Http\Controllers;

use App\Http\Requests\NYTGetRequest;
use Illuminate\Support\Facades\Http;

class NYTApiController extends Controller
{
    public function get (NYTGetRequest $request){
        $data = $request->validated();
        $data['api-key'] = env('NYT_API_KEY', '0000');
        $rtn = Http::get(env('NYT_API_URL', 'https://www.google.com')
            . '/lists/best-sellers/history.json?'
            . http_build_query($data));
        return response($rtn->body())->setStatusCode(200);
    }
}
