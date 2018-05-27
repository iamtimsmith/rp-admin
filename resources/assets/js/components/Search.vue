<template>
  <div>
    <input type="text" v-model="search" @input="searchList" placeholder="Search..." />
  </div>
</template>

<script>
export default {
  data: {
    search:''
  },
  methods: {
    searchList() {
			// Get number of items in the list
			var len = document.getElementById("sortable").getElementsByTagName("tr").length;
			
			// Loop through items in ul
			for (var i = 0; i < len; i++) {
				var n = i+2;

				var searchItem = document.querySelector("#sortable>tr:nth-child(" + n + ")");
				console.log(searchItem);

				// If search field is blank
				if (this.search == '') {
					searchItem.style.display = 'table-row';
				}
				// If list items are not equal to search field
				else if ( !searchItem.innerHTML.toLowerCase().includes(this.search.toLowerCase()) ) {
					searchItem.style.display = 'none';
				}
				// Display if equal to search terms
				else {
					searchItem.style.display = 'table-row';
				}
			}	
		}
  }
}
</script>