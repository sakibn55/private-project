@extends('layouts.app')

@section('header')
    
    <div class="home_wrapper">
      <div class="container">
          <div class="home_wrapper_main">
              <div class="col-md-6">
                  <div class="home_left_area">
                      <div class="heading_area">
                          <h1 class="main_heading">
                              Bakbakum
                          </h1>
                      </div>
                      <div class="text_area">
                          <p class="p_text">
                              কারণ, বেশিরভাগ ক্ষেত্রে কবুতর পালন করা হয়- এর বাহ্যিক সৌন্দর্য্যগত দিকগুলোর কারণে। প্রাচীনকালে কবুতর পালন করা হতো চিঠি আদান প্রদানের কাজে। 
                          </p>
                      </div>
                      <div class="button_area">
                          <a href="" class="btn_primary_main">
                              Shop now
                          </a>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="home_right_area">
                      <img src="images/hero4.png" alt="" class="hero_image">
                  </div>
              </div>
              <div class="clearfix"></div>
          </div>
      </div> 
    </div>

@endsection
@section('content')
    @include('products.home_product')
    @include('extra.subscribe')
@endsection
