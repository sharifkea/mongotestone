"use strict";


/*const isExist=true;
const inCartId=[];
var count=0;
*/
$(document).ready(function() {
   
    $(document).on("click", "img.see", function() {
     //   alert('in');
        const $url = $('#murl').html();
        const $coll = $('#coll').html();
        const $doc = $('#doc').html();
        const $tbNo = $('#tbNo').html();
      //  console.log($url);
        //console.log($coll);
       // console.log($doc);
       // console.log($tbNo);
        //const trackCount = parseInt($('#oneCart').val());
        const id = $(this).attr("id");
        const tableName = $(this).attr("name");
        //const unitPrice = parseFloat($(this).attr("data-unitP"));
        console.log(id);
       // console.log(tableName);

        const rowCount=$('#'+tableName+'rowCount').html();
        console.log(rowCount);
        const data = [];
        for (let i = 0; i < rowCount; i++) {
            data[i]=JSON.parse(($('#'+tableName+i).html()));
        }
        for (let x in data[0]) {
            if(x!='_id'&&x!='tableName')
            console.log(data[0][x]);
          }
        
        var tableNames='';
        
       /* 
        const trackCountAdd=trackCount+1;
        $('#oneCart').val(trackCountAdd);

        if($("#tid" + id).length == 0){
            
            var output =`<label">Track-${trackIdCount+1}:${trackName}  </label>
            <label for="UnitPrice[${trackIdCount}]"> Unit Price:</label>
            <input id="up${id}" name="UnitPrice[${trackIdCount}]" type="text" value="${unitPrice}" required="required"  readonly />
            <label for="Quantity[${trackIdCount}]">Quantity:</label>
            <input id="qt${id}" name="Quantity[${trackIdCount}]" type="number" value="1" required="required" readonly />
            <input id="tid${id}" name="TrackId[${trackIdCount}]" type="hidden" value="${id}" required="required" /><br>`;
            $("#fmBuy").append(output);
            trackIdCount=trackIdCount+1;
        }
        
        else{
            let quantity=parseInt($("#qt" + id).val());
            quantity=quantity+1;
            $("#qt" + id).val(quantity);
        }
        if(trackCount==0){
            const total=unitPrice
            const addTotal =`<input id="total" name="Total" type="hidden" value="${total}" required="required" >`;
            $("#fmBuy").append(addTotal);
        }else {const total=parseFloat($("#total").val())+unitPrice;
        $("#total").val(total);
        }*/    
    });


});