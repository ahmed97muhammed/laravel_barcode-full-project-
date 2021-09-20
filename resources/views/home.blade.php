@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header" style="text-align: right" style="font-size: 18px!important;font-weight:bold"><h4 style="font-weight:bold;color: rgb(32, 131, 145)">لوحة التحكم </h4></div>

<div class="card-body" style="text-align: right">

<a href="{{url("viewinvoices")}}" class="btn btn-info" style="font-size: 18px;color:white">عرض الفواتير</a>   

<a href="{{url("createinvoice")}}" class="btn btn-info" style="font-size: 18px;color:white">انشاء فاتورة</a>   

<a href="{{url("addproduct")}}" class="btn btn-info" style="font-size: 18px;color:white">اضافة منتج</a>

<a href="{{url("viewproducts")}}" class="btn btn-info" style="font-size: 18px;color:white"> عرض المنتجات</a>

</div>
</div>
</div>
</div>
</div>
@endsection
