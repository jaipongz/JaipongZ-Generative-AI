<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;

class DasboardController extends Controller
{
    public function showDashboard()
    {
        $dash = Dashboard::all();
        return view('dashboard', ['dash' => $dash]);
    }
    public function Upload(Request $request)
    {
        // dd($request->input());
        $dash = new Dashboard();
        $dash->user_name = $request->input('user_name');
        $dash->image = $request->input('image');
        $dash->user_id = $request->input('user_id');
        try {
            $dash->save();
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            // เมื่อเกิดข้อผิดพลาดเนื่องจาก unique index
            // ให้คืนค่ากลับไปยังหน้าก่อนหน้านี้
            return back()->withErrors(['message' => 'ข้อผิดพลาด: คุณอัปโหลดรูปภาพนี้ไปแล้ว']);
        }
        
    }
}
