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
            >Profile</h1>
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
              <h3 class="block-title">Edit Profile</h3>
            </div>
            <div class="block-content block-content-full clearfix">
              <form @submit="submitForm($event)">
                <div class="row">
                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.name) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input
                          type="text"
                          class="form-control"
                          v-model="myForm.name"
                          placeholder="Enter Name"
                        >
                        <label for="material-text2">Name</label>
                      </div>
                      <div
                        v-if="allerrors.name"
                        v-for="error_name in allerrors.name"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.email) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input
                          type="email"
                          name="fake-email"
                          style="position:absolute;left:-9999px"
                        >
                        <input
                          type="password"
                          name="fake-password"
                          style="position:absolute;left:-9999px"
                        >
                        <input
                          type="email"
                          class="form-control"
                          v-model="myForm.email"
                          placeholder="Enter Email Address"
                          readonly
                        >
                        <label for="material-text2">Email Address</label>
                      </div>
                      <div
                        v-if="allerrors.email"
                        v-for="error_name in allerrors.email"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.password) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input
                          type="password"
                          class="form-control"
                          v-model="myForm.password"
                          placeholder="Enter Password If You Want to Change"
                        >
                        <label for="material-text2">Password</label>
                      </div>
                      <div
                        v-if="allerrors.password"
                        v-for="error_name in allerrors.password"
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
        name: "",

        email: "",
        password: "",

        status: 1,
        is_verified: 1
      },

      allerrors: {},
      baseurl: document.getElementById("baseUrl").value,
      role_id: document.getElementById("roleId").value,
      user_id: document.getElementById("userId2").value,
      rptErr: 1
    };
  },
  created() {
    this.fetchData();
  },
  mounted() {
    var _this = this;
  },
  methods: {
    onImageChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      var _this = this;
      reader.onload = e => {
        _this.myForm.id_prove = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    fetchData() {
      var _this = this;
      var id = this.user_id;

      axios
        .get(_this.baseurl + "/api/admin/" + id + "/edit")
        .then(response => {
          _this.myForm.name = response.data.admin.name;

          _this.myForm.email = response.data.admin.email;
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
      var id = this.user_id;
      $(".process_button").prop("disabled", true);
      axios
        .patch(_this.baseurl + "/api/admin/" + id, _this.myForm)
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
            //_this.$router.push({path : '/admin'});
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