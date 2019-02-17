window.addEventListener('load', () => {
	
	let adminMenuItem = document.querySelectorAll('.admin_panel_menu > ul > li');
	let subAdminMenu = document.querySelectorAll('.admin_panel_menu ul ul');
	subAdminMenu.forEach( (item) => {
		item.style.maxHeight = '0px';
		item.style.overflow = 'hidden';
		//item.style.transition = 'max-height 1s';
	});
	adminMenuItem.forEach( (item, i) => {
		item.addEventListener('click', () => {
			let sub = item.nextElementSibling;
			if(sub.nodeName === 'UL'){
				if(sub.style.maxHeight === '0px'){
					sub.style.overflow = 'visible';
					sub.style.maxHeight='1000px';
				} else {
					sub.style.overflow = 'hidden';
					sub.style.maxHeight = 0;
				}
			}
		});
	});

});