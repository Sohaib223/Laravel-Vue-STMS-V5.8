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
            >Emergency Help</h1>
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
              <h3 class="block-title">Edit Emergency Help</h3>
              <div class="block-options">
                <router-link to="/emergencyHelp" class="btn btn-info">Manage Helps</router-link>
                <router-link to="/emergencyHelp/create" class="btn btn-info">Add Helps</router-link>
              </div>
            </div>
            <div class="block-content block-content-full clearfix">
              <form @submit="submitForm($event)">
                <div class="row">
                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.location_id) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <select class="form-control js-select2 location-selector">
                          <option value selected>Select Emergency Location</option>
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
        location_id: ""
      },
      categories: [],
      locations: [],
      allerrors: {},
      baseurl: document.getElementById("baseUrl").value,
      role_id: document.getElementById("roleId").value,
      user_id: document.getElementById("userId").value,
      rptErr: 1
    };
  },
  created() {
    this.fetchData();
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
      var id = this.$route.params.id;

      axios
        .get(_this.baseurl + "/api/emergencyHelp/" + id + "/edit")
        .then(response => {
          $(document).ready(function() {
            $(".location-selector").select2("destroy");
            $(".location-selector").val(response.data.help.location_id);
          });

          _this.myForm.title = response.data.help.title;
          _this.myForm.description = response.data.help.description;
          _this.myForm.address = response.data.help.address;

          _this.myForm.location_id = response.data.help.location_id;

          _this.locations = response.data.location;
          setTimeout(() => {
            $(document).ready(function() {
              $(".location-selector").select2();
            });
          }, 500);
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
      var id = this.$route.params.id;
      $(".process_button").prop("disabled", true);
      axios
        .patch(_this.baseurl + "/api/emergencyHelp/" + id, _this.myForm)
        .then(response => {
          if (response.data * 1 === 1) {
            $.notify(
              {
                title: "<strong>Success!</strong>",
                message: "Successfully Updated."
              },
              {
                type: "success",
                placement: {
                  from: "top",
                  align: "right"
                }
              }
            );
            //_this.$router.push({path : '/emergencyHelp'});
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