   
function test() {
    
    // GET Request.
    fetch('../../../Controller/Handler/read_employee.php')
    // Handle success
    .then(result => result.json())  // convert to json
    .then((data) => {
    console.log(data);
    let output = '';
    data.forEach(function(result){
        output +=`<tr>
                    <td>${result.first_name}</td>
                    <td>${result.emp_id_number}</td>
                    <td>${result.department}</td>
                    <td>${result.age}</td>
                    <td>${result.gender}</td>
                    <td>${result.address}</td>
                    <td>${result.mobile_number}</td>
                    <td>${result.email}</td>
                    <td>${result.employee_status}</td>
                    <td>${result.date_hire}</td>
                    <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">view</a>
                        <a class="dropdown-item" href="#">delete</a>
                        <a class="dropdown-item" href="#">update</a>
                        </div>
                    </div>

                    </td>
                </tr>`
        });
    
    document.getElementById('output').innerHTML = output;
    
    })
    .catch(err => console.log('Request Failed', err)); // Catch errors


}

function read(){

    fetch("test.php",{
        method: "POST",
        body: "action=read",
        headers: 
        {
            "Content-Type": "application/x-www-form-urlencoded"
        }
    })
    .then((response) => response.json())
    .then((data) => {
    
            let output = '';
            data.forEach(function(result){
        output +=`<tr>
                    <td>${result.first_name}</td>
                    <td>${result.emp_id_number}</td>
                    <td>${result.department}</td>
                    <td>${result.age}</td>
                    <td>${result.gender}</td>
                    <td>${result.address}</td>
                    <td>${result.mobile_number}</td>
                    <td>${result.email}</td>
                    <td>${result.status}</td>
                    <td>${result.date_hire}</td>
                    <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">view</a>
                        <a class="dropdown-item" href="#">delete</a>
                        <a class="dropdown-item" href="#">update</a>
                        </div>
                    </div>

                    </td>
                </tr>`
    });
    document.getElementById('output').innerHTML = output;
    })
    .catch(err => console.log('Request Failed', err)); // Catch errors
  
}

