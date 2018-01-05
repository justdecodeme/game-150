let userName = document.querySelector('#userName');
let userProfile = document.querySelector('#userProfile');

function toggleUserProfile() {
	if(!userProfile.classList.contains('open')) {
		userProfile.classList.add('open');
		userName.querySelector('svg').classList.remove('fa-caret-down');
		userName.querySelector('svg').classList.add('fa-caret-up');
	} else {
		userProfile.classList.remove('open');
		userName.querySelector('svg').classList.remove('fa-caret-up');
		userName.querySelector('svg').classList.add('fa-caret-down');
	}
}

userName.addEventListener('click', toggleUserProfile, false);