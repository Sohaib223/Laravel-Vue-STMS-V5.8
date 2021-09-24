<template>
  <div>
    <div
      class="bg-image bg-image-bottom"
      :style="{backgroundImage: 'url('+baseurl+'/public/assets/media/photos/photo34@2x.jpg'+')'}"
    >
      <div class="bg-primary-dark-op">
        <div class="content content-top text-center overflow-hidden">
          <div class="pt-50 pb-20">
            <h1
              class="font-w700 text-white mb-10 js-appear-enabled animated fadeInUp"
              data-toggle="appear"
              data-class="animated fadeInUp"
            >Dashboard</h1>
            <h2
              class="h4 font-w400 text-white-op js-appear-enabled animated fadeInUp"
              data-toggle="appear"
              data-class="animated fadeInUp"
            >Welcome to your custom panel!</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="row" data-toggle="appear">
        <!-- Row #2 -->
        <div class="col-md-12">
          <div class="block">
            <div class="block-header bg-primary-lighter">
              <h3 class="block-title">Notifications List</h3>
              <div class="block-options">
                <button
                  type="button"
                  class="btn-block-option"
                  data-toggle="block-option"
                  data-action="state_toggle"
                  data-action-mode="demo"
                  @click="getResults();"
                >
                  <i class="si si-refresh"></i>
                </button>
              </div>
            </div>

            <div class="block-content block-content-full clearfix">
              <div class="row">
                <table class="table table-striped table-vcenter" style="border-color:white">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Email</th>
                      <th>Location Name</th>
                      <th>Address</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody style="font-size:10px;">
                    <tr v-for="(data,i) in notifications" style="padding:0px;">
                      <td>{{ data.title }}</td>
                      <td>{{data.user_email}}</td>
                      <td>{{data.locationname}}</td>
                      <td>{{data.address}}</td>
                      <td>{{ data.created_at | moment }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="row myLoader" style="display:none;">
                <div class="col-sm-12 mt-2" align="center">
                  <h3>
                    <i class="fa fa-spinner fa-spin" style="color:black;"></i>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from "vue";
Vue.component("pagination", require("laravel-vue-pagination"));
export default {
  data() {
    return {
      notifications: {},
      baseurl: document.getElementById("baseUrl").value,
      role_id: document.getElementById("roleId").value,
      user_id: document.getElementById("userId").value,
      totalpendingcomplaints: 0,
      totalUsersRegistered: 0,
      todayApprovals: 0,
      totalhelps: 0,
      rptErr: 1,
      search_here: "",
      statusFilter: 10,
      sortname: "created_at",
      ordername: "ASC"
    };
  },
  created() {
    this.getResults();
  },
  filters: {
    moment: function(date) {
      return moment(date).format("Do MMM YY  h:m");
    }
  },
  methods: {
    changeSorting(event, fel, sel, sortname, order) {
      this.sortname = sortname;
      this.ordername = order;
      this.getResults();
      $("." + fel).css("display", "inline-block");
      $("." + sel).css("display", "none");
    },
    getWords(str) {
      return str
        .split(/\s+/)
        .slice(0, 5)
        .join(" ");
    },
    getResults() {
      var _this = this;
      var myurl;
      _this.table_data = {};
      $(".myLoader").css("display", "block");
      myurl = _this.baseurl + "/api/usernotifications";
      axios
        .get(myurl)
        .then(response => {
          //console.log(response.data);
          _this.notifications = response.data.notifications;
          _this.totalpendingcomplaints = response.data.pendingcomplaints;
          _this.totalUsersRegistered = response.data.totalUsersRegistered;
          _this.totalhelps = response.data.totalhelps;
          _this.todayApprovals = response.data.todayApprovals;
          $(".myLoader").css("display", "none");
        })
        .catch(error => {
          if (_this.rptErr * 1 < 6) {
            _this.getResults();
            _this.rptErr++;
          }
        });
    }
  }
};
</script>
