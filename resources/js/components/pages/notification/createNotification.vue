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
              <h3 class="block-title">Add New Notification</h3>
              <div class="block-options">
                <router-link to="/notification" class="btn btn-info">Manage Notification</router-link>
              </div>
            </div>
            <div class="block-content block-content-full clearfix">
              <form @submit="submitForm($event)">
                <div class="row">
                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.location_id) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <select class="form-control js-select2 location-selector">
                          <option value selected>Select notification Location</option>
                          <option
                            :value="key"
                            v-for="(location,key) in locations"
                            v-text="location"
                          ></option>
                        </select>
                        <label for="material-text2">Location</label>
                      </div>
                      <div
                        v-if="allerrors.location_id"
                        v-for="error_name in allerrors.location_id"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.address) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter Street Address"
                          v-model="myForm.address"
                        >

                        <label for="material-text2">Street Address</label>
                      </div>
                      <div
                        v-if="allerrors.address"
                        v-for="error_name in allerrors.address"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div :class="['form-group',(allerrors.title) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input
                          type="text"
                          class="form-control"
                          v-model="myForm.title"
                          placeholder="Enter Notification Title"
                        >
                        <label for="material-text2">Title</label>
                      </div>
                      <div
                        v-if="allerrors.title"
                        v-for="error_name in allerrors.title"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div :class="['form-group',(allerrors.description) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <textarea
                          v-model="myForm.description"
                          placeholder="Enter Description"
                          class="form-control"
                          rows="4"
                        ></textarea>
                        <label for="material-text2">Discription</label>
                      </div>
                      <div
                        v-if="allerrors.description"
                        v-for="error_name in allerrors.description"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-12" align="right">
                    <button class="btn btn-primary process_button">Submit</button>
                  </div>
                </div>
              </form>
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
      myForm: {
        user_id: document.getElementById("userId").value,
        title: "",
        description: "",
        address: "",
        location_id: "",
        category_id: ""
      },

      locations: [],
      allerrors: {},
      baseurl: document.getElementById("baseUrl").value,
      role_id: document.getElementById("roleId").value,
      user_id: document.getElementById("userId").value,
      rptErr: 1
    };
  },
  created() {
    var _this = this;
    _this.fetchData();
  },
  mounted() {
    var _this = this;
    $(document).ready(function() {
      $(".js-select2").select2();

      $(".location-selector").on("change", function() {
        _this.myForm.location_id = $(this).val();
      });
    });
  },
  methods: {
    fetchData() {
      var _this = this;

      axios
        .get(_this.baseurl + "/api/notification/create")
        .then(response => {
          _this.locations = response.data.location;
        })
        .catch(error => {
          if (_this.rptErr < 8) {
            _this.fetchData();

            _this.rptErr++;
          }
        });
    },
    submitForm(e) {
      e.preventDefault();

      var _this = this;

      $(".process_button").prop("disabled", true);

      axios
        .post(_this.baseurl + "/api/notification", _this.myForm)
        .then(response => {
          console.log(response);
          if (response.data * 1 === 1) {
            $.notify(
              {
                title: "<strong>Success!</strong>",
                message: "Successfully Added."
              },
              {
                type: "success",
                placement: {
                  from: "top",
                  align: "right"
                }
              }
            );
            _this.$router.push({ name: "manageNotification" });
            $(".process_button").prop("disabled", false);
          }
        })
        .catch(error => {
          _this.allerrors = error.response.data.errors;
          $(".process_button").prop("disabled", false);
        });
    }
  }
};
</script>