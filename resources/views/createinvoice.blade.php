@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-12">
<div class="card">
<div class="card-header" style="text-align: right" style="font-size: 18px!important;">
    <a href="{{url("viewinvoices")}}" class="btn btn-info" style="font-size: 18px;color:white">عرض الفواتير</a>   
    <a  href="{{url("viewproducts")}}" class="btn btn-info" style="font-size: 18px;color:white;"> عرض المنتجات</a>
    <a href="{{url("addproduct")}}" class="btn btn-info" style="font-size: 18px;color:white;">اضافة منتج</a>
    <h4 style="display:inline-block;color: rgb(32, 131, 145)" class="hideprint">  انشاء فاتورة </h4>

    <div  class="onprint">
        <p class="text-center">Marketing</p>
<div class="row" style="direction: rtl">
    <div class="col-4">رقم الفاتورة:<span class="inv_num"></span></div>
    <div class="col-4">الرقم الضريبي:123456789</div>
    <div class="col-4">ومبلغ الضريبة:20</div>

</div>

    </div>
</div>


<div class="card-body" style="direction:rtl;text-align:right">

    

<form method="POST" id="create_invoice_form" >
@csrf

<input type="hidden" name="invoices_id" class="invoices_id" />

<div class="row" >

<div class="col-4">
<p style=" font-size: 18px !important;font-weight: bold !important;">اسم المنتج<span style="color: red">*</span></p>
<div class="row"> <span class="col-1" style="background-color:#e3eaf5"></span> 

<select type="text" name="product_id" class="form-control col-8 "   required /> 
@foreach($products as $prod)
<option value="{{$prod->id}}">{{$prod->product_name}}</option>
@endforeach
</select>
</div>
</div>


<div class="col-4">
<p style=" font-size: 18px !important;font-weight: bold !important;">الكمية<span style="color: red">*</span></p>
<div class="row"> <span class="col-1" style="background-color:#e3eaf5"></span> 
<input type="number" min="1" name="product_quantity" class="form-control col-8"   required /> </div>
</div>
</div><!--End Row-->


<br>
<input type="submit" value="حفظ" class="btn btn-info" style="font-size: 18px;color:white;">

</form>
<br>
<table class="table table-striped" style="direction: rtl">
    <thead>
    <th>اسم المنتج</th>
    <th>الكمية</th>
    <th>سعر البيع</th>
    <th>الاجمالى</th>
    </thead>
    <tbody class="invoice_body">

    </tbody>

</table>
<div class="show_total" style="display: none" style="font-size: 18px;font-weight:bold;direction:rtl;text-align:right">

<div style="font-size: 17px;font-weight:bold">

<span >  اجمالى الفاتورة :</span>
<span class="totaloftotal"></span>
<span>+ 20 ضريبة </span>

</div>

</div>

<div class="barcode"></div>

<br>
<button style="color: white;font-size:17px" class="btn btn-info print" onclick="window.print()">طباعة الفاتورة</button>



</div>
</div>
</div>
</div>
</div>
@endsection
<style>

@media screen {
    .onprint{
      display: none
  }
}
    @media print {
    
    form,.print,.btn,.hideprint{
       display: none;
       visibility: hidden;
    }
  .onprint{
      display: block
  }
    }
    
    </style>
    