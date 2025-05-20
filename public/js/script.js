function gallery(pic){
    // alert(pic.src);
    document.getElementById('product-img').src = pic.src;
}

function Selector(){
    a = document.querySelectorAll(".a");
    for(i=0;i<a.length;i++){
        if(a[i].href == window.location.href){
            a[i].classList.add("bg-primary");
            a[i].classList.add("text-white");
            break;
        }
    }

}

function Edit(a){
    input = document.querySelectorAll("input");
    input.forEach(element => {
        element.removeAttribute("readonly");
    });
    a.remove();
    button = document.createElement("button");
    button.classList.add("mt-3");
    button.classList.add("form-control");
    button.classList.add("text-white");
    button.classList.add("btn");
    button.classList.add("btn-info");
    button.innerHTML = "آپدیت";
    document.getElementById("form").appendChild(button);
}

function result(){
    totalPrice = 0;
    inputs = document.getElementsByTagName("input");
    Array.from(inputs).forEach(element => {
        if(!isNaN(element.value)){
        var price = Number(element.getAttribute("price"));
        var count = Number(element.value);
        totalPrice += count*price;
        }
    }); 
    
    document.getElementById("result").innerHTML = "قیمت نهایی : " +totalPrice +" تومان ";
    
}


function price(item,num) {
    var price = item.getAttribute('price');
    count = item.value;
    document.getElementById("price"+num).innerHTML = (count * price) + " تومان ";
    result();
}