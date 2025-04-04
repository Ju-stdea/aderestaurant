// $(document).ready(function(){
jQuery(document).ready(function($) {
      //  $(".confirmDelete").click(function(){
    $(document).on("click", ".confirmDelete", function(){
        
    // alert("hello"); return
        var record= $(this).attr("record");
        var recordid = $(this).attr("recordid");
        // alert(recordid); return
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Deleted!',
                'Record has been deleted.',
                'success'
                )
                window.location.href ="/admin/delete-"+record+"/"+recordid;
            }
            });
        //   return false;
    });
    
    $(document).on('click', '.updateAttributeStatus', function(){
        var status = $(this).text();
        var attribute_id= $(this).attr('attribute_id');
        // alert(status);
        // alert(section_id);
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-attribute-status',
            data: {status:status, attribute_id: attribute_id},
            success: function(resp){
                // alert(resp['status']);
                // alert(resp['product_id']);
                if(resp['status']== 0){
                    $("#attribute-"+attribute_id).html("Inactive");
                }else if(resp['status']== 1){
                    $("#attribute-"+attribute_id).html("Active");
                }
            }, error: function(){
                alert("Error");
            }
        })
    });
     // Products Attributes Add/Remove Script

    $(document).on('click', '.updateCategoryStatus', function(){
        var category_id= $(this).attr('category_id');
        var status = $(this).data("status");
        var $this = $(this); 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-category-status',
            data: {status:status, category_id: category_id},
            success: function(resp){

                if(resp['status'] == 'INACTIVE'){
                    $this.text('INACTIVE');
                    $this.removeClass('btn-success').addClass('btn-info');
                    $this.data('status', 'INACTIVE');
                } else if(resp['status'] == 'ACTIVE'){
                    $this.text('ACTIVE');
                    $this.removeClass('btn-info').addClass('btn-success');
                    $this.data('status', 'ACTIVE');
                }
            }, error: function(){
                alert("Error");
            }
        })
    });

    $(document).on('click', '.updateProductStatus', function(){
        var product_id= $(this).attr('product_id');
        var status = $(this).data("status");
        var $this = $(this); 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-product-status',
            data: {status:status, product_id: product_id},
            success: function(resp){

                if(resp['status'] == 'INACTIVE'){
                    $this.text('INACTIVE');
                    $this.removeClass('btn-success').addClass('btn-info');
                    $this.data('status', 'INACTIVE');
                } else if(resp['status'] == 'ACTIVE'){
                    $this.text('ACTIVE');
                    $this.removeClass('btn-info').addClass('btn-success');
                    $this.data('status', 'ACTIVE');
                }
            }, error: function(){
                alert("Error");
            }
        })
    });

    $(document).on('click', '.updateImageStatus', function(){
        var image_id= $(this).attr('image_id');
        var status = $(this).data("status");
        var $this = $(this); 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-image-status',
            data: {status:status, image_id: image_id},
            success: function(resp){

                if(resp['status'] == 'INACTIVE'){
                    $this.text('INACTIVE');
                    $this.removeClass('btn-success').addClass('btn-info');
                    $this.data('status', 'INACTIVE');
                } else if(resp['status'] == 'ACTIVE'){
                    $this.text('ACTIVE');
                    $this.removeClass('btn-info').addClass('btn-success');
                    $this.data('status', 'ACTIVE');
                }
            }, error: function(){
                alert("Error");
            }
        })
    });

    $(document).on('click', '.updateBannerStatus', function(){
        var banner_id= $(this).attr('banner_id');
        var status = $(this).data("status");
        var $this = $(this); 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-banner-status',
            data: {status:status, banner_id: banner_id},
            success: function(resp){

                if(resp['status'] == 'INACTIVE'){
                    $this.text('INACTIVE');
                    $this.removeClass('btn-success').addClass('btn-info');
                    $this.data('status', 'INACTIVE');
                } else if(resp['status'] == 'ACTIVE'){
                    $this.text('ACTIVE');
                    $this.removeClass('btn-info').addClass('btn-success');
                    $this.data('status', 'ACTIVE');
                }
            }, error: function(){
                alert("Error");
            }
        })
    });

    $(document).on('click', '.updateCouponStatus', function(){
        var coupon_id= $(this).attr('coupon_id');
        var status = $(this).data("status");
        var $this = $(this); 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-coupon-status',
            data: {status:status, coupon_id: coupon_id},
            success: function(resp){

                if(resp['status'] == 'INACTIVE'){
                    $this.text('INACTIVE');
                    $this.removeClass('btn-success').addClass('btn-info');
                    $this.data('status', 'INACTIVE');
                } else if(resp['status'] == 'ACTIVE'){
                    $this.text('ACTIVE');
                    $this.removeClass('btn-info').addClass('btn-success');
                    $this.data('status', 'ACTIVE');
                }
            }, error: function(){
                alert("Error");
            }
        })
    });

    $(document).on('click', '.updateCustomerStatus', function(){
        var customer_id= $(this).attr('customer_id');
        var status = $(this).data("status");
        var $this = $(this); 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-customer-status',
            data: {status:status, customer_id: customer_id},
            success: function(resp){

                if(resp['status'] == 'INACTIVE'){
                    $this.text('INACTIVE');
                    $this.removeClass('btn-success').addClass('btn-info');
                    $this.data('status', 'INACTIVE');
                } else if(resp['status'] == 'ACTIVE'){
                    $this.text('ACTIVE');
                    $this.removeClass('btn-info').addClass('btn-success');
                    $this.data('status', 'ACTIVE');
                }
            }, error: function(){
                alert("Error");
            }
        })
    });

     var maxField = 10; //Input fields increment limitation
     var addButton = $('.add_button'); //Add button selector
     var wrapper = $('.field_wrapper'); //Input field wrapper
     var fieldHTML = '<div><div style="height: 10px;"></div><input type="text" name="size[]" style="width:120px;" placeholder="Size" required/>&nbsp;<input type="text" name="sku[]" style="width:120px;" placeholder="SKU" required/><input type="text" name="price[]" style="width:120px;" placeholder="Price"/ required><input type="text" name="stock[]" style="width:120px;" placeholder="Stock" required/><a href="javascript:void(0);" class="remove_button">Delete</a></div>'; //New input field html 
     var x = 1; //Initial field counter is 1
     
     //Once add button is clicked
     $(addButton).click(function(){
         //Check maximum number of input fields
         if(x < maxField){ 
             x++; //Increment field counter
             $(wrapper).append(fieldHTML); //Add field html
         }
     });
     
     //Once remove button is clicked
     $(wrapper).on('click', '.remove_button', function(e){
         e.preventDefault();
         $(this).parent('div').remove(); //Remove field html
         x--; //Decrement field counter
     });

    //  document.addEventListener('DOMContentLoaded', function () {
        const select = document.getElementById('imageSelect');
        const imageContainer = document.querySelector('.select-image');
        
        if (select) {
            select.addEventListener('change', function () {
                const selectedOption = select.options[select.selectedIndex];
                const imageLink = selectedOption.getAttribute('data-image');
                const image = imageContainer.querySelector('img');
                image.src = imageLink;
                imageContainer.style.display = 'block';
            });
        }
    //  })
})