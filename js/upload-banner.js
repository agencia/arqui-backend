$(function(){

    // Initialize the jQuery File Upload plugin
    $('#upload').fileupload({

        // This element will accept file drag/drop uploading
        dropZone: $('#img_banner'),
        dataType: 'json',
        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {

            var oFReader = new FileReader();
            oFReader.readAsDataURL(data.files[0]);
            oFReader.onload = function (oFREvent) {
                var img = new Image();
                img.src = oFREvent.target.result;
                img.onload = function () {
                    if ((this.width != 1024) && (this.height != 227)) {
                        //that.value="";
                        $("#status").empty();
                        $("#error-message").clone().attr("id","").html("<p>Solo se permiten archivos de 1024 x 227</p>").appendTo($("#status"));
                        jqXHR.abort();
                    }
                }
            }

//            var tpl = $('<div class="working"><input type="text" value="0" data-width="48" data-height="48"'+
//                ' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></div>');
            var progressBar = $("<div />").addClass("progress progress-striped active").attr("style","width:880px")
                    .append('<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span>0%</span></div>');
            // Append the file name and file size
//            tpl.find('p').text(data.files[0].name)
//                         .append('<i>' + formatFileSize(data.files[0].size) + '</i>');

            // Add the HTML to the UL element
//            data.context = tpl.appendTo($("#status"));
            data.context = progressBar.appendTo($("#status"));

            // Initialize the knob plugin
//            tpl.find('input').knob();

            // Listen for clicks on the cancel icon
//            tpl.find('span').click(function(){
            progressBar.find('span').click(function(){

                if(tpl.hasClass('working')){
                    jqXHR.abort();
                }

                tpl.fadeOut(function(){
                    tpl.remove();
                });

            });

            // Automatically upload the file once it is added to the queue
            var jqXHR = data.submit().success(function (result, textStatus, jqXHR) {
                console.log(result); 
                if(result.hasOwnProperty("error")){
                    $("#status").empty();
                        $("#error-message").clone().attr("id","").appendTo($("#status")).find("i").html(result.error);
                    }
                    
                if(result.hasOwnProperty("upload_data")){
                    $("#status").empty();
                        $("#success-message").clone().attr("id","").appendTo($("#status")).find("i").html("<p>La imagen se ha subido con éxito</p>");
                        var d = new Date();
                    $("#img_banner").attr("src", result.upload_data.src_uri + "?" +d.getTime());
                }
                    
//                        $("#status").empty();
            });
        },

        progress: function(e, data){

            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);

            // Update the hidden input field and trigger a change
            // so that the jQuery knob plugin knows to update the dial
            data.context.find('span').html(progress+"%");
            data.context.find('div').attr("aria-valuenow",progress);
            data.context.find('div').attr("style","width:" + progress+"%");

            if(progress == 100){
                data.context.removeClass('working');
            }
        },

        fail:function(e, data){
            // Something has gone wrong!
            data.context.addClass('error');
//                        $("#status").empty();
        }

    });


    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

    // Helper function that formats the file sizes
//    function formatFileSize(bytes) {
//        if (typeof bytes !== 'number') {
//            return '';
//        }
//
//        if (bytes >= 1000000000) {
//            return (bytes / 1000000000).toFixed(2) + ' GB';
//        }
//
//        if (bytes >= 1000000) {
//            return (bytes / 1000000).toFixed(2) + ' MB';
//        }
//
//        return (bytes / 1000).toFixed(2) + ' KB';
//    }

});