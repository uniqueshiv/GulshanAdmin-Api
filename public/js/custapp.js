var custapp = new Vue({
  el: '#customer',

  data: {
    isProcessing: false,
    form: {},
    errors: {}
  },
  created: function () {
    Vue.set(this.$data, 'form', _form);
  },  
  methods: {
    create: function() {
       $("#loader-wrapper").show();
      this.isProcessing = true;
     
     
    this.$http.post('http://paltani.com/invoease/public/customers', this.form)
    
        .then(function(response) {

          if(response.data.created) {
             $("#loader-wrapper").hide();
        window.location.href = 'http://paltani.com/invoease/public/customers';

          } 
        })
        .catch(function(response) {
           $("#loader-wrapper").hide();
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);

          if(response.data.customer_email && response.data.mobile_no){
           swal({
        title : "Client Already Exist", 
        type: "error",
        showConfirmButton: true,
         }, 
            function(isConfirm)
             {   if (isConfirm) {   window.location.href = 'http://paltani.com/invoease/public/customers/create';  } 
            });
          }
           else if(response.data.customer_email ){
           swal({
        title : "Email Already Exist", 
        type: "error",
        showConfirmButton: true,
         }, 
            function(isConfirm)
             {   if (isConfirm) { $('#profileForm-title-0').click();  $('#customer_email').focus();  } 
            });
          }

         else if(response.data.mobile_no ){
           swal({
        title : "Mobile Number Already Exist", 
        type: "error",
        showConfirmButton: true,
         }, 
            function(isConfirm)
             {   if (isConfirm) { $('#profileForm-title-1').click();  $('#mobil_no').focus();  } 
            });
          }
        })
    },

    update: function() {
       $("#loader-wrapper").show();
      this.isProcessing = true;
      this.$http.put('http://paltani.com/invoease/public/customers/' + this.form.customer_id, this.form)
        .then(function(response) {
          if(response.data.updated) {
             $("#loader-wrapper").hide();
            window.location.href = 'http://paltani.com/invoease/public/customers';
          } 
        })
         .catch(function(response) {
                    $("#loader-wrapper").hide();
                    this.isProcessing = false;
                    Vue.set(this.$data, 'errors', response.data);
                    if (response.data) {
                        swal({
                                title: "Email or Mobile Number already taken.",
                                type: "error",
                                showConfirmButton: true,
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    $('#profileForm-title-0').click();
                                    $('#customer_email').focus();
                                }
                            });
                    } else {
                        swal({
                            title: "Oops!!! . some error occurred.",
                            type: "error"

                        });
                    }
        })
    },


  }
  
})