<?php
include "../header.php";
session_start();
if($_SESSION['user']){

?>

<!DOCTYPE html>
<html lang="en">

<?php
include('../header.php');
?>

  <body>

    <div class="page-wrapper">
    <div class="app-header d-flex align-items-center">

    <?php
include('../topbar.php');
?>

      <div class="main-container">

<?php
include('../navbar.php')
?>




          <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>UI Designer with Bootstrap</title>
  <style>
    .element {
      margin-bottom: 15px;
      padding: 10px;
      border: 1px dashed #ced4da;
      border-radius: 0.5rem;
      background-color: #f8f9fa;
    }
    table, th, td {
      border: 1px solid #dee2e6;
      border-collapse: collapse;
      padding: 8px;
      text-align: center;
    }
    table {
      width: 100%;
    }
    textarea {
      width: 100%;
      min-height: 80px;
    }
  </style>
</head>
<body >

  <div class="container mt-2">
    <h2 class="mb-4">Test Template Designer</h2>

    <div class="mb-3">
      <button class="btn btn-primary me-2 mb-2" onclick="addParagraph()">Add Paragraph</button>
      <button class="btn btn-secondary me-2 mb-2" onclick="addTextArea()">Add Text Area</button>
      <button class="btn btn-info me-2 mb-2 text-white" onclick="addHeader('h3')">Add H3</button>
      <button class="btn btn-info me-2 mb-2 text-white" onclick="addHeader('h4')">Add H4</button>
      <button class="btn btn-info me-2 mb-2 text-white" onclick="addHeader('h5')">Add H5</button>
      <button class="btn btn-success me-2 mb-2" onclick="addTable()">Add Table</button>
    </div>

    <div id="canvas" class="bg-white p-4 rounded shadow-sm"></div>

    <button class="btn btn-success mt-3" onclick="openMetaModal()">Save Report</button>
    <pre class="mt-3 p-3 bg-light" id="exportedCode" style="white-space: pre-wrap;"></pre>
  </div>


  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="metaModal" tabindex="-1" aria-labelledby="metaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="metaModalLabel">Enter Table Metadata</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" id="metaName" class="form-control mb-2" placeholder="Name">
        <input type="text" id="metaShortName" class="form-control mb-2" placeholder="Short Name">
        <input type="number" id="metaPrice" class="form-control mb-2" placeholder="Price">
        <input type="text" id="metaGroup" class="form-control mb-2" placeholder="Group">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="submitTables()">Submit</button>
      </div>
    </div>
  </div>
</div>

<script>
 const canvas = document.getElementById('canvas');

function makeEditable(el) {
  el.setAttribute('contenteditable', 'true');
  el.classList.add('element');
}

function addParagraph() {
  const p = document.createElement('p');
  p.textContent = 'Editable paragraph...';
  makeEditable(p);
  canvas.appendChild(p);
}

function addTextArea() {
  const wrapper = document.createElement('div');
  wrapper.classList.add('element');
  const textarea = document.createElement('textarea');
  textarea.classList.add('form-control');
  wrapper.appendChild(textarea);
  canvas.appendChild(wrapper);
}

function addHeader(level) {
  const header = document.createElement(level);
  header.textContent = `Editable ${level.toUpperCase()}...`;
  makeEditable(header);
  canvas.appendChild(header);
}

function addTable() {
  const rows = parseInt(prompt('Number of rows:'), 10);
  const cols = parseInt(prompt('Number of columns:'), 10);

  if (isNaN(rows) || isNaN(cols) || rows <= 0 || cols <= 0) {
    alert('Please enter valid positive integers.');
    return;
  }

  const table = document.createElement('table');
  table.classList.add('table', 'table-bordered', 'mt-2');

  for (let i = 0; i < rows; i++) {
    const tr = document.createElement('tr');
    for (let j = 0; j < cols; j++) {
      const td = document.createElement('td');
      td.textContent = `R${i+1}C${j+1}`;
      td.setAttribute('contenteditable', 'true');
      tr.appendChild(td);
    }
    table.appendChild(tr);
  }

  const wrapper = document.createElement('div');
  wrapper.classList.add('element');
  wrapper.appendChild(table);
  canvas.appendChild(wrapper);
}


  function openMetaModal() {
    const modal = new bootstrap.Modal(document.getElementById('metaModal'));
    modal.show();
  }

  function submitTables() {
    const name = $('#metaName').val(),
      shortName = $('#metaShortName').val(),
      price = $('#metaPrice').val(),
      group = $('#metaGroup').val();
      alert(group);

    if (!name || !shortName || !price || !group) {
      alert('Please fill all metadata fields.');
      return;
    }

   
    const htmlTables = document.querySelector("#canvas").innerHTML;

    $.ajax({
      url: 'save.php',
      type: 'POST',
      data: { name: name, shortName: shortName, price: price, group: group, tables: htmlTables },
      success: function (response) {
        console.log(response);
        try {
          const res = JSON.parse(response);
          if (res.status === 'success') {
            alert('Report saved successfully!');
          } else {
            alert('Error saving tables.');
          }
        } catch (e) {
          console.error('Parsing error:', e);
          alert('Unexpected server response.');
        }
      },
      error: function (xhr, status, error) {
        console.error('AJAX Error:', error);
        alert('Submission failed.');
      }
    });

    bootstrap.Modal.getInstance(document.getElementById('metaModal')).hide();
  }
</script>
</body>
</html>



          </div>




        </div>


      </div>


    </div>



		<?php
include('../footer.php');
		?>
  </body>

</html>




<?php
 }else{
  header("Location: http://localhost/labreport/login.php");
}
?>


<script>


 
 function addtest(){
  total = 0;
    output = `<div  class='bordered ' style="border:1px doted black">
            <table class="table text-center">
                <thead>
                    <th>Sub Name</th>
                    <th>Min</th>
                    <th>Max</th>
                    <th>Refrange</th>
                    <th>Action</th>

                </thead>
                <tbody>`;
    for(record of records){
        output += `<tr>
        
                        <td>${record.sub_name}</td>
                        <td>${record.min}</td>
                        <td>${record.max}</td>
                        <td>${record.unit}</td>
                        <td>${record.refrange}</td>
                        <td>
                        <button class='bi bi-trash btn btn-danger  btn-sm' onClick="delrep(${records.indexOf(record)} )" id = '${records.indexOf(record)}'></button>
                        </td>
                    </tr>`; }
    output +=`</tbody></table></div>`;

    $('#alltest').html(output);
    document.querySelector('#sub_name').value = "";
    document.querySelector('#min').value = "";
    document.querySelector('#max').value = "";
    document.querySelector('#unit').value = "";
    document.querySelector('#refrange').value = "";
}

    $(document).ready(function(){
        $('#insert').on('click',e=>{
                e.preventDefault();
                t_name = $('#t_name').val();
                t_category = $('#t_category').val();
                t_group = $('#t_group').val();
                t_short = $('#t_short').val();
                t_charges = $('#t_charges').val();
                reports = records;
                console.log('ok');
                
                if(t_name == "" ||t_category == "" ||t_group == "" ||t_short == ""||t_charges == ""|| reports ==""){
                    $('#error').html('All Fields and Test Detail Must be Required ');
                }
                
                $.ajax({
                    url : "inserttest.php",
                    type : "POST",
                    data : {t_name: t_name,t_category: t_category,t_group: t_group,t_short: t_short,t_charges: t_charges,reports:reports},
                    success : function(data){
                        location.reload();
                        console.log(data);
//                       if(data > 0 ){
// console.log(data);
//                       }else{
//                         alert('Error Found to Add the Patient')
//                       }

                    }
                });
            }); 

    records = [];
$('#save').on('click',function(e){
    e.preventDefault()
    sub_name = $('#sub_name').val();
    min = $('#min').val();
    max = $('#max').val();
    unit = $('#unit').val();
    refrange = $('#refrange').val();
    data = {sub_name:sub_name,min:min,max:max,unit:unit,refrange:refrange};

    records.push(data);
    console.log(data);
    addtest();


});





            //  show Category
            function showcategory(){
              $.ajax({
                url:'showcategory.php',
                type:'POST',
                success:function(data){
                  $('#t_category').html(data);
                }
              })
            }
            showcategory()
    
            //  show Test Names
            // function showtest(){
            //   $.ajax({
            //     // url:'showtest.php',
            //     type:'POST',
            //     success:function(data){
            //       $('#test').html(data);
            //     }
            //   })
            // }
            // showtest()

            // insert patient 


        })

        function delrep(e){
  records.splice( records.e , 1)
  showreport();
}

</script>