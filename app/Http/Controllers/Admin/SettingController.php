<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SeoSetting;
use App\Models\Admin\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function AllSetting(){

        $settings= Setting::latest()->get();
        return view('admin.pages.setting.all_setting',compact('settings'));
    }// end

    public function EditSetting($id){

        $setting= Setting::find($id);
        return view('admin.pages.setting.edit_setting',compact('setting'));
    }// end

    public function UpdateSetting(Request $request){

        $update= Setting::find($request->id);

        $update->site_name = $request->site_name;
        $update->company_name = $request->company_name;
        $update->site_slogan = $request->site_slogan;
        $update->phone_one = $request->phone_one;
        $update->phone_two = $request->phone_two;
        $update->whatsapp_number = $request->whatsapp_number;
        $update->address = $request->address;
        $update->default_language = $request->default_language;
        $update->contact_email = $request->contact_email;
        $update->support_email = $request->support_email;
        $update->facebook_url = $request->facebook_url;
        $update->youtube_url = $request->youtube_url;


        if ($request->file('logo_white')) {
            $file = $request->file('logo_white');
            @unlink(public_path('upload/logo_white/' . $update->logo_white));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/logo_white/'), $filename);
            $update['logo_white'] = $filename;
        }

        if ($request->file('logo_black')) {
            $file = $request->file('logo_black');
            @unlink(public_path('upload/logo_black/' . $update->logo_black));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/logo_black/'), $filename);
            $update['logo_black'] = $filename;
        }

        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            @unlink(public_path('upload/favicon/' . $update->favicon));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/favicon/'), $filename);
            $update['favicon'] = $filename;
        }

        $update->save();

        return redirect()->route('all.setting')->with('success','setting update');

    }// end



    /////////////////////////////////////


    public function AllSeo(){

        $seosetting= SeoSetting::latest()->get();
        return view('admin.pages.setting.seo_setting',compact('seosetting'));
    }

    public function EditSeoSetting($id){

        $seo= SeoSetting::find($id);
        return view('admin.pages.setting.edit_seo',compact('seo'));

    }// end

    public function SeoUpdate(Request $request){

        $seoupdate= SeoSetting::find($request->id);

        $seoupdate->meta_title = $request->meta_title;
        $seoupdate->meta_author = $request->meta_author;
        $seoupdate->meta_keyword = $request->meta_keyword;
        $seoupdate->meta_description = $request->meta_description;

        $seoupdate->save();

        return redirect()->route('all.seo')->with('success','setting update');

    }// end




}
