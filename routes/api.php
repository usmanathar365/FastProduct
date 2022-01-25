<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//////////////////  Category ///////////////////////////////////

Route::get('get-Categories', 'Api\CategoryController@Categories');
Route::post('SaveCategory', 'Api\CategoryController@SaveCategory');
Route::post('UpdateCategory', 'Api\CategoryController@UpdateCategory');
Route::post('DeleteCategory',  'Api\CategoryController@DeleteCategory');

//////////////////  Sub_Category ///////////////////////////////////

Route::get('get-Sub-Categories', 'Api\SubCategoryController@SubCategories');
Route::post('Save-Sub-Category', 'Api\SubCategoryController@SaveSubCategory');
Route::post('Update-Sub-Category', 'Api\SubCategoryController@UpdateSubCategory');
Route::post('Delete-Sub-Category',  'Api\SubCategoryController@DeleteSubCategory');

//////////////////  Brand  ///////////////////////////////////

Route::get('get-Brands', 'Api\BrandController@Brands');
Route::post('SaveBrand', 'Api\BrandController@SaveBrand');
Route::post('UpdateBrand', 'Api\BrandController@UpdateBrand');
Route::post('DeleteBrand',  'Api\BrandController@DeleteBrand');

//////////////////  Review  ///////////////////////////////////

Route::get('get-All-Reviews', 'Api\ReviewController@Reviews');
Route::post('Save-Review', 'Api\ReviewController@SaveReview');
Route::post('Update-Review', 'Api\ReviewController@UpdateReview');
Route::post('Delete-Review',  'Api\ReviewController@DeleteReview');

//////////////////  Color  ///////////////////////////////////

Route::get('get-All-Colors', 'Api\ColorController@Colors');
Route::post('Save-Color', 'Api\ColorController@SaveColor');
Route::post('Update-Color', 'Api\ColorController@UpdateColor');
Route::post('Delete-Color',  'Api\ColorController@DeleteColor');

//////////////////  Attribute  ///////////////////////////////////

Route::get('get-All-Attributes', 'Api\AttributeController@Attributes');
Route::post('Save-Attribute', 'Api\AttributeController@SaveAttribute');
Route::post('Update-Attribute', 'Api\AttributeController@UpdateAttribute');
Route::post('Delete-Attribute',  'Api\AttributeController@DeleteAttribute');

//////////////////  Branch  ///////////////////////////////////

Route::get('get-All-Branches', 'Api\BranchController@Branches');
Route::post('Save-Branch', 'Api\BranchController@SaveBranch');
Route::post('Update-Branch', 'Api\BranchController@UpdateBranch');
Route::post('Delete-Branch',  'Api\BranchController@DeleteBranch');

//////////////////  Customer  ///////////////////////////////////

Route::get('get-All-Customers', 'Api\CustomerController@Customers');
Route::post('Save-Customer', 'Api\CustomerController@SaveCustomer');
Route::post('Update-Customer', 'Api\CustomerController@UpdateCustomer');
Route::post('Delete-Customer',  'Api\CustomerController@DeleteCustomer');

////////////////// Product //////////////////////////////////

Route::get('get-Products', 'Api\ProductController@GetProducts');
