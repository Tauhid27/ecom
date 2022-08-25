@extends('front/layout')
@section('page_title','Category')
@section('container')

  <!-- product category -->
<section id="aa-product-category">
   <div class="container">
      <div class="row">
         <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
            <div class="aa-product-catg-content">
               <div class="aa-product-catg-head">
                  <div class="aa-product-catg-head-left">
                     <form action="" class="aa-sort-form">
                        <label for="">Sort by</label>
                        <select name="">
                           <option value="1" selected="Default">Default</option>
                           <option value="2">Name</option>
                           <option value="3">Price</option>
                           <option value="4">Date</option>
                        </select>
                     </form>
                  </div>
                  <div class="aa-product-catg-head-right">
                     <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                     <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                  </div>
               </div>
               <div class="aa-product-catg-body">
                  <ul class="aa-product-catg">
                     <!-- start single product item -->
                     
                     @if(isset($product[0]))
                       @foreach($product as $productArr)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$productArr->slug)}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->name}}"></a>
                            <a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_add_to_cart('{{$productArr->id}}','{{$product_attr[$productArr->id][0]->size}}','{{$product_attr[$productArr->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('product/'.$productArr->slug)}}">{{$productArr->name}}</a></h4>
                              <span class="aa-product-price">Rs {{$product_attr[$productArr->id][0]->price}}</span><span class="aa-product-price"><del>Rs {{$product_attr[$productArr->id][0]->mrp}}</del></span>
                            </figcaption>
                          </figure>                          
                        </li>  
                        @endforeach    
                        @else
                        <li>
                          <figure>
                            No data found
                          <figure>
                        <li>
                        @endif
                     
                  </ul>
                  <!-- quick view modal -->                  
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
            <aside class="aa-sidebar">
               <!-- single sidebar -->
               <div class="aa-sidebar-widget">
                  <h3>Category</h3>
                  <ul class="aa-catg-nav">
                     <li><a href="#">Men</a></li>
                     <li><a href="">Women</a></li>
                     <li><a href="">Kids</a></li>
                     <li><a href="">Electornics</a></li>
                     <li><a href="">Sports</a></li>
                  </ul>
               </div>
               <div class="aa-sidebar-widget">
                  <h3>Shop By Price</h3>
                  <!-- price range -->
                  <div class="aa-sidebar-price-range">
                     <form action="">
                        <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                        </div>
                        <span id="skip-value-lower" class="example-val">30.00</span>
                        <span id="skip-value-upper" class="example-val">100.00</span>
                        <button class="aa-filter-btn" type="submit">Filter</button>
                     </form>
                  </div>
               </div>
               <!-- single sidebar -->
               <div class="aa-sidebar-widget">
                  <h3>Shop By Color</h3>
                  <div class="aa-color-tag">
                     <a class="aa-color-green" href="#"></a>
                     <a class="aa-color-yellow" href="#"></a>
                     <a class="aa-color-pink" href="#"></a>
                     <a class="aa-color-purple" href="#"></a>
                     <a class="aa-color-blue" href="#"></a>
                     <a class="aa-color-orange" href="#"></a>
                     <a class="aa-color-gray" href="#"></a>
                     <a class="aa-color-black" href="#"></a>
                     <a class="aa-color-white" href="#"></a>
                     <a class="aa-color-cyan" href="#"></a>
                     <a class="aa-color-olive" href="#"></a>
                     <a class="aa-color-orchid" href="#"></a>
                  </div>
               </div>
            </aside>
         </div>
      </div>
   </div>
</section>
<!-- / product category -->

<input type="hidden" id="qty" value="1"/>
  <form id="frmAddToCart">
    <input type="hidden" id="size_id" name="size_id"/>
    <input type="hidden" id="color_id" name="color_id"/>
    <input type="hidden" id="pqty" name="pqty"/>
    <input type="hidden" id="product_id" name="product_id"/>           
    @csrf
  </form>  
@endsection