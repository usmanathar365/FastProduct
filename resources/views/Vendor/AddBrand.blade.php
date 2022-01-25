@extends('themelayout.app')
   
@section('content')
 
  <!-- sa-app -->
  <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
      @include('themelayout.sidebar')
       <!-- sa-app__content -->
       <div class="sa-app__content">
       @include('themelayout.header')
        <style>
            .filehover:hover{
                text-decoration: underline;
            }
            </style>
            <!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                        <div class="container container--max--xl">
                            <div class="py-5">
                                <div class="row g-4 align-items-center">
                                    <div class="col">
                                        <nav class="mb-2" aria-label="breadcrumb">
                                            <ol class="breadcrumb breadcrumb-sa-simple">
                                                <li class="breadcrumb-item"><a href="{{route('vendor.home')}}">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('brand')}}">Brands</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">@if(isset($brand)) Edit @else Add @endif Brand</li>
                                            </ol>
                                        </nav>
                                        <h1 class="h3 m-0">@if(isset($brand)) Edit @else Add @endif Brand</h1>
                                    </div>
                                    
                                    <div class="col-auto d-flex">
                                        <a href="#" class="btn btn-secondary me-3">Duplicate</a>
                                        <a class="btn btn-primary" onclick="changeHtmlContent();">
                                         @if(isset($brand)) {{_('Update')}} @else {{_('Save')}} @endif</a>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-danger errordescription d-none" >
                                <p>Brand description required</p>
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
                            <form action="@if(isset($category)) {{route('update.brand')}} @else {{route('save.brand')}} @endif" method="post" id="brand-form" enctype="multipart/form-data"> 
                                @csrf
                            <div class="sa-entity-layout" data-sa-container-query='{"920":"sa-entity-layout--size--md","1100":"sa-entity-layout--size--lg"}'>
                                <div class="sa-entity-layout__body">
                                    <div class="sa-entity-layout__main">
                                        <div class="card">
                                            <div class="card-body p-5">
                                                <div class="mb-5"><h2 class="mb-0 fs-exact-18">Basic information</h2></div>
                                                @if(isset($category)) <input type="hidden" value="{{$category->id}}" name="id"> @else  @endif
                                                <div class="mb-4">
                                                    <label for="form-category/name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="form-category/name"  name="name" value="@if(isset($brand)) {{$brand->name}} @else {{ old('name') }} @endif">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="form-category/name" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="form-category/name"  name="username" value="@if(isset($brand)) {{$brand->username}} @else {{ old('username') }} @endif">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="form-category/name" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="form-category/name"  name="email" value="@if(isset($brand)) {{$brand->email}} @else {{ old('email') }} @endif">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="form-category/name" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="form-category/name"  name="password" value="@if(isset($brand)) {{$brand->password}} @else {{ old('password') }} @endif">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="form-category/name" class="form-label">Contact</label>
                                                    <input type="number" class="form-control" id="form-category/name"  name="contact" value="@if(isset($brand)) {{$brand->contact}} @else {{ old('contact') }} @endif">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="form-category/name" class="form-label">Status</label>
                                                    <input type="text" class="form-control" id="form-category/name"  name="status" value="@if(isset($brand)) {{$brand->status}} @else {{ old('status') }} @endif">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="form-category/name" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="form-category/name"  name="address" value="@if(isset($brand)) {{$brand->address}} @else {{ old('address') }} @endif">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="form-category/name" class="form-label">Note</label>
                                                    <input type="text" class="form-control" id="form-category/name"  name="note" value="@if(isset($brand)) {{$brand->note}} @else {{ old('note') }} @endif">
                                                </div>

                                                
                                                <div class="mb-4">
                                                    <label for="form-category/catdescription" class="form-label">Description</label>
                                                    <textarea id="form-category/catdescription" class="sa-quill-control form-control textareacontent" name="description" rows="7">@if(isset($brand)) {{$brand->description}} @else {{{old('description')}}} @endif</textarea>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- <div class="card mt-5">
                                            <div class="card-body p-5">
                                                <div class="mb-5">
                                                    <h2 class="mb-0 fs-exact-18">Search engine optimization</h2>
                                                    <div class="mt-3 text-muted">
                                                        Provide information that will help improve the snippet and bring your category to the top of search
                                                        engines.
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="form-category/seo-title" class="form-label">Page title</label>
                                                    <input type="text" class="form-control" name="meta_title"  value="@if(isset($category)) {{$category->meta_title}} @else {{ old('meta_title') }} @endif" id="form-category/seo-title" />
                                                </div>
                                                <div>
                                                    <label for="form-category/seo-description" class="form-label">Meta description</label>
                                                    <textarea id="form-category/seo-description" name="meta_description" class="form-control" rows="2">@if(isset($category)) {{$category->meta_description}} @else {{{old('meta_description')}}} @endif</textarea>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="sa-entity-layout__sidebar">
                                        
                                        
                                        
                                        <div class="card w-100 mt-5">
                                            <div class="card-body p-5">
                                                <div class="mb-5"><h2 class="mb-0 fs-exact-18">Featured Image</h2></div>
                                                <div class="border p-4 d-flex justify-content-center">
                                                    <div class="max-w-20x">
                                                        <img src="@if(isset($Brand)) images/{{$brand->feature_image}} @else images/products/product-7-320x320.jpg @endif" id="output" class="w-100 h-auto" width="320" height="320" alt="" />
                                                    </div>
                                                </div>
                                                <div class="mt-4 mb-n2">
                                                    <label class="me-3 pe-2 filehover" for="file" style="color: blue;cursor: pointer;">Replace image</label>
                                                    <a class="text-danger me-3 pe-2 removeimage" style="cursor: pointer;">Remove image</a>
                                                    <input type="file" accept="image/*" name="image" onchange="loadFile(event)" id="file" style="display: none">
                                                </div>
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
                    if(a == null){
                        $(".errordescription").removeClass("d-none");
                        var a =document.querySelectorAll('.ql-editor p span')[0].firstChild.nodeValue;
                    }
                     $(".textareacontent").val(a);
                    document.getElementById('brand-form').submit();
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