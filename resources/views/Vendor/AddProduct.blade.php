@extends('themelayout.app')
@section('content')
  <!-- sa-app -->
  <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
      @include('themelayout.sidebar')
       <!-- sa-app__content -->
       <div class="sa-app__content">
       @include('themelayout.header')
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>
       <style>
           .bootstrap-tagsinput .tag {
            background: gray;
            padding: 4px;
            font-size: 14px;
            border-radius: 3px;
            }
            .upload {
  &__inputfile {
    width: .1px;
    height: .1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  
  &__btn {
    display: inline-block;
    cursor: pointer;    
  }

  &__img {
    &-wrap {
      display: flex;
      flex-wrap: wrap;
      margin: 0 -10px;
    }
    
    &-box {
      width: 200px;
      padding: 0 10px;
      margin-bottom: 12px;
    }
    
    &-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;

        &:after {
          content: '\2716';
          font-size: 14px;
          color: white;
        }
      }
  }
}

.img-bg {
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  position: relative;
  padding-bottom: 100%;
}
</style>

<!-- sa-app__body -->
         <div id="top" class="sa-app__body">
                    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                        <div class="container">
                            <div class="py-5">
                                <div class="row g-4 align-items-center">
                                    <div class="col">
                                        <nav class="mb-2" aria-label="breadcrumb">
                                            <ol class="breadcrumb breadcrumb-sa-simple">
                                                <li class="breadcrumb-item"><a href="{{route('vendor.home')}}">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('products')}}">Products</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">@if(isset($product)) Edit @else Add @endif Product</li>
                                            </ol>
                                        </nav>
                                        <h1 class="h3 m-0">@if(isset($product)) Edit @else Add @endif Product</h1>
                                    </div>
                                    <div class="col-auto d-flex">
                                        <a href="#" class="btn btn-secondary me-3">Duplicate</a>
                                        <a onclick="changeHtmlContent();" class="btn btn-primary">@if(isset($product)) {{__('Update')}} @else {{__('Save')}} @endif</a>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-danger errordescription d-none" >
                                <p>Product description required</p>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                                @endif
                                @if(Session::has('message'))
                                <div class="alert alert-success">
                                {{ Session::get('message') }}
                                </div>
                                @endif
                            <form action="@if(isset($product)) {{route('update.product')}} @else {{route('save.product')}} @endif" method="post" id="product-form" enctype="multipart/form-data"> 
                                @csrf
                            <div class="sa-entity-layout" data-sa-container-query='{"920":"sa-entity-layout--size--md","1100":"sa-entity-layout--size--lg"}'>
                                <div class="sa-entity-layout__body">
                                    <div class="sa-entity-layout__main">
                                        <div class="card">
                                            <div class="card-body p-5">
                                                <div class="mb-5"><h2 class="mb-0 fs-exact-18">Basic information</h2></div>
                                                @if(isset($product)) <input type="hidden" value="{{$product->id}}" name="id"> @else  @endif
                                                <div class="mb-4">
                                                    <label for="form-product/name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="form-product/name" name="name" value="@if(isset($product)) {{$product->name}} @else {{ old('name') }} @endif">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="form-product/slug" class="form-label">Slug</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <span class="input-group-text" id="form-product/slug-addon">https://example.com/products/</span>
                                                       
                                                            <?php 
                                                            if(isset($category)){
                                                            $slug= str_replace("-"," ","$category->slug");
                                                                }
                                                                ?>
                                                             <input
                                                            type="text"
                                                            class="form-control"
                                                            id="form-product/slug"
                                                            aria-describedby="form-product/slug-addon form-product/slug-help"
                                                            name="slug"
                                                            value="@if(isset($category)) {{$slug}} @else {{ old('slug') }} @endif"
                                                        />
                                                    </div>
                                                    <div id="form-product/slug-help" class="form-text">
                                                        Unique human-readable product identifier. No longer than 255 characters.
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="form-product/description" class="form-label">Description</label>
                                                    <textarea id="form-product/description" class="sa-quill-control form-control textareacontent" name="product_description" rows="7">@if(isset($product)) {{$product->description}} @else {{{old('product_description')}}} @endif</textarea>
                                                </div>
                                                <div>
                                                    <label for="form-product/short-description" class="form-label">Short description</label>
                                                    <textarea id="form-product/short-description" class="form-control" name="short_description" rows="2">{{{old('short_description')}}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-5">
                                            <div class="card-body p-5">
                                                <div class="mb-5"><h2 class="mb-0 fs-exact-18">Pricing</h2></div>
                                                <div class="row g-4">
                                                    <div class="col">
                                                        <label for="form-product/price" class="form-label">Price</label>
                                                        <input type="number" class="form-control" id="form-product/price" name="price" value="@if(isset($product)){{$price}}@else{{ old('price') }}@endif" />
                                                    </div>
                                                    <div class="col">
                                                        <label for="form-product/old-price" class="form-label">Old price</label>
                                                        <input type="number" class="form-control" id="form-product/old-price" name="old_price" value="@if(isset($product)){{$old_price}}@else{{ old('old_price') }}@endif" />
                                                    </div>
                                                </div>
                                                <div class="mt-4 mb-n2"><a href="#">Schedule discount</a></div>
                                            </div>
                                        </div>
                                        <div class="card mt-5">
                                            <div class="card-body p-5">
                                                <div class="mb-5"><h2 class="mb-0 fs-exact-18">Inventory</h2></div>
                                                <div class="mb-4">
                                                    <label for="form-product/sku" class="form-label">SKU</label>
                                                    <input type="text" class="form-control" id="form-product/sku"  name="stock" value="@if(isset($product)) {{$stock}} @else {{ old('stock') }} @endif" />
                                                </div>
                                                <div class="mb-4 pt-2">
                                                    <label class="form-check">
                                                        <input type="checkbox" class="form-check-input" />
                                                        <span class="form-check-label">Enable stock management</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label for="form-product/quantity" class="form-label">Stock quantity</label>
                                                    <input type="number" class="form-control" id="form-product/quantity" name="stock_quantity" value="@if(isset($product)){{$stock_quantity}}@else{{ old('stock_quantity') }}@endif"  />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-5">
                                            <div class="card-body p-5">
                                                <div class="mb-5"><h2 class="mb-0 fs-exact-18">Images</h2></div>
                                            </div>
                                            <div class="mt-n5">
                                            <div class="upload__box">
  <div class="upload__btn-box">
    <label class="upload__btn">
      <p>Upload images</p>
      <input type="file" multiple="" data-max_length="20" class="upload__inputfile">
    </label>
  </div>
  <div class="upload__img-wrap"></div>
</div>
                                                <!-- <div class="sa-divider"></div> -->
                                                <!-- <div class="table-responsive">
                                                    <table class="sa-table">
                                                        <thead>
                                                            <tr>
                                                                <th class="w-min">Image</th>
                                                                <th class="min-w-10x">Alt text</th>
                                                                <th class="w-min">Order</th>
                                                                <th class="w-min"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                        <img src="images/products/product-16-1-40x40.jpg" width="40" height="40" alt="" />
                                                                    </div>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" /></td>
                                                                <td><input type="number" class="form-control form-control-sm w-4x" value="0" /></td>
                                                                <td>
                                                                    <button
                                                                        class="btn btn-sa-muted btn-sm mx-n3" type="button" aria-label="Delete image" data-bs-toggle="tooltip"
                                                                        data-bs-placement="right"  title="Delete image" >
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                                                            fill="currentColor">
                                                                            <path
                                                                                d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z"
                                                                            ></path>
                                                                        </svg>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="sa-divider"></div>
                                                <div class="px-5 py-4 my-2"><a href="#">Upload new image</a></div> -->
                                            </div>
                                        </div>
                                        <div class="card mt-5">
                                            <div class="card-body p-5">
                                                <div class="mb-5">
                                                    <h2 class="mb-0 fs-exact-18">Search engine optimization</h2>
                                                    <div class="mt-3 text-muted">
                                                        Provide information that will help improve the snippet and bring your product to the top of search
                                                        engines.
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="form-product/seo-title" class="form-label">Page title</label>
                                                    <input type="text" class="form-control" id="form-product/seo-title" name="meta_title"  value="@if(isset($product)){{$product->meta_title}}@else{{ old('meta_title') }}@endif"  />
                                                </div>
                                                <div>
                                                    <label for="form-product/seo-description" class="form-label">Meta description</label>
                                                    <textarea id="form-product/seo-description" class="form-control" rows="2" name="meta_description"  value="@if(isset($product)){{$product->meta_description}}@else{{ old('meta_description') }}@endif"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sa-entity-layout__sidebar">
                                        <div class="card w-100">
                                            <div class="card-body p-5">
                                                <div class="mb-5"><h2 class="mb-0 fs-exact-18">Visibility</h2></div>
                                                <div class="mb-4">
                                                    <label class="form-check">
                                                        <input type="radio" class="form-check-input" value="Published" name="visibility" @if(isset($product) && $product->visibility =='Published') checked @else  @endif checked/>
                                                        <span class="form-check-label">Published</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input type="radio" class="form-check-input" name="visibility" value="Scheduled" @if(isset($product) && $product->visibility =='Scheduled') checked @else  @endif />
                                                        <span class="form-check-label">Scheduled</span>
                                                    </label>
                                                    <label class="form-check mb-0">
                                                        <input type="radio" class="form-check-input" name="visibility" value="Hidden" @if(isset($product) && $product->visibility =='Hidden') checked @else  @endif/>
                                                        <span class="form-check-label">Hidden</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label for="form-product/seo-title" class="form-label">Publish date</label>
                                                    <input
                                                        type="text"
                                                        class="form-control datepicker-here"
                                                        id="form-product/publish-date"
                                                        data-auto-close="true"
                                                        data-language="en"
                                                        name="publish_date"
                                                        value="@if(isset($product)) {{$product->publish_date}} @else {{ old('publish_date') }} @endif"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card w-100 mt-5">
                                            <div class="card-body p-5">
                                                <div class="mb-5"><h2 class="mb-0 fs-exact-18">Categories</h2></div>
                                                <select class="sa-select2 form-select" multiple="" name="categories[]">
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->name}}">{{$category->name}}</option>
                                                        @endforeach
                                                </select>
                                                <div class="mt-4 mb-n2"><a href="{{route('add.category')}}">Add new category</a></div>
                                            </div>
                                        </div>
                                        <div class="card w-100 mt-5">
                                            <div class="card-body p-5">
                                                <div class="mb-5"><h2 class="mb-0 fs-exact-18">Tags</h2></div>
                                                <input class=" form-select" type="text" data-role="tagsinput" name="tags[]"  multiple="">
                                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             </form>
                        </div>
                    </div>
                </div>
                <!-- sa-app__body / end -->   
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

                    <script>
                        jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
                    var loadFile = function(event) {
                        var reader = new FileReader();
                        reader.onload = function(){
                        var output = document.getElementById('output');
                        output.src = reader.result;
                        };
                        reader.readAsDataURL(event.target.files[0]);


                    };
                    $(".removeimage").click(function(){
                        $('#output').attr('src', 'images/products/product-7-320x320.jpg');
                                        
                    });
                    function changeHtmlContent(ctrl) {
                        var a =document.querySelectorAll('.ql-editor p')[0].firstChild.nodeValue;
                        
                        if(a==null){
                            $(".errordescription").removeClass("d-none");
                            var a =document.querySelectorAll('.ql-editor p span')[0].firstChild.nodeValue;
                        }
                        $(".textareacontent").val(a);
                    document.getElementById('product-form').submit();
                    }

                    </script>
        @include('themelayout.footer')
                </div>
            <!-- sa-app__content / end -->

            <!-- sa-app__toasts -->
            <div class="sa-app__toasts toast-container bottom-0 end-0"></div>
            <!-- sa-app__toasts / end -->

        </div>
        <!-- sa-app / end -->
@endsection