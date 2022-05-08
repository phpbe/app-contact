<be-html>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <style type="text/css">
        html{height:100%;font-size: 14px;}
        body{height:100%;margin:0;padding:0}
        #baidu-map{height:100%}
    </style>
    <script src="//api.map.baidu.com/api?type=webgl&v=1.0&ak=<?php echo $this->configContact->mapKeyBaidu; ?>"></script>
</head>
<body>
<div id="baidu-map"></div>
<script type="text/javascript">

    let map = new BMapGL.Map("baidu-map"); // 创建Map实例

    let point = new BMapGL.Point(<?php echo $this->configContact->lng; ?>, <?php echo $this->configContact->lat; ?>);

    map.centerAndZoom(point, 16); // 初始化地图,设置中心点坐标和地图级别

    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    map.addControl(new BMapGL.ScaleControl()); // 添加比例尺控件
    map.addControl(new BMapGL.ZoomControl()); // 添加缩放控件
    map.addControl(new BMapGL.NavigationControl3D()); // 添加3D控件

    let marker = new BMapGL.Marker(point); // 创建标注
    marker.enableDragging();
    map.addOverlay(marker); // 将标注添加到地图中

    map.addEventListener('click', function(e){
        marker.setPosition(new BMapGL.Point(e.latlng.lng, e.latlng.lat));
        parent.setLngLat(e.latlng.lng,e.latlng.lat);
    })

    marker.addEventListener("dragend", function(){
        let p = marker.getPosition();
        parent.setLngLat(p.lng, p.lat);
    });

</script>
</body>
</html>
</be-html>