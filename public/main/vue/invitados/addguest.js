Vue.component('addguest', {
  props: ['pnombre', 'pcelular', 'pemail', 'pevento'],
  data: function () {
    return {
      evento: '',
      id: '',
      nombre: '',
      celular: '',
      email: ''
    }
  },
  methods:{
    addInvitado: function(){
      $.ajax({
        url: '/addinvitado/'+this.evento,
        method: 'post',
        data: {id: this.id, nombre: this.nombre, celular: this.celular, email: this.email}
      }).done(
        function(data){
          console.log(data);
        }
      ).fail(
        function(data){
          console.log(data);
        }
      );
    },
  },
  created: function () {
    this.nombre = this.pnombre;
    this.celular = this.pcelular;
    this.email = this.pemail;
    this.evento = this.pevento;
  },
  template: '<form class="form-inline" v-on:submit.prevent="addInvitado">' +
  '<input type="hidden" name="id" v-model="id" > ' +
  '<div class="form-group">' +
  ' <label  class="bmd-label-floating">Nombre</label>' +
  ' <input type="text" class="form-control" name="nombre" v-model="nombre">' +
  '</div>' +
  '<div class="form-group">' +
  ' <label  class="bmd-label-floating">Telefono</label>' +
  ' <input type="text" class="form-control" name="celular" v-model="celular">' +
  '</div>' +
  '<div class="form-group">' +
  ' <label  class="bmd-label-floating">Email</label>' +
  ' <input type="text" class="form-control" name="email" v-model="email">' +
  '</div>' +
  '<span class="form-group bmd-form-group">' +
  ' <button class="btn btn-primary bmd-btn-icon"> <i class="material-icons">add</i></button>' +
  '</span>' +
  '</form>',
})