Vue.component('tableguest', {
  props: ['pentities', 'powner', 'pevento'],
  data: function () {
    return {
      owner: false,
      evento: '',
      entities: []
    }
  },
  methods: {
    addRow: function (data) {
      var entity = Object.assign({}, data);
      this.entities.push(entity) - 1;
    },
    delRow: function (index) {
      this.entities.splice(index,1);
    }
  },
  created: function () {
    this.entities = this.pentities;
    this.owner = this.powner;
    this.evento = this.pevento;
  },
  template: ' <div>' +
  '<table class="table  table-responsive-lg table-responsive-md">' +
  '<tbody>' +
  '<template v-for="entity, index in entities">' +
  ' <rowguest :pentity="entity" :powner="owner" :index="index" :key="entity.id" v-on:del="delRow"></rowguest>' +
  '</template>' +
  '</tbody>' +
  '</table>' +
  '<formguest v-if="owner" :pevento="evento" v-on:add="addRow"></formguest>' +
  '</div>'
})