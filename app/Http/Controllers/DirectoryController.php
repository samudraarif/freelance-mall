<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = request('category');
        $floor = request('floor');
        $tenant_name = request('tenant_name');

        $client = new Client(['verify' => false]);
        $url = 'https://apiloyalty.metropolitanland.com/getAllTenants';

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

        // Filter data where TENANT_STATUS is Active
        $filteredData = $data->filter(function ($item) {
            return $item['TENANT_STATUS'] === 'Active';
        });

        // Additional filtering based on $category, $floor, $tenant_name
        if (!empty($category)) {
            $filteredData = $filteredData->filter(function ($item) use ($category) {
                // Assuming $category is a field in your data array
                return $item['TENANT_CATEGORY'] === $category;
            });
        }

        if (!empty($floor)) {
            $filteredData = $filteredData->filter(function ($item) use ($floor) {
                // Assuming $floor is a field in your data array
                return $item['TENANT_FLOOR'] === $floor;
            });
        }

        if (!empty($tenant_name)) {
            $filteredData = $filteredData->filter(function ($item) use ($tenant_name) {
                // Assuming $tenant_name is a field in your data array
                // Perform a case-insensitive "LIKE" comparison
                return stripos($item['TENANT_NAME'], $tenant_name) !== false;
            });
        }

        return view('directory.directory', ['data' => $filteredData->values()]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function search()
    // {
    //     $category = request('category');
    //     $floor = request('floor');
    //     $tenant_name = request('tenant_name');

    //     $client = new Client(['verify' => false]);
    //     $url = 'https://apiloyalty.metropolitanland.com/getAllTenants';

    //     // GET with basic auth
    //     $headers = [
    //         'mid-api-key'  => 'wePzGR4hIYYvVOd6p8vGWyt6CXGq1o0J'
    //     ];

    //     $response = $client->request('GET', $url, [
    //         'headers' => $headers,
    //     ]);

    //     $content = $response->getBody()->getContents();
    //     $contentArray = json_decode($content, true);
    //     $data = collect($contentArray['data']);

    //     // Filter data where TENANT_STATUS is Active
    //     $filteredData = $data->filter(function ($item) {
    //         return $item['TENANT_STATUS'] === 'Active';
    //     });

    //     // Additional filtering based on $category, $floor, $tenant_name
    //     if (!empty($category)) {
    //         $filteredData = $filteredData->filter(function ($item) use ($category) {
    //             // Assuming $category is a field in your data array
    //             return $item['TENANT_CATEGORY'] === $category;
    //         });
    //     }

    //     if (!empty($floor)) {
    //         $filteredData = $filteredData->filter(function ($item) use ($floor) {
    //             // Assuming $floor is a field in your data array
    //             return $item['TENANT_FLOOR'] === $floor;
    //         });
    //     }

    //     if (!empty($tenant_name)) {
    //         $filteredData = $filteredData->filter(function ($item) use ($tenant_name) {
    //             // Assuming $tenant_name is a field in your data array
    //             return strpos($item['TENANT_NAME'], $tenant_name) !== false;
    //         });
    //     }

    //     return view('directory.directory', ['data' => $filteredData->values()]);
    // }
}
