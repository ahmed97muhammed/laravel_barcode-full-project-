@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header" style="text-align: right" style="font-size: 18px!important;">
<a href="{{url("viewinvoices")}}" class="btn btn-info" style="font-size: 18px;color:white">عرض الفواتير</a>  
<a href="{{url("addproduct")}}" class="btn btn-info" style="font-size: 18px;color:white;">اضافة منتج</a>
<a href="{{url("createinvoice")}}" class="btn btn-info" style="font-size: 18px;color:white;">انشاء فاتورة</a>   
<a  href="{{url("viewproducts")}}" class="btn btn-info" style="font-size: 18px;color:white;"> عرض المنتجات</a>
<h4 style="display:inline-block;color: rgb(32, 131, 145)"> عرض فاتورة </h4>

</div>

<div class="card-body" style="direction:rtl;text-align:right">

<table class="table table-striped" style="direction: rtl">
<thead>
<th> اسم المنتج</th>
<th> سعر البيع</th>
<th>الكمية</th>
<th>الاجمالى</th>
</thead>
<tbody>
@foreach($invoice as $inv)
<tr>
<th>{{$inv->product_name}}</th>
<th>{{$inv->product_selling_price}}</th>
<th>{{$inv->product_quantity}}</th>
<th>{{$inv->total}}</th>

</tr>
@endforeach
</tbody>
</table> 

<p style="font-size: 17px;font-weight:bold"> الاجمالى الكلى بالضريبة: {{number_format($invoice[0]->total_price+20)}}</p>

@php 
$after_tax=$invoice[0]->total_price+20;

$nc=" اسم النشاط:سوق تجارى";
$inn=" رقم الفاتورة : ".$invoice[0]->invoice_number;
$da="الرقم الضريبي: 123456789";
$tyr="مبلغ الضريبة: 20";
$dfd="اجمالى المبلغ :".$after_tax;

$barcode_content=$nc.$inn.$da.$tyr.$dfd;
@endphp

<img src="data:image/png;base64,{{DNS2D::getBarcodePNG($barcode_content, "QRCODE")}}" alt="barcode" />

</div>
</div>
</div>
</div>
</div>
@endsection
