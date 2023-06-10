<template>
  <ul>
    <li class="nav-item" v-for="menu in menuDatas" :key="menu.id">
      <a class="nav-link" :href="menu.slug">{{ menu.name }}</a>
      <ul v-if="menu.children.length > 0">
        <li class="nav-item" v-for="childMenu in menu.children" :key="childMenu.id">
          <a class="nav-link" :href="childMenu.slug">{{ childMenu.name }}</a>
        </li>
      </ul>
    </li>
  </ul>
</template>

<script>
import axios from 'axios';

export default { 
  data() {
    return {
      menuDatas: []
    }
  },
  mounted() {
    axios.get('/api/listAdmin')
      .then(response => {
        const menuMap = {};
        response.data.forEach(menu => {
          menu.children = []; 
          menuMap[menu.id] = menu;
        });

        response.data.forEach(menu => {
          if (menu.parent_id) {
            menuMap[menu.parent_id].children.push(menu);
          } else {
            this.menuDatas.push(menu); 
          }
        });
      })
      .catch(error => {
        console.log(error);
      });
  }
}
</script>