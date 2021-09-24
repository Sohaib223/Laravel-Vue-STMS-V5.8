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
            >Users</h1>
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
              <h3 class="block-title">Users List</h3>
              <div class="block-options">
                <router-link to="/customer/create" class="btn btn-info">Add Users</router-link>
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
                      <th width="10%">Reg#</th>
                      <th width="20%">
                        <span
                          style="color:black;display:inline-block;cursor:pointer"
                          class="nameOrderAsc"
                          @click="changeSorting($event,'nameOrderDesc','nameOrderAsc','name','DESC')"
                        >
                          <i class="fa fa-long-arrow-up"></i>
                        </span>
                        <span
                          style="color:black;display:none;cursor:pointer"
                          class="nameOrderDesc"
                          @click="changeSorting($event,'nameOrderAsc','nameOrderDesc','name','ASC')"
                        >
                          <i class="fa fa-long-arrow-down"></i>
                        </span> Name
                      </th>
                      <th width="20%">
                        <span
                          style="color:black;display:inline-block;cursor:pointer"
                          class="emailOrderAsc"
                          @click="changeSorting($event,'emailOrderDesc','emailOrderAsc','email','DESC')"
                        >
                          <i class="fa fa-long-arrow-up"></i>
                        </span>
                        <span
                          style="color:black;display:none;cursor:pointer"
                          class="emailOrderDesc"
                          @click="changeSorting($event,'emailOrderAsc','emailOrderDesc','email','ASC')"
                        >
                          <i class="fa fa-long-arrow-down"></i>
                        </span> Email
                      </th>
                      <th width="10%">
                        <span
                          style="color:black;display:inline-block;cursor:pointer"
                          class="statusOrderAsc"
                          @click="changeSorting($event,'statusOrderDesc','statusOrderAsc','status','DESC')"
                        >
                          <i class="fa fa-long-arrow-up"></i>
                        </span>
                        <span
                          style="color:black;display:none;cursor:pointer"
                          class="statusOrderDesc"
                          @click="changeSorting($event,'statusOrderAsc','statusOrderDesc','status','ASC')"
                        >
                          <i class="fa fa-long-arrow-down"></i>
                        </span> Status
                      </th>
                      <th width="10%">
                        <span
                          style="color:black;display:inline-block;cursor:pointer"
                          class="is_verifiedOrderAsc"
                          @click="changeSorting($event,'is_verifiedOrderDesc','is_verifiedOrderAsc','is_verified','DESC')"
                        >
                          <i class="fa fa-long-arrow-up"></i>
                        </span>
                        <span
                          style="color:black;display:none;cursor:pointer"
                          class="is_verifiedOrderDesc"
                          @click="changeSorting($event,'is_verifiedOrderAsc','is_verifiedOrderDesc','is_verified','ASC')"
                        >
                          <i class="fa fa-long-arrow-down"></i>
                        </span> Approval
                      </th>
                      <th width="20%">
                        <span
                          style="color:black;display:inline-block;cursor:pointer"
                          class="created_atOrderAsc"
                          @click="changeSorting($event,'created_atOrderDesc','created_atOrderAsc','created_at','DESC')"
                        >
                          <i class="fa fa-long-arrow-up"></i>
                        </span>
                        <span
                          style="color:black;display:none;cursor:pointer"
                          class="created_atOrderDesc"
                          @click="changeSorting($event,'created_atOrderAsc','created_atOrderDesc','created_at','ASC')"
                        >
                          <i class="fa fa-long-arrow-down"></i>
                        </span> Created At
                      </th>
                      <th width="10%">
                        <i class="fa fa-gear"></i>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(data,i) in table_data.data">
                      <td v-if="data.reg_no !== null">{{ data.reg_no}}</td>
                      <td v-else>Not Register</td>
                      <td>{{ data.name }}</td>
                      <td>{{ data.email }}</td>
                      <td v-if="data.status*1 === 1">Active</td>
                      <td v-else>In Active</td>
                      <td v-if="data.is_verified*1 === 1">Verified</td>
                      <td v-else>Unverified</td>
                      <td>{{ data.created_at | moment }}</td>
                      <td>
                        <router-link
                          :to="'/customer/'+data.customer_id+'/edit'"
                          class="btn btn-sm btn-secondary"
                          data-toggle="tooltip"
                          title="Edit"
                        >
                          <i class="fa fa-pencil"></i>
                        </router-link>
                        <button
                          v-if="role_id*1 == 1"
                          @click="deleteRecord(data.customer_id)"
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
      sortname: "created_at",
      ordername: "DESC"
    };
  },
  mounted() {
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
            .post(_this.baseurl + "/api/customer/" + item_id, {
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
        "/api/customer?search=" +
        _this.search_here +
        "&sortname=" +
        _this.sortname +
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