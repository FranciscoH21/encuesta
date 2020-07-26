
function GeneralColumns(){
    $.ajax({
        type: "POST",
        url: "Estadisticas/Estadisticas/php/estGeneralesGlobal.php",
        datatype: "html",
    })
    .done( function( Data ) {
        
        GeneralData = JSON.parse(Data);

        GeneralColumns = [
            { title: "Categoria", field: "Catego", formatter:function(cell){ return cell.getValue(); } },
            { title: "", field: "Atr1", formatter:function(cell){ return cell.getValue(); }, align:"center" },
            { title: "", field: "Atr2", formatter:function(cell){ return cell.getValue(); }, align:"center" },
            { title: "", field: "Atr3", formatter:function(cell){ return cell.getValue(); }, align:"center" },
            { title: "", field: "Atr4", formatter:function(cell){ return cell.getValue(); }, align:"center" },
            { title: "", field: "Atr5", formatter:function(cell){ return cell.getValue(); }, align:"center" },
            { title: "", field: "Atr6", formatter:function(cell){ return cell.getValue(); }, align:"center" },
            { title: "", field: "Atr7", formatter:function(cell){ return cell.getValue(); }, align:"center" },
            { title: "", field: "Atr8", formatter:function(cell){ return cell.getValue(); }, align:"center" },
        ]

        tableAux2 = new Tabulator("#GeneralDataGlobal", {
            data: GeneralData,
            // selectable:true,
            columns:GeneralColumns,
        });
    })
}

function EstaGenerales(){
    $.ajax({
        type: "POST",
        url: "Estadisticas/Estadisticas/php/estGenerales.php",
        datatype: "html",
    })
    .done( function( Data ) {
        var res = Data.split("-");

        res[0] = parse(Math.round(res[0]));
        res[1] = parse(Math.round(res[1]));
        res[2] = parse(Math.round(res[2]));
        res[3] = parse(Math.round(res[3]));
        res[4] = parse(Math.round(res[4]));
        res[5] = parse(Math.round(res[5]));

        data= [
            {
                Encuestados: res[0],
                Promedio: res[1],
                Mujeres: res[2],  
                MujeresPro: res[3],
                Hombres: res[4],
                HombresPro: res[5]
            }
        ];
        columns = [ 
            {title:"Total", field:"Encuestados", formatter:function(cell){ return "<span><b>"+cell.getValue()+"</b> Personas</span>"; }, align:"center" },
            {title:"Promedio", field:"Promedio", formatter:function(cell){ return "<span><b>"+cell.getValue()+"</b> Puntos</span>"; }, align:"center" },
            {title:"Mujeres", field:"Mujeres", formatter:function(cell){ return "<span><b>"+cell.getValue()+"</b> Mujeres</span>"; }, align:"center" },
            {title:"Promedio", field:"MujeresPro", formatter:function(cell){ return "<span><b>"+cell.getValue()+"</b> Puntos</span>"; }, align:"center" },
            {title:"Hombres", field:"Hombres", formatter:function(cell){ return "<span><b>"+cell.getValue()+"</b> Hombres</span>"; }, align:"center" },
            {title:"Promedio", field:"HombresPro", formatter:function(cell){ return "<span><b>"+cell.getValue()+"</b> Puntos</span>"; }, align:"center" },
        ];

        tableAux = new Tabulator("#GeneralData", {
            data: data,
            layout:"fitColumns",
            columns:columns,
        });
        
    }).fail( function( err ) {
        console.log( "error en : "+err );
    })
}


function parse( str ){
    aux = parseInt( str );
    if( isNaN( aux ) ){ aux = 0; }
    
    return aux;
}

$(document).ready(function(){
    EstaGenerales();
    GeneralColumns();
    getPromedios();
    fullData();
});

function actualizarEstadisticas() {
    EstaGenerales();
    GeneralColumns();
    getPromedios();
    var bloqueActual = $("#Bloque").text();

    if(bloqueActual.length > 1){
        bloqueActual = bloqueActual.substring(7);
        var arrayBloque = bloqueActual.split(".");
        bloqueActual = "<b>" + arrayBloque[0] + ".</b>" + arrayBloque[1];

        GetBloques(bloqueActual);
    }   
}

function confirmar() {
    Admin(0);
    // alertify.confirm("This is a confirm dialog.",
    //     function(){
    //         // alertify.success('Ok');
    //         Admin(0);
    //     },
    //     function(){
    //         alertify.error('Cancelaste');
    //     }
    // );
}


var TableAuxEmpy;
var table;
function getPromedios() {
    $.ajax({
        type: "POST",
        url: "Estadisticas/Estadisticas/php/PromediosTablaPpal.php",
        datatype: "html",

        success: function(r){
            var aux = r.split("-");
            //console.log( r );
            promedios = [parseInt(Math.round(aux[0])),
            parseInt(Math.round(aux[1])),
            parseInt(Math.round(aux[2])),
            parseInt(Math.round(aux[3])),
            parseInt(Math.round(aux[4])),
            parseInt(Math.round(aux[5])),
            parseInt(Math.round(aux[6])),
            parseInt(Math.round(aux[7])),
            parseInt(Math.round(aux[8])),
            parseInt(Math.round(aux[9]))]

            var dataGeneral = [
                {name:"1. Reclutamiento y selección de personal", puntos: "<b>"+promedios[0]+"</b> de 12 pts "+AVG( promedios[0], 12 ) },
                {name:"2. Formación y capacitación", puntos: "<b>"+promedios[1]+"</b> de 12 pts "+AVG( promedios[1], 12 ) },
                {name:"3. Permanencia y ascenso", puntos: "<b>"+promedios[2]+"</b> de 18 pts "+AVG( promedios[2], 18 ) },
                {name:"4. Corresponsabilidad en la vida laboral, familiar y personal", puntos: "<b>"+promedios[3]+"</b> de 27 pts "+AVG( promedios[3], 27 ) },
                {name:"5. Clima laboral libre de violencia", puntos: "<b>"+promedios[4]+"</b> de 42 pts "+AVG( promedios[4], 42 ) },
                {name:"6. Acoso y hostigamiento", puntos: "<b>"+promedios[5]+"</b> de 24 pts "+AVG( promedios[5], 24 ) },
                {name:"7. Accesibilidad", puntos: "<b>"+promedios[6]+"</b> de 15 pts "+AVG( promedios[6], 15 ) },
                {name:"8. Respeto a la diversidad", puntos: "<b>"+promedios[7]+"</b> de 6 pts "+AVG( promedios[7], 6 ) },
                {name:"9. Condiciones generales de trabajo", puntos: "<b>"+promedios[8]+"</b> de 12 pts "+AVG( promedios[8], 12 ) },
                {name:"Total", puntos: "<b>"+promedios[9]+"</b> de 168 pts "+AVG( promedios[9], 168 ) },
            ];
            
            table = new Tabulator("#GeneralTable", {
                data: dataGeneral,
                layout:"fitColumns",
                columns:[ 
                    {title:"Bloque", field:"name",formatter:function(cell){ return cell.getValue(); } },
                    {title:"Puntos (Promedio)", field:"puntos",formatter:function(cell){ 
                            return  cell.getValue();
                        } 
                    },
                ],
                rowClick:function(e, row){ 
                    GetBloques( row.getData().name );
                },
            });

            dataGeneral = [
                {name:"1. Reclutamiento y selección de personal", puntos: ""+promedios[0]+" de 12 pts "+AVG2( promedios[0], 12 ) },
                {name:"2. Formación y capacitación", puntos: "<b>"+promedios[1]+"</b> de 12 pts "+AVG2( promedios[1], 12 ) },
                {name:"3. Permanencia y ascenso", puntos: "<b>"+promedios[2]+"</b> de 18 pts "+AVG2( promedios[2], 18 ) },
                {name:"4. Corresponsabilidad en la vida laboral, familiar y personal", puntos: "<b>"+promedios[3]+"</b> de 27 pts "+AVG2( promedios[3], 27 ) },
                {name:"5. Clima laboral libre de violencia", puntos: "<b>"+promedios[4]+"</b> de 42 pts "+AVG2( promedios[4], 42 ) },
                {name:"6. Acoso y hostigamiento", puntos: "<b>"+promedios[5]+"</b> de 24 pts "+AVG2( promedios[5], 24 ) },
                {name:"7. Accesibilidad", puntos: "<b>"+promedios[6]+"</b> de 15 pts "+AVG2( promedios[6], 15 ) },
                {name:"8. Respeto a la diversidad", puntos: "<b>"+promedios[7]+"</b> de 6 pts "+AVG2( promedios[7], 6 ) },
                {name:"9. Condiciones generales de trabajo", puntos: "<b>"+promedios[8]+"</b> de 12 pts "+AVG2( promedios[8], 12 ) },
                {name:"Total", puntos: "<b>"+promedios[9]+"</b> de 168 pts "+AVG2( promedios[9], 168 ) },
            ];

            TableAuxEmpy = new Tabulator("#Aux", {
                data: dataGeneral,
                columns:[ 
                    {title:"Bloque", field:"name" },
                    {title:"Puntos (Promedio)", field:"puntos"},
                ],
            });
        }
    });
}

function AVG( sum, total ){
    total = (sum * 100 ) / total;
    color = "#229954";
    if( total <= 50 ){ color = "#C0392B" }
    if( total > 50 && total <= 75 ){ color = "#F5B041" }
    return "<span style='color:"+color+";'><b>( "+total.toFixed(2)+"% )</b></span>";
}

function AVG2( sum, total ){
    total = (sum * 100 ) / total;
    return total.toFixed(2)+"%";
}

function GetBloques( op ){

    if( op != "Total" ){
        $.ajax({
            type: "POST",
            url: "Estadisticas/Estadisticas/php/Bloques.php",
            data:{ op:op },

        }).done( function( Data ) {
            TableAux( Data, op );
            
        }).fail( function( err ) {
            console.log( "error en : "+err );
        })
    }   
}

function TableAux( Data, op ) {
    try{
        Data = JSON.parse( Data );
    }catch( e ){ 
        console.log( "Error al convertir respuesta en JSON:\n"+e+"\n\nServidor responde :\n"+Data );
    }

    document.getElementById("Bloque").innerHTML = "<br>Bloque "+op;

    var index = [];
    for( key in Data[0] ){
        index.push( key );
    }

    var columns = []; 
    index.map( (e, i) => { 
        var title = index[i];
        if( title == "ALGUNASVECES" ){ title = "ALGUNAS VECES"; }
        if( title == "CONFRECUENCIA" ){ title = "CON FRECUENCIA"; }
        
        columns.push( {
            title: title,
            field: index[ i ],
            formatter:function(cell){ 
                value = cell.getValue().replace("=", "⇨");
                return value;
            }
        });
    });

    tableAux = new Tabulator("#Table", {
        data: Data,
        layout:"fitColumns",
        columns: columns,
    });
}

function getTime(){
    let today = new Date();
    let d = ""+today.getDate();
    let m = ""+(today.getMonth()+1);
    let y = today.getFullYear();

    if( d.length == 1 ){ d = "0"+d; }
    if( m.length == 1 ){ m = "0"+m; }

    return d +"-"+ m +"-"+ y;
}

function fullData( ){

    $.ajax({
        type: "POST",
        url: "Estadisticas/Estadisticas/php/Bloques.php",
        data:{ op:"full" },

    }).done( function( Data ) {
        var aux = ClearData( JSON.parse( Data ) );
        tableRes( aux );
        
    }).fail( function( err ) {
        console.log( "error en : "+err );
    })
}

function ClearData( data, op ){
    
    var aux = data.map( (e) => {
        e.PREGUNTA = e.PREGUNTA.replace("<b>", "");
        e.PREGUNTA = e.PREGUNTA.replace("</b>", "");

        if( e.SI != null ){
            e.SI = e.SI.replace("<b>", "");
            e.SI = e.SI.replace("</b>", "");
        }

        if( e.NO != null ){
            e.NO = e.NO.replace("<b>", "");
            e.NO = e.NO.replace("</b>", "");
        }
    
        if( e.NUNCA != null ){
            e.NUNCA = e.NUNCA.replace("<b>", "");
            e.NUNCA = e.NUNCA.replace("</b>", "");
        }

        if( e.SIEMPRE != null ){
            e.SIEMPRE = e.SIEMPRE.replace("<b>", "");
            e.SIEMPRE = e.SIEMPRE.replace("</b>", "");
        }

        if( e.ALGUNASVECES != null ){
            e.ALGUNASVECES = e.ALGUNASVECES.replace("<b>", "");
            e.ALGUNASVECES = e.ALGUNASVECES.replace("</b>", "");
        }

        if( e.CONFRECUENCIA != null ){
            e.CONFRECUENCIA = e.CONFRECUENCIA.replace("<b>", "");
            e.CONFRECUENCIA = e.CONFRECUENCIA.replace("</b>", "");
        } 
        
        return e;
    })
    return aux;
}


function tableRes( data ){
    
    newColumns = [
        {title:"PREGUNTA", field:"PREGUNTA" },
        {title:"NUNCA", field:"NUNCA"},
        {title:"ALGUNAS VECES", field:"ALGUNASVECES"},
        {title:"CON FRECUENCIA", field:"CONFRECUENCIA"},
        {title:"SIEMPRE", field:"SIEMPRE"},
        {title:"SI", field:"SI"},
        {title:"NO", field:"NO"}
    ]

    tableRes = new Tabulator("#ResTable", {
        data: data,
        columns:newColumns,
    });


}



function filterMaster( data ){

    var aux = data.map( (e) => {
        
        // e.puntos = e.puntos.replace("<b>", "");
        // e.puntos = e.puntos.replace("</b>", "");

        // e.puntos = e.puntos.replace("<span style='color:", "");
        // e.puntos = e.puntos.replace(")</span>", "");

        // e.puntos = e.puntos.replace(";'><b>(", "");
        // e.puntos = e.puntos.replace(")</b></span>", "");
        
        // e.puntos = e.puntos.replace(";'>(", "");
        
        // e.puntos = e.puntos.replace(" #229954", "");
        // e.puntos = e.puntos.replace(" #C0392B", "");
        // e.puntos = e.puntos.replace(" #F5B041", "");
        var fin = e.puntos.indexOf("<span");
        if( fin != -1 ){ e.puntos = e.puntos.substring(0,fin); } 
        
        e.puntos = e.puntos.replace("<b>", "");
        e.puntos = e.puntos.replace("</b>", "");

        return e;
    })
    return aux;
}

function downloadAll( op ){
    var sheets = {
        "Respuestas": "#ResTable",
        "Promedios" : "#Aux",
        "Datos generales" : "#GeneralData",
        "Datos" : "#GeneralDataGlobal"
    };

    if( op == 1 ){ 
        table.download("xlsx", "Reporte SGIG "+getTime()+".xlsx", {sheets:sheets} );
    }

    if( op == 2 ){ TableAuxEmpy.download("pdf", "Reporte SGIG "+getTime()+".pdf", {
        title:"ITCG Resultados de Encuesta S.G.I.G.",
        autoTable:{ 
            styles: { cellWidth: 100, cellHeight: 100  },
        },
    }
    );}
    if( op == 3 ){ TableAuxEmpy.print(false, true ); }

}

$("#download-xlsx").click(function(){
    downloadAll( 1 );
});

$("#download-pdf").click(function(){
    downloadAll( 2 );
});

$("#print-table").on("click", function(){
    downloadAll( 3 );
});



