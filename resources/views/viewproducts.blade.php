@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header" style="text-align: right" style="font-size: 18px!important;font-weight:bold">
<a href="{{url("viewinvoices")}}" class="btn btn-info" style="font-size: 18px;color:white">عرض الفواتير</a>   
<a href="{{url("createinvoice")}}" class="btn btn-info" style="font-size: 18px;color:white;">انشاء فاتورة</a>   
<a href="{{url("addproduct")}}" class="btn btn-info" style="font-size: 18px;color:white;">اضافة منتج</a>
<h4 style="display:inline-block;color: rgb(32, 131, 145)"> عرض المنتجات </h4>

</div>

<div class="card-body" style="text-align: right" >


<table class="table table-striped" style="direction: rtl">
<thead>
<th>اسم المنتج</th>
<th>سعر الشراء</th>
<th>سعر البيع</th>
<th>حدث</th>
</thead>
<tbody>
@foreach($allproducts as $product)
<tr>
<th class="product_name_th {{$product->id}}">{{$product->product_name}}</th>
<th class="purchasing_price_th {{$product->id}}">{{$product->purchasing_price}}</th>
<th class="selling_price_th {{$product->id}}">{{$product->selling_price}}</th>
<th>

<a style="cursor: pointer;color:rgb(30, 49, 134)" class="fa fa-plus" id="editproduct" name="{{$product->id}}" >تعديل المنتج</a>

</th>
</tr>

@endforeach
</tbody>
</table> 

<div class=" show_average" style="display: none" style="font-size: 18px;font-weight:bold">

<div style="font-size: 17px;font-weight:bold" class="alert alert-info">
<span class="purchase_average "></span>
<span > :متوسط سعر الشراء لجميع المنتجات</span>
</div>

<div style="font-size: 17px;font-weight:bold" class="alert alert-info">
<span  class="selling_average "></span>
<span> :متوسط سعر البيع لجميع المنتجات</span>
</div>
</div>


<br>

</div>
</div>
</div>
</div>
</div>


@endsection
<!-- Modal -->
<div style="margin-top:60px;direction:rtl"class="modal fade" id="editproduct_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header" style="background-color: #1c598c;color:white">

<h5 class="modal-title" id="exampleModalLabel">تعديل منتج<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button></h5>



</div>
<div class="modal-body" style="direction:rtl;text-align:right">
<form method="post"  id="edit_product_form" >
@csrf

<input type="hidden" name="id" class="form-control col-9 product_id"    />

<div class="row" >

<div class="col-6">
<p style=" font-size: 18px !important;font-weight: bold !important;">اسم المنتج<span style="color: red">*</span></p>
<div class="row"> <span class="col-1" style="background-color:#e3eaf5"></span> 
<input type="text" name="product_name" class="form-control col-9 product_name"   required /> </div>
</div>

<div class="col-6">
<p style=" font-size: 18px !important;font-weight: bold !important;">سعر الشراء<span style="color: red">*</span></p>
<div class="row"> <span class="col-1" style="background-color:#e3eaf5"></span> 
<input type="text" name="purchasing_price" class="form-control col-9 purchasing_price"   required /> </div>
</div>

<div class="col-6">
<p style=" font-size: 18px !important;font-weight: bold !important;">سعر البيع<span style="color: red">*</span></p>
<div class="row"> <span class="col-1" style="background-color:#e3eaf5"></span> 
<input type="text" name="selling_price" class="form-control col-9 selling_price"   required /> </div>
</div>
</div><!--End Row-->


</div>
<div class="modal-footer"  style="direction:ltr !important"  >
<button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
<button type="submit" class="btn btn-primary">حفظ</button>
</form>
</div>
</div>
</div>
</div>

<!-- Modal -->