var app = new Vue({
  el: '#invoice',
  data: {
    isProcessing: false,
    form: {},
    errors: {}
  },
  created: function () {
    Vue.set(this.$data, 'form', _form);
  },
  methods: {
    addLine: function() {
      this.form.products.push({hsn_code:'', name: '', price: 0, qty: 1});
    },
    remove: function(product) {
      this.form.products.$remove(product);
    },
    
    create: function() {
    // var base_url = '{!! url() !!}';
    //  console.log(base_url);
        $("#loader-wrapper").show();
     // var input = $('#invoiceno');
     // input.trigger('change');
     // $('#hsn').trigger('change');
      this.isProcessing = true;
      
      this.$http.post('http://paltani.com/invoease/public/invoices', this.form)
        .then(function(response) { 
          if(response.data.created) {
             $("#loader-wrapper").hide();
          window.location.href = 'http://paltani.com/invoease/public/invoices';
          } 
          
        })
        .catch(function(response) {
          $("#loader-wrapper").hide();
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);
          
        })
    },
    update: function() {
        $("#loader-wrapper").show();
      this.isProcessing = true;
      this.$http.put('http://paltani.com/invoease/public/invoices/' + this.form.invoice_id, this.form)
        .then(function(response) {
          window.location.href = 'http://paltani.com/invoease/public/invoices';
                          
          })

        .catch(function(response) {
           $("#loader-wrapper").hide();
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);

        })
    }
  }
  ,
  computed: {
    subTotalofproduct: function() {
      return this.form.products.reduce(function(carry, product) {
          return carry + (parseFloat(product.qty) * parseFloat(product.price));
      }, 0);
    },
    subTotal: function() { 
          return this.subTotalofproduct  + parseFloat(this.form.other) + parseFloat(this.form.insurcharges) + parseFloat(this.form.fcharges) + parseFloat(this.form.lpcharges) ;
    },
    grandTotal: function(){
	if(this.form.tax){
	     var total=  this.subTotal + parseFloat(18.00)*this.subTotal/100 ;
	}
	else{
	 var total=  this.subTotal;
	}
	   return total.toFixed(2);
   }

  }
})