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
.Secretario-de.leaflet-marker-icon {
	border-radius: 50px;
       border:8px solid #FF8CC8;
}
.Secretario-de.search-tip b,
.Secretario-de.leaflet-marker-icon {
	background: #FF8CC8;
}
.Secretario-de-Finanzas.leaflet-marker-icon {
	border-radius: 50px;
       border:8px solid #EA4C88;
}
.Secretario-de-Finanzas.search-tip b,
.Secretario-de-Finanzas.leaflet-marker-icon {
	background: #EA4C88;
}
.Secretario-de-Gestion.leaflet-marker-icon {
	border-radius: 50px;
       border:8px solid  #008B80;
}
.Secretario-de-Gestion.search-tip b,
.Secretario-de-Gestion.leaflet-marker-icon {
	background: #008B80;
}
.Secretario-de-Informacion.leaflet-marker-icon {
	border-radius: 50px;
       border:8px solid #F1C40F;
}
.Secretario-de-Informacion.search-tip b,
.Secretario-de-Informacion.leaflet-marker-icon {
	background: #F1C40F;
}

.Afiliado.search-tip b,
.Afiliado.leaflet-marker-icon {
	background: #ff0000
}
.Presidente.leaflet-marker-icon {
	border-radius: 50px;
       border:8px solid #0057A0;
	
}

.Presidente.search-tip b,
.Presidente.leaflet-marker-icon {
	background: #0057A0;
	
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
<script src="examples/data/4611.geojson.js"></script>
<script>

	var map = L.map('map', {
			zoom: 5,
			center: new L.latLng(23.634501, -102.552784),
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
		L.geoJson(Seccion1, geojsonOpts)
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
