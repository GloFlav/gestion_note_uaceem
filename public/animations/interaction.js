let button = document.querySelector("#button-inscription")
button.addEventListener("click", () => {
    location.href = "https://inscription.uaceem.mg"
})

let open = document.querySelector(".burger-icon")
let close = document.querySelector(".close-burger-option")
let option = document.querySelector(".burger-option")
// console.log(option)


open.addEventListener("click", () => {
    option.style.display = "block"
})

close.addEventListener("click", () => {
    option.style.display = "none"    
})