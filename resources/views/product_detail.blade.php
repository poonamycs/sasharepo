@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>

</style>
@endsection('styles')

<div class="section section-fluid section-padding border-bottom bg-white">
    <div class="container">
        <div class="row learts-mb-n40 mb-5 pb-5">

            <!-- Product Images Start -->
            <div class="col-lg-5 col-12 learts-mb-40 ">
                <div class="product-images vertical">

                    <!-- <a href="https://www.youtube.com/watch?v=1jSsy7DtYgc" class="product-video-popup video-popup hintT-left" data-hint="Click to see video"><i class="fas fa-play"></i></a> -->
                    <div class="product-gallery-slider">
                        <div class="product-zoom"
                            data-image="{{ asset('assets/admin/images/backend_images/products/large/'.$product->image) }}">
                            <img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product->image) }}"
                                alt="">
                        </div>
                        @foreach($product_imgs as $product_img)
                        <div class="product-zoom"
                            data-image="{{ asset('assets/admin/images/backend_images/products/large/'.$product_img->image) }}">
                            <img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product_img->image) }}"
                                alt="">
                        </div>
                        @endforeach
                    </div>
                    <div class="product-thumb-slider-vertical">
                        <div class="item">
                            <img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product->image) }}"
                                alt="">
                        </div>
                        @foreach($product_imgs as $product_img)
                        <div class="item">
                            <img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product_img->image) }}"
                                alt="">
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Product Images End -->
            <div class="col-lg-1"></div>
            <!-- Product Summery Start -->
            <div class="col-lg-6 col-12 learts-mb-40">
                <div class="product-summery product-summery-center">


                    <h3 class="product-title">{{$product->product_name}}</h3>

                    <div class="product-description">
                        <p>{{$product->description}}</p>
                    </div>

                    <!-- <div class="col-12 text-center learts-mb-30"> <button class="hexa"><a href="/contact" class="">Send Enquiry</a> </button></div> -->
                    <div class="col-auto learts-mb-20"><a class="btn btn-md  btn-outline-secondary"
                            data-bs-toggle="modal" data-bs-target="#indexModel">Send Enquiry</a></div>

                </div>
            </div>
            <!-- Product Summery End -->

        </div>
    </div>

</div>



<div class="modal fade" id="indexModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="row justify-content-center">
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @if(Session::has('success_message'))
                    <div class="alert alert-success" role="alert">
                        <strong>{!! session('success_message') !!}</strong>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="col-xl-12">
                        <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
                            <div class="card-body p-0">
                                <div class="row g-0">

                                    <div class="col-sm-12 p-4">
                                        <div class="text-start d-flex justify-content-between">
                                            <h3 class="  text-center">Enquire Now</h3>
                                            <button type="button" data-bs-dismiss="modal"
                                                class="bg-light border-0"><span
                                                    class="fa fa-times-circle"></span></button>

                                            <!-- <div class="heading-border fs-4 mb-3 px-3 fw-light">Enquire Now</div> -->
                                        </div>
                                        <form action="#" method="Post" id="contactmodal">@csrf
                                            <input type="hidden" name="product_id" id="eproduct_id" value="{{$product->id}}">
                                            <input type="hidden" name="user_id" id="user_id" @if($user) value="{{$user->id}}" @endif>
                                            <div class="row learts-mb-n30">
                                                <div class="col-md-6 col-12 learts-mb-30"><input type="text"
                                                        placeholder="Your Name *" id="ename" name="name"></div>
                                                <div class="col-md-6 col-12 learts-mb-30"><input type="email"
                                                        placeholder="Email *" id="eemail" name="email"></div>
                                                <div class="col-md-6 col-12 learts-mb-30"><input type="number"
                                                        placeholder="Phone *" id="ephone" name="phone"></div>
                                                <div class="col-12 learts-mb-50"><textarea id="emessage" name="message"
                                                        placeholder="Message"></textarea></div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-md btn-outline-secondary" id="esubmitButton"><span
                                                        class="fa fa-check-circle"></span>
                                                    Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="mymodal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="row justify-content-center">

                    <div class="col-xl-12">
                        <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
                            <div class="card-body p-0">
                                <div class="row g-0">

                                    <div class="col-sm-12 p-4">
                                        <div class="text-start d-flex justify-content-between">
                                            <h3 class="  text-center">Thank you for your purchase! Enjoy your new item
                                            </h3>
                                            <button type="button" data-bs-dismiss="modal"
                                                class="bg-light border-0"><span
                                                    class="fa fa-times-circle"></span></button>

                                            <!-- <div class="heading-border fs-4 mb-3 px-3 fw-light">Enquire Now</div> -->
                                        </div>

                                    </div>
                                </div>
                                <div class="row p-4">
                                    <div class="col-lg-6 ">
                                        <h6>If you need any further assistance or wish to continue
                                        shopping</h6>
                                        <div class="header-login">
                                            <a href="{{url('')}}"><button class="btn pt-0 " id="submitButton"
                                                ><span
                                                        class="fa fa-check-circle"></span>
                                                    </button></a>
                                        </div>
                                    </div>
                                  
                                    <div class="col-lg-6 ">
                                        <h6>Don't need any further assistance or wish to continue
                                        shopping </h6>
                                        <div class="header-login">
                                            <a href="{{url('user/logout')}}"><i class="fa fa-power-off"></i></a>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@section('scripts')
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js'></script>
<script>
jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
}, "Letters only please *");
$("#contactmodal").validate({
    // errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        name: {
            required: true,
            lettersonly: true,


        },
        email: {
            required: true,
        },

        message: {
            required: true,
        },

        subject: {
            required: true,
        },

        phone: {
            required: true,
            number: true,
            maxlength: 12,
            minlength: 10
        },


    },
    messages: {

        name: {
            required: "This field is required.",
        },
        email: {
            required: "This field is required.",
        },
        message: {
            required: "This field is required.",
        },
        phone: {
            required: "This field is required.",
            number: "Please enter valid number",
        },

    },
    submitHandler: function(form) {
        $(".cbtn").attr("disabled", true);
        $(".cbtn").html("<i class='fa fa-spinner fa-spin'></i> Please wait...");
        form.submit();
    }
});
$(document).ready ( function () {
    $('#esubmitButton').on('click', function(event) {
        event.preventDefault();
        product_id = $('#eproduct_id').val();
        user_id = $('#user_id').val(); 
        name = $('#ename').val();
        email = $('#eemail').val();
        phone = $('#ephone').val();
        message = $('#emessage').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'{{url('/productenquiry')}}',
            data:{
                product_id:product_id,
                name:name,
                email:email,
                phone:phone,
                message:message,
            },
            success:function(resp){
                console.log(resp);
                if(user_id != '')
                {
                    $("#indexModel").modal('hide');
                    $("#mymodal").modal('show');
                }
                else{
                    $("#indexModel").modal('hide');
                }
               
            },
            error:function(err){
                console.log(err);
            }
        });
    });
});
</script>
@endsection('scripts')

@endsection('content')