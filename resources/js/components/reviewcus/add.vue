<template>
  <div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label>Số điện thoại khách hàng</label>
              <vs-input
                type="text"
                size="default"
                placeholder="Số điện thoại"
                class="w-100"
                v-model="objData.phone"
              />
            </div>
            <div class="form-group">
              <label>Biển số xe khách hàng</label>
              <vs-input
                type="text"
                size="default"
                placeholder="Biển số"
                class="w-100"
                v-model="objData.license_plate"
              />
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label>Thông tin khách hàng</label>
                <div v-for="(item, index) in objData.name" :key="index">
                  <div class="row">
                    <div class="col-11">
                      <vs-input
                        type="text"
                        size="default"
                        :placeholder="'Tiêu đề ' + index"
                        class="w-100"
                        v-model="objData.name[index].title"
                      />
                      <vs-input
                        type="text"
                        size="default"
                        :placeholder="'Chi tiết ' + index"
                        class="w-100"
                        v-model="objData.name[index].detail"
                      />
                      <br />
                    </div>
                    <div class="col-1">
                      <a
                        href="javascript:;"
                        v-if="index != 0"
                        @click="remoteAr(index,'name')"
                      >
                        <img v-bind:src="'/media/' + joke.avatar" width="25" />
                      </a>
                    </div>
                  </div>
                </div>

                <el-button size="small" @click="addInput('name')"
                  >Thêm thông tin</el-button
                >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label>Thông số kĩ thuật</label>
                <div v-for="(item, index) in objData.content" :key="index">
                  <div class="row">
                    <div class="col-11">
                      <vs-input
                        type="text"
                        size="default"
                        :placeholder="'Tiêu đề ' + index"
                        class="w-100"
                        v-model="objData.content[index].title"
                      />
                      <vs-input
                        type="text"
                        size="default"
                        :placeholder="'Chi tiết ' + index"
                        class="w-100"
                        v-model="objData.content[index].detail"
                      />
                      <br />
                    </div>
                    <div class="col-1">
                      <a
                        href="javascript:;"
                        v-if="index != 0"
                        @click="remoteAr(index,'content')"
                      >
                        <img v-bind:src="'/media/' + joke.avatar" width="25" />
                      </a>
                    </div>
                  </div>
                </div>

                <el-button size="small" @click="addInput('content')"
                  >Thêm thông số</el-button
                >
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Album Ảnh</label>
              <ImageMulti v-model="objData.avatar" :title="'customer-service'"/> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row fixxed">
      <div class="col-12">
        <div class="saveButton">
          <vs-button color="primary" @click="addReviewCuss">Thêm mới</vs-button>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
</template>


<script>
import { mapActions } from "vuex";
import TinyMce from "../_common/tinymce";
import ImageMulti from "../_common/upload_image_multi";
export default {
  name: "product",
  data() {
    return {
      joke: {
        avatar: 'delete-sign--v2.png'
      },
      errors: [],
      cate: [],
      type_cate: [],
      lang: [],
      showLang: {
        title: false,
        content: false,
        description: false,
      },
      objData: {
        name: [
          {
            title: "",
            detail: ""
          },
        ],
        content: [
          {
            title: "",
            detail: ""
          },
        ],
        position: [
          {
            lang_code: "vi",
            content: "",
          },
        ],
        status: 1,
        avatar: [],
        phone: '',
        license_plate: '',
      },
    };
  },
  components: {
    TinyMce,
    ImageMulti,
  },
  computed: {},
  watch: {},
  methods: {
    ...mapActions([
      "addReviewCus",
      "loadings",
      "listLanguage"
    ]),
    listLang() {
      this.listLanguage()
        .then((response) => {
          this.loadings(false);
          this.lang = response.data;
        })
        .catch((error) => {});
    },
    showSettingLangExist(value, name = "content") {
      if (value == "name") {
        this.showLang.title = !this.showLang.title;
        this.lang.forEach((value, index) => {
          if (
            !this.objData.name[index] &&
            value.code != this.objData.name[0].lang_code
          ) {
            var oj = {};
            oj.lang_code = value.code;
            oj.content = "";
            this.objData.name.push(oj);
          }
        });
      }
      if (value == "content") {
        this.showLang.content = !this.showLang.content;
        this.lang.forEach((value, index) => {
          if (
            !this.objData.content[index] &&
            value.code != this.objData.content[0].lang_code
          ) {
            var oj = {};
            oj.lang_code = value.code;
            oj.content = "";
            this.objData.content.push(oj);
          }
        });
      }
      if (value == "position") {
        this.showLang.description = !this.showLang.description;
        this.lang.forEach((value, index) => {
          if (
            !this.objData.description[index] &&
            value.code != this.objData.description[0].lang_code
          ) {
            var oj = {};
            oj.lang_code = value.code;
            oj.content = "";
            this.objData.description.push(oj);
          }
        });
      }
    },
    remoteAr(index,key) {
      if(key == 'name'){
        this.objData.name.splice(index, 1);
      }
      if(key == 'content'){
        this.objData.content.splice(index, 1);
      }
        
    },
    addInput(key) {
        var oj = {};
        if(key =='name'){
          oj.title = "";
          oj.detail = "";
          this.objData.name.push(oj);
        }
        if(key =='content'){
          oj.title = "";
          oj.detail = "";
          this.objData.content.push(oj);
        }
        
    },
    addReviewCuss() {
      this.errors = [];
      if (this.objData.phone == "")
        this.errors.push("Số điện thoại không được để trống");
      if (this.objData.license_plate == "")
        this.errors.push("Biển số xe không được để trống");
      if (this.objData.name.length == 0)
        this.errors.push("Điền thông tin khách hàng");
      if (this.objData.content.length == 0)
        this.errors.push("Điền thông số kĩ thuật");
      if (this.objData.avatar.length == 0) this.errors.push("Vui lòng chọn ảnh");
      if (this.errors.length > 0) {
        this.errors.forEach((value, key) => {
          this.$error(value);
        });
        return;
      } else {
        this.loadings(true);
        this.addReviewCus(this.objData)
          .then((response) => {
            this.loadings(false);
            this.$router.push({ name: "listReviewCus" });
            this.$success("Thêm thông tin thành công");
          })
          .catch((error) => {
            this.loadings(false);
            this.$error("Thêm thông tin thất bại");
          });
      }
    }
  },
  mounted() {
    this.listLang();
  },
};
</script>