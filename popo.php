<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <table>
        <thead>
            <tr>
                <th>Id</th><th>Name</th><th>Mark</th>
            </tr>
        </thead>
    </table>
</div>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>
<script>

 axios({
  method: 'post',
  url: 'test.php',
  data:"action=read"
  })
  .then(response => {
    let test = response.data
     for (const min of test) {
         console.log(min.age)
    }
   
  })
  .catch(error => {
    console.log(error)
  })

/* const students = {
    "24": {id: 24, name: "Zuali", mark: 30},
    "25": {id: 25, name: "Famkima", mark: 52},
    "27": {id: 27, name: "Duha", mark: 77},
    "28": {id: 28, name: "Rema", mark: 81},
    "29": {id: 29, name: "Sanga", mark: 47},
    "30": {id: 30, name: "Dari", mark: 23},
}; */

// const PASS_MARK = 20;
// const FIELDS = ["id", "name", "mark"];
// //updateStudentsTable(students);
 
// function addPassed(table, students, pass = PASS_MARK) {
//     for (const student of students) {
//         if (student.mark >= pass) {
//             const row = table.insertRow();
//             for (const field of FIELDS) {
//                 row.insertCell().textContent = student[field];
//             }
//         }
//     }
// }
// function updateStudentsTable(students) {
//     const table = document.querySelector("table");
//     const par = table.parentElement;
//     par.removeChild(table);
//     addPassed(table, Object.values(students));
//     par.appendChild(table);
// }
</script>