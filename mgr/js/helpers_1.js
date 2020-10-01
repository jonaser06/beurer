function Helpers() {
    var self = this;
    this.tables = {};
    this.dataTables = {};

    /*
     * ELIMINAR DEL DOM LOS ELEMENTOS Y EVENTOS CARGADOS EN EL POPUP
     * DE CREAR Y EDITAR.
     */
    $('#modalCreateEdit').on('hidden.bs.modal', function (e) {
        $(this).find('div.modal-dialog').remove();
    });

    this.loadDataTable = function (idtable, options) {
        var original = {
            "lengthChange": true,
            "ordering": false,
            "responsive": true,
            "deferRender": true,
            "autoWidth": false,
//            "rowReorder": true,
            "rowReorder": false,
        };

        if (options.ajax) {
            original.processing = true;
            original.serverSide = true;
        }

        var options = this.applyIf(original, options);

        this.tables[idtable] = $('#' + idtable).DataTable(options);
        this.tables[idtable].on('xhr', function (ev, settings, json, xhr) {
            self.dataTables[idtable] = json.data;
        });
    };

    this.sendAjax = function (url, data, callback) {
        $('#modalLoading').modal('toggle');

        $.ajax({
            url: url,
            method: "POST",
            data: data,
            success: function (response, textStatus, jqXHR) {
                $('#modalLoading').modal('toggle');

                setTimeout(function () {
                    if (callback) {
                        eval('self.' + callback + '(response)');
                    }
                }, 500);
            }
        });
    };

    /*
     * origin = attributos por defecto
     * news = nuevos atributos a copiarse
     */
    this.applyIf = function (origin, news) {
        if (news) {
            for (var p in news) {
                if (!origin[p]) {
                    origin[p] = news[p];
                }
            }
        }

        return origin;
    };

    this.alert = function (options) {
        var modal = $('#modalAlert');
        var body = modal.find('div.modal-body');
        var acepted = modal.find('button.btn-acepted');

        acepted.attr('onclick', options.acepted);
        body.html(options.message);

        modal.modal('toggle');
    };

    this.loadResponse = function (response) {
        var modal = $('#modalCreateEdit');
        modal.html(response);
        modal.modal('toggle');
    };

    this.validate = function (form, validates) {
        var options = {
            highlight: function (element, errorClass, validClass) {
                errorClass = "has-error has-feedback";
                validClass = "has-success has-feedback";

                $(element).parent().removeClass(validClass).addClass(errorClass);
            },
            unhighlight: function (element, errorClass, validClass) {
                errorClass = "has-error has-feedback";
                validClass = "has-success has-feedback";

                $(element).parent().removeClass(errorClass).addClass(validClass);
            }
        };

        options = this.applyIf(options, validates);

        $("#" + form).validate(options);
    };

    this.popupManager = function (idfield, folder, akey, type) {
        var w = 880;
        var h = 570;
        var l = Math.floor((screen.width - w) / 2);
        var t = Math.floor((screen.height - h) / 2);

        if (type === undefined) {
            type = 1;
        }

        var url = [
            'mgr/filemanager/dialog.php',
            '?type=' + type,
            '&popup=1',
            '&field_id=' + idfield,
            '&relative_url=1',
            '&akey=' + akey
        ];

        if (folder !== null) {
            url.push('&fldr=' + folder);
        }

        var win = window.open(url.join(''), 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
    };

    this.popupManagerCallback = function (field) {
        var input = $('#' + field);
        var input_preview = $('#' + field + '-preview');
        var path = input.val();

        input_preview.attr('src', path);
    };

    this.convertSerializeArray = function (form_values) {
        var output = {};

        $.each(form_values, function (index, form_value) {
            output[form_value.name] = form_value.value;
        });

        return output;
    };

    /*
     * CODIGO NECESARIO PARA QUE EL TINYMCE FUNCIONE CORRECTAMENTE EN POPUPS
     */
    $(document).on('focusin', function (e) {
        if ($(e.target).closest(".mce-window").length) {
            e.stopImmediatePropagation();
        }
    });

    this.tinyInit = function (aKey) {
        var project = '/clientes/nutripoint/test/';//desarrollo
//        var project = '/';//produccion

        tinymce.init({
            selector: '.richtext',
            width: '100%',
            height: '300',
            relative_urls: false,
            remove_script_host: false,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools responsivefilemanager'
            ],
            spellchecker_language: 'es',
            spellchecker_languages: 'Spanish=es,English=en',
            image_advtab: true,
            filemanager_access_key: aKey,
            external_filemanager_path: project + "mgr/filemanager/",
            filemanager_title: "Servidor",
            external_plugins: {
                "filemanager": project + "mgr/filemanager/plugin.min.js"
            },
            toolbar: [
                "undo redo | print cut copy paste pastetext | visualblocks ltr rtl | preview code",
                "spellchecker | styleselect | formatselect fontselect fontsizeselect | bold italic underline strikethrough superscript subscript | backcolor forecolor",
                "bullist numlist indent outdent | alignleft aligncenter alignright alignjustify | link unlink image media | blockquote",
                "table anchor pagebreak nonbreaking hr charmap emoticons"
            ],
            menu: {},
            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            }
        });
    };
}

var Exeperu = new Helpers();

function responsive_filemanager_callback(field_id) {
    Exeperu.popupManagerCallback(field_id);
}