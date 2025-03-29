const holder = document.getElementById("holder");
const defaultMethod = "GET";

const availableMethod = ["GET", "POST", "UPDATE", "DELETE", "PUT", "PATCH"];
const totalMethods = availableMethod.length;
 

function nextMethod() 
{
    let currentIndex = 0;

    setInterval(() => {
        currentIndex++;
        holder.innerText = availableMethod[currentIndex];
    }, 3000);
    
    if (currentIndex === totalMethods)
    {
        currentIndex = 0;
    }
    
}

nextMethod();