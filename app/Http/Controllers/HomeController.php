<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\News;
use App\Models\Promo;
use GuzzleHttp\Client;
use App\Models\InstagramToken;
use App\Models\Magazine;
use App\Models\PromoPopUp;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil token Instagram terakhir yang disimpan
        $instagramToken = InstagramToken::latest()->first();

        // Jika token tidak ditemukan atau sudah kadaluwarsa, refresh token
        if (!$instagramToken || $instagramToken->expires_in < time()) {
            $this->refreshInstagramToken($instagramToken); // Memanggil fungsi untuk memperbarui token Instagram
            $instagramToken = InstagramToken::latest()->first(); // Mengambil token yang baru diperbarui
        }

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


        // Adding Instagram data request
        $instagramUrl = 'https://graph.instagram.com/me/media';
        $accessToken = $instagramToken->access_token; // Menggunakan access token yang sudah diperbarui

        $instagramParams = [
            'fields' => 'id,media_url,caption,username',
            'access_token' => $accessToken
        ];

        $instagramResponse = $client->request('GET', $instagramUrl, [
            'query' => $instagramParams
        ]);

        $instagramContent = $instagramResponse->getBody()->getContents();
        $instagramData = json_decode($instagramContent, true);

        // Assuming the data you need is under 'data' key in Instagram response
        $instagramItems = collect($instagramData['data']);

        // dd($instagramItems);

        $dataNews = News::orderBy('created_at', 'DESC')->get();

        $dataMagazine = Magazine::orderBy('created_at', 'DESC')->get();

        $dataPromo = PromoPopUp::orderBy('id', 'DESC')
            ->where('status', '1')
            ->first();

        return view('welcome', compact('dataNews', 'dataPromo', 'dataMagazine', 'instagramItems'), ['data' => $filteredData->values()]);
    }

    // Fungsi untuk memperbarui token Instagram
    private function refreshInstagramToken($instagramToken)
    {
        $client = new Client();
        $url = "https://graph.instagram.com/refresh_access_token";

        $response = $client->request('GET', $url, [
            'query' => [
                'grant_type' => 'ig_refresh_token',
                'access_token' => $instagramToken->access_token
            ]
        ]);

        $responseContent = $response->getBody()->getContents();
        $responseData = json_decode($responseContent, true);

        $insertToken = new InstagramToken();
        $insertToken->access_token = $responseData['access_token'];
        $insertToken->expires_in =  $responseData['expires_in'] - 100000; // Kurangi 1000 detik untuk jaga-jaga
        $insertToken->save();
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

    public function getDataDashboard()
    {
        $dataDashboard = [
            'news' => News::count(),
            'contact' => Contact::count(),
            'magazine' => Magazine::count(),
        ];

        // dd($dataDashboard);


        return view('dashboard', compact('dataDashboard'));
    }
}
