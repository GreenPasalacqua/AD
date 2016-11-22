$(function () {
    /**
     * Objeto scanner preconfigurado con las opciones que funcionan en la mayoría de los casos
     * Se recomienda tomar la fotografía del código de barra no muy cercana al lente
     */
    let scanner = {
        /**
         * Inicializa el objeto
         */
        init: function () {
            scanner.attachListeners();
        },
        /**
         * Añade listeners a los controles
         * Cuando se selecciona una imagen con el input, se decodifica la imagen con la ruta indicada.
         */
        attachListeners: function () {
            $(".controles input[type=file]").on("change", function (e) {
                if (e.target.files && e.target.files.length) {
                    scanner.decode(URL.createObjectURL(e.target.files[0]));
                    URL.revokeObjectURL(e.target.files[0]);
                }
            });
        },
        /**
         * Quita listeners a los controles
         */
        detachListeners: function () {
            $(".controles input[type=file]").off("change");
        },
        /**
         * Decodifica la imagen.
         * Combina en config los valores de los objetos state y la ruta especificada (src).
         * Después llama a Quagga.decodeSingle para iniciar el proceso.
         * @param src ruta de la imagen
         */
        decode: function (src) {
            let self = this,
                config = $.extend({}, self.state, {src: src});

            Quagga.decodeSingle(config, function (result) {
            });
        },
        /**
         * Configuración del objeto scanner.
         * inputStream define la fuente de imágenes y videos. Restringe el input a tener 1280px de ancho.
         * locator define los parametros del ubicador.
         * numOfWorkers define el número de núcleos con los que se trabajará.
         * decoder define los tipos de barras que se reconocerán.
         * locate define si se ubicará el código en la imagen o no.
         * src define la ruta inicial de la imagen.
         */
        state: {
            inputStream: {
                size: 1280
            },
            locator: {
                patchSize: "medium",
                halfSample: false
            },
            numOfWorkers: 1,
            decoder: {
                readers: [{
                    format: "code_128_reader",
                    config: {}
                }],
                multiple: false
            },
            locate: true,
            src: null
        }
    };

    /**
     * Se inicializa el scanner.
     */
    scanner.init();

    /**
     * Cuando se procese la imagen, se dibuja sobre ella donde se ubicó el código. Si es que se ubicó.
     */
    Quagga.onProcessed(function (result) {
        let drawingCtx = Quagga.canvas.ctx.overlay,
            drawingCanvas = Quagga.canvas.dom.overlay;

        if (result) {
            /*if (result.boxes) {
                drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
                result.boxes.filter(function (box) {
                    return box !== result.box;
                }).forEach(function (box) {
                    Quagga.ImageDebug.drawPath(box, {x: 0, y: 1}, drawingCtx, {color: "green", lineWidth: 2});
                });
            }

            if (result.box) {
                Quagga.ImageDebug.drawPath(result.box, {x: 0, y: 1}, drawingCtx, {color: "#00F", lineWidth: 2});
            }*/

            if (result.codeResult && result.codeResult.code) {
                Quagga.ImageDebug.drawPath(result.line, {x: 'x', y: 'y'}, drawingCtx, {color: 'red', lineWidth: 4});
            }
        }
    });

    /**
     * Cuando se detecte un código, se añade a la tira de resultados con una vista en miniatura.
     */
    Quagga.onDetected(function (result) {
        let code = result.codeResult.code,
            $node,
            canvas = Quagga.canvas.dom.image;

        $node = $(
            '<li>' +
                '<div class="miniatura">' +
                    '<div class="figura">' +
                        '<img>' +
                    '</div>' +
                    '<div class="leyenda">' +
                        '<h4 class="codigo"></h4>' +
                    '</div>' +
                '</div>' +
            '</li>');
        $node.find("img").attr("src", canvas.toDataURL());
        $node.find("h4.codigo").html(code);
        $('#tira_resultados').find('ul.miniaturas').prepend($node);
    });
});
