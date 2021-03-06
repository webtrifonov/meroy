window.addEventListener('load', () => {
	//menu
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
	//add fields on '+' button
	function createAdditionalField(nameAttr) {
		let newField = document.createElement('input');
		newField.setAttribute('type', 'text');
		newField.setAttribute('name', nameAttr);
		newField.classList.add('form-control');
		newField.classList.add('mb15');
		return newField;
    }
	function listeners(e) {
		if (e.target.hasAttribute('data-add_images_field')) {
			let newImageField = createAdditionalField('images[]');
			e.target.closest('*[data-additional]').querySelector('.form-group').appendChild(newImageField);
		}
        if (e.target.hasAttribute('data-add_properties_fields')) {
            let currentFormGroup = e.target.closest('*[data-additional]').querySelectorAll('.form-group');
            currentFormGroup[0].appendChild(createAdditionalField('property_set[]'));
            currentFormGroup[1].appendChild(createAdditionalField('value_set[]'));
        }
    }
	document.addEventListener('click', listeners);
	
});