var exp = new Vue({
  el: '#register',
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
      this.isProcessing = true;
      this.$http.post('http://paltani.com/invoease/public/register', this.form)
      .then(function(response) {
          if(response.data.created) {
              window.location.href = 'http://paltani.com/invoease/public/dashboard';

          } else {
            this.isProcessing = false;
           
          }
        })
        .catch(function(response) {
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);

        })
    }
  }

})