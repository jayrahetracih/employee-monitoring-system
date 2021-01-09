// department.php ====================================

$(document).ready(function(){
    getData();
});

$('#add_department').on('submit', function(event)
{
    event.preventDefault();
    const form_values = new FormData(this);
    var json_form_data = {type: 'department', action : 'create'};
    form_values.forEach((value, key) => json_form_data[key] = value);
    
    fetch('../../../Controller/Handler/Department/router.php', {
        method  : 'POST',
        headers: {
                    'Content-Type': 'application/json'
                },
        body    : JSON.stringify(json_form_data)
        })
        .then((res) => res.json())
        .then((data) => {

            console.log(data);
            if(data.result == 'success')
            {
                let params = {status : 'Active'};
                getData(params);
                $('#message').text(data.message);
                $('#department_form').modal('hide');
                $("input:text"). val("") 
                $('#alertModal').modal('show');
                $('#modalClose').focus();

            }else
            {
                data.messages.forEach(function(err)
                {
                    console.log(err.field, err.message);
                    $('#' + err.field).find('span').text(err.message);
                    $('#' + err.field).find('input').addClass('is-invalid');   
                }); 
                                
            }
 
        }).catch((e) => console.log(e));
});

$('#search').on('change',function(event)
{
    let params = {search : this.value};
    getData(params);
});

function getData(params = null)
{
    let controller = {type : 'department', action : 'read', order_field : 'status', order_mod : 'ASC'}
    params = $.extend(controller, params);
    fetch('../../../Controller/Handler/Department/router.php', {
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
    let controller = {type : 'department', action : 'update'}
    params = $.extend(controller, params);
    fetch('../../../Controller/Handler/Department/router.php', {
        method : 'POST',
        headers: {
                    'Content-Type': 'application/json'
                },
        body : JSON.stringify(params)
        })
        .then((res) => res.json())
        .then((data) => {

            getData();
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
        let status_value = result.status === 'Active' ? 'Inactive' : 'Active';
        output +=
        result.department != 'Unassigned' ?
        
            `<tr class="d-flex" >
                <td class="col-7 fields" id="${result.department_id}">${result.department}</td>
                <td class="col-3">${result.status}</td>
                <td class="col-2 btn btn-primary btn-sm dropdown-toggle actions" style="cursor:pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" onClick="$('#${result.department_id}').attr('contenteditable', 'true');$('#${result.department_id}').focus();">Rename</a>
                        <a class="dropdown-item archive" href="#" onclick="updateData({id : '${result.department_id}', field : 'status', value : '${status_value}'});">Change Status
                        </a>
                    </div>
                
                </td>
            </tr>
        ` : ``;
    });
    document.getElementById('output').innerHTML = output;
    let el = document.getElementsByClassName('fields');
    setEventListeners(el);
}

function setEventListeners(el)
{
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