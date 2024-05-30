<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Offer;
use App\Models\Admin\OfferCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class OfferController extends Controller
{
    public function AllOffer(){

        $offers= Offer::all();
        $offercats= OfferCategory::latest()->get();
        return view('admin.pages.offer.all_offer',compact('offers','offercats'));
    }// end

    // store
    public function StoreOffer(Request $request){

        $mainFile = $request->file('offer_image');
        $imgPath = storage_path('app/public/offer_image');

        if (empty($mainFile)) {

            Offer::insert([

                'name' => $request->name,
                'slug' => Str::slug($request->name, "-"),

                'offer_category_id' => $request->offer_category_id,

                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'discount_percentage' => $request->discount_percentage,

                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,

            ]);
        } else {

            $globalFunImg =customUpload($mainFile, $imgPath);

            if ($globalFunImg['status'] == 1) {
                Offer::insert([

                    'name' => $request->name,
                    'slug' => Str::slug($request->name, "-"),

                    'offer_category_id' => $request->offer_category_id,

                    'price' => $request->price,
                    'discount_price' => $request->discount_price,
                    'discount_percentage' => $request->discount_percentage,

                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'description' => $request->description,

                    'offer_image' => $globalFunImg['file_name'],

                ]);
            } else {
                // toastr()->warning('Image upload failed! plz try again.');
            }
        }

        return redirect()->route('all.offer')->with('success','Offer Created Successfully');

    }// end

    //update
    public function UpdateOffer(Request $request){

        $offer = Offer::findOrFail($request->id);

        $mainFile = $request->file('offer_image');

        $uploadPath = storage_path('app/public/offer_image');

        if (isset($mainFile)) {
            $globalFunImg = customUpload($mainFile, $uploadPath);
        } else {
            $globalFunImg['status'] = 0;
        }

        if (!empty($offer)) {

            if ($globalFunImg['status'] == 1) {
                if (File::exists(public_path('storage/offer_image/requestImg/') . $offer->offer_image)) {
                    File::delete(public_path('storage/offer_image/requestImg/') . $offer->offer_image);
                }
                if (File::exists(public_path('storage/offer_image/') . $offer->offer_image)) {
                    File::delete(public_path('storage/offer_image/') . $offer->offer_image);
                }
            }

            $offer->update([

                'name' => $request->name,
                'slug' => Str::slug($request->name, "-"),

                'offer_category_id' => $request->offer_category_id,

                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'discount_percentage' => $request->discount_percentage,

                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,

                'offer_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $offer->offer_image,

            ]);
        }

        return redirect()->route('all.offer')->with('success','Offer Update Successfully');

    }// end

    public function DeleteOffer($id){

        $offer = Offer::find($id);

        if (File::exists(public_path('storage/offer_image/requestImg/') . $offer->offer_image)) {
            File::delete(public_path('storage/offer_image/requestImg/') . $offer->offer_image);
        }

        if (File::exists(public_path('storage/offer_image/') . $offer->offer_image)) {
            File::delete(public_path('storage/offer_image/') . $offer->offer_image);
        }

        $offer->delete();

        return redirect()->route('all.offer')->with('success','Offer Delete Successfully');


    }// end

    public function InactiveOffer($id){
        Offer::findOrFail($id)->update([
            'status'=> '0',
        ]);

        return redirect()->route('all.offer')->with('success','Offer Inactive Successfully');
    }// end

    public function ActiveOffer($id){
        Offer::findOrFail($id)->update([
            'status'=> '1',
        ]);

        return redirect()->route('all.offer')->with('success','Offer Active Successfully');
    }// end

}
