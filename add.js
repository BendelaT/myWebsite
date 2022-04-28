let sizeCont = document.getElementById("size_container")
let weightCont = document.getElementById("weight_container")
let heightCont = document.getElementById("height_container")
let widthCont = document.getElementById("width_container")
let lengthCont = document.getElementById("length_container")
let selectedOpt = document.getElementById("selectedOpt")
let text = document.getElementById("text")
let switched = document.getElementById("switched")



function myFunc() {
    var optionValue = document.getElementById("productType").value;
    if(optionValue == "dvd"){
    sizeCont.style.display = "flex";
    weightCont.style.display = "none";
    heightCont.style.display = "none";
    widthCont.style.display = "none";
    lengthCont.style.display = "none";
    text.style.display = "block"
    text.innerHTML = "Please, provide disc space in MB"


}
    else if(optionValue == "book"){
        weightCont.style.display = "flex";
        sizeCont.style.display = "none";
        heightCont.style.display = "none";
        widthCont.style.display = "none";
        lengthCont.style.display = "none";
        text.style.display = "block"
        text.innerHTML = "Please, provide weight in KG"


    }
    else if (optionValue == "furniture"){
        heightCont.style.display = "flex";
        widthCont.style.display = "flex";
        lengthCont.style.display = "flex";
        sizeCont.style.display = "none";
        weightCont.style.display = "none";
        text.style.display = "block"
        text.innerHTML = "Please, provide dimension in H x W x L"


    }
    else if(selectedOpt.value = "selected"){
        text.style.display = "flex"
        sizeCont.style.display = "none";
        weightCont.style.display = "none";
        heightCont.style.display = "none";
        widthCont.style.display = "none";
        lengthCont.style.display = "none";
        text.style.display = "none"

    }
   }
