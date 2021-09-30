window.addEventListener('load', function () {
    "use strict";
    const navmenu = document.getElementById('main-nav');
    const menuL = document.getElementById('ham_menu');
    let menu_clicked = false;
	
    function toggle() {	
        menu_clicked = !menu_clicked;
        if (menu_clicked) {
            navmenu.className = '';
		}
		else {
			navmenu.className = 'show';
		}
	} 
	menuL.addEventListener("click", toggle);
});
