<template>
  <div>
    <input type="text" v-model="search" @input="searchList" placeholder="Search..." />
  </div>
</template>

<script>
export default {
  data() {
    search:''
  },
  methods: {
    searchList() {
			// Get number of items in the list
			var len = document.getElementById("list").getElementsByTagName("li").length;
			
			// Loop through items in ul
			for (var i = 0; i < len; i++) {
				var n = i+1;
				var listItem = document.querySelector("#list>li:nth-child(" + n + ") > a");
				var searchItem = document.querySelector("#list>li:nth-child(" + n + ") > a");

				// If search field is blank
				if (this.search == '') {
					listItem.style.display = 'block';
				}
				// If list items are not equal to search field
				else if ( !listItem.innerHTML.toLowerCase().includes(this.search.toLowerCase()) ) {
					listItem.parent.style.display = 'none';
				}
				// Display if equal to search terms
				else {
					listItem.style.display = 'block';
				}
			}	
		}
  }
}
</script>