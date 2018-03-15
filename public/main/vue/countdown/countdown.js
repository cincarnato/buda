var interval = null;
Vue.component('countdown', {
    props: {
      deadline: {
        type: String
      },
      end: {
        type: String
      },
      stop: {
        type: Boolean
      }
    },
    data: function () {
      return {
        now: Math.trunc((new Date()).getTime() / 1000),
        date: null,
        diff: 0
      }
    },
    created: function () {
      if (!this.deadline && !this.end) {
        throw new Error("Missing props 'deadline' or 'end'");
      }
      var endTime = this.deadline ? this.deadline : this.end;
      this.date = Math.trunc(Date.parse(endTime.replace(/-/g, "/")) / 1000);
      if (!this.date) {
        throw new Error("Invalid props value, correct the 'deadline' or 'end'");
      }
      var that = this;
      interval = setInterval(function () {
          that.now = Math.trunc((new Date()).getTime() / 1000);
        },
        1000
      )
      ;
    },
    computed: {
      seconds: function () {
        return Math.trunc(this.diff) % 60
      },
      minutes: function () {
        return Math.trunc(this.diff / 60) % 60
      },
      hours: function () {
        return Math.trunc(this.diff / 60 / 60) % 24
      },
      days: function () {
        return Math.trunc(this.diff / 60 / 60 / 24)
      }
    },
    watch: {
      now: function (value) {
        this.diff = this.date - this.now;
        if (this.diff <= 0 || this.stop) {
          this.diff = 0;
          // Remove interval
          clearInterval(interval);
        }
      }
    },
    filters: {
      twoDigits: function (value) {
        if (value.toString().length <= 1) {
          return '0' + value.toString()
        }
        return value.toString()
      }
    },
    destroyed: function () {
      clearInterval(interval);
    },
    template: '<ul class="vuejs-countdown">' +
    '  <li v-if="days > 0">' +
    '  <p class="digit">{{ days | twoDigits }}</p>' +
    '<p class="text">{{ days > 1 ? \'dias\' : \'dia\' }}</p>' +
    '</li>' +
    '<li>' +
    '<p class="digit">{{ hours | twoDigits }}</p>' +
    '<p class="text">{{ hours > 1 ? \'horas\' : \'hora\' }}</p>' +
    '</li>' +
    '<li>' +
    '<p class="digit">{{ minutes | twoDigits }}</p>' +
    '<p class="text">min</p>' +
    '  </li>' +
    '  <li>' +
    '  <p class="digit">{{ seconds | twoDigits }}</p>' +
    '<p class="text">seg</p>' +
    '  </li>' +
    '  </ul>'
  }
);