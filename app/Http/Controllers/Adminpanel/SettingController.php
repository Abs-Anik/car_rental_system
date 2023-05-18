<?php

namespace App\Http\Controllers\Adminpanel;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function index()
    {
        $data = Setting::first();

        return view('adminpanel.pages.setting.index', compact('data'));
    }

    public function store(Request $request)
    {
            $request->validate([
                'title' => 'required|max:25',
                'slogan' => 'required|max:255',
                'shortDescription' => 'required|max:255',
                'longDescription' => 'required',
                'strHomeBanner' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'strVideo' => 'required',
                'experience' => 'required|numeric',
                'strLink' => 'required',
                'strFace' => 'required',
                'strInsta' => 'required',
                'strFooter' => 'required|max:255',
                'strLocation' => 'required',
                'strContact' => 'required',
                'strEmail' => 'required|string|email|max:255',
                'strMap' => 'required',

            ]);

            try {
                DB::beginTransaction();
                $setting = new Setting;
                $setting->title = $request->title;
                $setting->slogan = $request->slogan;
                $setting->shortDescription = $request->shortDescription;
                $setting->longDescription = $request->longDescription;

                if (!empty($request->strHomeBanner)) {
                    $setting->strHomeBanner = UploadHelper::upload('strHomeBanner', $request->strHomeBanner, $request->title . '-' . time() . '-image', 'public/adminpanel/assets/setting/');
                }

                if (!empty($request->strVideo)) {
                    $setting->strVideo = UploadHelper::upload('strVideo', $request->strVideo, $request->title . '-' . time() . '-image', 'public/adminpanel/assets/setting/');
                }

                $setting->experience = $request->experience;
                $setting->strLink = $request->strLink;
                $setting->strFace = $request->strFace;
                $setting->strInsta = $request->strInsta;
                $setting->strFooter = $request->strFooter;
                $setting->strLocation = $request->strLocation;
                $setting->strContact = $request->strContact;
                $setting->strEmail = $request->strEmail;
                $setting->strMap = $request->strMap;

                $setting->save();
                DB::commit();

                $notification = array(
                'Message' => 'Setting Created Successfully!',
                'alert-type' => 'success'
                );
                return redirect()->route('admin.setting.index')->with($notification);

            } catch (\Exception $e) {
                    session()->flash('db_error', $e->getMessage());
                    DB::rollBack();
                    return back();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:25',
            'slogan' => 'required|max:255',
            'shortDescription' => 'required|max:255',
            'longDescription' => 'required',
            'strHomeBanner' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'strVideo' => 'nullable',
            'experience' => 'required|numeric',
            'strLink' => 'required',
            'strFace' => 'required',
            'strInsta' => 'required',
            'strFooter' => 'required|max:255',
            'strLocation' => 'required',
            'strContact' => 'required',
            'strEmail' => 'required|string|email|max:255',
            'strMap' => 'required',

        ]);

        $setting = Setting::where('id', $id)->first();

        try {
            DB::beginTransaction();
            $setting->title = $request->title;
            $setting->slogan = $request->slogan;
            $setting->shortDescription = $request->shortDescription;
            $setting->longDescription = $request->longDescription;

            if (!empty($request->strHomeBanner)) {
                UploadHelper::deleteFile('public/adminpanel/assets/setting/'.$setting->strHomeBanner);
                $setting->strHomeBanner = UploadHelper::upload('strHomeBanner', $request->strHomeBanner, $request->title . '-' . time() . '-image', 'public/adminpanel/assets/setting/',$setting->strHomeBanner);
            }

            if (!empty($request->strVideo)) {
                UploadHelper::deleteFile('public/adminpanel/assets/setting/'.$setting->strVideo);
                $setting->strVideo = UploadHelper::upload('strVideo', $request->strVideo, $request->title . '-' . time() . '-video', 'public/adminpanel/assets/setting/',$setting->strVideo);
            }

            $setting->experience = $request->experience;
            $setting->strLink = $request->strLink;
            $setting->strFace = $request->strFace;
            $setting->strInsta = $request->strInsta;
            $setting->strFooter = $request->strFooter;
            $setting->strLocation = $request->strLocation;
            $setting->strContact = $request->strContact;
            $setting->strEmail = $request->strEmail;
            $setting->strMap = $request->strMap;

            $setting->update();
            DB::commit();

            $notification = array(
            'Message' => 'Setting Updated Successfully!',
            'alert-type' => 'success'
            );
            return redirect()->route('admin.setting.index')->with($notification);

        } catch (\Exception $e) {
                session()->flash('db_error', $e->getMessage());
                DB::rollBack();
                return back();
        }
    }
}
