var exp = new Vue({
  el: '#notification',
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

      this.$http.post('/gulshanhomz/notifications', this.form)
              .then(function(response) {
         var thisdata =JSON.parse(response.data);
          if(thisdata.created) {
            $("#loader-wrapper").hide();
         window.location.href ='/gulshanhomz/notifications';

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

      this.$http.put('/gulshanhomz/notifications/' + this.form.id, this.form)
        .then(function(response) {
          window.location.href = '/gulshanhomz/notifications';

          })

        .catch(function(response) {
           $("#loader-wrapper").hide();
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);

        })
    },
    sendmassage: function(){
   this.$http.post('/gulshanhomz/sendMessage', this.form)
      .then(function(response) {
         var thisdata =(JSON.parse(response.data));
        if(thisdata.errors){
          alert(thisdata.errors);
        }
        else{
          alert(thisdata);
        }


        })
        .catch(function(response) {
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);

        })
    }



  }

})
