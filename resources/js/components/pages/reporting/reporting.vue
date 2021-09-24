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
            >Reporting</h1>
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
        <div class="col-md-6">
          <select class="form-control table-selection">
            <option disabled selected>Select Report Table</option>
            <option value="user">User</option>
            <option value="complaint">Complaint</option>
            <option value="notification">Notification</option>
          </select>
        </div>
        <div class="col-md-6">
          <div id="reportrange" class="pull-right form-control">
            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
            <span></span>
          </div>
        </div>
        <div class="col-sm-12" style="margin-top:20px;"></div>
        <div class="col-md-12" :style="(detail.table=='user')?'display:block':'display:none;'">
          <div class="block">
            <div class="block-header block-header-default">
              <h3 class="block-title">User List</h3>
              <a
                :href="baseurl+'/excel_download?type='+detail.table+'&startDate='+detail.startDate+'&endDate='+detail.endDate"
                class="btn btn-warning"
              >Excel</a>
            </div>
            <div class="block-content block-content-full clearfix">
              <div class="row">
                <table class="table table-striped table-vcenter" style="border-color:white">
                  <thead>
                    <tr>
                      <th width="5%">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact No</th>
                      <th>Address</th>
                      <th>Email Verify Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(users,key) in report">
                      <td v-text="key+1"></td>
                      <td v-text="users.name"></td>
                      <td v-text="users.email"></td>
                      <td v-text="users.contact_no"></td>
                      <td v-text="users.address"></td>
                      <td>{{users.email_verified_at | moment}}</td>
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

        <div class="col-md-12" :style="(detail.table=='complaint')?'display:block':'display:none;'">
          <div class="block">
            <div class="block-header block-header-default">
              <h3 class="block-title">Complaint List</h3>
              <a
                :href="baseurl+'/excel_download?type='+detail.table+'&startDate='+detail.startDate+'&endDate='+detail.endDate"
                class="btn btn-warning"
              >Excel</a>
            </div>
            <div class="block-content block-content-full clearfix">
              <div class="row">
                <table class="table table-striped table-vcenter" style="border-color:white">
                  <thead>
                    <tr>
                      <th width="5%">#</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Location</th>
                      <th>Address</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(complaint,key) in report">
                      <td v-text="key+1"></td>
                      <td v-text="complaint.title"></td>
                      <td v-text="complaint.description"></td>
                      <td
                        v-if="(complaint.category)?true:false"
                        v-text="complaint.category.category_name"
                      ></td>
                      <td v-if="(complaint.location)?true:false" v-text="complaint.location.name"></td>
                      <td v-text="complaint.address"></td>
                      <td v-if="(complaint.status==0)?true:false">Pending</td>
                      <td v-if="(complaint.status==1)?true:false">In Process</td>
                      <td v-if="(complaint.status==2)?true:false">Resolved</td>
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

        <div
          class="col-md-12"
          :style="(detail.table=='notification')?'display:block':'display:none;'"
        >
          <div class="block">
            <div class="block-header block-header-default">
              <h3 class="block-title">Notification List</h3>
              <a
                :href="baseurl+'/excel_download?type='+detail.table+'&startDate='+detail.startDate+'&endDate='+detail.endDate"
                class="btn btn-warning"
              >Excel</a>
            </div>
            <div class="block-content block-content-full clearfix">
              <div class="row">
                <table class="table table-striped table-vcenter" style="border-color:white">
                  <thead>
                    <tr>
                      <th width="5%">#</th>
                      <th>User Name</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Location</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(notification,key) in report">
                      <td v-text="key+1"></td>
                      <td v-text="notification.user_name"></td>
                      <td v-text="notification.title"></td>
                      <td v-text="notification.description"></td>
                      <td v-text="notification.location_name"></td>
                      <td v-text="notification.address"></td>
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
export default {
  data() {
    return {
      detail: {
        startDate: moment()
          .subtract(29, "days")
          .format("YYYY-MM-DD"),
        endDate: moment().format("YYYY-MM-DD"),
        table: ""
      },
      report: [],
      baseurl: document.getElementById("baseUrl").value,
      role_id: document.getElementById("roleId").value,
      user_id: document.getElementById("userId").value
    };
  },
  mounted() {
    var _this = this;
    $(document).ready(function() {
      $("#reportrange span").html(
        moment()
          .subtract(29, "days")
          .format("MMMM D, YYYY") +
          " - " +
          moment().format("MMMM D, YYYY")
      );

      $("#reportrange").daterangepicker(
        {
          format: "MM/DD/YYYY",
          startDate: moment().subtract(29, "days"),
          endDate: moment(),
          minDate: "01/01/2019",
          maxDate: "12/31/2050",
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            Today: [moment(), moment()],
            Yesterday: [
              moment().subtract(1, "days"),
              moment().subtract(1, "days")
            ],
            "Last 7 Days": [moment().subtract(6, "days"), moment()],
            "Last 30 Days": [moment().subtract(29, "days"), moment()],
            "This Month": [moment().startOf("month"), moment().endOf("month")],
            "Last Month": [
              moment()
                .subtract(1, "month")
                .startOf("month"),
              moment()
                .subtract(1, "month")
                .endOf("month")
            ]
          },
          opens: "left",
          drops: "down",
          buttonClasses: ["btn", "btn-sm"],
          applyClass: "btn-success",
          cancelClass: "btn-default",
          separator: " to ",
          locale: {
            applyLabel: "Submit",
            cancelLabel: "Cancel",
            fromLabel: "From",
            toLabel: "To",
            customRangeLabel: "Custom",
            daysOfWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
            monthNames: [
              "January",
              "February",
              "March",
              "April",
              "May",
              "June",
              "July",
              "August",
              "September",
              "October",
              "November",
              "December"
            ],
            firstDay: 1
          }
        },
        function(start, end, label) {
          _this.detail.startDate = start.format("YYYY-MM-DD");
          _this.detail.endDate = end.format("YYYY-MM-DD");
          _this.submitReport();
          $("#reportrange span").html(
            start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
          );
        }
      );

      $(".table-selection").on("change", function() {
        _this.detail.table = $(this).val();
        _this.submitReport();
      });
    });
  },
  filters: {
    moment: function(date) {
      return moment(date).format("Do MMM YYYY (hh:mm)");
    }
  },
  methods: {
    submitReport() {
      var _this = this;
      axios
        .post(_this.baseurl + "/api_ajax_report", _this.detail)
        .then(response => {
          _this.report = response.data;
        });
    }
  }
};
</script>