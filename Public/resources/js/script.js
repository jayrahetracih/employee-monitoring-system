var dropdown = document.getElementsByClassName("emp-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
     this.classList.toggle("active");
  
     var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
  });
}

// department.php ====================================

$(document).ready(function(){
    let params = {status : 'Active'};
    getData(params);
});

$('#add_department').on('submit', function(event)
{
    event.preventDefault();
    const form_values = new FormData(this);
    fetch('../../../Controller/Handler/Department/create.php', {
        method  : 'POST',
        body    : form_values
        })
        .then((res) => res.json())
        .then((data) => {

            console.log(data.alert_message);
            if(data.alert_message != null)
            {
                let params = {status : 'Active'};
                getData(params);
                $('#message').text(data.alert_message);
                $('#alertModal').modal('show');
                $('#modalClose').focus();
            }
            else
            {
                $('#dept_name').text(data.dept_name);
                console.log('type in the error');
            }

        }).catch((e) => console.log(e));
});

function getData(params)
{
    fetch('../../../Controller/Handler/Department/read.php', {
        method : 'POST',
        headers: {
                    'Content-Type': 'application/json'
                },
        body : JSON.stringify(params)
        })
        .then((res) => res.json())
        .then((data) => {

        alterTable(data);

        }).catch((e) => console.log(e));
}

function updateData(params)
{
    fetch('../../../Controller/Handler/Department/update.php', {
        method : 'POST',
        headers: {
                    'Content-Type': 'application/json'
                },
        body : JSON.stringify(params)
        })
        .then((res) => res.json())
        .then((data) => {

            console.log(data);
            let params = {status : 'Active'};
            getData(params);
            $('#message').text(data.alert_message);
            $('#alertModal').modal('show');
            $('#modalClose').focus();

        }).catch((e) => console.log(e));
}

function alterTable(data)
{
    let output = '';
    data.forEach(function(result)
    {
            output += `
                <tr class="d-flex" >
                    <td class="col-10 fields" id="${result.department_id}">${result.department}</td>
                    
                    <td class="col-2 btn btn-primary btn-sm dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" onClick="$('#${result.department_id}').attr('contenteditable', 'true');$('#${result.department_id}').focus();">Rename</a>
                            <a class="dropdown-item archive" href="#" onclick="updateData({id : '${result.department_id}', field : 'status', value : 'Inactive'});">Archive
                            </a>
                        </div>
                    
                    </td>
                </tr>
            `;
    });
    document.getElementById('output').innerHTML = output;
    let el = document.getElementsByClassName('fields');
    Array.from(el).forEach(function(el) 
    {
            el.addEventListener('keydown', function(event)
            {
                    switch(event.keyCode)
                    {
                        case 13:
                        event.preventDefault();
                        let data = {
                            field   :   'department',
                            value   :   $.trim(this.innerHTML),
                            id      :   this.id
                        };
                        updateData(data);
                        break;
                    }
            });

            el.addEventListener('focusout', function(event)
            {
                event.preventDefault();
                let data = {
                    field   :   'department',
                    value   :   $.trim(this.innerHTML),
                    id      :   this.id
                };
                updateData(data);
            });
    });
}


