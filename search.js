document.querySelector('#place').oninput = function(){
	let val = this.value.trim();
	let searchItems = document.querySelectorAll('.place');
	if (val !='') {
		searchItems.forEach(function(elem){
			if (elem.innerText.search(val)==-1) {
				elem.classList.add('hide');
			}
			else{
				elem.classList.remove('hide');
			}
		});
	}
	else{
		searchItems.forEach(function(elem){
			elem.classList.remove('hide');
		})
	}
}