<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Albums;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        return view('home', compact('user'));
    }

    public function logo()
    {
        return view('logo');
    }
    public function package()
    {
        return view('package');
    }
    public function packagepro()
    {
        return view('packagepro');
    }

    public function logopro()
    {
        return view('logopro');
    }

    
    public function getlogo(Request $request)
    {
        // dd($request);
        try{
            $request->validate([
                'model' => 'required'
            ]);
            $setting = [
                "style" => "Cartoon style with with English text",
                "quality" => "masrtepiece best Quality"
    
            ];
            $st_topic = implode(',', [
                $setting['quality'],
                $request['model'],
                $request['color'],
                $request['topic'],
                // $request['style']
            ]);
            $style = $request['style'];
            // dd($st_topic);
    
            $payload = [
                "key" => "",
                "style" =>"$style",
                "prompt" => "$st_topic",
                "negative_prompt" => "",
                "width" => "1024",
                "height" => "1024",
                "samples" => "5",
                "num_inference_steps" => "20",
                "seed" => null,
                "guidance_scale" => 7.5,
                "safety_checker" => "yes",
                "multi_lingual" => "no",
                "panorama" => "no",
                "self_attention" => "no",
                "upscale" => "no",
                "embeddings_model" => null,
                "webhook" => null,
                "track_id" => null
            ];
    
            $curl = curl_init();
    
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => 'https://api.getimg.ai/v1/essential/text-to-image',
                    
                    // CURLOPT_URL => 'https://api.wizmodel.com/sdapi/v1/txt2img',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => json_encode($payload),
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer key-4W3KhTWAQugubLHJ8c09faQCnoMG5p18iEAdzHBvgtNtM9jU1ekWds5sZRzJcAh8sig3vA0MAUhtKSlBiTcaAQ8REoTJNN7c'
                    ),
                )
            );
            $response = curl_exec($curl);
            curl_close($curl);
            $data = json_decode($response, true);
            // dd($response);
            $img = $data['image'];
            $st_img = json_encode($img);
            // $st_img2 = implode('', $img);
            $decode = base64_decode($st_img);
            // dd($decode);
            $filePath = time() . '.png';
            // $filePath = 'images/';
            $fileName = time() . '.png';
            file_put_contents($filePath, $decode);
            // file_put_contents($filePath, $decode);
    
            // file_put_contents(('images/' . $filename));
    
            // $imageUrl = url('images/' . $filePath);
    
            return view('get', compact('filePath'));
        }catch(Exception $e){
            return back()->withErrors(['message' => 'ข้อผิดพลาด: API Token หมดแล้ว']);
        }
            // dd($request->input());
        
    }
    public function getpackage(Request $request)
    {
        try{
            // dd($request->input());
        $request->validate([
            'model' => 'required'
        ]);
        $setting = [
            "style" => "realistic ,with English text",
            "quality" => "masrtepiece best Quality"

        ];
        $st_topic = implode(',', [
            $setting['quality'],
            $request['model'],
            $request['color'],
            $request['topic'],
            $setting['style']
        ]);
        // dd($st_topic);
        $payload = [
            "key" => "",
            "prompt" => "$st_topic",
            "negative_prompt" => "bad packaging, bad logo,bad quality",
            "width" => "1024",
            "height" => "1024",
            "samples" => "5",
            "num_inference_steps" => "20",
            "seed" => null,
            "guidance_scale" => 7.5,
            "safety_checker" => "yes",
            "multi_lingual" => "no",
            "panorama" => "no",
            "self_attention" => "no",
            "upscale" => "no",
            "embeddings_model" => null,
            "webhook" => null,
            "track_id" => null
        ];

        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.getimg.ai/v1/essential/text-to-image',
                // CURLOPT_URL => 'https://api.wizmodel.com/sdapi/v1/txt2img',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($payload),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    // 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE3MDYzNjA5NzksInVzZXJfaWQiOiI2NWI1MDAyZDk1ZmU2M2U3ZjRhZDk4MzQifQ.5Yh4f-3na-nvVHHk1_dkixbaoz37UIn76encttTbkh4'
                    'Authorization: Bearer key-4W3KhTWAQugubLHJ8c09faQCnoMG5p18iEAdzHBvgtNtM9jU1ekWds5sZRzJcAh8sig3vA0MAUhtKSlBiTcaAQ8REoTJNN7c'
                ),
            )
        );
        $response = curl_exec($curl);
        curl_close($curl);
        // dd($response);
        $data = json_decode($response, true);
        // dd($data);
        $img = $data['image'];
        $st_img = json_encode($img);
        // $st_img2 = implode('', $img);
        $decode = base64_decode($st_img);
        $filePath = time() . '.png';
        $fileName = time() . '.png';
        file_put_contents($filePath, $decode);

        return view('showpackage', compact('filePath'));
        }catch(Exception $e){
            return back()->withErrors(['message' => 'ข้อผิดพลาด: API Token หมดแล้ว']);
        }
        
    }
    

    public function getlogopro(Request $request)
    {
        try{
            $request->validate([
                'model' => 'required'
            ]);
            $setting = [
                "style" => "Realistic with text",
                "quality" => "masrtepiece best Quality"
    
            ];
            $st_topic = implode(',', [
                $setting['quality'],
                $request['model'],
                $request['topic'],
                $setting['style']
            ]);
            $payload = [
    
                "key" => "DFqLKz4ctK1TVCUT1RSZAIoGxUzcnE1fnIrxtR1TsOSNsTXVSGlbQ9aZLYFc",
                "prompt" => "$st_topic",
                "negative_prompt" => null,
                "width" => "1024",
                "height" => "1024",
                "samples" => "1",
                "num_inference_steps" => "20",
                "seed" => null,
                "guidance_scale" => 7.5,
                "safety_checker" => "yes",
                "multi_lingual" => "no",
                "panorama" => "no",
                "self_attention" => "no",
                "upscale" => "no",
                "embeddings_model" => null,
                "webhook" => null,
                "track_id" => null
            ];
    
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://stablediffusionapi.com/api/v3/text2img',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($payload),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            // dd($response);
            $filePath = json_decode($response,true);
            $images = $filePath['proxy_links'];
            return view('getpro', compact('images'));
        }
        catch(Exception $e){
            return back()->withErrors(['message' => 'ข้อผิดพลาด: API Token หมดแล้ว']);
        }
        
    }
    public function getpackagepro(Request $request)
    {
        try{
            $request->validate([
                'model' => 'required'
            ]);
            $setting = [
                "style" => "Realistic with text",
                "quality" => "masrtepiece best Quality"
    
            ];
            $st_topic = implode(',', [
                $setting['quality'],
                $request['model'],
                $request['color'],
                $request['topic'],
                $setting['style']
            ]);
            $payload = [
    
                "key" => "DFqLKz4ctK1TVCUT1RSZAIoGxUzcnE1fnIrxtR1TsOSNsTXVSGlbQ9aZLYFc",
                "prompt" => "$st_topic",
                "negative_prompt" => "bad packaging, bad logo,bad quality, bad layouts",
                "width" => "1024",
                "height" => "1024",
                "samples" => "1",
                "num_inference_steps" => "20",
                "seed" => null,
                "guidance_scale" => 7.5,
                "safety_checker" => "yes",
                "multi_lingual" => "no",
                "panorama" => "no",
                "self_attention" => "no",
                "upscale" => "no",
                "embeddings_model" => null,
                "webhook" => null,
                "track_id" => null
            ];
    
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://stablediffusionapi.com/api/v3/text2img',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($payload),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $filePath = json_decode($response,true);
            $images = $filePath['proxy_links'];
            return view('showpackagepro', compact('images'));
        }catch(Exception $e){
            return back()->withErrors(['message' => 'ข้อผิดพลาด: API Token หมดแล้ว']);
        }
        
    }
    
    public function savepic(Request $request)
    {
        $imageData = $request->input('imageData');

        $album = new Albums();
        $album->user_id = $request->input('user_id');
        $album->image = $imageData;
        $album->image_name = 'ชื่อรูปภาพที่คุณต้องการ';
        $album->save();
        return redirect()->route('albums',['user_id'=>$request->input('user_id')]);
    }

    public function savepicpro(Request $request)
    {
        $imageData = $request->input('imageData');

        $album = new Albums();
        $album->user_id = $request->input('user_id');
        $album->image = $imageData;
        $album->image_name = 'ชื่อรูปภาพที่คุณต้องการ';
        $album->save();
        return redirect()->route('albums',['user_id'=>$request->input('user_id')]);
    }
    public function showAlbums($user_id) {
        $albums = Albums::where('user_id',$user_id)->get(); //find id
        return view('albums', ['albums' => $albums]);
    }

    public function destroy($image,$id){
        $user_id = $id;
        $images = Albums::where('image_id',$image);
        $images->delete();
        return redirect()->route('albums',['user_id'=>$user_id]);
    }
}
