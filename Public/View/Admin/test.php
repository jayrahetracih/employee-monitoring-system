<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>



<table class="table table-bordered table-dark">
<thead>
    <th>Department Id</th>
    <th>Department Name</th>
</thead>
<tbody id="output">
</tbody>
</table>

<button onClick="getData({status :   'Active'});">Show Active Departments</button>
<button onClick="getData({status :   'Inactive'});">Show Inactive Departments</button>

<script>

$('.fields').on('keydown', function(event)
{
    
});


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
            alert(data.alert_message);

        }).catch((e) => console.log(e));
}

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

function alterTable(data)
{
    let output = '';
       data.forEach(function(result)
       {
            output += `
                <tr>
                    <td>
                        ${result.department_id}
                    </td>
                    <td contenteditable="true" class="fields" id="${result.department_id}">
                        ${result.department}
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
                            value   :   this.innerHTML,
                            id      :   this.id
                        };
                        updateData(data);
                        break;
                    }
            });
       });
}

</script>

<script src="../../../Public/resources/js/script.js"></script>