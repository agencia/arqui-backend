$(function() {

    // Initialize the jQuery File Upload plugin
    $('#upload-video').fileupload({
        // This element will accept file drag/drop uploading
        dropZone: $('#panel_list_files'),
        dataType: 'json',
        global: false,
        maxChunkSize: 10000000, // 10 MB
        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        done : function (e,data){
            console.log(data);
            var parametros={"file":data.result.files[0].name,"url":data.result.files[0].url,"id":submenuid};
            var enlace = $("<a />").attr({
               "href": data.result.files[0].url,
               "target": "_blank"
            }).html(data.result.files[0].name);
            $("#url_video").empty().append(enlace);
            if (data.result.files[0].url.match(/zip$/)) {
                $.post(global_baseurl + "index.php/videos/unzip/" + submenuid, $.param(parametros), function(success){
                    console.log(success);
                },"json");
            }
                $.post(global_baseurl + "index.php/videos/insert/" + submenuid, $.param(parametros), function(success){
                    console.log(success);
                },"json");
        },
        add: function(e, data) {
            console.log("entra");
            var progressBar = $("<div />").addClass("progress progress-striped active").attr("style", "width:328px")
                    .append('<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span>0%</span></div>');

            
            data.context = progressBar.appendTo($("#status"));
            
            var jqXHR = data.submit().success(function(result, textStatus, jqXHR) {
                            console.log(result);
                            if (result.hasOwnProperty("error")) {
                                $("#status").empty();
                                $("#error-message").clone().attr("id", "").appendTo($("#status")).find("i").html(result.error);
                            } else {
                                $("#status").empty();
                                $("#success-message").clone().attr("id", "").appendTo($("#status")).find("i").html("<p>La imagen se ha subido con éxito</p>");
                            }

                        });


            progressBar.find('span').click(function() {

                if (tpl.hasClass('working')) {
                    jqXHR.abort();
                }

                tpl.fadeOut(function() {
                    tpl.remove();
                });

            });

            // Automatically upload the file once it is added to the queue

        },
        progress: function(e, data) {

            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);

            // Update the hidden input field and trigger a change
            // so that the jQuery knob plugin knows to update the dial
//            console.log(data.context);
            data.context.find('span').html(progress + "%");
            data.context.find('div').attr("aria-valuenow", progress);
            data.context.find('div').attr("style", "width:" + progress + "%");

            if (progress == 100) {
                data.context.removeClass('working');
            }
        },
        fail: function(e, data) {
            // Something has gone wrong!
            data.context.addClass('error');
//                        $("#status").empty();
        }

    });


    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function(e) {
        e.preventDefault();
    });

});

//{"files":[{"name":"1398735264-41","size":0,"type":"multipart\/form-data; boundary=----WebKitFormBoundarysLRM18xrOFo8ehvJ","error":"File upload aborted","deleteUrl":"http:\/\/cognosvideoapp.com.mx\/?file=1398735264-41","deleteType":"DELETE"}]}<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">
