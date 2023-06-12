

const navItems= document.querySelector('.nav__items');
const openNavBtn= document.querySelector('#open__nav-btn');
const closeNavBtn= document.querySelector('#close__nav-btn');

// Hamburger Nav on small devices
const openNav = () => {
    if (window.innerWidth <= 1024) {
      navItems.style.display = 'flex';
      openNavBtn.style.display = 'none';
      closeNavBtn.style.display = 'inline-block';
    }
  };
  
  const closeNav = () => {
    if (window.innerWidth <= 1024) {
      navItems.style.display = 'none';
      openNavBtn.style.display = 'inline-block';
      closeNavBtn.style.display = 'none';
    }
  };
  
  const checkWidth = () => {
    if (window.innerWidth > 1024) {
      navItems.style.display = 'flex';
      openNavBtn.style.display = 'none';
      closeNavBtn.style.display = 'none';
    } else {
      navItems.style.display = 'none';
      openNavBtn.style.display = 'inline-block';
      closeNavBtn.style.display = 'none';
    }
  };
  
  openNavBtn.addEventListener('click', openNav);
  closeNavBtn.addEventListener('click', closeNav);
  window.addEventListener('resize', checkWidth);
  checkWidth();
  
  // Active Nav if Scroll > 100
const header = document.querySelector('nav');
console.log(header);

window.addEventListener("scroll", () => {
if (window.scrollY > 100) {
header.classList.add("active");
header.style.boxShadow="0 1rem 1rem rgba(0,0,0,0.2)";
header.style.background="#101a30";

} else {
header.classList.remove("active");
header.style.boxShadow="none";
header.style.background="#00000000";

}
});

// Dashboard Button > on the small devices

const sidebar = document.querySelector('aside'); 
const showSibarBtn = document.querySelector('#show__sidebar-btn'); 
const hideSidebarBtn = document.querySelector('#hide__sidebar-btn'); 

//show sidebar on small devices
const showSidebar =() =>{
    sidebar.style.left = '0';
    showSibarBtn.style.display = 'none';
    hideSidebarBtn.style.display='inline-block';
}

//hide sidebar on small devices
const hideSidebar =() =>{
    sidebar.style.left = '-100%';
    showSibarBtn.style.display = 'inline-block';
    hideSidebarBtn.style.display='none';
}


showSibarBtn.addEventListener('click',showSidebar);
hideSidebarBtn.addEventListener('click',hideSidebar);

window.addEventListener('resize',function(){
  if (window.innerWidth > 600) {
    showSibarBtn.style.display = 'none';
  } 
  else {
    showSibarBtn.style.display = 'inline-block';
  }
} );

//Scrolling to the contact 

const contactLink = document.querySelector("[data-nav-link='contact']");
const footer = document.getElementById("footer");
const scrollToFooter = (event) => {
  event.preventDefault(); 

  footer.scrollIntoView({
    behavior: "smooth" 
  });
};

contactLink.addEventListener("click", scrollToFooter);