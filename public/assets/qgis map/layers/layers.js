ol.proj.proj4.register(proj4);
ol.proj.get("EPSG:4326").setExtent([-1.483096, 32.225068, 8.520082, 37.800148]);
var wms_layers = [];


        var lyr_OpenStreetMap_0 = new ol.layer.Tile({
            'title': 'OpenStreetMap',
            'type': 'base',
            'opacity': 1.000000,
            
            
            source: new ol.source.XYZ({
    attributions: ' ',
                url: 'http://a.tile.openstreetmap.org/{z}/{x}/{y}.png'
            })
        });
var format_sabl_1 = new ol.format.GeoJSON();
var features_sabl_1 = format_sabl_1.readFeatures(json_sabl_1, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:4326'});
var jsonSource_sabl_1 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_sabl_1.addFeatures(features_sabl_1);cluster_sabl_1 = new ol.source.Cluster({
  distance: 10,
  source: jsonSource_sabl_1
});
var lyr_sabl_1 = new ol.layer.Vector({
                declutter: true,
                source:cluster_sabl_1, 
                style: style_sabl_1,
                interactive: true,
                title: '<img src="styles/legend/sabl_1.png" /> sabl'
            });

lyr_OpenStreetMap_0.setVisible(true);lyr_sabl_1.setVisible(true);
var layersList = [lyr_OpenStreetMap_0,lyr_sabl_1];
lyr_sabl_1.set('fieldAliases', {'OID_': 'OID_', 'Name': 'Name', 'FolderPath': 'FolderPath', 'SymbolID': 'SymbolID', 'AltMode': 'AltMode', 'Base': 'Base', 'Snippet': 'Snippet', 'PopupInfo': 'PopupInfo', 'HasLabel': 'HasLabel', 'LabelID': 'LabelID', });
lyr_sabl_1.set('fieldImages', {'OID_': 'TextEdit', 'Name': 'TextEdit', 'FolderPath': 'TextEdit', 'SymbolID': 'TextEdit', 'AltMode': 'Range', 'Base': 'TextEdit', 'Snippet': 'TextEdit', 'PopupInfo': 'TextEdit', 'HasLabel': 'Range', 'LabelID': 'TextEdit', });
lyr_sabl_1.set('fieldLabels', {'OID_': 'no label', 'Name': 'header label', 'FolderPath': 'no label', 'SymbolID': 'no label', 'AltMode': 'inline label', 'Base': 'no label', 'Snippet': 'no label', 'PopupInfo': 'no label', 'HasLabel': 'no label', 'LabelID': 'no label', });
lyr_sabl_1.on('precompose', function(evt) {
    evt.context.globalCompositeOperation = 'normal';
});