$(document).ready(function(){

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

success_msg="تم بنجاح";
btn="تم";
errorinvalidinputs="خطأ تأكد من البيانات المدخلة";
tryagainerror="خطأ حاول لاحقا";


//////////////////

function success_alert()
{
Swal.fire({
icon:"success",
text:success_msg, 
confirmButtonColor: '#3085d6',
confirmButtonText:btn,
});
}

function error_alert(code) {  
if(code==500){
Swal.fire({
icon:"warning",
text:errorinvalidinputs, 
confirmButtonColor: '#3085d6',
confirmButtonText:btn,
});

}
else{

Swal.fire({
icon:"warning",
text:tryagainerror, 
confirmButtonColor: '#3085d6',
confirmButtonText:btn,
});

}

}

//add product

$(document).on('submit','#addproduct', function(event){


event.preventDefault();


$.ajax({
url:"addproduct_form_ajax_url",
method:"post",
data:new FormData(this),

contentType: false,
cache: false,
processData: false,

success:function(data)
{

success_alert();

$("#addproduct")[0].reset();

},

error:function(xhr,status,error) {
    var code=xhr.status;
    error_alert(code)
}

})

});
//End Add product


//Edit product

$(document).on('click','#editproduct', function(event){


event.preventDefault();

var id=$(this).attr("name");
$.ajax({
url:"get_editproduct_form_ajax_url",
method:"post",
data:{id:id},

success:function(data)
{
$(".product_id").val(data['id'])
$(".product_name").val(data['product_name']);
$(".purchasing_price").val(data['purchasing_price']);
$(".selling_price").val(data['selling_price']);

$("#editproduct_modal").modal("show");

},

error:function(xhr,status,error) {
    var code=xhr.status;
    error_alert(code)
}

})

});
//End Edit product

// edit_product_form

$(document).on('submit','#edit_product_form', function(event){


event.preventDefault();


$.ajax({
url:"edit_product_form_ajax_url",
method:"post",
data:new FormData(this),

contentType: false,
cache: false,
processData: false,

success:function(data)
{

$("#editproduct_modal").modal("hide");

$(".product_name_th"+"."+data[0]).text(data[1]);
$(".purchasing_price_th"+"."+data[0]).text(data[2]);
$(".selling_price_th"+"."+data[0]).text(data[3]);

if(data[4] !="")
{
$(".purchase_average").text(data[4]);
$(".selling_average").text(data[5]);
$(".show_average").show();
}
else{
$(".show_average").hide();
}

success_alert();


},

error:function(xhr,status,error) {
    var code=xhr.status;
    error_alert(code)
}

})

});
//End edit_product_form

//add invoice

$(document).on('submit','#create_invoice_form', function(event){


event.preventDefault();


$.ajax({
url:"create_invoice_form_ajax_url",
method:"post",
data:new FormData(this),

contentType: false,
cache: false,
processData: false,

success:function(data)
{

$(".invoice_body").append(data[0]);
$(".totaloftotal").text(data[1]);
$(".invoices_id").val(data[2]);
$(".inv_num").text(data[3]);
$(".barcode").html(data[4]);
$(".show_total").show();
},

error:function(xhr,status,error) {
    var code=xhr.status;
    error_alert(code)
}

})

});
//End Add invoice

//End File
});