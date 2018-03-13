Vue.component('formguest', {
  props: ['pid', 'pnombre', 'pcelular', 'pemail', 'pevento'],
  data: function () {
    return {
      sp: false,
      evento: '',
      entity: {
        id: '',
        nombre: '',
        celular: '',
        email: '',
        evento: ''
      }
    }
  },
  methods: {
    addInvitado: function () {
      var that = this;
      this.sp = true;
      $.ajax({
        url: '/addinvitado/' + this.pevento,
        method: 'post',
        data: {id: this.entity.id, nombre: this.entity.nombre, celular: this.entity.celular, email: this.entity.email}
      }).done(
        function (data) {
          console.log(data);
          that.entity.id = data.id;
          that.entity.evento = that.pevento;
          that.$emit('add', that.entity);
          that.entity = {
            id: '',
            nombre: '',
            celular: '',
            email: '',
            evento: ''
          };
          that.sp = false;
        }
      ).fail(
        function (data) {
          console.log(data);
        }
      );
    },
  },
  created: function () {
    this.entity.id = this.pid;
    this.entity.nombre = this.pnombre;
    this.entity.celular = this.pcelular;
    this.entity.email = this.pemail;
    this.entity.evento = this.pevento;
  },
  template: '<form class="" v-on:submit.prevent="addInvitado">' +
  '<input type="hidden" name="id" v-model="entity.id" >' +
  '<div class="row">' +
  '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">' +
  '<div class="form-group">' +
  ' <label  class="bmd-label-floating">Nombre</label>' +
  ' <input type="text" class="form-control" name="nombre" v-model="entity.nombre">' +
  '</div>' +
  '</div>' +
  '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">' +
  '<div class="form-group">' +
  ' <label  class="bmd-label-floating">Telefono</label>' +
  ' <input type="text" class="form-control" name="celular" v-model="entity.celular">' +
  '</div>' +
  '</div>' +
  '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">' +
  '<div class="form-group">' +
  ' <label  class="bmd-label-floating">Email</label>' +
  ' <input type="text" class="form-control" name="email" v-model="entity.email">' +
  '</div>' +
  '</div>' +
  '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">' +
  '<span class="form-group bmd-form-group">' +
  ' <button class="btn btn-primary " :disabled="sp"> <i class="material-icons">add</i> Agregar Invitado</button>' +
  '</span>' +
  '</div>' +
  '</div>' +
  '</form>'
})