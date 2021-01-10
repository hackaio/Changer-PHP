function showDisability(value){

    if (value=="Yes"){
        document.getElementById("disability").style.display="block";

    }

    else{
        document.getElementById("disability").style.display="none";

    }
}
function showAllargies(value){

    if (value=="Yes"){
        document.getElementById("allagies").style.display="block";

    }

    else{
        document.getElementById("allagies").style.display="none";

    }
}
function showTransport(value){

    if (value=="Yes"){
        document.getElementById("transport").style.display="block";

    }

    else{
        document.getElementById("transport").style.display="none";

    }
}
function printDiv(divName){
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
$(document).ready(function () {

    function exportTableToCSV($table, filename) {

        var $rows = $table.find('tr:has(td)'),

            // Temporary delimiter characters unlikely to be typed by keyboard
            // This is to avoid accidentally splitting the actual contents
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character

            // actual delimiter characters for CSV format
            colDelim = '","',
            rowDelim = '"\r\n"',

            // Grab text from table into CSV formatted string
            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row),
                    $cols = $row.find('td');

                return $cols.map(function (j, col) {
                    var $col = $(col),
                        text = $col.text();

                    return text.replace('"', '""'); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '"',

            // Data URI
            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

        $(this)
            .attr({
                'download': filename,
                'href': csvData,
                'target': '_blank'
            });
    }

    // This must be a hyperlink
    $(".export").on('click', function (event) {
        // CSV
        exportTableToCSV.apply(this, [$('#dvData>table'), 'export.csv']);

        // IF CSV, don't do event.preventDefault() or return false
        // We actually need this to be a typical hyperlink
    });
});
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
// live Search
$(document).ready(function(){    
    //class acconding to level
    $(document).on('change', '#level', function(){
      var level = $(this).val();
      $.ajax({
        url:"studyLevel/level",
        method:'GET',
        data:{id:level},
        dataType:'json',
        success:function(data)
        {
            $('#class').html(data.class);
            $('#studentclass').html(data.tbl_data);
        }
      })
    });

    //stream acconding to class
    $(document).on('change', '#class', function(){
        var id = $(this).val();
        $.ajax({
          url:"level/class",
          method:'GET',
          data:{id:id},
          dataType:'json',
          success:function(data)
          {
            $('#stream').html(data.stream);
            $('#studentclass').html(data.tbl_data);
          }
        })
      });

      //student acconding to stream
    $(document).on('change', '#stream', function(){
        var id = $(this).val();
        $.ajax({
          url:"class/stream",
          method:'GET',
          data:{id:id},
          dataType:'json',
          success:function(data)
          {
            $('#studentclass').html(data.tbl_data);
          }
        })
      });

      //drop down
      //class acconding to level
    $(document).on('change', '#studylevel', function(){
        var level = $(this).val();
        $.ajax({
          url:"drop/level",
          method:'GET',
          data:{id:level},
          dataType:'json',
          success:function(data)
          {
              $('#studentclass').html(data.class);
              $('#sms-input').css("display", "block");
          }
        })
      });

      /**
       * get list of student per specific stream
       *   
       */
      $(document).on('change', '#stream', function(){
        var id = $(this).val();
        $.ajax({
          url:"class/stream",
          method:'GET',
          data:{id:id},
          dataType:'json',
          success:function(data)
          {
            $('#studentclass').html(data.tbl_data);
          }
        })
      });

      $(document).on('change', '#studylevelShift', function(){
        var level = $(this).val();
        $.ajax({
          url:"drop/level",
          method:'GET',
          data:{id:level},
          dataType:'json',
          success:function(data)
          {
              $('#goClass').html(data.class)
          }
        })
      });
  
      //stream acconding to class
      $(document).on('change', '#studentclass', function(){
          var id = $(this).val();
          $.ajax({
            url:"drop/class",
            method:'GET',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
              $('#studentstream').html(data.stream);
              $('#streamsubject').html(data.stream);
              $('#uploadsubject').html(data.stream);
              $('#subject').html(data.subject);
            }
          })
        });

        $(document).on('change', '#goClass', function(){
            var id = $(this).val();
            $.ajax({
              url:"drop/class",
              method:'GET',
              data:{id:id},
              dataType:'json',
              success:function(data)
              {
                $('#gostream').html(data.stream);
              }
            })
          });
  
        //student acconding to stream
      $(document).on('change', '#studentstream', function(){
          var id = $(this).val();
          $.ajax({
            url:"get/subjects",
            method:'GET',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
              $('#subject').html(data.subject);
              $('#sub_stream').html(data.stream);
              $('#list-student').css('display','block');
              $('#show-student').prop('checked', false);
              $('#listStudent').css('display','none');
              $('.newstudentClass').css('display', 'block');
            }
          })
        });
        //list student by click show student
        $(document).on('change', '#show-student', function() {
          var check = $('#show-student').is(':checked');
          if(check == true){
            var $streamID = $('#studentstream').val();
            $.ajax({
                url:"student/stream/" + $streamID,
                method:'GET',
                dataType:'json',
                success:function(data)
                {
                  $('#studentdata').html(data.tbl_data);
                  $('#listStudent').css('display','block');
                }
              })
          }else{
            $('#studentdata').html();
            $('#listStudent').css('display','none');
          }
            
        });
        //List Subject for specific stream
        $(document).on('change', '#streamsubject', function(){
            var id = $(this).val();
            $.ajax({
              url:"list/subject",
              method:'GET',
              data:{id:id},
              dataType:'json',
              success:function(data)
              {
                $('#subject').html(data.subject);
                $('#sub').html(data.subject);
              }
            })
          });

           
        //drop Subject and file upload field for specific stream
        $(document).on('change', '#uploadsubject', function(){
            var id = $(this).val();
            $.ajax({
              url:"subjects/term",
              method:'GET',
              data:{id:id},
              dataType:'json',
              success:function(data)
              {
                $('#subjectTerm').html(data.term);
                $('#term').html(data.term);//TODO temprary
              }
            })
          });
          //drop Subject and file upload field for specific stream
        $(document).on('change', '#subjectTerm', function(){
            var id = $(this).val();
            var stream = $('#uploadsubject').val();
            var index = $('#index').val();
            $.ajax({
              url:"uploadsubject",
              method:'GET',
              data:{id:id,stream:stream,index:index},
              dataType:'json',
              success:function(data)
              {
                $('#upload').css("display", "block");
                $('#stream').val(data.straem);
                $('#subject').html(data.subject);
                $('#subjects').html(data.subjects);
                $('#term').val(data.term);
              }
            })
          });

        $(".change").click(function(){ // Click to only happen on announce links
            $("#userID").val($(this).data('id'));
        });

        $(".assign").click(function(){ // Click to only happen on announce links
            $("#parrent").val($(this).data('id'));
        });

        //specify if other select studebt transport
        $("#mode").change(function() {
            var val = $(this).children("option:selected").text();
            if(val == 'Other') {
                $('#other').css("display", "block");
                $("#amount").prop('required',true);
            }else{
                $('#other').css("display", "none");
                $("#amount").val(null);
                $("#amount").prop('required',false);
            }
          });

          //specify if other select studebt transport
        $("#modefee").change(function() {
            var val = $(this).children("option:selected").text();
            if(val == 'Other') {
                $('#otherfee').css("display", "block");
                $(".other").prop('required',true);
            }else{
                $('#otherfee').css("display", "none");
                $(".other").val(null);
                $(".other").prop('required',false);
            }
          });


        $('#balance').click(function () {
            $.ajax({
                url:"balance",
                method:'GET',
                dataType:'json',
                success:function(data)
                {
                  $('#balanceModal').modal('show')
                  $('.balance').html(data);
                }
            })
        })
   });

   window.setInterval(function(){
    var status = [], sms_id=[];
    $('#sms-table tbody tr td:nth-child(4)').each( function(){
        status.push( $(this).text() );
        //alert( $(this).text() );       
     });
     $('#sms-table tbody tr td:nth-child(7)').each( function(){
        sms_id.push( $(this).text() );
        //alert( $(this).text() );       
     });

     $.each( status, function(i, st){
        if(st == 'QUEUED') {
            $.ajax({
                url:"delivery/report/"+sms_id[i],
                method:'GET',
                dataType:'json',
                success:function(data)
                {

                }
            })
        }
    })
    //window.location.reload(true); 
     
  }, 30000);


function exportTableToExcel(tableID, filename){
    
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
   
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}

function exportF(elem, filename) {
  var table = document.getElementById("table");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", filename+".xls"); // Choose the file name
  return false;
}

function countChar(val) {
    var len = val.value.length;
    if (len >= 500) {
      val.value = val.value.substring(0, 160);
    } else {
      $('#charNum').text(160 - len);
    }
  };
