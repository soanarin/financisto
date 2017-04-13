$(document).ready(function(){
	var baseUrl=$('#baseUrl').val();
	//laravel globally setup ajax to check token on ajax and show/hide loader spinner
	$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
	      beforeSend: function() {
		     $('#loader').show();
		  },
		  complete: function(){
		     $('#loader').hide();
		  }
	});

	//in add transaction
	$('#date').datepicker({ dateFormat: 'yy-mm-dd' });

	//make datatable in overview view
	$('#allTransactions').DataTable();

	$('#allSubtransactions').DataTable();

	//ajax populate dependent subcategories drop down, when select a category from drop down
	 $('#category').on('change', function(e){

	       var cat_id = e.target.value;

	       //baseUrl defined at top, from hidden input from template blade
	       var vUrl =baseUrl+'/ajax/subcategory-dropdown?cat_id=' + cat_id;

	       //ajax
	       $.get(vUrl, function(data){
	           //success data
	           $('#subcategory').empty();

	           $('#subcategory').append('<option value="">--Subcategory--</option>');

	           $.each(data, function(index, subcatObj){

	               $('#subcategory').append('<option value="'+subcatObj.id+'">'+ subcatObj.subcategory + '</option>');


	       	   });

	       });

	 });

	 //first populate subamount same as amount, when there is no split of transaction
	 $('#amount').on('change', function(e){
	 	var amount=$(this).val();
	 	$('#subamount').val(amount);

	 });

	 //click on button submit/add transaction 
	 $('#submit-transaction').click(function(e){
	 	e.preventDefault();

        // var formData = {
        // 	category:'food'
        // }

        var formData=$('#form-transaction').serialize();
        //console.log(formData);
        myUrl=baseUrl+'/ajax/submit';
        $.ajax({

            type: 'POST',
            url: myUrl,
            data: formData,
            //dataType: 'json',
            success: function (data) {
                console.log(data);
                alert('Transaction submitted');

            },
            error: function (data) {
                console.log('Error:', data);
                alert('Transaction failed');
            }
        });


	 }); // end #submit-transaction

}); //END JQ