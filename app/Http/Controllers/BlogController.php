<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private  $url;
    private  $img_url;

    public function __construct()
    {
      $this->url = config('constants.url');
      $this->img_url = url('/').config('constants.img_url');
    }

    public function index()
    {
        $blogs = getRequest($this->url.'/api/blog/getallblogs');
        $filteredBlogs = array_filter($blogs, function ($blog) {
            return $blog['name'] === Session()->get('user')['fullName'];
        });      
         return view('front.blog.index',['url'=>$this->img_url,'blogs'=>$filteredBlogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();    
        }
        $input = $request->input();
        $validator = Validator::make($input, [
            'title' => 'required|string',
            'content' => 'required|string',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $token = session()->get('api_token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        $apiURL = $this->url . '/api/blog/createblog';
        $client = new \GuzzleHttp\Client();
        
        try {
            $response = $client->request('POST', $apiURL, [
                'multipart' => [
                    [
                        'name' => 'Title',
                        'contents' => $input['title']
                    ],
                    [
                        'name' => 'Content',
                        'contents' => $input['content']
                    ],
                    [ 
                        'name' => 'ImageFile',
                        'contents' => fopen($image->getPathname(), 'r')  // Open the image file
                    ],  
                    [
                        'name' => 'Image',
                        'contents' => $originalName
                    ],   

                ],
                'headers' => $headers,
            ],              
        );
        } catch (ServerException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            $responseBody = $response->getBody()->getContents();
        }
        
        $statusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody(), true);
        
        if ($statusCode == 200) {
            if ($responseBody['isSuccess']) {
                return redirect()->route('blog.index')->with('success', 'Blog Create successful!');
            } else {
                return redirect()->back()->with(['error' => $responseBody['message']])->withInput();
            }
        } else {
            return abort(500);
        }


    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = getRequest($this->url.'/api/blog/getblogbyid?blogId='.$id);
        return view('front.blog.edit',['blog'=>$blog]);
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
}
