import { createApp } from 'vue';
import axios from 'axios';
import menu_admin from './components/menu_admin.vue';
import menu_btn from './components/menu.vue';
import banners_web from './components/banners.vue';
import breadcrumb from './components/breadcrumb.vue';
import new_right from './components/new_right.vue';
import new_left from './components/new_left.vue';
import footer_main from './components/footer.vue';

const app = createApp({
  mounted() {
    CKEDITOR.replace('editor');
  },
  data() {
    return {
      formData: {},
      inputIds: [],
      isChecked: false
    }
  },
  methods: {
    showAlert() {
      alert('Xin chào!'); // Hiển thị thông báo
    },
    checkAll() {
      const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
      for(let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = this.isChecked;
      }
    },
    deleteSelected: async function(event) {
      event.preventDefault();

      const url = this.$refs.deleteButton.id;

      const selectedIds = [];
      const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');

      for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
          selectedIds.push(checkboxes[i].id);
        }
      }

      if (selectedIds.length === 0) {
        alert("Please select at least one item to delete.");
        return;
      }
      const data_id = selectedIds.join('/').replace(/[^\d]/g , '/');
      console.log('Selected IDs:', selectedIds);

      try {
        const response = await axios.delete(`/${url}/${selectedIds}`);
        console.log(response.data);
      } catch (error) {
        console.log(error);
      }
    },
    apply: async function(event)  {
      event.preventDefault();
      const inputs = this.$refs.btn_form_submit.querySelectorAll('input, textarea, select');
      const ids = [];
      const value_pr = [];

      inputs.forEach(input => {
        ids.push(input.id);
      });

      inputs.forEach(input => {
        value_pr.push(input.value);
      });

      const id_name = ids;
      id_name.shift();
      const value_s = value_pr;
      value_s.shift();
      
      const data = {};
      for (let i = 0; i < id_name.length; i++) {
        data[id_name[i]] = value_s[i];
      }
      console.log(data);
      const url_apply = this.$refs.applyButton.id;
      axios.post(`${url_apply}`, data)
      .then(response => {
       const latest_record = response.data.latest_record;
       // console.log(latest_record);
       for (let i = 0; i < id_name.length; i++) {
        // id_name[i] = latest_record[id_name[i]];
          document.getElementById(id_name[i]).value = latest_record[id_name[i]];
        // document.getElementById('id').id = latest_record[id_name[0]];
      }
      console.log(id_name);
    })
      .catch(error => {
        console.log(error);
      });
    },
  }
});

app.component('menu_admin', menu_admin)
.component('menu_btn', menu_btn)
.component('banners_web', banners_web)
.component('breadcrumb', breadcrumb)
.component('new_right', new_right)
.component('new_left', new_left)
.component('footer_main', footer_main)
.mount('#app');