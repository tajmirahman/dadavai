<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\OfferCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class OfferCategoryController extends Controller
{
    public function OfferCategory(){

        $offerCategorys= OfferCategory::all();
        return view('admin.pages.offer.all_offercategory',compact('offerCategorys'));
    }// end

    //store
    public function StoreOfferCategory(Request $request){
        $validator = $request->validate(

            [
                'offer_category_name' => 'required|max:255',
                'offer_category_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'offer_category_name.required' => 'The Brand Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('offer_category_image');
            $imgPath = storage_path('app/public/offercategory');

            $iconmainFile = $request->file('icon_image'); ///////
            $iconimgPath = storage_path('app/public/offercategory'); //////

            ////////
            if (empty($iconmainFile)) {

                $globalFunIconImg['file_name'] = '';

            } else {
                $globalFunIconImg = customUpload($iconmainFile, $iconimgPath);
                $globalFunIconImg['file_name'] = $globalFunIconImg['file_name'];
            }
            /////////////////////



            if (empty($mainFile)) {

                OfferCategory::create([

                    'offer_category_name' => $request->offer_category_name,


                ]);
            } else {

                $globalFunImg = customUpload($mainFile, $imgPath);

                if ($globalFunImg['status'] == 1) {
                    OfferCategory::create([

                        'offer_category_name' => $request->offer_category_name,

                        'offer_category_image' => $globalFunImg['file_name'],

                        'icon_image' => $globalFunIconImg['file_name'], ////////

                    ]);
                } else {


                    return redirect()->back()->with('error','Image upload failed! plz try again');
                }
            }

        }

        return redirect()->route('offer.category')->with('success','Offer Category Created Successfully');
    }// end


    // update
    public function UpdateOfferCategory(Request $request){

        $offercat = OfferCategory::findOrFail($request->id);

        $validator = $request->validate(

            [
                'offer_category_name' => 'required|max:255',
                'category_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'offer_category_name.required' => 'Category Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('offer_category_image');
            $uploadPath = storage_path('app/public/offercategory');

            $iconmainFile = $request->file('icon_image'); ///////
            $iconimgPath = storage_path('app/public/offercategory'); //////

            if (isset($mainFile)) {
                $globalFunImg = customUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            ////////////
            if (isset($iconmainFile)) {
                $globalFunIconImg = customUpload($iconmainFile, $iconimgPath);
            } else {
                $globalFunIconImg['status'] = 0;
            }
            /////////////

            if (!empty($offercat)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/offercategory/requestImg/') . $offercat->offer_category_image)) {
                        File::delete(public_path('storage/offercategory/requestImg/') . $offercat->offer_category_image);
                    }
                    if (File::exists(public_path('storage/offercategory/') . $offercat->offer_category_image)) {
                        File::delete(public_path('storage/offercategory/') . $offercat->offer_category_image);
                    }
                }

                ///////////

                if ($globalFunIconImg['status'] == 1) {
                    if (File::exists(public_path('storage/offercategory/requestImg/') . $offercat->icon_image)) {
                        File::delete(public_path('storage/offercategory/requestImg/') . $offercat->icon_image);
                    }
                    if (File::exists(public_path('storage/offercategory/') . $offercat->icon_image)) {
                        File::delete(public_path('storage/offercategory/') . $offercat->icon_image);
                    }
                }

                ////////

                $offercat->update([

                    'offer_category_name' => $request->offer_category_name,

                    'offer_category_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $offercat->offer_category_image,

                    'icon_image' => $globalFunIconImg['status'] == 1 ? $globalFunIconImg['file_name'] : $offercat->icon_image, ////

                ]);
            }
        }


        return redirect()->route('offer.category')->with('success','Offer Category Update Successfully');

    }// end

    // delete
    public function DeleteOfferCategory($id){

        $offerCat = OfferCategory::find($id);

        if (File::exists(public_path('storage/offercategory/requestImg/') . $offerCat->offer_category_image)) {
            File::delete(public_path('storage/offercategory/requestImg/') . $offerCat->offer_category_image);
        }

        if (File::exists(public_path('storage/offercategory/') . $offerCat->offer_category_image)) {
            File::delete(public_path('storage/offercategory/') . $offerCat->offer_category_image);
        }

        $offerCat->delete();


        return redirect()->route('offer.category')->with('success','Offer Category Delete Successfully');

    }// end

    public function InactiveOffer($id){

        OfferCategory::findOrFail($id)->update([
            'status'=> '0',
        ]);
        return redirect()->route('offer.category')->with('success','Offer Category Inactive Successfully');

    }// end methods

    public function ActiveOffer($id){

        OfferCategory::findOrFail($id)->update([
            'status'=> '1',
        ]);
        return redirect()->route('offer.category')->with('success','Offer Category Active Successfully');

    }// end methods

}
