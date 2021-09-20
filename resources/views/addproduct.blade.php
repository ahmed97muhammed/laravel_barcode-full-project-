@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header" style="text-align: right" style="font-size: 18px!important;">
    <a href="{{url("viewinvoices")}}" class="btn btn-info" style="font-size: 18px;color:white">عرض الفواتير</a>   
    <a href="{{url("createinvoice")}}" class="btn btn-info" style="font-size: 18px;color:white;">انشاء فاتورة</a>   
<a  href="{{url("viewproducts")}}" class="btn btn-info" style="font-size: 18px;color:white;"> عرض المنتجات</a>
    <h4 style="display:inline-block;color: rgb(32, 131, 145)"> اضافة منتج </h4>

</div>

<div class="card-body" style="direction:rtl;text-align:right">


<form method="POST" id="addproduct">
@csrf

<div class="row" >

<div class="col-4">
<p style=" font-size: 18px !important;font-weight: bold !important;">اسم المنتج<span style="color: red">*</span></p>
<div class="row"> <span class="col-1" style="background-color:#e3eaf5"></span> 
<input type="text" name="product_name" class="form-control col-8"   required /> </div>
</div>

<div class="col-4">
<p style=" font-size: 18px !important;font-weight: bold !important;">سعر الشراء<span style="color: red">*</span></p>
<div class="row"> <span class="col-1" style="background-color:#e3eaf5"></span> 
<input type="text" name="purchasing_price" class="form-control col-8"   required /> </div>
</div>

<div class="col-4">
<p style=" font-size: 18px !important;font-weight: bold !important;">سعر البيع<span style="color: red">*</span></p>
<div class="row"> <span class="col-1" style="background-color:#e3eaf5"></span> 
<input type="text" name="selling_price" class="form-control col-8"   required /> </div>
</div>
</div><!--End Row-->

<br>
<input type="submit" value="حفظ" class="btn btn-info" style="font-size: 18px;color:white;">


</form>
<br>

</div>
</div>
</div>
</div>
</div>
@endsection
