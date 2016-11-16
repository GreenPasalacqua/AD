/*<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertar</title>
</head>
<body>
<script src="libs/jspdf.min.js"></script>

<script src="libs/faker.min.js"></script>
<script src="libs/jspdf.plugin.autotable.src.js"></script>
<script>*/
examples = function () {
    var doc = new jsPDF('p', 'pt');
    doc.text("From HTML", 40, 50);
    var elem = document.getElementById("basic-table");
    var res = doc.autoTableHtmlToJson(elem);
    doc.autoTable(res.columns, res.data, {startY: 60});
    //noinspection JSAnnotator
return doc;};

    /*doc.setProperties({
        title: 'Reporte faltantes',
        subject: 'Reporte de faltantes'
    });
    doc.save('table.pdf');
</script>
</body>
</html>*/