let navOpen = document.querySelector('.toggle-open');
let navClose = document.querySelector('.toggle-close');
let nav = document.querySelector('#mainNav')

let dropdowns = document.querySelectorAll('.dropdown')
let button = document.querySelector('.dropdown-menu');

navOpen.addEventListener('click', (e)=>{
  nav.classList.add('nav-expanded');
})

navClose.addEventListener('click', (e)=>{
  nav.classList.remove('nav-expanded');
})


dropdowns.forEach(function(dropdown){

 let button = dropdown.querySelector('.dropdown-button');

 button.addEventListener('click', ()=>{
  dropdowns.forEach((item)=>{

    let dropdownMenu = item.querySelector('.dropdown-menu');
    let dropdownButton = item.querySelector('.dropdown-button')

    if(item === dropdown){
      if (!dropdownMenu.classList.contains('active')){
        dropdownButton.setAttribute('aria-expanded', "true");
        dropdownMenu.classList.add('active');
        dropdownMenu.style.height = 'auto';
  
        let height = dropdownMenu.clientHeight + 'px';
        dropdownMenu.style.height = '0px';
  
        setTimeout(()=>{
  
            dropdownMenu.style.height = height
  
        },0)
  
      }else{
  
        dropdownButton.setAttribute('aria-expanded', "false");
        dropdownMenu.style.height = '0px';
      
        dropdownMenu.addEventListener('transitionend', ()=>{
            dropdownMenu.classList.remove('active');
        }, {
            once: true
        })
  
      }



    }else{
      dropdownButton.setAttribute('aria-expanded', "false");
      dropdownMenu.classList.remove('active');
      dropdownMenu.style.height = '0px';

      dropdownMenu.addEventListener('transitionend', ()=>{
      }, {
          once: true
      })
    }

  })
 })

})


ClassicEditor
.create( document.querySelector( '#editor' ) )
.catch( error => {
    console.error( error );
} );


