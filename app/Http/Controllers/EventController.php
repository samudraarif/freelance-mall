<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Promo;
use GuzzleHttp\Client;
use App\Models\Magazine;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $promos = Promo::orderBy('created_at', 'DESC')->get();
        // $news = News::orderBy('created_at', 'DESC')->get();
        // $magazines = Magazine::orderBy('created_at', 'DESC')->get();


        $client = new Client(['verify' => false]);
        $url = 'https://apiloyalty.metropolitanland.com/getAllBanners/';

        // GET with basic auth
        $headers = [
            'mid-api-key'  => 'wePzGR4hIYYvVOd6p8vGWyt6CXGq1o0J'
        ];

        $response = $client->request('GET', $url, [
            'headers' => $headers,
        ]);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = collect($contentArray['data']);
        $filteredData = $data->filter(function ($item) {
            return $item['BANNER_STATUS'] === 'Active';
        });

        // dd($data);

        return view('event.event', ['data' => $filteredData->values()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
