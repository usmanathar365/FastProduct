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

//////////////////  Size  ///////////////////////////////////

Route::get('get-All-Sizes', 'Api\SizeController@Sizes');
Route::post('Save-Size', 'Api\SizeController@SaveSize');
Route::post('Update-Size', 'Api\SizeController@UpdateSize');
Route::post('Delete-Size',  'Api\SizeController@DeleteSize');

//////////////////  Attribute  ///////////////////////////////////

Route::get('get-All-Attributes', 'Api\AttributeController@Attributes');
Route::post('Save-Attribute', 'Api\AttributeController@SaveAttribute');
Route::post('Update-Attribute', 'Api\AttributeController@UpdateAttribute');
Route::post('Delete-Attribute',  'Api\AttributeController@DeleteAttribute');

//////////////////  Branch  ///////////////////////////////////

Route::get('get-All-Branches','Api\BranchController@Branches');
Route::post('Save-Branch',    'Api\BranchController@SaveBranch');
Route::post('Update-Branch',  'Api\BranchController@UpdateBranch');
Route::post('Delete-Branch',  'Api\BranchController@DeleteBranch');

//////////////////  Customer  ///////////////////////////////////

Route::get('get-All-Customers', 'Api\CustomerController@Customers');
Route::post('Save-Customer',    'Api\CustomerController@SaveCustomer');
Route::post('Update-Customer',  'Api\CustomerController@UpdateCustomer');
Route::post('Delete-Customer',  'Api\CustomerController@DeleteCustomer');

//////////////////  Coupon  ///////////////////////////////////

Route::get('get-All-Coupons', 'Api\CouponController@Coupons');
Route::post('Save-Coupon',    'Api\CouponController@SaveCoupon');
Route::post('Update-Coupon',  'Api\CouponController@UpdateCoupon');
Route::post('Delete-Coupon',  'Api\CouponController@DeleteCoupon');

//////////////////  Credit Cards  ///////////////////////////////////

Route::get('get-All-CreditCards', 'Api\CreditCardController@CreditCards');
Route::post('Save-CreditCard',    'Api\CreditCardController@SaveCreditCard');
Route::post('Update-CreditCard',  'Api\CreditCardController@UpdateCreditCard');
Route::post('Delete-CreditCard',  'Api\CreditCardController@DeleteCreditCard');

//////////////////  Order Detail ///////////////////////////////////

Route::get('get-All-OrderDetails', 'Api\OrderDetailController@OrderDetails');
Route::post('Save-OrderDetail',    'Api\OrderDetailController@SaveOrderDetail');
Route::post('Update-OrderDetail',  'Api\OrderDetailController@UpdateOrderDetail');
Route::post('Delete-OrderDetail',  'Api\OrderDetailController@DeleteOrderDetail');

//////////////////  Order  ///////////////////////////////////

Route::get('get-All-Orders', 'Api\OrderController@Orders');
Route::post('Save-Order',    'Api\OrderController@SaveOrder');
Route::post('Update-Order',  'Api\OrderController@UpdateOrder');
Route::post('Delete-Order',  'Api\OrderController@DeleteOrder');

//////////////////  Profit Margin  ///////////////////////////////////

Route::get('get-All-ProfitMargins', 'Api\ProfitMarginController@ProfitMargins');
Route::post('Save-ProfitMargin',    'Api\ProfitMarginController@SaveProfitMargin');
Route::post('Update-ProfitMargin',  'Api\ProfitMarginController@UpdateProfitMargin');
Route::post('Delete-ProfitMargin',  'Api\ProfitMarginController@DeleteProfitMargin');

////////////////// Product //////////////////////////////////

Route::get('get-Products', 'Api\ProductController@GetProducts');
Route::post('Save-Product',    'Api\ProductController@SaveProduct');
Route::post('Update-Product',  'Api\ProductController@UpdateProduct');
Route::post('Delete-Product',  'Api\ProductController@DeleteProduct');

////////////////// Product Detail ///////////////////////////////

Route::get('get-ProductDetails',     'Api\ProductDetailController@GetProductDetails');
Route::post('Save-ProductDetail',    'Api\ProductDetailController@SaveProductDetail');
Route::post('Update-ProductDetail',  'Api\ProductDetailController@UpdateProductDetail');
Route::post('Delete-ProductDetail',  'Api\ProductDetailController@DeleteProductDetail');