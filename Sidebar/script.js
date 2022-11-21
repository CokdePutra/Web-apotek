const toggleAnimation = document.getElementById('toggle');
const sideBar = document.getElementById('side-nav');


toggleAnimation.addEventListener('click', () => {
  if (toggleAnimation.classList != 'on') {
    toggleAnimation.classList.add('on')
  } else {
    toggleAnimation.classList.remove('on')
  };
});

toggleAnimation.addEventListener('click', () =>{
  if(sideBar.classList != 'active') {
    sideBar.classList.add('active')
  } else {
    sideBar.classList.remove('active')
  }
});