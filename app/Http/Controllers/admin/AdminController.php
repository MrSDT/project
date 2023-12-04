<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\KycData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.users', ['users' => $users]);
    }

    public function kyc()
    {
        $data = KycData::latest()->get();
        return view('admin.kyc.kyc', ['data' => $data]);
    }

    public function kyc_review($id)
    {
        $kycDetails = KycData::all()->find($id);
        return view('admin.kyc.kyc_review', ['kycDetails' => $kycDetails]);
    }


    public function kyc_update(Request $request, $id)
    {
        $kycdata = KycData::findOrFail($id);
        if ($request->isMethod('post'))
        {
            // Verify KYC
            if ($kycdata->verified == 0)
            {
                $kycdata->update(['verified' => 1]);
            }
            else
            {
                $kycdata->update(['verified' => 0]);
            }
        }
        elseif ($request->isMethod('delete'))
        {
            // Delete KYC
            $kycdata->delete();
        }
        return redirect()->route('admin.kyc')->with('success', 'KYC Updated');
    }

    // Advertise Section

    public function categories()
    {
        $category = Category::all();

        return view('admin.advertise.categoryList', ['category' => $category]);
    }

    public function categories_create()
    {
        return view('admin.advertise.category_create');
    }

    public function categories_store(Request $request)
    {
        $validate = $request->validate([
            'categoryName' => 'required|max:255'
        ]);
        Category::create($validate);

        return redirect()->route('admin.categories')->with('success', 'Category Created');
    }

    public function categories_edit($id)
    {
        $category = Category::all()->find($id);
        return view('admin.advertise.categories_edit', ['category' => $category]);
    }

    public function categories_update(Request $request, $id)
    {
        $validate = $request->validate([
            'categoryName' => 'required|max:255'
        ]);
        $category = Category::find($id);
        
        $category->update($validate);
        return redirect()->route('admin.categories')->with('success' , 'Category Updated');
    }

    public function categories_delete($id)
    {
        $category = Category::findorfail($id);
        $category->delete();
        return redirect()->route('admin.categories')->with('success' , 'Category Deleted');
    }

}
