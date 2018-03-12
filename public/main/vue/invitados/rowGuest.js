Vue.component('rowguest', {
  props: ['pentity',  'powner', 'index'],
  data: function () {
    return {
      key: '',
      owner: false,
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
    delInvitado: function () {
      var that = this;
      $.ajax({
        url: '/delinvitado/' + this.entity.evento,
        method: 'post',
        data: {id: this.entity.id}
      }).done(
        function (data) {
          that.$emit('del', that.index);
          console.log(data);
        }
      ).fail(
        function (data) {
          console.log(data);
        }
      );
    },
  },
  created: function () {
    this.entity  = this.pentity;
    this.owner = this.powner;
  },
  template: '<tr>' +
  '<td>{{entity.nombre}}</td>' +
  '<td v-if="owner">{{entity.celular}}</td>' +
  '<td v-if="owner">{{entity.email}}</td>' +
  '<td v-if="owner"><button class="btn btn-danger bmd-btn-icon" @click="delInvitado"> <i class="material-icons">delete</i></button></td>' +
  '</tr>'
})