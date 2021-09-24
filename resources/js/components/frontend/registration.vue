<template>
  <form class="px-30" @submit="submitForm($event)">
    <div class="row">
      <div class="col-md-6">
        <div :class="['form-group',(allerrors.first_name) ? 'is-invalid' : '']">
          <div class="form-material">
            <input
              type="text"
              class="form-control"
              v-model="myForm.first_name"
              placeholder="Enter First Name"
            >
            <label for="material-text2">First Name</label>
          </div>
          <div
            v-if="allerrors.first_name"
            v-for="error_name in allerrors.first_name"
            class="invalid-feedback"
          >{{error_name}}</div>
        </div>
      </div>
      <div class="col-md-6">
        <div :class="['form-group',(allerrors.last_name) ? 'is-invalid' : '']">
          <div class="form-material">
            <input
              type="text"
              class="form-control"
              v-model="myForm.last_name"
              placeholder="Enter Last Name"
            >
            <label for="material-text2">Last Name</label>
          </div>
          <div
            v-if="allerrors.last_name"
            v-for="error_name in allerrors.last_name"
            class="invalid-feedback"
          >{{error_name}}</div>
        </div>
      </div>

      <div class="col-md-6">
        <div :class="['form-group',(allerrors.email) ? 'is-invalid' : '']">
          <div class="form-material">
            <input type="email" name="fake-email" style="position:absolute;left:-9999px">
            <input type="password" name="fake-password" style="position:absolute;left:-9999px">
            <input
              type="email"
              class="form-control"
              v-model="myForm.email"
              placeholder="Enter Email Address"
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
              placeholder="Enter Password"
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

      <div class="col-md-12">
        <div :class="['form-group',(allerrors.contact_no) ? 'is-invalid' : '']">
          <div class="form-material">
            <input
              type="number"
              class="form-control"
              v-model="myForm.contact_no"
              placeholder="Enter Contact No"
            >
            <label for="material-text2">Contact No</label>
          </div>
          <div
            v-if="allerrors.contact_no"
            v-for="error_name in allerrors.contact_no"
            class="invalid-feedback"
          >{{error_name}}</div>
        </div>
      </div>

      <div class="col-md-6">
        <div :class="['form-group',(allerrors.address) ? 'is-invalid' : '']">
          <div class="form-material">
            <textarea
              class="form-control"
              v-model="myForm.address"
              placeholder="Enter Personal Address"
              rows="10"
            ></textarea>
            <label for="material-text2">
              Personal Address
              <small>(optional)</small>
            </label>
          </div>
          <div
            v-if="allerrors.address"
            v-for="error_name in allerrors.address"
            class="invalid-feedback"
          >{{error_name}}</div>
        </div>
      </div>

      <div class="col-md-6">
        <div :class="['form-group',(allerrors.id_prove) ? 'is-invalid' : '']">
          <div class="form-material">
            <label for="material-text2">
              Id Proof
              <small>(eg : Scan Photo Of National Id etc )</small>
            </label>
          </div>
          <input
            type="file"
            class="dropify"
            @change="onImageChange($event)"
            data-max-file-size="5M"
            data-allowed-file-extensions="jpeg jpg png"
          >
          <div
            v-if="allerrors.id_prove"
            v-for="error_name in allerrors.id_prove"
            class="invalid-feedback"
          >{{error_name}}</div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <button type="submit" class="btn btn-sm btn-hero btn-alt-success process_button">
            <i class="fa fa-plus mr-10"></i> Create Account
          </button>
        </div>
        <div class="col-sm-6" align="right">
          <a class="link-effect text-muted mr-10 mb-5 d-inline-block" :href="baseurl+'/login'">
            <i class="fa fa-user text-muted mr-5 mt-15"></i> Sign In
          </a>
        </div>
      </div>
    </div>
  </form>
</template>
<script>
export default {
  data() {
    return {
      myForm: {
        first_name: "",
        last_name: "",
        email: "",
        password: "",

        contact_no: "",
        address: "",
        status: 0,
        id_prove: ""
      },
      rptError: 1,
      baseurl: document.getElementById("baseUrl").value,
      allerrors: {}
    };
  },
  mounted() {
    $(".dropify").dropify();
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
    submitForm(e) {
      e.preventDefault();
      //console.log(e);
      var _this = this;

      $(".process_button").prop("disabled", true);
      $(".process_button").html("<i class='fa fa-spinner fa-spin'></i>");

      axios
        .post(_this.baseurl + "/api/registerFront", _this.myForm)
        .then(response => {
          console.log(response);
          if (response.data * 1 === 1) {
            window.location.replace(_this.baseurl + "/thankyou");
            $(".process_button").prop("disabled", false);
            $(".process_button").html("Create Account");
          }
        })
        .catch(error => {
          _this.allerrors = error.response.data.errors;
          $(".process_button").prop("disabled", false);
          $(".process_button").html("Create Account");

          if (rptError < 8) {
            _this.submitForm();
            _this.rptError++;
          }
        });
    }
  }
};
</script>
