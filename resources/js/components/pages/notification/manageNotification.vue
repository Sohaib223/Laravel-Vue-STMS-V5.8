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
            >Notifications</h1>
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
      <div class="row">
        <div class="col-md-12">
          <div class="block">
            <div class="block-header block-header-default">
              <h3 class="block-title">Notification List</h3>
              <div class="block-options">
                <router-link
                  v-if="role_id*1 === 1"
                  to="/notification/create"
                  class="btn btn-info"
                >Add Notification</router-link>
              </div>
            </div>
            <div class="block-content block-content-full clearfix">
              <div class="row">
                <div class="col-sm-9"></div>
                <div class="col-sm-3" align="right">
                  <input
                    type="text"
                    class="form-control form-control2"
                    @keyup="getResults"
                    v-model="search_here"
                    placeholder="Search"
                  >
                </div>
              </div>
              <div class="row">
                <table class="table table-striped table-vcenter" style="border-color:white">
                  <thead>
                    <tr>
                      <th width="8%">Id</th>
                      <th width="15%">
                        <span
                          style="color:black;display:inline-block;cursor:pointer"
                          class="nameOrderAsc"
                          @click="changeSorting($event,'nameOrderDesc','nameOrderAsc','title','DESC')"
                        >
                          <i class="fa fa-long-arrow-up"></i>
                        </span>
                        <span
                          style="color:black;display:none;cursor:pointer"
                          class="nameOrderDesc"
                          @click="changeSorting($event,'nameOrderAsc','nameOrderDesc','title','ASC')"
                        >
                          <i class="fa fa-long-arrow-down"></i>
                        </span>Title
                      </th>
                      <th>Description</th>
                      <th width="20%">
                        <span
                          style="color:black;display:inline-block;cursor:pointer"
                          class="dateOrderAsc"
                          @click="changeSorting($event,'dateOrderDesc','dateOrderAsc','created_at','DESC')"
                        >
                          <i class="fa fa-long-arrow-up"></i>
                        </span>
                        <span
                          style="color:black;display:none;cursor:pointer"
                          class="dateOrderDesc"
                          @click="changeSorting($event,'dateOrderAsc','dateOrderDesc','created_at','ASC')"
                        >
                          <i class="fa fa-long-arrow-down"></i>
                        </span>Created Date
                      </th>
                      <th>Location</th>
                      <th width="10%" v-if="role_id*1 == 1">
                        <i class="fa fa-gear"></i>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(data,i) in table_data.data">
                      <td>{{ data.id}}</td>
                      <td>{{ data.title }}</td>
                      <td>{{ data.description }}</td>
                      <td>{{ data.created_at | moment }}</td>
                      <td>{{ data.location_name }}</td>
                      <td v-if="role_id*1 == 1">
                        <router-link
                          :to="'/notification/'+data.id+'/edit'"
                          class="btn btn-sm btn-secondary"
                          data-toggle="tooltip"
                          title="Edit"
                        >
                          <i class="fa fa-pencil"></i>
                        </router-link>
                        <button
                          @click="deleteRecord(data.id)"
                          class="btn btn-sm btn-secondary"
                          data-toggle="tooltip"
                          title="Delete"
                        >
                          <i class="fa fa-times"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="row">
                <div class="col-sm-12" align="right">
                  <pagination :data="table_data" @pagination-change-page="getResults" :limit="5"></pagination>
                </div>
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
      table_data: {},
      baseurl: document.getElementById("baseUrl").value,
      role_id: document.getElementById("roleId").value,
      user_id: document.getElementById("userId").value,
      rptErr: 1,
      search_here: "",
      statusFilter: 10,
      sortname: "created_at",
      ordername: "DESC"
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
    deleteRecord(item_id) {
      var _this = this;
      swal(
        {
          title: "Are you sure?",
          text: "Your will not be able to recover this Record!",
          type: "warning",
          showCancelButton: true,
          cancelButtonClass: "btn-default",
          confirmButtonClass: "btn-warning",
          confirmButtonText: "Remove",
          closeOnConfirm: false
        },
        function() {
          axios
            .post(_this.baseurl + "/api/notification/" + item_id, {
              _method: "DELETE"
            })
            .then(response => {
              if (response.data * 1 === 1) {
                swal({
                  title: "Deleted!",
                  text: "File has been deleted",
                  type: "success",
                  confirmButtonClass: "btn-success"
                });
                _this.getResults();
              } else {
                swal({
                  title: "Error!",
                  text: "Something Went Wrong !",
                  type: "error",
                  confirmButtonClass: "btn-danger"
                });
              }
            });
        }
      );
    },
    getResults(page = 1) {
      var _this = this;
      var myurl;
      _this.table_data = {};
      $(".myLoader").css("display", "block");
      myurl =
        _this.baseurl +
        "/api/notification?search=" +
        _this.search_here +
        "&sortname=" +
        _this.sortname +
        "&filterstatus=" +
        _this.statusFilter +
        "&ordername=" +
        _this.ordername +
        "&page=" +
        page;
      axios
        .get(myurl)
        .then(response => {
          //console.log(response.data);
          _this.table_data = response.data;
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