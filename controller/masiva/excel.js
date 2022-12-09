
function sleep(milliseconds) 
{
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
        break;
        }
    }
}

// console.log("primero");
// sleep(2000);
// console.log("segundo"); 

// function exporExcel(tableID, filename = ''){
function exporExcelMasi(){
    var downloadLink;
    var tableSelect = 'hola';
    var dataType = 'application/vnd.ms-excel';
    var busqueda = document.getElementById('busquedaM').value

    // le damos el origen de los datos
    let url='controller/masiva/excel.php';
    let formaData = new FormData()
    formaData.append('busqueda', busqueda)

    fetch(url,{
        method: "POST",
        body: formaData
    }).then(response=>response.json())
    .then(data=>{
        tableSelect = data.tabla
        console.log(tableSelect);
    }).catch(err=>console.log(err))

    // console.log(tableSelect);
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > 6000) {
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
        console.log(tableHTML);
        break;
        }
    }
    
    // Specify file name
    // // filename = filename?filename+'.xls':'excel_data.xls';
    // filename = 'excel_data.xls';
    
    // // Create download link element
    // downloadLink = document.createElement("a");
    
    // document.body.appendChild(downloadLink);
    
    // if(navigator.msSaveOrOpenBlob){
    //     var blob = new Blob(['ufeff', tableHTML], {
    //         type: dataType
    //     });
    //     navigator.msSaveOrOpenBlob( blob, filename);
    // }else{
    //     // Create a link to the file
    //     downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
    //     // Setting the file name
    //     downloadLink.download = filename;
        
    //     //triggering the function
    //     downloadLink.click();
    // }
}