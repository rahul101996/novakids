async function addModule(id = null) {
    let url = "/api/addModule";
    if(id!=null){
        url +=`/${id}` 
    }
  let res = await fetch(url);
  let html = await res.text();
  openMe(html);
}


async function saveModule(ele,id = null){
    let form = ele.parentElement.parentElement;
    // console.log(form)
    let data = {
        module:form.querySelector(".module").value,
        module_name:form.querySelector(".module_name").value,
    }

    let url = "/api/addModule";
    if(id!=null){
        url +=`/${id}` 
    }
    console.log(data)
    let res = await fetch(url, {
        method: "POST", // Specify the method
        headers: {
            "Content-Type": "application/json", // Set the content type to JSON
        },
        body: JSON.stringify(data), // Convert the data object to a JSON string
    });
    let html = await res.json();
    // console.log(html)
    if(html.success){
        toastr.success(html.message);
        // getAllAgents();
        closeMe();
        setTable();
    }else{
        toastr.error(html.message);
    }
}

async function getAllModules() {
    let res = await fetch("/api/getModules");
    let html = await res.json();
    return  html
}

async function setTable(){
    let modules = await getAllModules();
    if(modules.success){
        let body = document.getElementById("moduleTable").querySelector("tbody");
        console.log(modules)
        // console.log(agents)
        let html = ''
        modules.data.forEach((mod,i) => {
            html+=`
                <tr>
                    <td>${i+1}</td>
                    <td>${mod.module}</td>
                    <td>${mod.module_name}</td>
                    <td>
                        <span onclick= "addModule(${mod.id})" class="cursor-pointer text-primary" title="edit">
                            <i class="fa fa-edit fa-lg"></i>
                        </span>&nbsp;
                    </td>
                </tr>
            `
        });

        body.innerHTML = html;
    } else {
        console.log("hello")
    }
}

setTable();
