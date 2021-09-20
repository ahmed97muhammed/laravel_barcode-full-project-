@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header" style="text-align: right" style="font-size: 18px!important;">
<a href="{{url("addproduct")}}" class="btn btn-info" style="font-size: 18px;color:white;">اضافة منتج</a>
<a href="{{url("createinvoice")}}" class="btn btn-info" style="font-size: 18px;color:white;">انشاء فاتورة</a>   
<a  href="{{url("viewproducts")}}" class="btn btn-info" style="font-size: 18px;color:white;"> عرض المنتجات</a>
<h4 style="display:inline-block;color: rgb(32, 131, 145)"> عرض الفواتير </h4>

</div>

<div class="card-body" style="direction:rtl;text-align:right">

<table class="table table-striped" style="direction: rtl">
<thead>
<th> رقم الفاتورة</th>
<th>اجمالى الفاتورة بالضريبة</th>
<th>عرض</th>

</thead>
<tbody>
@foreach($allinvoices as $invoice)
<tr>
<th>{{$invoice->invoice_number}}</th>
<th>{{$invoice->total_price+20}}</th>

<th>

<a style="cursor: pointer;color:rgb(30, 49, 134)" href="{{url('viewinvoice/'.$invoice->id)}}"   > عرض منتجات الفاتورة</a>

</th>
</tr>

@endforeach
</tbody>
</table> 




</div>
</div>
</div>
</div>
</div>
@endsection
