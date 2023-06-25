<?php

namespace App\Http\Controllers;

use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsJson;
use Illuminate\Support\Str;
use Validator;

class HomeController extends Controller
{    
    private  $img_url;
    private  $url;

    public function __construct()
    {
      $this->url = config('constants.url');
      $this->img_url = url('/').config('constants.img_url');
    }
    public function index()
    {
      $specialties = getRequest($this->url.'/api/specialties/GetAllSpecialties');
      $allDoctors = getRequest($this->url.'/api/doctor/GetTopDoctors');
      $blogs= getRequest($this->url.'/api/blog/getblogbyspecificnum?num=5');
      return view('welcome',['url'=>$this->img_url,'specialties'=>$specialties,'allDoctors'=>$allDoctors,'blogs'=>$blogs]);
   
    }
    public function getSearch(Request $request){
        $gender = $request->query('gender');
        $specialty = $request->query('Specialty');
        $specialties = getRequest($this->url.'/api/specialties/GetAllSpecialties');
        if(is_Null($gender) && is_Null($specialty)){
         $url = $this->url."/api/doctor/GetTopDoctors";
         $searchDoctor=getRequest($url);
        }else{
          $url = $this->url."/api/doctor/SearchDoctorsByGender&Specialty?gender=".$gender."&Specialty=".$specialty;
          $searchDoctor=getRequest($url);
          $searchDoctor = array_map(function ($item) {
            $item['doctorId'] = $item['idDoctor'];
            unset($item['idDoctor']);
            return $item;
            }, $searchDoctor);
        }

        return view('front.search',['url'=>$this->img_url,'specialties'=>$specialties,'searchDoctor'=>$searchDoctor]);
    }
    public function postSearch(Request $request){
        $input = $request->input();
        
        $validator = Validator::make($input, [
            'gender_type' => 'required|string',
            'select_specialist' => 'required|integer',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        return redirect()->route('getSearch',['gender'=> $input['gender_type'],'Specialty'=> $input['select_specialist']]);
    }
    public function blogs(){
      $blogs= getRequest($this->url.'/api/blog/getallblogs');
      return view('front.blogs',['url'=>$this->img_url,'blogs'=>$blogs]);
    } 
    public function blogDetails($id){
      $blogs= getRequest($this->url.'/api/blog/getallblogs');
      $filteredBlog = array_filter($blogs, function ($blog) use ($id) {
        return $blog['id'] == $id;
    }); 
      return view('front.blogs-details',['url'=>$this->img_url,'blog'=>$filteredBlog]);
    }
    public function about(){
      return view('front.about');
    }
}
