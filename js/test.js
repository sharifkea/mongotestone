$(document).ready(function() {

    const tbName = $('#tbName').html();
    console.log(tbName);
    const tableInfo =JSON.parse($('#tableInfo').html());
    console.log(tableInfo['columnNames'][0]);
    $("div#seeTable").empty();
                                                        
    const table = $("<table />");
    const header = $("<thead />");
    const headerRow = $("<tr />");
    for (let i = 0; i < tableInfo['columnNo']; i++) {
        headerRow.
        append($("<th />", { "text": tableInfo['columnNames'][i]}))
    }
    header.append(headerRow);
    table.append(header);
    const tableBody=$("<tbody />");

    if(tableInfo['rowNo']!=0){
        
        for (let i = 0; i < tableInfo['rowNo']; i++){
            var row = $("<tr />");
            var tableData =JSON.parse($('#'+tbName+i).html());
            for (let j = 0; j < tableInfo['columnNo']; j++) {
                row.
                append($("<td />", { "text": tableData[tableInfo['columnNames'][j]]}))
            }
            tableBody.append(row);
        }   
        //table.append(tableBody);
    }
    else var row = '';
    row+=`<tr>
                                <td><input id="alt" name="Title" type="text" value="${tableInfo['columnNames'][0]}" required="required" tabindex="1"></td>
                                <td><input id="alid" name="AlbumId" type="hidden" value="${tableInfo['columnNames'][1]}" required tabindex="3"></td>
                                
                                <td><button type="submit" id="btnUpdAlb">Update</button></td>
                                <td><form action='home.php' id="fmUpdAlb" method="POST"></form></td></tr>
                            <button type="submit" name= 'sub' id="btnExit">Exit</button>`;
    
    console.log(row);      
    tableBody.append(row);
    table.append(tableBody);
    table.appendTo($("div#seeTable"));
});