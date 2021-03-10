<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />
<link rel="stylesheet" href="src/leaflet-search.css" />
<link rel="stylesheet" href="examples/style.css" />
<style>
.leaflet-marker-icon {
	color: #ffffff;
	font-size: 16px;
	line-height: 16px;
	text-align: center;
	vertical-align: middle;
	box-shadow: 2px 1px 4px rgba(0,0,0,0.3);
	border-radius: 50px;
	border:8px solid #ff0000;
}
.search-tip b {
	color: #fff;
}

.Secretario.leaflet-marker-icon {
       border-radius: 50px;
       border:8px solid #008f39;
}

.Secretario.search-tip b,
.Secretario.leaflet-marker-icon {
	background: #008f39;

}
.Afiliado.search-tip b,
.Afiliado.leaflet-marker-icon {
	background: #ff0000
}
.restaurant.search-tip b,
.restaurant.leaflet-marker-icon {
	background: #66f
}
.search-tip {
	white-space: nowrap;
}
.search-tip b {
	display: inline-block;
	clear: left;
	float: right;
	padding: 0 4px;
	margin-left: 4px;
}
</style>
</head>

<body>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
<script src="src/leaflet-search.js"></script>

<?php
include "Conexion.php";
    $consulta="SELECT personas.id_persona as id, jerarquias.cargo as cargo, direcciones.latitud as latitud, direcciones.longitud as longitud, personas.nombre as nombre, personas.app as app, personas.apm as apm, direcciones.direccion as direccion, direcciones.no_int as noint, direcciones.no_ext as noext, direcciones.cp as cp, colonia.colonia as colonia, municipios.nombre_municipio as municipio from personas inner join direcciones on personas.id_persona = direcciones.person_id inner join colonia on colonia.id_colonia = direcciones.colonia_id inner join municipios on municipios.id_municipio = direcciones.municipio_id inner join  afiliados on afiliados.persona_id = personas.id_persona inner join jerarquias on jerarquias.id_jerarquia = afiliados.jerarquia_id";
    $result=  mysqli_query($conexion, $consulta);
    while($busca = mysqli_fetch_array($result)){
    	$nombre  =  $busca['nombre'];
    	$app = $busca['app'];
    	$apm = $busca['apm'];
    	$cargo = $busca['cargo'];
    	$latitud = $busca['latitud'];
    	$longitud = $busca['longitud'];
    	$cp = $busca['cp'];
    	$id = $busca['id'];
    	$direccion = $busca['direccion'];

?>

<script type="text/javascript">
  var nombre ='<?php echo '' . $nombre . ' ' .  $app  . ' ' .  $apm;?>';
  var cargo ='<?php echo $cargo;?>';
  var latitud ='<?php echo $latitud;?>';
  var longitud ='<?php echo $longitud;?>';
  var cp ='<?php echo $cp;?>';
  var id ='<?php echo 'node/'.$id;?>';
  var Prueba = {
  "type": "FeatureCollection",
  "generator": "overpass-turbo",
  "copyright": "The data included in this document is from www.openstreetmap.org. The data is made available under ODbL.",
  "timestamp": "2015-08-08T19:03:02Z",
  "features": [
    {
      "type": "Feature",
      "id": id,
      "properties": {
        "@id": id,
        "addr:city": "Estado de México",
        "addr:postcode": cp,
        "addr:street": "Piazza della Madonna dei Monti",
        "amenity": cargo,
        "name": nombre
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          longitud,
          latitud
        ]
      }
    },
  ]
};
</script>
<?php  } ?>
<script>

	var map = L.map('map', {
			zoom: 14,
			center: new L.latLng(19.512556, -98.882896),
			layers: L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
		}),


		geojsonOpts = {
			pointToLayer: function(feature, latlng) {
				return L.marker(latlng, {
					icon: L.divIcon({
						className: feature.properties.amenity,
						iconSize: L.point(16, 16),
						html: feature.properties.amenity[0].toUpperCase(),
					})
				}).bindPopup(feature.properties.amenity+'<br><b>'+feature.properties.name+'</b>');
			}
		};

	var poiLayers = L.layerGroup([
		//L.geoJson(Secretario, geojsonOpts),
		//L.geoJson(Afiliado, geojsonOpts),
		//L.geoJson(cargo, geojsonOpts),
		L.geoJson(Prueba, geojsonOpts)
	])
	.addTo(map);

	L.control.search({
		layer: poiLayers,
		initial: false,
		propertyName: 'name',
		buildTip: function(text, val) {
			var type = val.layer.feature.properties.amenity;
			return '<a href="#" class="'+type+'">'+text+'<b>'+type+'</b></a>';
		}
	})
	.addTo(map);


</script>

\<!--<div id="copy"><a href="http://labs.easyblog.it/">Labs</a> &bull; <a rel="author" href="http://labs.easyblog.it/stefano-cudini/">Stefano Cudini</a></div>-->

<script type="text/javascript" src="/labs-common.js"></script>

</body>
</html>
