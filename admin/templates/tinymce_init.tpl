<script src="/admin/assets/js/superredactor/sredactor.min.js"></script>
<script>
    
     $(function(){
        tinyMCE.init({
            selector: "textarea.description",
            height: 400,
            plugins: [
                "advlist autolink lists link image preview anchor responsivefilemanager emoticons",
                "hr visualchars autosave noneditable searchreplace wordcount visualblocks",
                "code fullscreen save charmap nonbreaking",
                "insertdatetime media table paste imagetools",
            ],
            toolbar_items_size : 'small',
            menubar:'file edit insert view format table tools',
            toolbar1: "restoredraft save fontselect formatselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor backcolor | table | link unlink anchor media image | fullscreen code",

            table_class_list:[
                { title: 'None', value: '' },
                { title: 'table_style1', value: 'table_style1' },
                { title: 'table_style2', value: 'table_style2' },
                { title: 'table_style3', value: 'table_style3' }
            ],
           
            statusbar: true,
            font_formats: "Andale Mono=andale mono,times;"+
            "Arial=arial,helvetica,sans-serif;"+
            "Arial Black=arial black,avant garde;"+
            "Book Antiqua=book antiqua,palatino;"+
            "Comic Sans MS=comic sans ms,sans-serif;"+
            "Courier New=courier new,courier;"+
            "Georgia=georgia,palatino;"+
            "Helvetica=helvetica;"+
            "Impact=impact,chicago;"+
            "Symbol=symbol;"+
            "Tahoma=tahoma,arial,helvetica,sans-serif;"+
            "Terminal=terminal,monaco;"+
            "Times New Roman=times new roman,times;"+
            "Trebuchet MS=trebuchet ms,geneva;"+
            "Verdana=verdana,geneva;"+
            "Webdings=webdings;"+
            "Wingdings=wingdings,zapf dingbats",

            relative_urls: false,
            //remove_script_host: true,
            image_advtab: true,
            external_filemanager_path: "{$GLOBAL_URL}/admin/assets/js/filemanager/",
            filemanager_title: "Файл менеждер" ,
            external_plugins: { "filemanager" : "{$GLOBAL_URL}/admin/assets/js/filemanager/plugin.min.js" },


            save_enablewhendirty: true,
            save_title: "save",
            theme_advanced_buttons3_add : "save",
            save_onsavecallback: function() {
                $("[type='submit']").trigger("click");
            },

            language : "{$config.admin_language}",
            /* Замена тега P на BR при разбивке на абзацы
             force_br_newlines : true,
             force_p_newlines : false,
             forced_root_block : '',
             */
             forced_root_block : '',
        });
    });
    
    
/*
    $(function(){
        tinyMCE.init({
            selector: "textarea.description",
             setup: function (editor) {
                editor.on('change', function () { 
                    tinymce.triggerSave();
                });
            },
            height: 400,
            autoresize_max_height: 300,
            menubar: true,
            schema: "html5",
            language : "ru",
            plugins: [
                "advlist autolink lists link image preview anchor responsivefilemanager",
                "hr visualchars autosave noneditable searchreplace wordcount visualblocks",
                "code textcolor colorpicker charmap nonbreaking",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar_items_size : 'small',
            //menubar:'file edit insert view format table tools',fontselect
            toolbar1: "undo redo  preview code | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink media image | formatselect fontsizeselect fontselect forecolor backcolo | removeformat",
            statusbar: true,
            content_css: ['https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Oswald|Raleway|Roboto&display=swap'],
            font_formats: "Montserrat=Montserrat,sans-serif;Roboto=Roboto, sans-serif;Oswald=Oswald, sans-serif;Raleway=Raleway, sans-serif';Andale Mono=andale mono,times;"+
            "Arial=arial,helvetica,sans-serif;"+
            "Arial Black=arial black,avant garde;"+
            "Book Antiqua=book antiqua,palatino;"+
            "Comic Sans MS=comic sans ms,sans-serif;"+
            "Courier New=courier new,courier;"+
            "Georgia=georgia,palatino;"+
            "Helvetica=helvetica;"+
            "Impact=impact,chicago;"+
            "Symbol=symbol;"+
            "Tahoma=tahoma,arial,helvetica,sans-serif;"+
            "Terminal=terminal,monaco;"+
            "Times New Roman=times new roman,times;"+
            "Trebuchet MS=trebuchet ms,geneva;"+
            "Verdana=verdana,geneva;",
            image_advtab: true,
            relative_urls: false,
            external_filemanager_path:"/admin/assets/js/filemanager/",
            filemanager_title: "Файл менеждер",
            external_plugins: { "filemanager" : "/admin/assets/js/filemanager/plugin.min.js" },
            extended_valid_elements: "span",
            save_enablewhendirty: true,
            save_title: "save",
            theme_advanced_buttons3_add : "save",
            save_onsavecallback: function(){
                $("[type='submit']").trigger("click");
            },


            /* Замена тега P на BR при разбивке на абзацы 
             force_br_newlines : true,
             force_p_newlines : false,
             forced_root_block : '',
             



        });
    });
*/
    
    
    // если сервер не поддерживает ( Responsive filemanager 9 internal server error) 
    /*
    tinymce.init({
        selector: '.description',
        height: 400,
        menubar: true,
        schema: "html5",
        language:"ru",
        plugins: [
            "advlist autolink lists link image preview anchor responsivefilemanager",
            "hr visualchars autosave noneditable searchreplace wordcount visualblocks",
            "code textcolor colorpicker charmap nonbreaking",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar_items_size : 'small',
        toolbar1: "undo redo  preview code | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink media imageupload | formatselect fontsizeselect fontselect forecolor backcolo | removeformat",
        statusbar: true,
        content_css: ['https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Oswald|Raleway|Roboto&display=swap'],
        font_formats: "Montserrat=Montserrat,sans-serif;Roboto=Roboto, sans-serif;Oswald=Oswald, sans-serif;Raleway=Raleway, sans-serif';Andale Mono=andale mono,times;"+
        "Arial=arial,helvetica,sans-serif;"+
        "Arial Black=arial black,avant garde;"+
        "Book Antiqua=book antiqua,palatino;"+
        "Comic Sans MS=comic sans ms,sans-serif;"+
        "Courier New=courier new,courier;"+
        "Georgia=georgia,palatino;"+
        "Helvetica=helvetica;"+
        "Impact=impact,chicago;"+
        "Symbol=symbol;"+
        "Tahoma=tahoma,arial,helvetica,sans-serif;"+
        "Terminal=terminal,monaco;"+
        "Times New Roman=times new roman,times;"+
        "Trebuchet MS=trebuchet ms,geneva;"+
        "Verdana=verdana,geneva;",
        relative_urls: false,
        remove_script_host: false,
        extended_valid_elements: "span",
        save_onsavecallback: function(){
            $("[type='submit']").trigger("click");
        },
        setup: function(editor) {
            initImageUpload(editor);
        }
    });  
    
    function initImageUpload(editor) {
        // создание ввода и вставка в DOM
        var inp = $('<input id="tinymce-uploader" type="file" name="file" accept="image/*" style="display:none">');
        $(editor.getElement()).parent().append(inp);
    
        // добавьте кнопку загрузить изображение на панель инструментов редактора
        editor.addButton('imageupload', {
            text: '',
            icon: 'image',
            onclick: function(e) { // при нажатии кнопки на панели инструментов открыть файл выбрать модель
                inp.trigger('click');
            }
        });
    
        // когда выбрали файл, загрузите его на сервер
        inp.on("change", function(e){ 
            uploadFile($(this), editor);
        });
    }
    
    function uploadFile(inp, editor) {
        var input = inp.get(0);
        var data = new FormData();
        data.append('contentImage', input.files[0]);
      
        $.ajax({
            url: 'functions.php',
            type: 'POST',
            dataType: "json",
            data: data,
            processData: false,
            contentType: false, 
            success: function(data) {
                console.log(data);
                if (data.code == "200"){
                    editor.insertContent('<img class="content-img" src="' + data.url + '">');
                    $('.upload-image').removeClass('alert-danger').addClass('alert-success').html(data.msg).fadeIn(1000).fadeOut(3000);	
                } else {
                    $('.upload-image').removeClass('alert-success').addClass('alert-danger').html(data.error).fadeIn(1000).fadeOut(3000);	
                }
            }
        });
    }  
    */

</script>
