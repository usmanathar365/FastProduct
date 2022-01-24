@extends('themelayout.app')
@section('content')
  <!-- sa-app -->
  <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
      @include('themelayout.sidebar')
       <!-- sa-app__content -->
       <div class="sa-app__content">
       @include('themelayout.header')
           <!-- sa-app__body -->
           <div id="top" class="sa-app__body">
                    <div class="mx-xxl-3 px-4 px-sm-5">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="{{route('vendor.home')}}">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Products</h1>
                                </div>
                                <div class="col-auto d-flex">
                                    <a href="#" class="btn btn-secondary me-3">Import</a>
                                    <a href="{{route('add.product')}}" class="btn btn-primary">New Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-xxl-3 px-4 px-sm-5 pb-6">
                        <div class="sa-layout">
                            <div class="sa-layout__backdrop" data-sa-layout-sidebar-close=""></div>
                            <div class="sa-layout__sidebar">
                                <div class="sa-layout__sidebar-header">
                                    <div class="sa-layout__sidebar-title">Filters</div>
                                    <button type="button" class="sa-close sa-layout__sidebar-close" aria-label="Close" data-sa-layout-sidebar-close=""></button>
                                </div>
                                <div class="sa-layout__sidebar-body sa-filters">
                                    <ul class="sa-filters__list">
                                        <li class="sa-filters__item">
                                            <div class="sa-filters__item-title">Price</div>
                                            <div class="sa-filters__item-body">
                                                <div class="sa-filter-range" data-min="0" data-max="2000" data-from="0" data-to="2000">
                                                    <div class="sa-filter-range__slider"></div>
                                                    <input type="hidden" value="0" class="sa-filter-range__input-from" />
                                                    <input type="hidden" value="2000" class="sa-filter-range__input-to" />
                                                </div>
                                            </div>
                                        </li>
                                        <li class="sa-filters__item">
                                            <div class="sa-filters__item-title">Categories</div>
                                            <div class="sa-filters__item-body">
                                                <ul class="list-unstyled m-0 mt-n2">
                                                    @foreach($categories as $category)
                                                    <li>
                                                        <label class="d-flex align-items-center pt-2">
                                                            <input type="checkbox" class="form-check-input m-0 me-3 fs-exact-16" name="category" value="{{$category->name}}"/>
                                                            {{$category->name}}
                                                        </label>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="sa-filters__item">
                                            <div class="sa-filters__item-title">Product type</div>
                                            <div class="sa-filters__item-body">
                                                <ul class="list-unstyled m-0 mt-n2">
                                                    <li>
                                                        <label class="d-flex align-items-center pt-2">
                                                            <input
                                                                type="radio"
                                                                class="form-check-input m-0 me-3 fs-exact-16"
                                                                name="filter-product_type"
                                                                checked=""
                                                            />
                                                            Simple
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="d-flex align-items-center pt-2">
                                                            <input type="radio" class="form-check-input m-0 me-3 fs-exact-16" name="filter-product_type" />
                                                            Variable
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="d-flex align-items-center pt-2">
                                                            <input type="radio" class="form-check-input m-0 me-3 fs-exact-16" name="filter-product_type" />
                                                            Digital
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="sa-filters__item">
                                            <div class="sa-filters__item-title">Brands</div>
                                            <div class="sa-filters__item-body">
                                                <ul class="list-unstyled m-0 mt-n2">
                                                    <li>
                                                        <label class="d-flex align-items-center pt-2">
                                                            <input type="checkbox" class="form-check-input m-0 me-3 fs-exact-16" />
                                                            Brandix
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="d-flex align-items-center pt-2">
                                                            <input type="checkbox" class="form-check-input m-0 me-3 fs-exact-16" checked="" />
                                                            FastWheels
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="d-flex align-items-center pt-2">
                                                            <input type="checkbox" class="form-check-input m-0 me-3 fs-exact-16" checked="" />
                                                            FuelCorp
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="d-flex align-items-center pt-2">
                                                            <input type="checkbox" class="form-check-input m-0 me-3 fs-exact-16" />
                                                            RedGate
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="d-flex align-items-center pt-2">
                                                            <input type="checkbox" class="form-check-input m-0 me-3 fs-exact-16" />
                                                            Specter
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="d-flex align-items-center pt-2">
                                                            <input type="checkbox" class="form-check-input m-0 me-3 fs-exact-16" />
                                                            TurboElectric
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sa-layout__content">
                                <div class="card">
                                @if(Session::has('message'))
                                <div class="alert alert-success">
                                {{ Session::get('message') }}
                                </div>
                                @endif
                                    <div class="p-4">
                                        <div class="row g-4">
                                            <div class="col-auto sa-layout__filters-button">
                                                <button class="btn btn-sa-muted btn-sa-icon fs-exact-16" data-sa-layout-sidebar-open="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                                        <path
                                                            d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2 C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2 C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3 C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z"
                                                        ></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="col">
                                                <input
                                                    type="text"
                                                    placeholder="Start typing to search for products"
                                                    class="form-control form-control--search mx-auto"
                                                    id="table-search"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sa-divider"></div>
                                    <table class="sa-datatables-init" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                                        <thead>
                                            <tr>
                                                <th class="w-min" data-orderable="false">
                                                    <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." />
                                                </th>
                                                <th class="min-w-20x">Product</th>
                                                <th>Category</th>
                                                <th>Stock</th>
                                                <th>Price</th>
                                                <th class="w-min" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($products) && count($products) >0)
                                            @foreach($products as $product)
                                            <tr>
                                                <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." /></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="app-product.html" class="me-4">
                                                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                <img src="images/products/product-4-40x40.jpg" width="40" height="40" alt="" />
                                                            </div>
                                                        </a>
                                                        <div>
                                                            <a href="app-product.html" class="text-reset">Drill Series 3 Brandix KSR4590P 1500 Watts</a>
                                                            <div class="sa-meta mt-0">
                                                                <ul class="sa-meta__list">
                                                                    <li class="sa-meta__item">
                                                                        ID:
                                                                        <span title="Click to copy product ID" class="st-copy">5312</span>
                                                                    </li>
                                                                    <li class="sa-meta__item">
                                                                        SKU:
                                                                        <span title="Click to copy product SKU" class="st-copy">KSR4590P</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="app-category.html" class="text-reset">Drills</a></td>
                                                <td><div class="badge badge-sa-success">7 In Stock</div></td>
                                                <td>
                                                    <div class="sa-price">
                                                        <span class="sa-price__symbol">$</span>
                                                        <span class="sa-price__integer">949</span>
                                                        <span class="sa-price__decimal">.00</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-sa-muted btn-sm"
                                                            type="button"
                                                            id="product-context-menu-3"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="false"
                                                            aria-label="More"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                                                <path
                                                                    d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z"
                                                                ></path>
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="product-context-menu-3">
                                                            <li><a class="dropdown-item" style="cursor: pointer;" onclick="confirmEdit({{$product->id}})">Edit</a></li>
                                                            <li><a class="dropdown-item" style="cursor: pointer;">Duplicate</a></li>
                                                            <li><a class="dropdown-item" style="cursor: pointer;">Add tag</a></li>
                                                            <li><a class="dropdown-item" style="cursor: pointer;">Remove tag</a></li>
                                                            <li><hr class="dropdown-divider" /></li>
                                                            <li><a class="dropdown-item text-danger" style="cursor: pointer;" onclick="confirmEdit({{$product->id}})">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            <!-- <tr>
                                                <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." /></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="app-product.html" class="me-4">
                                                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                <img src="images/products/product-2-40x40.jpg" width="40" height="40" alt="" />
                                                            </div>
                                                        </a>
                                                        <div>
                                                            <a href="app-product.html" class="text-reset">Undefined Tool IRadix DPS300SY 2700 Watts</a>
                                                            <div class="sa-meta mt-0">
                                                                <ul class="sa-meta__list">
                                                                    <li class="sa-meta__item">
                                                                        ID:
                                                                        <span title="Click to copy product ID" class="st-copy">1746</span>
                                                                    </li>
                                                                    <li class="sa-meta__item">
                                                                        SKU:
                                                                        <span title="Click to copy product SKU" class="st-copy">DPS300SY</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="app-category.html" class="text-reset">Power Tools</a></td>
                                                <td><div class="badge badge-sa-danger">Out of Stock</div></td>
                                                <td>
                                                    <div class="sa-price">
                                                        <span class="sa-price__symbol">$</span>
                                                        <span class="sa-price__integer">1,019</span>
                                                        <span class="sa-price__decimal">.00</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-sa-muted btn-sm"
                                                            type="button"
                                                            id="product-context-menu-1"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="false"
                                                            aria-label="More"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                                                <path
                                                                    d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z"
                                                                ></path>
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="product-context-menu-1">
                                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                                            <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                            <li><a class="dropdown-item" href="#">Add tag</a></li>
                                                            <li><a class="dropdown-item" href="#">Remove tag</a></li>
                                                            <li><hr class="dropdown-divider" /></li>
                                                            <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr> -->
                                            <!-- <tr>
                                                <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." /></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="app-product.html" class="me-4">
                                                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                <img src="images/products/product-5-40x40.jpg" width="40" height="40" alt="" />
                                                            </div>
                                                        </a>
                                                        <div>
                                                            <a href="app-product.html" class="text-reset">Brandix Router Power Tool 2017ERX9</a>
                                                            <div class="sa-meta mt-0">
                                                                <ul class="sa-meta__list">
                                                                    <li class="sa-meta__item">
                                                                        ID:
                                                                        <span title="Click to copy product ID" class="st-copy">3326</span>
                                                                    </li>
                                                                    <li class="sa-meta__item">
                                                                        SKU:
                                                                        <span title="Click to copy product SKU" class="st-copy">2017ERX9</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="app-category.html" class="text-reset">Routers</a></td>
                                                <td><div class="badge badge-sa-primary">Preorder</div></td>
                                                <td>
                                                    <div class="sa-price">
                                                        <span class="sa-price__symbol">$</span>
                                                        <span class="sa-price__integer">1,700</span>
                                                        <span class="sa-price__decimal">.00</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-sa-muted btn-sm"
                                                            type="button"
                                                            id="product-context-menu-4"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="false"
                                                            aria-label="More"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                                                <path
                                                                    d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z"
                                                                ></path>
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="product-context-menu-4">
                                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                                            <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                            <li><a class="dropdown-item" href="#">Add tag</a></li>
                                                            <li><a class="dropdown-item" href="#">Remove tag</a></li>
                                                            <li><hr class="dropdown-divider" /></li>
                                                            <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." /></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="app-product.html" class="me-4">
                                                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                <img src="images/products/product-6-40x40.jpg" width="40" height="40" alt="" />
                                                            </div>
                                                        </a>
                                                        <div>
                                                            <a href="app-product.html" class="text-reset">Brandix Drilling Machine DM2019KW 4kW</a>
                                                            <div class="sa-meta mt-0">
                                                                <ul class="sa-meta__list">
                                                                    <li class="sa-meta__item">
                                                                        ID:
                                                                        <span title="Click to copy product ID" class="st-copy">4402</span>
                                                                    </li>
                                                                    <li class="sa-meta__item">
                                                                        SKU:
                                                                        <span title="Click to copy product SKU" class="st-copy">DM2019KW</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="app-category.html" class="text-reset">Drills</a></td>
                                                <td><div class="badge badge-sa-warning">On Backorder</div></td>
                                                <td>
                                                    <div class="sa-price">
                                                        <span class="sa-price__symbol">$</span>
                                                        <span class="sa-price__integer">3,199</span>
                                                        <span class="sa-price__decimal">.00</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-sa-muted btn-sm"
                                                            type="button"
                                                            id="product-context-menu-5"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="false"
                                                            aria-label="More"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                                                <path
                                                                    d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z"
                                                                ></path>
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="product-context-menu-5">
                                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                                            <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                            <li><a class="dropdown-item" href="#">Add tag</a></li>
                                                            <li><a class="dropdown-item" href="#">Remove tag</a></li>
                                                            <li><hr class="dropdown-divider" /></li>
                                                            <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr> -->
                                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('edit.product')}}" method="post" id="editform">
                    @csrf
                    <input type="hidden" class="editid" name="editid" value="">
                </form>
                <!-- sa-app__body / end --> 
       
        @include('themelayout.footer')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script>
          function confirmEdit($id){
            $('.editid').val($id);
            $('#editform').submit();
            }

            function confirmDelete($id) {
                
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this Product!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    }, function (isConfirm) {
                        if (!isConfirm) return;
                        $.ajax({
                            url: "Vendor-DeleteProduct/",
                            type: "get",
                            data: {
                                id: $id
                            }, 
                            success: function () { 
                                swal({
                                title: "Done!",
                                type: "success",
                                text: "Product deleted!",
                                confirmButtonText: "ok",
                                allowOutsideClick: "true"
                            }, function () { location.reload();})
                                 
                                
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                swal("Error deleting!", "Please try again", "error");
                            }
                        });
                    });
                }
         </script>
                </div>
            <!-- sa-app__content / end -->

            <!-- sa-app__toasts -->
            <div class="sa-app__toasts toast-container bottom-0 end-0"></div>
            <!-- sa-app__toasts / end -->

        </div>
        <!-- sa-app / end -->
@endsection