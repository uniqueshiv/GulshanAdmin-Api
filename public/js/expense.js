var exp = new Vue({
  el: '#expense',
  data: {
    isProcessing: false,
    form: {},
    errors: {}
  },
 
  methods: {
    edit:function(event){
      $("#loader-wrapper").show();
      this.isProcessing = true;
      this.form.vendor_name='';
      this.form.amount='';
      this.form.mode ='Cash';
      this.form.check_no ='';
      this.form.d_d_no='';
      this.form.remarks='';

      var expense_id=event;
         this.$http.get('http://paltani.com/invoease/public/expenses/' + expense_id + '/edit')
       .then(function(response) {
           $("#loader-wrapper").hide();
         var data=response.data;  

          Vue.set(this.$data, 'form', data);
          if (this.form.mode == "DD") {
                        $("#DD").show();
                    } else {
                        $("#DD").hide();
                    }

                    if (this.form.mode == "Cheque") {
                        $("#Cheque").show();
                    } else {
                        $("#Cheque").hide();
                    }

 })

    },

  
 
    create: function() {
        $("#loader-wrapper").show();
    
     
      this.isProcessing = true;
      
      this.$http.post('http://paltani.com/invoease/public/expenses', this.form)
              .then(function(response) {
          if(response.data.created) {
            $("#loader-wrapper").hide();
         window.location.href ='http://paltani.com/invoease/public/expenses';

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
      this.$http.put('http://paltani.com/invoease/public/expenses/' + this.form.expense_id, this.form)
        .then(function(response) {
 
          if(response.data.updated) {
          $("#loader-wrapper").hide(); 
         window.location.href ='http://paltani.com/invoease/public/expenses';
          }
           
        })
        .catch(function(response) {
          $("#loader-wrapper").hide();
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);
        })
    }
  }
  
})
