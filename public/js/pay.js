var app = new Vue({
  el: '#payment',
  data: {
    isProcessing: false,
    form: {},
    errors: {}
  },
  created: function () {
    Vue.set(this.$data, 'form', _form);
  },
  methods: {

    fetchinvoice:function() {
         $("#loader-wrapper").show();
    var clientid=this.form.client_id;
      this.$http.get('http://paltani.com/invoease/public/getinvoice/' + clientid)
        .then(function(response){
             $("#loader-wrapper").hide();
            var data=response.data;
            this.invoicetable = data;
                var tablearea = document.getElementById('pay-table');
                var paymentearea = document.getElementById('makepaymentsection');
                document.getElementById('paymentamount').style.display="none";
                document.getElementById('invoiceid').value="";

             var th, text;
             tablearea.innerHTML = "";
             paymentearea.innerHTML = "";
             

             var table = document.createElement('table');
            table.setAttribute('class','table table-striped');
             var headerRow = document.createElement('tr');   
             var thead = document.createElement('thead');   

             th = document.createElement('th');
             text = document.createTextNode('Invoice Number');
             th.appendChild(text);
             headerRow.appendChild(th);
            
             th = document.createElement('th');
             text = document.createTextNode('Invoice date');
             th.appendChild(text);
             headerRow.appendChild(th);
            
             th = document.createElement('th');
             text = document.createTextNode('Invoice Due Date');
             th.appendChild(text);
             headerRow.appendChild(th);

            
             th = document.createElement('th');
             text = document.createTextNode('Grand Total');
             th.appendChild(text);
             headerRow.appendChild(th);

               th = document.createElement('th');
             text = document.createTextNode('Amount Paid');
             th.appendChild(text);
             headerRow.appendChild(th);

              th = document.createElement('th');
             text = document.createTextNode('Amount Left');
             th.appendChild(text);
             headerRow.appendChild(th);
            
             th = document.createElement('th');
             text = document.createTextNode('Action');
             th.appendChild(text);
             headerRow.appendChild(th);
            
             thead.appendChild(headerRow);
             table.appendChild(thead);
            
             var tbody = document.createElement('tbody');
             var td, tdText, dataRow, invoiceId, btnMakePayment;

             for(var row=0; row < data.length; row++){
                 dataRow = document.createElement('tr');
                
                 invoiceId=data[row].invoice_id;

                 td = document.createElement('td');
                 tdText = document.createTextNode(data[row].invoice_no);
                 td.appendChild(tdText);
                 dataRow.appendChild(td);
                
                 td = document.createElement('td');
                 tdText = document.createTextNode(data[row].invoice_date);
                 td.appendChild(tdText);
                 dataRow.appendChild(td);
                
                 td = document.createElement('td');
                 tdText = document.createTextNode(data[row].due_date);
                 td.appendChild(tdText);
                 dataRow.appendChild(td);
                

                 td = document.createElement('td');
                 tdText = document.createTextNode(data[row].grand_total);
                 td.appendChild(tdText);
                 dataRow.appendChild(td);

                  td = document.createElement('td');
                 tdText = document.createTextNode(data[row].paidamount);
                 td.appendChild(tdText);
                 dataRow.appendChild(td);

                td = document.createElement('td');
                 tdText = document.createTextNode(data[row].amountleft);
                 td.appendChild(tdText);
                 dataRow.appendChild(td);
                
                 td = document.createElement('td');
                
                var span = document.createElement('span_'+invoiceId);
                 span.innerHTML = '<a class="btn btn-success" data-toggle="modal" id="button_'+invoiceId +'" href="#myModal10 " invoiceId="'+invoiceId +'" invoice_no="'+data[row].invoice_no +'" due_date="'+data[row].due_date+'" amountleft="'+data[row].amountleft +'" grand_total="'+data[row].grand_total +'" onclick="makePayment(this)" text="Make Payment" >Make Payment</a';
                
                 td.appendChild(span);
                 dataRow.appendChild(td);
                
                 tbody.appendChild(dataRow);
                 btnMakePayment=null;
             }
             table.appendChild(tbody);
             tablearea.appendChild(table);

        // Vue.set('invoices', data)
      })
        .catch(function(response) {
             $("#loader-wrapper").hide();
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);
        })

      },
 
    create: function() {
         $("#loader-wrapper").show();
      var input = $('#invoiceid');
      input.trigger('change');

       var paym = $('#payamount');
      paym.trigger('change');
       this.form.payment_method ='Cash';
      $('#modetype').trigger('change');
      this.isProcessing = true;
      this.$http.post('http://paltani.com/invoease/public/payments', this.form)
      
        .then(function(response) {
             $("#loader-wrapper").hide();
          window.location.href = 'http://paltani.com/invoease/public/payments';

        })
        .catch(function(response) {
             $("#loader-wrapper").hide();
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);
        })
    },
 
    update: function() {
         $("#loader-wrapper").show();
      $('#payid').trigger('change');
      $('#paydate').trigger('change');
      $('#payamount').trigger('change');
      $('#modetype').trigger('change');
      $('#ddno').trigger('change');
      $('#chno').trigger('change');
      $('#review').trigger('change');
      
      this.isProcessing = true;
      var obj=this.form;
      this.$http.put('http://paltani.com/invoease/public/payments/' + this.form.payment_id, this.form)
        .then(function(response) {
             $("#loader-wrapper").hide();
          window.location.href = 'http://paltani.com/invoease/public/payments';
 
        })
        .catch(function(response) {
             $("#loader-wrapper").hide();
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);
        })
    }
}
})
