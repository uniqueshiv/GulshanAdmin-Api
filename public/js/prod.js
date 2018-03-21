var vm=new Vue({
	el:'#products',

	methods:{
		fetchUser:function(){
			this.$http.get('/api/customer',function(data){
				this.$set('customers',data)
			})
		}
	},
	ready:function(){
		alert('sss');
	}
	
})