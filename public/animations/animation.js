// splite text h1 header
const texts = document.querySelectorAll('.h1_to_splite ')

function fct1(param){
const strText = param.textContent;
const splitText = strText.split("");
param.textContent = "";


for(let i = 0; i <splitText.length; i++){
    param.innerHTML += "<span>" + splitText[i] + "</span>";
}

let char = 0;
let timer = setInterval(onTick,50);

function onTick() {
    const span = param.querySelectorAll('span')[char];
    span.classList.add('fade');
    char++;
    if(char === splitText.length){
        complete();
        return;
    }
}


function complete(){
    clearInterval(timer);
    timer = null;
}
}
texts.forEach(text=>{
  fct1(text)
})
// fct1();




// PARALLAX X //

const offSetTop = (element, acc = 0)=>{
    if(element.offsetParent){
        return offSetTop(element.offsetParent, acc + element.offsetTop)
    }

    return acc + element.offsetTop;
}

class Parallax{

    constructor(element){
       this.element = element
       this.ratio = parseFloat(element.dataset.parallax);
       this.onscroll = this.onscroll.bind(this);
       this.onIntersection = this.onIntersection.bind(this);
       const observer = new IntersectionObserver(this.onIntersection)
       observer.observe(element)    
       this.onscroll();
    }

    onIntersection(entries){
      for(const entry of entries){
        if(entry.isIntersecting){
           document.addEventListener('scroll',this.onscroll);
        }else{
            document.removeEventListener('scroll',this.onscroll);
        }
      }
    }

    onscroll=()=>{
       
      window.requestAnimationFrame(()=>{
        const screenY = window.scrollY + window.innerHeight / 2;
       const elementY = offSetTop(this.element) + this.element.offsetHeight / 2;
       const diffY = elementY - screenY

       this.element.style.setProperty('transform', `translateY(${diffY * -1 *this.ratio}px)`)
      })
       
       
    }

    static Bind(){
    return Array.from(document.querySelectorAll('[data-parallax]')).map((element)=>{
        return new Parallax(element)
       })
    }
}

Parallax.Bind();


// MENU //

const menu = document.querySelector('.menu_container')
const openBtn = document.querySelector('.menu .open')
const closeBtn = document.querySelector('.menu .close')
const humbergur = document.querySelector('.humburger')




const clickEvent = ()=>{
  openBtn.classList.toggle('active')
  if(!openBtn.classList.contains('active')){
    humbergur.classList.add('entering')
    setTimeout(()=>{
    humbergur.classList.remove('entering')
    humbergur.classList.add('active')
  },300)
  }else{
    humbergur.classList.remove('active')
    humbergur.classList.add('leaving')
    setTimeout(()=>{
    humbergur.classList.remove('leaving')
  },300)
  }
  
  closeBtn.classList.toggle('active')
  

  
  menu.removeEventListener('click',clickEvent)
  
  setTimeout(()=>{
   menu.addEventListener('click',clickEvent) 
  },1000)
  
}


menu.addEventListener('click',clickEvent)


// :::: SLIDE :::: //

const logoSlide = document.querySelector('.cards_slide');
        const images = document.querySelectorAll('.cards_slide .card');

        // Fonction pour cloner et ajouter des images
        function cloneImages() {
            images.forEach((image) => {
                const clone = image.cloneNode(true);
                logoSlide.appendChild(clone);
            });
        }

        // Cloner les images initialement
        cloneImages();

        // Déterminer la largeur totale des images clonées
        const imageWidth = images[0].offsetWidth;
        const numImages = images.length;

        // Définir la largeur du conteneur en fonction du nombre d'images
        logoSlide.style.width = `${imageWidth * numImages}px`;

        // Utilisation d'une animation CSS pour le défilement
        logoSlide.style.animationDuration = `${10 * numImages}s`;


        
// :::: SLIDE TWO :::: //

const logoSlideTwo = document.querySelector('.cards_slideTwo');
        const imagesTwo = document.querySelectorAll('.cards_slideTwo .cardTwo');

        // Fonction pour cloner et ajouter des images
        function cloneImagesTwo() {
            imagesTwo.forEach((image) => {
                const clone = image.cloneNode(true);
                logoSlideTwo.appendChild(clone);
            });
        }

        // Cloner les images initialement
        cloneImagesTwo();

        // Déterminer la largeur totale des images clonées
        const imageWidthTwo = imagesTwo[0].offsetWidth;
        const numImagesTwo = imagesTwo.length;

        // Définir la largeur du conteneur en fonction du nombre d'images
        logoSlideTwo.style.width = `${imageWidth * numImagesTwo}px`;

        // Utilisation d'une animation CSS pour le défilement
        logoSlideTwo.style.animationDuration = `${10 * numImagesTwo}s`;










// PARALLAX Y //


const offSetLeft = (element, acc = 0)=>{
    if(element.offsetParent){
        return offSetLeft(element.offsetParent, acc + element.offsetTop)
    }

    return acc + element.offsetTop;
}


class Parallaxy{

    constructor(element){
       this.element = element
       this.ratio = parseFloat(element.dataset.parallaxy);
       this.onscroll = this.onscroll.bind(this);
       this.onIntersection = this.onIntersection.bind(this);
       const observer = new IntersectionObserver(this.onIntersection)
       observer.observe(element)    
       this.onscroll();
    }

    onIntersection(entries){
      for(const entry of entries){
        if(entry.isIntersecting){
           document.addEventListener('scroll',this.onscroll);
        }else{
            document.removeEventListener('scroll',this.onscroll);
        }
      }
    }

    onscroll=()=>{
       
      window.requestAnimationFrame(()=>{
        const screenX = window.scrollY + window.innerWidth / 2;
       const elementX = offSetLeft(this.element) + this.element.offsetWidth / 2;
       const diffX = elementX - screenX

       this.element.style.setProperty('transform', `translateX(${diffX * -1 *this.ratio}px)`)
      })
       
       
    }

    static Bind(){
    return Array.from(document.querySelectorAll('[data-parallaxy]')).map((element)=>{
        return new Parallaxy(element)
       })
    }
}

Parallaxy.Bind();



// ACTIVE SECTION ON SCROLL //

let section = [...document.querySelectorAll('.section')]
let links = [...document.querySelectorAll('.nav a')]

window.onscroll=()=>{
  section.forEach(sec=>{
    let top = window.scrollY + (window.innerHeight/3);
    let offset = sec.offsetTop;
    let height = sec.offsetHeight;
    let id = sec.getAttribute('id');


    if(top>=offset && top<offset+height){
      links.forEach(link=>{
        link.classList.remove('active');
        
        document.querySelector(`.nav a[href*=${id}]`).classList.add('active')
      })
    }
  })
}





/*********** APPARITION AU DEFILEMENt ***********/
/*********** INTERSECTION OBSERVER ***********/

const ratio = .1

const options = {
    root: null,
    rootMargin: '0px',
    threshold: ratio
}
const visible = function (entries){
    entries.forEach(function (entry) {
         if (entry.intersectionRatio > ratio){
            if(entry.target.classList.contains('topDef')){
              entry.target.classList.add('show-from-top')  
            }else if(entry.target.classList.contains('leftDef')){
              entry.target.classList.add('show-from-left')  
            }else if(entry.target.classList.contains('rightDef')){
              entry.target.classList.add('show-from-right')   
            }else if(entry.target.classList.contains('bottomDef')){
              entry.target.classList.add('show-from-bottom')  
            }else if(entry.target.classList.contains('scaleDef')){
              entry.target.classList.add('scale')
            }else if(entry.target.classList.contains('rotateLeftDef')){
              entry.target.classList.add('rotateLeft')
            }else if(entry.target.classList.contains('rotateRightDef')){
              entry.target.classList.add('rotateRight')
            }else if(entry.target.classList.contains('spanFlexDef')){
              entry.target.classList.add('showSpan')
            }
         }else{
            if(entry.target.classList.contains('topDef')){
              entry.target.classList.remove('show-from-top')  
            }else if(entry.target.classList.contains('leftDef')){
              entry.target.classList.remove('show-from-left')  
            }else if(entry.target.classList.contains('rightDef')){
              entry.target.classList.remove('show-from-right')  
            
            }else if(entry.target.classList.contains('bottomDef')){
              entry.target.classList.remove('show-from-bottom')  
            }else if(entry.target.classList.contains('scaleDef')){
              entry.target.classList.remove('scale')
            }else if(entry.target.classList.contains('rotateLeftDef')){
              entry.target.classList.remove('rotateLeft')
            }else if(entry.target.classList.contains('rotateRightDef')){
              entry.target.classList.remove('rotateRight')
            }else if(entry.target.classList.contains('spanFlexDef')){
              entry.target.classList.remove('showSpan')
            }
         }
        
    });
}














/*****          Loader SCRIPT         ****/

let debut = 0

let svgCircle = document.querySelector('.filled')
const LoaderContainaire = document.querySelector('.loader')
setTimeout(()=>{
    LoaderContainaire.classList.add('fermer')


  const observer = new IntersectionObserver(visible, options)
document.querySelectorAll('[class*="observe-"], .observeScale, .observeRotate, .spanFlexObserve').forEach(function (cach) {
    observer.observe(cach)
})
},5700)

for(let i=0;i<=100;i++){
setTimeout(()=>{
svgCircle.style.strokeDashoffset = 1-(i/100)
    
// const l_top = document.querySelector('.pourcentage > .left .top')
// const l_back = document.querySelector('.pourcentage > .left .back')
const l_bottom = document.querySelector('.pourcentage > .left .bottom')
const l_middle = document.querySelector('.pourcentage > .left .middle')


const m_top = document.querySelector('.pourcentage > .middle .top')
const m_back = document.querySelector('.pourcentage > .middle .back')
const m_bottom = document.querySelector('.pourcentage > .middle .bottom')
const m_middle = document.querySelector('.pourcentage > .middle .middle')


const r_top = document.querySelector('.pourcentage > .right .top')
const r_back = document.querySelector('.pourcentage > .right .back')
const r_bottom = document.querySelector('.pourcentage > .right .bottom')
const r_middle = document.querySelector('.pourcentage > .right .middle')


    if(`${i}`.length<2){
        r_bottom.querySelector('span').textContent = `${i}`
        r_bottom.classList.remove('bottom')
        r_bottom.classList.add('middle')
        r_middle.classList.remove('middle')
        r_middle.classList.add('top')
        r_top.classList.remove('top')
        r_top.classList.add('back')
        r_back.classList.remove('back')
        r_back.classList.add('bottom')
    }else if(`${i}`.length===2){
        // console.log(`${i}`[0])
        const m_bottom_span_text = m_bottom.querySelector('span').textContent
        if(debut<parseInt(`${i}`[0])){
 
            debut = parseInt(`${i}`[0])
            
            m_bottom.querySelector('span').textContent = `${i}`[0]


            m_bottom.classList.remove('bottom')
            m_bottom.classList.add('middle')
            m_middle.classList.remove('middle')
            m_middle.classList.add('top')
            m_top.classList.remove('top')
            m_top.classList.add('back')
            m_back.classList.remove('back')
            m_back.classList.add('bottom')
            
            
            // console.log(m_bottom.querySelector('span').textContent,parseInt(`${i}`[0]),parseInt(m_bottom_span_text)<parseInt(`${i}`[0]),i)
            
        }
         r_bottom.querySelector('span').textContent = `${i}`[1]


        r_bottom.classList.remove('bottom')
        r_bottom.classList.add('middle')
        r_middle.classList.remove('middle')
        r_middle.classList.add('top')
        r_top.classList.remove('top')
        r_top.classList.add('back')
        r_back.classList.remove('back')
        r_back.classList.add('bottom')

        
    }else{
        r_bottom.querySelector('span').textContent = `${i}`[2]
        m_bottom.querySelector('span').textContent = `${i}`[1]
        l_bottom.querySelector('span').textContent = `${i}`[0]
        
        r_bottom.classList.remove('bottom')
        r_bottom.classList.add('middle')
        r_middle.classList.remove('middle')
        r_middle.classList.add('top')
        r_top.classList.remove('top')
        r_top.classList.add('back')
        r_back.classList.remove('back')
        r_back.classList.add('bottom')

        m_bottom.classList.remove('bottom')
        m_bottom.classList.add('middle')
        m_middle.classList.remove('middle')
        m_middle.classList.add('top')
        m_top.classList.remove('top')
        m_top.classList.add('back')
        m_back.classList.remove('back')
        m_back.classList.add('bottom')

        l_bottom.classList.remove('bottom')
        l_bottom.classList.add('middle')
        l_middle.classList.remove('middle')
        l_middle.classList.add('top')
        // l_top.classList.remove('top')
        // l_top.classList.add('back')
        // l_back.classList.remove('back')
        // l_back.classList.add('bottom')
    }

},i*50)
}