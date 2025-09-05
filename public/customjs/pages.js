async function addpages(id = null) {
  let url = "/api/addPage";
  if (id != null) {
    url += `/${id}`;
  }
  let res = await fetch(url);
  let html = await res.text();
  openMe(html);
}


async function savePage(ele, id = null) {
  let form = ele.parentElement.parentElement;
  // console.log(form)
  let data = {
    page: form.querySelector(".page").value,
    page_name: form.querySelector(".page_name").value,
    module: form.querySelector(".module").value,
  };

  let url = "/api/addPage";
  if (id != null) {
    url += `/${id}`;
  }
  // console.log(data)
  let res = await fetch(url, {
    method: "POST", // Specify the method
    headers: {
      "Content-Type": "application/json", // Set the content type to JSON
    },
    body: JSON.stringify(data), // Convert the data object to a JSON string
  });

  let html = await res.json();
//   console.log(html)
  if (html.success) {
    toastr.success(html.message);
    // getAllAgents();
    closeMe();
    setTable();
  } else {
    toastr.error(html.message);
  }
}

async function getAllPages() {
    let res = await fetch("/api/getPages");
    let html = await res.json();
    return  html
}

async function setTable(){
    let pages = await getAllPages();
    if(pages.success){
        let body = document.getElementById("pagesTable").querySelector("tbody");
        console.log(pages)
        // console.log(agents)
        let html = ''
        pages.data.forEach((page,i) => {
            html+=`
                <tr>
                    <td>${i+1}</td>
                    <td>${page.page}</td>
                    <td>${page.page_name}</td>
                    <td>${page.module_name}</td>
                    <td>
                        <span onclick="addpages(${page.id})" class="cursor-pointer text-primary" title="edit"><i
                                                        class="fa fa-edit fa-lg"></i></span>&nbsp;
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
