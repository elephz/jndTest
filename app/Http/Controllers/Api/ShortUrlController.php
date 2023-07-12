<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function shortUrl(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required',
        ]);
   
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'data' => $validator->errors()
            ], 401);
        }

        try {
            $url = $request->url;

            $db = ShortUrl::where('original_url', $url)->firstOr(function () use ($url) {

                $shortUrl = new ShortUrl();
                $shortUrl->original_url = $url;
                $shortUrl->code = $this->generateUniqueShortUrl();
                $shortUrl->save();

                return $shortUrl;
            });

            return response()->json([
                'status' => true,
                'data' => $db
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 200);
        }
    }

    public function getUrl()
    {
        return ShortUrl::orderBy('id', 'desc')->paginate(5);
    }

    public function remove(Request $request)
    {
        try {
            ShortUrl::find($request->id)->delete();

            return response()->json([
                'status' => true,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 200);
        }
    }

    public function redirectToorigin(Request $request)
    {
        $shortUrl = ShortUrl::where('code', $request->code)->firstOrFail();

        return redirect()->away($shortUrl->original_url);
    }

    private function generateUniqueShortUrl()
    {
        $shortUrl = Str::random(8);

        while (ShortUrl::where('code', $shortUrl)->exists()) {
            $shortUrl = Str::random(8);
        }

        return $shortUrl;
    }
}
