@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>

</style>
@endsection('styles')
@php
    $email = Session::get('vendorSession');
    if($email != null)
    {
        $user = App\Models\Admin::where('email',$email)->first();
        $vendorproduct = App\Models\VendorProduct::where('vendor_id',$user->id)->get();
    }
    else
    {
        $user = null;
    }
@endphp
<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="assets/images/bg/page-title-1.webp">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1 class="title">Nuhas</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->
  <!-- Category Banner Section Start -->
  <div class="section bg-white pb-5 pt-5">
        <div class="container">
            <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 learts-mb-n40">
                @if($user != null)
                     @if(!$vendorproduct->isempty())
                        @foreach($vendorproduct as $product)
                            @if($product->product->category_id == '1')
                            <div class="col learts-mb-40">
                                <div class="category-banner4">
                                    <a href="{{url('/nuhas_detail')}}" class="inner">
                                        <div class="image"><img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product->product->image) }}" alt=""></div>
                                        <div class="content" data-bg-color="#f4ede7">
                                            <h3 class="title">{{$product->product->product_name}}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @else
                            <div class="col learts-mb-40">
                                <div class="category-banner4">
                                    No record Found
                                </div>
                            </div>
                            @endif  
                        @endforeach
                        
                    @endif
                    {{ $vendorproduct->links() }}
                @else
                @foreach($products as $product)
                    <div class="col learts-mb-40">
                        <div class="category-banner4">
                            <a href="{{url('/nuhas_detail')}}" class="inner">
                                <div class="image"><img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product->image) }}" alt=""></div>
                                <div class="content" data-bg-color="#f4ede7">
                                    <h3 class="title">{{$product->product_name}}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                {{ $products->links() }}
                @endif
                
            </div>
            
        </div>
    </div>

@section('scripts')

@endsection('scripts')

@endsection('content')